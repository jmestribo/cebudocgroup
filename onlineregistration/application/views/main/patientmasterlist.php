      <div class="tab-content" id="custom-content-below-tabContent" >
          <div class="tab-pane Lists p-2" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab" >
            <div class="row">
              <div class=" col-lg-2">
                <form id="searchpcrtestform" >
                  <div class="col-lg-12">
                    <div class="">
                      <label class="text-uppercase ml-2 mt-1">Search Patient</label> 
                    </div>
                    <div class="col-lg-12 mb-1">
                      <div class="text-sm">LASTNAME</div>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="lastname" style="text-transform: uppercase;">
                      </div>
                    </div>
                    <div class="col-lg-12 mb-1">
                      <div class="text-sm">FIRSTNAME</div>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="firstname" style="text-transform: uppercase;">
                      </div>
                    </div>
                    <div class="col-lg-12 mb-1">
                      <div class="text-sm">MIDDLENAME</div>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="middlename" style="text-transform: uppercase;">
                      </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                      <button class="btn btn-primary btn-sm btn-block" type="submit"><span class="fas fa-search "> SEARCH</span></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-10 p-2">
                  <div class="card-body p-0">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

                      <li class="nav-item text-sm text-uppercase">
                        <a class="nav-link pending-request"  href="<?php echo base_url();?>PatientInformation/Lists/pending-request" aria-selected="true"><span class="fas fa-list"></span> PENDING REQUEST</a>
                      </li>
                      <li class="nav-item text-sm text-uppercase">
                        <a class="nav-link draft"  href="<?php echo base_url();?>PatientInformation/Lists/draft" aria-selected="false"> <span class="fas fa-list"></span> CONFIRMED</a>
                      </li>
                      <li class="nav-item text-sm text-uppercase">
                        <a class="nav-link unverified"  href="<?php echo base_url();?>PatientInformation/Lists/unverified" aria-selected="false"> <span class="fas fa-list"></span> UNCONFIRM</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card mt-3" style="width: 100%;">
                     <div class="row p-0">
                        <div class="col-lg-3">
                           <div class="input-group input-group-sm p-2">
                              <div class="text-sm  p-1 mr-1">SELECT DATE </div>
                              <input type="date" class="form-control" id="searchdate" style="text-transform: uppercase;">
                           </div>
                        </div>
                       <!--  <div class="col-lg-3">
                           <div class="input-group input-group-sm p-2">
                              <div class="text-sm  p-1 mr-1">SELECT TIME</div>
                              <input type="time" class="form-control" id="searchtime" style="text-transform: uppercase;">
                           </div>
                        </div> -->
                        <div class="col-lg-2 p-2">
                          <button class="btn btn-primary btn-sm" id="printpatientlist" >PRINT</button>
                        </div>
                     </div>
                    </div>
                  <div class="tab-content" id="custom-content-below-tabContent1" style="height: 89vh; overflow-y: auto;">
                     <div class="tab-pane pending-request fade" style="">
                        <div class="p-2" style="padding:1px;width:100%; height: 85vh; background-color: gray; overflow-y: auto;" >
                          <table class="table table-sm text-uppercase table-hover table-bordered table-striped" style="width: 120vw; background-color: white; ">
                            <thead>
                              <tr class="text-left text-sm">
                                <th style="width: 1vw !important;" >#</th>
                                <th style="width: 7vw !important;" >DATE</th>
                                <th style="width: 4vw !important;" >TIME</th>
                                <th style="width: 9vw !important;" >Firstname</th>
                                <th style="width: 9vw !important;" >Middlename</th>
                                <th style="width: 9vw !important;" >Lastname</th>
                                 <?php
                                  if ($_SESSION['department'] == "cashier") {
                                    ?>
                                      <th style="width: 2vw !important;" >ATTACHMENT</th>
                                    <?php
                                  }
                                ?>
                              
                                <th style="width: 5vw !important;" >DateofBirth</th>
                                <th style="width: 5vw !important;" >Email</th>
                                <th style="width: 2vw !important;" >Age</th>
                                <th style="width: 2vw !important;" >Gender</th>
                               
                                <th style="width: 5vw !important;" >Remarks</th>
                                <th style="width: 12vw !important;" >Date Created</th>
                              </tr>
                            </thead>
                            <tbody class="text-sm pcrtesttbody">
                            <?php 
                                echo $this->get->getallpendingpatient('0');
                             ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane draft fade">
                        <div class="p-2" style="padding:1px;width:100%; height: 85vh;background-color: gray; overflow-y: auto;" >
                          
                          <table class="table table-sm text-uppercase table-hover table-bordered table-striped" style="width: 120vw;background-color: white; ">
                            <thead>
                              <tr class="text-left text-sm">
                                <th style="width: 1vw !important;" >#</th>
                                <th style="width: 7vw !important;" >DATE</th>
                                <th style="width: 4vw !important;" >TIME</th>
                                <th style="width: 9vw !important;" >Firstname</th>
                                <th style="width: 9vw !important;" >Middlename</th>
                                <th style="width: 9vw !important;" >Lastname</th>
                                <?php
                                  if ($_SESSION['department'] == "cashier") {
                                    ?>
                                      <th style="width: 2vw !important;" >ATTACHMENT</th>
                                    <?php
                                  }
                                ?>
                                <th style="width: 5vw !important;" >DateofBirth</th>
                                <th style="width: 2vw !important;" >Age</th>
                                <th style="width: 2vw !important;" >Gender</th>
                                 
                                <th style="width: 5vw !important;" >Remarks</th>
                                <th style="width: 12vw !important;" >Date Created</th>
                              </tr>
                            </thead>
                            <tbody id="" class="text-sm pcrtesttbody">
                            <?php 
                                echo $this->get->getallpatientschedulepaid('1');
                             ?>
                          </table>
                        </div>
                      </div>

                       <div class="tab-pane unverified fade">
                        <div class="p-2" style="padding:1px;width:100%; height: 85vh;background-color: gray; overflow-y: auto;" >
                          
                          <table class="table table-sm text-uppercase table-hover table-bordered table-striped" style="width: 120vw;background-color: white; ">
                            <thead>
                              <tr class="text-left text-sm">
                                <th style="width: 1vw !important;" >#</th>
                                <th style="width: 7vw !important;" >DATE</th>
                                <th style="width: 4vw !important;" >TIME</th>
                                <th style="width: 9vw !important;" >Firstname</th>
                                <th style="width: 9vw !important;" >Middlename</th>
                                <th style="width: 9vw !important;" >Lastname</th>
                                <?php
                                  if ($_SESSION['department'] == "cashier") {
                                    ?>
                                      <th style="width: 2vw !important;" >ATTACHMENT</th>
                                    <?php
                                  }
                                ?>
                                <th style="width: 5vw !important;" >DateofBirth</th>
                                <th style="width: 2vw !important;" >Age</th>
                                <th style="width: 2vw !important;" >Gender</th>
                                
                                <th style="width: 5vw !important;" >Remarks</th>
                                <th style="width: 12vw !important;" >Date Created</th>
                              </tr>
                            </thead>
                            <tbody id="" class="text-sm pcrtesttbody">
                            <?php 
                                echo $this->get->getallpatientpaids('0');
                             ?>
                          </table>
                        </div>
                      </div>

                    </div>
                  </div>
             </div>
          </div>
          <div class="tab-pane  Setting fade">
            
            <div class=""><br><br><br><br><br><br><br><br><br>
              <center><h1>Under Construction</h1></center>

              <?php

                  $id = '57';

                 $password1 = $this->encrypt->encode($id);



                 echo $password1;
                 ?>



            </div>  
          </div>
          <div class="tab-pane CreateNew fade">
            <div class=""><br><br><br><br><br><br><br><br><br>
              <center><h1>Under Construction</h1></center>
            </div> 
          </div>
        </div>
      </div>
    </div>
  <div class="modal fade" id="remarksform"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-2">
          <h4 class="modal-title p-1 text-uppercase">PCR Testing Appointment</h4>
          <button type="button" class="close" data-dismiss="modal" id="" aria-label="Close">
            <span aria-hidden="true">&times;</label>
          </button>
        </div>
          <div class="modal-body">
              <div class="container">
                <div class="card  mt-2">
                  <div class="card-body p-3">
                    <form action="<?php echo base_url();?>PatientInformation/submitremarks" method="post">
                      <label>REMARKS</label>
                      <div class="input-group mb-3">
                          <select class="form-control" name="remarks">
                            <option value="">SELECT REMARK</option>
                            <option value="1">PAID</option>
                            <option value="0">UNPAID</option>
                          </select>
                            <input type="hidden" name="schedid" id="remarkssched">
                            <input type="hidden" name="pid" id="remarkspid">
                          </div>
                         <div>
                          <button type="submit" class="btn btn-primary btn-block btn-sm">SUBMIT</button>
                         </div>
                    </form>
                  </div>
                </div>
              </div>

           </div>
          </div>
          <div class="modal-footer p-0">
             <div class="col-sm-12">
              </div>
          </div>
      </div>
    </div>
  </div>