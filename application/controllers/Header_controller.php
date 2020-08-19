<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class header_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	function header2019(){
		
		$this->load->view('include/header');
		$this->load->view('include/navbar2019');
	}
	function header2018(){
		$this->load->view('include/header');
		$this->load->view('include/navbar2018');
	}
	function footer(){
		$this->load->view('include/footer');
	}

	function mainheader(){

		$this->load->view('include/header');
		$this->load->view('include/mainheader');
	}

}
