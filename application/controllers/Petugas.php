<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> library('cart');
		$this -> load -> helper('form');
		$this -> load -> helper('date');
		$this -> load -> helper('text');
		$this->load->helper('url');
		$this->load->model('t_petugas_model','',TRUE);
		$this->load->model('t_pelanggan_model','',TRUE);
		$this->load->model('r_umum_model','',TRUE);
		$this->load->model('r_khusus_model','',TRUE);
		$this->load->model('t_data_model','',TRUE);
		$this->load->model('country_model','',TRUE);
		$this->load->model('t_transaksi_model','',TRUE);
	}
	public function index(){
		$this->load->view('login/form_login');
	}
	public function view_beranda(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['identitas'] = $this->t_petugas_model->getPetugasById($this->session->userdata('nip'))->result();
			
			//Data untuk Dashboard
			$data['total_petugas'] = $this->t_petugas_model->getTotalPetugas()->row();
			$data['total_berkas'] = $this->t_data_model->getTotalBerkas()->row();
			$data['total_pelanggan'] = $this->t_pelanggan_model->getTotalPelanggan()->row();
			$data['total_transaksi'] = $this->t_transaksi_model->getTotalTransaksi()->row();
			// $data['total_pelanggan_perhari'] = $this->t_pelanggan_model->getTPelangganPerhari()->row();
			
			$data['total_petugas'] = $data['total_petugas']->jumlah;
			$data['total_berkas'] = $data['total_berkas']->jumlah;
			$data['total_pelanggan'] = $data['total_pelanggan']->jumlah;
			$data['total_transaksi'] = $data['total_transaksi']->jumlah;
			// $data['total_pelanggan_perhari'] = $data['total_pelanggan_perhari']->jumlah;
			
			$this->load->view('petugas/index.php',$data);
		}
	}
	public function view_profil_petugas(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['identitas'] = $this->t_petugas_model->getPetugasById($this->session->userdata('nip'))->result();
			
			$this->load->view('petugas/view_profil_petugas.php',$data);
		}
	}
	public function proses_edit_profil(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect(site_url('account'));
		}
		$id=$data['nip']=$this->input->post('nip');
		$data['nama_petugas']=$this->input->post('nama');
		$data['jabatan']=$this->input->post('jabatan');
		$data['email']=$this->input->post('email');
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
		
		//form validation
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[6]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		
		if($this->form_validation->run() == FALSE){
			$data['identitas'] = $this->t_petugas_model->getPetugasById($this->session->userdata('nip'))->result();
			$this->load->view('petugas/view_profil_petugas',$data);
		}
		else{
			$this->t_petugas_model->updatePetugas($id,$data);
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Sunting Data Berhasil!
			</div>');
			redirect('petugas/view_profil_petugas');
		}
	}
	public function view_petugas(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['identitas'] = $this->t_petugas_model->getPetugasById($this->session->userdata('nip'))->result();
			//Data untuk tabel
			$data['data_petugas'] = $this->t_petugas_model->getAll()->result();
			
			$this->load->view('petugas/view_petugas.php',$data);
		}
	}
	
	public function view_data_berkas(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['identitas'] = $this->t_petugas_model->getPetugasById($this->session->userdata('nip'))->result();
			//Data untuk tabel
			$data['data_berkas'] = $this->t_data_model->getAll()->result();
			$data['umum'] = $this->r_umum_model->getAll()->result();
			$data['khusus'] = $this->r_khusus_model->getAll()->result();
			$data['provinsi'] = $this -> country_model -> get_provinsi();
			
			$this->load->view('petugas/view_data_berkas.php',$data);
		}
	}
	public function view_kategori(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['identitas'] = $this->t_petugas_model->getPetugasById($this->session->userdata('nip'))->result();
			//Data untuk tabel
			$data['data_subjek'] = $this->r_umum_model->getAll()->result();
			$data['data_kategori'] = $this->r_khusus_model->getAll()->result();
			
			$this->load->view('petugas/view_kategori.php',$data);
		}
	}
	public function tambah_subjek(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['kategori']= $this->input->post('subjek');
			$this->r_umum_model->InsertData($data);
		
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Tambah Subjek Statistik Berhasil!
			</div>');
			redirect('petugas/view_kategori');
		}
	}
	public function tambah_kategori($id){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['id_umum']= $id;
			$data['kategori']= $this->input->post('kategori');
			$this->r_khusus_model->InsertData($data);
		
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Tambah Kategori Statistik Berhasil!
			</div>');
			redirect('petugas/view_kategori');
		}
	}
	public function edit_subjek($id){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['kategori']= $this->input->post('subjek');
			$this->r_umum_model->UpdateData($id,$data);
		
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Sunting Subjek Statistik Berhasil!
			</div>');
			redirect('petugas/view_kategori');
		}
	}
	public function edit_kategori($id){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$data['kategori']= $this->input->post('kategori');
			$this->r_khusus_model->UpdateData($id,$data);
		
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Sunting Kategori Berhasil!
			</div>');
			redirect('petugas/view_kategori');
		}
	}
	public function hapus_subjek($id){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}else{
			$temp_account = $this->r_umum_model->check_data($id)->row();
			$temp_account1 = $this->r_umum_model->check_data_berkas($id)->row();
			$num_account = count($temp_account);
			$num_account1 = count($temp_account1);
			if($num_account>0){
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Subjek tidak dapat dihapus karena masih memiliki kategori!
				</div>');
				redirect('petugas/view_kategori');
			}else if($num_account1>0){
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Subjek tidak dapat dihapus karena terdapat pada berkas!
				</div>');
				redirect('petugas/view_kategori');
			}else{
				$this->r_umum_model->DeleteData($id);
			
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Hapus Subjek Berhasil!
				</div>');
				echo "3";
				redirect('petugas/view_kategori');
			}
		}
	}
	public function hapus_kategori($id){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect('account');
		}
			$temp_account = $this->r_khusus_model->check_data($id)->row();
			$num_account = count($temp_account);
			if($num_account>0){
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Kategori tidak dapat dihapus karena terdapat pada berkas!
				</div>');
				redirect('petugas/view_kategori');
			}else{
				$this->r_khusus_model->DeleteData($id);
			
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Hapus Subjek Berhasil!
				</div>');
				redirect('petugas/view_kategori');
			}
			
	}
	
	//Proses tambah petugas
	public function proses_tambah_petugas(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect(site_url('account/login'));
		}
		$data['nip']=$this->input->post('nip');
		$data['nama_petugas']=$this->input->post('Nama');
		$data['email']=$this->input->post('email');
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
		$data['jabatan']=$this->input->post('jabatan');
		
		$temp_account = $this->t_petugas_model->check_user_account($data['nip'])->row();
		$num_account = count($temp_account);
		if($num_account>0){
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			NIP telah digunakan telah digunakan!
			</div>');
			redirect('petugas/view_petugas');
		}else{
			$this->t_petugas_model->TambahPetugas($data);
		
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Tambah Petugas Berhasil!
			</div>');
			redirect('petugas/view_petugas');
		}
		
	}
	
	//Proses Edit Petugas
	public function proses_edit_petugas(){
		$logged_in = $this->session->userdata('nip');
		if(!$logged_in){
			redirect(site_url('account/login'));
		}
		$id=$data['nip']=$this->input->post('nip');
		$data['nip']=$this->input->post('nip');
		$data['nama_petugas']=$this->input->post('Nama');
		$data['email']=$this->input->post('email');
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
		$data['jabatan']=$this->input->post('jabatan');
		$this->t_petugas_model->UpdatePetugas($id,$data);
		
		$this -> session -> set_flashdata('pemberitahuan',
		'<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Sunting Data Berhasil!
		</div>');
		
		redirect('petugas/view_petugas');		
	}
	
	//Proses Hapus Petugas
	public function hapus_petugas($id){
		//ini proses untuk mengecek session
		$logged_in = $this -> session -> userdata('nip');
		if(!$logged_in){
			redirect(site_url('account/login'));
		}
			$this->t_petugas_model->DeletePetugas($id);
			$this -> session -> set_flashdata('pemberitahuan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Hapus Petugas Berhasil!</div>');
		redirect('petugas/view_petugas');
	}
	
	function get_kota($prov){
		
		$this->load->model('city_model');
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->city_model->get_kota($prov)));
	}
	
	//fungsi upload file
	public function tambah_berkas()
	{		
		$logged_in = $this -> session -> userdata('nip');
		if(!$logged_in){
			redirect(site_url('account/login'));
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|PDF|docx|doc';
		$config['max_size']	= '2048';
		$config['file_name'] = $this->input->post('nama_file');

		$this->load->library('upload', $config);
		// $this->upload->initialize($config);

		if ( ! $this->upload->do_upload('berkas'))
		{
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Tambah Berkas Error!
			</div>');
			redirect('petugas/view_data_berkas');
		}
		else
		{
			$file_data = $this->upload->data();
			$file_path =  './uploads/'.$file_data['file_name'];
			//buat masukkin ke database
			$data = Array(
				'nama_file' => $this->input->post('nama_file'),
				'nama_berkas' => $this->upload->file_name,
				'link_file' => $this->upload->data('full_path'),
				'tanggal' => date("Y-m-d h:m:s"),
				'id_umum' => $this->input->post('umum'),
				'id_khusus' => $this->input->post('khusus'),
			);
			$this->t_data_model->insertBerkas($data);
			$data = array('upload_data' => $this->upload->data());
			
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Tambah Berkas Berhasil!
			</div>');
			redirect('petugas/view_data_berkas');
		}
	}
	
	public function edit_berkas($id)
	{	
		$logged_in = $this -> session -> userdata('nip');
		if(!$logged_in){
			redirect(site_url('account/login'));
		}
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '2048';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('berkas'))
		{
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Sunting Berkas Error!
			</div>');
			redirect('petugas/view_data_berkas');
		}
		else
		{
			//buat masukkin ke database
			$data = Array(
				'nama_file' => $this->input->post('nama_file'),
				'nama_berkas' => $this->upload->file_name,
				'link_file' => $this->upload->data('full_path'),
				'tanggal' => date("Y-m-d h:m:s"),
				'id_umum' => $this->input->post('umum'),
				'id_khusus' => $this->input->post('khusus'),
			);
			$this->t_data_model->updateBerkas($id,$data);
			$data = array('upload_data' => $this->upload->data());
			
			$this -> session -> set_flashdata('pemberitahuan',
			'<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Sunting Berkas Berhasil!
			</div>');
			redirect('petugas/view_data_berkas');
		}
	}
	
	public function hapus_berkas($id){
		//ini proses untuk mengecek session
		$logged_in = $this -> session -> userdata('nip');
		if(!$logged_in){
			redirect(site_url('account/login'));
		}		
			$temp_account = $this->t_data_model->check_data_transaksi($id)->row();
			$num_account = count($temp_account);
			if($num_account>0){
				$this -> session -> set_flashdata('pemberitahuan',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Berkas tidak dapat dihapus karena masih terdapat pada transaksi!
				</div>');
				redirect('petugas/view_data_berkas');
			}else{
				$this->t_data_model->deleteBerkas($id);
			
				//hapus file di folder upload
				$data['delete'] = $this->t_data_model->getDataById($id)->row();
				$link_file = $data['delete']->link_file;
				unlink($link_file);
				
				$this -> session -> set_flashdata('pemberitahuan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Hapus Berkas Berhasil!</div>');
				redirect('petugas/view_data_berkas');
			}
			
	}

	//keluar sistem petugas
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('petugas'));
	}
	
}
