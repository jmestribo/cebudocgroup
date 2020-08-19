 <script type="text/javascript">
  $("#datebox").hide();

  $("body").on("change","#orderbyreports",function(){
    $("#datebox").show();
    var val = $(this).val();
    if (val == "Monthly") {
      $(".monthlyrange").show();
      $("#month").hide();
      $("#selectday").hide();
      $("#datebox").hide();
    }
    else if (val == "Weekly") {

      $("#datebox").show();
      $("#month").hide();
      $("#selectday").show();
      $(".monthlyrange").hide();

    }else if (val == "Daily") {
      $("#datebox").show();
      $("#month").show();
      $(".monthlyrange").hide();
      $("#selectday").hide();
    }
  });

  $("body").on("change","#selecticketreports",function(){
  
    var val = $(this).val();
    if (val == "user") {
      $("#selectuserbox").show();
    }
    else{
      $("#selectuserbox").hide();
    }
  });



  $("body").on("click","#previewbtn",function(){
   
    var attr = $("option:selected","#selecticketreports").attr("attrtype");
    var date = $("#orderbyreports").val();
    var vals = $("#selecticketreports").val();
    var from = $("#selectdatefrom").val();
    var to = $("#selectdateto").val();
    var dateattr = $("option:selected","#orderbyreports").attr("attrtype");
    if (attr == "assign_by" && vals != "0") {
      var val = $("#selectuser").val();

    }else{
      var val = $("#selecticketreports").val();
      $("#selectuser").val("");
    }
    var value1 = $("#selectdate").val();  
    var value;
    var valueto;
    var link;
    var link1;
    if (date == "Monthly" && from != "" && to != "") {
      value = from;
      valueto = to;
      link = value+'/'+valueto+'/'+dateattr;
      link1 = value+'/'+valueto+'/'+dateattr;
    }else if (date == "Daily" && value1 != "") {

      valueto = "";
      value = value1;
      link = value+'/'+dateattr;
      link1 = value+'/'+dateattr;
    }else{
      value = "";
      valueto = "";
      link = "";
      link1 = "";
    }

    if (attr == "") {
      $("#converttopdf").hide();
      $("#downloadtopdf").hide();
    }else{
       $("#converttopdf").show();
       $("#downloadtopdf").show();
    }
    
     $("#converttopdf").attr("href","<?php echo base_url();?>PDF_Reports/pdfdetails/"+val+'/'+attr+'/View/'+link);
     $("#downloadtopdf").attr("href","<?php echo base_url();?>PDF_Reports/pdfdetails/"+val+'/'+attr+'/Download/'+link1);
    $("#displayallreports").empty();
    $.ajax({
      url:"<?php echo base_url();?>get_controller/get_reports",
      method:"POST",
      dataType:"JSON",
      data:{val:val,value:value,valueto:valueto,attr:attr,dateattr:dateattr},
      success:function(data){

        if (data.type == "status" && data.todo != "" && data.inprogress == "" && data.done == "" && data.backlog == "") {
          if (data.todo == "0") {
            $("#displayallreports").append(`<tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket To-do</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }else{
            $("#displayallreports").append(`<tr class="bglight  text-black text-uppercase"><td colspan="9">All Ticket To-do</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.todo+`
              <tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>
              `);
          }

        }else if (data.type == "status" && data.inprogress != "" && data.todo == "" && data.done == "" && data.backlog == "") {
           
          if (data.inprogress == "0") {
            $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">All Ticket In Progress</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
           
          }else{
            $("#displayallreports").append(`<tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket In Progress</td></tr>
             <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.inprogress+`
              <tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }

        }
        else if (data.type == "status" && data.done != "" && data.todo == "" && data.inprogress == "" && data.backlog == "") {
          
          if (data.done == "0") {
            $("#displayallreports").append(`<tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket Done</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }else{
            $("#displayallreports").append(`<tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket Done</td></tr>
               <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.done+`
              <tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }

        }

        else if (data.type == "status" && data.backlog != "" && data.todo == "" && data.done == "" && data.inprogress == "") {
          if (data.backlog == "0") {
            $("#displayallreports").append(`<tr class="bglight text-black text-uppercase"><td colspan="9">All Ticket Backlog</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }else{
            $("#displayallreports").append(`<tr class="bglight  text-black text-uppercase"><td colspan="9">All Ticket Backlog</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.todo+`
              <tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }
        }else if (data.type == "priority") {

        if (data.todo == "") {
            $("#displayallreports").append(`<tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket To-do</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }else{
            $("#displayallreports").html(`<tr class="bglight text-uppercase  text-black"><td colspan="9">All Ticket To-do</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.todo);
          }

        if (data.inprogress == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket In Progress</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
           
          }else{
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket In Progress</td></tr> 
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.inprogress);
          }

          if (data.done == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket Done</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }else{
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"> </td></tr><tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket Done</td></tr> 
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.done);
          }

          if (data.backlog == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket Backlog</td></tr><tr><td colspan="9">No Result Found!</td></tr><tr class="bglight text-black"><td colspan="9" class="p-1"></td></tr>`);
          }else{
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-uppercase text-black"><td colspan="9">All Ticket Backlog</td></tr> 
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.backlog);
          }
        }
        else if (data.type == "assign_by") {
          
          if (data.todo == "") {
            $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">All Ticket To-do</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
            $("#displayallreports").html(`<tr class="bglight  text-black"><td colspan="9">All Ticket To-do</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.todo);
          }

          if (data.inprogress == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">All Ticket In Progress</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
           
          }else{
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">All Ticket In Progress</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.inprogress);
          }

          if (data.done == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bgdone text-black"><td colspan="9">All Ticket Done</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
            $("#displayallreports").append(`<tr><td colspan="9"></td></tr><tr class="bgdone text-black"><td colspan="9">All Ticket Done</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.done);
          }

          if (data.backlog == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket Backlog</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket Backlog</td></tr>
              <tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>
              `+data.backlog);
          }
        }else if (data.type == "all") {

           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do</td></tr>`+data.todo1);
           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do ->Highest</td></tr>`+data.highest1);
           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do ->High</td></tr>`+data.high1);
           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do ->Medium</td></tr>`+data.medium1);
           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do ->Lowest</td></tr>`+data.lowest1);
           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do ->Low</td></tr>`+data.low1);
           // $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-dark text-black"><td colspan="9">All Ticket To-do ->Emergency</td></tr>`+data.emergency1);

          if (data.todo1 == "") {
            $("#displayallreports").append(`<tr class="bg-primary text-white"><td colspan="9">All Ticket To-doasd</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
             $("#displayallreports").append(`<tr class="bg-primary text-white"><td colspan="9">All Ticket To-do</td></tr><tr>
                <th style="width:12%;">Ticket Code</th>
                <th>Ticket Key</th>
                <th>Site</th>
                <th>Priority</th>
                <th>Assigned By</th>
                <th>Report By</th>
                <th>Date Created</th>
                <th>Estimated Time</th>
                <th>Time Spent</th>
              </tr>`);
            if (data.highest1 == "") {
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr>
                `+data.highest1);
            }

            if (data.high1 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr>`+data.high1);
            }

            if (data.medium1 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr>`+data.medium1);
            }

             if (data.lowest1 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr>`+data.lowest1);
            }

            if (data.low1 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr>`+data.low);
            }

            if (data.emergency1 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr>`+data.emergency1);
            }
          }




          if (data.inprogress1 == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-primary text-white"><td colspan="9">All Ticket In Progress</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
           
             $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-primary text-white"><td colspan="9">All Ticket In Progress</td></tr>`);
            if (data.highest2 == "") {
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr>`+data.highest2);
            }

            if (data.high2 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr>`+data.high2);
            }

            if (data.medium2 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr>`+data.medium2);
            }

             if (data.lowest2 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr>`+data.lowest2);
            }

            if (data.low2 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr>`+data.low2);
            }

            if (data.emergency2 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr>`+data.emergency2);
            }
          }

          if (data.done1 == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-primary text-white"><td colspan="9">All Ticket Done</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
           
             $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-primary text-white"><td colspan="9">All Ticket Done</td></tr>`);
            if (data.highest3 == "") {
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr>`+data.highest3);
            }

            if (data.high3 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr>`+data.high3);
            }

            if (data.medium3 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr>`+data.medium3);
            }

             if (data.lowest3 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr>`+data.lowest3);
            }

            if (data.low3 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr>`+data.low3);
            }

            if (data.emergency3 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr>`+data.emergency3);
            }
          }
       

        if (data.backlog1 == "") {
            $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-primary text-white"><td colspan="9">All Ticket Backlog</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
          }else{
           
             $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bg-primary text-white"><td colspan="9">All Ticket Backlog</td></tr>`);
            if (data.highest9 == "") {
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
              $("#displayallreports").append(`<tr class="bglight text-black"><td colspan="9">Highest</td></tr>`+data.highest9);
            }

            if (data.high9 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">High</td></tr>`+data.high9);
            }

            if (data.medium9 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Medium</td></tr>`+data.medium9);
            }

             if (data.lowest9 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Lowest</td></tr>`+data.lowest9);
            }

            if (data.low9 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Low</td></tr>`+data.low9);
            }

            if (data.emergency9 == "") {
              $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr><tr><td colspan="9">No Result Found!</td></tr>`);
            }else{
               $("#displayallreports").append(`<tr><td colspan="9" class="p-3"></td></tr><tr class="bglight text-black"><td colspan="9">Emergency</td></tr>`+data.emergency9);
            }
          }
        }
        }

        

    });
  });
</script>

