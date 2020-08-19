<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('media_model');
	}

	function index(){
		$this->media();
	}

	function media(){
		$data['header'] = 'settings/header';
		$data['description'] = 'Media';
		$data['keywords'] = '';
		$data['title'] = 'Media';
		$data['main'] = 'sitemap/media';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function settings($data){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

/*
	function teamrewards(){
		$data['header'] = 'settings/header';
		$data['title'] = 'Media: Team Rewards';
		$data['main'] = 'media/teamrewards';
		$data['result'] = $this->media_model->teamrewards_list();
		$data['footer'] = 'settings/footer';
		$this->settings($data);
	}

	function views(){
		$data['header'] = 'settings/header';
		$data['title'] = 'Media: Team Rewards';
		$uri = $this->uri->segment(3);
		$data['result'] = $this->media_model->view($uri);
		$data['main'] = 'media/view';
		$data['footer'] = 'settings/footer';
		$this->settings($data);
	}
*/

	function outcomes_and_testimonials(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Media: Clinical Outcomes & Testimonials | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->settings($data);
	}

	function healthline_newsletter(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Media: Healthline Newsletter | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->settings($data);
	}

	function includespressrelease($data){
		$data['header'] = 'settings/pressrelease_header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function press_release(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->media();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->media();
            }
            
        }
            
    }


    function _article(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'CebuDoc Group';
		$uri = $this->uri->segment(4);
		$data['result'] = $this->media_model->view_article($uri);
		$data['main'] = 'media/view_article';
		$this->includespressrelease($data);
	}

	function press_releases(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Media: Press Releases | CebuDoc Group';

		$config = array();
        $config['base_url'] = base_url() . 'media/press_releases/';
        $config['total_rows'] = $this->media_model->get_total_releases();
        $limit = $config['per_page'] = 5;
        $config["uri_segment"] = 3;

        $choice = $config['total_rows'] / $config['per_page'];

        $config['num_links'] = round($choice);
        $config['use_page_numbers'] = true;
             
        $config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Previews';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        
        /*
        $data['main'] = 'customer/testimonials';     
        $data['pagetitle'] = 'Customer Testimonials';
        $data['content'] = $this->testimonials_model->getall($config['per_page'],$page);
        $data['pagination'] = $this->pagination->create_links(); 
        $this->includes($data);
		*/

		$data['main'] = 'media/press_releases';
		$data['result'] = $this->media_model->releases($limit, $limit*($offset-1));
		$data['pagination'] = $this->pagination->create_links();
		$this->settings($data);
	}

	function social_media(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Media: Social Media Sites | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->settings($data);
	}

	function team_rewards(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Media: Team Rewards | CebuDoc Group';
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
