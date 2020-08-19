<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratory extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model','login');
		$this->load->model("create_model","create");
		$this->load->model("get_model","get");
	}
	
	function index(){
		$this->Form();
	}
	function Form(){
		$data['header'] = "include/header";
		$data['body'] = "laboratory/registration-form";
		$data['footer'] =  "include/footer";		
		$data['script'] =  "laboratory_js/labscript_js";
		$this->load->view("laboratory/template", $data);
	}
	function cases(){
		$data['header'] = "include/header";
		$data['body'] = "laboratory/caseinvestigation-form";
		$data['footer'] =  "include/footer";		
		$data['script'] =  "laboratory_js/labscript_js";
		$this->load->view("laboratory/template", $data);
	}


	function patientlistmastertable($type){

		$requestlist = $this->get->get_allrequest($type);

		if (count($requestlist) > 0) {
			foreach ($requestlist as $row) {
				echo '
					<tr class="editpatient context-menu-one" performedBy ="'.$row->performedBy.'" verifiedBy ="'.$row->verifiedBy.'" pathologist ="'.$row->pathologist.'" Interpretation ="'.$row->Interpretation.'" comments ="'.$row->comments.'" testPerform="'.$row->testPerform.'" patientid="'.$row->request_id.'" patientname ="'.$row->lastname.' '.$row->firstname.' '.$row->middlename.'">
						<td style="width: 15vw !important;" >'.$row->AdmissionNo.'</td>
						<td style="width: 10vw !important;" >'.$row->hospitalNO.'</td>
						<td style="width: 10vw !important;" >'.$row->accessionNo.'</td>
						<td style="width: 10vw !important;" >'.$row->firstname.'</td>
						<td style="width: 10vw !important;" >'.$row->middlename.'</td>
						<td style="width: 10vw !important;" >'.$row->lastname.'</td>
						<td style="width: 10vw !important;" >'.$row->dateofBirth.'</td>
						<td style="width: 10vw !important;" >'.$row->age.'</td>
						<td style="width: 10vw !important;" >'.$row->gender.'</td>
					</tr>
				 ';
			}
		}else{
			echo '
			<tr><td colspan="32" >No Patient Found!</td></tr>
			';
		}
	}

}

