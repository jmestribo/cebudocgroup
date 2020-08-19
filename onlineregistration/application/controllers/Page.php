<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Login_model','select');
		$this->load->model("Create_model","create");
		$this->checksession();
	}
	function checksession(){
		if (!isset($_SESSION['idno'])) {
			
		}else{
			redirect("PatientInformation/");
		}
	}
	function index(){

		
		$this->signin();
	}

	function signin(){
		$data['header'] = "include/login_header";
		$data['body'] = "login/signin";
		$this->load->view("login/template", $data);

	}

	function signup(){

		$data['header'] = "include/login_header";
		$data['body'] = "login/signup";
		$this->load->view("login/template", $data);
	}

	function checkaccount(){

		$data = $this->input->post();
		$password = $data['password'];
		$idno = $data['idno'];
		$check = $this->select->login($idno,$password);
		if ($check) {
			$this->session->set_flashdata("response","You are now Logged in");
			$_SESSION['idno'] = $check->idno;
			$_SESSION['name'] = $check->firstname.' '.$check->lastname;
			$_SESSION['department'] = $check->department;
			redirect("PatientInformation/");
		}
		else{
			$this->session->set_flashdata("response","Incorrect IDNO or Password!");
			redirect("Page/signin");
		}
	}


	function createaccount(){

		$data = $this->input->post();
		$this->select->createaccount($data);
		redirect("Page/signin");
	}

}