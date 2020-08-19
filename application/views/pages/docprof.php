<!--DOCTORS`PROFILE-->
<section class="mbr-section content5 cid-default-banner" id="content5-kh">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Doctor's Profile</h2>                         
            </div>
        </div>
    </div>
</section>

<section class="features11 cid-default-profile" id="features11-kl">
    <div class="container">   
        <div class="col-md-12">
            <div class="media-container-row">
                <?php foreach($records as $row): ?>
                <div hidden="" class="mbr-figure" style="width: 40%;">
                    <img src="<?php echo base_url();?>assets/images/default-400x587.png" alt="Profile Picture" title="">
                </div>
                <div class="align-left aside-content">
                    <h2 class="mbr-title pt-2 mbr-fonts-style display-5">Dr. <?=$row->fname;?> <?=$row->mname;?> <?=$row->lname;?></h2>

                    <!-- DETAILED INFORMATION
                    <div style="box-shadow: 0px 1px 10px grey;">
                        <div class="p-3 bg-secondary mbr-bold text-white">               
                                <h5 class="mbr-title pt-2 mbr-fonts-style display-6">Specialty: <?php echo $row->specialization; ?></h5>
                                <h5 class="mbr-title pt-2 mbr-fonts-style display-6">Sub Specialty: <?php echo $row->sub; ?></h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="mbr-fonts-style display-7"><strong>Years of Experience:</strong></td>
                                            <td class="mbr-fonts-style display-7"><?php echo $row->experience; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="mbr-fonts-style display-7"><strong>Medical School:</strong></td>
                                            <td class="mbr-fonts-style display-7"><?php echo $row->school; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="mbr-fonts-style display-7"><strong>Internship:</strong></td>
                                            <td class="mbr-fonts-style display-7"><?php echo $row->internship; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="mbr-fonts-style display-7"><strong>Residency:</strong></td>
                                            <td class="mbr-fonts-style display-7"><?php echo $row->residency; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="mbr-fonts-style display-7"><strong>Board Certification:</strong></td>
                                            <td class="mbr-fonts-style display-7"><?php echo $row->certification; ?></td>
                                        </tr>
                                    </table>
                                <h5 class="mbr-title pt-2 mbr-fonts-style display-6">Contact #: <?php echo $row->contact; ?></h5>
                                <h5 class="mbr-title pt-2 mbr-fonts-style display-6">Room / Clinic: <?php echo $row->room; ?></h5>
                                <h5 class="mbr-title pt-2 mbr-fonts-style display-6">Status: <?php echo ucfirst($row->status); ?></h5>
                        </div>
                    </div>
                    -->
                    <div class="p-3 bg-secondary" style="box-shadow: 0px 1px 10px grey;">              
                        <p class="mbr-title mbr-fonts-style display-7 text-white">
                            Specialty: <?php echo $row->specialization; ?><br>
                            Sub Specialty: <?php echo $row->sub; ?><br>
                            Contact #: <?php echo $row->contact; ?><br>
                            Room / Clinic: <?php echo $row->room; ?><br>
                            Status: <?php echo ucfirst($row->status); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>

            <hr style="border: 1px solid;" />
                <h4 class="mbr-title pt-2 mbr-fonts-style display-5">Schedule</h4>
                <table class="table table-striped">
                    <thead>
                        <th>Day</th>
                        <th>Morning</th>
                        <th>Afternoon</th>
                    </thead>
                    <?php if($schedule){?>
                        <?php foreach($schedule as $sched): ?>
                        <tr>
                            <td><?php echo $sched->day; ?></td>
                            <td><?php echo $sched->morning; ?></td>
                            <td><?php echo $sched->afternoon; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                        <tr>
                            <td colspan="3" class="align-center"><h5>Schedule not set!</h5></td>
                        </tr>
                    <?php } ?>
                </table>

                <div class="card align-center bg-secondary text-white py-3">
                    ** Schedule may be subject to change. Please CONTACT US for confirmation **
                </div>

        </div> 
    </div>          
</section>
<!--END DOCTORS`PROFILE-->
