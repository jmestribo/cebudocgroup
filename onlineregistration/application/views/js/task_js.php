<script type="text/javascript">
	$(document).ready(function(){

		function getsite(){
			$.ajax({
				url:"<?php echo base_url();?>get_controller/getallsites",
				type:"GET",
				dataType:"JSON",
				success:function(data){
				
				},error:function(data){
					console.log(data)
				}
			});
		}
		$("body").on("submit","#savetask",function(e){
			e.preventDefault();
			var formattr = $(this).attr("formattr");
			var form = document.querySelector("#savetask");
			var fd = new FormData(form);
			fd.append("formtype",formattr);
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>save_controller/save_task",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				success:function(data){
					Messenger().post({
			            message: 'Create Task Successful',
			            type: 'info',
			            showCloseButton: true
			        });
			        // reloadwindow();
				},error:function(data){
					console.log(data)
				}
			});
		});

		$("body").on("click",".addtask",function(){
			var ths = $(this).attr("task_type");
			var attrtaskid = $(this).attr("attrtaskid");
			var attrtype = $(this).attr("attrtype");
			var attrname = $(this).attr("attrname");
			var attrtaskdescription = $(this).attr("attrtaskdescription");
			var attrselecteddate = $(this).attr("attrselecteddate");
			var attrtaskcode = $(this).attr("attrtaskcode");
			$("#taskid").val(attrtaskid);
			$("#name").val(attrname);
			$("#type").val(attrtype);
			$("#description").val(attrtaskdescription);
			$("#taskcode").val(attrtaskcode);

			if (ths == "add") {
				$("#savetask").attr("formattr","create");
				var form = document.querySelector("#savetask");
					form.reset();
					$("#taskmodal").modal("show");

			}else if(ths =="edit"){

				if (attrtype =="Daily") {

					$("#dailytask").show();
					$("#monthly").hide();
					$("#weekly").hide();
					
					var arr = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
					$('#selectdate').selectpicker('val', arr);

				}else if (attrtype =="Weekly") {

					$("#weekly").show();
					$("#dailytask").hide();
					$("#monthly").hide();
				}
				else if(attrtype =="Monthly"){

					$("#monthly").show();
					$("#dailytask").hide();
					$("#weekly").hide();
					$("input[name='selectdate']").val(attrselecteddate);
				}

				$("#savetask").attr("formattr","update");
				$("#taskmodal").modal("show");
			}
		});
		$("#dailytask").hide();
		$("#weekly").hide();
		$("#monthly").hide();
		$("body").on("change","#type",function(){
			var value = $(this).val();
			if (value == "Daily") {

				$("#dailytask").show();
				$("#monthly").hide();
				$("#weekly").hide();

			}else if (value == "Weekly"){

				$("#dailytask").hide();
				$("#monthly").hide();
				$("#weekly").show();

			}else if (value == "Monthly"){

				$("#dailytask").hide();
				$("#monthly").show();
				$("#weekly").hide();

			}else{
				$("#dailytask").hide();
				$("#monthly").hide();
				$("#weekly").hide();
			}

		});

		$("body").on("click","#deletesitelist",function(){
	    	var ths = $(this);
	   	 	var id = $(this).attr("attrid");
	    	var tabl = "tbl_taskmanager";
	    	var col = "id";
	    	if (confirm("are you sure wan to delete?")) {
	    		$.ajax({
	    			url:"<?php echo base_url();?>save_controller/deletfunction",
	    			type:"POST",
	    			data:{id:id,table:tabl,column:col},
	    			cache:false,
	    			success:function(data){
	    				Messenger().post({
				            message: 'Data was Successfuly deleted!',
				            type: 'info',
				            showCloseButton: true
				        });
	    				ths.closest(".tasktr").remove();
	    			},error:function(data){
	    				Messenger().post({
				            message: 'Data was Successfuly deleted!',
				            type: 'info',
				            showCloseButton: true
				        });
	    			}
	    		})
	    	}
		});


		function reloadwindow(){
			setTimeout(function(){
				window.location.href="";
			},300);
		}
		$('.connectedSortable .card-header').css('cursor', 'move');
		  // jQuery UI sortable for the todo list
		$('.connectedSortable').sortable({
		    placeholder         : 'sort-highlight',
		    connectWith         : '.connectedSortable',
		    handle              : '.card-header',
		    forcePlaceholderSize: true,
		    zIndex              : 999999
		 });
		
	});
</script>