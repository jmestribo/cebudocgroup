<script type="text/javascript">
	$(document).ready(function(){
		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
	
		display_task();
		function display_task(){
			var val = "get";
			$.ajax({
				url:"<?php echo base_url();?>get_controller/getalltaskmanager/"+val,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#displayalltask").html(data);
				},error:function(data){
					console.log(data)
				}
			});
		}
		$("body").on("submit","#searchtastform",function(e){
			e.preventDefault();
			var val = $("#searchtask").val();
			if (val == "") {
				display_task();
			}else{
				$.ajax({
					url:"<?php echo base_url();?>get_controller/getalltaskmanager/"+val,
					type:"GET",
					dataType:"JSON",
					success:function(data){
						$("#displayalltask").html(data);
					},error:function(data){
						console.log(data)
					}
				});
			}
		})
		
		$("body").on("submit","#create-task-form",function(e){
			e.preventDefault();

			var formattr = $(this).attr("attrform");
			var form = document.querySelector("#create-task-form");
			var fd = new FormData(form);
			fd.append("formtype",formattr);
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>create_controller/create_task",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				success:function(data){
					
				 	display_task();
				 	if (formattr == "create") {
				 		Toast.fire({
					        type: 'success',
					        title: ' Create Task Successful!'
					    });
				 		form.reset();
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

		$("body").on("click",".viewtask",function(){

			$("#modaltask-lg").modal("show");
			$("#create-task-form").attr("attrform","update");
			var $id = $(this).attr("attrid");

			if ($id == "") {
				$(".modal-title").html('CREATE TASK');

				$("#create-task-form").attr("attrform","create");
				var form = document.querySelector("#create-task-form");
				form.reset();
				$("#displaytaskbox").empty();
				$("#displaytaskstatus").empty();

			}else{
				$(".modal-title").html('UPDATE TASK');
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get_taskinfo/"+$id,
					type:"GET",
					dataType:"JSON",
					success:function(data){

						$("input[name='task_id']").val(data.id);
						$("input[name='task']").val(data.task);
						$("textarea[name='taskdescription']").val(data.task_description);
						$('select[name="tasktype"]').val(data.type);

						if (data.type == "Weekly") {
							$("#displaytaskbox").html(`
								<div class="col-lg-12">
					              <label>SELECT DAY</label>
					              <div class="form-group">
					                <select class="form-control" name="selecteddate" value="`+data.selected_type+`"  style="width: 100%;" required>
					                  <option>Monday</option>
					                  <option>Tuesday</option>
					                  <option>Wednesday</option>
					                  <option>Thursday</option>
					                  <option>Friday</option>
					                  <option>Saturday</option>
					                  <option>Sunday</option>
					                </select>
					              </div>
					            </div>`
					        );
						}else if (data.type == "Monthly") {
							$("#displaytaskbox").html(`
								<div class="col-lg-12">
					              <label>EVERY OF THE MONTH</label>
					              <div class="form-group">
					              	<input type="number" class="form-control" id="selecteddate"  onKeyPress="if(this.value.length==2) return false;" name="selecteddate" required>
					              </div>
					            </div>`
					        );
						}else{
							$("#displaytaskbox").html(`<input type="hidden" value="`+data.selected_type+`" class="form-control" name="selecteddate">`);
						}

						$('input[name="selecteddate"]').val(data.selected_type);

						$("#displaytaskstatus").html(`
							<div class="col-lg-12">
					              <label>SELECT STATUS</label>
					              <div class="form-group">
					                <select class="form-control" name="status"  style="width: 100%;" required>
					                  <option>Active</option>
					                  <option>In Active</option>
					                  <option>Delete</option>
					                </select>
					              </div>
					    	</div>`
					   	);
						$('select[name="status"]').val(data.status);

					},error:function(data){
						console.log(data)
					}
				});
			}
			
		});


		$("body").on("change","#tasktype",function(){
			var task = $("#tasktype").val();
			if (task == "Weekly") {
				$("#displaytaskbox").html(`
					<div class="col-lg-12">
		              <label>SELECT DAY</label>
		              <div class="form-group">
		                <select class="form-control" name="selecteddate"  style="width: 100%;" required>
		                  <option>Monday</option>
		                  <option>Tuesday</option>
		                  <option>Wednesday</option>
		                  <option>Thursday</option>
		                  <option>Friday</option>
		                  <option>Saturday</option>
		                  <option>Sunday</option>
		                </select>
		              </div>
		            </div>`
		        );

			}else if (task == "Monthly") {

				$("#displaytaskbox").html(`
					<div class="col-lg-12">
		              <label>EVERY OF THE MONTH</label>
		              <div class="form-group">
		              	<input type="number" class="form-control" id="selecteddate" onKeyPress="if(this.value.length==2) return false;" name="selecteddate" required>
		              </div>
		            </div>`
		        );
			}else{
				$("#displaytaskbox").html(`<input type="hidden" class="form-control" name="selecteddate">`);
			}
		});

	});
	
</script>
