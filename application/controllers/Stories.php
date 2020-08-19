S<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."controllers/Header_controller.php");


class Stories extends Header_controller {
	
	function index(){
		$this->header2019();
		$this->load->view("main2019/stories2019/stories");
		$this->footer();
	}
	
	
}
