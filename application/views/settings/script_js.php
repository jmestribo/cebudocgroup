
<script type="text/javascript">
	refreshschedule();
	var tomorrow = new Date();
    $( "#scheddatepicker2").datepicker({ 
        beforeShowDay: noSunday,
        dateFormat: 'yy-mm-dd',
        minDate: +2
    });

    function noSunday(date){ 
        var day = date.getDay(); 
        return [(day > 0), '']; 
    };
   	$("#scheddatepicker2").on("change",function(){
      var date = $("#scheddatepicker2").val();
      $("#scheduleofappointment").html(date);
      $(".appointmentbtn2").attr("attrdate",date);
     
       $("#allslots").show(); 
        $.ajax({
          url:"<?php echo base_url();?>Book/selectappointmentdate",
          method:"POST",
          dataType:"JSON",
          data:{date:date},
          beforeSend:function(){
            $("#inprogress").html("<img src='<?php echo base_url();?>upload/progress.gif' style='height:50px;'>");
          },
          success:function(data){
            $("#allslots").html(data);
            $("#inprogress").html("");
          }
        })
        setTimeout(function(){
          $("#allslots").show();
          $("#inprogress").html("");
        },1000);
    }); 

    $("body").on("click",".appointmentbtn2",function(){
    	var selectdate = $("#scheddatepicker2").val();

    	if (selectdate == "") {
    		alert("Please Select Date");
    	}else{
    		var time = $(this).attr("attrtime");
	        var date = $(this).attr("attrdate");
	       	$("#schedtime").val(time);
    	}
      
    });




    $('#sameaddress').click(function(){
		if($(this).prop("checked") == true){
			var phouseno = $("input[name='phouseno']").val();
			var pstreet = $("input[name='pstreet']").val();
			var pmunicipality = $("input[name='pmunicipality']").val();
			var pprovince = $("input[name='pprovince']").val();
			var pregion = $("input[name='pregion']").val();
			var pphone = $("input[name='pphone']").val();
			var pcellphone = $("input[name='pcellphone']").val();
			var pemail = $("input[name='pemail']").val();

			$("input[name='chouseno']").val(phouseno);
			$("input[name='cstreet']").val(pstreet);
			$("input[name='cmunicipality']").val(pmunicipality);
			$("input[name='cprovince']").val(pprovince);
			$("input[name='cregion']").val(pregion);
			$("input[name='cphone']").val(pphone);
			$("input[name='ccellphone']").val(pcellphone);
			$("input[name='cemail']").val(pemail);

		}
		else if($(this).prop("checked") == false){
			$("input[name='chouseno']").val("");
			$("input[name='cstreet']").val("");
			$("input[name='cmunicipality']").val("");
			$("input[name='cprovince']").val("");
			$("input[name='cregion']").val("");
			$("input[name='cphone']").val("");
			$("input[name='ccellphone']").val("");
			$("input[name='cemail']").val("");
		}
      });


    $("body").on("click","#savepriview",function(){
	var firstname = $("input[name='firstname']").val();
	var middlename = $("input[name='middlename']").val();
	var lastname = $("input[name='lastname']").val();
	var dob = $("input[name='dob']").val();
	var gender = $("select[name='gender']").val();
	var age = $("input[name='age']").val();
	var nationality = $("input[name='nationality']").val();
	var civilstatus = $("input[name='civilstatus']").val();
	var occupation = $("input[name='occupation']").val();
	var passportno = $("input[name='passportno']").val();
	var phouseno = $("input[name='phouseno']").val();
	var pstreet = $("input[name='pstreet']").val();
	var pmunicipality = $("input[name='pmunicipality']").val();
	var pprovince = $("input[name='pprovince']").val();
	var pregion = $("input[name='pregion']").val();
	var pphone = $("input[name='pphone']").val();
	var pcellphone = $("input[name='pcellphone']").val();
	var pemail = $("input[name='pemail']").val();
	var chouseno = $("input[name='chouseno']").val();
	var cstreet = $("input[name='cstreet']").val();
	var cmunicipality = $("input[name='cmunicipality']").val();
	var cprovince = $("input[name='cprovince']").val();
	var cregion = $("input[name='cregion']").val();
	var cphone = $("input[name='cphone']").val();
	var ccellphone = $("input[name='ccellphone']").val();
	var cemail = $("input[name='cemail']").val();
	var ofwemployeername = $("input[name='ofwemployeername']").val();
	var ofwoccupation = $("input[name='ofwoccupation']").val();
	var ofwplaceofwork = $("input[name='ofwplaceofwork']").val();
	var ofwhouse = $("input[name='ofwhouse']").val();
	var ofwstreet = $("input[name='ofwstreet']").val();
	var ofwcity = $("input[name='ofwcity']").val();
	var ofwprovince = $("input[name='ofwprovince']").val();
	var ofwcountry = $("input[name='ofwcountry']").val();
	var ofwofficephoneno = $("input[name='ofwofficephoneno']").val();
	var ofwcellphoneno = $("input[name='ofwcellphoneno']").val();
	var travelOtherCountry = $("input[name='travelOtherCountry']").val();
	var portofexit = $("input[name='portofexit']").val();
	var vessel = $("input[name='vessel']").val();
	var vesselno = $("input[name='vesselno']").val();
	var departuredate = $("input[name='departuredate']").val();
	var arrivaldate = $("input[name='arrivaldate']").val();
	var exposebefore14 = $("input[name='exposebefore14']").val();
	var dateofcontact = $("input[name='dateofcontact']").val();
	var placebefore14 = $("input[name='placebefore14']").val();
	var ifyes = $("input[name='ifyes']").val();
	var ifyesdate = $("input[name='ifyesdate']").val();
	var ifyesname1 = $("input[name='ifyesname1']").val();
	var ifyesname2 = $("input[name='ifyesname2']").val();
	var ifyescontactno2 = $("input[name='ifyescontactno2']").val();
	var ifyesname3 = $("input[name='ifyesname3']").val();
	var ifyescontactno3 = $("input[name='ifyescontactno3']").val();
	var ifyesname4 = $("input[name='ifyesname4']").val();
	var ifyesontactno4 = $("input[name='ifyesontactno4']").val();


	var selectservices = $("select[name='selectservices']").val();
	var scheddatepicker2 = $("input[name='scheddatepicker2']").val();
	var schedtime = $("input[name='schedtime']").val();

		$(".firstname").html(firstname);
		$(".middlename").html(middlename);
		$(".lastname").html(lastname);
		$(".dob").html(dob);
		$(".gender").html(gender);
		$(".age").html(age);
		$(".nationality").html(nationality);
		$(".civilstatus").html(civilstatus);
		$(".occupation").html(occupation);
		$(".passportno").html(passportno);
		$(".phouseno").html(phouseno);
		$(".pstreet").html(pstreet);
		$(".pmunicipality").html(pmunicipality);
		$(".pprovince").html(pprovince);
		$(".pregion").html(pregion);
		$(".pphone").html(pphone);
		$(".pcellphone").html(pcellphone);
		$(".pemail").html(pemail);
		$(".chouseno").html(chouseno);
		$(".cstreet").html(cstreet);
		$(".cmunicipality").html(cmunicipality);
		$(".cprovince").html(cprovince);
		$(".cregion").html(cregion);
		$(".cphone").html(cphone);
		$(".ccellphone").html(ccellphone);
		$(".cemail").html(cemail);
		$(".ofwemployeername").html(ofwemployeername);
		$(".ofwoccupation").html(ofwoccupation);
		$(".ofwplaceofwork").html(ofwplaceofwork);
		$(".ofwhouse").html(ofwhouse);
		$(".ofwstreet").html(ofwstreet);
		$(".ofwcity").html(ofwcity);
		$(".ofwprovince").html(ofwprovince);
		$(".ofwcountry").html(ofwcountry);
		$(".ofwofficephoneno").html(ofwofficephoneno);
		$(".ofwcellphoneno").html(ofwcellphoneno);
		$(".travelOtherCountry").html(travelOtherCountry);
		$(".portofexit").html(portofexit);
		$(".vessel").html(vessel);
		$(".vesselno").html(vesselno);
		$(".departuredate").html(departuredate);
		$(".arrivaldate").html(arrivaldate);
		$(".exposebefore14").html(exposebefore14);
		$(".dateofcontact").html(dateofcontact);
		$(".placebefore14").html(placebefore14);
		$(".ifyes").html(ifyes);
		$(".ifyesdate").html(ifyesdate);
		$(".ifyesname1").html(ifyesname1);
		$(".ifyesname2").html(ifyesname2);
		$(".ifyescontactno2").html(ifyescontactno2);
		$(".ifyesname3").html(ifyesname3);
		$(".ifyescontactno3").html(ifyescontactno3);
		$(".ifyesname4").html(ifyesname4);
		$(".ifyesontactno4").html(ifyesontactno4);
		$(".selectservices").html(selectservices);
		$(".scheddatepicker2").html(scheddatepicker2);
		$(".schedtime").html(schedtime);
		


  		
    })

	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e) {
	      $('.previewimages').attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  } else {
	    alert('select a file to see preview');
	    $('.previewimages').attr('src', '');
	  }
	}

	$("#attachfiles").change(function() {
	  readURL(this);
	});	

	$("#loading").html("<img src='<?php echo base_url();?>upload/progress.gif' style='height:90px;'>");	

	function refreshschedule(){
      $("#allslots").show();
      var date = "<?php echo date('Y-m-d',strtotime("+1 Day"))?>";
       $.ajax({
          url:"<?php echo base_url();?>Book/selectappointmentdate",
          method:"POST",
          dataType:"JSON",
          data:{date:date},
          success:function(data){
            $("#allslots").show();
            $("#allslots").html(data);
          }
        });
    }

        var services =  $("#selectservices").val();
        var scheddatepicker2 =  $("#scheddatepicker2").val();
        var schedtime =  $("#schedtime").val();
        if (services == "") {
            $(".next").prop("disabled",true);
        }
        $("#selectservices").on("change",function(){
            var thisservices = $(this).val();
            if (thisservices == "") {
                $(".next").prop("disabled",true);
            }else{
                $(".next").prop("disabled",false);
            }
        });
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $("body").on("click",".next",function(){
               var ths = $(this).attr("attrtype");
                var selectdates =  $(".scheddatepicker21").val();
                var schedtime1 =  $(".schedtime1").val();

                if (ths == 'services') {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                        },duration: 500
                    });
                     setProgressBar(++current);
                }else if (ths == "selectdate") {

                    if (selectdates == "" ) {

                        alert("Please SELECT DATE to go to next step");
                    }else if(schedtime1 == ""){
                        alert("Please SELECT TIME to go to next step");
                    }else{
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                        step: function(now) {
                        // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                            },duration: 500
                        });
                        setProgressBar(++current);
                    }
                }else if (ths == "patientinfo") {
                    var num = 0;
                    var array = [];
                    $('.validate').each(function(){
                        if ($(this).val() == "") {
                            num++;
                            array.push(this);
                        }
                        if (num > 0) {
                            if ($(this).val() =="") {
                                $(this).attr("arrayuired",true);
                            }
                        }
                    });
                    if (num > 0) {
                        $(this).animate(function(){
                            scrollTop:$(array[0]).offset().top
                        },5,function(){
                            $(array[0]).focus();
                        });
                    }else{
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                        step: function(now) {
                        // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                            },duration: 500
                        });
                        setProgressBar(++current);
                    }

                }else if (ths == "uploadimage") {
                    var files = $("#attachfiles").val();
                    if (files == "") {
                         alert("Please Attach your Deposit Slip");
                    }else{
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                        step: function(now) {
                        // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                            },duration: 500
                        });
                        setProgressBar(++current);
                    }
                }else if (ths == "confirm") {
                 
                   		current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                        step: function(now) {
                        // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                            },duration: 500
                        });
                        setProgressBar(++current);

                  	$("#confirmation").modal('show');
                  	$("#confirmmsg").hide();
                }
                
          
        });
        $(".previous").click(function(){

		        current_fs = $(this).parent();
		        previous_fs = $(this).parent().prev();

		        //Remove class active
		        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		        //show the previous fieldset
		        previous_fs.show();

		        //hide the current fieldset with style
		        current_fs.animate({opacity: 0}, {
		        step: function(now) {
		        // for making fielset appear animation
		        opacity = 1 - now;

		        current_fs.css({
		        'display': 'none',
		        'position': 'relative'
		        });
		        previous_fs.css({'opacity': opacity});
	        	},
        	duration: 500
        	});
       		setProgressBar(--current);
        });

        function setProgressBar(curStep){

            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar").css("width",percent+"%")
        }

        $(".submit").click(function(){
            return false;
        })

       $("body").on("click","#submitformregistration",function(){

    	 var msform = document.querySelector("#msform");
    	 var fd = new FormData(msform);

	    	$.ajax({
	          url:"<?php echo base_url();?>Book/saveappointment",
	          type:"POST",
	          processData:false,
	          contentType:false,
	          data:fd,
	          beforeSend:function(){
	            $('#loading').html("<div><img src='<?php echo base_url();?>upload/progress.gif' style='height: 20vh'>");
	            $('#statuss').html("PLEASE WAIT....");

	          },
	          success: function(data) {
	            $('#loading').html("<div><img src='<?php echo base_url();?>upload/done.gif' style='height: 20vh'></div>");
	            $('#Successfullyimg').html("<div><img src='<?php echo base_url();?>upload/done.gif' style='height: 20vh'></div>");
	            $('#statuss').html("SUCCESSFULLY SENT ");
	            $('#titlemsg').html("<h2 class='purple-text text-center'><strong>SUCCESS</strong></h2>");
	            setTimeout(function(){
	                $("#confirmation").modal('hide');
	                $("#confirmmsg").show();

	            },1000);
	          },
	          error:function(data){
	           $('#loading').html("<div><img src='<?php echo base_url();?>upload/x.png' style='height: 20vh'></div>");
	          }
	        });
   		 });


        $("body").on("click","#cancelbtn",function(){
        	$("#confirmation").modal("hide");
        	$('#Successfullyimg').html("<div><img src='<?php echo base_url();?>upload/x.png' style='height: 20vh'></div>");
        	$('#titlemsg').html("<h2 class='text-danger text-center'><strong>Cancelled Appointment</strong></h2>");
   		 });
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>


       
        
       