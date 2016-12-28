<?php
	class t_pelanggan_model extends CI_Model {
		
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getPelanggan()
        {
			$this->db->select('*');
			$this->db->from('t_pelanggan');
			return $this->db->get();
        }
		
		public function updateEmail($id,$data)
        {
			$this->db->where('id_pelanggan',$id);
			$this->db->update('t_pelanggan',$data);
        }
		
		public function getAll()
        {
			$sql=('select t_pelanggan.*, r_pekerjaan.nama_pekerjaan
			from t_pelanggan,r_pekerjaan
			where t_pelanggan.id_pekerjaan=r_pekerjaan.id_pekerjaan');
			
			return $this->db->query($sql);
        }
		
		public function getLaporan()
        {
			$sql=('SELECT *, 
				count(id_pekerjaan) as Jp,
				sum(id_pekerjaan = 1) as PNS,
				sum(id_pekerjaan = 2) as PS,
				sum(id_pekerjaan = 3) as Wirausaha,
				sum(id_pekerjaan = 4) as MP
			FROM t_pelanggan
			GROUP BY tanggal;
			');
			
			return $this->db->query($sql);
        }
		
		public function getPekerjaan()
        {
			$this->db->select('*');
			$this->db->from('r_pekerjaan');
			return $this->db->get();
        }
		
		public function insertData($data)
        {
			$this->db->insert('t_pelanggan', $data);
			
			return $this->db->insert_id();
        }
		// ''
		public function getMax()
        {
			$sql = $this->db->query("select * from t_pelanggan where id_pelanggan = (select max(id_pelanggan) from t_pelanggan)");
			
			return $sql;
        }
		public function insertBerkas($data)
        {
			$this->db->insert('t_data', $data);
			
			return $this->db->insert_id();
        }
		public function getTotalPelanggan()
        {
				$this->db->select('COUNT(id_pelanggan) as jumlah');
				$this->db->from('t_pelanggan');
				return $this->db->get();
        }
		public function InsertKeranjang($data)
		{
			$this->db->insert('t_keranjang', $data);
			
			return $this->db->insert_id();
		}
		public function DeleteKeranjang($id)
		{
			$this->db->where('id_data',$id);
			$this->db->delete('t_keranjang');
		}
		public function getAllKeranjang(){
			$sql = $this->db->query("
			select r_umum.kategori, t_data.nama_file, t_data.tanggal, t_data.nama_berkas, t_keranjang.id_data
			from t_data, t_keranjang, r_umum 
			where t_data.id_umum=r_umum.id_umum
			and t_keranjang.id_data=t_data.id_data 
			and t_keranjang.id_pelanggan = (select max(id_pelanggan) from t_pelanggan)");
			
			return $sql;
		}
		public function ClearKeranjang($id){
			$this->db->where('id_pelanggan',$id);
			$this->db->delete('t_keranjang');
		}
	}

?>