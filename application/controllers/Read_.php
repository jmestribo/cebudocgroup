<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."controllers/Header_controller.php");


class Read_ extends Header_controller {
	
	function more(){
		$url3 = $this->uri->segment(3);
		$this->header2018();
		$this->load->view("main2018/readmore2018/".$url3."");
		$this->footer();
	}
}
