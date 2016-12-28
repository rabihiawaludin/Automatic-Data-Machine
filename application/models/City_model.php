<?php
class City_model extends CI_Model {
 
public function __construct() {
 $this -> load -> database();
 
}
 

function get_kota($country = null){
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
 
}
?>