<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    /*background-color: #ccc;*/
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>

<!--ADMINISTRATIVE PROFESSIONALS-->
<section class="mbr-section content5 cid-default-banner" id="content5-5i">

    

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container-fluid">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Healthcare Professionals</h2>
            </div>
        </div>
    </div>
</section>


<section class="mbr-section article content1 cid-content-title" id="content1-5j">
    
    <div class="container">
            <div>
                <ul class="nav nav-tabs d-flex justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#QUOTE" hidden="" role="tab" data-toggle="tab">QUOTE</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mbr-fonts-style display-8" href="#CDUH" role="tab" data-toggle="tab"><strong><span style="color: #585858;">cebu</span><span style="color: #107dac;">doc</span></strong></a>
                    </li>
  
                    <li class="nav-item">
                        <a class="nav-link mbr-fonts-style display-8" href="#MDH" role="tab" data-toggle="tab"><strong><span style="color: #585858;">mactan</span><span style="color: #107dac;">doc</span></strong></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link mbr-fonts-style display-8" href="#SCDH" role="tab" data-toggle="tab"><strong><span style="color: #585858;">sancarlos</span><span style="color: #107dac;">doc</span></strong></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mbr-fonts-style display-8" href="#ODH" role="tab" data-toggle="tab"><strong><span style="color: #585858;">ormoc</span><span style="color: #107dac;">doc</span></strong></a>
                    </li>
  
                    <li class="nav-item">
                        <a class="nav-link mbr-fonts-style display-8" href="#SGH" role="tab" data-toggle="tab"><strong><span style="color: #585858;">south</span><span style="color: #107dac;">gen</span></strong></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link mbr-fonts-style display-8" href="#NGH" role="tab" data-toggle="tab"><strong><span style="color: #585858;">north</span><span style="color: #107dac;">gen</span></strong></a>
                    </li>
                </ul>



                <!-- Tab panes -->
                <div class="tab-content">
                    <!--QUOTE-->
                    <div role="tabpanel" class="tab-pane animated zoomIn active" id="QUOTE">
                        <div class="alert alert-info">
                            <h5><strong>Choose a job you love, and you will never have to work a day in your life.</strong></h5><br />
                            <p class="mbr-fonts-style display-7 text-right"><em>-Confucius</em></p>
                        </div>
                    </div>
                    <!--END QUOTE-->

                    <!--CDUH-->
                    <div role="tabpanel" class="tab-pane fade" id="CDUH">
                        <br />
                        <h4 class="hospitaltitle">CEBU DOCTORS' UNIVERSITY HOSPITAL</h4>
                        <?php foreach($cduhcareers as $row): ?>
                            <hr/>
                        <button class="accordion"><i class="far fa-hand-point-right"></i> <?php echo $row->title; ?></button>
                            <div class="panel">
                                <font class="text-primary"><strong>Qualifications</strong></font>
                                <?php echo $row->description; ?>
                                <?php $timestamp = strtotime($row->date);?>
                                <?php $date = date("F d, Y", $timestamp); ?>
                                <small class="text-danger"><strong>Posted On: </strong><?php echo $date; ?></small>
                            </div>

                        <?php endforeach; ?>
                        <?php if(!$cduhcareers): ?>
                            <div class="alert alert-warning text-center"><strong>*** List of hiring will be posted SOON ***</strong></div>
                        <?php endif;?>
                        <hr />
                        <div class="alert alert-info">
                            <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
                            <strong>Walk-in :</strong> HR Office is located at the 2/F of Admin Bldg. (at the back of the hospital, across Emergency)<br />
                            <br />
                            Or Email: <a href="mailto:hr@cebudocgroup.com" style="color: khaki;">hr@cebudocgroup.com</a><br />
                            <br />
                            For inquiries kindly contact Samantha through this number<br />
                            <strong>(032) 255-5555 loc. 615</strong>
                        </div>
                    </div>
                    <!--END CDUH-->

                    <!--MDH-->
                    <div role="tabpanel" class="tab-pane fade" id="MDH">
                        <br />
                        <h4 class="hospitaltitle" class="hospitaltitle">MACTAN DOCTORS HOSPITAL</h4>
                        <?php foreach($mdhcareers as $row): ?>
                            <hr/>
                        <button class="accordion"><i class="far fa-hand-point-right"></i> <?php echo $row->title; ?></button>
                            <div class="panel">
                                <font class="text-primary"><strong>Qualifications</strong></font>
                                <?php echo $row->description; ?>
                                <?php $timestamp = strtotime($row->date);?>
                                <?php $date = date("F d, Y", $timestamp); ?>
                                <small class="text-danger"><strong>Posted On: </strong><?php echo $date; ?></small>
                            </div>

                        <?php endforeach; ?>
                        <?php if(!$mdhcareers): ?>
                            <div class="alert alert-warning text-center"><strong>*** List of hiring will be posted SOON ***</strong></div>
                        <?php endif;?>
                        <hr />
                        <div class="alert alert-info">
                            <strong>PRELIMINARY REQUIREMENTS:</strong>
                            <ol>

                                <li>Application Letter</li>
                                    <p class="center"><strong>*** PLEASE INDICATE THE HOSPITAL AND POSITION YOU ARE APPLYING FOR ***</strong></p>
                                <li>Resume with 2x2 picture</li>
                                <li>Photocopy of :
                                    <ul class="text-white">
                                        <li>a. Transcript of Records</li>
                                        <li>b. Board Rating Result, Certificate and PRC ID <em>(if applicable)</em></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>  
                        <div class="alert alert-info">
                            <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
                            <strong>Walk-in :</strong> <br />
                            Human Resource Department <br />
                            Mactan Doctors' Hospital <br />
                            Basak, Lapu-Lapu City, Cebu
                            <br /><br />
                            Or Email: <a href="mailto:mactan_doctors@yahoo.com.ph" style="color: khaki;">mactan_doctors@yahoo.com.ph</a><br />
                            <br />
                            For inquiries kindly contact
                            <strong>(032) 236-0000</strong>
                        </div>
                    </div>
                    <!--END MDH-->

                    <!--SCDH-->
                    <div role="tabpanel" class="tab-pane fade" id="SCDH">
                        <br />
                        <h4 class="hospitaltitle">SAN CARLOS DOCTORS HOSPITAL</h4>
                        <?php foreach($scdhcareers as $row): ?>
                            <hr/>
                        <button class="accordion"><i class="far fa-hand-point-right"></i> <?php echo $row->title; ?></button>
                            <div class="panel">
                                <font class="text-primary"><strong>Qualifications</strong></font>
                                <?php echo $row->description; ?>
                                <?php $timestamp = strtotime($row->date);?>
                                <?php $date = date("F d, Y", $timestamp); ?>
                                <small class="text-danger"><strong>Posted On: </strong><?php echo $date; ?></small>
                            </div>

                        <?php endforeach; ?>
                        <?php if(!$scdhcareers): ?>
                            <div class="alert alert-warning text-center"><strong>*** List of hiring will be posted SOON ***</strong></div>
                        <?php endif;?>
                        <hr />
                        <div class="alert alert-info">
                            <strong>PRELIMINARY REQUIREMENTS:</strong>
                            <ol>

                                <li>Application Letter</li>
                                    <p class="center"><strong>*** PLEASE INDICATE THE HOSPITAL AND POSITION YOU ARE APPLYING FOR ***</strong></p>
                                <li>Resume with 2x2 picture</li>
                                <li>Photocopy of :
                                    <ul class="text-white">
                                        <li>a. Transcript of Records</li>
                                        <li>b. Board Rating Result, Certificate and PRC ID <em>(if applicable)</em></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>  
                        <div class="alert alert-info">
                            <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
                            <strong>Walk-in :</strong> <br />
                            Human Resource Department <br />
                            San Carlos Doctors' Hospital <br />
                            San Carlos City, Negros Occidental
                            <br /><br />
                            Or Email: <a href="mailto:j_francisco006@yahoo.com.ph" style="color: khaki;">j_francisco006@yahoo.com.ph</a><br />
                            <br />
                            For inquiries kindly contact
                            <strong>(034) 729-4888 / 729-4048 </strong>
                        </div>
                    </div>
                    <!--END SCDH-->

                    <!--ODH-->
                    <div role="tabpanel" class="tab-pane fade" id="ODH">
                        <br />
                        <h4 class="hospitaltitle">ORMOC DOCTORS HOSPITAL</h4>
                        <?php foreach($odhcareers as $row): ?>
                            <hr/>
                        <button class="accordion"><i class="far fa-hand-point-right"></i> <?php echo $row->title; ?></button>
                            <div class="panel">
                                <font class="text-primary"><strong>Qualifications</strong></font>
                                <?php echo $row->description; ?>
                                <?php $timestamp = strtotime($row->date);?>
                                <?php $date = date("F d, Y", $timestamp); ?>
                                <small class="text-danger"><strong>Posted On: </strong><?php echo $date; ?></small>
                            </div>

                        <?php endforeach; ?>
                        <?php if(!$odhcareers): ?>
                            <div class="alert alert-warning text-center"><strong>*** List of hiring will be posted SOON ***</strong></div>
                        <?php endif;?>
                        <hr />
                        <div class="alert alert-info">
                            <strong>PRELIMINARY REQUIREMENTS:</strong>
                            <ol>

                                <li>Application Letter</li>
                                    <p class="center"><strong>*** PLEASE INDICATE THE HOSPITAL AND POSITION YOU ARE APPLYING FOR ***</strong></p>
                                <li>Resume with 2x2 picture</li>
                                <li>Photocopy of :
                                    <ul class="text-white">
                                        <li>a. Transcript of Records</li>
                                        <li>b. Board Rating Result, Certificate and PRC ID <em>(if applicable)</em></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>  
                        <div class="alert alert-info">
                            <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
                            <strong>Walk-in :</strong> <br />
                            Human Resource Department <br />
                            Ormoc Doctors' Hospital <br />
                            Ormoc City, Leyte
                            <br /><br />
                            Or Email: <a href="mailto:ormocdoc@gmail.com" style="color: khaki;">ormocdoc@gmail.com</a><br />
                            <br />
                            For inquiries kindly contact
                            <strong>(053) 255-3333</strong>
                        </div>
                    </div>
                    <!--END ODH-->

                    <!--SGH-->
                    <div role="tabpanel" class="tab-pane fade" id="SGH">
                        <br />
                        <h4 class="hospitaltitle">SOUTH GENERAL HOSPITAL</h4>
                        <?php foreach($sghcareers as $row): ?>
                            <hr/>
                        <button class="accordion"><i class="far fa-hand-point-right"></i> <?php echo $row->title; ?></button>
                            <div class="panel">
                                <font class="text-primary"><strong>Qualifications</strong></font>
                                <?php echo $row->description; ?>
                                <?php $timestamp = strtotime($row->date);?>
                                <?php $date = date("F d, Y", $timestamp); ?>
                                <small class="text-danger"><strong>Posted On: </strong><?php echo $date; ?></small>
                            </div>

                        <?php endforeach; ?>
                        <?php if(!$sghcareers): ?>
                            <div class="alert alert-warning text-center"><strong>*** List of hiring will be posted SOON ***</strong></div>
                        <?php endif;?>
                        <hr />
                        <div class="alert alert-info">
                            <strong>PRELIMINARY REQUIREMENTS:</strong>
                            <ol>

                                <li>Application Letter</li>
                                    <p class="center"><strong>*** PLEASE INDICATE THE HOSPITAL AND POSITION YOU ARE APPLYING FOR ***</strong></p>
                                <li>Resume with 2x2 picture</li>
                                <li>Photocopy of :
                                    <ul class="text-white">
                                        <li>a. Transcript of Records</li>
                                        <li>b. Board Rating Result, Certificate and PRC ID <em>(if applicable)</em></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>  
                        <div class="alert alert-info">
                            <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
                            <strong>Walk-in :</strong> <br />
                            Human Resource Department <br />
                            South General Hospital <br />
                            Tuyan, Naga, Cebu
                            <br /><br />
                            Or Email: <a href="mailto:sghhrc_021712@yahoo.com.ph" style="color: khaki;">sghhrc_021712@yahoo.com.ph</a><br />
                            <br />
                            For inquiries kindly contact
                            <strong>(032) 272-2222</strong>
                        </div>
                    </div>
                    <!--END SGH-->

                    <!--NGH-->
                    <div role="tabpanel" class="tab-pane fade" id="NGH">
                        <br />
                        <h4 class="hospitaltitle">NORTH GENERAL HOSPITAL</h4>
                        <!--h4>NORTH GENERAL HOSPITAL</h4>
                        <?php foreach($nghcareers as $row): ?>
                            <hr/>
                        <button class="accordion"><i class="far fa-hand-point-right"></i> <?php echo $row->title; ?></button>
                            <div class="panel">
                                <font class="text-primary"><strong>Qualifications</strong></font>
                                <?php echo $row->description; ?>
                                <?php $timestamp = strtotime($row->date);?>
                                <?php $date = date("F d, Y", $timestamp); ?>
                                <small class="text-danger"><strong>Posted On: </strong><?php echo $date; ?></small>
                            </div>

                        <?php endforeach; ?>
                        <?php if(!$nghcareers): ?>
                            <div class="alert alert-warning text-center"><strong>*** List of hiring will be posted SOON ***</strong></div>
                        <?php endif;?>
                        <hr /-->
                        <div class="media-container-row pb-5">
                            <div class="mbr-figure" style="width: 40%; box-shadow: 5px 8px 2px 0px gray">
                                <img src="<?php echo base_url(); ?>assets/images/ngh_careers/healthcare020619.jpg">
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <strong>PRELIMINARY REQUIREMENTS:</strong>
                            <ol>

                                <li>Application Letter</li>
                                    <p class="center"><strong>*** PLEASE INDICATE THE HOSPITAL AND POSITION YOU ARE APPLYING FOR ***</strong></p>
                                <li>Resume with 2x2 picture</li>
                                <li>Photocopy of :
                                    <ul class="text-white">
                                        <li>a. Transcript of Records</li>
                                        <li>b. Board Rating Result, Certificate and PRC ID <em>(if applicable)</em></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                        
                        <div class="alert alert-info">
                            <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
                            <strong>Walk-in :</strong> <br />
                            Human Resource Department <br />
                            North General Hospital <br />
                            Kauswagan Road, Talamban, Cebu City, Cebu
                            <br /><br />
                            Or Email: <a href="mailto:cngh.hrd@gmail.com" style="color: khaki;">cngh.hrd@gmail.com</a><br />
                            <br />
                            For inquiries kindly contact
                            <strong>(032) 343-7777 local 122 | +63 932 345 7550</strong>
                        </div>
                    </div>
                    <!--END NGH-->
                </div>

<!--
<section class="mbr-section article content9 cid-default-address" id="content9-53">
    <div class="alert alert-info">
    <h5><strong>Choose a job you love, and you will never have to work a day in your life.</strong></h5><br />
    <p class="text-right"><em>-Confucius</em></p>
    </div>
</section>

<section class="mbr-section article content9 cid-default-address" id="content9-53">
    <div class="alert alert-info">
    <strong>KINDLY SEND THE REQUIREMENTS THROUGH:</strong><br />
    <strong>Walk-in :</strong> HR Office is located at the 2/F of Admin Bldg. (at the back of the hospital, across Emergency)<br />
    <br />
    Or Email: <a href="mailto:hr@cebudocgroup.com" style="color: khaki;">hr@cebudocgroup.com</a><br />
    <br />
    For inquiries kindly contact Jasmine through this number<br />
    <strong>(032) 255-5555 loc. 615</strong>
    </div>
</section>
-->

            </div>
    </div>
</section>
<!--END ADMINISTRATIVE PROFESSIONALS-->

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
