<?php
	class r_khusus_model extends CI_Model {
		private $primary_key = 'id_khusus';
		
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		public function getAll()
        {
				$this->db->select('*');
				$this->db->from('r_khusus');
              
                return $this->db->get();
        }
        public function getData($id)
        {
				$this->db->where($this->primary_key, $id);
				return $this->db->get('r_khusus');
        }
		
		public function insertData($data){
				$this->db->insert('r_khusus', $data);
				return $this->db->insert_id();
		}
		function updateData($id, $data){
			$this->db->where($this->primary_key, $id);
			$this->db->update('r_khusus', $data);
		}
		
		function deleteData($id){
			$this->db->where($this->primary_key, $id);
			$this->db->delete('r_khusus');
		}
		
		function check_data($id){
			$this->db->select('*');
			$this->db->from('t_data');
			$this->db->where('id_khusus',$id);
			return $this->db->get();
		}

	}
?>