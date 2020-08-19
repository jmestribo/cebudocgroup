<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_team extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('doctors_model');
	}

	function index(){
		$this->medical_team();
	}

	function medical_team(){
		$data['header'] = 'settings/header';
		$data['description'] = 'Medical Team';
		$data['keywords'] = '';
		$data['title'] = 'Medical Team';
		$data['main'] = 'sitemap/medicalteam';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function settings($data){
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function our_doctors(){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, clinical services, center of excellence, executive check-up program, delivery room, emergency room, operating room, internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH) offers clinical services (internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical)';
		$data['title'] = 'Medical Team | Our Doctors | CebuDoc Group';
		$data['main'] = 'pages/ourdoc';
		$data['records'] = $this->doctors_model->doctors_list();
		$this->settings($data);
	}

	function profile(){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, clinical services, center of excellence, executive check-up program, delivery room, emergency room, operating room, internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH) offers clinical services (internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical)';
		$data['title'] = 'Medical Team | Our Doctor\'s Profile | CebuDoc Group';
		$uri = $this->uri->segment(3);
        $data['records'] = $this->doctors_model->profile($uri);
        $data['schedule'] = $this->doctors_model->schedule($uri);
		$data['main'] = 'pages/docprof';
        $this->settings($data);
    }

    function research_committee(){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country. The 300- Bed capacity, state of the art facilities and ultra modern hospital complex rises on a 5,166 square meters ground that accommodate the main hospital and medical clinic buildings. It has 1,200 employees and 326 medical doctors, all trained to provide the highest quality and excellent personalized patient health care.';
        $data['header'] = 'settings/header';
		$data['title'] = 'Research Committee | CebuDoc Group';
		$data['main'] = 'pages/research';
		$this->settings($data);
	}

	function _remap($method){
  		$param_offset = 2;
  		// Default to index
  		if ( ! method_exists($this, $method)){
    		// We need one more param
    		$param_offset = 1;
    		$method = 'index';
  		}

  		// Since all we get is $method, load up everything else in the URI
  		$params = array_slice($this->uri->rsegment_array(), $param_offset);

  		// Call the determined method with all params
  		call_user_func_array(array($this, $method), $params);
	}  










































}
