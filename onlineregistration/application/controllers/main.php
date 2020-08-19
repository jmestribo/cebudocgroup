<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model','login');
		$this->load->model("create_model","create");
		$this->load->model("get_model","get");

	}
	function checksession(){

		if (!isset($_SESSION['user_id'])) {

			redirect("Page/signin");
		}else{


		}

	}
	function index(){

		$this->checksession();
		$this->patientlist();
	}

	function Home(){

		$data['header'] = "include/header";
		$data['navbar'] = "laboratory/mainpage/sidebar";
		$data['body'] = "laboratory/mainpage/home";
		$data['footer'] =  "include/footer";
		$this->load->view("laboratory/mainpage/hometemplate", $data);

	}

	function patientlist(){
		$this->checksession();
		$data['header'] = "include/header";
		$data['navbar'] = "laboratory/mainpage/sidebar";
		$data['body'] = "laboratory/mainpage/patientmasterlist";
		$data['footer'] =  "include/footer";
		$this->load->view("laboratory/mainpage/hometemplate", $data);
	}



	// function patientlist(){
	// 	$this->checksession();
	// 	$data['header'] = "include/header";
	// 	$data['navbar'] = "laboratory/mainpage/sidebar";
	// 	$data['body'] = "laboratory/mainpage/patientlist";
	// 	$data['footer'] =  "include/footer";
	// 	$this->load->view("laboratory/mainpage/hometemplate", $data);
	// }

	
	function column(){
		$data['header'] = "include/login_header";
		$data['body'] = "laboratory/mainpage/addcolumn";
		$this->load->view("laboratory/mainpage/template", $data);
	}

	function Patient_result($id){
		$data['header'] = "include/login_header";
		$data['body'] = "laboratory/mainpage/patientreportform";
		$this->load->view("laboratory/mainpage/template", $data);
	}




	function destroy_session(){
		session_destroy();
		redirect("Page");
	}
	function Signout_account(){

		$this->destroy_session();

	}

	function getpatientinformationrow($id){
		
		$result = $this->get->patientresult($id);
		echo json_encode($result);
	}

	function searchpatient(){
		$id = $this->input->post();
		$result = $this->get->searchpatientid($id);
		$list = "";
		if (count($result) > 0) {
			foreach ($result as $row) {
				$list .='
					<tr>
						<td style="width: 10vw !important;" >'.$row->AdmissionNo.'</td>
						<td style="width: 10vw !important;" >'.$row->lastname.' '.$row->firstname.' '.$row->middlename.'</td>
						<td style="width: 10vw !important;" >'.$row->testPerform.'</td>
						<td style="width: 10vw !important;" >'.$row->specimenType.'</td>
						<td style="width: 20vw !important;" >'.$row->testResult.'</td>
						<td style="width: 20vw !important;" >'.$row->Interpretation.'</td>
						<td style="width: 10vw !important;" >'.$row->performedBy.'</td>
						<td style="width: 10vw !important;" >'.$row->verifiedBy.'</td>
						<td style="width: 10vw !important;" >'.$row->pathologist.'</td>
						<td style="width: 10vw !important;" ><a href="#" id="printresult" attrid="'.$row->request_id.'" class="badge badge-primary p-2">PRINT RESULT</a></td>
					</tr>
				';
			}
		}else{
			$list .='
				<tr><td colspan="32">No Patient Found!</td></tr>
			';
		}
		echo $list;
	}
	function searchpatientlist(){
		$id = $this->input->post();
		$result = $this->get->searchpatientid($id);
		$list = "";
		if (count($result) > 0) {
			foreach ($result as $row) {
				$list .='
					<tr class="editpatient context-menu-one" testPerform="'.$row->testPerform.'" patientid="'.$row->request_id.'" patientname ="'.$row->lastname.' '.$row->firstname.' '.$row->middlename.'">
						<td style="width: 10vw !important;" >'.$row->AdmissionNo.'</td>
						<td style="width: 10vw !important;" >'.$row->hospitalNO.'</td>
						<td style="width: 10vw !important;" >'.$row->accessionNo.'</td>
						<td style="width: 10vw !important;" >'.$row->firstname.'</td>
						<td style="width: 10vw !important;" >'.$row->middlename.'</td>
						<td style="width: 10vw !important;" >'.$row->lastname.'</td>
						<td style="width: 10vw !important;" >'.$row->dateofBirth.'</td>
						<td style="width: 10vw !important;" >'.$row->age.'</td>
						<td style="width: 10vw !important;" >'.$row->gender.'</td>
						<td style="width: 30vw !important;" >'.$row->patientAddress.'</td>
						<td style="width: 20vw !important;" >'.$row->locationClassification.'</td>
						<td style="width: 10vw !important;" >'.$row->room.'</td>
						<td style="width: 10vw !important;" >'.$row->dateofAdmission.'</td>
						<td style="width: 20vw !important;" >'.$row->ClinicalImpression.'</td>
						<td style="width: 20vw !important;" >'.$row->suspectedAgent.'</td>
						<td style="width: 10vw !important;" >'.$row->dateofOnsetIllness.'</td>
						<td style="width: 10vw !important;" >'.$row->medicalDoctor.'</td>
						<td style="width: 20vw !important;" >'.$row->RequisitionerAddress.'</td>
						<td style="width: 10vw !important;" >'.$row->telNo.'</td>
						<td style="width: 10vw !important;" >'.$row->faxNo.'</td>
						<td style="width: 10vw !important;" >'.$row->cellNO.'</td>
						<td style="width: 20vw !important;" >'.$row->emailAddress.'</td>
						<td style="width: 10vw !important;" >'.$row->dru.'</td>
						<td style="width: 10vw !important;" >'.$row->typeDru.'</td>
						<td style="width: 10vw !important;" >'.$row->specimenReceipt .'</td>
						<td style="width: 10vw !important;" >'.$row->specimentReceiptTime.'</td>
						<td style="width: 10vw !important;" >'.$row->receivedBy.'</td>
						<td style="width: 10vw !important;" >'.$row->officialReceiptNo.'</td>
					</tr>
				';
			}
		}else{
			$list .='
				<tr><td colspan="32">No Patient Found!</td></tr>
			';
		}
		echo $list;
	}

	function signup(){
		$data['header'] = "include/login_header";
		$data['body'] = "login/signup";
		$this->load->view("login/template", $data);
	}


	function authentication(){
		$fields = $this->input->post();
		unset($fields['login']);
		$email = $fields['username'];
		$password = $fields['password'];
		$check = $this->login->login($email);
		if ($check) {
			if (password_verify($password, $check->password)) {
				$this->session->set_flashdata("response","You are now Logged in");
				// $_SESSION['email'] = $check->email;
				$_SESSION['name'] = $check->name;
				// $_SESSION['user_code'] = $check->user_code;
				// $_SESSION['role'] = $check->role_id;
				$_SESSION['user_id'] = $check->user_id;
				// $_SESSION['position'] = $check->position;
				// $_SESSION['ipaddress'] = $check->ipaddress;
				// $_SESSION['local'] = $check->ipaddress;
				// $_SESSION['user_type'] = $check->user_type;
				// $_SESSION['profile'] = $check->profile;
				// if ($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Super Admin" ) {

					redirect("Main/patientlist");

				// }else if ($_SESSION['user_type'] == "User") {

				// }
				
			}else{
				$this->session->set_flashdata("response","Incorrect Email or Password!");
				redirect("Page/signin");
			}
			
		}
		else{
			$this->session->set_flashdata("response","Incorrect Email or Password!");
			redirect("Page/signin");
		}
	
	}


}