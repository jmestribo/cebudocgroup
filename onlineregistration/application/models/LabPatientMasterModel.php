<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LabPatientMasterModel extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->model('get_model',"get");
	}

	function PatientMaster($data){

		$field['hospnum'] = "";
		$field['firstname'] = $data['firstname'];
		$field['middlename'] = $data['middlename'];
		$field['lastname'] = $data['lastname'];
		$field['dob'] = $data['dateofBirth'];
		$field['gender'] = $data['gender'];		
		$field['age'] = $data['age'];		
		$field['patientStatus'] = "Pending";
		$field['dateAdmission'] = date("m-d-Y");

		if($data['formtype'] == "create"){
			$this->db->insert("patientmaster",$field);
			$pid = $this->db->insert_id();


			$patientdetailsfield['pid'] = $pid;		

			$patientdetailsfield['pstreet'] = $data['pstreet'];		
			$patientdetailsfield['pbarangay'] = $data['pbarangay'];
			$patientdetailsfield['pdistrict'] = $data['pdistrict'];
			$patientdetailsfield['pmunicipality'] = $data['pmunicipality'];
			$patientdetailsfield['pprovince'] = $data['pprovince'];
			$patientdetailsfield['pregion'] = $data['pregion'];

			$patientdetailsfield['phouseno'] = $data['phouseno'];
			$patientdetailsfield['pphone'] = $data['pphone'];
			$patientdetailsfield['pcellphone'] = $data['pcellphone'];
			$patientdetailsfield['pemail'] = $data['pemail'];
			$patientdetailsfield['chouseno'] = $data['chouseno'];
			$patientdetailsfield['cstreet'] = $data['cstreet'];
			$patientdetailsfield['cmunicipality'] = $data['municipality'];
			$patientdetailsfield['cprovince'] = $data['province'];
			$patientdetailsfield['cregion'] = $data['region'];
			
			$patientdetailsfield['cphone'] = $data['cphone'];
			$patientdetailsfield['ccellphone'] = $data['ccellphone'];
			// $patientdetailsfield['cemail'] = $data['cemail'];
			$patientdetailsfield['classification'] = $data['classification'];
			$patientdetailsfield['roomno'] = $data['roomno'];
			// $patientdetailsfield['dateofadmission'] = $data['dateofadmission'];
			$patientdetailsfield['clinicalimpression'] = $data['ClinicalImpression'];
			$patientdetailsfield['suspectedagent'] = $data['suspectedAgent'];
			$patientdetailsfield['dateofonsetillness'] = $data['dateofOnsetIllness'];
			// $patientdetailsfield['dateofregistration'] = $data['dateofregistration'];





			// $field['hospitalNO'] = $data['hospitalNO'];
			// $field['accessionNo'] = $data['accessionNo'];
			// $field['firstname'] = $data['firstname'];
			// $field['middlename'] = $data['middlename'];
			// $field['lastname'] = $data['lastname'];
			// $field['dateofBirth'] = $data['dateofBirth'];
			// $field['patientAddress'] = $data['clientAddress'];
			// $field['gender'] = $data['gender'];
			// $field['age'] = $data['age'];
			// $field['locationClassification'] = $data['locationClassification'];
			// $field['room'] = $data['room'];
			// $field['dateofAdmission'] = $data['dateofAdmission'];
			// $field['ClinicalImpression'] = $data['ClinicalImpression'];
			// $field['suspectedAgent'] = $data['suspectedAgent'];
			// $field['dateofOnsetIllness'] = $data['dateofOnsetIllness'];
			// $field['medicalDoctor'] = $data['medicalDoctor'];
			// $field['RequisitionerAddress'] = $data['RequisitionerAddress'];
			// $field['telNo'] = $data['telNo'];
			// $field['faxNo'] = $data['faxNo'];
			// $field['cellNO'] = $data['cellNO'];
			// $field['emailAddress'] = $data['emailAddress'];
			// $field['dru'] = $data['dru'];
			// $field['typeDru'] = $data['typeDru'];
			// $field['region'] = $data['region'];
			// $field['province'] = $data['province'];
			// $field['municipality'] = $data['municipality'];
			// $field['specimenReceipt'] = $data['specimenReceipt'];
			// $field['specimentReceiptTime'] = $data['specimentReceiptTime'];
			// $field['receivedBy'] = $data['receivedBy'];
			// $field['officialReceiptNo'] = $data['officialReceiptNo'];
			// $field['testPerform'] = $data['testPerform'];
			// $field['specimenType'] = $data['specimenType'];

			$this->db->insert("patientdetail",$patientdetailsfield);

		}
		

		// $field['nationalityid'] = $data['nationalityid'];
		// $field['civilstatus'] = $data['civilstatus'];
		// $field['occupation'] = $data['occupation'];
		// $field['passportno'] = $data['passportno'];

		
		 redirect("PatientInformation/CreateNew");
		}


	}


		// $patientdetailsfield['patientdetail'] = $data['patientdetail'];		
		// $patientdetailsfield['patientdetail'] = $data['patientdetail'];
		// $patientdetailsfield['phouseno'] = $data['phouseno'];
		// $patientdetailsfield['pstreet'] = $data['pstreet'];
		// $patientdetailsfield['pmunicipality'] = $data['pmunicipality'];
		// $patientdetailsfield['pprovince'] = $data['pprovince'];
		// $patientdetailsfield['pregion'] = $data['pregion'];
		// $patientdetailsfield['pphone'] = $data['pphone'];
		// $patientdetailsfield['pcellphone'] = $data['pcellphone'];
		// $patientdetailsfield['pemail'] = $data['pemail'];
		// $patientdetailsfield['chouseno'] = $data['chouseno'];
		// $patientdetailsfield['cstreet'] = $data['cstreet'];
		// $patientdetailsfield['cmunicipality'] = $data['cmunicipality'];
		// $patientdetailsfield['cprovince'] = $data['cprovince'];
		// $patientdetailsfield['cregion'] = $data['cregion'];
		// $patientdetailsfield['cphone'] = $data['cphone'];
		// $patientdetailsfield['ccellphone'] = $data['ccellphone'];
		// $patientdetailsfield['cemail'] = $data['cemail'];
		// $patientdetailsfield['classification'] = $data['classification'];
		// $patientdetailsfield['roomno'] = $data['roomno'];
		// $patientdetailsfield['dateofadmission'] = $data['dateofadmission'];
		// $patientdetailsfield['clinicalimpression'] = $data['clinicalimpression'];
		// $patientdetailsfield['suspectedagent'] = $data['suspectedagent'];
		// $patientdetailsfield['dateofonsetillness'] = $data['dateofonsetillness'];
		// $patientdetailsfield['dateofregistration'] = $data['dateofregistration'];
