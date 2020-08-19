<script type="text/javascript">
  $(document).ready(function(){
   $("body").on("submit","#saveuser",function(e){
      e.preventDefault();
      var formattr = $(this).attr("formattr");
      var form = document.querySelector("#saveuser");
      var fd = new FormData(form);
          fd.append("formtype",formattr);
      $.ajax({
        url:"<?php echo base_url();?>Save_controller/create_userinfo",
        type:"POST",
        processData:false,
        contentType:false,
        data:fd,
        success:function(data){
          window.location.href="";
        },
        error:function(data){
          console.log("Something went wrong!");
        }
      });
    });

    $("body").on("click",".adduser",function(e){
        var form = document.querySelector("#saveuser");
        form.reset();
       $("#saveuser").attr("formattr","create");
       $("#userstatus").empty();
    });

    $("body").on("click","#deleteuserlist",function(e){
        var attrid = $(this).attr("attrid");
        var attrtitle = $(this).attr("attrtitle");
        var attrfilename = $(this).attr("attachfilename");
        $("#deletemodal").modal("show");
        $("#textcontent").html(attrtitle);
        $("#deletebtn").attr("attrid", attrid);
        $("#deletebtn").attr("attrfilename", attrfilename);
    });

    $("body").on("click",".edituserinfo",function(e){
       $("#usermodal").modal("show");
       $("#saveuser").attr("formattr","update");
       $("#userstatus").html(`
          <div class="col-md-12 form-group">
            <label for="user">Action</label>
            <select class="form-control " name ="status" data-msg="Please Select Site" style="width: 100%;" required>
              <option value="" disabled selected>Select Status</option>
              <option value="Active">Activate</option>
              <option value="Deactive" >Deactivate</option>
            </select>
          </div>
        `);

        var usercode = $(this).attr("attrusercode");
        var mycode = "<?php echo $_SESSION['user_code'];?>";
        var usertype = "<?php echo $_SESSION['user_type'];?>";
        if (usertype == "Admin" || usertype == "Super Admin") {
           if (usercode == mycode) {
              $("#submituser").attr("type","submit");
              $("#submituser").attr("disabled",false);
             
            }else{
              $("#submituser").attr("type","submit");
              $("#submituser").attr("disabled",false);
            }
          }else{
             if (usercode == mycode) {
                $("#submituser").attr("type","submit");
                $("#submituser").attr("disabled",false);
                $("#passbox").html(`<div class="col-md-12 form-group">
                    <label for="user">Password</label>
                    <input type="text" class="form-control" name="password_text" id="password" placeholder="Enter Password" required data-msg="Please enter Password">
                </div>`);
              }else{
                $("#passbox").empty();
                $("#submituser").attr("type","button");
                $("#submituser").attr("disabled",true);
              }
          }
       
        var attrid = $(this).attr("attrid");
        $.ajax({
          url:"<?php echo base_url();?>get_controller/getuserinformation",
          method:"POST",
          dataType:"JSON",
          data:{id:attrid},
          success:function(data){
            var prop = 0;
            for(prop in data){
              $("input[name="+prop+"]").val(data[prop]);
              $("select[name="+prop+"]").val(data[prop]);
            }
          },
          error:function(data){
          }
        });
    });

      $('body').on("click","#deletebtn",function(){
          var ths = $(this);
          var attrid = $(this).attr("attrid");
          var tabl = "tbl_users";
          var col = "userid";
          var path = $(this).attr("attrfilename");
          $.ajax({
              url:"<?php echo base_url();?>save_controller/deletfunction",
              type:"POST",
              data:{id:attrid,table:tabl,column:col,path:path},
              cache:false,
              success:function(data){
                $("#deletemodal").modal("hide");
                  Messenger().post({
                      message: 'Successfuly deleted!',
                      type: 'info',
                      showCloseButton: true
                  });
               $(".usertr"+attrid).remove();
              },error:function(data){
                  Messenger().post({
                      message: 'Something went wrong!',
                      type: 'info',
                      showCloseButton: true
                  });
              }
          });
      });
  });

        
       
        
</script>