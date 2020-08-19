<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."controllers/Header_controller.php");
class Healthful2019 extends Header_controller {
	
	function index()
	{
		$this->header2019();
		$this->load->view("main2019/main");
		$this->footer();
	}

	function profile(){
		$url2 = $this->uri->segment(2);
		$this->header2019();
		$this->load->view("main2019/".$url2."");
		$this->footer();
	}

	function updates(){
		$url2 = $this->uri->segment(2);
		$this->header2019();
		$this->load->view("main2019/".$url2."");
		$this->footer();
	}

	function community(){
		$url2 = $this->uri->segment(2);
		$this->header2019();
		$this->load->view("main2019/".$url2."");
		$this->footer();
	}
	function sample(){
		$url2 = $this->uri->segment(2);
		$this->mainheader();
		$this->load->view("main2019/sample");
		$this->footer();
		
	}
}
