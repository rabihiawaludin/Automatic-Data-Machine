<?php
	class t_transaksi_model extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		 public function getAll()
        {
			$sql=('select t_data.nama_file,
		sum(t_pelanggan.id_pekerjaan = 1) as PNS,
		sum(t_pelanggan.id_pekerjaan = 2) as PS,
		sum(t_pelanggan.id_pekerjaan = 3) as Wirausaha,
		sum(t_pelanggan.id_pekerjaan = 4) as MP,
		count(t_transaksi.id_transaksi) as total
		from t_pelanggan,t_data,t_transaksi
		where t_transaksi.id_pelanggan = t_pelanggan.id_pelanggan 
		and t_transaksi.id_data=t_data.id_data  
		group by t_data.nama_file');
			
			return $this->db->query($sql);
         
        }
		
		public function insertData($data)
        {
			$this->db->insert('t_transaksi', $data);
			
			return $this->db->insert_id();
        }
		
		public function getTotalTransaksi()
        {
				$this->db->select('COUNT(id_transaksi) as jumlah');
				$this->db->from('t_transaksi');
				return $this->db->get();
        }
		
		public function printTransaksi($bulan,$tahun){
			$sql = $this->db->query("
				select t_data.nama_file,
				sum(t_pelanggan.id_pekerjaan = 1) as PNS,
				sum(t_pelanggan.id_pekerjaan = 2) as PS,
				sum(t_pelanggan.id_pekerjaan = 3) as Wirausaha,
				sum(t_pelanggan.id_pekerjaan = 4) as MP,
				count(t_transaksi.id_transaksi) as total
				from t_pelanggan,t_data,t_transaksi
				where t_transaksi.id_pelanggan = t_pelanggan.id_pelanggan 
				and t_transaksi.id_data=t_data.id_data 
				and year(t_transaksi.waktu) = $tahun
				and month(t_transaksi.waktu) = $bulan
				group by t_data.nama_file
				order by total desc
			");
			
			return $sql;			
		}
		
	}
?>