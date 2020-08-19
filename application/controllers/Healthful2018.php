<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."controllers/Header_controller.php");
class Healthful2018 extends Header_controller {
	
	function index()
	{
		$this->header2018();
		$this->load->view("main2018/main");
		$this->footer();
	}

	function profile(){
		$url2 = $this->uri->segment(2);
		$this->header2018();
		$this->load->view("main2018/".$url2."");
		$this->footer();
	}

	function updates(){
		$url2 = $this->uri->segment(2);
		$this->header2018();
		$this->load->view("main2018/".$url2."");
		$this->footer();
	}

	function community(){
		$url2 = $this->uri->segment(2);
		$this->header2018();
		$this->load->view("main2018/".$url2."");
		$this->footer();
	}
}
