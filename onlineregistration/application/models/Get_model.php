<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model('Get_model',"get");
	}
	function patientlist($pid){
		return $this->db->select("*")->from("patientmaster")->where("pid",$pid)->get()->row();
	}

	function ivmastertlist($pid){
		return $this->db->select("*")->from("invmaster")->where("pid",$pid)->get()->row();
	}
	function labmastertlist($pid){
		return $this->db->select("*")->from("labmaster")->where("pid",$pid)->get()->row();
	}





	function patientinformation(){
		$query = $this->db->select("*")->from("patientmaster")
		->join("invmaster","invmaster.pid = patientmaster.pid","left")
		->join("labmaster","labmaster.pid = patientmaster.pid","left")
		->get()
		->result();
		 return $query;
	}

	function patientschedule($type){
		$today = date("Y-m-d");

		$query = $this->db->select("*")->from("tbl_appointment")
		->where(array("paymentstatus"=>0,"date >" =>$today))
		->order_by("date")
		->get()
		->result();
		 return $query;
	}


	function getallpatientschedpaids($type){
		$today = date("Y-m-d");
		$query = $this->db->select("*")->from("tbl_appointment")
		->where(array("paymentstatus"=>1))
		->order_by("date")
		->get()
		->result();
		 return $query;
	}

	function getallpatientpaid($type){
		$today = date("Y-m-d");
		$query = $this->db->select("*")->from("tbl_appointment")
		->where(array("paymentstatus"=>$type,"date <" =>$today))
		->order_by("date")
		->get()
		->result();
		 return $query;
	}

	function patientinformationrow($id){
		$query = $this->db->select("*")->from("patientmaster")
		->join("invmaster","invmaster.pid = patientmaster.pid","left")
		->join("labmaster","labmaster.pid = patientmaster.pid","left")
		->where("patientmaster.schedid",$id)
		->get()
		->row();
		 return $query;
	}

	function patientreports($date,$type){
	
		$today = date("Y-m-d");
		if ($date == "ALL") {

			$query = $this->db->select("*")->from("tbl_appointment")
			->where(array("tbl_appointment.paymentstatus"=>$type))
			->get()
			->result();

		}else{

			$query = $this->db->select("*")->from("tbl_appointment")
			->where(array("tbl_appointment.date"=>$date,"tbl_appointment.paymentstatus"=>$type))
			->get()
			->result();
		}
		
		 return $query;
	}

	function filterpatient($data){

		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$middlename = $data['middlename'];
		$baseurl = $data['baseurl'];
		$query = $this->db->select("*")->from("tbl_appointment")
		->join("patientmaster","patientmaster.schedid = tbl_appointment.sid","left")
		->LIKE("patientmaster.lastname",$lastname)
		->LIKE("patientmaster.firstname",$firstname)
		->LIKE("patientmaster.middlename",$middlename)
		->LIKE("tbl_appointment.paymentstatus",$baseurl)
		->get()
		->result();
		 return $query;
	}	

    function listappointment($id){
		return $this->db->select("*")->from("tbl_appointment")
		->where("sid",$id)
		->get()
		->row();
	}

	function listpatient($id){
		return $this->db->select("*")->from("patientmaster")
		->where("schedid",$id)
		->get()
		->row();
	}


	function login($idno,$password){

		$this->db->select("*");
		$this->db->from("tbl_UserAccountOnline");
		$this->db->where(array('idno'=>$idno,'password'=>$password));
		$query = $this->db->get();
		$num = $query->num_rows();
		if ($num > 0) {
				return $query->row();
		}else{
			return false;
		}
	}


	function getallpendingpatient($type){
		$requestlist = $this->patientschedule($type);
		$list = "";
		$count = 1;
		$css = "";
		$status = "";
		$dob = "";
		$file = "";
		$td = "";
		if (count($requestlist) > 0) {
			$today = strtotime(date('Y-m-d',strtotime("-16 hours")));
			$today1 = strtotime(date('Y-m-d',strtotime("+16 hours")));
			foreach ($requestlist as $time) {
				$row = $this->patientinformationrow($time->sid);
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
                	$td = '<td style="width: 2vw !important;" >'.$file.'</td>';
                }else{
                	$td = '';
                }
				if ($row->firstname != "") {
					
						
								$list .='
								<tr class="editpatient '.$css.' context-menu-one " patientsched="'.$row->schedid.'" patientid="'.$row->pid.'">
									<td style="width: 1vw !important;" >'.$count.'</td>
									<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($time->date)).'</td>
									<td style="width: 3vw !important;" >'.$time->time.'</td>
									<td style="width: 3vw !important;" >'.$row->firstname.'</td>
									<td style="width: 3vw !important;" >'.$row->middlename.'</td>
									<td style="width: 3vw !important;" >'.$row->lastname.'</td>
									'.$td.'
									<td style="width: 5vw !important;" >'.$dob.'</td>
									<td style="width: 5vw !important;" >'.$row->pid.'</td>
									<td style="width: 2vw !important;" >'.$row->age.'</td>
									<td style="width: 2vw !important;" >'.$row->gender.'</td>
									
									<td style="width: 5vw !important;" ><div class="">'.$status.'</div></td>
									<td style="width: 12vw !important;" >'.date('F d Y h:i A' ,strtotime($time->date_created)).'</td>
								</tr>
							';
						
						
						
						$count++;
					

					
				}else{
					$list .="";
				}
				
				
			}

		}else{
			$list =  '
			<tr><td colspan="32" >No Patient Found!</td></tr>
			';
		}
		echo $list;
	}

	function getallpatientschedulepaid($type){
		$requestlist = $this->getallpatientschedpaids($type);
		$list = "";
		$count = 1;
		$css = "";
		$status = "";
		$dob = "";
		$file = "";
		$td = "";
		if (count($requestlist) > 0) {
			$today = strtotime(date('Y-m-d',strtotime("-16 hours")));
			$today1 = strtotime(date('Y-m-d',strtotime("+16 hours")));
			foreach ($requestlist as $time) {
				$row = $this->patientinformationrow($time->sid);
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

                if ($row->attachfile != "" ) {
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
						
								$list .='
								<tr class="editpatient '.$css.' context-menu-one " patientsched="'.$row->schedid.'" patientid="'.$row->pid.'">
									<td style="width: 1vw !important;" >'.$count.'</td>
									<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($time->date)).'</td>
									<td style="width: 3vw !important;" >'.$time->time.'</td>
									<td style="width: 3vw !important;" >'.$row->firstname.'</td>
									<td style="width: 3vw !important;" >'.$row->middlename.'</td>
									<td style="width: 3vw !important;" >'.$row->lastname.'</td>
									'.$td.'
									<td style="width: 5vw !important;" >'.$dob.'</td>
									<td style="width: 2vw !important;" >'.$row->age.'</td>
									<td style="width: 2vw !important;" >'.$row->gender.'</td>
									
									<td style="width: 5vw !important;" ><div class="">'.$status.'</div></td>
									<td style="width: 12vw !important;" >'.date('F d Y h:i A' ,strtotime($time->date_created)).'</td>
								</tr>
							';
						
						
						
						$count++;
					

					
				}else{
					$list .="";
				}
				
				
			}

		}else{
			$list =  '
			<tr><td colspan="32" >No Patient Found!</td></tr>
			';
		}
		echo $list;
	}

	function getallpatientpaids($type){
		$td = "";
		$requestlist = $this->getallpatientpaid($type);
		$list = "";
		$count = 1;
		$css = "";
		$status = "";
		$dob = "";
		$file = "";
		if (count($requestlist) > 0) {
			$today = strtotime(date('Y-m-d',strtotime("-16 hours")));
			$today1 = strtotime(date('Y-m-d',strtotime("+16 hours")));
			foreach ($requestlist as $time) {
				$row = $this->patientinformationrow($time->sid);
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
                	$td = '<td style="width: 2vw !important;" >'.$file.'</td>';
                }else{
                	$td = '';
                }
				if ($row->firstname != "") {
					
						
								$list .='
								<tr class="editpatient '.$css.' context-menu-one " patientsched="'.$row->schedid.'" patientid="'.$row->pid.'">
									<td style="width: 1vw !important;" >'.$count.'</td>
									<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($time->date)).'</td>
									<td style="width: 3vw !important;" >'.$time->time.'</td>
									<td style="width: 3vw !important;" >'.$row->firstname.'</td>
									<td style="width: 3vw !important;" >'.$row->middlename.'</td>
									<td style="width: 3vw !important;" >'.$row->lastname.'</td>
									'.$td.'
									<td style="width: 5vw !important;" >'.$dob.'</td>
									<td style="width: 2vw !important;" >'.$row->age.'</td>
									<td style="width: 2vw !important;" >'.$row->gender.'</td>
									
									<td style="width: 5vw !important;" ><div class="">'.$status.'</div></td>
									<td style="width: 12vw !important;" >'.date('F d Y h:i A' ,strtotime($time->date_created)).'</td>
								</tr>
							';
						
						
						
						$count++;
					

					
				}else{
					$list .="";
				}
				
				
			}

		}else{
			$list =  '
			<tr><td colspan="32" >No Patient Found!</td></tr>
			';
		}
		echo $list;
	}


	function getallpatientlist($type){
		
		$requestlist = $this->get_allrequest($type);
		$list = "";
		$count = 1;
		if (count($requestlist) > 0) {
			foreach ($requestlist as $row) {
				
				if ($type == "Pending") {
					$list .='
						<tr class="editpatient context-menu-one" performedBy ="'.$row->performedBy.'" verifiedBy ="'.$row->verifiedBy.'" pathologist ="'.$row->pathologist.'" Interpretation ="'.$row->Interpretation.'" comments ="'.$row->comments.'" testPerform="'.$row->testPerform.'" patientid="'.$row->request_id.'" patientname ="'.$row->lastname.' '.$row->firstname.' '.$row->middlename.'">
							<td style="width: 3vw !important;" >'.$count.'</td>
							<td style="width: 7vw !important;" >'.$row->firstname.'</td>
							<td style="width: 7vw !important;" >'.$row->middlename.'</td>
							<td style="width: 7vw !important;" >'.$row->lastname.'</td>
							<td style="width: 10vw !important;" >'.date('F m Y' ,strtotime($row->dateofAdmission)).'</td>
							<td style="width: 2vw !important;" >'.$row->age.'</td>
							<td style="width: 5vw !important;" >'.$row->gender.'</td>
						</tr>
					';
					$count++;
				}else if($type == "Draft" || $type == "Verified"){
					$list .='
					<tr class="editpatient context-menu-one" performedBy ="'.$row->performedBy.'" verifiedBy ="'.$row->verifiedBy.'" pathologist ="'.$row->pathologist.'" Interpretation ="'.$row->Interpretation.'" comments ="'.$row->comments.'" testPerform="'.$row->testPerform.'" patientid="'.$row->request_id.'" patientname ="'.$row->lastname.' '.$row->firstname.' '.$row->middlename.'">
						<td style="width: 7vw !important;" >'.$row->firstname.'</td>
						<td style="width: 7vw !important;" >'.$row->middlename.'</td>
						<td style="width: 7vw !important;" >'.$row->lastname.'</td>
						<td style="width: 5vw !important;" >'.date('F m Y' ,strtotime($row->dateofAdmission)).'</td>
						<td style="width: 2vw !important;" >'.$row->age.'</td>
						<td style="width: 5vw !important;" >'.$row->gender.'</td>
					</tr>
					';
				}
				
				
			}
		}else{
			$list =  '
			<tr><td colspan="32" >No Patient Found!</td></tr>
			';
		}

		echo $list;
	}

	
	function searchpatientid($data){
		$id = $data['id'];
		if ($data['fieldname'] == "sampleid") {
			return $this->db->select("*")->from("tbl_request")->LIKE("AdmissionNo",$id)->order_by("request_id","DESC")->get()->result();
		}
		else if ($data['fieldname'] == "accessionno"){
			return $this->db->select("*")->from("tbl_request")->LIKE("accessionNo",$id)->order_by("request_id","DESC")->get()->result();
		}else if ($data['fieldname'] == "admissionno"){
			return $this->db->select("*")->from("tbl_request")->LIKE("hospitalNO",$id)->order_by("request_id","DESC")->get()->result();
		}else if ($data['fieldname'] == "lastname" || $data['fieldname'] == "lastname" || $data['fieldname'] == "middlename"){
			return $this->db->select("*")
			->from("tbl_request")
			->LIKE("lastname",$id)
			->OR_LIKE("firstname",$id)
			->OR_LIKE("middlename",$id)
			->order_by("request_id","DESC")
			->get()
			->result();
		}
		
	}






	// newt_bell()
	function getallappointment($type){

		$today = date("Y-m-d");
		$query = $this->db->select("*")->from("tblappointment")->where("paymentstatus",$type)->order_by("date","ASC")->get()->result();
		$count = 1;
		$list  = "";
		if (count($query) > 0) {
			
			foreach ($query as $time) {
				
				if ($time->paymentstatus == 0) {
					$css = 'bg-default';
					$status = "Unpaid";
				}else if ($time->paymentstatus == 1){
					$css = 'btn-default';
					$status = "Paid";
				}
				if($time->dob != ""){
                    $dob = date('F d Y' ,strtotime($time->dob));
                }else{
                    $dob = "";
                }

                if ($time->attachfile != "") {
                	$file = '<center><a href="https://cebudocgroup.com/'.$time->attachfile.'" target="_blank" class="badge badge-primary badge-block text-uppercase" >Check Deposit Slip</a></center>';
                }else{
                	$file = "";
                }
                if ($_SESSION['department'] == "cashier") {
                	$td  = '<td style="width: 2vw !important;" >'.$file.'</td>';
                }else if ($_SESSION['department'] == "laboratory"){
                	
                	$td = '<td style="width: 2vw !important;" ><a href="https://cebudocgroup.com/onlineregistration/Panel/getfile/'.$time->sid.''.$time->firstname.'"  target="_blank" class="badge badge-primary badge-block text-uppercase">PREVIEW CIF</a></td>';
                }else if($_SESSION['department'] == "admin"){
                	$td = '
                	<td style="width: 2vw !important;" >'.$file.'</td>
                	<td style="width: 2vw !important;" ><a href="https://cebudocgroup.com/onlineregistration/Panel/getfile/'.$time->sid.''.$time->firstname.'"  target="_blank" class="badge badge-primary badge-block text-uppercase">PREVIEW CIF</a></td>
                	';
                }
				if ($time->firstname != "") {

						$list .='
							<tr class="editpatient '.$css.' context-menu-one " patientid="'.$time->sid.'">
								<td style="width: 1vw !important;" >'.$count.'</td>
								<td style="width: 5vw !important;" >'.date('F d Y' ,strtotime($time->date)).'</td>
								<td style="width: 3vw !important;" >'.$time->time.'</td>
								<td style="width: 3vw !important;" >'.$time->firstname.'</td>
								<td style="width: 3vw !important;" >'.$time->middlename.'</td>
								<td style="width: 3vw !important;" >'.$time->lastname.'</td>
								'.$td.'
								<td style="width: 5vw !important;" >'.$dob.'</td>
								<td style="width: 2vw !important;" >'.$time->age.'</td>
								<td style="width: 2vw !important;" >'.$time->gender.'</td>
								
								<td style="width: 5vw !important;" ><div class="">'.$status.'</div></td>
								<td style="width: 12vw !important;" >'.$time->date_created.'</td>
							</tr>
						';
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
}
