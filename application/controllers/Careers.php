<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('careers_model');
	}

	function index(){
		$this->careers();
	}

	function settings($data){
		$data['keywords'] = 'news and events, cebu doctors, cebu doctors\' university hospital, CDUH, latest happenings, careers, job opportunity, hiring, job vacancy, pharmacist, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, employment';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function careers(){
    $data['header'] = 'settings/header';
    $data['description'] = 'Careers';
    $data['keywords'] = '';
    $data['title'] = 'Careers';
    $data['main'] = 'sitemap/careers';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
}

	function administrative_professionals(){
		$data['title'] = 'Careers: Administrative Professionals | CebuDoc Group';
		$data['main'] = 'careers/adminprof';
		$data['cduhcareers'] = $this->careers_model->cduhcareersadmin();
        $data['mdhcareers'] = $this->careers_model->mdhcareersadmin();
        $data['scdhcareers'] = $this->careers_model->scdhcareersadmin();
        $data['odhcareers'] = $this->careers_model->odhcareersadmin();
        $data['sghcareers'] = $this->careers_model->sghcareersadmin();
        $data['nghcareers'] = $this->careers_model->nghcareersadmin();
		$this->settings($data);
    }

    function healthcare_professionals(){
		$data['title'] = 'Careers: Healthcare Professionals | CebuDoc Group';
		$data['main'] = 'careers/healthprof';
		$data['cduhcareers'] = $this->careers_model->cduhcareershealth();
        $data['mdhcareers'] = $this->careers_model->mdhcareershealth();
        $data['scdhcareers'] = $this->careers_model->scdhcareershealth();
        $data['odhcareers'] = $this->careers_model->odhcareershealth();
        $data['sghcareers'] = $this->careers_model->sghcareershealth();
        $data['nghcareers'] = $this->careers_model->nghcareershealth();
		$this->settings($data);
    }

    function residency_training(){
		$data['title'] = 'Careers: Residency Training | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->settings($data);
    }


	function _remap($method){
      $param_offset = 3;
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
