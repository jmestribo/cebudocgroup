

<div class="login-21">
    <div class="container-fluid">
        <div class="row">
           <div class="col-xl-9 col-lg-7 col-md-12 col-pad-0 bg-img none-992">
               
            </div>
              <div class="col-xl-3 col-lg-5 col-md-12 col-pad-0 bg-color-10">
                  <div class="form-section">
                      <div class="login-inner-form">
                         <div class="logo">
                           <img src="<?php echo base_url();?>icon/cduh.png" alt="logo">
                         <div>
                         <h4 style="font-size: 1.4em; color: black;">COVID-19 RT-PCR TESTING</h4>
                       </div>
                      </div>
                        <div id="loading">
                          
                        </div>
                        <form action="<?php echo base_url();?>Page/checkaccount" method="POST">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="idno"  placeholder="ID NO" required ="on">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-edit"></span>
                                </div>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-eye" attrclick="show" id="showpassword"></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 mb-2 text-left text-danger">
                                <?php if($msg = $this->session->flashdata('response')):?>
                                  <?php echo $msg; ?>
                                <?php endif;?>
                            </div>
                            <div class="checkbox clearfix">
                                <a href="<?php echo base_url();?>page/">Forgot Password</a>
                            </div>

                            <div class="form-group mb-2">
                                <button type="submit" name="login" id="login" class="btn-md btn-theme btn-block">LOGIN</button>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $('#showpassword').click(function(){
        var ths = $(this).attr("attrclick");
        if (ths == "show") {
          $("#password").attr("type","text");
          $("#showpassword").attr("attrclick","hide");
        }else{
          $("#password").attr("type","password");
          $("#showpassword").attr("attrclick","show");
        }
    });
   
</script>

