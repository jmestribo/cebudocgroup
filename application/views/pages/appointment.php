<!--CONTACT-->
<!-- <section class="mbr-section content5 cid-default-banner" id="content5-3h">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div> -->

   <!--  <div class="container-fluid">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    Schedule of Appointment</h2>
            </div>
        </div>
    </div> -->
<!-- </section> -->

<section class="mbr-section form1 cid-qM2t50SQmT" id="form1-3j">
    <div class="container">
      
    </div>
    <div class="container"><br><br><br><br><br>
        <center><legend>CEBU DOCTOR'S UNIVERSITY HOSPITAL ONLY</legend></center><br>
        <legend>OUT PATIENT LOA REQUEST</legend>
        <label>
            As part of our NEW NORMAL efforts, you can now avail of our ONLINE Letter of Authorization (LOA) Request for Outpatient Consultation and Procedures that you wish to avail from our Hospital. 
        </label>
         <!-- <legend>Personal Information</legend>   action="<?php echo base_url();?>contact/send_appointmentmail" method="post" enctype="multipart/form-data" -->
        <form  id="sendappointmail" class="mbr-form">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="label">Lastname <label style="font-size: 0.9em;color:red;"> *</label></div>
                   <input type="text" name="lname" class="c-form validation"  placeholder="Enter Lastname"  required="">
                </div>
                <div class="col-md-4">
                    <div class="label">Firstname <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <input type="text" name="fname" class="c-form validation" placeholder="Enter Firstname" required="">
                </div>
                <div class="col-md-4">
                    <div class="label">Middlename <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <input type="text" name="mname" class="c-form validation" placeholder="Enter Middlename">
                </div>
                <div class="col-md-4 mt-3">
                    <div class="label">Date of Birth <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <input type="date" name="datebirth" class="c-form validation" placeholder="Enter Date of Birth" required="" min="1799-01-02">
                </div>
                <div class="col-md-4 mt-3">
                    <div class="label">Email <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <input type="email" name="email"  class="c-form validation" placeholder="Enter Email" required="">
                </div>
                <div class="col-md-4 mt-3">
                    <div class="label">Contact No. <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <input type="number" name="contact" class="c-form validation" placeholder="Enter Contact No." required="">
                </div>

                <div class="col-md-4 mt-3">
                    <div class="label">HMO Provider <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <select class="c-form validation" name="provider" placeholder="Enter " required="">
                        <option value="">SELECT ONE</option>
                        <option>AMPHIL</option>
                        <option>ASIAN CATE</option>
                        <option>ASIANLIFE/ETIQA</option>
                        <option>EB GROUP (consult only)</option>
                        <option>KAISER</option>
                        <option>LIFE AND HEALTH</option>
                        <option>MAXICARE</option>
                        <option>MEDICARE</option>
                        <option>PEACE CORPS</option>
                        <option>PHILCARE</option>
                        <option>ROYAL MARINER'S</option>
                        <option>GENERALI</option>
                    </select>
                </div>
                <div class="col-md-4  mt-3">
                    <div class="label">PURPOSE (What is the LOA for?) <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <select class="c-form validation" name="purpose" required="">
                        <option value="">SELECT ONE</option>
                        <option>CONSULTATION</option>
                        <option>PROCEDURE/DIAGNOSIS</option>
                        <option>BOTH</option>
                    </select>
                </div>
                <div class="col-md-4  mt-3">
                    <div class="label">Date (When to use the LOA?) <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <input type="date" name="dateloa" id="dateloa" class="c-form validation" required=""  min="1799-01-02" >
                    <label style="font-size: 0.9em;">No on-the-day requests and post-procedure requests will be accommodated</label>
                </div>
                <div class="col-md-12  mt-3">
                    <div class="label">FOR Consultation, who is your Physician/Doctor? <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <label style="font-size: 0.9em;">We only process requests for doctors who are accredited by your HMO Provider and affiliated with CebuDoc.</label>
                    <textarea type="text" name="consultant" class="c-form1 validation" name="consultation" id="consultation" placeholder="FOR Consultation, who is your Physician/Doctor?" required=""></textarea>
                    
                </div>
                <div class="col-md-12 form-group  mt-3" data-for="Complaint">
                    <label class="form-control-label mbr-fonts-style display-7" for="Complaint">Chief Complaint <label style="font-size: 0.9em;color:red;"> *</label></label>
                    <textarea type="text" class="c-form1 validation" name="complaint"   id="Complaint" placeholder="Chief Complaint" required="" ></textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="label">For Procedure/Diagnostics, please attach your doctor's order/prescription.</div>
                     <label style="font-size: 0.8em;">PRESCRIPTION OF DOCTOR'S REQUEST SHOULD NOT BE MORE THAN 1 MONTH</label>
                    <div class="custom-file mb-3">
                      <input type="file" class="c-form"  id="procedure" multiple  name="procedure[]" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, image/*">

                    </div>
                    
                    <div class="fileerror1" style="color: red;"></div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="label">Insurance Card and Valid ID/Company ID <label style="font-size: 0.9em;color:red;"> *</label></div>
                    <label style="font-size: 0.8em;"></label>
                    <div class="custom-file mb-3">
                      
                      <input type="file" class="c-form validation" id="insurance" multiple  name="insurance[]" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, image/*" required="">
                      <!-- <label class="custom-file-label validation" for="customFile">Choose file</label> -->
                    </div>
                    <div class="fileerror2" style="color: red;"></div>
                </div>
                <div class="input-group-btn "><br><br><br>
                    <button href="" id="submitrequestloa" type="submit" class="btn btn-primary float-right btn-form display-4">SUBMIT FORM</button>
                </div>
                
             </div>
        </form>
    </div>
</section>


<!--  <?php

    if ($_SESSION['read'] == "read") {

       ?>
        <div class="modal fade" id="agreementmodal"  data-backdrop="static" data-keyboard="false">
       <?php
    }else{
        ?>
         
       <?php
    }
    ?> -->
<div class="modal fade" id="agreementmodal"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header p-2">
        <h4 class="modal-title p-1">OUT PATIENT LOA REQUEST</h4>
        <button type="button" class="close" data-dismiss="modal" id="closemodals" aria-label="Close">
          <span aria-hidden="true">&times;</label>
        </button>
      </div>
        <div class="modal-body">
            <div class="row justify-content-center" id="agreement"  style="height: 700px;overflow-y: scroll;">
                <div class="title col-12 col-lg-12">
                <div class="block-text mbr-fonts-style display-7">
                   As part of our NEW NORMAL efforts, you can now avail of our ONLINE Letter of Authorization (LOA) Request for Outpatient Consultation and Procedures that you wish to avail from our Hospital. 
                     <br><br>
                    Before you proceed, please take note of the following guidelines:
                    <ol>
                        <li class="p-2">
                            Only selected HMOs are participating in this initiative which list is available under the HMO Provider Section. If your HMO Provider is not participating, please visit our office from 8 AM - 5 PM (Mondays to Saturdays).
                        </li>
                        <li class="p-2">
                            Please plan and schedule your visit ahead. Since our outpatient centers and doctors' clinics are usually booked by appointment, please schedule your visit ahead and make your LOA request online at least 1 day prior to your visit. No on-the-day requests and post-procedure requests will be accommodated in this channel. On-the-day approval is only available in our HMO Concierge.
                        </li>

                        <li class="p-2">
                            For consultations, we will only process Online LOA requests for doctors who are accredited by your HMO Provider and affiliated with CebuDoc. Otherwise, your request will not be processed and you will have to send another request again.

                        </li>

                        <li class="p-2">
                           For procedures, your doctor's prescription or order that you will attach in this form should not be dated with more than 1 month on the date of online request. Otherwise, your request will not be processed unless you have a new request from your physician.
                        </li>

                        <li class="p-2">
                           This form can be accessed at any time of the day but since our office hours are only from  8 AM to 5 PM (Mondays to Fridays) please bear with us if our team cannot respond to your requests immediately. But we will make sure that your requests will be attended within our office hours. Requests after 4 PM will be processed the following business day.
                        </li>

                    </ol>

                    <div class="block-text mbr-fonts-style display-7"> <strong>Data Privacy Policy:</strong></div>

                    The CebuDoc Group recognizes and follows its responsibilities with regard to the Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012, with respect to the data from online users that it will collect, record, organize, update, use, consolidate or destroy. The personal data obtained from this portal is entered and stored within the hospital’s information system and will only be accessed by the CebuDoc Group authorized personnel. The CebuDoc Group has instituted appropriate organizational, technical, and physical security measures to ensure the protection of online users' data. Furthermore, the information collected and stored in the portal shall only be used for the purpose of processing the information necessary for this online request. <br><br>

                    <div class="mt-6 block-text mbr-fonts-style display-7"> <strong> User Consent:</strong></div>

                    I have read the CebuDoc Group's Data Privacy Statement and express my consent for the CebuDoc Group to collect, record, organize, retrieve, consult, use, consolidate, erase or destroy my personal data as part of my information. I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.<br><br>

                    We hope that you have carefully read every item in the guidelines, data privacy policy, and user consent. Should you wish to proceed and engage, please input your email address as an affirmation to agree on the guidelines, data privacy policy, and user consent mentioned above
                </div>
            </div>
         </div>
        </div>
        <div class="modal-footer p-0">
           <!-- <form action="<?php echo base_url();?>contact/readappointment" method="post">
               <button id="closeBtn" style="width: 100px;color: white;" type="submit" class="btn btn-primary p-1" aria-hidden="true" >I Accept</button>
           </form> -->
           <div class="col-sm-12">
              <!-- checkbox -->
              <div class="form-group  pt-2">
                <div class="custom-control custom-checkbox" >
                  <input class="custom-control-input" type="checkbox" id="customCheckbox2">
                  <label for="customCheckbox2" class="custom-control-label">I agree to the Privacy Policy</label>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="sending"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 250px;border: none;">
        <div class="modal-body">
             <center>
                 <div id="loading"></div>
                  <div><h4 id="statuss">SENDING....</h4></div>
             </center>
         </div>
        </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
    var uploadField = document.getElementById("procedure");
    var insurance = document.getElementById("insurance");
    uploadField.onchange = function() {
        if (this.files[0].size > 69000000) {
            alert("100 MB Maximum file size required!");
             this.value = "";
        }else{
            if(this.files.length > 5 ){
               this.value = "";
               $(".fileerror1").html("*5 Maximum number of files required");
            }else{
               $(".fileerror1").html("");
            }
        }
    };
    insurance.onchange = function() {
         if (this.files[0].size > 69000000) {
            alert(" 100 MB Maximum file size required!");
             this.value = "";
        }else{
            if(this.files.length > 5 ){
               this.value = "";
               $(".fileerror2").html("*5 Maximum number of files required");
            }else{
               $(".fileerror2").html("");

            }
        }
    };

  </script>