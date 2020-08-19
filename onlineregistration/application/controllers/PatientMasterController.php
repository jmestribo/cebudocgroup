<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientMasterController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model','login');
		$this->load->model("LabPatientMasterModel","create");
		$this->load->model("get_model","get");

	}
	function SavePatientMaster(){

		$data = $this->input->post();

		return $this->create->PatientMaster($data);

	}
}