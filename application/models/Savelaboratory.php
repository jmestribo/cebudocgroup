<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Savelaboratory extends CI_Model {
	
	function __construct() {
        parent::__construct();
		$this->load->library('pdf');
		$this->load->helper('download');
		 
    }
    
	function patientlist($pid){
		return $this->db->select("*")->from("patientmaster")->where("pid",$pid)->get()->row();
	}
	function ivmastertlist($pid){
		return $this->db->select("*")->from("invmaster")->where("pid",$pid)->get()->row();
	}

	function getschedule($date,$time){
		return $this->db->select("*")->from("tbl_appointment")->where(array("date"=>$date,"time"=>$time))->count_all_results();
	}

	function selectdate($date){
		return $this->db->select("*")->from("tbl_appointment")->where("date",$date)->order_by("time","ASC")->get()->result();
	}

	// new
	function selectdate1($date){
		return $this->db->select("*")->from("tblappointment")->where("date",$date)->order_by("time","ASC")->get()->result();
	}


	function getschedule1($date,$time){
		return $this->db->select("*")->from("tblappointment")->where(array("date"=>$date,"time"=>$time))->count_all_results();
	}

	function getpatientinfo($pid){
		return $this->db->select("*")->from("tblappointment")->where("sid",$pid)->get()->row();
	}

	function attachfile($data){

		$id = $this->encrypt->decode($data['attachid']);
		
		$new_url = str_replace(' ', '-', $data['attachfilesname']);

		$fieldpatient['attachfile'] = 'attachment'.$id;

		

		$this->db->set($fieldpatient);

		$this->db->where('pid',$id);

		return $this->db->update('patientmaster');

	}
	function createappointment($data){
		$field['date'] = $data['date'];
		$field['time'] = $data['time'];
		$field['status'] = "Pending";		
		$field['slots'] = "1";
		$field['date_created'] = date("Y-m-d H:i:s A");

		$count = $this->db->select("*")->from("tbl_appointment")->where(array("date"=>$data['date'],"time"=>$data['time']))->count_all_results();
		if ($count > 2) {
			return 0;
		}else{
			$this->db->insert("tbl_appointment",$field);
			$pid1 =  $this->db->insert_id();

			$fieldpatient['schedid'] = $pid1;

			$this->db->insert("patientmaster",$fieldpatient);
			$pid2 =  $this->db->insert_id();

			$fieldlab['pid'] = $pid2;
			$this->db->insert("labmaster",$fieldlab);

			$ivnfield['pid'] = $pid2;
			$this->db->insert("invmaster",$ivnfield);

			return $pid2;
		}

	}

	function savepatientmaster($data){

		
			$pid1 = $data['pid'];


			$patientfield['hospnum'] = $data['reportingunithospital'] ? $data['reportingunithospital'] : '';
			// $patientfield['schedid'] = $data['schedid'] ? $data['schedid'] : '';
			$patientfield['firstname'] = $data['firstname'] ? $data['firstname'] : '';
			$patientfield['middlename'] = $data['middlename'] ? $data['middlename'] : '';
			$patientfield['lastname'] = $data['lastname'] ? $data['lastname'] : '';
			$patientfield['dob'] = $data['dateofBirth'] ? $data['dateofBirth'] : '';
			$patientfield['gender'] = $data['gender'] ? $data['gender'] : '';
			$patientfield['age'] = $data['age'] ? $data['age'] : '';
			
			$patientfield['nationality'] = $data['nationality'] ? $data['nationality'] : '';
			$patientfield['civilstatus'] = $data['civilstatus'] ? $data['civilstatus'] : '';
			$patientfield['occupation'] = $data['occupation'] ? $data['occupation'] : '';
			$patientfield['passportno'] = $data['passportno'] ? $data['passportno'] : '';
			$patientfield['phouseno'] = $data['phouseno'] ? $data['phouseno'] : '';
			$patientfield['pstreet'] = $data['pstreet'] ? $data['pstreet'] : '';
			$patientfield['pmunicipality'] = $data['pmunicipality'] ? $data['pmunicipality'] : '';
			$patientfield['pprovince'] = $data['pprovince'] ? $data['pprovince'] : '';
			$patientfield['pregion'] = $data['pregion'] ? $data['pregion'] : '';
			$patientfield['pphone'] = $data['pphone'] ? $data['pphone'] : '';
			$patientfield['pcellphone'] = $data['pcellphone'] ? $data['pcellphone'] : '';
			$patientfield['pemail'] = $data['pemail'] ? $data['pemail'] : '';		
			$patientfield['chouseno'] = $data['chouseno'] ? $data['chouseno'] : '';
			$patientfield['cstreet'] = $data['cstreet'] ? $data['cstreet'] : '';
			$patientfield['cmunicipality'] = $data['cmunicipality'] ? $data['cmunicipality'] : '';
			$patientfield['cprovince'] = $data['cprovince'] ? $data['cprovince'] : '';
			$patientfield['cregion'] = $data['cregion'] ? $data['cregion'] : '';
			$patientfield['cphone'] = $data['cphone'] ? $data['cphone'] : '';
			$patientfield['ccellphone'] = $data['ccellphone'] ? $data['ccellphone'] : '';
			$patientfield['cemail'] = $data['cemail'] ? $data['cemail'] : '';
			$patientfield['ofwemployeername'] = $data['ofwemployeername'] ? $data['ofwemployeername'] : '';
			$patientfield['ofwoccupation'] = $data['ofwoccupation'] ? $data['ofwoccupation'] : '';
			$patientfield['ofwplaceofwork'] = $data['ofwplaceofwork'] ? $data['ofwplaceofwork'] : '';
			$patientfield['ofwhouse'] = $data['ofwhouse'] ? $data['ofwhouse'] : '';
			$patientfield['ofwstreet'] = $data['ofwstreet'] ? $data['ofwstreet'] : '';
			$patientfield['ofwcity'] = $data['ofwcity'] ? $data['ofwcity'] : '';
			$patientfield['ofwprovince'] = $data['ofwprovince'] ? $data['ofwprovince'] : '';
			$patientfield['ofwcountry'] = $data['ofwcountry'] ? $data['ofwcountry'] : '';
			$patientfield['ofwofficephoneno'] = $data['ofwofficephoneno'] ? $data['ofwofficephoneno'] : '';
			$patientfield['ofwcellphoneno'] = $data['ofwcellphoneno'] ? $data['ofwcellphoneno'] : '';	


			$ivnfield['travelOtherCountry'] = $data['travelOtherCountry'];
			$ivnfield['portofexit'] = $data['portofexit'];
			$ivnfield['vessel'] = $data['vessel'];
			$ivnfield['vesselno'] = $data['vesselno'];
			$ivnfield['departuredate'] = $data['departuredate'];
			$ivnfield['arrivaldate'] = $data['arrivaldate'];
			$ivnfield['exposebefore14'] = $data['exposebefore14'];
			$ivnfield['dateofcontact'] = $data['dateofcontact'];
			$ivnfield['placebefore14'] = $data['placebefore14'];
			$ivnfield['ifyes'] = $data['ifyes'];
			$ivnfield['ifyesdate'] = $data['ifyesdate'];
			$ivnfield['ifyesname1'] = $data['ifyesname1'];
			$ivnfield['ifyesname2'] = $data['ifyesname2'];
			$ivnfield['ifyescontactno2'] = $data['ifyescontactno2'];
			$ivnfield['ifyesname3'] = $data['ifyesname3'];
			$ivnfield['ifyescontactno3'] = $data['ifyescontactno3'];
			$ivnfield['ifyesname4'] = $data['ifyesname4'];
			$ivnfield['ifyesontactno4'] = $data['ifyesontactno4'];

			
			
			if ($data['formtype'] == "Create") {

				$this->db->set($patientfield);
				$this->db->where('pid', $pid1);
				$this->db->update('patientmaster');


				$this->db->set($ivnfield);
				$this->db->where('pid', $pid1);
				$this->db->update('invmaster');
		
				
			}	

      
    	return $pid1;

	}
	

	function appointment($data){
	

			$patientfield['date'] = $data['scheddatepicker'];
			$patientfield['time'] = $data['schedtime'];
			$patientfield['status'] = "Pending";		
			$patientfield['slots'] = "1";
			$patientfield['date_created'] = date("Y-m-d h:i: A",strtotime("+16 Hours"));
			$field['status'] = "Pending";
			$patientfield['services'] = $data['selectservices'];

			$patientfield['firstname'] = $data['firstname'] ? $data['firstname'] : '';
			$patientfield['middlename'] = $data['middlename'] ? $data['middlename'] : '';
			$patientfield['lastname'] = $data['lastname'] ? $data['lastname'] : '';
			$patientfield['dob'] = $data['dob'] ? $data['dob'] : '';
			$patientfield['gender'] = $data['gender'] ? $data['gender'] : '';
			$patientfield['age'] = $data['age'] ? $data['age'] : '';
			$patientfield['nationality'] = $data['nationality'] ? $data['nationality'] : '';
			$patientfield['civilstatus'] = $data['civilstatus'] ? $data['civilstatus'] : '';
			$patientfield['occupation'] = $data['occupation'] ? $data['occupation'] : '';
			$patientfield['passportno'] = $data['passportno'] ? $data['passportno'] : '';
			$patientfield['phouseno'] = $data['phouseno'] ? $data['phouseno'] : '';
			$patientfield['pstreet'] = $data['pstreet'] ? $data['pstreet'] : '';
			$patientfield['pmunicipality'] = $data['pmunicipality'] ? $data['pmunicipality'] : '';
			$patientfield['pprovince'] = $data['pprovince'] ? $data['pprovince'] : '';
			$patientfield['pregion'] = $data['pregion'] ? $data['pregion'] : '';
			$patientfield['pphone'] = $data['pphone'] ? $data['pphone'] : '';
			$patientfield['pcellphone'] = $data['pcellphone'] ? $data['pcellphone'] : '';
			$patientfield['pemail'] = $data['pemail'] ? $data['pemail'] : '';		
			$patientfield['chouseno'] = $data['chouseno'] ? $data['chouseno'] : '';
			$patientfield['cstreet'] = $data['cstreet'] ? $data['cstreet'] : '';
			$patientfield['cmunicipality'] = $data['cmunicipality'] ? $data['cmunicipality'] : '';
			$patientfield['cprovince'] = $data['cprovince'] ? $data['cprovince'] : '';
			$patientfield['cregion'] = $data['cregion'] ? $data['cregion'] : '';
			$patientfield['cphone'] = $data['cphone'] ? $data['cphone'] : '';
			$patientfield['ccellphone'] = $data['ccellphone'] ? $data['ccellphone'] : '';
			$patientfield['cemail'] = $data['cemail'] ? $data['cemail'] : '';
			$patientfield['ofwemployeername'] = $data['ofwemployeername'] ? $data['ofwemployeername'] : '';
			$patientfield['ofwoccupation'] = $data['ofwoccupation'] ? $data['ofwoccupation'] : '';
			$patientfield['ofwplaceofwork'] = $data['ofwplaceofwork'] ? $data['ofwplaceofwork'] : '';
			$patientfield['ofwhouse'] = $data['ofwhouse'] ? $data['ofwhouse'] : '';
			$patientfield['ofwstreet'] = $data['ofwstreet'] ? $data['ofwstreet'] : '';
			$patientfield['ofwcity'] = $data['ofwcity'] ? $data['ofwcity'] : '';
			$patientfield['ofwprovince'] = $data['ofwprovince'] ? $data['ofwprovince'] : '';
			$patientfield['ofwcountry'] = $data['ofwcountry'] ? $data['ofwcountry'] : '';
			$patientfield['ofwofficephoneno'] = $data['ofwofficephoneno'] ? $data['ofwofficephoneno'] : '';
			$patientfield['ofwcellphoneno'] = $data['ofwcellphoneno'] ? $data['ofwcellphoneno'] : '';	
			$patientfield['travelOtherCountry'] = $data['travelOtherCountry'];
			$patientfield['portofexit'] = $data['portofexit'];
			$patientfield['vessel'] = $data['vessel'];
			$patientfield['vesselno'] = $data['vesselno'];
			$patientfield['departuredate'] = $data['departuredate'];
			$patientfield['arrivaldate'] = $data['arrivaldate'];
			$patientfield['exposebefore14'] = $data['exposebefore14'];
			$patientfield['dateofcontact'] = $data['dateofcontact'];
			$patientfield['placebefore14'] = $data['placebefore14'];
			$patientfield['ifyes'] = $data['ifyes'];
			$patientfield['ifyesdate'] = $data['ifyesdate'];
			$patientfield['ifyesname1'] = $data['ifyesname1'];
			$patientfield['ifyesname2'] = $data['ifyesname2'];
			$patientfield['ifyescontactno2'] = $data['ifyescontactno2'];
			$patientfield['ifyesname3'] = $data['ifyesname3'];
			$patientfield['ifyescontactno3'] = $data['ifyescontactno3'];
			$patientfield['ifyesname4'] = $data['ifyesname4'];
			$patientfield['ifyesontactno4'] = $data['ifyesontactno4'];
			$patientfield['attachfile'] = $data['attachfile'];
			$patientfield['filename'] = $data['filename'];

			$this->db->insert("tblappointment",$patientfield);
			$lastid = $this->db->insert_id();
			return $lastid;
	}
}
?>