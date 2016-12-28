<?php
	class t_petugas_model extends CI_Model {		
        //variable untuk crud
		var $table = 't_petugas';
		var $column = array('nip','nama_petugas','email','username','password','jabatan');
		var $order = array('nip' => 'desc');
		
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
				$this->load->database();
        }

        function check_login($username, $password)
		{
			$this->db->select('*');
			$this->db->from('t_petugas');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			return $this->db->get();
		}
		public function getAll()
        {
				$this->db->select('*');
				$this->db->from('t_petugas');
              
                return $this->db->get();
        }
        public function getPetugasById($nip)
        {
				$this->db->where("nip", $nip);
				return $this->db->get('t_petugas');
        }
        public function getTotalPetugas()
        {
				$this->db->select('COUNT(nip) as jumlah');
				$this->db->from('t_petugas');
				return $this->db->get();
        }		
		
		public function check_user_account($nip){
			$this->db->select('*');
			$this->db->from('t_petugas');
			$this->db->where('nip',$nip);
			return $this->db->get();
		}
		
		public function TambahPetugas($data){
			$this -> db -> insert('t_petugas',$data);
		}
		
		public function UpdatePetugas($id,$data){
			$this -> db -> where('nip', $id);
			$this -> db -> update('t_petugas',$data);
		}
		
		public function DeletePetugas($id){
			$this -> db -> where('nip', $id);
			$this -> db -> delete('t_petugas');
		}
		
		public function graphPelanggan($bulan,$tahun){
			$sql = $this->db->query("
			select r_pekerjaan.nama_pekerjaan, count(t_pelanggan.id_pekerjaan) as jumlah 
			from r_pekerjaan,t_pelanggan 
			where t_pelanggan.id_pekerjaan=r_pekerjaan.id_pekerjaan 
			and month(t_pelanggan.tanggal) = $bulan
			and year(t_pelanggan.tanggal) = $tahun
			group by t_pelanggan.id_pekerjaan
			");
			
			return $sql;			
		}
		
		public function printPelanggan($bulan,$tahun){
			$sql = $this->db->query("
				SELECT tanggal, 
					count(id_pekerjaan) as Jp,
					sum(id_pekerjaan = 1) as PNS,
					sum(id_pekerjaan = 2) as PS,
					sum(id_pekerjaan = 3) as Wirausaha,
					sum(id_pekerjaan = 4) as MP
				FROM t_pelanggan
				where year(tanggal) = $tahun
				and month(tanggal) = $bulan
				group by day(tanggal)
			");
			
			return $sql;			
		}
	}
?>