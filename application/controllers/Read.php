<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."controllers/Header_controller.php");


class Read extends Header_controller {
	
	function more(){
		$url3 = $this->uri->segment(3);
		$this->header2019();
		$this->load->view("main2019/readmore2019/".$url3."");
		$this->footer();
	}
}
