<section class="mbr-section content5 cid-default-banner" id="content5-3h">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container-fluid">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                  COVID 19 RT-PCR TESTING PAYMENT</h2>
            </div>
        </div>
    </div>
</section>

<?php 
  $url3 = $this->uri->segment(3);
  $url4 =$this->uri->segment(4);
 $new_url = str_replace('%20', ' ', $url4);
?>
<section class="mbr-section form1 cid-qM2t50SQmT" id="form1-3j">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="title col-12 col-lg-6">
                <div class="col-lg-12 text-uppercase border">
                  <fieldset class="p-2">
                    <center><legend>PLEASE ATTACH YOUR DEPOSIT SLIP</legend></center>
                    <div class="title col-12 col-lg-12 ">
                      <form id="submitattachfiles">
                         <div class="block-text mbr-fonts-style display-7 p-3">
                           <label class="text-uppercase">YOUR NAME</label>
                          <input type="text" name="attachfilesname"  value="<?php echo $new_url;?>" class="c-form" autocomplete="off" readonly="">
                          <input type="hidden" name="attachid" value="<?php echo $url3;?>" class="c-form" autocomplete="off" readonly="">
                        </div>
                        <div class="block-text mbr-fonts-style display-7 p-3">
                           <label class="text-uppercase">ATTACH FILE</label>
                          <input type="file" name="attachfiles" class="c-form" autocomplete="off" accept="image/*" required="">
                        </div>
                        <div class="block-text mbr-fonts-style display-7 p-3">
                          <input type="submit"  class="btn-block primarybutton text-white" autocomplete="off"  value="SUBMIT">
                        </div>
                      </form>
                    </div>
                  </fieldset>
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




<div class="modal fade" id="sendingfiles"  data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 250px;border: none; z-index:7000" >
        <div class="modal-body" style="z-index:  7000;"> 
             <center>
                 <div id="loadingfiles"></div>
                  <div><h4 id="statussfile" class="text-black">Please Wait...</h4></div>
             </center>
         </div>
        </div>
    </div>
  </div>
</div>

