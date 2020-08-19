<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ourdoctors extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('doctors_model');
	}

	function index(){
		$this->settings();
	}

	function settings($data){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, clinical services, center of excellence, executive check-up program, delivery room, emergency room, operating room, internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH) offers clinical services (internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical)';
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function viewall(){
		$data['title'] = 'Medical Team | Our Doctors | CebuDoc Group';
		$data['main'] = 'pages/ourdoc';
		$data['records'] = $this->doctors_model->doctors_list();
		$this->settings($data);
	}

	function profile(){
		$data['title'] = 'Medical Team | Our Doctor\'s Profile | CebuDoc Group';
		$uri = $this->uri->segment(3);
        $data['records'] = $this->doctors_model->profile($uri);
        $data['schedule'] = $this->doctors_model->schedule($uri);
		$data['main'] = 'pages/docprof';
        $this->settings($data);
    }










































}
