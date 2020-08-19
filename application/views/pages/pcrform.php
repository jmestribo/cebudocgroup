<section class="mbr-section content5 cid-default-banner" id="content5-3h">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container-fluid">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                      COVID 19 RT-PCR TESTING APPOINTMENT</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section form1 cid-qM2t50SQmT" id="form1-3j">
    <div class="container">
        <div class="row justify-content-center p-3">
            <div class="title col-12 col-lg-12">
              <div class="row">
                <div class="col-lg-4  p-3">
                  <div class="title col-12 col-lg-12 p-3">
                    <label class="text-uppercase">Make an Appointment</label>
                    <div class="block-text mbr-fonts-style display-7">
                      <input type="text" name="" id="scheddatepicker" class="c-form" autocomplete="off"  placeholder="SELECT DATE">
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 text-uppercase border">
                  <div>
                    <center><span id="inprogress"></span></center>
                  </div>
                  <label class="text-uppercase"> </label>
                  <div style="width:100%; height: 600px; overflow-y: auto; padding-left: 20px;padding-right: 20px;">
                    <div id="allslots"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="sending"  data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 250px;border: none; z-index:7000" >
        <div class="modal-body" style="z-index:  7000;"> 
             <center>
                 <div id="loading"></div>
                  <div><h4 id="statuss" class="text-black">Please Wait...</h4></div>
             </center>
         </div>
        </div>
    </div>
  </div>
</div>