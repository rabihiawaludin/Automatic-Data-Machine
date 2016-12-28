<?php
	class r_umum_model extends CI_Model {
		private $primary_key = 'id_umum';
		
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		public function getAll()
        {
				$this->db->select('*');
				$this->db->from('r_umum');
              
                return $this->db->get();
        }
        public function getData($id)
        {
				$this->db->where($this->primary_key, $id);
				return $this->db->get('r_umum');
        }
		
		public function insertData($data){
				$this->db->insert('r_umum', $data);
				return $this->db->insert_id();
		}
		
		function updateData($id, $data){
			$this->db->where($this->primary_key, $id);
			$this->db->update('r_umum', $data);
		}
		
		function deleteData($id){
			$this->db->where($this->primary_key, $id);
			$this->db->delete('r_umum');
		}
		
		function check_data($id){
			$this->db->select('*');
			$this->db->from('r_khusus');
			$this->db->where('id_umum',$id);
			return $this->db->get();
		}
		
		function check_data_berkas($id){
			$this->db->select('*');
			$this->db->from('t_data');
			$this->db->where('id_umum',$id);
			return $this->db->get();
		}

	}
?>