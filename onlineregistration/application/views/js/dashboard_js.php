  <!-- <script type="text/javascript" src="<?php echo base_url();?>custom/js/chart.js"></script> -->

<script type="text/javascript">

	getEarnings();
	function getEarnings(year){
		var yearnow = "<?php echo date("Y");?>";
	    var yearToFetch = year || yearnow;
	    $.ajax({
	        url: "earningsGraph/"+yearToFetch,
	        type: 'GET',
	        dataType: "JSON"
	    }).done(function(response){

	        var barChartData = {
	          labels : ["Jan "+yearToFetch, "Feb" +yearToFetch, "Mar "+yearToFetch, "Apr "+yearToFetch, "May "+yearToFetch, "Jun "+yearToFetch, "Jul "+yearToFetch, "Aug "+yearToFetch, "Sept "+yearToFetch, "Oct "+yearToFetch, "Nov "+yearToFetch, "Dec "+yearToFetch],
	          datasets : [
	         //  {
	         //  	label:"Todo",
	         //    backgroundColor:"gray",
		        // data : response.Calltodo,
        		// fill: false
	         //  },
	         //  {
	         //  	label:"INPROGRESS",
	         //    backgroundColor: "orange",
		        // data : response.Callinprogress,
        		// fill: false
	         //  }, 
		          {
		          	label:"DONE",
		            backgroundColor: "blue",
			        data : response.Calldone,
	        		fill: false
		          },
		          {

		          	label:"BACKLOG",
		            backgroundColor: "red",
			        data : response.Callbacklog,
	        		fill: false
		          }
	          ]
	        };
	 
	        //show the expense title
	        document.getElementById('earningsTitle').innerHTML = "CALL RESPONSE TIME BY YEAR ("+response.earningsYear +") ";

	        var earningsGraph1 = document.getElementById("ticketGraph");
	      	 new Chart(earningsGraph1,{

	        	type: 'bar',
			    data:barChartData,
			    options: {
			      legend: { display: true, position: 'bottom'},
			     
			    }

	        });
	      	 var hrs,hr;
	      	 if (response.totaldone == 1) {
	      	 	hrs = "Hr";
	      	 }else  if (response.totaldone > 0) {
	      	 	hrs = "Hrs";
	      	 }else{
	      	 	hrs = "Hr";
	      	 }
	      	 if (response.totalbacklog == 1) {
	      	 	hr = "Hr";
	      	 }else  if (response.totalbacklog > 0) {
	      	 	hr = "Hrs";
	      	 }else{
	      	 	hr = "Hr";
	      	 }
	        $("#totaldone").html(response.totaldone+' '+hrs);
	        $("#totalbacklog").html(response.totalbacklog+' '+hr);

	        //remove the loading info
	        $("#yearAccountLoading").html("");
	    }).fail(function(){
	        console.log('req failed');
	    });
	}

	$("#selectticketperyear").change(function(){
        var year = $(this).val();
        
        if(year){
            
            //get earnings for current  year on page load
            getEarnings(year);
            
            //also get the payment menthods for that year
        }
    });

</script>