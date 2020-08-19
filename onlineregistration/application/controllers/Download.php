<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Download extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->library('pdf');
		$this->load->helper('download');
		$this->load->model("get_model","create");
    }
   
    function getfile(){
    	$file =  $this->uri->segment(3);
    	$name = $file.'.pdf';
    	$data = file_get_contents("https://cebudocgroup.com/onlineregistration/upload/caseinvestigation/".$name.""); // Read the file's contents
		force_download($name, $data); 

    }
    function PrintinvestigationForm(){
      $url = $this->uri->segment(3);
      $result = $this->create->patientlist($url);	
      $resultivn = $this->create->ivmastertlist($url);

	  
	  $firstname = $result->firstname;
      $middlename = $result->middlename;
      $lastname = $result->lastname;
      $dateofBirth = date("m/d/Y",strtotime($result->dob));
      $Street = $result->pstreet;
      $municipality = $result->pmunicipality;
      $province = $result->pprovince;
      $region = $result->pregion;
      $sex = $result->gender;
      $age = $result->age;
      $pid = $result->pid;
      $nationality = $result->nationality;
      $civilstatus = $result->civilstatus;
      $occupation = $result->occupation;
      $passportno = $result->passportno;
      $phouseno = $result->phouseno;
      $pstreet = $result->pstreet;
      $pmunicipality = $result->pmunicipality;
      $pprovince = $result->pprovince;
      $pregion = $result->pregion;
      $pphone = $result->pphone;
      $pcellphone = $result->pcellphone;
      $pemail = $result->pemail;
      $chouseno = $result->chouseno;
      $cstreet = $result->cstreet;
      $cmunicipality = $result->cmunicipality;
      $cprovince = $result->cprovince;
      $cregion = $result->cregion;
      $cphone = $result->cphone;
      $ccellphone = $result->ccellphone;
      $cemail = $result->cemail;
      $ofwemployeername = $result->ofwemployeername;
      $ofwoccupation = $result->ofwoccupation;
      $ofwplaceofwork = $result->ofwplaceofwork;
      $ofwhouse = $result->ofwhouse;
      $ofwstreet = $result->ofwstreet;
      $ofwcity = $result->ofwcity;
      $ofwprovince = $result->ofwprovince;
      $ofwcountry = $result->ofwcountry;
      $ofwofficephoneno = $result->ofwofficephoneno;
      $ofwcellphoneno = $result->ofwcellphoneno;

        $nameinvestigator =  $resultivn->investigator;
         $dateinvestigate = $resultivn->Interviewdate;

      $travelOtherCountry = $resultivn->travelOtherCountry;
      $portofexit = $resultivn->portofexit;
      $vessel = $resultivn->vessel;
      $vesselno = $resultivn->vesselno;
      $departuredate = date("m/d/Y",strtotime($resultivn->departuredate));
      $arrivaldate = date("m/d/Y",strtotime($resultivn->arrivaldate));
      $exposebefore14 = $resultivn->exposebefore14;
      $dateofcontact = $resultivn->dateofcontact;
      $placebefore14 = $resultivn->placebefore14;
      $ifyes = $resultivn->ifyes;
      $ifyesdate = $resultivn->ifyesdate;
      $ifyesname1 = $resultivn->ifyesname1;
      $ifyesname2 = $resultivn->ifyesname2;
      $ifyescontactno2 = $resultivn->ifyescontactno2;
      $ifyesname3 = $resultivn->ifyesname3;
      $ifyescontactno3 = $resultivn->ifyescontactno3;
      $ifyesname4 = $resultivn->ifyesname4;
      $ifyesontactno4 = $resultivn->ifyesontactno4;

         $Disposition = $resultivn->Disposition;
          $illnessDate = $resultivn->illnessDate;
          $admissiondate = $resultivn->admissiondate;
          $fever = $resultivn->fever;
          $cough = $resultivn->cough;
          $sorethroat = $resultivn->sorethroat;
          $colds = $resultivn->colds;
          $sob = $resultivn->sob;
          $othersign = $resultivn->othersign;
          $historyillness = $resultivn->historyillness;
          $historyspecify = $resultivn->historyspecify;
          $isxray = $resultivn->isxray;
          $xwhen = $resultivn->xwhen;
          $ispregnant = $resultivn->ispregnant;
          $pregnantLMP = $resultivn->pregnantLMP;
          $ishigrisk = $resultivn->ishigrisk;
          $xraysresult = $resultivn->xraysresult;
 
          $resultlab = $this->get->labmastertlist($url);
          $serumdate = $resultlab->serumdate;
          $serumRITMdate = $resultlab->serumRITMdate;
          $serumRITMrcvdate = $resultlab->serumRITMrcvdate;
          $serumresult = $resultlab->serumresult;
          $serumpcrResult = $resultlab->serumpcrResult;
          $swabdate = $resultlab->swabdate;
          $swabRITMdate = $resultlab->swabRITMdate;
          $swabRITMrcvdate = $resultlab->swabRITMrcvdate;
          $swabresult = $resultlab->swabresult;
          $swabpcrResult = $resultlab->swabpcrResult;
          $otherdate = $resultlab->otherdate;
          $otherRITMdate = $resultlab->otherRITMdate;
          $otherRITMrcvdate = $resultlab->otherRITMrcvdate;
          $otherresult = $resultlab->otherresult;
          $otherpcrResult = $resultlab->otherpcrResult;
          $classificationresult = $resultlab->classificationresult;
          $dischargedate = $resultlab->dischargedate;
          $dischargecondition = $resultlab->dischargecondition;
          $informant = $resultlab->informant;
          $relationship = $resultlab->relationship;
          $telno = $resultlab->telno;


    	$html = '
				<!DOCTYPE html>
				<html>
					<head>
					 <title>PCR TESTING</title>
					<style>
						.span{
							margin-right:10px;
						}
						table, td{
						  border: 1px solid #001;
						}
						table {
						  border-collapse: collapse;
						  width: 100%;
						}
						th {
						  height: 5px;
						}
						.tittle{
							text-transform:uppercase;
							height:17px;
							text-align:center;
							font-size:0.6em !important;
							background:#9db6c5;color:black;
						}
						.tittlesub{
							text-transform:uppercase;
							height:17px;
							text-align:left;
							font-size:0.6em !important;
							background:#9db6c5;color:black;
						}
						
						.text{
							font-size:0.6em;

							text-transform:lowecase;
						}
						.fields{
							height:10px;
							padding:2px;
						}
						.span1{
							height:15px;
							border-bottom:1px solid #001;
							font-size:0.6em;
						}
						.span3{
							height:13px;
							font-size:0.6em;
						}
						.span2{
							border-bottom:1px solid #001;
							font-size:0.6em;
							text-align:center;
						}
						.text-center{
							text-align:center;
						}
						.smaller{
							width:10vw;
						}
						.td-2{
							width:3vw;
						}
						.td-5{
							width:5vw;
						}
						.td-10{
							width:20vw;
						}
						.td-20{
							width:30vw;
						}
						.td-30{
							width:30vw;
						}
						.td-40{
							width:40vw;
						}
						.td-50{
							width:50vw;
						}
						.td-60{
							width:60vw;
						}
						.td-70{
							width:70vw;
						}
						.td-80{
							width:80vw;
						}
						.td-90{
							width:90vw;
						}
						.td-100{
							width:100vw;
						}
					</style>
				</head>
				<body>
					<div>
						<table>
							<tr>
								<th colspan="2" style="boder:0px;">
									<center><img src="./icon/cdg.png" alt="logo" style="width: 65px;height: 60px;"></center>
								</th>
							    <th colspan="8">
							    	<h3>
							    		<center>
							    			<div>CASE INVESTIGATION FORM</div>
							    			<div>CoronaVirus Disease (Covid-19) </div>
							    		</center>
							    	</h3>
							    </th>
							    <th colspan="2" style="boder:0px;">
									<center><img src="./icon/cduh.png" alt="logo" style="width: 65px;height: 60px;"></center>
								</th>
							</tr>
							<tr>
							    <td colspan="5">
							    	<div class="text">Disease Reporting Unit / Hospital <div>
							    	<div class="fields">Cebu Doctors University Hospital<div>
							    </td>
							    <td colspan="4">
							    	<div class="text">Name of Investigator <div>
							    	<div class="fields">'.$nameinvestigator.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Date of Invterview <div>
							    	<div class="fields">'.$dateinvestigate.'<div>
							    </td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittle">1. Patient profile</td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">Last Name <div>
							    	<div class="fields">'.$lastname.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">First Name <div>
							    	<div class="fields">'.$firstname.'<div>
							    </td>
							    <td colspan="2">
							    	<div class="text">Middle Name <div>
							    	<div class="fields">'.$middlename.'<div>
							    </td>
							    <td colspan="2">
							    	<div class="text">Birthday(mm/dd/yyyy) <div>
							    	<div class="fields">'.$dateofBirth.'<div>
							    </td>
							    <td colspan="1">
							    	<div class="text">Age <div>
							    	<div class="fields">'.$age.'<div>
							    </td>
							    <td colspan="1">
							    	<div class="text">Sex <div>
							    	<div class="fields">'.$sex.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">Occupation <div>
							    	<div class="fields">'.$occupation.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Civil status <div>
							    	<div class="fields">'.$civilstatus.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Nationality <div>
							    	<div class="fields">'.$nationality.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Passport No.<div>
							    	<div class="fields">'.$passportno.'<div>
							    </td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittle">2. Philippines Residence</td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittlesub">2.1 Permanent Address</td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">House No./Lot/Bldg. <div>
							    	<div class="fields">'.$phouseno.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Street/Barangay <div>
							    	<div class="fields">'.$pstreet.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Municipality/city <div>
							    	<div class="fields">'.$pmunicipality.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Province<div>
							    	<div class="fields">'.$pprovince.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">Region <div>
							    	<div class="fields">'.$pregion.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Home Phone No <div>
							    	<div class="fields">'.$phouseno.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Cellphone no. <div>
							    	<div class="fields">'.$pcellphone.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Email address<div>
							    	<div class="fields">'.$pemail.'<div>
							    </td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittlesub">2.2 Current Address</td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">House No./Lot/Bldg. <div>
							    	<div class="fields">'.$chouseno.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Street/Barangay <div>
							    	<div class="fields">'.$cstreet.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Municipality/City <div>
							    	<div class="fields">'.$cmunicipality.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Province<div>
							    	<div class="fields">'.$cprovince.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">Region <div>
							    	<div class="fields">'.$cregion.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Home Phone no <div>
							    	<div class="fields">'.$cphone.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Work Phone no. <div>
							    	<div class="fields">'.$ccellphone.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Other email address<div>
							    	<div class="fields">'.$cemail.'<div>
							    </td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittle">3. Address outside the philippines (for overseas filipino workes and individuals with residence outside the philippines) </td>
							</tr>
							<tr>
							    <td colspan="4" >
							    	<div class="text">Employer`s name <div>
							    	<div class="fields">'.$ofwemployeername.'<div>
							    </td>
							    <td colspan="4">
							    	<div class="text">Occupation <div>
							    	<div class="fields">'.$ofwoccupation.'<div>
							    </td>
							    <td colspan="4" >
							    	<div class="text">Place of work <div>
							    	<div class="fields">'.$ofwplaceofwork.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">House No./Bldg. Name <div>
							    	<div class="fields">'.$ofwhouse.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Street <div>
							    	<div class="fields">'.$ofwstreet.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">City/Municipality <div>
							    	<div class="fields">'.$ofwcity.'<div>
							    </td>
							    <td colspan="3">
							    	<div class="text">Provice<div>
							    	<div class="fields">'.$ofwprovince.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="4" >
							    	<div class="text">Country<div>
							    	<div class="fields">'.$ofwcountry.'<div>
							    </td>
							    <td colspan="4">
							    	<div class="text">Office Phone No. <div>
							    	<div class="fields">'.$ofwofficephoneno.'<div>
							    </td>
							    <td colspan="4" >
							    	<div class="text">Cellphone No. <div>
							    	<div class="fields">'.$ofwcellphoneno.'<div>
							    </td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittle">4. Travel History</td>
							</tr>
							<tr>
							    <td colspan="8" >
							    	<div class="text">History of travel/visit/work in other countries with a known COVID-19 transmission 14 days before the onset of your signs and symptoms 
							    		<center>
								    		'.$travelOtherCountry.'
								    	</center>
							    	<div>
							    	
							    </td>
							    <td colspan="4">
							    	<div class="text">Port (Country) of exit : <div>
							    	<div class="fields">'.$portofexit.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="3" >
							    	<div class="text">Airline/Sea Vessel:<div>
							    	<div class="fields">'.$portofexit.'<div>
							    </td>
							    <td colspan="2">
							    	<div class="text">Flight/Vessel Number <div>
							    	<div class="fields">'.$vesselno.'<div>
							    </td>
							    <td colspan="3" >
							    	<div class="text">Date of departure(mm/dd/yyyy) <div>
							    	<div class="fields">'.$departuredate.'<div>
							    </td>
							    <td colspan="4">
							    	<div class="text">Date of arrival in philippines<div>
							    	<div class="fields">'.$arrivaldate.'<div>
							    </td>
							</tr>

							<tr>
							  	<td colspan="12" class="tittle">5. Exposure history</td>
							</tr>
							<tr>
							    <td colspan="6" >
							    	<div class="text">History of exposure to known COVID-19 case 14 days before the onset of signs and symptoms:
							    		'.$exposebefore14.'
							    	<div>
							    </td>
							    <td colspan="6">
							    	<div class="text">if yes: date of contact with known COVID-19 case (mm/dd/yyyy) <div>
							    	<div class="fields">'.$dateofcontact.'<div>
							    </td>
							</tr>
							<tr>
							    <td colspan="6" >
							    	<div class="text">Have you been in a place with a known COVID-19 transmission 14 days before the onset of signs and symptoms:
							    		'.$placebefore14.'
							    	<div>
							    </td>
							    <td colspan="6">
							    	<div class="text">
							    		if yes: Place  &nbsp;&nbsp;&nbsp;
							    		'.$ifyes.'
							    	</div>
							    	<div class="text">
							    		'.$ifyesname2.'
							    	</div>
							    	<div class="text">
							    		<div class="span"> Date when you have been in that place:  '.$ifyesdate.'</div>
								    	<div class="span">Name of the place : '.$ifyesname2.'</div>
							    	</div>
							    </td>
							    
							</tr>
							<tr>
							    <td colspan="6" >
							    	<div class="text">
							    		List the names of persons who were with you during this (these) occasion(s) and their contact numbers: <div><i>Use the back part of this sheet when needed</i></div>
							    	<div>
							    </td>
							    <td colspan="3">
							    	<div class="text span2">
							    		NAME
							    	</div>
							    	<div class="">
							    		<div class="span1">1. '.$ifyesname1.'</div>
								    	<div class="span1">2. '.$ifyesname2.'</div>
								    	<div class="span3">3. '.$ifyesname3.'</div>
							    	</div>
							    </td>
							    <td colspan="3">
							    	<div class="text span2">
							    		CONTACT NUMBER
							    	</div>
							    	<div class="">
							    		<div class="span1">'.$ifyescontactno2.'</div>
								    	<div class="span1">'.$ifyescontactno3.'</div>
								    	<div class="span3">'.$ifyesontactno4.'</div>
							    	</div>
							    </td>
							</tr>
							<tr>
							  	<td colspan="12" class="tittle">6. Clinical Information</td>
							</tr>
							<tr>
							    <td colspan="4" >
							    	<div class="text">Disposition at Time of Report<div>
							    	<div class="fields">'.$Disposition.'<div>
							    </td>
							    <td colspan="8">
							    	<center class="text">
							    		'.$lastname.'
							    	</center>
							    </td>
							    
							</tr>

							<tr>
							    <td colspan="6" >
							    	<div class="text">Date of onset illness (mm/dd/yyyy)<div>
							    	<div class="fields">'.$illnessDate.'<div>
							    </td>
							    <td colspan="6">
							    	<div class="text">Date of Admission/Consultant(mm/dd/yyyy)<div>
							    	<div class="fields">'.$admissiondate.'<div>
							    </td>
							    
							</tr>

							<tr>
							    <td colspan="12" >
						    		<span class="span text">Fever  '.$fever.'<sup> 0 </sup>C</span> 
						    		<span class="span text">('.$cough.') Cough </span>
						    		<span class="span text">( '.$sorethroat.') Sore throat</span> 
						    		<span class="span text">('.$colds.') Coids</span> 
						    		<span class="span text">('.$sob.' ) Shortness/difficulty of breathing</span>
							    </td>
							    
							</tr>

							<tr>
							    <td colspan="6" >
							    	<div class="text">Other signs/symptoms, specify<div>
							    	<div class="fields">'.$othersign.'<div>
							    </td>
							    <td colspan="6">
							    	<div class="text">Is there any history of other illness? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    	'.$historyillness.'
							    	<div>
							    	<div class="fields">
							    	if YES, specify:'.$historyspecify.'
							    	<div>
							    </td>
							</tr>

							<tr>
							    <td colspan="6" >
							    	<div class="text">
							    		Chest X-ray done?
							    		'.$isxray.'
							    	<div>
							    	<div class="fields">
							    	if YES, when?:'.$xwhen.'
							    	<div>
							    </td>
							    <td colspan="6">
							    	<div class="text">Are you pregnant ? 
								    	'.$ispregnant.'
							    	<div>
							    	<div class="fields">
							    		<span class="span">LMP '.$pregnantLMP.'
								    	<span class="span">Assessed as High Risk? '.$ishigrisk.' 
							    	<div>
							    </td>
							</tr>

							<tr>
							    <td colspan="12" >
						    		<span class="span text">&nbsp;&nbsp;&nbsp;CXR Result : Pneumonia '.$xraysresult.'</span>
						    			
								    	<span class="span text">Other Radiologic Findings :  </span>
							    </td>
							</tr>

							<tr>
							    <td colspan="12" class="tittle">
							    	<div >7. Specimen Information</div>
							    </td>
							</tr>

							<tr>
							    <td colspan="3" >
							    	<div class="text text-center">Specimen Collected</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">if YES Date Collected</div>
							    	<div class="text text-center">(mm/dd/yyyy)</div>
							    </td>
							     <td colspan="2" >
							    	<div class="text text-center">Date Sent to RITM</div>
							    	<div class="text text-center">(mm/dd/yyyy)</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">Date Received in RITM</div>
							    	<div class="text text-center"><i>(to be filled up by RITM)</i></div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">Virus Isolation Result</div>
							    </td>
							    <td colspan="1" >
							    	<div class="text text-center">PCR Result</div>
							    </td>
							</tr>

							<tr>
							    <td colspan="3" >
							    	<span class="span text">( &nbsp;&nbsp;&nbsp;   ) Serum</span>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">  '.$serumdate.'</div>
							    </td>
							     <td colspan="2" >
							    	<div class="text text-center">  '.$serumRITMdate.'</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">  '.$serumRITMrcvdate.'</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">  '.$serumresult.'</div>
							    </td>
							    <td colspan="1" >
							    	<div class="text text-center">  '.$serumpcrResult.'</div>
							    </td>
							</tr>

							<tr>
							    <td colspan="3" >
							    	<span class="span text">( &nbsp;&nbsp;&nbsp;   ) Oropharyngeal/Nasopharyngeal Swab</span>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">'.$swabdate.'</div>
							    </td>
							     <td colspan="2" >
							    	<div class="text text-center">'.$swabRITMdate.'</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">'.$swabRITMrcvdate.'</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">'.$swabresult.'</div>
							    </td>
							    <td colspan="1" >
							    	<div class="text text-center">'.$swabpcrResult.'</div>
							    </td>
							</tr>

							<tr>
							    <td colspan="3" >
							    	<span class="span text">( &nbsp;&nbsp;&nbsp;   ) Others</span>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">'.$otherdate.'</div>
							    </td>
							     <td colspan="2" >
							    	<div class="text text-center">'.$otherRITMdate.'</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">'.$otherRITMrcvdate.'</div>
							    </td>
							    <td colspan="2" >
							    	<div class="text text-center">'.$otherresult.'</div>
							    </td>
							    <td colspan="1" >
							    	<div class="text text-center">'.$otherpcrResult.'</div>
							    </td>
							</tr>

							<tr>
							    <td colspan="12" class="tittle">
							    	<div > 8. Specimen Information</div>
							    </td>
							</tr>
							<tr>
							    <td colspan="4" >
						    		<center><span class="span text">( &nbsp;&nbsp;&nbsp;  ) Suspect Case </span></center>
							    </td>
							    <td colspan="4" >
						    		<center><span class="span text">( &nbsp;&nbsp;&nbsp;  ) Probable Case </span></center>
							    </td>
							    <td colspan="4" >
						    		<center><span class="span text">( &nbsp;&nbsp;&nbsp;  ) Confirmed Case </span></center>
							    </td>
							</tr>

							<tr>
							    <td colspan="12" class="tittle">
							    	<div >9. Outcome</div>
							    </td>
							</tr>
							<tr>
							    <td colspan="4" >
							    	<div class="text">Date of Discharge (mm/dd/yyyy)<div>
							    	<div class="fields">'.$dischargedate.'<div>
							    </td>
							    <td colspan="8">
							    	<div class="text">Condition on Discharge:<div>
							    		'.$dischargecondition.'
							    </td>
							    
							</tr>
							<tr>
							    <td colspan="4" >
						    		<span class="span text">Name of Informant : (if patient not available) </span>
						    		<div class="fields text">'.$informant.'</div>
							    </td>
							    <td colspan="4" >
						    		<span class="span text"> Relationship </span>
						    		<div class="fields text">'.$relationship.'</div>
							    </td>
							    <td colspan="4" >
						    		<span class="span text"> Phone No </span>
						    		<div class="fields text">'.$telno.'</div>
							    </td>
							</tr>

						</table>
						<div style ="float:right; margin-top:40px;width:250px; ">	
							<div style="border:1px solid black; height:40px;padding:5px;">
								<span class="span text">Official Receipt No.</span>
							    	<div class="fields text"></div>
							</div>
						</div>
					</div>
				</body>
		</html>
	    ';

    	$this->pdf->loadHtml($html);
		$this->pdf->setPaper("Legal","Portrait");
		$this->pdf->render();
		$c = $firstname.' '.$lastname.' '.date("m-d-Y");
		$x = 745;
	    $y = 575;
	    $text = "Page {PAGE_NUM}";
	    $font = null;
	    $size = 10;
	    $color = array(0,0,0);
	    $word_space = 0.0;  //  default
	    $char_space = 0.0;  //  default
	    $angle = 0.0;   //  default
	    $this->pdf->get_canvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
	 	$this->pdf->stream("".$c.".pdf", array("Attachment"=>0));
    }

}
?>