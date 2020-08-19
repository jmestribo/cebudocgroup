<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_committee extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->settings();
	}

	function settings(){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country. The 300- Bed capacity, state of the art facilities and ultra modern hospital complex rises on a 5,166 square meters ground that accommodate the main hospital and medical clinic buildings. It has 1,200 employees and 326 medical doctors, all trained to provide the highest quality and excellent personalized patient health care.';
        $data['header'] = 'settings/header';
		$data['title'] = 'Research Committee | CebuDoc Group';
		$data['main'] = 'pages/research';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}










































}
