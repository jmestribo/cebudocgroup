    $('body').on('change',"#attachmentclip",function(event) {
        var total_file=document.getElementById("attachmentclip").files.length;
        
         for(var i=0;i<total_file;i++)
         {
            var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                
            }
            var filename = event.target.files[i].name;
           $('.previewimg1').append(`
                <div class="col-md-12 mb-2 fileuploads" style="width:100%; ">
                   <div class="text-black border p-1">`+filename+`
                        <span type="button" class="float-right close imgcloses" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                <div>
                
            `);
         }
    });
    $('body').on('change',"#attachmentclip1",function(event) {
        var total_file=document.getElementById("attachmentclip1").files.length;
        
         for(var i=0;i<total_file;i++)
         {
            var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                
            }
            var filename = event.target.files[i].name;
           $('.previewimg1').append(`
                <div class="col-md-12 mb-2 fileuploads" style="width:100%; ">
                   <div class="text-black border p-1">`+filename+`
                        <span type="button" class="float-right close imgcloses" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                <div>
                
            `);
         }
    });
    $('body').on("click",".imgcloses1",function(){
        var attrid = $(this).attr("attrid");
        var attrtitle = $(this).attr("attrtitle");
        var attrfilename = $(this).attr("attachfilename");
       
        $("#deletemodal").modal("show");
        $("#deletemodal").css("z-index",2000);
        $("#textcontent").html(attrtitle);
        $("#deletebtn").attr("attrid", attrid);
        $("#deletebtn").attr("attrfilename", attrfilename);

    });

   

    
    $('body').on("click",".imgcloses",function(){
        var ths = $(this);
        ths.closest('.fileuploads').remove();
    });