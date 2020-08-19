<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model','login');
		$this->load->model("Create_model","create");
		$this->load->model("Get_model","get");
		$this->load->library("encrypt");
	}

	function checksession(){
		if (!isset($_SESSION['idno'])) {
			session_destroy();
		}else{
			
		}
	}
	function index(){
		$this->checksession();
		$this->Lists();
	}
	function Lists(){
		$data['header'] = "include/header";
		$data['navbar'] = "include/navbar";
		$data['body'] = "pcrpanel/appointmentlist";
		$data['footer'] = "include/footer";
		$data['script'] = "include/script";
		$this->load->view("main/template",$data);
	}


	function Setting(){
		$data['header'] = "include/header";
		$data['navbar'] = "include/navbar";
		$data['body'] = "main/patientmasterlist";
		$data['footer'] = "include/footer";
		$data['script'] = "include/script";
		$this->load->view("main/template",$data);
	}


	function CreateNew(){
		$this->load->view("include/header");
		$this->load->view("main/form-investigation");
		$this->load->view("include/footer");
		$this->load->view("include/script");
	}

	function updateremarks(){
		$this->load->view("include/header");
		$this->load->view("main/updateremarks");
		$this->load->view("include/footer");
		$this->load->view("include/script");
	}

	function submitremarks(){
		$data = $this->input->post();
		$this->create->remarks($data);
		redirect("PatientInformation/Lists");
	}
	function updateinformation(){
		 $url = $this->uri->segment(3);
	     $data = $this->input->post();
	     $result = $this->create->savepatientmaster($data);
	     redirect("PatientInformation/CreateNew/".$data['schedid']."/".$result."/");
	}

	function destroy_session(){
		session_destroy();
		redirect("Page");
	}
	function Signout_account(){

		$this->destroy_session();

	}

	function Patient_result(){

		$data['header'] = "include/header";
		$data['body'] =  "main/patientreportform";
		$this->load->view("main/template1",$data);
	}
	

	function allregistrationonline(){

		$type = $this->input->post('type');
		$url = $this->input->post('url');
		if($url == "pending-request"){
			$requestlist = $this->get->patientschedule(0);
		}
		else if ($url == "draft") {
			$requestlist = $this->get->getallpatientschedpaids(1);

		}else if($url == "unverified"){
			$requestlist = $this->get->getallpatientpaid(0);
		}
		
		$list = "";
		$count = 1;
		$css = "";
		$status = "";
		$dob = "";
		$file = "";
		$td = "";
		
		if (count($requestlist) > 0) {
			$today = strtotime(date('m-d-Y',strtotime("-1 day")));
			$today1 = strtotime(date('Y-m-d',strtotime("+1 day")));
			foreach ($requestlist as $time) {

				$row = $this->get->patientinformationrow($time->sid);
				if ($time->paymentstatus == 0) {
					$css = 'bg-default';
					$status = "Unpaid";
				}else if ($time->paymentstatus == 1){
					$css = 'btn-default';
					$status = "Paid";
				}
				if($row->dob != ""){
                    $dob = date('F d Y' ,strtotime($row->dob));
                }else{
                    $dob = "";
                }

                if ($row->attachfile != "") {
                	$file = '<center><a href="https://cebudocgroup.com/onlineregistration/upload/attachment/'.$row->attachfile.'.jpg" target="_blank" class="badge badge-primary badge-block text-uppercase" >Check attachfile</a></center>';
                }else{
                	$file = "";
                }
                if ($_SESSION['department'] == "cashier") {
                	$td  = '<td style="width: 2vw !important;" >'.$file.'</td>';
                }else{
                	$td = '';
                }
				if ($row->firstname != "") {

					if (strtotime($today1) > strtotime($time->date)) {
						$list .='';
					}else{
						$list .='
							<tr class="editpatient '.$css.' context-menu-one " patientsched="'.$row->schedid.'" patientid="'.$row->pid.'">
								<td style="width: 1vw !important;" >'.$count.'</td>
								<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($time->date)).'</td>
								<td style="width: 3vw !important;" >'.$time->time.'</td>
								<td style="width: 3vw !important;" >'.$row->firstname.'</td>
								<td style="width: 3vw !important;" >'.$row->middlename.'</td>
								<td style="width: 3vw !important;" >'.$row->lastname.'</td>
								<td style="width: 5vw !important;" >'.$dob.'</td>
								<td style="width: 2vw !important;" >'.$row->age.'</td>
								<td style="width: 2vw !important;" >'.$row->gender.'</td>
								'.$td.'
								<td style="width: 5vw !important;" ><div class="">'.$status.'</div></td>
								<td style="width: 12vw !important;" >'.date('F d Y h:i:s A' ,strtotime($time->date_created)).'</td>
							</tr>
						';
					}
					
					$count++;
				}else{
					$list .='';
				}
				
				
			}

		}else{
			$list =  '
			<tr><td colspan="32" >No Patient Found!</td></tr>
			';
		}




		echo $list;
	}

	function searchpatient(){
		$data = $this->input->post();
		$result = $this->get->filterpatient($data);
		$list = "";
		$count = 1;
		$status = "";
		$css = "";
		$file = "";
		$td = "";
		if (count($result) > 0) {
			foreach ($result as $row) {

				$time = $this->get->listappointment($row->schedid);

				if ($time->paymentstatus == 0) {
					$css = 'bg-default';
					$status = "Unpaid";
				}else if ($time->paymentstatus == 1){
					$css = 'btn-default';
					$status = "Paid";
				}
				if ($row->attachfile != "") {
                	$file = '<center><a href="https://cebudocgroup.com/onlineregistration/upload/attachment/'.$row->attachfile.'.jpg" target="_blank" class="badge badge-primary badge-block text-uppercase" >Check attachfile</a></center>';
                }else{
                	$file = "";
                }
                if ($_SESSION['department'] == "cashier") {
                	$td  = '<td style="width: 2vw !important;" >'.$file.'</td>';
                }else{
                	$td = '';
                }
				$list .='
					<tr class="editpatient '.$css.' context-menu-one " patientsched="'.$row->schedid.'" patientid="'.$row->pid.'">
						<td style="width: 1vw !important;" >'.$count.'</td>
						<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($time->date)).'</td>
						<td style="width: 3vw !important;" >'.$time->time.'</td>
						<td style="width: 3vw !important;" >'.$row->firstname.'</td>
						<td style="width: 3vw !important;" >'.$row->middlename.'</td>
						<td style="width: 3vw !important;" >'.$row->lastname.'</td>
						<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($row->dob)).'</td>
						<td style="width: 2vw !important;" >'.$row->age.'</td>
						<td style="width: 2vw !important;" >'.$row->gender.'</td>
						'.$td.'
						<td style="width: 5vw !important;" ><div >'.$status.'</div></td>
						<td style="width: 12vw !important;" >'.date('F d Y h:i:s A' ,strtotime($time->date_created)).'</td>
					</tr>
				';
				$count++;
			}
		}else{
			$list .='
				<tr><td colspan="32">No Record Found!</td></tr>
			';
		}
		echo $list;
	}
	

	public function submitregistrationform(){
		$data = $this->input->post();
		return $this->create->save_request($data);
		redirect("covid");
	}

}