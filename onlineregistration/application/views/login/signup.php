

<div class="login-21">
    <div class="container-fluid">
        <div class="row">
           <div class="col-xl-9 col-lg-7 col-md-12 col-pad-0 bg-img none-992">
                <div class="info">
                   
                </div>
            </div>
            <div class="col-xl-3 col-lg-5 col-md-12 col-pad-0 bg-color-10">
                <div class="form-section">
                   
                    <div class="login-inner-form">
                         <div class="logo">
                           <img src="<?php echo base_url();?>icon/cduh.png" alt="logo">
                         <div>
                         <h4 style="font-size: 1.4em; color: black;">COVID-19 RT-PCR TESTING</h4>
                        <form action="<?php echo base_url();?>Page/createaccount" method="post">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="fname"  placeholder="Enter Name"  autocomplete="off" required ="on">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-edit"></span>
                                </div>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="lname"  placeholder="Last Name"  autocomplete="off" required ="on">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-edit"></span>
                                </div>
                              </div>
                            </div>

                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="idno" placeholder="Enter ID No"  autocomplete="off" required ="on">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                                </div>
                              </div>
                            </div>

                            <div class="input-group mb-3">
                              <input type="password" class="form-control" name="password"   placeholder="Password">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                                </div>
                              </div>
                            </div>

                           <!--  <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        I agree to the<a href="#" class="terms">terms of service</a>
                                    </label>
                                </div>
                            </div> -->
                            <div class="col-12 mb-2 text-danger">
                                <?php if($msg = $this->session->flashdata('response')):?>
                                  <?php echo $msg; ?>
                                <?php endif;?>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" name="login" class="btn-md btn-theme btn-block">CREATE ACCOUNT</button>
                            </div><br>
                            <a href="<?php echo base_url();?>page/signin">BACK TO LOGIN</a>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


