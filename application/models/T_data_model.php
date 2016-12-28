<?php
	class t_data_model extends CI_Model {
		private $primary_key = 'id_data';
        
		//variable untuk crud
		var $table = 't_data';
		var $column = array('nama_file','nama_berkas','tanggal','id_umum','id_khusus');
		var $order = array('id_data' => 'desc');
		
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		public function getAll()
        {
			$sql = $this->db->query("
			select t_data.*, r_umum.kategori as kategoriUmum, r_khusus.kategori as kategoriKhusus
			from t_data, r_umum, r_khusus
			where t_data.id_umum=r_umum.id_umum
			and t_data.id_khusus=r_khusus.id_khusus");
			
			return $sql;
        }
		public function getAllKategori()
        {
			$sql = $this->db->query("select t_data.*, r_umum.kategori
			from t_data, r_umum
			where t_data.id_umum=r_umum.id_umum");
			
			return $sql;
        }
		
        public function getDataById($id)
        {
				$this->db->select('*');
				$this->db->from('t_data');
				$this->db->where('id_data', $id);
				
				return $this->db->get();
        }
		
		public function insertBerkas($data)
        {
			$this->db->insert('t_data', $data);
			
			return $this->db->insert_id();
        }
		
		function updateBerkas($id, $data)
		{
			$this->db->where($this->primary_key, $id);
			$this->db->update('t_data', $data);
		}
		
		function deleteBerkas($id)
		{
			$this->db->where($this->primary_key, $id);
			$this->db->delete('t_data');
		}
		
		function updateStatus($id, $data)
		{
			$this->db->where($this->primary_key, $id);
			$this->db->update('t_data', $data);
		}
		
		function updateAllStatus($data)
		{
			$this->db->update('t_data', $data);
		}
		
		function getTotalBerkas(){
			$this->db->select('COUNT(id_data) as jumlah');
			$this->db->from('t_data');
			return $this->db->get();
		}
		
		function countCart($id){
			$this->db->select('COUNT(id_keranjang) as jumlah');
			$this->db->where('id_pelanggan',$id);
			$this->db->from('t_keranjang');
			
			return $this->db->get();
		}
		
		public function getCart($id)
        {
			$sql = $this->db->query("select t_keranjang.*, t_data.*
			from t_keranjang, t_data
			where t_keranjang.id_pelanggan=$id and t_keranjang.id_data=t_data.id_data");
			
			return $sql;
        }
		
		public function flushCart($id)
		{
			$this->db->delete('t_keranjang', array('id_pelanggan' => $id)); 
		}
		//fungsi crud json
		
		private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_data',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_data', $id);
		$this->db->delete($this->table);
	}
	function get_provinsi() {
		$this -> db -> select('id_umum, kategori');
		$query = $this -> db -> get('r_umum');
		$countries = array();
		if ($query -> result()) {
		foreach ($query->result() as $country) {
		$countries[$country -> id_umum] = $country -> kategori;
		}
		return $countries;
		} else {
		return FALSE;
		}
	}
	function get_khusus($country = null){
	 $this->db->select('id_khusus, kategori');
	 
	 if($country != NULL){
		$this->db->where('id_umum', $country);
	 }
	 
	 $query = $this->db->get('r_khusus');
	 
	 $cities = array();
	 
	 if($query->result()){
		 foreach ($query->result() as $city) {
		 $cities[$city->id_khusus] = $city->kategori;
	 }
	 return $cities;
	 }else{
		return FALSE;
	 }
}
	function check_data_transaksi($id){
		$this->db->select('*');
		$this->db->from('t_transaksi');
		$this->db->where('id_data',$id);
		return $this->db->get();
	}
	}
?>