<?php
class Country_model extends CI_Model {
 
	public function __construct() {
		$this -> load -> database();
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
 
}
?>