<script type="text/javascript">
	$(document).ready(function(){
		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
	
		display_ticket();

		function display_ticket(){
			var url4 = "<?php echo $this->uri->segment(4);?>";
			var url5 = "<?php echo $this->uri->segment(5);?>";

			var searchfield = "search";

			var assigneeforusercode;
			if (url5 == "") {
				assigneeforusercode = "all";
			}else{
				assigneeforusercode = url5;
			}
			var approval;	
			if (url4 =="only-my-ticket") {

				approval = "waiting";
				owner = "only-my-ticket";

			}else if(url4 == "check-for-approval"){
				owner = "check-for-approval";
				approval = assigneeforusercode;

			}else if (url4 =="") {

				approval = "waiting";
				owner = "all-ticket";
			}
			$.ajax({
				url:"<?php echo base_url();?>get_controller/get_ticket/"+owner+'/'+approval+'/'+searchfield,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#todoresult").html(data.todo);
					$("#inprogressresult").html(data.inprogress);
					$("#doneresult").html(data.done);
					$("#backlogresult").html(data.backlog);
				},error:function(data){
					console.log(data)
				}
			});
		}

		$("body").on("submit","#searchform",function(e){

			e.preventDefault();
			var url4 = "<?php echo $this->uri->segment(4);?>";
			var searchfield1 = $("#searchticket").val();
			var searchfield;

			if (searchfield1 == "") {

				searchfield = "search";
				display_ticket();
			}else{

				searchfield = $("#searchticket").val();
			}

			var approval;	
			var url5 = "<?php echo $this->uri->segment(5);?>";

			if (url5 == "") {

				assigneeforusercode = "all";

			}else{

				assigneeforusercode = url5;
				
			}
			if (url4 =="only-my-ticket") {
				approval = assigneeforusercode;
				owner = "only-my-ticket";

			}else if(url4 == "check-for-approval"){

				owner = "check-for-approval";
				approval = assigneeforusercode;

			}else if (url4 =="") {

				approval = assigneeforusercode;
				owner = "all-ticket";
			}
			$.ajax({
				url:"<?php echo base_url();?>get_controller/get_ticket/"+owner+'/'+approval+'/'+searchfield,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#todoresult").html(data.todo);
					$("#inprogressresult").html(data.inprogress);
					$("#doneresult").html(data.done);
					$("#backlogresult").html(data.backlog);
				},error:function(data){
					console.log(data)
				}
			});
		});
		$("body").on("submit","#service_report-form",function(e){
			e.preventDefault();
			var formattr = $(this).attr("attrform");
			var form = document.querySelector("#service_report-form");
			var fd = new FormData(form);
			fd.append("formtype",formattr);
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>create_controller/add_services",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				success:function(data){
					
				 	// display_task();
				 	if (formattr == "create") {
				 		Toast.fire({
					        type: 'success',
					        title: ' Create Task Successful!'
					    });
				 		form.reset();
				 		$("#ticketno").val('IT'+data);
				 	}else{
				 		Toast.fire({
					        type: 'success',
					        title: ' Update Successful!'
					    });
				 	}
				 	
				},error:function(data){
					console.log(data)
				}
			});
		});

		
		$("body").on("submit","#create-issue-form",function(e){
			var  description = $('.compose-textarea').summernote('isEmpty') ? '' : $('.compose-textarea').summernote('code');
			e.preventDefault();
			var formattr = $(this).attr("attrform");
			var form = document.querySelector("#create-issue-form");
			var fd = new FormData(form);
			fd.append("formtype",formattr);
			$(this).serialize();
			
			if (description == "") {

				const Toast = Swal.mixin({
			      toast: true,
			      position: 'top-end',
			      showConfirmButton: false,
			      timer: 5000
			    });
				Toast.fire({
			        type: 'error',
			        title: ' Required Description!'
			    });
				
			}else if(description != ""){

				$.ajax({
					url:"<?php echo base_url();?>create_controller/ticket",
					type:"POST",
					processData:false,
					contentType:false,
					data:fd,
					success:function(data){
						Toast.fire({
					        type: 'success',
					        title: ' Create Ticket Successful'
					    });
					 	display_ticket();
					 	// $("#modal-lg").modal("hide");
					 	form.reset();
					 	// $('.select2').val("");
					 	// $('.select2').select2().trigger('change');
						$('textarea[name="description"]').summernote('code', "");
					},error:function(data){
						console.log(data)
					}
				});
			}

		});

		$("body").on("submit","#updateticketform",function(e){
			e.preventDefault();
			var formattr = $(this).attr("formattr");
			var form = document.querySelector("#updateticketform");
			var fd = new FormData(form);
			// fd.append("formtype",formattr);
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>update_controller/update",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				success:function(data){
					Toast.fire({
				        type: 'success',
				        title: ' Update Ticket Successful'
				    });
				 	display_ticket();
				},error:function(data){
					console.log("something went wrong!");
				}
			});
		});


		$("body").on("blur",".note-editable",function(e){
			var keyupvalue = $("#description").attr("keyup");
			var val;
			var id = $("#uid").val();
			var column;
			var nameassigne;
			var namereporter;
			var changecolumn = "Updated the Description";
			if (keyupvalue == "description") {
				val = $("#description").val();
				column = "description";
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						display_ticket();
					},error:function(data){
						console.log(data)
					}
				});
			}
		});
		
		$("body").on("blur",".keyup",function(){

			var keyupvalue = $(this).attr("keyup");
			var val;
			var id = $("#uid").val();
			var column;
			var nameassigne;
			var namereporter;
			var changecolumn;
			if (keyupvalue == "summary") {
				val = $(this).val();
				changecolumn = "Updated the Summary";

				column = "summary";
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						
						display_ticket();
						Toast.fire({
					        type: 'success',
					        title: ' Changed Successful!'
					    });
					},error:function(data){
						console.log(data)
					}
				});
			}

			else if (keyupvalue == "estimate") {
				val = $(this).val();
				column = "estimated_time";
				changecolumn = "Updated the Estimdated Time";

				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						display_ticket();
					},error:function(data){
						console.log(data)
					}
				});
			}

			else if (keyupvalue == "timespent") {
				val = $(this).val();
				column = "time_spent";
				changecolumn = "Updated the Time Spend";

				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						display_ticket();
					},error:function(data){
						console.log(data)
					}
				});
			}

		});

		$("body").on("change",".removeonkeychage",function(){
			Toast.fire({
		        type: 'error',
		        title: 'Please Pickup Only your ticket!'
		    });
		});

		$("body").on("change",".onkeychange",function(){
			var changecolumn;
			var keyupvalue = $(this).attr("keyup");
			var val;
			var id = $("#uid").val();
			var column;
			var nameassigne;
			var namereporter;
			
			if (keyupvalue == "development") {

				const Toast = Swal.mixin({
			      toast: true,
			      position: 'top-end',
			      showConfirmButton: false,
			      timer: 9000
			    });

				val = $(this).val();
				column = "issue_development";
				changecolumn = "Changed the Development Status";

				var estimate = $("#estimate").val();
				var timespent = $("#timespent").val();

				if (estimate == "") {
					Toast.fire({
				        type: 'error',
				        title: ' Estimated Time Required!'
				    });
				}else if (timespent == ""){
					Toast.fire({
				        type: 'error',
				        title: ' Time Spent Required!'
				    });
				}else{
					$.ajax({
						url:"<?php echo base_url();?>get_controller/get",
						type:"POST",
						cache: false,
						data:{val:val,column:column,id:id,changecolumn:changecolumn},
						success:function(data){

							display_ticket();

						},error:function(data){
							console.log(data)
						}
					});	
				}
				
			}
			else if (keyupvalue == "assignee") {
				val = $(this).val();
				column = "assignee";
				changecolumn = "Changed the Assignee";
				var nameassigne = $("option:selected","#uassignee").attr("attrname");
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn,assignee:nameassigne},
					success:function(data){
						display_ticket();
						Toast.fire({
					        type: 'success',
					        title: ' Changed Successful!'
					    });
					},error:function(data){
						console.log(data)
					}
				});
			}
			else if (keyupvalue == "status") {
				val = $(this).val();
				column = "ticket_status";
				changecolumn = "Changed the Status";

				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						display_ticket();
						Toast.fire({
					        type: 'success',
					        title: ' Changed Successful!'
					    });
					},error:function(data){
						console.log(data)
					}
				});
			}
			else if (keyupvalue == "priority") {
				val = $(this).val();
				column = "priority";
				changecolumn = "Changed the Priority";
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						display_ticket();
						Toast.fire({
					        type: 'success',
					        title: ' Changed Successful!'
					    });
					},error:function(data){
						console.log(data)
					}
				});
			}
			else if (keyupvalue == "reporter") {
				val = $(this).val();
				column = "reporter";
				changecolumn = "Changed the Reporter";

				var namereporter = $("option:selected","#ureporter").attr("attrname");
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:val,column:column,id:id,changecolumn:changecolumn,reporter:namereporter},
					success:function(data){
						display_ticket();
						Toast.fire({
					        type: 'success',
					        title: ' Changed Successful!'
					    });
					},error:function(data){
						console.log(data)
					}
				});
			}
			else if (keyupvalue == "escalate") {
				val = $(this).val();
				column = "escalate_by";
				changecolumn = "Escalated ticket to";
				var namereporter = $("option:selected","#escalate").attr("value");

				$.ajax({
					url:"<?php echo base_url();?>get_controller/get",
					type:"POST",
					cache: false,
					data:{val:namereporter,column:column,id:id,changecolumn:changecolumn},
					success:function(data){
						display_ticket();
						Toast.fire({
					        type: 'success',
					        title: ' Changed Successful!'
					    });
					},error:function(data){
						console.log(data)
					}
				});
			}
			
		});

		$("body").on("click","#submitsubtask",function(){
			var formattr = $(this).attr("attrform");
			var form = document.querySelector("#updateticketform");
			var fd = new FormData(form);
			var focus = $("#focus").val();
			fd.append("formtype",formattr);
			$(this).serialize();
			if (focus == "") {
				Toast.fire({
			        type: 'error',
			        title: ' Subtask Field Required!'
			    });
			}else{
				$.ajax({
					url:"<?php echo base_url();?>create_controller/ticket",
					type:"POST",
					processData:false,
					contentType:false,
					data:fd,
					success:function(data){
						Toast.fire({
					        type: 'success',
					        title: ' Create Subtask Successful'
					    });
						$("#subtaskfield").empty();
						$.ajax({
							url:"<?php echo base_url();?>get_controller/getlastrowticket",
							type:"GET",
							dataType:"JSON",
							success:function(data){
								$("#subtaskfield1").append(data);
							}
						});
						display_ticket();
					},error:function(data){
						console.log("something went wrong!");
					}
				});

				
			}

		});

		$("body").on("click","#submitComment",function(){

			var focus = $("#focus1").val();
			var ucode = $("#ucode").val();
			var type = $(this).attr("attrupdatecomment");
			var attrid = $(this).attr("attrid");
			if (focus == "") {
				Toast.fire({
			        type: 'error',
			        title: ' Comment Field Required!'
			    });
			}else{
				$.ajax({
					url:"<?php echo base_url();?>create_controller/comment",
					type:"POST",
					data:{data:focus,ucode:ucode,type:type,attrid:attrid},
					success:function(data){
						Toast.fire({
					        type: 'success',
					        title: ' Add Comment Successful'
					    });
						$("#addcommentfield").show();
						$("#commentfield").empty();
						$.ajax({
							url:"<?php echo base_url();?>get_controller/getcommentlastrow/"+ucode,
							type:"GET",
							dataType:"JSON",
							success:function(data){
							
								$("#displaycomment").html(data.list);

								$("#addcomentread").focus();
							}
						});

						display_ticket();
					},error:function(data){
						console.log("something went wrong!");
					}
				});

			}

		});


		$("body").on("click","#deletefile",function(){

	    	var id = $(this).attr("attach_id");
	    	var ths = $(this);
	    	var tabl = "tbl_ticket_attachment";
	    	var col = "attach_id";
	    	var path = $(this).attr("attrpath");
	    	Swal.fire({
			  title: "Are you sure you want to Delete?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonText: "Yes, delete it!",
			  confirmButtonClass: "btn-danger",
			  closeOnConfirm: false
			}).then((result) => {
				if (result.value) {
			    	$.ajax({
		    			url:"<?php echo base_url();?>delete_controller/deletefunction",
		    			type:"POST",
		    			data:{id:id,table:tabl,column:col,path:path},
		    			cache:false,
		    			success:function(data){
		    				Swal.fire(
						      'Deleted!',
						      'Attachment has been deleted.',
						      'success'
						    )
		    				ths.closest(".fileuploads").remove();
		    			},error:function(data){
		    				Toast.fire({
						        type: 'error',
						        title: 'Something went wrong!'
						    });
		    			}
		    		})
			  	}
			})
	    	
		});

		$("body").on("click",".deletecomment",function(){
			var id = $(this).attr("attrid");
			var ths = $(this);
			Swal.fire({
			  title: "Are you sure you want to Delete?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonText: "Yes, delete it!",
			  confirmButtonClass: "btn-danger",
			  closeOnConfirm: false
			}).then((result) => {
			if (result.value) {
			  	
		    	var tabl = "tbl_ticket_activity";
		    	var col = "act_id";
		    	var path = "";

			    $.ajax({
	    			url:"<?php echo base_url();?>delete_controller/deletefunction",
	    			type:"POST",
	    			data:{id:id,table:tabl,column:col,path:path},
	    			cache:false,
	    			success:function(data){
	    				Swal.fire(
					      'Deleted!',
					      'Your Comment has been deleted.',
					      'success'
					    )
	    				ths.closest(".post").remove();
	    			},error:function(data){
	    				Toast.fire({
					        type: 'error',
					        title: 'Something went wrong!'
					    });
	    			}
	    		})
			  }
			})
			
		 });


		$('.connectedSortable .card-header').css('cursor', 'move');
		  // jQuery UI sortable for the todo list
		$('.connectedSortable').sortable({
		    placeholder         : 'sort-highlight',
		    dropOnEmpty: true,
		    over:function(event, ui){
		    	var dataattr = $(this).attr("attr");
		    	var id = $(ui.helper[0]).attr("ticketid");
		    	var ticketcode = $(ui.helper[0]).attr("ticket_code");
		     	$('.viewticket').attr("ticketstatus",dataattr);
		     	$('.viewticket').attr("ticket_code",ticketcode);
		     	$('.viewticket').attr("ticketid",id);
		    },
		    stop: function( event, ui ) {
	    		var dataattr = $('.viewticket').attr("ticketstatus");	
	    		var id = $('.viewticket').attr("ticketid");
	    		var ticket_code = $('.viewticket').attr("ticket_code");
    			$.ajax({
		          	method:"POST",
		          	url:"<?php echo base_url();?>create_controller/update",
		          	data:{id:id,status:dataattr,ticket_code:ticket_code},
		          	success:function(data){
		          		display_ticket();

		          	},error:function(){

		          	}
		        });
		    },
		    connectWith         : '.connectedSortable',
		    handle              : '.card-header',
		    forcePlaceholderSize: true,
		    zIndex              : 999999
		 });


		 $("body").on("click","#createticket",function(){
      

	        var openmodalwidth;
	        var openmodalHeight;
	          openmodalwidth = (window.screen.width / 2) - (810 + 10);
	          openmodalHeight = (window.screen.height / 2) - (560 + 50);
	        

	        //Open the window.

	        var windowfeatures = "width=1620,height=1420,toolbar=no,addressbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,left=" + openmodalwidth + ",top=" + openmodalHeight + ",screenX=" + openmodalwidth + ",screenY=" + openmodalHeight + "";


	        var location = "<?php echo base_url();?>";
	        window.open(location+"Helpdesk/open_modal","print", windowfeatures);
	    });
	});
	
</script>
