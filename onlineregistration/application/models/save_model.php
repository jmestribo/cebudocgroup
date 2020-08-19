<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class save_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->model('get_model',"get");
	}
	function createuser($data){

		$datalist['name'] = $data['firstname'].' '.$data['middlename'].' '.$data['lastname']; 
		$datalist['firstname'] = $data['firstname']; 
		$datalist['lastname'] = $data['lastname']; 
		$datalist['middlename'] = $data['middlename']; 
		$datalist['ipaddress'] = $data['ipaddress']; 
		$datalist['department'] = "EDP"; 
		$datalist['local'] = $data['local']; 
		$datalist['site_code'] = $data['site_code']; 
		$datalist['email'] = $data['email']; 
		$datalist['role_id'] = $data['role_id']; 
		$datalist['password'] = password_hash($data['password_text'], PASSWORD_DEFAULT);
		$datalist['password_text'] = $data['password_text'];
		$date = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
		
		
		$datalist['group_id'] = $data['group_id'];
		
		if ($data['formtype'] == "create") {
			$datalist['user_type'] = $data['user_type']; 
			$datalist['datecreated'] = date('Y-m-d h:i:s a',strtotime("+16 Hours"));  
			$datalist['user_code'] = date('Ymdhis',strtotime("+16 Hours")); 
			$datalist['status'] = "Active"; 
			return $result = $this->db->insert('tbl_users', $datalist);

		}else if ($data['formtype'] == "update") {

			
			$date = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
			$id = $data['userid'];
			
			if ($data['status'] == "") {
				$datalist['user_type'] = "User"; 
				$datalist['status'] = "Active"; 
			}else{
				$datalist['user_type'] = $data['user_type']; 
				$datalist['status'] = $data['status']; 
			}

			return $query = $this->db->select('*')
				->where("userid",$id)
				->update('tbl_users',$datalist);
		}
	}

	function createworkdescription($data){
		$field['ticket_id'] = $data['ticket_id'];
		$field['date_send'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
		$field['text'] = $data['data'];
		$field['status'] = "1";
		$field['user_code'] = $_SESSION['user_code'];
		return $this->db->insert("tbl_workdescription",$field);
	}

	function create_site($data){
		$field['site_name'] = $data['site_name'];
		$field['site_key'] = $data['site_key'];
		$field['acess'] = $data['access'];
		$field['user_lead'] = $data['user_lead'];
		$field['date_created'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
		if ($data['formtype'] == 'create') {
			$field['site_code'] = date('Ymdhis',strtotime("+16 Hours"));
			$field['status'] = "Active";

			return $this->db->insert("tbl_sites", $field);
		}else if ($data['formtype'] == 'update') {
			$id = $data['project_id'];
			return $query = $this->db->select('*')
				->where("siteid",$id)
				->update('tbl_sites',$field);
		}
		
	}
	function create_task($data){

		$field['name'] = $data['name'];
		$field['publisher'] = "System";
		$field['type'] = $data['type'];
		$field['date_created'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
		$field['taskdescription'] = $data['description'];
		$field['selecteddate'] = $data['array'];

		if ($data['formtype'] == 'create') {
			$field['taskcode'] = date('Ymdhis',strtotime("+16 Hours"));
			return $this->db->insert("tbl_taskmanager", $field);

		}else if ($data['formtype'] == 'update') {

			$taskcode = $data['taskcode'];
			$field1['summary'] = $data['name'];
			$field1['description'] = $data['description'];
			
			$id = $data['taskid'];
			$this->db->select("*")->where("ticket_code",$taskcode)->update("tbl_ticket",$field1);
			return $query = $this->db->select('*')
				->where("id",$id)
				->update('tbl_taskmanager',$field);

		}
	}

	function create_ticket($data){

		if ($data['formtype'] == "create") {

			$field['ticket_code'] =  $data['newcode'];
			$field['site_code'] =  $data['site'];
			$field['ticket_type'] = $data['tickettype'];
			$field['summary'] = $data['summary'];	
			$field['description'] = $data['description'];
			$field['escalate_id'] ="";
			$field['assign_by'] = $data['assignee'];
			$field['report_by'] = $_SESSION['user_code'];
			$field['priority'] = $data['priority'];
			$field['ticket_status'] = 1;
			$field['state'] = 1;
			$field['estimated_time'] = "";
			$field['time_spent'] = "";
			$field['time_description'] = "";
			$field['workdate'] = date('Y-m-d',strtotime("+16 Hours"));
			$field['subtasks'] = "2";
			$field['ticket_subtype'] ="Main";
			$field['date_created'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 

			return  $this->db->insert("tbl_ticket",$field);

		}else if ($data['formtype'] == "update") {

			$field['summary'] = $data['summary'];
			$field['date_created'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
			$field['description'] = $data['description'];
			$field['report_by'] = $data['report_by'];
			$field['priority'] = $data['priority'];
			$field['estimated_time'] = $data['estimated_time'];
			$field['time_spent'] = $data['time_spent'];
			$field['workdate'] = date('Y-m-d',strtotime("+16 Hours"));
			$field['time_description'] = $data['time_description1'];
			$field['subtasks'] = $data['subtasks'];
			$id = $data['ticketid'];
			$ticket_codes = $data['ticket_code'];
			
			$updateallsubtast = $this->get->subtasklistdone($id);
			if ($data['escalate_id1'] !="") {

				$field['escalate_id'] = $data['escalate_id1'];;
				$field['ticket_status'] = $data['ticket_status'];
				$field['assign_by'] = $data['escalatecode'];
				
				$fieldesc['esc_ticketid'] = $id;
				$fieldesc['esc_usercode'] = $data['assign_by'];
				$fieldesc['reason'] = $data['reason'];
				
				$this->db->insert("tbl_escalate",$fieldesc);

				$action = $data['ticket_status'];

				$this->get->save_logs($id,$action);

				return $query = $this->db->select('*')
					->where("ticketid",$id)
					->update('tbl_ticket', $field);

			}else{

				$field['escalate_id'] = $data['escalate_id1'];
				$field['assign_by'] = $data['assign_by'];

				if ($data['ticket_status'] == "3") {
					
					foreach($updateallsubtast as $row){
						$ticketcode = $row->sub_ticket_code;
						$sub['ticket_status'] = '3';
						$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $sub);
					}
					$action = $data['ticket_status'];
					$this->get->save_logs($id,$action);

					if ($data['ticket_status'] == "3") {
						$field['ticket_status'] = $data['ticket_status'];
						$field['subtasks'] = 1;
					}else{

						$field['ticket_status'] = $data['ticket_status'];
						$field['subtasks'] = $data['subtasks'];
					}
					return $query = $this->db->select('*')
						->where("ticketid",$id)
						->update('tbl_ticket', $field);
				}
				else if ($data['ticket_status'] == "5") {

					$field5['ticket_status'] = '1';
					$field5['assign_by'] = '0';
					$field5['subtasks'] = '2';

					foreach($updateallsubtast as $row){
						$ticketcode = $row->sub_ticket_code;
						$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $field5);
						$this->db->select('*')->where("ticketid", $id)->update('tbl_ticket', $field5);
					}
					$action = $data['ticket_status'];
					$this->get->save_logs($id,$action);

					$field3['sub_status'] = 2;

					$query = $this->db->select('*')
					->where("sub_ticket_id",$id)
					->update('tbl_ticket_subtask', $field3);


					$query = $this->db->select('*')
					->where("ticketid",$id)
					->update('tbl_ticket', $field5);

					
					$reopenfield['ticket_id'] = $id;
					$reopenfield['ticket_stat'] = 1;
					$reopenfield['user_code'] = $_SESSION['user_code'];
					$reopenfield['date_reopen'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
					return  $this->db->insert("tbl_reopen_ticket", $reopenfield);
				}
				else{


					$checkticket = $this->get->checkticketidifdone($id);
					$updateallsubtastdone = $this->get->subtasklistcountdone($id);
					$subtasklistcount = $this->get->subtasklistcount($id);
					$field1['subtask'] = $data['summary'];
					$field1['sub_status'] = $data['subtasks'];
					$ticketcode = $data['ticket_code'];
					
					
					if ($data['countmaintask'] == "0" && $data['countpendingstatus'] == "0") {
						

						if (count($updateallsubtastdone) > 0) {
						
							$fieldq['subtasks'] = $data['subtasks'];
							if ($data['subtasks'] == "1") {
									$fieldq['ticket_status'] = 3;

							}else{
								$fieldq['ticket_status'] = $data['ticket_status'];

							}
							foreach($updateallsubtast as $row){
								if ($row->sub_status == 1) {
									$ticketcode = $row->sub_ticket_code;
									
									if ($data['subtasks'] == '1') {
										$sub['ticket_status'] = '3';
										$sub['subtasks'] = $data['subtasks'];
									}else{
										$sub['ticket_status'] = $data['ticket_status'];
										$sub['subtasks'] = '1';
									}
									
									$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $sub);
									$this->db->select('*')->where("ticketid", $row->sub_ticket_id)->update('tbl_ticket', $sub);
								}
							}

							$query = $this->db->select('*')
							->where("ticketid",$id)
							->update('tbl_ticket', $fieldq);
							echo date('Y-m-d',strtotime("+16 Hours"));;
						}else{

							if ($data['ticket_status'] == "3") {
								$field['ticket_status'] = $data['ticket_status'];
								$field['subtasks'] = 1;
							}else{

								$field['ticket_status'] = $data['ticket_status'];
								$field['subtasks'] = $data['subtasks'];
							}
						
							$query = $this->db->select('*')
							->where("ticketid",$id)
							->update('tbl_ticket', $field);
						}


					}
					else if($data['countmaintask'] == "1" && $data['countpendingstatus'] == "1"){
						
					
						if ($data['attrsubtype'] == "Main") {
							// $all = $this->get->subtasklistticketcode($ticket_codes);
							$checkticketid = $this->get->checkticketid($id);
							
							if (count($updateallsubtastdone) > 0) {
								
								foreach($updateallsubtast as $row){
									
									if ($checkticketid->subtasks == "1" && $row->sub_ticket_code == $ticket_codes) {
										$ticketcode = $row->sub_ticket_code;
										$sub['ticket_status'] = '3';
										$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $sub);
									}else{
										$ticketcode = $row->sub_ticket_code;
										if ($ticketcode != $checkticketid->ticket_code && $checkticketid->ticket_subtype == "Sub") {
											$sub['ticket_status'] = '1';
										}
										else{
											$sub['ticket_status'] = $data['ticket_status'];
										}
										$this->db->select('*')->where("ticket_code", $checkticketid->ticket_code)->update('tbl_ticket', $sub);
											
									}

								}
							
							}
							// if (count($subtasklistcount) > 0 && $checkticketid->subtasks == "1") {

							// 	$field['ticket_status'] = $data['ticket_status'];
							// 	$field['subtasks'] = $data['subtasks'];
							// 	$field1['sub_status'] =  $data['subtasks'];
							// 	echo "as";
							// }else{
							// 	$field['ticket_status'] =  3;
							// 	$field['subtasks'] =  $data['subtasks'];
							// 	$field1['sub_status'] =  $data['subtasks'];

							// 	echo "123";
							// }


						}
						else if ($data['attrsubtype'] == "Sub") {

							$all = $this->get->subtasklistticketcode($ticket_codes);

							$allticketid = $this->get->subtasklistdone($all->sub_ticket_id);
							$countallticketdone = $this->get->countallticketdone($all->sub_ticket_id);
							$checkticket1 = $this->get->checkticketidifdone($ticket_codes);


							$countpendingstatus = $this->get->subtasklistcount($all->sub_ticket_id);
							$checkticketid = $this->get->checkticketid($all->sub_ticket_id);
							foreach($allticketid as $row){
								
								$ticketcode = $row->sub_ticket_code;

								if ($countpendingstatus == 0) {
									
								
									// if ($checkticket1->subtasks == "2") {

										// $subfield['subtasks'] = '1';
										// $subfield['ticket_status'] = '3';
										
										if ($checkticket1->subtasks == "2") {
											$subfield1['ticket_status'] = '3';
											$subfield['ticket_status'] = '3';
											$subfield1['subtasks'] = $data['subtasks'];
											$subfield['subtasks'] =  $data['subtasks'];
												echo "aaaaaa1";
											$this->db->select('*')->where("ticketid", $row->sub_ticket_id)->update('tbl_ticket', $subfield1);
											$this->db->select('*')->where(array("ticket_code"=>$row->sub_ticket_code))->update('tbl_ticket', $subfield);
										}else if ($checkticket1->subtasks == "1") {
											$subfield['ticket_status'] = $data['ticket_status'];
											$subfield1['subtasks'] =  $data['subtasks'];
												echo "aaaaaa2";
											$this->db->select('*')->where("ticketid", $row->sub_ticket_id)->update('tbl_ticket', $subfield);
											$this->db->select('*')->where(array("ticket_code"=>$row->sub_ticket_code))->update('tbl_ticket', $subfield1);

										}
										

									// }else{

									// 	if ($checkticket1->subtasks == "2" && $countallticketdone == 1) {
									// 		$subfield1['ticket_status'] = '2';
									// 		$subfield1['subtasks'] =  "2";
									// 		$subfield['subtasks'] =  $data['subtasks'];
									// 		$this->db->select('*')->where("ticketid", $all->sub_ticket_id)->update('tbl_ticket', $subfield1);
									// 		echo "44444444";
									// 	}else if ($checkticket1->subtasks == "2" && $countallticketdone == 0){
									// 		$subfield['ticket_status'] = '3';
									// 		$subfield['subtasks'] =  $data['subtasks'];
									// 		$this->db->select('*')->where("ticketid", $row->sub_ticket_id)->update('tbl_ticket', $subfield);
									// 		echo "66666";
									// 	}
									// 	$this->db->select('*')->where(array("ticket_code"=>$row->sub_ticket_code,"subtasks "=>"1"))->update('tbl_ticket', $subfield);
									// 	echo "3";
									// }

								}else{

									if ($countpendingstatus == 0 && $checkticketid->subtasks == "1") {
										foreach($updateallsubtast as $row){
											$ticketcode = $row->sub_ticket_code;
											$sub['ticket_status'] = '3';
											$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $sub);
										}

									}else{

										if ($countpendingstatus == 1) {

											foreach($updateallsubtast as $row){

												if ($checkticketid->subtasks == "1" && $checkticketid->ticket_code == $row->sub_ticket_code) {

													$ticketcode = $row->sub_ticket_code;
													$sub['ticket_status'] = '3';
													$this->db->select('*')->where("ticket_code", $row->sub_ticket_code)->update('tbl_ticket', $sub);
												}else{

													$ticketcode = $row->sub_ticket_code;
													$sub['ticket_status'] = '3';
													$this->db->select('*')->where("ticket_code", $row->sub_ticket_code)->update('tbl_ticket', $sub);
												}
													
											}

											if ($checkticketid->subtasks == "1") {
												$ticketcode = $row->sub_ticket_code;
												$sub['ticket_status'] = '3';
												$sub['subtasks'] = $data['subtasks'];
												$this->db->select('*')->where("ticket_code", $row->sub_ticket_code)->update('tbl_ticket', $sub);
												$this->db->select('*')->where("ticketid", $row->sub_ticket_id)->update('tbl_ticket', $sub);
											}else{
												$ticketcode = $row->sub_ticket_code;
												$sub['ticket_status'] = '2';
												$sub['subtasks'] = $data['subtasks'];
												$this->db->select('*')->where("ticket_code", $row->sub_ticket_code)->update('tbl_ticket', $sub);
											}
											
											
										}else{
											foreach($updateallsubtast as $row){
												$ticketcode = $row->sub_ticket_code;
												$sub['ticket_status'] = '3';
												$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $sub);
											}
										}
										
									
									}
									
								}
								
							}

							echo "a";

						}
					}

					$subfields['sub_status'] = $data['subtasks'];
					$query = $this->db->select('*')
						->where("sub_ticket_code", $ticket_codes)
						->update('tbl_ticket_subtask', $subfields);


					$query = $this->db->select('*')
						->where("ticketid",$id)
						->update('tbl_ticket', $field);

					$action = $data['ticket_status'];
					return  $this->get->save_logs($id,$action);	

				}
			}
		}
	}

	function create_subtask($data){

		$field['ticket_code'] =  $data['newcode'];
		$field['site_code'] =  $data['site_code'];
		$field['summary'] = $data['sub_task'];
		$field['report_by'] = $_SESSION['user_code'];
		$field['date_created'] = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
		$field['ticket_type'] = 1;
		$field['ticket_status'] = 1;
		$field['state'] = 1;
		$field['priority'] = $data['priority'];
		$field['subtasks'] = "2";
		$field['assign_by'] = 0;
		$field['ticket_subtype'] ="Sub";

		$field1['sub_ticket_id'] = $data['ticketid'];
		$field1['sub_ticket_code'] = $data['newcode'];
		$field1['subtask'] = $data['sub_task'];
		$field1['sub_status'] = 2;
		$field1['user_code'] = $_SESSION['user_code'];

		$id = $data['ticketid'];
		$action = 1;
		$this->get->save_logs($id,$action);	

		$this->db->insert("tbl_ticket_subtask",$field1);
		return  $this->db->insert("tbl_ticket",$field);
	}

	function updatekanban($data){
		$id = $data['id'];	
		$date = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 

		if ($data['status'] == 3) {

			$updateallsubtast = $this->get->subtasklistdone($id);
			$field['ticket_status'] = '3';
			$field['subtasks'] = '1';

			foreach($updateallsubtast as $row){
				$ticketcode = $row->sub_ticket_code;

				$this->db->select('*')->where("ticket_code", $ticketcode)->update('tbl_ticket', $field);
			}

			$field3['sub_status'] = 1;
			$query = $this->db->select('*')
			->where("sub_ticket_id",$id)
			->update('tbl_ticket_subtask', $field3);

			return $query = $this->db->select('*')
			->where("ticketid",$id)
			->update('tbl_ticket', $field);
							
		}else{
			if ( $data['status'] == "1") {
				$user = 0;
			}else{
				$user = $_SESSION['user_code'];
			}
			$status['ticket_status'] = $data['status'];
			$status['subtasks'] = 2;
			$status['assign_by'] = $user;
			$status['date_created'] = $date;
 			$this->db->where("ticketid",$id);		
			return $this->db->update("tbl_ticket",$status);
		}
	}


	function save_attachment($data){
		$date = date('Y-m-d h:i:s a',strtotime("+16 Hours")); 
		$field['attach_ticket_id'] = $data['attach_ticket_id'];
		$field['file_name'] = $data['file_name'];
		$field['file_path'] = $data['file_path'];
		$field['file_origname'] = $data['file_origname'];
		$field['user_code'] = $_SESSION['user_code'];
		return $result = $this->db->insert("tbl_attachment",$field);
	}


	

	function createrole($data){

		$datalist['role'] = $data['role'];
		$datalist['level'] = $data['level'];
		if ($data['formtype'] == "create") {
			return $result = $this->db->insert('tbl_role', $datalist);

		}else if ($data['formtype'] == "update") {
			$id = $data['roleid'];
			return $query = $this->db->select('*')
				->where("id",$id)
				->update('tbl_role',$datalist);
		}
	}
	function creategroup($data){

		$datalist['group'] = $data['group'];
		if ($data['formtype'] == "create") {
			return $result = $this->db->insert('tbl_group', $datalist);

		}else if ($data['formtype'] == "update") {
			$id = $data['groupid'];
			return $query = $this->db->select('*')
				->where("id",$id)
				->update('tbl_group',$datalist);
		}
	}
	function createtype($data){

		$datalist['ticket_type'] = $data['type'];
		if ($data['formtype'] == "create") {
			return $result = $this->db->insert('tbl_tickettype', $datalist);

		}else if ($data['formtype'] == "update") {
			$id = $data['typeid'];
			return $query = $this->db->select('*')
				->where("type_id",$id)
				->update('tbl_tickettype',$datalist);
		}
	}

	function delete($data){
		$id = $data['id'];
		$tblname =  $data['table'];
		$column = $data['column'];
		return $this->db->delete($tblname, array($column=>$id));
	}
}
