<?php

	class User_model extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		// melihat halaman login 

		// cek keberadaan user di sistem 
		function check_user_account($username,$password){
			$this->db->select('*');
			$this->db->from('t_petugas');
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get();
		}

	}