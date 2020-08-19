<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_feedback extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->settings();
	}

	function settings(){
		$data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
        $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
		$data['header'] = 'settings/header';
		$data['title'] = 'Patients Feedback';
		$data['main'] = 'pages/patientsfeedback';
		$data['footer'] = 'settings/footer';
		$this->load->view('settings/template', $data);
	}

function sendMail(){
  $name = ucwords($this->input->post('name'));
  $phone = $this->input->post('phone');
  $email = $this->input->post('email');
  $subject = $this->input->post('subject');
  $message = nl2br($this->input->post('message'));

  $config = array(
                  'protocol'  =>  'smtp',
                  'smtp_host' =>  'ssl://smtp.gmail.com',
                  'smtp_user' =>  'ngh4email@gmail.com',
                  'smtp_pass' =>  'ngh4email0503',
                  'smtp_port' =>  '465, 25, 578',
                  'charset'   => 'iso-8859-1'
              );
                      
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                        
                $this->email->from($email, $name);
                $this->email->to('info@cebudocgroup.com');
                $this->email->subject($subject);
    
                $this->email->message($message);
                $this->email->set_mailtype("html");
                
                if($this->email->send()){
                    $this->session->set_flashdata('success_msg', 'Your Email has been sent!');
                    redirect(base_url('patients_feedback'));
                }
                else{
                    //show_error($this->email->print_debugger());
                    $this->session->set_flashdata('error_msg', 'Email not sent');
                    redirect(base_url('patients_feedback'));
                }
}






































}
