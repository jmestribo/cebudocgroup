<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_services extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->patientservices();
	}

	function patientservices(){
		$data['header'] = 'settings/header';
		$data['description'] = 'Patient Services';
		$data['keywords'] = '';
		$data['title'] = 'Patient Services';
		$data['main'] = 'sitemap/patientservices';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}
    function pcrtestingappointment(){
		$data['header'] = 'settings/header';
		$data['description'] = 'Patient Services';
		$data['keywords'] = '';
		$data['title'] = 'PCR TESTING APPOINTMENT';
		$data['main'] = 'pages/pcrform';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	 function pcrtestingpayment(){
		$data['header'] = 'settings/header';
		$data['description'] = 'Patient Services';
		$data['keywords'] = '';
		$data['title'] = 'PCR PAYMENT';
		$data['main'] = 'pages/payment';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	///////////////////////////////////////////////////////////// HOSPITAL SERVICES AND FACILITIES //////////////////////////////////////////////////////////

	function includesfacilities($data) {
        $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, patients and visitor guide, HMO, information and admitting section, medical records, OPD, pharmacy, pastoral care';
        $data['description'] = 'At the Cebu Doctors\' University Hospital, your health and comfort during your hospital stay our top priorities. Our physicians and staff are here to make sure you experienced the best care and your personal needs are met.';
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
        $this->load->view('settings/template', $data);
    }

	function services_and_facilities(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->patientservices();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->patientservices();
            }
            
        }
            
    }

    function _room_facilities(){
		$data['title'] = 'Patient Services: Facilites | CebuDoc Group';
		$data['main'] = 'services/facilities';
		$this->includesfacilities($data);
	}

	function _in_patient_rooms(){
		$data['title'] = 'Patient Services: In Patient Rooms | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesfacilities($data);
	}

	function _out_patient_department(){
		$data['title'] = 'Patient Services: Out Patient Department | CebuDoc Group';
		$data['main'] = 'services/opd';
		$this->includesfacilities($data);
	}

	function _business_office(){
		$data['title'] = 'Patient Services: Business Office | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesfacilities($data);
	}

	function _medical_concierge(){
		$data['title'] = 'Patient Services: Medical Concierge | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesfacilities($data);
	}

	function _pharmacy(){
		$data['title'] = 'Patient Services: Pharmacy | CebuDoc Group';
		$data['main'] = 'services/pharmacy';
		$this->includesfacilities($data);
	}

	function _nutrition(){
		$data['title'] = 'Patient Services: Nutrition | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesfacilities($data);
	}

	///////////////////////////////////////////////////////////// CLINICAL SERVICES ///////////////////////////////////////////////////////////////////////

	function includesclinical($data){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, clinical services, center of excellence, executive check-up program, delivery room, emergency room, operating room, internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH) offers clinical services (internal medicine, pediatrics, ob-gyn, anaesthesia, surgery, radiologic imaging, ophthalmology, clinical pathology, anatomical)';
		$data['header'] = 'settings/header';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

	function clinical(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->patientservices();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->patientservices();
            }
            
        }
            
    }
/*
	function room_rates(){
		$data['header'] = 'settings/header';
		$data['title'] = 'Patient Services';
		$data['main'] = 'services/roomrates';
		$data['footer'] = 'settings/footer';
		$this->settings($data);
	}
*/
	function _anesthesia(){
		$data['title'] = 'Patient Services: Clinical Services | Anesthesia | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesclinical($data);
	}

	function _anatomical(){
		$data['title'] = 'Patient Services: Clinical Services | Anatomical | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesclinical($data);
	}

	function _clinical_pathology(){
		$data['title'] = 'Patient Services: Clinical Services | Clinical Pathology | CebuDoc Group';
		$data['main'] = 'pages/undercons';
		$this->includesclinical($data);
	}

	function _internal_medicine(){
		$data['title'] = 'Patient Services: Clinical Services | Internal Medicine | CebuDoc Group';
		$data['main'] = 'services/internalmed';
		$this->includesclinical($data);
	}

	function _obgyn(){
		$data['title'] = 'Patient Services: Clinical Services | OB-GNY | CebuDoc Group';
		$data['main'] = 'services/obgyn';
		$this->includesclinical($data);
	}

	function _ophthalmology(){
		$data['title'] = 'Patient Services: Clinical Services | Ophthalmology | CebuDoc Group';
		$data['main'] = 'services/ophthalmology';
		$this->includesclinical($data);
	}

	function _pediatrics(){
		$data['title'] = 'Patient Services: Clinical Services | Pediatrics | CebuDoc Group';
		$data['main'] = 'services/pediatrics';
		$this->includesclinical($data);
	}

	function _radiologic_imaging(){
		$data['title'] = 'Patient Services: Clinical Services | Radiologic Imaging | CebuDoc Group';
		$data['main'] = 'services/radiolic';
		$this->includesclinical($data);
	}

	function _surgery(){
		$data['title'] = 'Patient Services: Clinical Services | Surgery | CebuDoc Group';
		$data['main'] = 'services/surgery';
		$this->includesclinical($data);
	}

	

	///////////////////////////////////////////////////////////// SPECIALTY CENTERS ////////////////////////////////////////////////////////////////////////

	function includescenter($data) {
        $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, center of excellence, cardiovascular center, center for cancer, minimally invasive surgery, center for sight, center for wound, ostomy care and hyperbaric medicine, center for women, laboratory, nuclear medicine, physical and rehabilitation medicine department, pulmonary, radiation therapy, radiology';
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
        $this->load->view('settings/template', $data);
    }

	function center(){
        $uri = $this->uri->segment(3);
        if(!$uri){
        	$this->patientservices();
        }else{
            $tmp = '_'.$uri;            
            if (method_exists(__CLASS__, $tmp)) {
            	$this->$tmp();
            } else {
            	$this->patientservices();
            }
            
        }
            
    }


	function _cardiovascular(){
		$data['description'] = 'Bringing you the State-Of-The-Art technology in cardiovascular medicine and surgery, transferred directly from the United States to serve you and has a complete non-invasive and invasive facilities for the diagnosis of cardiac and vascular disease.';
		$data['title'] = 'Patient Services: Specialty Centers | Cardiovacular Center | CebuDoc Group';
		$data['main'] = 'services/cardio';
		$this->includescenter($data);
	}

	function _cancer(){
		$data['description'] = 'The Centre for Cancer is the hospital\'s new hematology-oncology and ambulatory outpatient unit which seeks to provide personalized quality care to all cancer patients by providing them with the following services';
		$data['title'] = 'Patient Services: Specialty Centers | Center for Cancer | CebuDoc Group';
		$data['main'] = 'services/centerforcancer';
		$this->includescenter($data);
	}

	function _invasive_surgery(){
		$data['description'] = 'The Cebu Doctors\' University Hospital (CDUH) Center for Minimally Invasive Surgery (MIS) is the top referral center for laparoscopic and endoscopic surgery in Southern Philippines.';
		$data['title'] = 'Patient Services: Specialty Centers | Invasive Surgery | CebuDoc Group';
		$data['main'] = 'services/invasive';
		$this->includescenter($data);
	}

	function _sight(){
		$data['description'] = 'Centre for Sight is proud to be the first LASIK provider in Cebu City, in Visayas and Mindanao to offer patients world\'s fastest Femtosecond laser. It has been at the forefront of Refractive Surgery since 2002 and has performed the most number of Lasik Procedures outside Metro Manila.';
		$data['title'] = 'Patient Services: Specialty Centers | Center for Sight | CebuDoc Group';
		$data['main'] = 'services/centerforsight';
		$this->includescenter($data);
	}

	function _wound(){
		$data['description'] = 'It is a treatment in which the patient breathes 100% oxygen inside a pressurized chamber. The rapid delivery of high concentrations of oxygen to the patients tissues stimulates growth of new blood vessels, which promotes healing of problematic wounds and treat certain types of infections (such as gangrene).';
		$data['title'] = 'Patient Services: Specialty Centers | Center for Wound, Ostomy Care & Hyperbaric Medicine | CebuDoc Group';
		$data['main'] = 'services/centerforwound';
		$this->includescenter($data);
	}

	function _women(){
		$data['description'] = 'Centre for Women caters to women of all ages to be better aware of their health. It offers services such as obstetrics and gynecological ultrasound, sono-mammogram (ultrasound of the breast) and mammography.';
		$data['title'] = 'Patient Services: Specialty Centers | Center for Women | CebuDoc Group';
		$data['main'] = 'services/centerforwomen';
		$this->includescenter($data);
	}

	function _laboratory(){
		$data['description'] = 'The clinical laboratory provides services both for In-patients and Out-Patients and equipped with state-of-the-art automated equipment. The department is composed of the following different sections: Hematology, Chemistry, Microbiology, Blood Banking, Clinical Microscopy, and Serology.';
		$data['title'] = 'Patient Services: Specialty Centers | Laboratory Department | CebuDoc Group';
		$data['main'] = 'services/laboratory';
		$this->includescenter($data);
	}

	function _nuclearmedicine(){
		$data['description'] = 'The Nuclear Medicine of Cebu Doctors\' University Hospital marks 20 years of continuous commitment to full service and devote a quality care highlighting its passion for innovative technology and expertise. It is the "First to Serve the Visayas and Mindanao" since 1990.';
		$data['title'] = 'Patient Services: Specialty Centers | Nuclear Medicine | CebuDoc Group';
		$data['main'] = 'services/nucmed';
		$this->includescenter($data);
	}

	function _physical_rehab_medicine(){
		$data['description'] = 'REHABILITATION is defined as the development of a person to the fullest physical, psychological, social, vocational and educational potential consistent with his/her physiological or anatomical impairment and environmental limitations. It is a concept that should permeate the entire health care system. It should be comprehensive and should include prevention, early recognition, and out0patient, inpatient, exhausted.';
		$data['title'] = 'Patient Services: Specialty Centers | Physical and Rehablitation Medicine Department | CebuDoc Group';
		$data['main'] = 'services/rehab';
		$this->includescenter($data);
	}

	function _pulmonary(){
         $data['description'] = 'Cebu Doctors\' University Hospital- Pulmonary Department was established to provide excellent respiratory care services through compassionate, dynamic and competent Pulmonologist and Respiratory Therapists. It addresses the individual needs of the clientele through diagnostic, therapeutic and supportive services related to respiratory care procedures necessary to implement a treatment, disease prevention, pulmonary rehabilitative regimen prescribed by a physician with the state-of-the-art equipment and facilities.';
        $data['title'] = 'Patient Services: Specialty Centers | Pulmonary Department | CebuDoc Group';
        $data['main'] = 'services/pulmo';
        $this->includescenter($data);
    }


	function _radiation(){
         $data['description'] = 'Radiation Oncology (sometimes called radiation therapy or radiotherapy) is the medical use of radiation in the treatment of various diseases, primarily cancer. At Cebu Doctors\' University Hospital - Radiation Therapy Center (CDUH-RTC) the treatments are given by a machine called a Medical Linear Accelerator (LINAC).';
        $data['title'] = 'Patient Services: Specialty Centers | Radiation Therapy | CebuDoc Group';
        $data['main'] = 'services/radiation';
        $this->includescenter($data); 
    }

    function _radiology(){
         $data['description'] = 'The Radiology Department of Cebu Doctors\' University Hospital is a highly specialized, full service department which strives to meet all patient and clinician needs in diagnostic imaging and image-guided therapies/ The Department provides clinical services in diagnostic radiology, interventional radiology, ultrasound, cross sectional (CT-Scan and Magnetic Resonance Imaging), and Bone Mineral Densitometry.';
        $data['title'] = 'Patient Services: Specialty Centers | Radiology Department | CebuDoc Group';
        $data['main'] = 'services/radiology';
        $this->includescenter($data);  
    }


	///////////////////////////////////////////////////////////// EXECUTIVE CHECKUP ////////////////////////////////////////////////////////////////////////

	function includeservices($data) {
        $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, executive check-up program, operating room, emergency room, delivery room';
        $data['header'] = 'settings/header';
        $data['footer'] = 'settings/footer';
        $this->load->view('settings/template', $data);
    }

	function ecu(){
		$data['description'] = 'The executive is one of the most important human resources of a company. It is therefore of great value that we take care of his physical well being. Thus we have introduces the Executive Check-up Program to determine their overall and fitness and to take care of their total well-being.';
		$data['title'] = 'Patient Services: Executive Check-up Plan | CebuDoc Group';
		$data['main'] = 'services/ecu';
		$this->includeservices($data);
	}

	function patient_guide(){
		$data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['title'] = 'Patient Services: Patient Guide | CebuDoc Group';
		$data['main'] = 'services/patientguide';
		$this->includeservices($data);
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
