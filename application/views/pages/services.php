
<?php

  $firstname = "";
  $middlename = "";
  $lastname = "";
  $dateofBirth = "";
  $Street = "";
  $municipality = "";
  $province = "";
  $region = "";
  $sex = "";
  $age = "";
  $pid = "";
  $nameinvestigator = "";
  $dateinvestigate = "";
  $occupation = "";
  $civilstatus = "";
  $nationality = "";
  $passportno = "";
  $phouseno = "";
  $pstreet = "";
  $pmunicipality = "";
  $pprovince = "";
  $pregion = "";
  $pphone = "";
  $pcellphone = "";
  $pemail = "";
  $chouseno = "";
  $cstreet = "";
  $cmunicipality = "";
  $cprovince = "";
  $cregion = "";
  $cphone = "";
  $ccellphone = "";
  $cemail = "";
  $ofwemployeername = "";
  $ofwoccupation = "";
  $ofwplaceofwork = "";
  $ofwhouse = "";
  $ofwstreet = "";
  $ofwcity = "";
  $ofwprovince = "";
  $ofwcountry = "";
  $ofwofficephoneno = "";
  $ofwcellphoneno = "";
  $travelOtherCountry = "";
  $portofexit = "";
  $vessel = "";
  $vesselno = "";
  $departuredate = "";
  $arrivaldate = "";
  $exposebefore14 = "";
  $dateofcontact = "";
  $placebefore14 = "";
  $ifyes = "";
  $ifyesdate = "";
  $ifyesname1 = "";
  $ifyesname2 = "";
  $ifyescontactno2 = "";
  $ifyesname3 = "";
  $ifyescontactno3 = "";
  $ifyesname4 = "";
  $ifyesontactno4 = "";
  $type = "create";
      
?>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>custom/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>custom/custom.css">

  <script type="text/javascript" src="<?php echo base_url();?>custom/jquery.js"></script>

  <script type="text/javascript" src="<?php echo base_url();?>custom/bootstrap.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<section class="mbr-section content5 cid-default-banner" id="content5-3h">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container-fluid">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                   RT-PCR TESTING MAKE AN APPOINTMENT</h2>
            </div>
        </div>
    </div>
</section>
  <div class="container">
      <div class="row justify-content-center " >
          <div class="col-11 col-sm-12 col-md-12 col-lg-11 col-xl-11 text-center p-0 mt-3 mb-2 " >
              <div class="card px-0 pt-4 pb-0 mt-3 mb-1">
                  <form id="msform">
                      <!-- progressbar -->
                      <ul id="progressbar">
                          <li class="active" id="choosetype"><strong>Services</strong></li>
                          <li id="choosetime"><strong>Schedule</strong></li>
                          <li id="information"><strong>Information</strong></li>
                          <li id="payment"><strong>Payment</strong></li>
                          <li id="preview"><strong>Summary</strong></li>
                          <li id="confirm"><strong>Confirm</strong></li>
                      </ul>
                      <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                      </div> <br> <!-- fieldsets -->
                      <fieldset>
                          <div class="form-card">
                              <div class="row">
                                  <div class="col-4">
                                      <h2 class="fs-title">SELECT SERVICES</h2>
                                  </div>
                                  <div class="col-4">
                                      <h2 class="fs-title">Process</h2>
                                  </div>
                                  <div class="col-4">
                                      <h2 class="steps">Step 1 - 6</h2>
                                  </div>
                              </div> 
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 ">
                                    <label class="fieldlabels">Select Services: *</label> 
                                    <select class="c-form" name="selectservices" id="selectservices" required>
                                        <option value="">SELECT</option>
                                        <option value="PCRTESTING">PCR TESTING</option>
                                        <option value="OTHER" disabled="">OTHER</option>
                                    </select>
                                </div>
                                 <div class="col-lg-8 col-md-8 col-12 ">
                                   
                                    <div class="col-12">
                                      <ol>
                                        <li> SELECT SERVICES</li>
                                        <li> SELECT SCHEDULE</li>
                                        <li> FILL UP PERSONEL INFORMATION </li>
                                        <li> UPLOAD DEPOSIT SLIP </li>
                                        <li> REVIEW APPOINTMENT</li>
                                        <li> CONFIRMATION</li>
                                     </ol>
                                    </div>
                                </div>
                              </div>
                          </div> 
                          <input type="button" name="next" class="next action-button" attrtype="services" value="Next" />
                      </fieldset>

                      <fieldset>
                          <div class="form-card">
                               <div class="row">
                                   <div class="col-8">
                                    <h2 class="fs-title">SELECT APPOINTMENT</h2>
                                  </div>
                                  <div class="col-4">
                                      <h2 class="steps">Step 2 - 6</h2>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <label>SELECT DATE</label>
                                     <input type="text" name="scheddatepicker" id="scheddatepicker2" class="scheddatepicker21 c-form" autocomplete="off"  placeholder="SELECT DATE">
                                     <label>SELECT TIME</label>
                                     <input type="text" name="schedtime" id="schedtime" class="schedtime1 c-form"  autocomplete="off"  placeholder="SELECT DATE" readonly>
                                  </div>
                                  <div class="col-lg-9 col-md-9">
                                     <div id="dateoption">
                                        <div id="allslots"></div>
                                     </div>
                                  </div>
                              </div>
                          </div> 
                          <input type="button" name="next" class="next action-button btnselectdate" attrtype="selectdate" value="Next" /> 
                          <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                      </fieldset>

                       <fieldset>
                          <div class="form-card">
                               <div class="row">
                                  <div class="col-8">
                                    <h2 class="fs-title">Personal Information:</h2>
                                  </div>
                                   <div class="col-4">
                                   <h2 class="steps">Step 3 - 6</h2>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <ul class="nav nav-tabs">
                                      <li class="nav-item">
                                        <a class="nav-link active" href="#home">Patient Information</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#menu1">Travel History</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#menu2">Exposure History</a>
                                      </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                      <div id="home" class="container tab-pane active"><br>
                                         <div class="row">
                                          <div class="col-lg-12  mb-1">
                                             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">1. PATIENT PROFILE : </label>
                                          </div>
                                          <div class="col-lg-6 col-md-12"> 
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <label style="text-transform:uppercase;font-size: 0.8em;">Name : (Last Name, First Name , Middle Name)</label>
                                              </div>
                                               <div class="col-lg-4">
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="lastname" required  value="<?php echo $lastname;?>" placeholder="Last Name" >
                                                  </div>
                                               </div>
                                               <div class="col-lg-4">
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="firstname" required value="<?php echo $firstname;?>" placeholder="First Name" >
                                                  </div>
                                               </div>
                                               <div class="col-lg-4">
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="middlename"   value="<?php echo $middlename;?>"  placeholder="MN" >
                                                  </div>
                                               </div>
                                            </div>
                                          </div>
                                          <div class="col-lg-3 col-md-3">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Date of Birth : </label>
                                             <div class="input-group p-0">
                                                <input type="date" class="c-form fcvalidate validate" name="dob" required value="<?php echo $dateofBirth;?>"  placeholder="" >
                                              </div>
                                          </div>
                                          <div class="col-lg-1 col-md-2">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Age : </label>
                                             <div class="input-group ">
                                                <input type="text" class="c-form fcvalidate validate" name="age"  required value="<?php echo $age;?>" maxlength="2" placeholder="" >
                                              </div>
                                          </div>
                                           <div class="col-lg-2 col-md-2">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Sex : </label>
                                              <div class="input-group ">
                                                  <select class="c-form  fcvalidate validate" name="gender" value="<?php echo $sex;?>"  required>
                                                     <option ><?php if($sex !=""){ echo $sex;}else{echo "SELECT";}?></option>
                                                     <option>Male</option>
                                                     <option>Female</option>
                                                   </select>
                                              </div>
                                          </div>
                                          <div class="col-lg-3 col-md-3">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Occupation : </label>
                                             <div class="input-group ">
                                                <input type="text" class="c-form fcvalidate" name="occupation" value="<?php echo $occupation;?>"  placeholder="" >
                                              </div>
                                          </div>

                                          <div class="col-lg-3 col-md-3">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Civil Status : </label>

                                             <div class="input-group ">
                                                <input type="text" class="c-form fcvalidate validate" name="civilstatus" value="<?php echo $civilstatus;?>" placeholder="" required>
                                              </div>
                                          </div>

                                          <div class="col-lg-3 col-md-3">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Nationality : </label>

                                             <div class="input-group ">
                                                <input type="text" class="c-form fcvalidate validate" name="nationality"  value="<?php echo $nationality;?>" placeholder="" >
                                              </div>
                                          </div>

                                           <div class="col-lg-3 col-md-3">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Passport : </label>

                                             <div class="input-group ">
                                                <input type="text" class="c-form fcvalidate " name="passportno" value="<?php echo $passportno;?>" placeholder="" >
                                              </div>
                                          </div>

                                          <div class="col-lg-12 mt-3 mb-2">
                                             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">2. PHILIPPINE RESIDENCE : </label>
                                          </div>
                                          <div class="col-lg-12"> 
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-3 col-md-3">
                                                     <label style="text-transform:uppercase;font-size: 0.8em;">PERMANENT ADDRESS</label>
                                                  </div>
                                                </div>
                                              </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">House No./ Lot / Bldg : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="phouseno" value="<?php echo $phouseno;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Street / Brgy : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="pstreet"  value="<?php echo $pstreet;?>" placeholder="Enter..." required >
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Municipality / City : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="pmunicipality" value="<?php echo $pmunicipality;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Province : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="pprovince" value="<?php echo $pprovince;?>"  placeholder="Enter..." required >
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Region: </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="pregion" value="<?php echo $pregion;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Home Phone No. : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="pphone"  value="<?php echo $pphone;?>" placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Cellphone No. : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate validate" name="pcellphone"  value="<?php echo $pcellphone;?>" placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Email address : <span class="text-danger">*</span></label>
                                                  <div class="input-group mb-1">
                                                    <input type="email" class="c-form fcvalidate validate" name="pemail" value="<?php echo $pemail;?>"  required placeholder="Enter..." >
                                                  </div>
                                               </div>
                                            </div>
                                          </div>

                                          <div class="col-lg-12"> 
                                            <div class="row">
                                              <div class="col-lg-12">
                                               <label style="text-transform:uppercase;font-size: 0.8em;">CURRENT ADDRESS</label>
                                               <div class="row">
                                                 <div class="col-lg-1 col-md-1"><input type="checkbox" id="sameaddress"></div>
                                                 <div class="col-lg-9 col-md-9">Click to Copy Permanent Address</div>
                                               </div>
                                              </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">House No./ Lot / Bldg : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="chouseno"  value="<?php echo $chouseno;?>" placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Street / Brgy : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="cstreet" value="<?php echo $Street;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Municipality / City : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="cmunicipality" value="<?php echo $municipality;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Province : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="cprovince" value="<?php echo $province;?>"  placeholder="Enter..." required >
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Region: </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="cregion" value="<?php echo $region;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Home Phone No. : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="cphone" value="<?php echo $cphone;?>"  placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Work No. : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ccellphone" value="<?php echo $ccellphone;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Other email address : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="email" class="c-form fcvalidate" name="cemail" value="<?php echo $cemail;?>"   placeholder="Enter..." required>
                                                  </div>
                                               </div>
                                            </div>
                                          </div>


                                          <div class="col-lg-12"> 
                                            <div class="row">
                                              <div class="col-lg-12 mt-3 mb-2">
                                                 <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">3. ADDRESS OUTSIDE THE PHILIPPINES (for Overseas Filipino Workers and individuals with residence outside the philippines) : </label>
                                              </div>
                                               <div class="col-lg-4 col-md-4">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Employer's Name : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwemployeername" value="<?php echo $ofwemployeername;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-4 col-md-4">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Occupation : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwoccupation" value="<?php echo $ofwoccupation;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-4 col-md-4">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Place of Work : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwplaceofwork"  value="<?php echo $ofwplaceofwork;?>" placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">House No./ Lot / Bldg : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwhouse" value="<?php echo $ofwhouse;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Street / Brgy : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwstreet" value="<?php echo $ofwstreet;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Municipality / City : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwcity" value="<?php echo $ofwcity;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-3 col-md-3">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Province : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwprovince"  value="<?php echo $ofwprovince;?>" placeholder="Enter..." >
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-4 col-md-4">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Country: </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwcountry" value="<?php echo $ofwcountry;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-4 col-md-4">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Office Phone No. : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwofficephoneno" value="<?php echo $ofwcellphoneno;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-4 col-md-4">
                                                 <label style="text-transform:uppercase;font-size: 0.8em;">Cellphone No. : </label>
                                                  <div class="input-group mb-1">
                                                    <input type="text" class="c-form fcvalidate" name="ofwcellphoneno" value="<?php echo $ofwcellphoneno;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                            </div>
                                          </div>
                                       </div>
                                      </div>
                                      <div id="menu1" class="container tab-pane fade"><br>
                                         <div class="row">
                                            <div class="col-lg-12 mt-3 mb-2">
                                               <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">4. TRAVEL HISTORY : </label>
                                            </div>
                                             <div class="col-lg-6 col-md-6">
                                               <label style="text-transform:uppercase;font-size: 0.8em;">History of travel/visit/work in other countries with a known COVID-19  transmission 14 days before the onset of your signs and sysmptoms </label>
                                                <div class="input-group mb-1">
                                                  <select class="c-form " id="travelOtherCountry" name="travelOtherCountry">
                                                    <option ><?php echo $travelOtherCountry;?></option>
                                                    <option >YES</option>
                                                    <option >NO</option>
                                                  </select>
                                                </div>
                                             </div>
                                             <div class="col-lg-6 col-md-6 travelOtherCountry">
                                               <label style="text-transform:uppercase;font-size: 0.8em;">Port (Country ) of Exit : </label>
                                                <div class="input-group mb-1">
                                                  <input type="text" class="c-form fcvalidate" name="portofexit" value="<?php echo $portofexit;?>"  placeholder="Enter..." >
                                                </div>
                                             </div>
                                             <div class="col-lg-3 col-md-3 travelOtherCountry">
                                               <label style="text-transform:uppercase;font-size: 0.8em;">Airline / Sea Vessel : </label>
                                                <div class="input-group mb-1">
                                                  <input type="text" class="c-form fcvalidate" name="vessel" value="<?php echo $vessel;?>"  placeholder="Enter..." >
                                                </div>
                                             </div>
                                             <div class="col-lg-3 col-md-3 travelOtherCountry">
                                               <label style="text-transform:uppercase;font-size: 0.8em;">Flight / Vessel Number : </label>
                                                <div class="input-group mb-1">
                                                  <input type="text" class="c-form fcvalidate" name="vesselno" value="<?php echo $vesselno;?>"  placeholder="Enter..." >
                                                </div>
                                             </div>
                                             <div class="col-lg-3 col-md-3 travelOtherCountry">
                                               <label style="text-transform:uppercase;font-size: 0.8em;">Date of Departure (mm/dd/yyy): </label>
                                                <div class="input-group mb-1">
                                                  <input type="date" class="c-form fcvalidate" name="departuredate" value="<?php echo $departuredate;?>"  placeholder="Enter..." >
                                                </div>
                                             </div>
                                             <div class="col-lg-3 col-md-3 travelOtherCountry">
                                               <label style="text-transform:uppercase;font-size: 0.8em;"> Date of Arrival in Philippines: </label>
                                                <div class="input-group mb-1">
                                                  <input type="date" class="c-form fcvalidate" name="arrivaldate" value="<?php echo $arrivaldate;?>"  placeholder="Enter..." >
                                                </div>
                                             </div>
                                          </div>
                                      </div>
                                      <div id="menu2" class="container tab-pane fade"><br>
                                         <div class="row">
                                          <div class="col-lg-12 mt-3 mb-2">
                                             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">5. EXPOSURE HISTORY : </label>
                                          </div>
                                           <div class="col-lg-6 col-md-6">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">History of Exposure to known COVID-19 Case 14 days before the onset of signs and sysmptoms </label>
                                              <div class="input-group mb-1">
                                                <select class="c-form " name="exposebefore14">
                                                  <option ><?php echo $exposebefore14;?></option>
                                                  <option >YES</option>
                                                  <option >NO</option>
                                                  <option >UNKNOWN</option>
                                                </select>
                                              </div>
                                           </div>
                                           <div class="col-lg-6 col-md-6">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">If yes: Date of contact with known COVID-19 Case (mm/dd/yyyy) : </label>
                                              <div class="input-group mb-1 mt-3">
                                                <input type="date" class="c-form fcvalidate" name="dateofcontact"  value="<?php echo $dateofcontact;?>"  placeholder="Enter..." >
                                              </div>
                                           </div>
                                           <div class="col-lg-6 col-md-6">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">Have you been in a place with a known COVID-19 transmion 14 days before the onset of signs and symptoms: </label>
                                              <div class="input-group mb-1">
                                                <select class="c-form " name="placebefore14">
                                                  <option ><?php echo $placebefore14;?></option>
                                                  <option >YES</option>
                                                  <option >NO</option>
                                                  <option >UNKNOWN</option>
                                                </select>
                                              </div>
                                               <div class="row ">
                                                  <div class="col-lg-6 col-md-6">
                                                     <label> If yes : Place :</label>
                                                      <div class="input-group mb-1">
                                                        <select class="c-form " name="ifyes">
                                                          <option ><?php echo $ifyes;?></option>
                                                          <option >Work Place</option>
                                                          <option >Social Gathering</option>
                                                          <option >Health Facility</option>
                                                          <option >Religious Gathering</option>
                                                          <option >Others</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                                  <div  class="col-lg-6 col-md-6">
                                                     <label>Specify type :</label>
                                                      <div class="input-group mb-1">
                                                        <input type="text" class="c-form fcvalidate" name="ifyesname1" value="<?php echo $ifyesname1;?>"  placeholder="Enter..." >
                                                      </div>
                                                  </div>
                                               </div>
                                               <div class="row ">
                                                  <div class="col-lg-7 col-md-7">
                                                     <label>Date when you have been in that place</label>
                                                      <div class="input-group mb-1">
                                                        <input type="date" class="c-form fcvalidate" name="ifyesdate"  value="<?php echo $ifyesdate;?>" placeholder="Enter..." >
                                                      </div>
                                                  </div>
                                                  <div  class="col-lg-5 col-md-5">
                                                     <label>Name of the place :</label>
                                                      <div class="input-group mb-1">
                                                        <input type="text" class="c-form fcvalidate" name="ifyesname2" value="<?php echo $ifyesname2;?>"  placeholder="Enter..." >
                                                      </div>
                                                  </div>
                                               </div>
                                           </div>
                                          <div class="col-lg-6 col-md-6">
                                             <label style="text-transform:uppercase;font-size: 0.8em;">List the names of persons who were with you during this (these) occasion(s) and their contact numbers User the back part of this sheet when needed </label>
                                             <div class="row">
                                               <div class="col-lg-6 col-md-6">
                                                 <label>Name </label>
                                                  <div class="input-group mb-2">
                                                    <input type="text" class="c-form fcvalidate" name="ifyesname3" value="<?php echo $ifyesname3;?>"  placeholder="Enter..." >
                                                  </div>
                                                  <div class="input-group mb-2">
                                                    <input type="text" class="c-form fcvalidate" name="ifyesname3" value="<?php echo $ifyesname3;?>"   placeholder="Enter..." >
                                                  </div>
                                                  <div class="input-group mb-2">
                                                    <input type="text" class="c-form fcvalidate" name="ifyesname4" value="<?php echo $ifyesname4;?>"  placeholder="Enter..." >
                                                  </div>
                                               </div>
                                               <div class="col-lg-6 col-md-6">
                                                 <label>Contact Number </label>
                                                 <div class="input-group mb-2">
                                                    <input type="text" class="c-form fcvalidate" name="ifyescontactno2" value="<?php echo $ifyescontactno2;?>"  placeholder="Enter..." >
                                                  </div>
                                                  <div class="input-group mb-2">
                                                    <input type="text" class="c-form fcvalidate" name="ifyescontactno3"  value="<?php echo $ifyescontactno3;?>" placeholder="Enter..." >
                                                  </div>
                                                  <div class="input-group mb-2">
                                                    <input type="text" class="c-form fcvalidate" name="ifyesontactno4"  value="<?php echo $ifyesontactno4;?>" placeholder="Enter..." >
                                                  </div>
                                               </div>
                                             </div>
                                           
                                        </div>
                                        
                                      </div>
                                    </div>
                                </div>
                              </div>
                             </div>
                            
                          </div> 
                          <input type="button" name="next" class="next action-button btnpatientinfo" attrtype="patientinfo"  value="Next" /> 
                          <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                      </fieldset>

                      <fieldset>
                          <div class="form-card">
                              <div class="row">
                                  <div class="col-7">
                                      <h2 class="fs-title">ATTACH DEPOSIT SLIP</h2>
                                  </div>
                                  <div class="col-5">
                                      <h2 class="steps">Step 4 - 6</h2>
                                  </div>
                              </div>
                              <label class="fieldlabels">Upload Your Deposit Slip:</label> 
                              <input type="file" id="attachfiles" name="attachfiles" accept="image/*"> 
                              <img class="previewimages" alt="Upload File" width="250px" height="250px" style="border-radius:3px;border:5px solid red;"/>
                          </div> 
                          <input type="button" name="next" id="savepriview" class="next action-button" attrtype="uploadimage"  value="Preview" /> 
                          <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                      </fieldset>
                      <fieldset id="last">
                          <div class="form-card">
                              <div class="row">
                                  <div class="col-7">
                                      <h2 class="fs-title">Review Your Appointment</h2>
                                  </div>
                                  <div class="col-5">
                                      <h2 class="steps">Step 5 - 6</h2>
                                  </div>
                              </div> 
                              <div class="row mains">
                                
                                  <div class="col-lg-12 row">
                                     <div class="row col-lg-12">
                                       <div class="col-lg-8 col-md-8">
                                          <div class="mt-3"><label>Services : </label><span class="selectservices"></span></div>
                                          <div ><label>Date : </label><span class="scheddatepicker2"></span></div>
                                          <div ><label>Time: </label><span class="schedtime"></span></div>
                                       </div>
                                       <div class="col-lg-4 col-md-4 p-3">
                                          <center><img class="previewimages" alt="Uploaded Image Preview Holder" width="160px" height="150px" style="border-radius:3px;border:5px solid red;"/></center>
                                       </div>
                                     </div>
                                    <div class="col-lg-4 col-md-4" style="min-height:100px;">
                                        <div class="panel-primary p-1" style="border-bottom:1px solid #ddd;color:black;padding:5px; font-weight:bolder;background:skyblue;text-transform:uppercase;">Personal Information</div>
                                        <div>
                                         <label>NAME :</label><span class="firstname"></span>, <span class="middlename"></span> <span class="lastname"></span>
                                        </div>
                                        <div ><label>Date of Birth : </label><span class="dob"></span></div>
                                        <div ><label>Gender:</label><span class="gender"></span></div>
                                        <div ><label>Age:</label><span class="age"></span></div>
                                        <div ><label>Nationality:</label><span class="nationality"></span></div>
                                        <div ><label>Civil Status:</label><span class="civilstatus"></span></div>
                                        <div ><label>OCcupation:</label><span class="occupation"></span></div>
                                        <div ><label>Passport No:</label><span class="passportno"></span></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4"  style="min-height:100px;">
                                      <div class="panel-primary p-1" style="border-bottom:1px solid #ddd;color:black;padding:5px; font-weight:bolder;background:skyblue;text-transform:uppercase;">Permanent Address</div>
                                        <div><label>House No:</label><span class="phouseno"></span></div>
                                        <div><label>Street:</label><span class="pstreet"></span></div>
                                        <div><label>Municipality:</label><span class="pmunicipality"></span></div>
                                        <div><label>Province:</label><span class="pprovince"></span></div>
                                        <div><label>Region:</label><span class="pregion"></span></div>
                                        <div><label>Phone No:</label><span class="pphone"></span></div>
                                        <div><label>Cellphone:</label><span class="pcellphone"></span></div>
                                        <div><label>Email:</label><span class="pemail"></span></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4"  style="min-height:100px;">
                                        <div class="panel-primary p-1" style="border-bottom:1px solid #ddd;color:black;padding:5px; font-weight:bolder;background:skyblue;text-transform:uppercase;">Current Address</div>
                                        <div><label>House No:</label><span class="chouseno"></span></div>
                                        <div><label>Street:</label><span class="cstreet"></span></div>
                                        <div><label>Municipality:</label><span class="cmunicipality"></span></div>
                                        <div><label>Province:</label><span class="cprovince"></span></div>
                                        <div><label>Region:</label><span class="cregion"></span></div>
                                        <div><label>Phone No:</label><span class="cphone"></span></div>
                                        <div><label>Cellphone No:</label><span class="ccellphone"></span></div>
                                        <div><label>Other Email :</label><span class="cemail"></span></div> 
                                    </div>
                                     <div class="col-lg-4 col-md-4"  style="min-height:100px;">
                                   
                                        <div class="panel-primary p-1" style="border-bottom:1px solid #ddd;color:black;padding:5px; font-weight:bolder;background:skyblue;text-transform:uppercase;">ADDRESS OUTSIDE THE PHILIPPINES </div>
                                        <div><label>Employer:</label> <span class="ofwemployeername"></span></div>
                                        <div><label>Occupation:</label> <span class="ofwoccupation"></span></div>
                                        <div><label>Place of Work:</label> <span class="ofwplaceofwork"></span></div>
                                        <div><label>House No./ Lot / Bldg :</label> <span class="ofwhouse"></span></div>
                                        <div><label>Street / Brgy:</label> <span class="ofwstreet"></span></div>
                                        <div><label>Municipality / City:</label> <span class="ofwcity"></span></div>
                                        <div><label>Province :</label> <span class="ofwprovince"></span></div>
                                        <div><label>Country:</label> <span class="ofwcountry"></span></div>
                                        <div><label>Office Phone No:</label> <span class="ofwofficephoneno"></span></div>
                                        <div><label>Cellphone No:</label> <span class="ofwcellphoneno"></span></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4"  style="min-height:100px;">
                                        <div class="panel-primary p-1" style="border-bottom:1px solid #ddd;color:black;padding:5px; font-weight:bolder;background:skyblue;text-transform:uppercase;">TRAVEL HISTORY </div>
                                        <div><label>History of travel/visit/work:</label><span class="travelOtherCountry"></span></div>
                                        <div><label>Port (Country ) of Exit:</label><span class="portofexit"></span></div>
                                        <div><label>Airline / Sea Vessel:</label><span class="vessel"></span></div>
                                        <div><label>Flight / Vessel Number:</label><span class="vesselno"></span></div>
                                        <div><label>Date of Departure (mm/dd/yyy):</label><span class="departuredate"></span></div>
                                        <div><label>Date of Arrival in Philippines:</label><span class="arrivaldate"></span></div>
                                      </div>
                                    <div class="col-lg-4 col-md-4"  style="min-height:100px;">
                                        <div class="panel-primary p-1" style="border-bottom:1px solid #ddd;color:black;padding:5px; font-weight:bolder;background:skyblue;text-transform:uppercase;">EXPOSURE HISTORY </div>
                                        <div><label>History of Exposure to known COVID-19 : </label><span class="exposebefore14"></span></div>
                                        <div><label>If yes: Date of contact : </label><span class="dateofcontact"></span></div>
                                        <div><label>Have you been in a place with a known COVID-19: </label><span class="placebefore14"></span></div>
                                        <div>List the names of persons who were with you during this</div>
                                        <div><label>If Yes : </label><span class="ifyes"></span></div>
                                        <div><label>Date when you have been in that place: </label><span class="ifyesdate"></span></div>
                                        <div><label>Name of the place : </label><span class="ifyesname1"></span></div>
                                        <div><label>If Yes Name: </label><span class="ifyesname2"></span></div>
                                        <div><label>If Yes Contact: </label><span class="ifyescontactno2"></span></div>
                                        <div><label>If Yes Name: </label><span class="ifyesname3"></span></div>
                                        <div><label>If Yes Contact: </label><span class="ifyescontactno3"></span></div>
                                        <div><label>If Yes Name : </label><span class="ifyesname4"></span></div>
                                        <div><label>If Yes Contact: </label><span class="ifyesontactno4"></span></div>
                                      </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                  </div>
                              </div>
                          </div> 
                          <input type="button" name="next" class="next action-button" value="Confirm" attrtype="confirm" /> 
                          <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                      </fieldset>
                    
                      <fieldset id="nextfs">
                          <div class="form-card">
                              <div class="row">
                                  <div class="col-7">
                                      <h2 class="fs-title">Finish:</h2>
                                  </div>
                                  <div class="col-5">
                                      <h2 class="steps">Step 6 - 6</h2>
                                  </div>
                              </div> <br><br>
                              <div class="row justify-content-center">
                                 <div class="col-lg-12">
                                   <div id="titlemsg"></div>
                                 </div>
                                  <div class="col-12" >
                                    <center>
                                      <div id="Successfullyimg">
                                        <img src='<?php echo base_url();?>upload/progress.gif' style='height: 20vh'>
                                      </div> 
                                    </center>
                                  </div>
                              </div> <br><br>
                              <div class="row justify-content-center">
                                  <div class="col-7 text-center" id="confirmmsg">
                                      <h5 class="purple-text text-center">Check Your Email For Confirmation of Your Appointment Schedule</h5>
                                  </div>
                              </div>
                          </div>
                      </fieldset>
                  </form>
              </div>
          </div>
      </div>
  </div>

<div class="modal fade" id="confirmation"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 250px;border: none;">
        <div class="modal-body">
           <center>
               <div id="loading"></div>
               <h3><div id="statuss">FINAL CONFIRMATION OF YOUR APPOINTMENT</div></h3>
           </center>
         </div>
         <div class="modal-footer">
          <center>
             <button class="btn btn-danger " id="cancelbtn">CANCEL</button>
             <button class="btn btn-primary" id="submitformregistration">CONFIRM</button>
          </center>
         </div>
    </div>
  </div>
</div>