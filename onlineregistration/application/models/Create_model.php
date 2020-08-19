<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Create_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->model('Get_model',"get");
	}

	function remarks($data){
		$fieldschedid = $data['schedid'];
		$pid = $data['pid'];

		if ($data['remarks'] == "0") {
			$fieldsched['status'] = "Pending";
		}else{

		  $fieldsched['status'] = "Active";
		  $selectdata = $this->db->select("*")->from("patientmaster")->where("pid",$pid)->get()->row();
		  $selectdatasched = $this->db->select("*")->from("tbl_appointment")->where("sid",$fieldschedid)->get()->row();
		
		  $name = $selectdata->firstname.' '.$selectdata->lastname.' '.$selectdata->middlename;
	      $email = $selectdata->pemail;


	      // $this->load->library('phpmailer_lib');
	      // $mail = $this->phpmailer_lib->load();
	      // $mail->isSMTP();
	      // $mail->Host     = 'smtp.gmail.com';
	      // $mail->SMTPAuth = true;
	      // $mail->Username = 'pcrtest2.cdg@gmail.com';
	      // $mail->Password = 'pcrtest2@123';
	      // $mail->SMTPSecure = 'ssl';
	      // $mail->Port     = 465;
	      // $mail->setFrom($email, $name);
	      // $mail->SMTPKeepAlive = true;
	      // $mail->Subject = $name;
	      // $mail->isHTML(true);

	       $this->load->library('phpmailer_lib');
	        $mail = $this->phpmailer_lib->load(); 
	        $mail->isSMTP();
	        $mail->Host     = 'mail.cebudocgroup.com ';
	        $mail->SMTPAuth = true;
	        $mail->CharSet = 'utf-8';
	        $mail->SMTPSecure = 'ssl';
	        $mail->Username = 'pcrtest2@cebudocgroup.com';
	        $mail->Password = 'pcrtest2@123';
	        $mail->Mailer = 'smtp';
	        $mail->Port     = 465;
	        $mail->setFrom($email, $name);
	        $mail->SMTPKeepAlive = true;
	        $mail->Subject = $name;
	        $mail->isHTML(true);





	       $confirm = '
			<p>
				<p>Schedule Confirmed!</p>
				<p>
					Hi '.$name.', thank you for successfully processing your payment for your RT-PCR testing scheduled on <strong>'.date("F d Y",strtotime($selectdatasched->date)).' at '.$selectdatasched->time.'.</strong>
				</p>
				<p>
					Please drive-thru the CebuDoc Medical Arts Building 1 Parking Area on your confirmed schedule and please take note of the following reminders:
					<ol>
						<li>
							Please strictly observe the schedule as specified in this confirmation email.
						</li>
						<li>
							Please advise the guard that you are for Drive-thru PCR Testing at the entrance.
						</li>
						<li>
							Please wait for the facilitator to approach you in STEP 1: Registration Area.
						</li>
						<li>
							Please present your valid ID for the identification and validation of your online registration and payment. Once validated, your Official Receipt will be issued.
						</li>
						<li>
							 Please proceed to STEP 2: Swab Area for specimen collection.
						</li>
					</ol>
					<p>
						After the specimen collection, results will be sent to your email address between 24 to 36 hours. So please make sure that you have specified the correct email in your form.
					</p>
					<p>
					 	Should you have other questions and concerns, please reach us at <strong> 253-7512 local 756</strong>
					</p>
					<p>
						<br><br>
						Thank you!
					</p>
				</p>
				
			</p>
	      ';
	      $mail->Body = $confirm;
	      $mail->addAddress($email);
	      $mail->send();

		}
		  $fieldsched['paymentstatus'] = $data['remarks'];

		  
		 
	   

	     return  $this->db->select('*')->where('sid',$fieldschedid)->update('tbl_appointment',$fieldsched);
		// $this->db->select('*')->where('pid',$pid)->update('patientmaster',$patientfield);

	}
	// new
	function remarksnew($data){
		$pid = $data['pid'];

		if ($data['remarks'] == "0") {
			$fieldsched['status'] = "Pending";
		}else{

		  $fieldsched['status'] = "Active";

		  $selectdatasched = $this->db->select("*")->from("tblappointment")->where("sid",$pid)->get()->row();
		
		  $name = $selectdatasched->firstname.' '.$selectdatasched->lastname.' '.$selectdatasched->middlename;
	      $email = $selectdatasched->pemail;


	      // $this->load->library('phpmailer_lib');
	      // $mail = $this->phpmailer_lib->load();
	      // $mail->isSMTP();
	      // $mail->Host     = 'smtp.gmail.com';
	      // $mail->SMTPAuth = true;
	      // $mail->Username = 'pcrtest2.cdg@gmail.com';
	      // $mail->Password = 'pcrtest2@123';
	      // $mail->SMTPSecure = 'ssl';
	      // $mail->Port     = 465;
	      // $mail->setFrom($email, $name);
	      // $mail->SMTPKeepAlive = true;
	      // $mail->Subject = $name;
	      // $mail->isHTML(true);

	       $this->load->library('phpmailer_lib');
	        $mail = $this->phpmailer_lib->load(); 
	        $mail->isSMTP();
	        $mail->Host     = 'mail.cebudocgroup.com ';
	        $mail->SMTPAuth = true;
	        $mail->CharSet = 'utf-8';
	        $mail->SMTPSecure = 'ssl';
	        $mail->Username = 'pcrtest2@cebudocgroup.com';
	        $mail->Password = 'pcrtest2@123';
	        $mail->Mailer = 'smtp';
	        $mail->Port     = 465;
	        $mail->setFrom($email, $name);
	        $mail->SMTPKeepAlive = true;
	        $mail->Subject = $name;
	        $mail->isHTML(true);





	       $confirm = '
			<p>
				<p>Schedule Confirmed!</p>
				<p>
					Hi '.$name.', thank you for successfully processing your payment for your RT-PCR testing scheduled on <strong>'.date("F d Y",strtotime($selectdatasched->date)).' at '.$selectdatasched->time.'.</strong>
				</p>
				<p>
					Please drive-thru the CebuDoc Medical Arts Building 1 Parking Area on your confirmed schedule and please take note of the following reminders:
					<ol>
						<li>
							Please strictly observe the schedule as specified in this confirmation email.
						</li>
						<li>
							Please advise the guard that you are for Drive-thru PCR Testing at the entrance.
						</li>
						<li>
							Please wait for the facilitator to approach you in STEP 1: Registration Area.
						</li>
						<li>
							Please present your valid ID for the identification and validation of your online registration and payment. Once validated, your Official Receipt will be issued.
						</li>
						<li>
							 Please proceed to STEP 2: Swab Area for specimen collection.
						</li>
					</ol>
					<p>
						After the specimen collection, results will be sent to your email address between 24 to 36 hours. So please make sure that you have specified the correct email in your form.
					</p>
					<p>
					 	Should you have other questions and concerns, please reach us at <strong> 253-7512 local 756</strong>
					</p>
					<p>
						<br><br>
						Thank you!
					</p>
				</p>
				
			</p>
	      ';
	      $mail->Body = $confirm;
	      $mail->addAddress($email);
	      $mail->send();

		}
		 $fieldsched['paymentstatus'] = $data['remarks'];

		  
		 
	   

	     return  $this->db->select('*')->where('sid',$pid)->update('tblappointment',$fieldsched);
		// $this->db->select('*')->where('pid',$pid)->update('patientmaster',$patientfield);

	}

	function savepatientmaster($data){

		
			$pid = $data['pid'];
			$patientfield['hospnum'] = $data['reportingunithospital'];
			$patientfield['schedid'] = $data['schedid'] ? $data['schedid'] : '';
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

			// $patientfield['classification'] = $data['classification'] ? $data['classification'] : '';


			// $patientfield['roomno'] = $data['roomno'] ? $data['roomno'] : '';
			// $patientfield['dateofadmission'] = $data['dateofadmission'] ? $data['dateofadmission'] : '';
			// $patientfield['clinicalimpression'] = $data['clinicalimpression'] ? $data['clinicalimpression'] : '';
			// $patientfield['suspectedagent'] = $data['suspectedagent'] ? $data['suspectedagent'] : '';
			// $patientfield['dateofonsetillness'] = $data['dateofonsetillness'] ? $data['dateofonsetillness'] : '';
			// $patientfield['dateofregistration'] = $data['dateofregistration'] ? $data['dateofregistration'] : '';


			// $labfields['accessionno'] = $data['accessionno'] ? $data['accessionno'] : '';
			// $labfields['faxno'] = $data['faxno'] ? $data['faxno'] : '';
			// $labfields['tellNo'] = $data['tellNo'] ? $data['tellNo'] : '';
			// $labfields['cellno'] = $data['cellno'] ? $data['cellno'] : '';
			// $labfields['dru'] = $data['dru'] ? $data['dru'] : '';
			// $labfields['drutype'] = $data['drutype'] ? $data['drutype'] : '';
			// $labfields['emailaddress'] = $data['emailaddress'] ? $data['emailaddress'] : '';
			// $labfields['transdate'] = $data['transdate'] ? $data['transdate'] : '';
			// $labfields['receivedby'] = $data['receivedby'] ? $data['receivedby'] : '';
			// $labfields['refnum'] = $data['refnum'] ? $data['refnum'] : '';
			// $labfields['labexam'] = $data['labexam'] ? $data['labexam'] : '';
			// $labfields['vtmresult'] = $data['vtmresult'] ? $data['vtmresult'] : '';
			// $labfields['acceptable'] = $data['acceptable'] ? $data['acceptable'] : '';
			// $labfields['requisitiner'] = $data['requisitiner'] ? $data['requisitiner'] : '' ;
			// $labfields['address'] = $data['address'] ? $data['address'] : '' ;
			// $labfields['dru'] = $data['dru'] ? $data['dru'] : '' ;
			// $labfields['drutype'] = $data['drutype'] ? $data['drutype'] : '' ;
			// $labfields['region'] = $data['region'] ? $data['region'] : '' ;
			// $labfields['province'] = $data['province'] ? $data['province'] : '' ;
			// $labfields['municipality'] = $data['municipality'] ? $data['municipality'] : '' ;


			
			$labfields['serumdate'] = $data['serumdate'];
			$labfields['serumRITMdate'] = $data['serumRITMdate'];
			$labfields['serumRITMrcvdate'] = $data['serumRITMrcvdate'];
			$labfields['serumresult'] = $data['serumresult'];
			$labfields['serumpcrResult'] = $data['serumpcrResult'];
			$labfields['swabdate'] = $data['swabdate'];
			$labfields['swabRITMdate'] = $data['swabRITMdate'];
			$labfields['swabRITMrcvdate'] = $data['swabRITMrcvdate'];
			$labfields['swabresult'] = $data['swabresult'];
			$labfields['swabpcrResult'] = $data['swabpcrResult'];
			$labfields['otherdate'] = $data['otherdate'];
			$labfields['otherRITMdate'] = $data['otherRITMdate'];
			$labfields['otherRITMrcvdate'] = $data['otherRITMrcvdate'];
			$labfields['otherresult'] = $data['otherresult'];
			$labfields['otherpcrResult'] = $data['otherpcrResult'];
			$labfields['classificationresult'] = $data['classificationresult'];
			$labfields['dischargedate'] = $data['dischargedate'];
			$labfields['dischargecondition'] = $data['dischargecondition'];
			$labfields['informant'] = $data['informant'];
			$labfields['relationship'] = $data['relationship'];
			$labfields['telno'] = $data['telno'];





			$ivnfield['investigator'] = $data['investigator'];
			$ivnfield['Interviewdate'] = $data['Interviewdate'];
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


			// $ivnfield['ifyescontactno1'] = $data['ifyescontactno1'];


			$ivnfield['Disposition'] = $data['Disposition'];
			$ivnfield['illnessDate'] = $data['illnessDate'];
			$ivnfield['admissiondate'] = $data['admissiondate'];
			$ivnfield['fever'] = $data['fever'];
			$ivnfield['cough'] = $data['cough'];
			$ivnfield['sorethroat'] = $data['sorethroat'];
			$ivnfield['colds'] = $data['colds'];
			$ivnfield['sob'] = $data['sob'];
			$ivnfield['othersign'] = $data['othersign'];
			$ivnfield['historyillness'] = $data['historyillness'];
			$ivnfield['historyspecify'] = $data['historyspecify'];
			$ivnfield['isxray'] = $data['isxray'];
			$ivnfield['xwhen'] = $data['xwhen'];
			$ivnfield['ispregnant'] = $data['ispregnant'];
			$ivnfield['pregnantLMP'] = $data['pregnantLMP'];
			$ivnfield['ishigrisk'] = $data['ishigrisk'];
			$ivnfield['xraysresult'] = $data['xraysresult'];


			if ($data['formtype'] == "create") {

				$this->db->insert("patientmaster",$patientfield);
				$pid1  = $this->db->insert_id();
				$labfields['pid'] = $pid1;

				$this->db->insert("labmaster",$labfields);

				$ivnfield['pid'] = $pid1;

				$this->db->insert("invmaster",$ivnfield);

			}else if ($data['formtype'] == "update"){

				$pid1 = $data['pid'];
				$this->db->select('*')->where('pid',$pid)->update('patientmaster',$patientfield);
				$this->db->select('*')->where('pid',$pid)->update('labmaster',$labfields);
				$this->db->select('*')->where('pid',$pid)->update('invmaster',$ivnfield);


			}
				
			
			 // $this->db->insert("labmaster",$labfields);

	
    	return $pid1;

	}

	
	
































	function save_request($data){

		$lastrow = $this->db->select("request_id")->from("tbl_request")->get()->last_row();
		if (count($lastrow) > 0) {
			$id = $lastrow->request_id;
		}else{
			$id = 0;
		}

		if ($data['formtype'] == 'create') {
			$inrno = str_pad((int)$id+1, 4, 0, STR_PAD_LEFT);

			$idrequest_id = $data['request_id'];

			$field['hospitalNO'] = $data['hospitalNO'];
			$field['accessionNo'] = $data['accessionNo'];
			$field['firstname'] = $data['firstname'];
			$field['middlename'] = $data['middlename'];
			$field['lastname'] = $data['lastname'];
			$field['dateofBirth'] = $data['dateofBirth'];
			$field['patientAddress'] = $data['clientAddress'];
			$field['gender'] = $data['gender'];
			$field['age'] = $data['age'];
			$field['locationClassification'] = $data['locationClassification'];
			$field['room'] = $data['room'];
			$field['dateofAdmission'] = $data['dateofAdmission'];
			$field['ClinicalImpression'] = $data['ClinicalImpression'];
			$field['suspectedAgent'] = $data['suspectedAgent'];
			$field['dateofOnsetIllness'] = $data['dateofOnsetIllness'];
			$field['medicalDoctor'] = $data['medicalDoctor'];
			$field['RequisitionerAddress'] = $data['RequisitionerAddress'];
			$field['telNo'] = $data['telNo'];
			$field['faxNo'] = $data['faxNo'];
			$field['cellNO'] = $data['cellNO'];
			$field['emailAddress'] = $data['emailAddress'];
			$field['dru'] = $data['dru'];
			$field['typeDru'] = $data['typeDru'];
			$field['region'] = $data['region'];
			$field['province'] = $data['province'];
			$field['municipality'] = $data['municipality'];
			$field['specimenReceipt'] = $data['specimenReceipt'];
			$field['specimentReceiptTime'] = $data['specimentReceiptTime'];
			$field['receivedBy'] = $data['receivedBy'];
			$field['officialReceiptNo'] = $data['officialReceiptNo'];
			$field['testPerform'] = $data['testPerform'];
			$field['specimenType'] = $data['specimenType'];

			$field['specimenAcceptable'] = $data['specimenAcceptable'];
			$field['status'] = "Active";
		
			if ($idrequest_id != "") {

				$query = $this->db->select('*')
					->where("request_id",$idrequest_id)
					->update('tbl_request',$field);
			}else{

				$field['AdmissionNo'] = 'CDUH-COVID-19-'.$inrno;
				$this->db->insert("tbl_request",$field);
				$d->create();
			}
			

		}
		else if ($data['formtype'] == "result") {

			$field['testResult'] = $data['testResult'];
			$field['Interpretation'] = $data['Interpretation'];
			$field['comments'] = $data['comments'];
			$field['performedBy'] = $data['performedBy'];
			$field['verifiedBy'] = $data['verifiedBy'];
			$field['pathologist'] = $data['pathologist'];
			$id = $data['requestid'];

			return $query = $this->db->select('*')
				->where("request_id",$id)
				->update('tbl_request',$field);

		}
	

	}

	function create_patientmaster(){

		// $field['pid'] = $data['pid'];

		$field['hospnum'] = $data['hospnum'];
		$field['firstname'] = $data['firstname'];
		$field['middlename'] = $data['middlename'];
		$field['lastname'] = $data['lastname'];
		$field['dob'] = $data['dob'];
		$field['gender'] = $data['gender'];
		$field['nationalityid'] = $data['nationalityid'];
		$field['civilstatus'] = $data['civilstatus'];
		$field['occupation'] = $data['occupation'];
		$field['passportno'] = $data['passportno'];

		return $this->db->insert("patientmaster",$field);

	}


	function column_table($data){

		$field['column'] = $data['column'];
		$field['type'] = "1";
		$field['status'] = "Active";
		$this->db->insert("tbl_column",$field);
	}

	
}