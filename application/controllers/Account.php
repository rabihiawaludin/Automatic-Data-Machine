<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{

	function __construct(){

		parent::__construct();

		// load model user_model
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	// menuju halaman login 

	public function index(){
		$this->load->view('login/form_login');
	}

	// memeriksa keberadaan akun username 
	
	public function login(){
		$username = $this->input->post('username','true');
		$password = $this->input->post('password','true');
		
		$temp_account = $this->user_model->check_user_account($username,$password)->row();
		$num_account = count($temp_account);
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/form_login');
		}else{
			if ($num_account > 0){
			$array_items = array(
				'nip' =>$temp_account->nip,
				'nama_petugas' =>$temp_account->nama_petugas,
				'logged_in' => true);
				$this->session->set_userdata($array_items);
				if($temp_account->jabatan=='Petugas'){	
					redirect(site_url('petugas/view_beranda'));
				}else if($temp_account->jabatan=='Pimpinan'){
					redirect(site_url('pimpinan/view_beranda'));
				}else if($temp_account->jabatan=='Admin'){
					redirect(site_url('admin/view_beranda'));
				}
			}else{
				$this->session->set_flashdata('notification','Peringatan : Username dan Password tidak cocok');
				redirect(site_url('account'));
			}
		}
	}

	// keluar dari sistem
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('account'));
	}

}
