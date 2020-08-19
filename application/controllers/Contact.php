<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

  public function __construct(){
    parent::__construct();
     $this->load->model("Savelaboratory","create");

  }

  function index(){
    $this->contactus();
    $_SESSION['read'] = "";
  }

  function contact_us(){
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['header'] = 'settings/header';
    $data['title'] = 'Contact Us | CebuDoc Group';
    $data['main'] = 'pages/contact';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
  }

  function contactus(){
      $data['header'] = 'settings/header';
      $data['description'] = 'Contact Us';
      $data['keywords'] = '';
      $data['title'] = 'Contact Us';
      $data['main'] = 'sitemap/contactus';
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
        redirect(base_url('contact'));
    }
    else{
        //show_error($this->email->print_debugger());
        $this->session->set_flashdata('error_msg', 'Email not sent');
        redirect(base_url('contact'));
    }
  }

  // function send_appointmentmail(){
    
  //   $lname = $this->input->post('lname');
  //   $fname = $this->input->post('fname');
  //   $mname = $this->input->post('mname');
  //   $provider = $this->input->post('provider');
  //   $datebirth1 = $this->input->post('datebirth');
  //   $datebirth = date("F-d-Y",strtotime($datebirth1));
  //   $email = $this->input->post('email');
  //   $contact = $this->input->post('contact');
  //   $purpose = $this->input->post('purpose');
  //   $dateloas = $this->input->post('dateloa');
  //   $complaint = $this->input->post('complaint');
  //   $consultant = $this->input->post('consultant');
  //   $dateloa = date("F-d-Y",strtotime($dateloas));

  //   $name = $fname.' '.$lname;
  //   $this->load->library('Phpmailer_lib');
  //   $mail = $this->phpmailer_lib->load();
  //   $mail->isSMTP();
  //   $mail->Host     = 'smtp.gmail.com';
  //   $mail->SMTPAuth = true;
  //   $mail->Username = 'cduhhmo@gmail.com';
  //   $mail->Password = 'hmo@1234';
  //   $mail->SMTPSecure = 'ssl';
  //   $mail->Port     = 465;
  //   $mail->setFrom($email, "OUT PATIENT LOA REQUEST");
  //   $mail->AddReplyTo($email, $name);
  //   $mail->SMTPKeepAlive = true;
  //   $mail->Subject = 'Out Patient LOA Request';
  //   $mail->isHTML(true);

    


  //   for($i=0;$i<count($_FILES['insurance']['name']);$i++)
  //   {
  //       $uploadfile = "upload/insurance/".$_FILES['insurance']['name'][$i];
  //       $filename =$_FILES['insurance']['name'][$i];
  //       if (move_uploaded_file($_FILES['insurance']['tmp_name'][$i], $uploadfile)) {
          
  //           $mail->addAttachment($uploadfile, $filename);

  //       }
  //   }
  //   for($i=0;$i<count($_FILES['procedure']['name']);$i++)
  //   {
  //       $uploadfile = "upload/procedure/".$_FILES['procedure']['name'][$i];
  //       $filename =$_FILES['procedure']['name'][$i];
  //       if (move_uploaded_file($_FILES['procedure']['tmp_name'][$i], $uploadfile)) {
  //           $mail->addAttachment($uploadfile, $filename);
  //       }
  //   }

  
  //  $mailContent = "
  //   <!DOCTYPE html>
  //   <html>
  //     <head>
  //         <title></title>
  //         <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  //         <meta name='viewport' content='width=device-width, initial-scale=1'>
  //         <meta http-equiv='X-UA-Compatible' content='IE=edge' />
  //         <body>
  //           <div class>
  //               <div class='modal-body' style='margin:1% 2% 2% 2%;'>
                 
  //                 <div style=''>
  //                     <div style=''>
  //                         <table style='width: 100%;'>
  //                             <tr>
  //                                <td style='width: 15%;'><label><strong>NAME </strong></label></td> 
  //                                <td style='padding:4px;'><u>".$lname." ".$fname." ".$mname."</u> </td> 
  //                             </tr>
  //                             <tr>
  //                                <td><label><strong>BIRTHDATE </strong></label></td> 
  //                                <td style='padding:4px;'><u> ".$datebirth." </u></td> 
  //                             </tr>
  //                             <tr>
  //                                <td><label><strong>EMAIL </strong></label></td> 
  //                                <td style='padding:4px;'><u>".$email."</u> </td> 
  //                             </tr>
  //                             <tr>
  //                                <td><label><strong>CONTACT </strong></label></td> 
  //                                <td style='padding:4px;'><u>".$contact." </u></td> 
  //                             </tr>
  //                         </table>
  //                     </div>
  //                     <div style='margin-top: 13px'>
  //                         <div style='margin-top: 10px'>
  //                             <label><strong>HMO PROVIDER</strong></label>
  //                             <div style='padding: 3px;'>".$provider."</div>
  //                         </div>
  //                         <div style='margin-top: 10px'>
  //                             <label><strong>PURPOSE (What is the LOA for?)</strong></label>
  //                             <div style='padding: 3px;'>".$purpose."</div>
                              
  //                         </div>
  //                         <div style='margin-top: 10px'>
  //                             <label><strong>Date (When to use the LOA?)</strong></label>
  //                             <div style='padding: 3px;'>".$dateloa."</div>
  //                         </div>
  //                     </div>
  //                 </div>
  //                 <div style='margin-top: 13px'>
  //                     <div >
  //                         <div style='margin-top: 3px'>
  //                             <label><strong>FOR Consultation, who is your Physician/Doctor?</strong></label>
  //                             <div style='padding: 3px;'>".$consultant."</div>
  //                         </div>
  //                         <div style='margin-top: 10px'>
  //                             <label><strong>Chief Complaint</strong></label>
  //                             <div style='padding: 3px;'>".$complaint."</div>
  //                         </div>
  //                     </div>
  //                 </div>
  //             </div>
  //             </div>
  //           </div>
  //       </body>
  //   </html>
  //   ";

  //   $usercontent = '
  //     <div>
  //       <h4><strong>Confirmation message:</strong></h4>
  //         Thank you for availing of our online LOA Processing Service. Your request is now queued for evaluation and processing. You will receive a confirmation of the request in your email. Once your request is successfully processed, you will receive a separate email of your LOA which you can print or pick-up in our HMO Office.<br>
  //     </div>
  //     <div>
  //         Under this new normal method in our HMO Concierge, we encourage our clients to make sure that the information and attachments you have declared are accurate, true, and correct. Incomplete and inconsistent data provided will result to delay or decline of LOA approval.<br>
  //     </div>
  //     <div><br>
  //         Should you have further questions, please email us at cduhhmo@gmail.com.<br><br>
  //     </div>
     
  //      <div>
  //         Sincerely,<br><br>
  //         CebuDoc HMO Concierge<br>
        
  //     </div>
     
  //   ';

   


  //   $mail->AddAddress($email);
  //   $mail->Body = $usercontent;
  //   $mail->Send();
    
  //   $mail->ClearAddresses();

  //   $mail->Body = $mailContent;
  //   $mail->addAddress("cduhhmo@gmail.com");
  //   $mail->send();

  // }

  function readappointment(){
      $this->session->set_flashdata("response","You are now Logged in");
      $_SESSION['read'] = 'read';
      redirect(base_url('contact/appointment'));
  }
  function closeappointment(){
      $this->session->set_flashdata("response","You are now Logged in");
      $_SESSION['read'] = '';
      redirect(base_url('Home'));
  }
  function appointment(){
    $data['header'] = 'settings/header';
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
    $data['title'] = 'Schedule an Appointment | CebuDoc Group';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['main'] = 'pages/appointment';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
  }


  function selectappointmentdate(){
      $date = $this->input->post('date');

      $result = $this->create->selectdate($date);

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
     
       $class1 = "primarybutton";
       $class2 = "primarybutton";
       $class3 = "primarybutton";
       $class4 = "primarybutton";
       $class5 = "primarybutton";
       $class6 = "primarybutton";
       $class7 = "primarybutton";
       $class8 = "primarybutton";
       $class9 = "primarybutton";
       $class10 = "primarybutton";
       $class11 = "primarybutton";
       $class12 = "primarybutton";
       $class13 = "primarybutton";
       $class14 = "primarybutton";
       $class15= "primarybutton";
       $class16= "primarybutton";
       $class17= "primarybutton";
      $datenow = "2020-08-08";
      foreach ($result as $row) {
       
        if ($row->date == $date && $row->time == "8:30 AM") {

          $time1 = $this->create->getschedule($row->date,$row->time);

          if ($time1 > 2) {

            $btn1 = "disabled";
            $class1 = "primarydisable";

          }else{

            $btn1 = "";
            $class1 = "primarybutton";

          }
        }

        if ($row->date == $date && $row->time == "9:00 AM") {

          $time2 = $this->create->getschedule($row->date,$row->time);

          if ($time2 > 2) {

            $btn2 = "disabled";
            $class2 = "primarydisable";

          }else{

            $btn2 = "";

            $class2 = "primarybutton";

          }
        }
        if ($row->date == $date && $row->time == "9:30 AM") {

          $time3 = $this->create->getschedule($row->date,$row->time);

          if ($time3 > 2) {

            $btn3 = "disabled";
            $class3 = "primarydisable";

          }else{

            $btn3 = "";
            $class3 = "primarybutton";

          }
        }
        if ($row->date == $date && $row->time == "10:00 AM") {

          $time4 = $this->create->getschedule($row->date,$row->time);
          if ($time4 > 2) {
            $btn4 = "disabled";
            $class4 = "primarydisable";
          }else{
            $btn4 = "";
            $class4 = "primarybutton";
          }
        }

        if ($row->date == $date && $row->time == "10:30 AM") {
          $time5 = $this->create->getschedule($row->date,$row->time);
          if ($time5 > 2) {
            $btn5 = "disabled";
            $class5 = "primarydisable";
          }else{
            $btn5 = "";
            $class5 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "11:00 AM") {
          $time6 = $this->create->getschedule($row->date,$row->time);
          if ($time6 > 2) {
            $btn6 = "disabled";
            $class6 = "primarydisable";
          }else{
            $btn6 = "";
            $class6 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "11:30 AM") {
          $time7 = $this->create->getschedule($row->date,$row->time);
          if ($time7 > 2) {
            $btn7 = "disabled";
            $class7 = "primarydisable";
          }else{
            $btn7 = "";
            $class7 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "12:00 AM") {
          $time8 = $this->create->getschedule($row->date,$row->time);
          if ($time8 > 2) {
            $btn8 = "disabled";
            $class8 = "primarydisable";
          }else{
            $btn8 = "";
            $class8 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "12:30 PM") {
          $time9 = $this->create->getschedule($row->date,$row->time);
          if ($time9 > 2) {
            $btn9 = "disabled";
            $class9 = "primarydisable";
          }else{
            $btn9 = "";
            $class9 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "1:00 PM") {
          $time10 = $this->create->getschedule($row->date,$row->time);
          if ($time10 > 2) {
            $btn10 = "disabled";
            $class10 = "primarydisable";
          }else{
            $btn10 = "";
            $class10 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "1:30 PM") {
          $time11 = $this->create->getschedule($row->date,$row->time);
          if ($time11 > 2) {
            $btn11 = "disabled";
            $class11 = "primarydisable";
          }else{
            $btn11 = "";
            $class11 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "2:00 PM") {
          $time12 = $this->create->getschedule($row->date,$row->time);
          if ($time12 > 2) {
            $btn12 = "disabled";
            $class12 = "primarydisable";
          }else{
            $btn12 = "";
            $class12 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "2:30 PM") {
          $time13 = $this->create->getschedule($row->date,$row->time);
          if ($time13 > 2) {
            $btn13 = "disabled";
            $class13 = "primarydisable";
          }else{
            $btn13 = "";
            $class13 = "primarybutton";
          }
        }
        if ($row->date == $date && $row->time == "3:00 PM") {
          $time14 = $this->create->getschedule($row->date,$row->time);
          if ($time14 > 2) {
            $btn14 = "disabled";
            $class14 = "primarydisable";
          }else{
            $btn14 = "";
            $class14 = "primarybutton";
          }
        }

        if ($row->date == $date && $row->time == "3:30 PM") {
          $time15 = $this->create->getschedule($row->date,$row->time);
          if ($time15 > 2) {
            $btn15 = "disabled";
            $class15 = "primarydisable";
          }else{
            $btn16 = "";
            $class15 = "primarybutton";
          }
        }

        if ($row->date == $date && $row->time == "4:00 PM") {
          $time16 = $this->create->getschedule($row->date,$row->time);
          if ($time16 > 2) {
            $btn16 = "disabled";
            $class16 = "primarydisable";
          }else{
            $btn16 = "";
            $class16 = "primarybutton";
          }
        }

        if ($row->date == $date && $row->time == "4:30 PM") {
          $time17 = $this->create->getschedule($row->date,$row->time);
          if ($time17 > 2) {
            $btn17 = "disabled";
            $class17 = "primarydisable";
          }else{
            $btn17 = "";
            $class17 = "primarybutton";
          }
        }
        
        
        
      }
      
     
    $list ='
        <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
          <div  class="col-lg-12 pt-1 pb-1"> Available Appointments on 
          <strong><span id="">'.date("F d Y",strtotime($date)).'</span></strong></div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>8:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class1.' appointmentbtn btn-block " '.$btn1.' attrtime="8:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>9:00 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class2.' appointmentbtn btn-block" '.$btn2.' attrtime="9:00 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>9:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class3.' appointmentbtn btn-block" '.$btn3.' attrtime="9:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>10:00 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class4.' appointmentbtn btn-block" '.$btn4.' attrtime="10:00 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>10:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class5.' appointmentbtn btn-block" '.$btn5.' attrtime="10:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>11:00 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class6.' appointmentbtn btn-block" '.$btn6.' attrtime="11:00 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>11:30 AM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class7.' appointmentbtn btn-block" '.$btn7.' attrtime="11:30 AM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>12:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class8.' appointmentbtn btn-block" '.$btn8.' attrtime="12:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>12:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class9.' appointmentbtn btn-block" '.$btn9.' attrtime="12:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>1:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class10.' appointmentbtn btn-block" '.$btn10.' attrtime="1:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>1:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class11.' appointmentbtn btn-block" '.$btn11.' attrtime="1:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>2:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class12.' appointmentbtn btn-block" '.$btn12.' attrtime="2:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>2:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class13.' appointmentbtn btn-block" '.$btn13.' attrtime="2:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>3:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class14.' appointmentbtn btn-block" '.$btn14.' attrtime="3:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>3:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class15.' appointmentbtn btn-block" '.$btn15.' attrtime="3:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>4:00 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class16.' appointmentbtn btn-block" '.$btn16.' attrtime="4:00 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
          <div class="row " style="border-bottom:1px solid #ddd;padding:2px;">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="p-2"><span class="fas fa-clock"> <label>4:30 PM</label></span></div>
                  </div>
                   <div class="col-lg-6">
                    <button class="'.$class17.' appointmentbtn btn-block" '.$btn17.' attrtime="4:30 PM" attrdate="'.$date.'">BOOK APPOINTMENT</button>
                  </div>
                </div>
              </div>                        
          </div>
       '; 
      
      echo json_encode($list);
  }


  function saveappointment(){
    $data = $this->input->post();
    $result = $this->create->createappointment($data);
    if ($result == 0) {
       echo 0;
    }else{
       echo $result;
    }
   

  }
  function laboratory(){
    $data['header'] = 'settings/header';
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
    $data['title'] = 'Schedule an Appointment | CebuDoc Group';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['main'] = 'pages/laboratory';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
  }
  
  function submitpayment(){
    $data = $this->input->post();

    $name = $data['attachfilesname'];
    $id = $this->encrypt->decode($data['attachid']);
    $attachname = 'attachment'.$id;
    $new_url = str_replace(' ', '-', $name);
    
    $attachfile = $_FILES['attachfiles']['name'];
    $uploadfile = "./onlineregistration/upload/attachment/".$attachname.'.jpg';
     if (move_uploaded_file($_FILES['attachfiles']['tmp_name'], $uploadfile)){
        $this->create->attachfile($data);
     }else{
      echo "error";
     }


      $selectdata = $this->db->select("*")->from("patientmaster")->where("pid",$id)->get()->row();
      $fieldschedid = $selectdata->schedid;
      $selectdatasched = $this->db->select("*")->from("tbl_appointment")->where("sid",$fieldschedid)->get()->row();
    
      $name = $selectdata->firstname.' '.$selectdata->lastname.' '.$selectdata->middlename;
        $email = $selectdata->pemail;

          // $this->load->library('phpmailer_lib');
          $mail = $this->phpmailer_lib->load(); 
          // $mail->isSMTP();
          // $mail->Host     = 'mail.cebudocgroup.com ';
          // $mail->SMTPAuth = true;
          // $mail->CharSet = 'utf-8';
          // $mail->SMTPSecure = 'ssl';
          // $mail->Username = 'pcrtest2@cebudocgroup.com';
          // $mail->Password = 'pcrtest2@123';
          // $mail->Mailer = 'smtp';
          // $mail->Port     = 465;
          // $mail->setFrom($email, $name);
          // $mail->SMTPKeepAlive = true;
          // $mail->Subject = $name;
          // $mail->isHTML(true);


         $confirm = '
            <p>
               <p> Waiting for Confirmation!</p>
                Hi '.$name.', thank you for completing the payment process. Your proof of payment will now be validated within 24 hours. Please regularly check your email because once payment is successfully verified, you will receive a confirmatory message of your testing schedule and pre-testing reminders.

                Should you have other questions and concerns, please reach us at 253-7512 local 124
            </p>
              ';


        $mail->From = "pcrtest2.cdg@gmail.com";
        $mail->FromName = $name;

        $mail->addAddress($email, $name);
        $mail->AddReplyTo($email, $name);
        //Provide file path and name of the attachments
        // $mail-> addReplyTo('pcrtest2.cdg@gmail.com',$name);
        $mail->isHTML(true);
        $mail->Subject = $data['lastname'];
        $mail->Body = $confirm;
        $mail->AltBody = "This is the plain text version of the email content";

        try {
            $mail->send();
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
           
        // $mail->Body = $confirm;
        // $mail->addAddress($email);
        // $mail->send();


  }

  function save_laboratorydetails(){
     $url = $this->uri->segment(3);
     $data = $this->input->post();
     $result3 = $this->create->savepatientmaster($data);

     // $schedid = $data['schedid'];

    if ($result3) {

      $patientid = $result3;
     //  $result = $this->create->patientlist($patientid);  
           
     //  $resultivn = $this->create->ivmastertlist($patientid);
      
     //  $nameinvestigator =  $resultivn->investigator;
     //  $dateinvestigate = "";
     //  $firstname = $result->firstname;
     //  $middlename = $result->middlename;
     //  $lastname = $result->lastname;
     //  $dateofBirth = date("m/d/Y",strtotime($result->dob));
     //  $Street = $result->pstreet;
     //  $municipality = $result->pmunicipality;
     //  $province = $result->pprovince;
     //  $region = $result->pregion;
     //  $sex = $result->gender;
     //  $age = $result->age;
     //  $pid = $result->pid;
     //  $nationality = $result->nationality;
     //  $civilstatus = $result->civilstatus;
     //  $occupation = $result->occupation;
     //  $passportno = $result->passportno;
     //  $phouseno = $result->phouseno;
     //  $pstreet = $result->pstreet;
     //  $pmunicipality = $result->pmunicipality;
     //  $pprovince = $result->pprovince;
     //  $pregion = $result->pregion;
     //  $pphone = $result->pphone;
     //  $pcellphone = $result->pcellphone;
     //  $pemail = $result->pemail;
     //  $chouseno = $result->chouseno;
     //  $cstreet = $result->cstreet;
     //  $cmunicipality = $result->cmunicipality;
     //  $cprovince = $result->cprovince;
     //  $cregion = $result->cregion;
     //  $cphone = $result->cphone;
     //  $ccellphone = $result->ccellphone;
     //  $cemail = $result->cemail;
     //  $ofwemployeername = $result->ofwemployeername;
     //  $ofwoccupation = $result->ofwoccupation;
     //  $ofwplaceofwork = $result->ofwplaceofwork;
     //  $ofwhouse = $result->ofwhouse;
     //  $ofwstreet = $result->ofwstreet;
     //  $ofwcity = $result->ofwcity;
     //  $ofwprovince = $result->ofwprovince;
     //  $ofwcountry = $result->ofwcountry;
     //  $ofwofficephoneno = $result->ofwofficephoneno;
     //  $ofwcellphoneno = $result->ofwcellphoneno;


     //  $travelOtherCountry = $resultivn->travelOtherCountry;
     //  $portofexit = $resultivn->portofexit;
     //  $vessel = $resultivn->vessel;
     //  $vesselno = $resultivn->vesselno;
     

     // $departuredate1 = $resultivn->departuredate;
     // $arrivaldate1 = $resultivn->arrivaldate;

     //  if ($departuredate1 != "") {

     //     $departuredate = date("m/d/Y",strtotime($resultivn->departuredate));

     //  }else{

     //    $departuredate = "";
     //  }
     //  if ($arrivaldate1 != "") {

     //     $arrivaldate = date("m/d/Y",strtotime($resultivn->arrivaldate));

     //  }else{

     //    $arrivaldate =  "";

     //  }



     //  $exposebefore14 = $resultivn->exposebefore14;
     //  $dateofcontact = $resultivn->dateofcontact;
     //  $placebefore14 = $resultivn->placebefore14;
     //  $ifyes = $resultivn->ifyes;
     //  $ifyesdate = $resultivn->ifyesdate;
     //  $ifyesname1 = $resultivn->ifyesname1;
     //  $ifyesname2 = $resultivn->ifyesname2;
     //  $ifyescontactno2 = $resultivn->ifyescontactno2;
     //  $ifyesname3 = $resultivn->ifyesname3;
     //  $ifyescontactno3 = $resultivn->ifyescontactno3;
     //  $ifyesname4 = $resultivn->ifyesname4;
     //  $ifyesontactno4 = $resultivn->ifyesontactno4;



     //  $html = '
     //    <!DOCTYPE html>
     //    <html>
     //      <head>
     //      <style>
     //        .span{
     //          margin-right:10px;
     //        }
     //        table, td{
     //          border: 1px solid #001;
     //        }
     //        table {
     //          border-collapse: collapse;
     //          width: 100%;
     //        }
     //        th {
     //          height: 5px;
     //        }
     //        .tittle{
     //          text-transform:uppercase;
     //          height:17px;
     //          text-align:center;
     //          font-size:0.6em !important;
     //          background:#9db6c5;color:black;
     //        }
     //        .tittlesub{
     //          text-transform:uppercase;
     //          height:17px;
     //          text-align:left;
     //          font-size:0.6em !important;
     //          background:#9db6c5;color:black;
     //        }
            
     //        .text{
     //          font-size:0.6em;

     //          text-transform:lowecase;
     //        }
     //        .fields{
     //          height:10px;
     //          padding:2px;
     //        }
     //        .span1{
     //          height:15px;
     //          border-bottom:1px solid #001;
     //          font-size:0.6em;
     //        }
     //        .span3{
     //          height:13px;
     //          font-size:0.6em;
     //        }
     //        .span2{
     //          border-bottom:1px solid #001;
     //          font-size:0.6em;
     //          text-align:center;
     //        }
     //        .text-center{
     //          text-align:center;
     //        }
     //        .smaller{
     //          width:10vw;
     //        }
     //        .td-2{
     //          width:3vw;
     //        }
     //        .td-5{
     //          width:5vw;
     //        }
     //        .td-10{
     //          width:20vw;
     //        }
     //        .td-20{
     //          width:30vw;
     //        }
     //        .td-30{
     //          width:30vw;
     //        }
     //        .td-40{
     //          width:40vw;
     //        }
     //        .td-50{
     //          width:50vw;
     //        }
     //        .td-60{
     //          width:60vw;
     //        }
     //        .td-70{
     //          width:70vw;
     //        }
     //        .td-80{
     //          width:80vw;
     //        }
     //        .td-90{
     //          width:90vw;
     //        }
     //        .td-100{
     //          width:100vw;
     //        }
     //      </style>
     //    </head>
     //    <body>
     //      <div>
     //        <table>
     //          <tr>
     //            <th colspan="2" style="boder:0px;">
     //              <center><img src="./icon/cdg.png" alt="logo" style="width: 65px;height: 60px;"></center>
     //            </th>
     //              <th colspan="8">
     //                <h3>
     //                  <center>
     //                    <div>CASE INVESTIGATION FORM</div>
     //                    <div>CoronaVirus Disease (Covid-19) </div>
     //                  </center>
     //                </h3>
     //              </th>
     //              <th colspan="2" style="boder:0px;">
     //              <center><img src="./icon/cduh.png" alt="logo" style="width: 65px;height: 60px;"></center>
     //            </th>
     //          </tr>
     //          <tr>
     //              <td colspan="5">
     //                <div class="text">Disease Reporting Unit / Hospital <div>
     //                <div class="fields">Cebu Doctors University Hospital<div>
     //              </td>
     //              <td colspan="4">
     //                <div class="text">Name of Investigator <div>
     //                <div class="fields">'.$nameinvestigator.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Date of Invterview <div>
     //                <div class="fields">'.$dateinvestigate.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittle">1. Patient profile</td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">Last Name <div>
     //                <div class="fields">'.$lastname.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">First Name <div>
     //                <div class="fields">'.$firstname.'<div>
     //              </td>
     //              <td colspan="2">
     //                <div class="text">Middle Name <div>
     //                <div class="fields">'.$middlename.'<div>
     //              </td>
     //              <td colspan="2">
     //                <div class="text">Birthday(mm/dd/yyyy) <div>
     //                <div class="fields">'.$dateofBirth.'<div>
     //              </td>
     //              <td colspan="1">
     //                <div class="text">Age <div>
     //                <div class="fields">'.$age.'<div>
     //              </td>
     //              <td colspan="1">
     //                <div class="text">Sex <div>
     //                <div class="fields">'.$sex.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">Occupation <div>
     //                <div class="fields">'.$occupation.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Civil status <div>
     //                <div class="fields">'.$civilstatus.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Nationality <div>
     //                <div class="fields">'.$nationality.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Passport No.<div>
     //                <div class="fields">'.$passportno.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittle">2. Philippines Residence</td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittlesub">2.1 Permanent Address</td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">House No./Lot/Bldg. <div>
     //                <div class="fields">'.$phouseno.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Street/Barangay <div>
     //                <div class="fields">'.$pstreet.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Municipality/city <div>
     //                <div class="fields">'.$pmunicipality.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Province<div>
     //                <div class="fields">'.$pprovince.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">Region <div>
     //                <div class="fields">'.$pregion.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Home Phone No <div>
     //                <div class="fields">'.$phouseno.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Cellphone no. <div>
     //                <div class="fields">'.$pcellphone.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Email address<div>
     //                <div class="fields">'.$pemail.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittlesub">2.2 Current Address</td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">House No./Lot/Bldg. <div>
     //                <div class="fields">'.$chouseno.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Street/Barangay <div>
     //                <div class="fields">'.$cstreet.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Municipality/City <div>
     //                <div class="fields">'.$cmunicipality.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Province<div>
     //                <div class="fields">'.$cprovince.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">Region <div>
     //                <div class="fields">'.$cregion.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Home Phone no <div>
     //                <div class="fields">'.$cphone.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Work Phone no. <div>
     //                <div class="fields">'.$ccellphone.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Other email address<div>
     //                <div class="fields">'.$cemail.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittle">3. Address outside the philippines (for overseas filipino workes and individuals with residence outside the philippines) </td>
     //          </tr>
     //          <tr>
     //              <td colspan="4" >
     //                <div class="text">Employer`s name <div>
     //                <div class="fields">'.$ofwemployeername.'<div>
     //              </td>
     //              <td colspan="4">
     //                <div class="text">Occupation <div>
     //                <div class="fields">'.$ofwoccupation.'<div>
     //              </td>
     //              <td colspan="4" >
     //                <div class="text">Place of work <div>
     //                <div class="fields">'.$ofwplaceofwork.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">House No./Bldg. Name <div>
     //                <div class="fields">'.$ofwhouse.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Street <div>
     //                <div class="fields">'.$ofwstreet.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">City/Municipality <div>
     //                <div class="fields">'.$ofwcity.'<div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text">Provice<div>
     //                <div class="fields">'.$ofwprovince.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="4" >
     //                <div class="text">Country<div>
     //                <div class="fields">'.$ofwcountry.'<div>
     //              </td>
     //              <td colspan="4">
     //                <div class="text">Office Phone No. <div>
     //                <div class="fields">'.$ofwofficephoneno.'<div>
     //              </td>
     //              <td colspan="4" >
     //                <div class="text">Cellphone No. <div>
     //                <div class="fields">'.$ofwcellphoneno.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittle">4. Travel History</td>
     //          </tr>
     //          <tr>
     //              <td colspan="8" >
     //                <div class="text">History of travel/visit/work in other countries with a known COVID-19 transmission 14 days before the onset of your signs and symptoms 
     //                  <center>
     //                    '.$travelOtherCountry.'
     //                  </center>
     //                <div>
                    
     //              </td>
     //              <td colspan="4">
     //                <div class="text">Port (Country) of exit : <div>
     //                <div class="fields">'.$portofexit.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="3" >
     //                <div class="text">Airline/Sea Vessel:<div>
     //                <div class="fields">'.$portofexit.'<div>
     //              </td>
     //              <td colspan="2">
     //                <div class="text">Flight/Vessel Number <div>
     //                <div class="fields">'.$vesselno.'<div>
     //              </td>
     //              <td colspan="3" >
     //                <div class="text">Date of departure(mm/dd/yyyy) <div>
     //                <div class="fields">'.$departuredate.'<div>
     //              </td>
     //              <td colspan="4">
     //                <div class="text">Date of arrival in philippines<div>
     //                <div class="fields">'.$arrivaldate.'<div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="12" class="tittle">5. Exposure history</td>
     //          </tr>
     //          <tr>
     //              <td colspan="6" >
     //                <div class="text">History of exposure to known COVID-19 case 14 days before the onset of signs and symptoms:
     //                  '.$exposebefore14.'
     //                <div>
     //              </td>
     //              <td colspan="6">
     //                <div class="text">if yes: date of contact with known COVID-19 case (mm/dd/yyyy) <div>
     //                <div class="fields">'.$dateofcontact.'<div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="6" >
     //                <div class="text">Have you been in a place with a known COVID-19 transmission 14 days before the onset of signs and symptoms:
     //                  '.$placebefore14.'
     //                <div>
     //              </td>
     //              <td colspan="6">
     //                <div class="text">
     //                  if yes: Place  &nbsp;&nbsp;&nbsp;
     //                  '.$ifyes.'
     //                </div>
     //                <div class="text">
     //                  '.$ifyesname2.'
     //                </div>
     //                <div class="text">
     //                  <div class="span"> Date when you have been in that place:  '.$ifyesdate.'</div>
     //                  <div class="span">Name of the place : '.$ifyesname2.'</div>
     //                </div>
     //              </td>
                  
     //          </tr>
     //          <tr>
     //              <td colspan="6" >
     //                <div class="text">
     //                  List the names of persons who were with you during this (these) occasion(s) and their contact numbers: <div><i>Use the back part of this sheet when needed</i></div>
     //                <div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text span2">
     //                  NAME
     //                </div>
     //                <div class="">
     //                  <div class="span1">1. '.$ifyesname1.'</div>
     //                  <div class="span1">2. '.$ifyesname2.'</div>
     //                  <div class="span3">3. '.$ifyesname3.'</div>
     //                </div>
     //              </td>
     //              <td colspan="3">
     //                <div class="text span2">
     //                  CONTACT NUMBER
     //                </div>
     //                <div class="">
     //                  <div class="span1">'.$ifyescontactno2.'</div>
     //                  <div class="span1">'.$ifyescontactno3.'</div>
     //                  <div class="span3">'.$ifyesontactno4.'</div>
     //                </div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="12" class="tittle">6. Clinical Information</td>
     //          </tr>
     //          <tr>
     //              <td colspan="4" >
     //                <div class="text">Disposition at Time of Report<div>
     //                <div class="fields"><div>
     //              </td>
     //              <td colspan="8">
     //                <center class="text">
     //                  <span class="span">( &nbsp;&nbsp;&nbsp; ) Inpatient</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Outpatient</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Discharged</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Died</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Unknown</span>
     //                </center>
     //              </td>
                  
     //          </tr>

     //          <tr>
     //              <td colspan="6" >
     //                <div class="text">Date of onset illness (mm/dd/yyyy)<div>
     //                <div class="fields"><div>
     //              </td>
     //              <td colspan="6">
     //                <div class="text">Date of Admission/Consultant(mm/dd/yyyy)<div>
     //                <div class="fields"><div>
     //              </td>
                  
     //          </tr>

     //          <tr>
     //              <td colspan="12" >
     //                <span class="span text">&nbsp;&nbsp;&nbsp;Fever  <sup> 0 </sup>C</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;  ) Cough </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;  ) Sore throat</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;  ) Coids</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;  ) Shortness/difficulty of breathing</span>
     //              </td>
                  
     //          </tr>

     //          <tr>
     //              <td colspan="6" >
     //                <div class="text">Other signs/symptoms, specify<div>
     //                <div class="fields"><div>
     //              </td>
     //              <td colspan="6">
     //                <div class="text">Is there any history of other illness? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Yes 
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) No 
     //                <div>
     //                <div class="fields">
     //                if YES, specify:
     //                <div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="6" >
     //                <div class="text">
     //                  Chest X-ray done?
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Yes 
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) No 
     //                <div>
     //                <div class="fields">
     //                if YES, when?:
     //                <div>
     //              </td>
     //              <td colspan="6">
     //                <div class="text">Are you pregnant ? 
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Yes 
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) No 
     //                <div>
     //                <div class="fields">
     //                  <span class="span">LMP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     //                  <span class="span">Assessed as High Risk? ( &nbsp;&nbsp;&nbsp;  ) Yes ( &nbsp;&nbsp;&nbsp;  ) No 
     //                <div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="12" >
     //                <span class="span text">&nbsp;&nbsp;&nbsp;CXR Result : Pneumonia</span>
     //                  <span class="span text">( &nbsp;&nbsp;&nbsp;  ) Yes </span>
     //                  <span class="span text">( &nbsp;&nbsp;&nbsp;  ) No </span>
     //                  <span class="span text">( &nbsp;&nbsp;&nbsp;  ) Pending </span>
     //                  <span class="span text">Other Radiologic Findings :  </span>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="12" class="tittle">
     //                <div >7. Specimen Information</div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="3" >
     //                <div class="text text-center">Specimen Collected</div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center">if YES Date Collected</div>
     //                <div class="text text-center">(mm/dd/yyyy)</div>
     //              </td>
     //               <td colspan="2" >
     //                <div class="text text-center">Date Sent to RITM</div>
     //                <div class="text text-center">(mm/dd/yyyy)</div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center">Date Received in RITM</div>
     //                <div class="text text-center"><i>(to be filled up by RITM)</i></div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center">Virus Isolation Result</div>
     //              </td>
     //              <td colspan="1" >
     //                <div class="text text-center">PCR Result</div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="3" >
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;   ) Serum</span>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center">  </div>
     //              </td>
     //               <td colspan="2" >
     //                <div class="text text-center">  </div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center">  </div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center">  </div>
     //              </td>
     //              <td colspan="1" >
     //                <div class="text text-center">  </div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="3" >
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;   ) Oropharyngeal/Nasopharyngeal Swab</span>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //               <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //              <td colspan="1" >
     //                <div class="text text-center"></div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="3" >
     //                <span class="span text">( &nbsp;&nbsp;&nbsp;   ) Others</span>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //               <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //              <td colspan="2" >
     //                <div class="text text-center"></div>
     //              </td>
     //              <td colspan="1" >
     //                <div class="text text-center"></div>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="12" class="tittle">
     //                <div > 8. Specimen Information</div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="4" >
     //                <center><span class="span text">( &nbsp;&nbsp;&nbsp;  ) Suspect Case </span></center>
     //              </td>
     //              <td colspan="4" >
     //                <center><span class="span text">( &nbsp;&nbsp;&nbsp;  ) Probable Case </span></center>
     //              </td>
     //              <td colspan="4" >
     //                <center><span class="span text">( &nbsp;&nbsp;&nbsp;  ) Confirmed Case </span></center>
     //              </td>
     //          </tr>

     //          <tr>
     //              <td colspan="12" class="tittle">
     //                <div >9. Outcome</div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="4" >
     //                <div class="text">Date of Discharge (mm/dd/yyyy)<div>
     //                <div class="fields"><div>
     //              </td>
     //              <td colspan="8">
     //                <div class="text">Condition on Discharge:<div>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Inpatient</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Outpatient</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Discharged</span>
     //                  <span class="span">( &nbsp;&nbsp;&nbsp;  ) Died</span>
     //              </td>
                  
     //          </tr>
     //          <tr>
     //              <td colspan="4" >
     //                <span class="span text">Name of Informant : (if patient not available) </span>
     //                <div class="fields text"></div>
     //              </td>
     //              <td colspan="4" >
     //                <span class="span text"> Relationship </span>
     //                <div class="fields text"></div>
     //              </td>
     //              <td colspan="4" >
     //                <span class="span text"> Phone No </span>
     //                <div class="fields text"></div>
     //              </td>
     //          </tr>
     //          <tr>
     //              <td colspan="8" >
                  
     //              </td>
     //              <td colspan="4" >
     //                <span class="span text">Official Receipt No.</span>
     //                <div class="fields text">
                      
     //                </div>
     //              </td>
     //          </tr>
     //        </table>
     //      </div>
     //    </body>
     // </html>
     //  ';


    // $this->pdf->loadHtml($html);
    // $this->pdf->setPaper("Legal","Portrait");
    // $this->pdf->render();

    //  $filename = 'PRCTEST-IDNO'.$patientid.'-'.date("m-d-Y");

    //   $x = 745;
    //   $y = 575;
    //   $text = "Page {PAGE_NUM}";
    //   $font = null;
    //   $size = 10;
    //   $color = array(0,0,0);
    //   $word_space = 0.0;  //  default
    //   $char_space = 0.0;  //  default
    //   $angle = 0.0;   //  default
    //   $this->pdf->get_canvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        // write_file("./upload/caseinvestigation/" .$filename.'.pdf', $this->pdf->output());
        
        $name = $data['lastname'].' '.$data['firstname'].' '.$data['middlename'];
        $email = $data['pemail'];

           $voidtext = "Void";
      
      
      
        $patientid2 = $this->encrypt->encode($patientid);
        $void = $this->encrypt->encode($voidtext);

        $content = "
          <p>
            <p>Registration Complete!</p>
        <p>Hi ".$data['firstname']." ".$data['lastname']." , thank you for completing the registration form. To confirm your schedule, please proceed to online payment with the following details.</p>
        <div>Acct Name: Cebu Doctors University Hospital Inc.</div>
        <div>Acct No: 002930014284</div>
        <div>Bank Name: BANCO DE ORO (BDO)</div>
        <div>Amount: Php 6,900.00</div>
        <div>Description: Payment for RT-PCR Testing</div>
        <p>

          After the payment is processed, please send or upload a proof, a screenshot of the mobile transaction, or a scanned copy of deposit slip here <a href='https://cebudocgroup.com/patient_services/pcrtestingpayment/".$patientid2."/".$name."/'  target='_self'>CLICK HERE</a> for verification. Once payment is successfully verified, please wait for the confirmatory message of your schedule and pre-testing reminders.
        
        </p>
          </p>
        ";
        
        $mail = $this->phpmailer_lib->load();
        $mail->SMTPSecure = "ssl";
        $mail->From = "pcrtest2.cdg@gmail.com";
        $mail->FromName = $name;
        $mail->Port = 465;
        $mail->addAddress($email, $name);
        $mail->AddReplyTo($email, $name);
        $mail->isHTML(true);

        $mail->Subject = $data['lastname'];
        $mail->Body = $content;
        $mail->AltBody = "This is the plain text version of the email content";
        $mail->SMTPKeepAlive = true;


        try {
            $mail->send();
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        $mail->SmtpClose();
      
        // $mail->isSMTP();
        // $mail->Host     = 'ssl://smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'pcrtest2@gmail.com';
        // $mail->Password = 'pcrtest2@123';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port     = 465;
        // $mail->setFrom($email, "OUT PATIENT LOA REQUEST");
        // $mail->AddReplyTo($email, $name);
        // $mail->SMTPKeepAlive = true;
        // $mail->Subject = $data['lastname'];
        // $mail->isHTML(true);

        // $mail = new PHPMailer;

       


        // $mail->isSMTP();
        // $mail->Host     = 'mail.cebudocgroup.com';
        // $mail->SMTPAuth = true;
        // $mail->CharSet = 'utf-8';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Username = 'pcrtest2@cebudocgroup.com';
        // $mail->Password = 'pcrtest2@123';
        // $mail->Mailer = 'smtp';
        // $mail->Port     = 465;
        // $mail->setFrom($email, $name);
        // $mail-> addReplyTo('pcrtest2.cdg@gmail.com',$name);
        // $mail->SMTPKeepAlive = true;
        // $mail->Subject = $data['lastname'];
        // $mail->isHTML(true);

        
        // $mail->AddAddress($email);
        // $mail->Body = $content;
        // $mail->Send();
        
        // $mail->ClearAddresses();

        // $pcrcontent = "<div style='padding:5px;'>
        //   <a href='https://cebudocgroup.com/Download/getfile/".$filename."/".$void."' target='_self' download>".$filename."</a>  
        // ";

        // $mail->Body = $pcrcontent;
        // $mail->addAddress("pcrtest.cdg@gmail.com");
        // $mail->send();


     }



     echo json_encode(array("patientid"=>$patientid));
     // redirect("Contact/investigationform/".$data['schedid']."/".$result."/");
  }


 

  function investigationform(){

    $data['header'] = 'settings/header';
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
    $data['title'] = 'Schedule an Appointment | CebuDoc Group';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['main'] = 'pages/investigation';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
  }

  function subscribe(){
    $data['header'] = 'settings/header';
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital, subscribe, cebudoc subscribe, cebu doc group subscribe, cebu doc subscribe to our newsletter, cebudoc newsletter';
    $data['title'] = 'Subscribe to our newsletter | CebuDoc Group';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['main'] = 'pages/subscribe';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
  }

  function transportation(){
    $data['header'] = 'settings/header';
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
    $data['title'] = 'Map Directions and Transpo Info | CebuDoc Group';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['main'] = 'pages/undercons';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
  }

  function medical_record_request(){
    $data['header'] = 'settings/header';
    $data['keywords'] = 'cebu doctors hospital, cebu doctor, cebu doc, cebu doctors\' university hospital, CDUH, hospital in cebu, university, hospital, history and milestone, QHA accredited, DOH accredited, Philhealth accredited, mactan doctors\' hospital, north general hospital, south general hospital, san carlos doctors\' hospital, ormoc doctors\' hosptial, cebu doctors university, best hospital in cebu,list of hospitals in cebu, leading hospitals in the philippines, affordable hospital in cebu, top hospitals in cebu, safe quality oriented, affordable hospital';
    $data['title'] = 'Medical Record Request | CebuDoc Group';
    $data['description'] = 'Cebu Doctors\' University Hospital (CDUH), Exemplifies world-class health care and education in Cebu and the rest of the country.';
    $data['main'] = 'pages/undercons';
    $data['footer'] = 'settings/footer';
    $this->load->view('settings/template', $data);
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
