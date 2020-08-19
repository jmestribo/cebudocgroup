<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class signin_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->model('get_model',"get");
	}
	function registeraccount($data){
			
			$datalist['name'] = $data['name'];
			$datalist['ipaddress'] = $data['ipaddress']; 
			$datalist['email'] = $data['email']; 
			$datalist['password'] =password_hash($data['registerPassword'], PASSWORD_DEFAULT);
			$datalist['user_code'] = date('Ymdhis',strtotime("+16 Hours")); 
			$datalist['datecreated'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
			$datalist['user_code'] = date('Ymdhis',strtotime("+16 Hours")); 
			$datalist['status'] = "Active"; 
			$datalist['user_type'] = "User"; 
			return $result = $this->db->insert('tbl_users', $datalist);
	}
}

