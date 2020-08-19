<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_room extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('media_model');
	}

	function index(){
		$this->settings();
	}

	function settings($data){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$this->load->view('settings/template', $data);
	}


	function teamrewards(){
		$data['header'] = 'settings/header';
		$data['title'] = 'Media Room: Team Rewards';
		$data['main'] = 'media/teamrewards';
		$data['result'] = $this->media_model->teamrewards_list();
		$data['footer'] = 'settings/footer';
		$this->settings($data);
	}

	function view(){
		$data['header'] = 'settings/header';
		$data['title'] = 'Media Room: Team Rewards';
		$uri = $this->uri->segment(3);
		$data['result'] = $this->media_model->view($uri);
		$data['main'] = 'media/view';
		$data['footer'] = 'settings/footer';
		$this->settings($data);
	}








































}
