<script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>dist/js/adminlte.js"></script>
<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>style/dist/jquery.contextMenu.min.css">
<script src="<?php echo base_url();?>style/dist/jquery.contextMenu.min.js"></script>
<script src="<?php echo base_url();?>style/dist/jquery.ui.position.js"></script>

<script type="text/javascript">
	$(".travelOtherCountry").hide();

	 var a = $("#travelOtherCountry").val();
    if (a == "YES") {
      $(".travelOtherCountry").show();
    }
   
	$("body").on("change","#travelOtherCountry",function(){
		var ths = $(this).val();
		if (ths == "YES") {
			$(".travelOtherCountry").show();
		}else{
			$(".travelOtherCountry").hide();
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

	var usertype = "<?php echo $_SESSION['department'];?>";
	if (usertype == "admin") {
		 $.contextMenu({
		    selector: '.context-menu-one', 
		    callback: function(key, options) {
		    	var id = $(".context-menu-icon-edit").attr("patientid");
		    	var patientsched = $(".context-menu-icon-edit").attr("patientsched");
		    	if (key == "edit") {
		    		window.location.href="<?php echo base_url()?>PatientInformation/CreateNew/"+ patientsched +"/"+ id +"/void";
		    	}
		    	else if (key == "cut") {
		    		
		    		// $("#changeform").modal("show");
			     //   	$("#changeformssched").val(patientsched);
			     //   	$("#changeformpid").val(id);

		    	}else if (key == "print") {
		    		$("#remarksform").modal("show");
			       	$("#remarkssched").val(patientsched);
			       	$("#remarkspid").val(id);
		    	}
		    },
		    items: {
		        "edit": {name: "EDIT INFORMATION", icon: "edit"},
		        "cut": {name: "CHANGE SCHED", icon: "edit"},
		        
		       	// copy: {name: "Copy", icon: "copy"},
		        // "paste": {name: "Paste", icon: "paste"},
		        // "delete": {name: "Delete", icon: "delete"},
		       
		    }
		});

	}else if (usertype == "cashier") {
		 $.contextMenu({
		    selector: '.context-menu-one', 
		    callback: function(key, options) {
		    	var id = $(".context-menu-icon-edit").attr("patientid");
		    	var patientsched = $(".context-menu-icon-edit").attr("patientsched");
		    	if (key == "cut") {
		    		
		    		// $("#changeform").modal("show");
			     //   	$("#changeformssched").val(patientsched);
			     //   	$("#changeformpid").val(id);

		    	}else if (key == "print") {
		    		$("#remarksform").modal("show");
			       	$("#remarkssched").val(patientsched);
			       	$("#remarkspid").val(id);
		    	}
		    },
		    items: {
		        "print": {name: "REMARKS", icon: "paste"},
		        "cut": {name: "CHANGE SCHED", icon: "edit"},
		       	// copy: {name: "Copy", icon: "copy"},
		        // "paste": {name: "Paste", icon: "paste"},
		        // "delete": {name: "Delete", icon: "delete"},
		       
		    }
		});
	}else if (usertype == "laboratory") {
		 $.contextMenu({
	    selector: '.context-menu-one', 
	    callback: function(key, options) {
	    	var id = $(".context-menu-icon-edit").attr("patientid");
	    	var patientsched = $(".context-menu-icon-edit").attr("patientsched");
	    	if (key == "edit") {
	    		window.location.href="<?php echo base_url()?>PatientInformation/CreateNew/"+ patientsched +"/"+ id +"/void";
	    	}
	    	else if (key == "cut") {
	    		
	    		// $("#changeform").modal("show");
		     //   	$("#changeformssched").val(patientsched);
		     //   	$("#changeformpid").val(id);

	    	}else if (key == "print") {
	    		$("#remarksform").modal("show");
		       	$("#remarkssched").val(patientsched);
		       	$("#remarkspid").val(id);
	    	}
	    },
	    items: {
	        "edit": {name: "EDIT INFORMATION", icon: "edit"},
	        "cut": {name: "CHANGE SCHED", icon: "edit"},
	       	// copy: {name: "Copy", icon: "copy"},
	        // "paste": {name: "Paste", icon: "paste"},
	        // "delete": {name: "Delete", icon: "delete"},
	       
	    }
	});
	}
	
	 setInterval(function(){
	 	getallregistrationonline();
	 },15000)
	 setInterval(function(){
	 	getallregistrationonline();
	 },60000);


	 var base_url = "<?php echo $this->uri->segment(3);?>";
	 setInterval(function(){
	 	window.location.href="https://cebudocgroup.com/onlineregistration/PatientInformation/Lists/"+base_url;
	 },1800000);
	 function getallregistrationonline(){
	 	var type;
	 	if (base_url == "draft" ) {
	 		type = 1;
	 	}else if(base_url == "unverified"){
	 		type = 0;
	 	}else{
	 		type = 0;
	 	}
	 	$.ajax({
			url:"<?php echo base_url();?>PatientInformation/allregistrationonline",
			method:"POST",
			data:{type:type,url:base_url},
			success:function(data){
				$(".pcrtesttbody").html(data);
			}
		})
	 }

	$("body").on("mouseenter",".editpatient",function(){
		var d = $(this).attr("patientid");
		var patientsched = $(this).attr("patientsched");
		var r = $(".context-menu-icon-edit").attr("patientid",d);
		var patientsched = $(".context-menu-icon-edit").attr("patientsched",patientsched);
	});

	$("body").on("submit","#searchpcrtestform",function(e){
		e.preventDefault();
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var middlename = $("#middlename").val();
		var type;
	 	if (base_url == "draft") {
	 		type = 1;
	 	}else{
	 		type = 0;
	 	}
		$.ajax({
			url:"<?php echo base_url();?>PatientInformation/searchpatient",
			method:"POST",
			data:{lastname:lastname,firstname:firstname,middlename:middlename,baseurl:type},
			success:function(data){
				$(".pcrtesttbody").html(data);
			}
		})
	});

	$("body").on("click","#printpatientlist",function(){

		var date1 = $("#searchdate").val();
		var date;
		if (date1 != "") {
			date = date1;
		}else{
			date = "ALL";
		
		}

		 var iMyWidth;
	     var iMyHeight;
	        //half the screen width minus half the new window width (plus 5 pixel borders).
	      iMyWidth = (window.screen.width / 2) - (675 + 10);
	        //half the screen height minus half the new window height (plus title and status bars).
	      iMyHeight = (window.screen.height / 2) - (460 + 50);
	      
		  var strWindowFeatures = "width=1350,height=920,scrollbars=yes,resizable=yes,location=no,directories=no,left=" + iMyWidth + ",top=" + iMyHeight + ",screenX=" + iMyWidth + ",screenY=" + iMyHeight + ",toolbar=no,addressbar=no,menubar=no,";
		  var location = "<?php echo base_url();?>";
		  window.open(location+"PatientInformation/Patient_result/"+date+'/', 'Print', strWindowFeatures);
	});

	var url2 = "<?php echo $this->uri->segment(2);?>";
	var url3 = "<?php echo $this->uri->segment(3);?>";
	if (url2 == "" || url2 == "Lists") {
		$(".Lists").addClass("active");
		$(".Lists").addClass("show");
		if (url3 =="" || url3 == "pending-request") {
			$(".pending-request").addClass("active");
			$(".pending-request").addClass("show");
		}
		else{
			$("."+url3).addClass("active");
			$("."+url3).addClass("show");
		}

	}else{
		$("."+url2).addClass("active");
		$("."+url2).addClass("show");
	}



	
	
</script>