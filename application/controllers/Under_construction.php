<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Under_construction extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['header'] = 'settings/header';
		$data['title'] = 'Page Under Construction';
		$data['main'] = 'pages/undercons';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}










































}
