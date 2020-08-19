<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."controllers/Header_controller.php");

class View_Stories extends Header_controller {
	function index(){
		$url3 = $this->uri->segment(3);
		$this->header2018();
		$this->load->view("main2018/stories2018/Stories");
		$this->footer();
	}
	
}
