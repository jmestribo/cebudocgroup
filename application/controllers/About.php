<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		//$this->settings();
		$this->aboutus();
	}

	function settings($data){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, founder, Dr. Potenciano Larrazabal Jr., Dr. Potenciano S.D. Larrazabal III';
        $data['header'] = 'settings/header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}
/*

	function cdu(){
		$data['header'] = 'settings/header';
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), is a leading tertiary level healthcare provider in the Southern Philippines territory in Metropolitan Cebu since the past 37 years. The 300- Bed capacity, state of the art facilities and ultra modern hospital complex rises on a 5,166 square meters ground that accommodate the main hospital and medical clinic buildings. It has 1,200 employees and 326 medical doctors, all trained to provide the highest quality and excellent personalized patient health care. ';
		$data['title'] = 'Cebu Doctors` University';
		$data['main'] = 'about/cdu';
		$data['footer'] = 'settings/footer';
		$this->settings($data);
	}
*/

	function aboutus(){
		$data['header'] = 'settings/header';
		$data['description'] = 'About Us';
		$data['keywords'] = '';
		$data['title'] = 'About Us';
		$data['main'] = 'sitemap/aboutus';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	
///////////////////////////////////////////////////////////// OVERVIEW ////////////////////////////////////////////////////////////////////////

	function includesoverview($data){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, founder, Dr. Potenciano Larrazabal Jr., Dr. Potenciano S.D. Larrazabal III, overview, Mission, Vission & Core Values';
		$data['header'] = 'settings/header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function overview(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->aboutus();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->aboutus();
            }
            
        }
            
    }

    function _history_and_milestones(){
		$data['description'] = 'The original idea of constructing a hospital which could be considered as Modern Medical Center in this part of the Philippines and which would be controlled by the physicians themselves in order to give the utmost in convenience and well-being to the patients had been the brainchild of Dr. Jose Borromeo. He was instrumental in grouping together 30 doctors who organized themselves into the hospital project in the latter part of 1962.';
		$data['title'] = 'About Us: History & Milestones | CebuDoc Group';
		$data['main'] = 'about/history';
		$this->includesoverview($data);
	}

    function _founder(){
		$data['description'] = 'Dr. Potenciano Veloso Larrazabal, Jr., Founder of CebuDoc Group of Hospitals, was born on April 21, 1940 in Ormoc City, Leyte. He is married to Mrs. Zenaida Sto. Domingo Larrazabal, with 4 children namely: Mrs. Marinella Carcel (married to MR. NEil E. Carcel), Mrs. Bettina Veloso (married to Mr. Michael J. Veloso), Dr. Potenciano S.D. Larrazabal, III (married to Ms. Donna C. Yrastoza) and Dr. Philip Anthony Larrazabal (married to Dr. Maria Victoria J. Labado).';
		$data['title'] = 'About Us: Founder | CebuDoc Group';
		$data['main'] = 'about/founder';
		$this->includesoverview($data);
	}

	function _mission_vision_values(){
		$data['description'] = 'CebuDocGroup of Hospitals is a leading tertiary level healthcare provider in the Southern Philippines since the past 46 years.';
		$data['title'] = 'Mision, Vision & Core Values | CebuDoc Group';
		$data['main'] = 'about/mvc';
		$this->includesoverview($data);
	}


///////////////////////////////////////////////////////////// HOSPITALS ////////////////////////////////////////////////////////////////////////


	function includeshospitals($data){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, founder, Dr. Potenciano Larrazabal Jr., Dr. Potenciano S.D. Larrazabal III';
		$data['header'] = 'settings/header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function hospitals(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->aboutus();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->aboutus();
            }
            
        }
            
    }

	function _cduh(){
		$data['description'] = 'Cebu Doctors University Hospital (CDUH), is a leading tertiary level healthcare provider in the Southern Philippines territory in Metropolitan Cebu since the past 37 years. The 300- Bed capacity, state of the art facilities and ultra modern hospital complex rises on a 5,166 square meters ground that accommodate the main hospital and medical clinic buildings. It has 1,200 employees and 326 medical doctors, all trained to provide the highest quality and excellent personalized patient health care. ';
		$data['title'] = 'About: Cebu Doctors University Hospital | CebuDoc Group';
		$data['main'] = 'about/cduh';
		$this->includeshospitals($data);
	}

	function _mdh(){
		$data['description'] = 'Mactan Doctors Hospital is a 151 bed tertiary private hospital offering a total healthcare provider to both local and foreign patients fully equipped with the latest cutting edge technology for your optimum diagnostic and therapeutic treatment. It is conveniently located to cater patients in Basak, Lapu-Lapu City.';
		$data['title'] = 'About: Mactan Doctors Hospital | CebuDoc Group';
		$data['main'] = 'about/mdh';
		$this->includeshospitals($data);
	}

	function _ngh(){
		$data['description'] = 'North General Hospital is a private, 150-bed capacity tertiary hospital. It is fully equipped with advanced technology for optimum diagnostic and therapeutic treatment under the care of the establishment’s elite medical and surgical specialists. The hospital is conveniently located, so as to be accessible to patients within the northern area of Cebu City. North Gen is located at Kauswagan Drive, in Talamban, Cebu City.';
		$data['title'] = 'About: North General Hospital | CebuDoc Group';
		$data['main'] = 'about/ngh';
		$this->includeshospitals($data);
	}

	function _scdh(){
		$data['description'] = 'San Carlos Doctors Hospital, Inc. is a primary 50-bed healthcare institution, conveniently located to cater patients in San Carlos City, Negros Occidental. This private institution is a modern medical center responsive to the total health needs of its clientele under the care of compassionate, competent and dedicated health care professionals concerned with holistic quality healthcare in the preventive, curative, restorative and rehabilitative processes for health and well being..';
		$data['title'] = 'About: San Carlos Doctors` Hospital | CebuDoc Group';
		$data['main'] = 'about/scdh';
		$this->includeshospitals($data);
	}

	function _sgh(){
		$data['description'] = 'South General Hospital is conveniently located in Tuyan Naga, Cebu to cater to patients who are from the Southern part of Cebu. It is a 150-bed tertiary infirmary, fully equipped with state-of-the-art facilities for optimum diagnostic and therapeutic treatment. Patients will be under the care of elite medical and surgical specialists. The hospital vows to provide quality services at reasonably-priced rates, not compromising health and well being because they care.';
		$data['title'] = 'About: South General Hospital | CebuDoc Group';
		$data['main'] = 'about/sgh';
		$this->includeshospitals($data);
	}

	function _odh(){
		$data['description'] = 'Ormoc Doctors Hospital is the newest hospital of CebuDoc Group of Hospital with its full capacity of 200 beds. It is conveniently located to cater patients in Ormoc City, Leyte with the modern cutting edge technology and specialized services at very reasonable rates.';
		$data['title'] = 'About: Ormoc Doctors` Hospital | CebuDoc Group';
		$data['main'] = 'about/odh';
		$this->includeshospitals($data);
	}




///////////////////////////////////////////////////////////// CORPORATE ORGANIZATION ////////////////////////////////////////////////////////////////////////


	function includesorganization($data){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, founder, Dr. Potenciano Larrazabal Jr., Dr. Potenciano S.D. Larrazabal III, board of directors';
		$data['header'] = 'settings/header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function organizations(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->aboutus();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->aboutus();
            }
            
        }
            
    }


    function _board_of_directors(){
		$data['description'] = 'The Board of Directors of the Cebu Doctors University Hospital is the supreme authority in the hospital. At the head of the institution, responsible for the physical plant and for every act committed, is this body as represented by the President, the executive officer of the corporation. It is composed of eleven members selected with care to ensure smooth functioning.';
		$data['title'] = 'About: Board of Directors | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includeshospitals($data);
	}


	function _corporate_heads(){
		$data['description'] = '';
		$data['title'] = 'About: Corporate Heads | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includeshospitals($data);
	}




///////////////////////////////////////////////////////////// ACCREDITATION AND AWARDS ////////////////////////////////////////////////////////////////////////


	function accreditation_and_awards(){
		$data['description'] = 'QHA Trent, Department of Health & Philhealth';
		$data['title'] = 'About: Accreditation and Awards | CebuDoc Group';
		$data['main'] = 'about/accreditation';
		$this->settings($data);
	}


///////////////////////////////////////////////////////////// CORPORATE ORGANIZATION ////////////////////////////////////////////////////////////////////////


	function includesfacts($data){
		$data['keywords'] = 'about cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu, list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, founder, Dr. Potenciano Larrazabal Jr., Dr. Potenciano S.D. Larrazabal III, board of directors';
		$data['header'] = 'settings/header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function fact_sheet(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->aboutus();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->aboutus();
            }
            
        }
          
    }


    function _our_partners(){
		$data['description'] = 'Health maintenance organizations, or HMOs, is a type of health insurance plan that provides customers with a wide variety of healthcare options and services.';
		$data['title'] = 'About: Our Partners | CebuDoc Group';
		$data['main'] = 'about/ourpartners';
		$this->includesfacts($data);
	}

	function _faq(){
		$data['description'] = 'Compassion, Quality, and Innovation. These  values that we passionately carry out keep our minds focused in improving the health and life of the people we serve.';
		$data['title'] = 'About: FAQ | CebuDoc Group';
		$data['main'] = 'about/faq';
		$this->includesfacts($data);
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
