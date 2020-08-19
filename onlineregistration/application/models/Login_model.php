<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		// $this->load->model('authentication','logintbl');
	}

	public function check_account($email,$password){
		// $password1 = $this->encrypt->hash($password);
		
		$this->db->select("*");
		$this->db->from("tbl_useraccount");
		$this->db->where(array('username'=>$email,'password'=>$password));
		$query = $this->db->get();
		$num = $query->num_rows();
		if ($num > 0) {
				return $query->row();
		}else{
			return false;
		}
	}
	
	function activating_account($id){
		$field['action'] = "Approved";
		$result = $this->db->where("user_code",$id)
				->update("tbl_useraccount",$field);
		return $result;
	}

	function login($idno,$password){

		$this->db->select("*");
		$this->db->from("tbl_UserAccountOnline");
		$this->db->where(array('idno'=>$idno,'password'=>$password));
		$query = $this->db->get();
		$num = $query->num_rows();
		if ($num > 0) {
				return $query->row();
		}else{
			return false;
		}
	}




	function createaccount($data){

		$field['firstname'] = $data['fname'];
		$field['lastname'] = $data['lname'];
		$field['idno'] = $data['idno'];
		$field['password'] = $data['password'];
		$field['department'] = "marketing";
		$field['type'] = "Active";
		return $this->db->insert("tbl_UserAccountOnline",$field);

	}

	function login1($email){

		$result = $this->db->select("*")
			->from("tbl_useraccount")
			->where("username",$email)
			->get()
			->row();
		return $result;
	 }

}