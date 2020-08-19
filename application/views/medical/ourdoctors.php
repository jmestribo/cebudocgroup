<!--OUR DOCTORS-->

<section class="mbr-section content5 cid-default-banner" id="content5-3b">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">

    </div>



    <div class="container-fluid">

        <div class="media-container-row">

            <div class="title col-12 col-md-8">

                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Our Doctors</h2>

            </div>

        </div>

    </div>

</section>



<section class="section-table cid-table-filter" id="table1-3c">

  <div class="container container-table">

      <div class="table-wrapper">

        <div class="container">

          <div class="row search">

            <div class="col-md-6"></div>

            <div class="col-md-6">

                <div class="dataTables_filter">

                  <label class="searchInfo mbr-fonts-style display-7">Search Doctor's Name or Specialty</label>

                  <input class="form-control" input-sm="" disabled="" >

                </div>

            </div>

          </div>

        </div>



        <div class="container scroll">

          <table class="table table-hover isSearch" cellspacing="0" style="cursor: pointer;">

            <thead>

              <tr class="table-heads ">    

                <th class="head-item mbr-fonts-style display-7">Doctor`s Name</th>

                <th class="head-item mbr-fonts-style display-7">Specialty</th>

                <th class="head-item mbr-fonts-style display-7">Sub Specialty</th>

                <th class="head-item mbr-fonts-style display-7" hidden="">Contact #</th>

                <th class="head-item mbr-fonts-style display-7" hidden="">Room / Clinic</th>

              </tr>

            </thead>



            <tbody>

              <?php foreach($records as $row): ?>

            <tr onclick="window.location='<?php echo base_url();?>medical_team/profile/<?=$row->id;?>';"> 

              <td class="body-item mbr-fonts-style display-7"><a href="<?php echo base_url();?>medical_team/profile/<?=$row->id;?>">Dr. <?=$row->lname;?>, <?=$row->fname;?> <?=$row->suffix;?> <?=$row->mname;?></a></td>

              <td class="body-item mbr-fonts-style display-7"><?=$row->specialization;?></td>

              <td class="body-item mbr-fonts-style display-7"><?=$row->sub;?></td>

              <td class="body-item mbr-fonts-style display-7" hidden=""><?=$row->contact;?></td>

              <td class="body-item mbr-fonts-style display-7" hidden=""><?=$row->room;?></td>

            </tr>

            <?php endforeach; ?>

          </tbody>

          </table>

        </div>

        <div class="container table-info-container">

          <div class="row info">

            <div class="col-md-6">

              <div class="dataTables_info mbr-fonts-style display-7">

                <span class="infoBefore">Showing</span>

                <span class="inactive infoRows"></span>

                <span class="infoAfter">entries</span>

                <span class="infoFilteredBefore">(filtered from</span>

                <span class="inactive infoRows"></span>

                <span class="infoFilteredAfter"> total entries)</span>



                

              </div>

            </div>

            <div class="col-md-6">

              

            </div>

          </div>

        </div>

      </div>

    </div>

</section>

<!--OUR DOCTORS-->



