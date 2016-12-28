<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> helper('form');
		$this -> load -> helper('date');
		$this -> load -> helper('text');
		$this -> load -> library('cart');
		$this->load->helper('download');
		$this->load->helper('path');
		$this->load->helper('url');
		$this->load->model('t_pelanggan_model','',TRUE);
		$this->load->model('t_transaksi_model','',TRUE);
		$this->load->model('country_model','',TRUE);
		$this->load->model('city_model','',TRUE);
		$this->load->model('t_data_model', 'data');
	}
	public function index()
	{
		$data['pekerjaan'] = $this->t_pelanggan_model->getPekerjaan()->result();
		
		$this->load->view('index',$data);
		//echo "sdsd";
	}
	public function input_biodata(){
		
		$data['nama'] = $this->input->post('nama', 'true');
		$data['email'] = $this->input->post('email', 'true');
		$data['alamat'] = $this->input->post('alamat', 'true');
		$data['tanggal'] = date("Y-m-d h:m:s");
		$data['id_pekerjaan'] = $this->input->post('pekerjaan', 'true');
		
		$this->t_pelanggan_model->insertData($data);
		redirect(site_url('pelanggan/view_pelanggan'));
		
	}
	public function view_pelanggan()
	{
		$data['file'] = $this->data->getAllKategori()->result();
		$data['pelanggan'] = $this->t_pelanggan_model->getMax()->result();
		
		$this->load->view('pelanggan/index',$data);
	}
	public function view_thanks()
	{
		$penerima = $this->t_pelanggan_model->getMax()->result();
		// print_r($penerima);
		
		foreach ($penerima as $penerima){
			$id_pelanggan = $penerima->id_pelanggan;
		}
		$this->data->flushCart($id_pelanggan);
		
		//buat masukkin ke database
			$status=0;
			$data = Array(
				'status_data' => $status,
			);
		
		$this->data->updateAllStatus($data);
		
		$this->load->view('pelanggan/thanks');
	}
	
	//edit email pada view pelanggan
	public function update_email($id)
	{
		$data['email'] = $this->input->post('email', 'true');
		
		$this->t_pelanggan_model->updateEmail($id,$data);
		$this -> session -> set_flashdata('pemberitahuan',
		'<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Email Berhasil Dirubah!
		</div>');
		redirect(site_url('pelanggan/view_keranjang'));
	}
	
	// download email
	public function download_email()
	{
		$penerima = $this->t_pelanggan_model->getMax()->result();
		
		foreach ($penerima as $penerima){
			$id_pelanggan = $penerima->id_pelanggan;
			$email = $penerima->email;
			$nama_pelanggan = $penerima->nama;
		}
		
		// Email configuration
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'cumey02@gmail.com', //username email
			'smtp_pass' => 'cumeyajah', //password email
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);	
		
		$this->load->library('email',$config);
		
		$data['counter'] = $this->data->countCart($id_pelanggan)->row(); //mengambil data pelanggan
		$item_total = $this->data->getCart($id_pelanggan)->result(); //mengambil data file di cart
		foreach($item_total as $item_total){
			
			$this->email->clear(TRUE); //menghapus attachment sebelumnya
			$this->email->set_newline("\r\n");
			$this->email->from('cumey02@gmail.com', 'ADM BPS JABAR RESPON'); //email sender
			$this->email->to($email); //email object

			$this->email->subject('Respon kirim data '.date("Y-m-d h:m:s"));
			$this->email->message("Berikut disertakan pengiriman data yang dilakukan oleh ".$nama_pelanggan." pada ".date("Y-m-d h:m:s"));
			
			/* This function will return a server path without symbolic links or relative directory structures. */
			$path = set_realpath($item_total->link_file); //lokasi file yang akan diattach
			$this->email->attach($path);  /* Enables you to send an attachment */
			if ( ! $this->email->send()){ //debug jika email tidak terkirim
				// $this->email->print_debugger();
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Email tidak dapat dikirim!
				</div>');
				redirect(site_url('pelanggan/view_keranjang'));
			}
			
			//insert data transaksi
			$data_transaksi = Array(
				'id_pelanggan' => $id_pelanggan,
				'id_data' => $item_total->id_data,
				'waktu' => date("Y-m-d h:m:s")
			);
			$this->t_transaksi_model->insertData($data_transaksi);
			
		}	
		$this->load->view('pelanggan/konfirmasi');
	}
	
	//untuk mentransfer file ke fd
	public function download_fd()
	{
		$penerima = $this->t_pelanggan_model->getMax()->result();
		// print_r($penerima);
		
		foreach ($penerima as $penerima){
			$id_pelanggan = $penerima->id_pelanggan;
			$email = $penerima->email;
			$nama_pelanggan = $penerima->nama;
		}		
		
		date_default_timezone_set('Asia/Jakarta');
		$item_total = $this->data->getCart($id_pelanggan)->result(); //mengambil data file di cart
		$target = "G:/BPS_PST"; //target pengiriman FD
		// echo $folder;
		foreach($item_total as $item_total){
			if (!mkdir($target, true)) {	//cek jika drive tidak ada
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Flashdisk tidak ditemukan!
				</div>');
				redirect(site_url('pelanggan/view_keranjang'));
			}else{
				if (!file_exists($target)) {	//cek folder
					copy($item_total->link_file,$target.$item_total->nama_berkas); //lokasi file dan target copy
				}else{
					copy($item_total->link_file,$target.$item_total->nama_berkas); //lokasi file dan target copy
				}
				//insert data transaksi
				$data_transaksi = Array(
					'id_pelanggan' => $id_pelanggan,
					'id_data' => $item_total->id_data,
					'waktu' => date("Y-m-d h:m:s")
				);
				$this->t_transaksi_model->insertData($data_transaksi);
			}
		}
		$this->load->view('pelanggan/konfirmasi');
	}
	
	function get_kota($prov){
		
		$this->load->model('city_model');
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->city_model->get_kota($prov)));
	}
	public function simpan_keranjang($id_data){
	
		
		$pelanggan = $this->t_pelanggan_model->getMax()->result();
		foreach ($pelanggan as $pelanggan){
			$id_pelanggan = $pelanggan->id_pelanggan;
		}
		//buat masukkin ke database
			$data = Array(
				'id_pelanggan' => $id_pelanggan,
				'id_data' => $id_data,
			);
			$status=1;
			$data1 = Array(
				'status_data' => $status,
			);
		$this->t_pelanggan_model->InsertKeranjang($data);
		$this->data->updateStatus($id_data,$data1);
		$this -> session -> set_flashdata('pemberitahuan',
		'<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		File telah dimasukkan pada keranjang!
		</div>');
		redirect('pelanggan/view_pelanggan');
	
	}
	public function hapus_keranjang($id_data){
	
		
		$pelanggan = $this->t_pelanggan_model->getMax()->result();
		foreach ($pelanggan as $pelanggan){
			$id_pelanggan = $pelanggan->id_pelanggan;
		}
		//buat masukkin ke database
			$status=0;
			$data1 = Array(
				'status_data' => $status,
			);
		$this->t_pelanggan_model->DeleteKeranjang($id_data);
		$this->data->updateStatus($id_data,$data1);
		$this -> session -> set_flashdata('pemberitahuan',
		'<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Data telah dihapus!
		</div>');
		redirect('pelanggan/view_pelanggan');
	}
	public function hapus_keranjang_view($id_data){
	
		
		$pelanggan = $this->t_pelanggan_model->getMax()->result();
		foreach ($pelanggan as $pelanggan){
			$id_pelanggan = $pelanggan->id_pelanggan;
		}
		//buat masukkin ke database
			$status=0;
			$data1 = Array(
				'status_data' => $status,
			);
		$this->t_pelanggan_model->DeleteKeranjang($id_data);
		$this->data->updateStatus($id_data,$data1);
		$this -> session -> set_flashdata('pemberitahuan',
		'<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Data telah dihapus!
		</div>');
		redirect('pelanggan/view_keranjang');
	}
	public function view_keranjang()
	{
		$data['pelanggan'] = $this->t_pelanggan_model->getMax()->result();
		$data['keranjang'] = $this->t_pelanggan_model->getAllKeranjang()->result();
		
		$this->load->view('pelanggan/view_keranjang',$data);
	}
	public function clear_keranjang($id)
	{
		//buat masukkin ke database
			$status=0;
			$data = Array(
				'status_data' => $status,
			);
			
			
		$this->t_pelanggan_model->ClearKeranjang($id);
		$this->data->updateAllStatus($data);
		$this -> session -> set_flashdata('pemberitahuan',
		'<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Keranjang telah Dikosongkan!
		</div>');
		redirect('pelanggan/view_keranjang');
	}
}
