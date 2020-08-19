<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Registration extends CI_Controller {
		public function __construct(){
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
		public function casess(){

			$data['header'] = "include/header";
			$data['body'] = "laboratory/registration-form";
			$data['footer'] =  "include/footer";			
			$data['script'] =  "laboratory_js/labscript_js";
			$this->load->view("laboratory/template", $data);
		}
		public function covid(){

			$data['header'] = "include/header";
			$data['body'] = "laboratory/caseinvestigation-form";
			$data['footer'] =  "include/footer";			
			$data['script'] =  "laboratory_js/labscript_js";
			$this->load->view("laboratory/template", $data);
		}

		function lib_province(){
			
			$id = $this->input->post('id');
			$result = $this->get->lib_province($id);

			$list = "";
			foreach ($result as $row) {
				$list .='
					<option value="'.$row->PROVINCE.'">'.$row->PROV_NAME.'</option>
				';
			}
			echo $list;
	
		}
		
		function lib_municipality(){
			$data = $this->input->post();

			$result = $this->get->lib_municipality($data);
			$list = "";
			foreach ($result as $row) {
				$list .='
					<option value="'.$row->PROVINCE.'">'.$row->MUN_NAME.'</option>
				';
			}
			echo $list;
		}

		function index(){
			$this->checksession();
			$this->online_form();
		}
		public function submit_column(){
			$data = $this->input->post();
			$this->create->column_table($data);
			redirect("Main/column");
		}

		public function Submit_Request(){
			$data = $this->input->post();
			return $this->create->save_request($data);
			redirect("lab");

		}

		public function saveresult(){
			$data = $this->input->post();
			return $this->create->save_request($data);
		}

	}

?>