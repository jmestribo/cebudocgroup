
<?php

      $url = $this->uri->segment(3);
      $url3 = $this->uri->segment(4);

      if ($url != "") {
          $result = $this->create->patientlist($url);

          $firstname = $result->firstname;
          $middlename = $result->middlename;
          $lastname = $result->lastname;
          $dateofBirth = $result->dob;
          $Street = $result->pstreet;
          $municipality = $result->pmunicipality;
          $province = $result->pprovince;
          $region = $result->pregion;
          $sex = $result->gender;
          $age = $result->age;
          $pid = $result->pid;
          $nationality = $result->nationality;
          $civilstatus = $result->civilstatus;
          $occupation = $result->occupation;
          $passportno = $result->passportno;
          $phouseno = $result->phouseno;
          $pstreet = $result->pstreet;
          $pmunicipality = $result->pmunicipality;
          $pprovince = $result->pprovince;
          $pregion = $result->pregion;
          $pphone = $result->pphone;
          $pcellphone = $result->pcellphone;
          $pemail = $result->pemail;
          $chouseno = $result->chouseno;
          $cstreet = $result->cstreet;
          $cmunicipality = $result->cmunicipality;
          $cprovince = $result->cprovince;
          $cregion = $result->cregion;
          $cphone = $result->cphone;
          $ccellphone = $result->ccellphone;
          $cemail = $result->cemail;
          $ofwemployeername = $result->ofwemployeername;
          $ofwoccupation = $result->ofwoccupation;
          $ofwplaceofwork = $result->ofwplaceofwork;
          $ofwhouse = $result->ofwhouse;
          $ofwstreet = $result->ofwstreet;
          $ofwcity = $result->ofwcity;
          $ofwprovince = $result->ofwprovince;
          $ofwcountry = $result->ofwcountry;
          $ofwofficephoneno = $result->ofwofficephoneno;
          $ofwcellphoneno = $result->ofwcellphoneno;

          $resultivn = $this->create->ivmastertlist($url);
          $nameinvestigator =  $resultivn->investigator;
          $dateinvestigate = $resultivn->Interviewdate;
          $travelOtherCountry = $resultivn->travelOtherCountry;
          $portofexit = $resultivn->portofexit;
          $vessel = $resultivn->vessel;
          $vesselno = $resultivn->vesselno;
          $departuredate = $resultivn->departuredate;
          $arrivaldate = $resultivn->arrivaldate;
          $exposebefore14 = $resultivn->exposebefore14;
          $dateofcontact = $resultivn->dateofcontact;
          $placebefore14 = $resultivn->placebefore14;
          $ifyes = $resultivn->ifyes;
          $ifyesdate = $resultivn->ifyesdate;
          $ifyesname1 = $resultivn->ifyesname1;
          $ifyesname2 = $resultivn->ifyesname2;
          $ifyescontactno2 = $resultivn->ifyescontactno2;
          $ifyesname3 = $resultivn->ifyesname3;
          $ifyescontactno3 = $resultivn->ifyescontactno3;
          $ifyesname4 = $resultivn->ifyesname4;
          $ifyesontactno4 = $resultivn->ifyesontactno4;
          $type = "Create";
      }else{
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
          $type = "Create";

      }
    
?>
<!-- action="<?php echo base_url();?>contact/save_laboratorydetails" formtype ="<?php echo $type;?>" method="post" enctype="multipart/form-data" -->
<div class="login-21 p-3"><br><br><br>
  <div class="container">
<div class="card card-primary card-outline p-0">
  <div class="card-body  p-1">
      <div> <br>
       <center><h5>CASE INVESTIGATION FORM</h5></center>
       <center><h3>CORONAVIRUS DISEASE (COVID-19)</h3></center>
      </div> <br>
      <form id="formcaseinvestigation" formtype ="<?php echo $type;?>">
        <div class="row p-3">
           <div class="col-lg-6  mb-3"> 
             <label style="text-transform:uppercase;font-size: 0.8em;" >Disease Reporting Unit/Hospital: </label>
             <div class="input-group">
                <input type="text" class="c-form fcvalidate" name="reportingunithospital" value="Cebu Doctors University Hospital" placeholder=""  readonly="">
                <input type="hidden" class="c-form " name="formtype" value="<?php echo $type;?>">
                <input type="hidden" class="c-form " name="pid" value="<?php echo $pid;?>">
                <!-- <input type="hidden" class="c-form " name="schedid" value="<?php echo $url3;?>"> -->
              </div>
          </div>
           <div class="col-lg-3  mb-3"> 
             <label style="text-transform:uppercase;font-size: 0.8em;" >Name of Investigator : </label>
             <div class="input-group">
                <input type="text" class="c-form fcvalidate" name="investigator" placeholder="" value="<?php echo $nameinvestigator;?>"  readonly=""  >
              </div>
          </div>
          <div class="col-lg-3  mb-3"> 
             <label style="text-transform:uppercase;font-size: 0.8em;" >Date of Interview. : </label>
             <div class="input-group">
                <input type="date" class="c-form fcvalidate" name="Interviewdate" placeholder="" value="" readonly="">
              </div>
          </div>

          <div class="col-lg-12  mb-3">
             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">1. PATIENT PROFILE : </label>
          </div>
          <div class="col-lg-6"> 
            <div class="row">
              <div class="col-lg-12">
                <label style="text-transform:uppercase;font-size: 0.8em;">Name : (Last Name, First Name , Middle Name)</label>
              </div>
               <div class="col-lg-4">
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="lastname" required  value="<?php echo $lastname;?>" placeholder="Last Name" >
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="firstname" required value="<?php echo $firstname;?>" placeholder="First Name" >
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="middlename"   value="<?php echo $middlename;?>"  placeholder="MN" >
                  </div>
               </div>
            </div>
          </div>
          <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Date of Birth : </label>
             <div class="input-group p-0">
                <input type="date" class="c-form fcvalidate" name="dateofBirth" required value="<?php echo $dateofBirth;?>"  placeholder="" >
              </div>
          </div>
          <div class="col-lg-1">
             <label style="text-transform:uppercase;font-size: 0.8em;">Age : </label>

             <div class="input-group ">
                <input type="text" class="c-form fcvalidate" name="age"  required value="<?php echo $age;?>" maxlength="2" placeholder="" >
              </div>
          </div>
           <div class="col-lg-2">
             <label style="text-transform:uppercase;font-size: 0.8em;">Sex : </label>
              <div class="input-group ">
                  <select class="c-form  fcvalidate" name="gender" value="<?php echo $sex;?>"  required>
                     <option ><?php if($sex !=""){ echo $sex;}else{echo "SELECT";}?></option>
                     <option>Male</option>
                     <option>Female</option>
                   </select>
              </div>
          </div>
          <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Occupation : </label>
             <div class="input-group ">
                <input type="text" class="c-form fcvalidate" name="occupation" value="<?php echo $occupation;?>"  placeholder="" >
              </div>
          </div>

          <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Civil Status : </label>

             <div class="input-group ">
                <input type="text" class="c-form fcvalidate" name="civilstatus" value="<?php echo $civilstatus;?>" placeholder="" required>
              </div>
          </div>

          <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Nationality : </label>

             <div class="input-group ">
                <input type="text" class="c-form fcvalidate" name="nationality"  value="<?php echo $nationality;?>" placeholder="" >
              </div>
          </div>

           <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Passport : </label>

             <div class="input-group ">
                <input type="text" class="c-form fcvalidate" name="passportno" value="<?php echo $passportno;?>" placeholder="" >
              </div>
          </div>

          <div class="col-lg-12 mt-3 mb-2">
             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">2. PHILIPPINE RESIDENCE : </label>
          </div>
          <div class="col-lg-12"> 
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-3">
                     <label style="text-transform:uppercase;font-size: 0.8em;">PERMANENT ADDRESS</label>
                  </div>
                </div>
              </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">House No./ Lot / Bldg : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="phouseno" value="<?php echo $phouseno;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Street / Brgy : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pstreet"  value="<?php echo $pstreet;?>" placeholder="Enter..." required >
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Municipality / City : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pmunicipality" value="<?php echo $pmunicipality;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Province : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pprovince" value="<?php echo $pprovince;?>"  placeholder="Enter..." required >
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Region: </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pregion" value="<?php echo $pregion;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Home Phone No. : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pphone"  value="<?php echo $pphone;?>" placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Cellphone No. : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pcellphone"  value="<?php echo $pcellphone;?>" placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Email address : <span class="text-danger">* gmail.com</span></label>
                  <div class="input-group mb-3">
                    <input type="email" class="c-form fcvalidate" name="pemail" value="<?php echo $pemail;?>"  required placeholder="Enter..." >
                  </div>
               </div>
            </div>
          </div>

          <div class="col-lg-12"> 
            <div class="row">
              <div class="col-lg-12">
               <label style="text-transform:uppercase;font-size: 0.8em;">CURRENT ADDRESS</label>
               <div>
                 <span><input type="checkbox" id="sameaddress"> Click to Copy Permanent Address</span>
               </div>
              </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">House No./ Lot / Bldg : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="chouseno"  value="<?php echo $chouseno;?>" placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Street / Brgy : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="cstreet" value="<?php echo $Street;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Municipality / City : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="cmunicipality" value="<?php echo $municipality;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Province : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="cprovince" value="<?php echo $province;?>"  placeholder="Enter..." required >
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Region: </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="cregion" value="<?php echo $region;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Home Phone No. : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="cphone" value="<?php echo $cphone;?>"  placeholder="Enter..." required>
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Work No. : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ccellphone" value="<?php echo $ccellphone;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Other email address : </label>
                  <div class="input-group mb-3">
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
               <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Employer's Name : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwemployeername" value="<?php echo $ofwemployeername;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Occupation : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwoccupation" value="<?php echo $ofwoccupation;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Place of Work : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwplaceofwork"  value="<?php echo $ofwplaceofwork;?>" placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">House No./ Lot / Bldg : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwhouse" value="<?php echo $ofwhouse;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Street / Brgy : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwstreet" value="<?php echo $ofwstreet;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Municipality / City : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwcity" value="<?php echo $ofwcity;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-3">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Province : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwprovince"  value="<?php echo $ofwprovince;?>" placeholder="Enter..." >
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Country: </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwcountry" value="<?php echo $ofwcountry;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Office Phone No. : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwofficephoneno" value="<?php echo $ofwcellphoneno;?>"  placeholder="Enter..." >
                  </div>
               </div>
               <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Cellphone No. : </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="ofwcellphoneno" value="<?php echo $ofwcellphoneno;?>"  placeholder="Enter..." >
                  </div>
               </div>
        
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 mt-3 mb-2">
             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">4. TRAVEL HISTORY : </label>
          </div>
           <div class="col-lg-6">
             <label style="text-transform:uppercase;font-size: 0.8em;">History of travel/visit/work in other countries with a known COVID-19  transmission 14 days before the onset of your signs and sysmptoms </label>
              <div class="input-group mb-3">
                <select class="c-form " id="travelOtherCountry" name="travelOtherCountry">
                  <option ><?php echo $travelOtherCountry;?></option>
                  <option >YES</option>
                  <option >NO</option>
                </select>
              </div>
           </div>
           <div class="col-lg-6 travelOtherCountry">
             <label style="text-transform:uppercase;font-size: 0.8em;">Port (Country ) of Exit : </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="portofexit" value="<?php echo $portofexit;?>"  placeholder="Enter..." >
              </div>
           </div>
           <div class="col-lg-3 travelOtherCountry">
             <label style="text-transform:uppercase;font-size: 0.8em;">Airline / Sea Vessel : </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="vessel" value="<?php echo $vessel;?>"  placeholder="Enter..." >
              </div>
           </div>
           <div class="col-lg-3 travelOtherCountry">
             <label style="text-transform:uppercase;font-size: 0.8em;">Flight / Vessel Number : </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="vesselno" value="<?php echo $vesselno;?>"  placeholder="Enter..." >
              </div>
           </div>
           <div class="col-lg-3 travelOtherCountry">
             <label style="text-transform:uppercase;font-size: 0.8em;">Date of Departure (mm/dd/yyy): </label>
              <div class="input-group mb-3">
                <input type="date" class="c-form fcvalidate" name="departuredate" value="<?php echo $departuredate;?>"  placeholder="Enter..." >
              </div>
           </div>
           <div class="col-lg-3 travelOtherCountry">
             <label style="text-transform:uppercase;font-size: 0.8em;"> Date of Arrival in Philippines: </label>
              <div class="input-group mb-3">
                <input type="date" class="c-form fcvalidate" name="arrivaldate" value="<?php echo $arrivaldate;?>"  placeholder="Enter..." >
              </div>
           </div>
        </div>
    
        <div class="row">
          <div class="col-lg-12 mt-3 mb-2">
             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">5. EXPOSURE HISTORY : </label>
          </div>
           <div class="col-lg-6">
             <label style="text-transform:uppercase;font-size: 0.8em;">History of Exposure to known COVID-19 Case 14 days before the onset of signs and sysmptoms </label>
              <div class="input-group mb-3">
                <select class="c-form " name="exposebefore14">
                  <option ><?php echo $exposebefore14;?></option>
                  <option >YES</option>
                  <option >NO</option>
                  <option >UNKNOWN</option>
                </select>
              </div>
           </div>
           <div class="col-lg-6">
             <label style="text-transform:uppercase;font-size: 0.8em;">If yes: Date of contact with known COVID-19 Case (mm/dd/yyyy) : </label>
              <div class="input-group mb-3 mt-3">
                <input type="date" class="c-form fcvalidate" name="dateofcontact"  value="<?php echo $dateofcontact;?>"  placeholder="Enter..." >
              </div>
           </div>
           <div class="col-lg-6">
             <label style="text-transform:uppercase;font-size: 0.8em;">Have you been in a place with a known COVID-19 transmion 14 days before the onset of signs and symptoms: </label>
              <div class="input-group mb-3">
                <select class="c-form " name="placebefore14">
                  <option ><?php echo $placebefore14;?></option>
                  <option >YES</option>
                  <option >NO</option>
                  <option >UNKNOWN</option>
                </select>
              </div>
               <div class="row ">
                  <div class="col-lg-6">
                     <label> If yes : Place :</label>
                      <div class="input-group mb-3">
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
                  <div  class="col-lg-6">
                     <label>Specify type :</label>
                      <div class="input-group mb-3">
                        <input type="text" class="c-form fcvalidate" name="ifyesname1" value="<?php echo $ifyesname1;?>"  placeholder="Enter..." >
                      </div>
                  </div>
               </div>
               <div class="row ">
                  <div class="col-lg-7">
                     <label>Date when you have been in that place</label>
                      <div class="input-group mb-3">
                        <input type="date" class="c-form fcvalidate" name="ifyesdate"  value="<?php echo $ifyesdate;?>" placeholder="Enter..." >
                      </div>
                  </div>
                  <div  class="col-lg-5">
                     <label>Name of the place :</label>
                      <div class="input-group mb-3">
                        <input type="text" class="c-form fcvalidate" name="ifyesname2" value="<?php echo $ifyesname2;?>"  placeholder="Enter..." >
                      </div>
                  </div>
               </div>
           </div>
            <div class="col-lg-6">
             <label style="text-transform:uppercase;font-size: 0.8em;">List the names of persons who were with you during this (these) occasion(s) and their contact numbers User the back part of this sheet when needed </label>
             <div class="row">
               <div class="col-lg-6">
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
               <div class="col-lg-6">
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
      
       <!--  <div class="row">
          <div class="col-lg-12 mt-3 mb-2">
             <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">6. CLINICAL INFORMATION : </label>
          </div>
           <div class="col-lg-4">
             <label style="text-transform:uppercase;font-size: 0.8em;">Disposition at Time of Report </label>
              <div class="input-group mb-3">
                <select class="c-form " name="Disposition" readonly="">
                  <option >SELECT</option>
                  <option >Inpatient</option>
                  <option >Outpatient</option>
                  <option >Discharged</option>
                  <option >Died</option>
                  <option >Unknown</option>
                </select>
              </div>
           </div>
           <div class="col-lg-4">
             <label style="text-transform:uppercase;font-size: 0.8em;">Date of Onset of illness (mm/dd/yyyy) : </label>
              <div class="input-group mb-3">
                <input type="date" class="c-form fcvalidate" name="illnessDate"   placeholder="Enter..."  readonly="">
              </div>
           </div>
           <div class="col-lg-4">
             <label style="text-transform:uppercase;font-size: 0.8em;">Date of Admission / Consultation (mm/dd/yyyy): </label>
              <div class="input-group mb-3">
                <input type="date" class="c-form fcvalidate" name="admissiondate"   placeholder="Enter..."  readonly="" >
              </div>
           </div>
           <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Fever  : </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="fever"   placeholder="Enter..."  readonly="">
              </div>
           </div>
           <div class="col-lg-2">
             <label style="text-transform:uppercase;font-size: 0.8em;">Cough : </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="cough"   placeholder="Enter..."  readonly="">
              </div>
           </div>
           <div class="col-lg-2">
             <label style="text-transform:uppercase;font-size: 0.8em;">Sore throat  </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="sorethroat"   placeholder="Enter..."  readonly="">
              </div>
           </div>
           <div class="col-lg-2">
             <label style="text-transform:uppercase;font-size: 0.8em;">Colds  </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="colds"   placeholder="Enter..."  readonly="">
              </div>
           </div>
          <div class="col-lg-3">
             <label style="text-transform:uppercase;font-size: 0.8em;">Shortness/difficulty of breathing  </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="sob"   placeholder="Enter..."  readonly="">
              </div>
           </div>
        </div> -->
        
       <!--  <div class="row">
           <div class="col-lg-6 ">
             <label style="text-transform:uppercase;font-size: 0.8em;">Other signs/symptoms, specify </label>
              <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="othersign"   placeholder="Enter..."  readonly="">
              </div>
           </div>
           <div class="col-lg-6 ">
              <label style="text-transform:uppercase;font-size: 0.8em;">Is there any history of other illness ? </label>
              <div class="row">
                <div class="col-lg-3">
                  <div class="input-group mb-3">
                     <select class="c-form " name="historyillness" readonly="">
                      <option >SELECT</option>
                      <option >YES</option>
                      <option >No</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="historyspecify"   placeholder="Specify" readonly="">
                  </div>
                </div>
              </div>
           </div>

           <div class="col-lg-4">
             <label style="text-transform:uppercase;font-size: 0.8em;">Chest X-ray done?  </label>
               <div class="row">
                <div class="col-lg-4">
                  <div class="input-group mb-3">
                     <select class="c-form " name="isxray" readonly="">
                      <option >SELECT</option>
                      <option >YES</option>
                      <option >No</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="xwhen"   placeholder="If Yes When?" readonly="">
                  </div>
                </div>
              </div>
           </div>
           <div class="col-lg-4">
              <label style="text-transform:uppercase;font-size: 0.8em;">Are you pregnant ?  </label>
               <div class="row">
                <div class="col-lg-12">
                  <div class="input-group mb-3">
                    <select class="c-form " name="ispregnant">
                      <option >SELECT</option>
                      <option >YES</option>
                      <option >No</option>
                    </select>
                  </div>
                </div> -->
             
           <!--    </div>
           </div>
           <div class="col-lg-4">
               <div class="row">
                <div class="col-lg-4">
                  <label style="text-transform:uppercase;font-size: 0.8em;">LMP</label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="pregnantLMP"   placeholder="Specify" >
                  </div>
                </div>
                <div class="col-lg-8">
                   <label style="text-transform:uppercase;font-size: 0.8em;">Assessed as High Risk?</label>
                   <div class="input-group mb-3">
                    <select class="c-form " name="ishigrisk" readonly="">
                      <option >SELECT</option>
                      <option >YES</option>
                      <option >No</option>
                    </select>
                  </div>
                </div>
              </div>
           </div>
           <div class="col-lg-12">
               <div class="row">
                <div class="col-lg-3">
                  <label style="text-transform:uppercase;font-size: 0.8em;">CXR Result : Pnemonia   </label>
                  <div class="input-group mb-3">
                     <select class="c-form " name="xraysresult" readonly="">
                      <option >SELECT</option>
                      <option >YES</option>
                      <option >No</option>
                      <option >Pending</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-9">
                  <label style="text-transform:uppercase;font-size: 0.8em;">Other Radiology Findings   </label>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="tab77"   placeholder="Enter..."  readonly="" >
                  </div>
                </div>
              </div>
           </div>
        </div> -->
          
         
       <!--  <div class="row">
              <div class="col-lg-2">
                 <label style="text-transform:uppercase;font-size: 0.8em;" style="text-transform:uppercase;font-size: 0.8em;">Specimen Collected </label><br><br>
                  <div class="row">
                    <div class="col-lg-12 col-md-1">
                      <div class="input-group mb-3">
                       
                        <label style="font-size: 0.8em;">( )  Serum</label>
                       </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-1">
                      <div class="input-group">
                        <div class="d-flex">
                          
                            <label style="font-size: 0.8em;"> ( ) Oropharyngeal / Nasopharyngeal swab</label>
                        </div>
                       </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-1">
                      <div class="input-group">
                       
                        <label style="font-size: 0.8em;">( ) Others</label>
                       </div>
                    </div> 
                  </div>
               </div>

              <div class="col-lg-2">
                 <label style="text-transform:uppercase;font-size: 0.8em;" >if YES, Date Collected </label><br><br>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="serumdate"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="swabdate"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="otherdate"   placeholder="Enter..."  readonly="">
                  </div>
               </div>

              <div class="col-lg-2">
                 <label style="text-transform:uppercase;font-size: 0.8em;" >Date Sent RITM Collected </label>
                  <div class="input-group mb-3 mt-2">
                    <input type="date" class="c-form fcvalidate" name="serumRITMdate"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="swabRITMdate"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="otherRITMdate"   placeholder="Enter..."  readonly="">
                  </div>
               </div>

              <div class="col-lg-2">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Date Received in RITM (To be filled by RITM)</label>
                  <div class="input-group mb-3 mt-2">
                    <input type="date" class="c-form fcvalidate" name="serumRITMrcvdate"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="swabRITMrcvdate"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="date" class="c-form fcvalidate" name="otherRITMrcvdate"   placeholder="Enter..."  readonly="">
                  </div>
               </div>
               <div class="col-lg-2">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Virus isolation Result</label><br><br>
                 <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="serumresult"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="swabresult"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="otherresult"   placeholder="Enter..."  readonly="">
                  </div>
               </div>
               <div class="col-lg-2">
                 <label style="text-transform:uppercase;font-size: 0.8em;">PCR Result</label>
                 <br><br>
                 <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="serumpcrResult"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="swabpcrResult"   placeholder="Enter..."  readonly="">
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="c-form fcvalidate" name="otherpcrResult"   placeholder="Enter..."  readonly="">
                  </div>
               </div>
            </div> -->
       
         <!-- <div class="row"> -->
           <!--  <div class="col-lg-12  mb-2">
               <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;">8. CLASSIFICATION : </label>
            </div>
            <div class="col-lg-4">
              <div class="input-group mb-3">
                 <select class="c-form " name="classificationresult" readonly="">
                    <option >SELECT</option>
                    <option >SUSPECT CASE</option>
                    <option >Probable Case</option>
                    <option >Comfirmed Case</option>
                  </select>
              </div>
            </div>
          </div> -->
       
          <div class="row ">
             <!--  <div class="col-lg-12  mb-2">
                 <label style="text-transform:uppercase;font-size: 0.8em; color: #4a4af2;"> 9. OUTCOME: </label>
              </div>
              <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">date of discharge (mm/dd/yyyy)  </label>
                    <div class="input-group mb-3">
                      <input type="text" class="c-form fcvalidate" name="dischargedate"   placeholder="Enter..."  readonly="">
                    </div>
              </div>
              <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Condition on Discharge  </label>
                    <div class="input-group mb-3">
                      <select class="c-form " name="dischargecondition" readonly="">
                          <option >SELECT</option>
                          <option >Inpatient</option>
                          <option >Outpatient</option>
                          <option >Discharged</option>
                          <option >Died</option>
                        </select>
                    </div>
              </div>
              <div class="col-lg-4">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Name of informant (If patient not available) </label>
                    <div class="input-group mb-3">
                      <input type="text" class="c-form fcvalidate" name="informant"   placeholder="Enter..."  readonly="">
                    </div>
              </div>
              <div class="col-lg-6 ">
                 <label style="text-transform:uppercase;font-size: 0.8em;">Relationship  </label>
                   <div class="input-group mb-3">
                      <input type="text" class="c-form fcvalidate" name="relationship"   placeholder="Enter..."  readonly="">
                    </div>
              </div>
               <div class="col-lg-6">
               <label style="text-transform:uppercase;font-size: 0.8em;">Phone No.  </label>
               <div class="input-group mb-3">
                <input type="text" class="c-form fcvalidate" name="telno"   placeholder="Enter..."  readonly="">
              </div>
           </div> -->
           <div class="col-lg-12">
             <center>
             
               <?php
               if( $url3 != "") {
                ?>
                  <!-- <a href="<?php echo base_url();?>Download/PrintinvestigationForm/<?php echo $url;?>/"><button type="button" class="btn btn-danger btn-sm">PREVIEW</button> </a> -->
                <?php
               }else{
                ?>
                    <button type="submit" class="btn btn-primary btn-sm">SUBMIT FORM</button> 
                <?php
               }
               ?>
             
            </center>
           </div>
        </div>
      </div>
    </div>
  </div>
  </form>

</div>

<div class="modal fade" id="sending13"  data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 250px;border: none; z-index:7000" >
        <div class="modal-body" style="z-index:  7000;"> 
             <center>
                 <div id="loading13"></div>
                  <div><h4 id="statuss13" class="text-black">Please Wait...</h4></div>
             </center>
         </div>
        </div>
    </div>
  </div>
</div>

