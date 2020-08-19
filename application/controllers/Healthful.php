<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Healthful extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('healthful_model');
	}


	function index(){
		$data['header'] = 'healthful/header';
		$data['title'] = 'Healthful | CebuDoc Group';
		$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc';
		$data['description'] = '';
		$data['body'] = 'healthful/main';
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}


	/*
	function view(){
		$data['header'] = 'healthful/header';
		$data['title'] = 'CebuDoc Group | Healthful';
		$data['keywords'] = 'test';
		$data['description'] = 'test';
		$data['body'] = 'healthful/view';
		$data['result'] = $this->healthful_model->blog_list();
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}
	*/

	function chairman(){
		$data['header'] = 'healthful/header';
		$data['title'] = 'Chairman | Healthful';
		$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
		$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
		$data['body'] = 'healthful/chairman';
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}


	function blog(){
        $uri = $this->uri->segment(3);
        if(!$uri){
            $this->load->view('healthful/template', $data);
        }else{
            $tmp = '_'.$uri;            
            $this->$tmp();
        }
            
    }

	function _article(){
		$data['header'] = 'healthful/page_header';
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Healthful';
		$uri = $this->uri->segment(4);
		$data['result'] = $this->healthful_model->view_article($uri);
		$data['body'] = 'healthful/view';
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}


	function stories(){
		$data['header'] = 'healthful/page_header';
		$data['keywords'] = 'cebudoc, healthful stories, healthful profiles, healthful updates, healthful community';
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Stories | Healthful';

		$config = array();
        $config['base_url'] = base_url() . 'healthful/stories/';
        $config['total_rows'] = $this->healthful_model->get_total_stories();
        $limit = $config['per_page'] = 4;
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

		$data['body'] = 'healthful/stories';
		$data['result'] = $this->healthful_model->stories($limit, $limit*($offset-1));
		$data['pagination'] = $this->pagination->create_links();
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}


	function profiles(){
		$data['header'] = 'healthful/page_header';
		$data['keywords'] = 'cebudoc, healthful stories, healthful profiles, healthful updates, healthful community';
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Profiles | Healthful';

		$config = array();
        $config['base_url'] = base_url() . 'healthful/profiles/';
        $config['total_rows'] = $this->healthful_model->get_total_profiles();
        $limit = $config['per_page'] = 4;
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

		$data['body'] = 'healthful/profiles';
		$data['result'] = $this->healthful_model->profiles($limit, $limit*($offset-1));
		$data['pagination'] = $this->pagination->create_links();
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}


	function community(){
		$data['header'] = 'healthful/page_header';
		$data['keywords'] = 'cebudoc, healthful stories, healthful profiles, healthful updates, healthful community';
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Community | Healthful';

		$config = array();
        $config['base_url'] = base_url() . 'healthful/profiles/';
        $config['total_rows'] = $this->healthful_model->get_total_community();
        $limit = $config['per_page'] = 4;
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

		$data['body'] = 'healthful/community';
		$data['result'] = $this->healthful_model->community($limit, $limit*($offset-1));
		$data['pagination'] = $this->pagination->create_links();
		$data['footer'] = 'healthful/footer';
		$this->load->view('healthful/template', $data);
	}






	// jucel new add 07-07-20


	// function read(){
 //        $uri = $this->uri->segment(4);
 //        if(!$uri){
 //            $this->load->view('healthful_latest/template', $data);
 //        }else{
 //            $tmp = '_'.$uri;            
 //            $this->$tmp();
 //        }
            
 //    }

 //    function _articles(){
	// 	$data['header'] = 'healthful/page_header';
	// 	$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
	// 	$data['title'] = 'Healthful';
	// 	$uri = $this->uri->segment(5);
	// 	$data['result'] = $this->healthful_model->view_latest_article($uri);
	// 	$data['body'] = 'healthful_latest/readmore/view';
	// 	$data['footer'] = 'healthful/footer';
	// 	$this->load->view('healthful_latest/template', $data);
	// }


	function latest(){
		$data['header'] = 'healthful/header';
		$data['footer'] = 'healthful/footer';

		$uri = $this->uri->segment(3);
		if ($uri == "") {

			$data['title'] = 'Healthful Edition 2 | CebuDoc Group';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc';
			$data['description'] = '';
			$data['body'] = 'healthful_latest/main';

			$this->load->view('healthful_latest/template', $data);

		}else if($uri == "stories"){

			$data['header'] = 'healthful/page_header';
			$data['keywords'] = 'cebudoc, healthful stories, healthful profiles, healthful updates, healthful community';
			$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
			$data['title'] = 'Stories | Healthful';

			$config = array();
	        $config['base_url'] = base_url() . 'Healthful/latest/stories/';
	        $config['total_rows'] = $this->healthful_model->get_total_latest_stories();
	        $limit = $config['per_page'] = 4;
	        $config["uri_segment"] = 4;

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
	        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	        // $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

			$data['body'] = 'healthful_latest/stories';
			$data['result'] = $this->healthful_model->latest_stories($limit, $limit*($offset-1));
			$data['pagination'] = $this->pagination->create_links();
			$data['footer'] = 'healthful/footer';
			$this->load->view('healthful_latest/template', $data);


		}else if($uri == "updates"){

			$data['title'] = 'Latest Updates | Healthful';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
			$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
			$config = array();
	        $config['base_url'] = base_url() . 'Healthful/latest/stories/';
	        $config['total_rows'] = $this->healthful_model->get_total_latest_updates();
	        $limit = $config['per_page'] = 4;
	        $config["uri_segment"] = 4;

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
	        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	        // $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

			$data['body'] = 'healthful_latest/Updates';
			$data['result'] = $this->healthful_model->latest_updates($limit, $limit*($offset-1));
			$data['pagination'] = $this->pagination->create_links();


			$this->load->view('healthful_latest/template', $data);

		}else if($uri == "profiles"){

			$data['title'] = 'Profiles | Healthful';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
			$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
			$data['body'] = 'healthful_latest/Profile';

			$config = array();
	        $config['base_url'] = base_url() . 'Healthful/latest/stories/';
	        $config['total_rows'] = $this->healthful_model->get_total_latest_Profile();
	        $limit = $config['per_page'] = 4;
	        $config["uri_segment"] = 4;

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
	        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	        // $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

			$data['body'] = 'healthful_latest/Profile';
			$data['result'] = $this->healthful_model->latest_Profiles($limit, $limit*($offset-1));
			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('healthful_latest/template', $data);

		}else if($uri == "community"){

			$data['title'] = 'Community | Healthful';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
			$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
			$config = array();
	        $config['base_url'] = base_url() . 'Healthful/latest/stories/';
	        $config['total_rows'] = $this->healthful_model->get_total_latest_community();
	        $limit = $config['per_page'] = 4;
	        $config["uri_segment"] = 4;

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
	        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
	        // $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

			$data['body'] = 'healthful_latest/Community';
			$data['result'] = $this->healthful_model->latest_community($limit, $limit*($offset-1));
			$data['pagination'] = $this->pagination->create_links();


			$this->load->view('healthful_latest/template', $data);

		}
		else if($uri == "chairman"){
			$data['title'] = 'Chairman | Healthful';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
			$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
			$data['body'] = 'healthful_latest/chairman';
			$this->load->view('healthful_latest/template', $data);
			
		}

		else if($uri == "read-more"){

			$url = $this->uri->segment(4);

			$readmoretitle = str_replace("-"," ", $url);

			$uri = $this->uri->segment(5);

			$data['result'] = $this->healthful_model->view_latest_article($url);

			$data['title'] = ''.$readmoretitle.' | Healthful';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
			$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
			$data['body'] = 'healthful_latest/readmore/view';
			$this->load->view('healthful_latest/template', $data);
			
		}else if ($uri == "upload_form") {



			$data['title'] = 'Form | Healthful';
			$data['keywords'] = 'healthful, cebudoc publication, stories, profiles, updates, community, cebudoc, yong larrazabal';
			$data['description'] = 'In the past month, Cebu Doctors University Hospital has been conferred with an honor as the Most Outstanding Hospital for Level 3-Private among more than 2,000 hospitals in the country. ';
			$data['body'] = 'healthful_latest/readmore/upload_form';
			$this->load->view('healthful_latest/template', $data);



		}

	}





	function autocomplete(){
    	$search_data = $this->input->post('search_data');
    	$result = $this->healthful_model->get_autocomplete($search_data);

    	if (!empty($result)){
          foreach ($result as $row):
               echo "<li><a class='mbr-fonts-style text-black display-8' style='padding: 0.5rem;' href='".base_url()."healthful/blog/article/" .$row->uri_title. "'>" . $row->title . "</a></li>";
          endforeach;
     	}
     	else{
           echo "<li class='mbr-fonts-style text-black display-8' style='padding: 0.5rem;'> <em> No suggestion ... </em> </li>";
     	}
 	}

 	function latest_autocomplete(){
    	$search_data = $this->input->post('search_data');
    	$result = $this->healthful_model->get_latest_autocomplete($search_data);

    	if (!empty($result)){
          foreach ($result as $row):
               echo "<li><a class='mbr-fonts-style text-black display-8' style='padding: 0.5rem;' href='".base_url()."healthful/" .$row->url. "'>" . $row->title . "</a></li>";
          endforeach;
     	}
     	else{
           echo "<li class='mbr-fonts-style text-black display-8' style='padding: 0.5rem;'> <em> No suggestion ... </em> </li>";
     	}
 	}






 	function upload_stories(){

	    $data = $this->input->post();
	    $result = $this->healthful_model->save_stories($data);

	    if ($result) {
	      redirect('healthful/latest/upload_form');
	    }
	  }



























}
