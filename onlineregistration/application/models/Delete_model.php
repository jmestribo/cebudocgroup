<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class delete_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function delete($data){
		$id = $data['id'];
		$tblname =  $data['table'];
		$column = $data['column'];
		return $this->db->delete($tblname, array($column=>$id));
	}
}

