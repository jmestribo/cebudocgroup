<script type="text/javascript">
	$(document).ready(function(){

		
		$("body").on("submit","#saveticket2",function(e){
			e.preventDefault();
		    var form = document.querySelector("#saveticket2");
		    var ths = $(this).attr("formattr");
			
			var fd = new FormData(form);
	        fd.append("formtype",ths);
			fd.append("site",$("#site1").val());
			fd.append("tickettype",$("#tickettype1").val());
			fd.append("summary",$("#summary1").val());
			fd.append("description",$("#description1").val());
			fd.append("assignee",$("#assignee1").val());
			fd.append("priority",$("#priority1").val());
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>save_controller/save_ticket",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				success:function(data){
					Messenger().post({
			            message: 'Create Ticket Successful',
			            type: 'info',
			            showCloseButton: true
			        });
			        reloadwindow();
				},error:function(data){
					console.log(data)
				}
			});
		});
		$("body").on("submit","#updateticket2",function(e){
			e.preventDefault();
		    var form = document.querySelector("#updateticket2");
		    var ths = $(this).attr("formattr");
			var escalatecode = $("option:selected","#escalate_id").attr("attrusercode");
			var fd = new FormData(form);
	        fd.append("formtype",ths);
			fd.append("escalatecode", escalatecode);
			var esc = $("#escalate_id1").val();
			var attrsubtype = $("#attrsubtype").val();
			var status = $("#sub_status").val();
			var estimatedtime = $("#estimate_time").val();
			var timespent = $("#time_spent").val();
			if ($("#assign_by").val() == "0" && esc == "") {
				
				Messenger().post({
		            message: 'Please Assign this Ticket',
		            type: 'info',
		            showCloseButton: true
		        });
			}else{
				$.ajax({
					url:"<?php echo base_url();?>save_controller/save_ticket",
					type:"POST",
					processData:false,
					contentType:false,
					data:fd,
					success:function(data){

						Messenger().post({
				            message: 'Create Ticket Successful',
				            type: 'info',
				            showCloseButton: true
				        });
				        reloadwindow();
					},error:function(data){
						console.log(data)
					}
				});
			}
		});
		

		$("body").on("click",".ticketmodal",function(){
			// $(".previewimg1").hide();
			$(".allsubtaskbox").hide();
			var form = document.querySelector("#saveticket2");
			 form.reset();
		});
		$("body").on("dblclick","#description",function(){
			if ($("input[name='summary']").attr("attr") == "Super Admin") {
				$(this).attr("readonly",true);
			}else{
				$(this).attr("readonly",false);
			}
		})
		$("input[name='summary']").on("dblclick",function(){
			if ($(this).attr("attr") == "Super Admin") {
				$(this).attr("readonly",true);
			}else{
				$(this).attr("readonly",false);
			}
			
		});
		$("body").on("blur","#description",function(){
			$(this).attr("readonly",true);
		});
		$("input[name='summary']").on("blur",function(){
			$(this).attr("readonly",true);
		});

		
		$("body").on("click",".maintitle",function(){
			$("#editticketmodal").modal('show');
			var id = $(this).attr("ticketid");
			var status = $(this).attr("attrstatus");
			var attrsubtype = $(this).attr("attrsubtype");
			var ticket_code = $(this).attr("attrticket_code");
			var countpendingstatus = $(this).attr("attrcountstatus");
			var ticketstatus = $(this).attr("ticketstatus");
			var countmain = $(this).attr("countmain");
			var attrusercode = $(this).attr("attrusercode");
			var myusercode = "<?php echo $_SESSION['user_code'];?>";
			var attrusername =  $(this).attr("attrusername");

			$("#countmaintask").val(countmain);
			$("#attrsubtype").val(attrsubtype);
			$("#countpendingstatus").val(countpendingstatus);
			$("#saveticketbtn").attr("type","submit");
			$("#saveticketbtn").attr("disabled", false);
			$("#saveticketbtn").hide();
			$("#description").attr("readonly",true);
			$("input[name='summary']").attr("readonly",true);
			$("input[name='summary']").attr("attr",attrusername);




			if (ticketstatus == "3") {
				if (attrusername =="Super Admin"){

					$("#subtaskticketstatus").html(`
						<select class="form-control" name="ticket_status" id="ticket_status">
	                    	<option value="3" attrname="Done">Done</option>
	                    </select>
					`);
					$("#ticketstatusbox").html(`
						<select class="form-control" name="subtasks" id="sub_status">
	                    <option value="0" disabled selected>Select</option>
	                    <option value="1">Done</option>
	                  </select>
	                `);
	               
				}else{
					$("#subtaskticketstatus").html(`
						<select class="form-control" name="ticket_status" id="ticket_status">
	                    	<option value="5" attrname="Re-open">Re-open</option>
	                    	<option value="3" attrname="Done">Done</option>
	                    </select>
					`);
					$("#ticketstatusbox").html(`
						<select class="form-control" name="subtasks" id="sub_status">
	                    <option value="0" disabled selected>Select</option>
	                    <option value="1">Done</option>
	                  </select>
	                `);
	                $("#saveticketbtn").show();
				}
			
			}else if (parseInt(countpendingstatus) == '0' && ticketstatus !="3") {
				$("#subtaskticketstatus").html(`
					<select class="form-control" name="ticket_status" id="ticket_status">
                    	<option value="1" attrname="To-do" disabled>To-do</option>
                    	<option value="2" attrname="In-progress">In-progress</option>
                    	<option value="3" attrname="Done">Done</option>
                    </select>
				`);
				$("#ticketstatusbox").html(`
					<select class="form-control" name="subtasks" id="sub_status">
                    <option value="0" disabled selected>Select</option>
                    <option value="1">Done</option>
                    <option value="2">In-Progress</option>
                    <option value="3">Closed</option>
                  </select>
                  `);
			}else{

				if (countmain == 0 && ticketstatus == 1) {
					$("#subtaskticketstatus").html(`
						<select class="form-control" name="ticket_status" id="ticket_status">
	                    	<option value="1" attrname="To-do">To-do</option>
	                    	<option value="2" attrname="In-progress">In-progress</option>
	                    	<option value="3" attrname="Done" disabled>Done</option>
	                    </select>
					`);
					$("#ticketstatusbox").html(`
						<select class="form-control" name="subtasks" id="sub_status">
	                    <option value="0" disabled selected>Select</option>
	                    <option value="1" disabled>Done</option>
	                    <option value="2">In-Progress</option>
	                  </select>
	                  `);

					$("#estimated_time").attr("required",false);
					$("#time_spent").attr("required",false);
				}else{
					$("#subtaskticketstatus").html(`
						<select class="form-control" name="ticket_status" id="ticket_status">
	                    	<option value="1" attrname="To-do" disabled>To-do</option>
	                    	<option value="2" attrname="In-progress">In-progress</option>
	                    	<option value="3" attrname="Done" disabled>Done</option>
	                    </select>
					`);
					if (ticketstatus == 1) {
						$("#ticketstatusbox").html(`
							<select class="form-control" name="subtasks" id="sub_status">
		                    <option value="0" disabled selected>Select</option>
		                    <option value="2">In-Progress</option>
		                    <option value="3">Closed</option>
		                  </select>
		                  `);
					}else{
						$("#ticketstatusbox").html(`
							<select class="form-control" name="subtasks" id="sub_status">
		                    <option value="0" disabled selected>Select</option>
		                    <option value="1">Done</option>
		                    <option value="2">In-Progress</option>
		                    <option value="3">Closed</option>
		                  </select>
		                  `);
					}

					$("#estimated_time").attr("required",true);
					$("#time_spent").attr("required",true);
				}

			}
			if (attrsubtype == "Main" && status == "1") {
				$(".allsubtaskbox").show();
				$(".createtask").show();
				$(".subtaskstatustype").hide();

			}
			else if(attrsubtype == "Sub" ){
				$(".allsubtaskbox").hide();
				$(".createtask").hide();
				$(".subtaskstatustype").show();
				$(".tickettypebox").hide();
				if (ticketstatus == 1) {
					$("#ticketstatusbox").html(`
						<select class="form-control" name="subtasks" id="sub_status">
	                    <option value="0" disabled >Select</option>
	                    <option value="1" disabled>Done</option>
	                    <option value="2" selected>In-Progress</option>
	                    <option value="3">Closed</option>
	                  </select>
	                `);
					$("#estimated_time").attr("required",false);
					$("#time_spent").attr("required",false);
					
				}else{
					$("#ticketstatusbox").html(`
						<select class="form-control" name="subtasks" id="sub_status">
	                    <option value="0" disabled selected>Select</option>
	                    <option value="1">Done</option>
	                    <option value="2">In-Progress</option>
	                    <option value="3">Closed</option>
	                  </select>
	                `);
	                $("#estimated_time").attr("required",true);
					$("#time_spent").attr("required",true);
				}
			}else{
				if (ticketstatus == "3") {
					$(".createtask").hide();
					$("#attachmentclip1").attr("type","");
				}else{
					$(".createtask").show();
				}
				$(".allsubtaskbox").show();
				$(".tickettypebox").show();
				$(".subtaskstatustype").show();
			}
			if (attrusercode == 0 ) {
				$("#saveticketbtn").show();
			}else if (attrusercode == myusercode) {
				if (attrusername =="Super Admin" && ticketstatus == "3") {
					$("#saveticketbtn").hide();
				}else{
					$("#saveticketbtn").show();
				}
				
			}else if (attrusercode != myusercode  && ticketstatus == "2") {
				$("#saveticketbtn").hide();

				$("#saveticketbtn").attr("type","button");
				$(".createtask").hide();

			}else if (attrusercode != myusercode  && ticketstatus == "3") {
				$("#saveticketbtn").hide();
				$(".createtask").hide();
				$("#saveticketbtn").attr("type","button");
			}else{
				$(".createtask").show();
			}
			if (attrusername == "Super Admin") {
				$(".createtask").hide();
				$(".attachmentclip12").hide();
			}
			$.ajax({
					url:"<?php echo base_url();?>get_controller/getticketinformation",
					method:"POST",
					dataType:"JSON",
					data:{id:id,ticket_code:ticket_code,attrsubtype:attrsubtype},
					success:function(data){
						var prop = 0;
						
						for(prop in data.ticket){

							if (ticketstatus != "1") {
								if (data.ticket['estimated_time'] == 0) {
									$("input[name='estimated_time']").val("");
								}
								if (data.ticket['time_spent'] == 0) {
									$("input[name='time_spent']").val("");
								}
							}
							

							$("input[name="+prop+"]").val(data.ticket[prop]);
							$("select[name="+prop+"]").val(data.ticket[prop]);
							$("textarea[name="+prop+"]").val(data.ticket[prop]);
						}

						$(".previewimg1").html(data.attachment);
						$(".allsubtaskbox").html(data.allsubtask);
						
						if (data.allticketlogs != 0) {
							
							$("#allticketlogs").append(`
								<div class="p-0">
									<div class="col-md-12  allworklogsbox1">
										<div style="height:30vh;overflow-y:auto;" class="mt-2 "> `+data.allticketlogs+`</div>
									</div>
								</div>
							`);
						}else{
							$(".allworklogsbox1").html("No Logs Found!");
						}
						
						$("#allticketlogs").append(`
								<div class="p-0">
									<div style="height:30vh;overflow-y:auto;"  class="col-md-12   allworklogsbox"></div>
								</div>
						`);
						$("#allticketlogs").prepend(`<div class="p-3">
						<ul>
							<li class="historylog  p-2"><a href="#" attrlog="work">Work Log</a></li>
							<li class="historylog1 p-2"><a href="#" attrlog="history">History Log</a></li>
						    <button type="button" class="btn btn-default workbtn float-right btn-sm"><span class="fa fa-plus-circle"></span> Work description</button>
						</ul>
						</div>
						<div class="form-group col-md-12" id="timedescriptionbox">
	                       <div id="workdes">
	                       		<label>Work Description</label>
		                       <textarea class="md-textarea form-control" name="time_description1" id="time_description1" rows="2" ></textarea>
		                       <span id="timedes"></span>
			                    <div class="mt-2" style="height:30px;">
			                    	<button type="button" class="btn btn-default btn-sm float-right ml-3" id="closeworkdescription" taskattr="hide"><span class="fa fa-times"></span> Cancel</button>
			                    	<button type="button" id="submitworkdescription" class="btn  btn-sm  btn-primary float-right"><span class="fa fa-plus"></span> Post</button>
			                    </div>
	                       </div>
	                    </div>
						`);

						if (data.allescalatetask != 0) {
							$("#escalateboxs").html(`<label>Escalate By</label><div style="height:40vh;overflow-y:auto;">`+data.allescalatetask+`</div>`);
						}
						getallworkdesriptionfunction(id);


					},
					error:function(data){

					}
			});
		});
		$("body").on("click",".historylog",function(){
				$(".allworklogsbox1").hide();
				$(".allworklogsbox").show();
		});
		$("body").on("click",".historylog1",function(){
				$(".allworklogsbox").hide();
				$(".allworklogsbox1").show();
		});
		$("body").on("click",".workbtn",function(){
			$("#timedescriptionbox").show();
			$(".allworklogsbox1").hide();
			$(".allworklogsbox").show();
			$(this).hide();
		});
		$("body").on("click","#closeworkdescription",function(){
			$("#timedescriptionbox").hide();
			
			$(".workbtn").show();
		});
		$("body").on("click","#submitworkdescription",function(){
			var workdescription = $("#time_description1").val();
			var ticket_id = $("#ticketid").val();
			if (workdescription != "") {
				$.ajax({
					url:"<?php echo base_url();?>save_controller/save_workdescription",
					method:"POST",
					data:{data:workdescription,ticket_id:ticket_id},
					dataType:"JSON",
					success:function(response){
						$("#timedescriptionbox").hide();
						$(".allworklogsbox").prepend(response);
						$("#time_description1").val("");
						$(".allworklogsbox1").hide();
						$(".allworklogsbox").show();
						$(".workbtn").show();
						// getallworkdesriptionfunctionrow();
					},error:function(response){
						console.log("Something went wrong!");
					}
				});
				$("#timedes").html(``);
			}else{
				$("#timedes").html(`<div class="text-danger">Required this field!</div>`);
			}
		});
		$("body").on("click","#subtasktitle",function(){
			var id = $(this).attr("attrid1");
			var attrsubtype = $(this).attr("attrsubtype1");
			var attrusercode = $(this).attr("attrusercode");
			var ticket_code = $(this).attr("attrticket_code1");
			var myusercode = "<?php echo $_SESSION['user_code'];?>";
			if (attrsubtype == "Main") {
				$(".createtask").show();
				$(".allsubtaskbox,.previewimg1").show();
				$(".subtaskstatustype").hide();
			}else{
				$(".allsubtaskbox,.previewimg1").hide();
				$(".createtask").hide();
				$(".subtaskstatustype").show();
				$("#ticket_status").attr("readonly",true);
			}
			var user_code = "<?php echo $_SESSION['user_code'];?>";
			if (attrusercode == user_code) {
				$("#saveticketbtn").attr("type","button");
				$("#saveticketbtn").attr("disabled", true);
			}
			if (attrusercode == 0) {
				$("#saveticketbtn").show();
			}else if (attrusercode == myusercode) {
				
				$("#saveticketbtn").show();
			}else if (attrusercode != myusercode) {
				$("#saveticketbtn").hide();
				$("#saveticketbtn").attr("type","button");
			}
			$.ajax({
					url:"<?php echo base_url();?>get_controller/getticketinformation",
					method:"POST",
					dataType:"JSON",
					data:{id:id,ticket_code:ticket_code,attrsubtype:attrsubtype},
					success:function(data){
						var prop = 0;
						for(prop in data.ticket){
							$("input[name="+prop+"]").val(data.ticket[prop]);
							$("select[name="+prop+"]").val(data.ticket[prop]);
							$("textarea[name="+prop+"]").val(data.ticket[prop]);
						}

						$(".previewimg1").html(data.attachment);
						$(".allsubtaskbox").html(data.allsubtask);
						

						$("#allticketlogs").append(`
							<div class="p-0">
								<div class="col-md-12 allworklogsbox1">
									<div style="height:30vh;overflow-y:auto;" class="mt-2 "> `+data.allticketlogs+`</div>
								</div>
							</div>
						`);

						$("#allticketlogs").html(`
							<div class="p-0">
								<div style="height:30vh;overflow-y:auto;"  class="col-md-12 allworklogsbox"></div>
							</div>
						`);

						$("#allticketlogs").prepend(`<div class="p-3">
						<ul>
							<li class="historylog  p-2"><a href="#" attrlog="work">Work Log</a></li>
							<li class="historylog1 p-2"><a href="#" attrlog="history">History Log</a></li>
						    <button type="button" class="btn btn-default workbtn float-right btn-sm"><span class="fa fa-plus-circle"></span> Work description</button>
						</ul>
						</div>
						<div class="form-group col-md-12" id="timedescriptionbox">
	                       <label>Work Description</label>
	                       <textarea class="md-textarea form-control" name="time_description1" id="time_description1" rows="2" ></textarea>
		                    <div class="mt-2" style="height:30px;">
		                    	<button type="button" class="btn btn-default btn-sm float-right ml-3" id="closeworkdescription" taskattr="hide"><span class="fa fa-times"></span> Cancel</button>
		                    	<button type="button" id="submitworkdescription" class="btn  btn-sm  btn-primary float-right"><span class="fa fa-plus"></span> Post</button>
		                    </div>
	                    </div>
						`);

						if (data.allescalatetask != 0) {
							$("#escalateboxs").html(`<label>Escalate By</label><div style="height:40vh;overflow-y:auto;">`+data.allescalatetask+`</div>`);
						}
						getallworkdesriptionfunction(id);
					},
					error:function(data){

					}
			});
		});
		$("body").on("keyup","#searchticket",function(){
			var date = $("#orderby").val();
			var value = $(this).val();

			var attr = $("option:selected", "#orderby").attr("attrtype");
			var url3 = "<?php echo $this->uri->segment(3);?>";
			var sitecode = "<?php echo $this->get->encrypt_decrypt('decrypt',$this->uri->segment(4));?>";
			$.ajax({
    			url:"<?php echo base_url();?>get_controller/autocompleteurl",
    			type:"POST",
    			data:{value:value,url3:url3,sitecode:sitecode,date:date,attr:attr},
    			cache:false,
    			dataType:"JSON",
    			success:function(data){
					$(".todo").html(data.todo);
					$(".inprogress").html(data.inprogress);
					$(".done").html(data.done);
					$(".backlog").html(data.backlog);
    			},error:function(data){
    				
    			}
    		});
		});

		$("body").on("keyup","#estimated_time",function(){
			let unix_timestamp = $(this).val();
			// Create a new JavaScript Date object based on the timestamp
			var date = new Date(unix_timestamp * 1000);
			var iso = date.toISOString().match(/(\d{2}:\d{2}:\d{2})/)
			if (unix_timestamp == "") {
				$("#estimatetime").html("");
			}else{
				$("#estimatetime").html(iso[1]);
			}
		});
		
		$("body").on("keyup","#time_spent",function(){
			let unix_timestamp = $(this).val();
			// Create a new JavaScript Date object based on the timestamp
			var date = new Date(unix_timestamp * 1000);
			var iso = date.toISOString().match(/(\d{2}:\d{2}:\d{2})/)
			

			if (unix_timestamp == "") {
				$("#estimatetimespent").html("");
			}else{
				$("#estimatetimespent").html(iso[1]);
			}
		
		});
			
			
		$("body").on("click",".imgcloses1",function(){

	    	var id = $(this).attr("attrid");
	    	var ths = $(this);
	    	var tabl = "tbl_attachment";
	    	var col = "attachid";
	    	var path ="";
	    	if (confirm("are you sure wan to delete?")) {
	    		$.ajax({
	    			url:"<?php echo base_url();?>save_controller/deletfunction",
	    			type:"POST",
	    			data:{id:id,table:tabl,column:col,path:path},
	    			cache:false,
	    			success:function(data){
	    				Messenger().post({
				            message: 'Delete Successful!',
				            type: 'info',
				            showCloseButton: true
				        });
	    				$(".fileuploads"+id).remove();
	    			},error:function(data){
	    				Messenger().post({
				            message: 'Something went wrong!',
				            type: 'info',
				            showCloseButton: true
				        });
	    			}
	    		})
	    	}
		});

		

		$("body").on("change","#orderby",function(){
			var value = $("#searchticket").val();
			var date = $(this).val();
			var url3 = "<?php echo $this->uri->segment(3);?>";
			var attr = $("option:selected", this).attr("attrtype");
			var sitecode = "<?php echo $this->get->encrypt_decrypt('decrypt',$this->uri->segment(4));?>";
			$.ajax({
    			url:"<?php echo base_url();?>get_controller/autocompleteurl",
    			type:"POST",
    			data:{value:value,url3:url3,sitecode:sitecode,date:date,attr:attr},
    			cache:false,
    			dataType:"JSON",
    			success:function(data){
					$(".todo").html(data.todo);
					$(".inprogress").html(data.inprogress);
					$(".done").html(data.done);
					$(".backlog").html(data.backlog);
    			},error:function(data){
    				
    			}
    		});
		});

		$("body").on("click","#deletesitelist",function(){
	    	var ths = $(this);
	   	 	var id = $(this).attr("attrid");
	    	var tabl = "tbl_ticket";
	    	var col = "ticketid";
	    	if (confirm("are you sure wan to delete?")) {
	    		$.ajax({
	    			url:"<?php echo base_url();?>save_controller/deletfunction",
	    			type:"POST",
	    			data:{id:id,table:tabl,column:col},
	    			cache:false,
	    			success:function(data){
	    				Messenger().post({
				            message: 'Delete Successful!',
				            type: 'info',
				            showCloseButton: true
				        });
	    				ths.closest(".tickettr").remove();
	    			},error:function(data){
	    				Messenger().post({
				            message: 'Something went wrong!',
				            type: 'info',
				            showCloseButton: true
				        });
	    			}
	    		})
	    	}
		});

		$("body").on("click","#deleteworklog",function(){
	    	var ths = $(this);
	   	 	var id = $(this).attr("attrworkid");
	    	var tabl = "tbl_workdescription";
	    	var col = "work_id";
	    	if (confirm("are you sure wan to delete?")) {
	    		$.ajax({
	    			url:"<?php echo base_url();?>save_controller/deletfunction",
	    			type:"POST",
	    			data:{id:id,table:tabl,column:col},
	    			success:function(data){
	    				Messenger().post({
				            message: 'Delete Successful!',
				            type: 'info',
				            showCloseButton: true
				        });
	    				ths.closest(".workbox"+id).remove();
	    			},error:function(data){
	    				Messenger().post({
				            message: 'Something went wrong!',
				            type: 'info',
				            showCloseButton: true
				        });
	    			}
	    		})
	    	}
		});
		

		
		$('body').on("click","#createtaskbtn",function(){
			var site_code = "<?php echo $this->get->encrypt_decrypt('decrypt',$this->uri->segment(4));?>";
			var fd = new FormData();
				fd.append("site_code", site_code);
				fd.append("sub_task", $("#sub_task").val());
				fd.append("priority", $("#priority").val());
				fd.append("assign_by", $("#assign_by").val());
				fd.append("ticket_code", $("#ticket_code").val());
				fd.append("ticketid", $("#ticketid").val());

		     $.ajax({
				url:"<?php echo base_url();?>save_controller/save_subtask",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				dataType:"JSON",
				success:function(data){
					Messenger().post({
			            message: 'Create Subtask Successful',
			            type: 'info',
			            showCloseButton: true
			        });
			        $(".allsubtaskbox").append(data);
			        getticketlastrow();
				},error:function(data){
					console.log(data)
	            }
	        });
	    });


	    function getallsubtaskrow(){
			$.ajax({
				url:"<?php echo base_url();?>get_controller/getallticketsubtastrow",
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$(".allsubtaskbox").html(data);
				},error:function(data){
					console.log(data)
				}
			});
		}

		$("body").on("click",".closemodal",function(){
			$(".previewimg1").empty();
			$(".allsubtaskbox").empty();
			$("#allticketlogs").empty();
			var form = document.querySelector("#saveticket2");
			 form.reset();
		});
		$('body').on("click","#deletebtn",function(){
	        var ths = $(this);
	        var attrid = $(this).attr("attrid");
	        var tabl = "tbl_attachment";
	        var col = "attachid";
	    	var path = $(this).attr("attrfilename");
	    	$(".fileuploads"+attrid).remove();
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
	               

	            },error:function(data){
	                Messenger().post({
	                    message: 'Something went wrong!',
	                    type: 'info',
	                    showCloseButton: true
	                });
	            }
	        });
	    });

		$("body").on("change","#escalate_id1",function(){
			if ($(this).val() != "") {
				$("#escalatebox").show();
			}else{
				$("#escalatebox").hide();
			}
			var role_id = $(this).val();
			$.ajax({
	          	method:"POST",
	          	url:"<?php echo base_url();?>get_controller/get_roleassign",
	          	data:{id:role_id},
	          	dataType:"JSON",
	          	success:function(data){
	          		$("#escalate_id").html(data);
	          	},error:function(){
	          		
	          	}
	        });
		});
		$("body").on("click","#createtask",function(){
			var ths = $(this).attr("taskattr");
			if (ths == "show") {
				$("#subtaskbox").show();
			}else{
				$("#subtaskbox").hide();
			}
		});
		// $("body").on("keyup","#time_spent",function(){
		// 	var ths = $(this).val();
		// 	if (ths != "") {
		// 		$("#timedescriptionbox").show();
		// 	}else{
		// 		$("#timedescriptionbox").hide();
		// 	}
		// });
		
		function reloadwindow(){
			setTimeout(function(){
				window.location.href="";
			},300);
		}
		$('.connectedSortable .card-header').css('cursor', 'move');
		  // jQuery UI sortable for the todo list
		$('.connectedSortable').sortable({
		    placeholder         : 'sort-highlight',
		    dropOnEmpty: true,
		    over:function(event, ui){
		    	var dataattr = $(this).attr("attr");		    	
		    	var id = $(ui.helper[0]).attr("attrs");
		    	var checkstatus = $(ui.helper[0]).attr("checkstatus");
		    	// var attrname = $(ui.helper[0]).attr("attrname");
		    	// var attrcode = $(ui.helper[0]).attr("attrusercode");
		    	// var attrid = $(ui.helper[0]).attr("attrid");
		    	// if (dataattr == "Progress") {
		    	// 	$(".developmentlist1").removeClass('connectedSortable');
		    	// 	$(".developmentlist1").attr("attr","Progress");
		    	// }
		    	if (checkstatus == 0) {
		    		$('.done').addClass('connectedSortable  ui-sortable');
		    	}else{
		    		$('.done').removeClass('connectedSortable');
		    	}
		     	$('.maintitle').attr("checkstatus",checkstatus);
		     	$('.maintitle').attr("ticketstatus",dataattr);
		     	$('.maintitle').attr("ticketid",id);
		     	
		     	// $('.teamname').attr("attrteamname",attrname);
		     	// $('.teamname').attr("attrusercode",attrcode);
		     	// $('.teamname').attr("attrid",attrid);
		     	// $('.teamname').attr("attrtype",dataattr);

		    },
		    stop: function( event, ui ) {

	    		var checkstatus = $(this).attr("checkstatus");
	    		var dataattr1 = $(this).attr("attr");	
	    		var dataattr = $('.maintitle').attr("ticketstatus");	
	    		var id = $('.maintitle').attr("ticketid");
	    			
	    		if (checkstatus == 0) {
		    		$('.done').addClass('connectedSortable  ui-sortable');
		    	}else{
		    		$('.done').removeClass('connectedSortable');
		    	}
	    		// if (dataattr1 == "Progress") {
		    	// 	$(".developmentlist1").removeClass('connectedSortable');
		    	// 	$(".developmentlist1").attr("attr","Progress");
		    	// }
    			$.ajax({
		          	method:"POST",
		          	url:"<?php echo base_url();?>save_controller/update",
		          	data:{id:id,status:dataattr},
		          	success:function(data){
		          		window.location.href="";
		          	},error:function(){
		          		
		          	}
		        });
    			
		    },
		    connectWith         : '.connectedSortable',
		    handle              : '.card-header',
		    forcePlaceholderSize: true,
		    zIndex              : 999999
		 });
		

		function getallworkdesriptionfunction(ticketid){
			$.ajax({
	          	method:"GET",
	          	url:"<?php echo base_url();?>get_controller/getalldescriptionlist/"+ticketid,
	          	dataType:"JSON",
	          	success:function(data){
	          		if (data != 0) {
	          			$(".allworklogsbox").show();
	          			$(".allworklogsbox").append(data);
	          		}else{
	          			
	          			
	          		}
	          		
	          	},error:function(){
	          		
	          	}
	        });
		}

		function getallworkdesriptionfunctionrow(){
			$.ajax({
	          	method:"GET",
	          	url:"<?php echo base_url();?>get_controller/getalldescriptionlistrow/",
	          	dataType:"JSON",
	          	success:function(data){
	          		$(".allworklogsbox").prepend(data);
	          	},error:function(){
	          		
	          	}
	        });
		}
		function getticketlastrow(){
			$.ajax({
	          	method:"GET",
	          	url:"<?php echo base_url();?>get_controller/getticketlastrow",
	          	dataType:"JSON",
	          	success:function(data){
	          		$(".todo").prepend(data);
	          	},error:function(){
	          		
	          	}
	        });
		}

		
	});
</script>