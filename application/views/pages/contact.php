<!--CONTACT-->
<section class="mbr-section content5 cid-default-banner" id="content5-3h">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container-fluid">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    Contact Us</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section form1 cid-qM2t50SQmT" id="form1-3j">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">Thanks for filling out the form!</div>
                    
            <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
            ?>

                    <?php echo form_open('contact/sendMail','class="mbr-form"'); ?>
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" data-form-field="Name" required="" id="name">
                                </div>
                            </div>
                            
                            <div class="col-md-4 multi-horizontal" data-for="phone">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone">Mobile</label>
                                    <input type="number" class="form-control" name="phone" data-form-field="Phone" required="" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email">
                                </div>
                            </div>
                            
                            <div class="col-md-4 multi-horizontal" data-for="subject">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone">Subject</label>
                                    <input type="text" class="form-control" name="subject" data-form-field="Subject" required="" id="subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" data-for="message">
                            <label class="form-control-label mbr-fonts-style display-7" for="message">Message</label>
                            <textarea type="text" class="form-control" name="message" rows="7" data-form-field="Message" required="" id="message"></textarea>
                        </div>
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">SEND FORM</button>
                        </span>
                    </form>
            </div>
        </div>
    </div>
</section>
<!--END CONTACT-->