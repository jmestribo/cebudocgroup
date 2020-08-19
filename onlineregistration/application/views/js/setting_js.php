<script type="text/javascript">
  $(document).ready(function(){
   $("body").on("submit","#saverole",function(e){
      e.preventDefault();
      var formattr = $(this).attr("formattr");
      var form = document.querySelector("#saverole");
      var fd = new FormData(form);
          fd.append("formtype",formattr);
      $.ajax({
        url:"<?php echo base_url();?>Save_controller/save_role",
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

    $("body").on("submit","#savegroup",function(e){
      e.preventDefault();
      var formattr = $(this).attr("formattr");
      var form = document.querySelector("#savegroup");
      var fd = new FormData(form);
          fd.append("formtype",formattr);
      $.ajax({
        url:"<?php echo base_url();?>Save_controller/save_group",
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

    $("body").on("submit","#savetype",function(e){
      e.preventDefault();
      var formattr = $(this).attr("formattr");
      var form = document.querySelector("#savetype");
      var fd = new FormData(form);
          fd.append("formtype",formattr);
      $.ajax({
        url:"<?php echo base_url();?>Save_controller/save_type",
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

    $("body").on("click",".addrole",function(e){
        var th = $(this).attr("type");
        var attrid = $(this).attr("attrid");
        var attrrole = $(this).attr("attrrole");
        var attrlevel = $(this).attr("attrlevel");
        if (th == "add") {
          $("#saverole").attr("formattr","create");
          $("#roleid").val("");
          $("#role").val("");
          $("#level").val("");
        }else{
          $("#saverole").attr("formattr","update");
          $("#roleid").val(attrid);
          $("#role").val(attrrole);
          $("#level").val(attrlevel);
        }
    });

    




    $("body").on("click",".addgroup",function(e){
        var th = $(this).attr("type");
        var attrid = $(this).attr("attrid");
        var attrgroup = $(this).attr("attrgroup");
        if (th == "add") {
          $("#savegroup").attr("formattr","create");
          $("#groupid").val("");
          $("#group").val("");
        }else{
          $("#savegroup").attr("formattr","update");
          $("#groupid").val(attrid);
          $("#group").val(attrgroup);
        }
    });

     $("body").on("click",".addtype",function(e){
        var th = $(this).attr("type");
        var attrid = $(this).attr("attrid");
        var attrticket_type = $(this).attr("attrticket_type");
        if (th == "add") {
          $("#savetype").attr("formattr","create");
          $("#typeid").val("");
          $("#type").val("");
        }else{
          $("#savetype").attr("formattr","update");
          $("#typeid").val(attrid);
          $("#type").val(attrticket_type);
        }
    });

    $("body").on("click","#deletesettinglist",function(e){
        var attrid = $(this).attr("attrid");
        var attrtitle = $(this).attr("attrtitle");
        var attrfilename = $(this).attr("attachfilename");
        var attrdelete = $(this).attr("attrdelete");
        $("#deletemodal").modal("show");
        $("#textcontent").html(attrtitle);
        $("#deletebtn").attr("attrid", attrid);
        $("#deletebtn").attr("attrfilename", attrfilename);
        $("#deletebtn").attr("attrdelete", attrdelete);
    });

    
      $('body').on("click","#deletebtn",function(){
          var ths = $(this);
         
          var path = $(this).attr("attrfilename");
          var type = $(this).attr("attrdelete");
          if (type == "role") {

            var attrid = $(this).attr("attrid");
            var tabl = "tbl_role";
            var col = "id";

          }else if (type == "group") {

            var attrid = $(this).attr("attrid");
            var tabl = "tbl_group";
            var col = "id";

          }else if(type == "type"){

            var attrid = $(this).attr("attrid");
            var tabl = "tbl_tickettype";
            var col = "type_id";

          }
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