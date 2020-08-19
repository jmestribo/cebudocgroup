<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct(){
    parent::__construct();
     $this->load->model("Savelaboratory","create");
  }

	function index(){
		$this->Appointment();
	}

  function Appointment(){
      $data['header'] = 'settings/header';
      $data['description'] = 'PCR TESTING APPOINTMENT';
      $data['keywords'] = '';
      $data['title'] = 'PCR TESTING APPOINTMENT';
      $data['main'] = 'pages/services';
      $data['footer'] = 'settings/footer';
      $data['script'] = 'settings/script_js';
      $this->load->view('settings/servicestemplate', $data);
  }
  function selectappointmentdate(){
      $date = $this->input->post('date');

      $list = "";
      $btn1  = "";
      $btn2  = "";
      $btn3  = "";
      $btn4  = "";
      $btn5  = "";
      $btn6  = "";
      $btn7  = "";
      $btn8  = "";
      $btn9  = "";
      $btn10  = "";
      $btn11  = "";
      $btn12  = "";
      $btn13  = "";
      $btn14  = "";
      $btn15  = "";
      $btn16  = "";
      $btn17  = "";
     
       $class1 = "";
       $class2 = "";
       $class3 = "";
       $class4 = "";
       $class5 = "";
       $class6 = "";
       $class7 = "";
       $class8 = "";
       $class9 = "";
       $class10 = "";
       $class11 = "";
       $class12 = "";
       $class13 = "";
       $class14 = "";
       $class15= "";
       $class16= "";
       $class17= "";


          $time1 = $this->create->getschedule1($date,"8:30 AM");

          if ($time1 > 2) {

            $btn1 = "disabled";
            $class1 = "primarydisable";

          }else{

            $btn1 = "";
            $class1 = "primarybutton";

          }


          $time2 = $this->create->getschedule1($date,"9:00 AM");

          if ($time2 > 2) {

            $btn2 = "disabled";
            $class2 = "primarydisable";

          }else{

            $btn2 = "";

            $class2 = "primarybutton";

          }

          $time3 = $this->create->getschedule1($date,"9:30 AM");

          if ($time3 > 2) {

            $btn3 = "disabled";
            $class3 = "primarydisable";

          }else{

            $btn3 = "";
            $class3 = "primarybutton";

          }

          $time4 = $this->create->getschedule1($date,"10:00 AM");
          if ($time4 > 2) {
            $btn4 = "disabled";
            $class4 = "primarydisable";
          }else{
            $btn4 = "";
            $class4 = "primarybutton";
          }

          $time5 = $this->create->getschedule1($date,"10:30 AM");
          if ($time5 > 2) {
            $btn5 = "disabled";
            $class5 = "primarydisable";
          }else{
            $btn5 = "";
            $class5 = "primarybutton";
          }
          $time6 = $this->create->getschedule1($date,"11:00 AM");
          if ($time6 > 2) {
            $btn6 = "disabled";
            $class6 = "primarydisable";
          }else{
            $btn6 = "";
            $class6 = "primarybutton";
          }
          $time7 = $this->create->getschedule1($date, "11:30 AM");
          if ($time7 > 2) {
            $btn7 = "disabled";
            $class7 = "primarydisable";
          }else{
            $btn7 = "";
            $class7 = "primarybutton";
          }
          $time8 = $this->create->getschedule1($date,"12:00 AM");
          if ($time8 > 2) {
            $btn8 = "disabled";
            $class8 = "primarydisable";
          }else{
            $btn8 = "";
            $class8 = "primarybutton";
          }
          $time9 = $this->create->getschedule1($date,"12:30 PM");
          if ($time9 > 2) {
            $btn9 = "disabled";
            $class9 = "primarydisable";
          }else{
            $btn9 = "";
            $class9 = "primarybutton";
          }
          $time10 = $this->create->getschedule1($date,"1:00 PM");
          if ($time10 > 2) {
            $btn10 = "disabled";
            $class10 = "primarydisable";
          }else{
            $btn10 = "";
            $class10 = "primarybutton";
          }
          $time11 = $this->create->getschedule1($date,"1:30 PM");
          if ($time11 > 2) {
            $btn11 = "disabled";
            $class11 = "primarydisable";
          }else{
            $btn11 = "";
            $class11 = "primarybutton";
          }
          $time12 = $this->create->getschedule1($date,"2:00 PM");
          if ($time12 > 2) {
            $btn12 = "disabled";
            $class12 = "primarydisable";
          }else{
            $btn12 = "";
            $class12 = "primarybutton";
          }
          $time13 = $this->create->getschedule1($date,"2:30 PM");
          if ($time13 > 2) {
            $btn13 = "disabled";
            $class13 = "primarydisable";
          }else{
            $btn13 = "";
            $class13 = "primarybutton";
          }
          $time14 = $this->create->getschedule1($date,"3:00 PM");
          if ($time14 > 2) {
            $btn14 = "disabled";
            $class14 = "primarydisable";
          }else{
            $btn14 = "";
            $class14 = "primarybutton";
          }

          $time15 = $this->create->getschedule1($date,"3:30 PM");
          if ($time15 > 2) {
            $btn15 = "disabled";
            $class15 = "primarydisable";
          }else{
            $btn16 = "";
            $class15 = "primarybutton";
          }

          $time16 = $this->create->getschedule1($date,"4:00 PM");
          if ($time16 > 2) {
            $btn16 = "disabled";
            $class16 = "primarydisable";
          }else{
            $btn16 = "";
            $class16 = "primarybutton";
          }

          $time17 = $this->create->getschedule1($date,"4:30 PM");
          if ($time17 > 2) {
            $btn17 = "disabled";
            $class17 = "primarydisable";
          }else{
            $btn17 = "";
            $class17 = "primarybutton";
          }
    $list ='
        <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
          <div  class="col-lg-12 pt-1 pb-1"> Available Appointments on 
          <strong><span id="">'.date("F d Y",strtotime($date)).'</span></strong></div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>8:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class1.' appointmentbtn2 btn-block " '.$btn1.' attrtime="8:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>9:00 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class2.' appointmentbtn2 btn-block" '.$btn2.' attrtime="9:00 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>9:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class3.' appointmentbtn2 btn-block" '.$btn3.' attrtime="9:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>10:00 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class4.' appointmentbtn2 btn-block" '.$btn4.' attrtime="10:00 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>10:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class5.' appointmentbtn2 btn-block" '.$btn5.' attrtime="10:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>11:00 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class6.' appointmentbtn2 btn-block" '.$btn6.' attrtime="11:00 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>11:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class7.' appointmentbtn2 btn-block" '.$btn7.' attrtime="11:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>12:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class8.' appointmentbtn2 btn-block" '.$btn8.' attrtime="12:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>12:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class9.' appointmentbtn2 btn-block" '.$btn9.' attrtime="12:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>1:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class10.' appointmentbtn2 btn-block" '.$btn10.' attrtime="1:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>1:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class11.' appointmentbtn2 btn-block" '.$btn11.' attrtime="1:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>2:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class12.' appointmentbtn2 btn-block" '.$btn12.' attrtime="2:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>2:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class13.' appointmentbtn2 btn-block" '.$btn13.' attrtime="2:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>3:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class14.' appointmentbtn2 btn-block" '.$btn14.' attrtime="3:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>3:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class15.' appointmentbtn2 btn-block" '.$btn15.' attrtime="3:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>3:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class16.' appointmentbtn2 btn-block" '.$btn16.' attrtime="4:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>4:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6 col-md-6">
                    <button class="'.$class17.' appointmentbtn2 btn-block" '.$btn17.' attrtime="4:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
       '; 
      echo json_encode($list);
  }


  


  function saveappointment(){
    $data = $this->input->post();
    $newcode = date('Ymdhis',strtotime("+16 hours"));
    $filename = $newcode.'.jpg';
   
    // $uploadfile = "./upload/attachment/".$filename;
    $data['filename'] = $filename;
    $data['attachfile'] = $filename;


    // if (move_uploaded_file($_FILES['attachfiles']['tmp_name'], $uploadfile)) {
       
       $id = $this->create->appointment($data);
       $result = $this->create->getpatientinfo($id);


        $name = 'Jucel';
       
        $email = $data['pemail'];
        $subject = 'asd';
        $message = 'asd';

        $config = array(
                        'protocol'  =>  'smtp',
                        'smtp_host' =>  'ssl://smtp.gmail.com',
                        'smtp_user' =>  'pcrtest2.cdg@gmail.com',
                        'smtp_pass' =>  'pcrtest2@123',
                        'smtp_port' =>  '465, 25, 578',
                        'charset'   => 'iso-8859-1'
                    );
                            
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
                
        $this->email->from($email, $name);
        $this->email->to($data['pemail']);
        $this->email->subject($subject);

        $this->email->message($message);
        $this->email->set_mailtype("html");
        
        if($this->email->send()){
            $this->session->set_flashdata('success_msg', 'Your Email has been sent!');
            // redirect(base_url('contact'));
            echo "sed";
        }
        else{
            show_error($this->email->print_debugger());
            $this->session->set_flashdata('error_msg', 'Email not sent');
            // redirect(base_url('contact'));
        }


       // if ($result) {

       //    $patientid = $id;
         

       //    $nameinvestigator =  $resultivn->investigator;
       //    $dateinvestigate = "";
       //    $firstname = $result->firstname;
       //    $middlename = $result->middlename;
       //    $lastname = $result->lastname;
       //    $dateofBirth = date("m/d/Y",strtotime($result->dob));
       //    $Street = $result->pstreet;
       //    $municipality = $result->pmunicipality;
       //    $province = $result->pprovince;
       //    $region = $result->pregion;
       //    $sex = $result->gender;
       //    $age = $result->age;
       //    $pid = $result->pid;
       //    $nationality = $result->nationality;
       //    $civilstatus = $result->civilstatus;
       //    $occupation = $result->occupation;
       //    $passportno = $result->passportno;
       //    $phouseno = $result->phouseno;
       //    $pstreet = $result->pstreet;
       //    $pmunicipality = $result->pmunicipality;
       //    $pprovince = $result->pprovince;
       //    $pregion = $result->pregion;
       //    $pphone = $result->pphone;
       //    $pcellphone = $result->pcellphone;
       //    $pemail = $result->pemail;
       //    $chouseno = $result->chouseno;
       //    $cstreet = $result->cstreet;
       //    $cmunicipality = $result->cmunicipality;
       //    $cprovince = $result->cprovince;
       //    $cregion = $result->cregion;
       //    $cphone = $result->cphone;
       //    $ccellphone = $result->ccellphone;
       //    $cemail = $result->cemail;
       //    $ofwemployeername = $result->ofwemployeername;
       //    $ofwoccupation = $result->ofwoccupation;
       //    $ofwplaceofwork = $result->ofwplaceofwork;
       //    $ofwhouse = $result->ofwhouse;
       //    $ofwstreet = $result->ofwstreet;
       //    $ofwcity = $result->ofwcity;
       //    $ofwprovince = $result->ofwprovince;
       //    $ofwcountry = $result->ofwcountry;
       //    $ofwofficephoneno = $result->ofwofficephoneno;
       //    $ofwcellphoneno = $result->ofwcellphoneno;


       //    $travelOtherCountry = $result->travelOtherCountry;
       //    $portofexit = $result->portofexit;
       //    $vessel = $result->vessel;
       //    $vesselno = $result->vesselno;
         

       //   $departuredate1 = $result->departuredate;
       //   $arrivaldate1 = $result->arrivaldate;

       //  if ($departuredate1 != "") {

       //     $departuredate = date("m/d/Y",strtotime($result->departuredate));

       //  }else{

       //    $departuredate = "";
       //  }
       //  if ($arrivaldate1 != "") {

       //     $arrivaldate = date("m/d/Y",strtotime($result->arrivaldate));

       //  }else{

       //    $arrivaldate =  "";

       //  }



       //  $exposebefore14 = $result->exposebefore14;
       //  $dateofcontact = $result->dateofcontact;
       //  $placebefore14 = $result->placebefore14;
       //  $ifyes = $result->ifyes;
       //  $ifyesdate = $result->ifyesdate;
       //  $ifyesname1 = $result->ifyesname1;
       //  $ifyesname2 = $result->ifyesname2;
       //  $ifyescontactno2 = $result->ifyescontactno2;
       //  $ifyesname3 = $result->ifyesname3;
       //  $ifyescontactno3 = $result->ifyescontactno3;
       //  $ifyesname4 = $result->ifyesname4;
       //  $ifyesontactno4 = $result->ifyesontactno4;



  
      // $this->load->library('phpmailer_lib');

      //   $mail = $this->phpmailer_lib->load(); 
      //   $name = 'Jucel Estribo';
      //   $mail->isSMTP();
      //   $mail->Host     = 'smtp.gmail.com';
      //   $mail->SMTPAuth = true;
      //   $mail->Username = 'pcrtest2.cdg@gmail.com';
      //   $mail->Password = 'pcrtest2@123';
      //   $mail->CharSet = 'utf-8';
      //   $mail->SMTPSecure = 'ssl';
      //   $mail->Port     = 465;

      //   $mail->setFrom($data['pemail'], $name);

      //   // $mail->SMTPKeepAlive = true;
      //   $mail->Subject = $data['lastname'];
      //   $mail->isHTML(true);
      //   $mail->AddAddress($data['pemail']);

      //   $content =' <p>
      //          <p> 
      //          Waiting for Confirmation!</p>
      //           Hi '.$name.', thank you for completing the payment process. Your proof of payment will now be validated within 24 hours. Please regularly check your email because once payment is successfully verified, you will receive a confirmatory message of your testing schedule and pre-testing reminders.

      //           Should you have other questions and concerns, please reach us at 253-7512 local 124
      //       </p>';
      //   $mail->Body = $content;
      //   $mail->Send();
        
      // }

    // }


  }
  function _remap($method){
        $param_offset = 3;
        // Default to index
        if ( ! method_exists($this, $method)){
          // We need one more param
          $param_offset = 1;
          $method = 'index';
        }

        // Since all we get is $method, load up everything else in the URI
        $params = array_slice($this->uri->rsegment_array(), $param_offset);

        // Call the determined method with all params
        call_user_func_array(array($this, $method), $params);
    }  
}
