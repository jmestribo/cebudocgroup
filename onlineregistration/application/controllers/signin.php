<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("signin_model","signin_model");
		$this->load->model("login_model","login");

	}
	function checksession(){
		if (!isset($_SESSION['user_code'])) {
			redirect("signin/signin");
		}else{
			redirect("Helpdesk/Dashboard");
		}
	}
	function header(){
		$this->load->view("include/header");
	}
	function footer(){
		$this->load->view("include/footer");
	}
	function script(){
		$this->load->view("include/script");
	}
	function index()
	{
		$this->checksession();
		$this->signin();
	}
	function signin(){
		$this->header();
		$this->load->view("login/signin");
		$this->script();
	}
	function signup(){
		$this->header();
		$this->load->view("login/signup");
		$this->script();
		$this->load->view("js/register_js");
	}
	function register(){
		$data = $this->input->post();
		$email = $data['email'];

		$result = $this->db->select("*")->from("tbl_users")->where("email",$email)->get()->row();
		
		if (count($result) > 0) {

			$this->session->set_flashdata("response","Your Email has already exists!");
			redirect('signin/signup');


		}else{

			$this->session->set_flashdata("response","You are now Logged in");
			$result = $this->signin_model->registeraccount($data);
			if ($result) {
			
				redirect('signin');
			}

		}
		
	}
}