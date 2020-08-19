<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("body").on("submit","#saveuser",function(e){
      e.preventDefault();
      var formattr = $(this).attr("formattr");
      var form = document.querySelector("#saveuser");
      var fd = new FormData(form);
          fd.append("formtype",formattr);
      $.ajax({
        url:"<?php echo base_url();?>signin/register",
        type:"POST",
        processData:false,
        contentType:false,
        data:fd,
        success:function(data){
         
        },
        error:function(data){
          console.log("Something went wrong!");
        }
      });
    });
  });

</script> -->