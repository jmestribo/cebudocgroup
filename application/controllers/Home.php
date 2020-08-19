<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('media_model');
	}

	function index(){
		$this->settings();
	}

	function settings(){
	    $date = date('Y') - 1972;
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital, best hospital in visayas';
        $data['description'] = 'CebuDoc Group of Hospitals is a leading tertiary level healthcare provider in the Southern Philippines since the past '.$date.' years.';
		$data['header'] = 'settings/header';
		$data['title'] = 'CebuDoc Group | Compassion • Quality • Innovation';
		$data['main'] = 'pages/index';
		$data['result'] = $this->media_model->home_press_releases();
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}
	
	
	function autocomplete(){
    	$search_data = $this->input->post('search_data');
    	$result = $this->media_model->get_autocomplete($search_data);

    	if (!empty($result)){
          foreach ($result as $row):
               echo "<li><a class='mbr-fonts-style text-black display-7' style='padding: 0.5rem;' href='".base_url(). "" .$row->uri_title. "'>" . $row->title . "</a></li>";
          endforeach;
     	}
     	else{
           echo "<li class='mbr-fonts-style text-black display-7' style='padding: 0.5rem;'> <em> No suggestion ... </em> </li>";
     	}
 	}









































}
