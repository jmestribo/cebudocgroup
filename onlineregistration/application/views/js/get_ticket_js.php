<script type="text/javascript">
	$(document).ready(function(){
		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });


		$("body").on("click",".viewticket",function(){
			var id = $(this).attr("ticketid");
			var ticketcode = $(this).attr("ticket_code");
			var subtaskcode = "<?php echo date("Ymdhis",strtotime("+5 Hours"));?>";
			$("#usubtaskcode").val(subtaskcode);
			$("#usubtaskcode").attr("type","hidden");
			$("#modal-xl").modal("show");
			
			$.ajax({
				url:"<?php echo base_url();?>get_controller/get_ticketid/"+ticketcode,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$(".modal-title").html('UPDATE ISSUE -> '+ data.ticket_code);
					$("input[name='u-id']").val(data.id);
					$("input[name='u-code']").val(data.ticket_code);
					$("input[name='u-summary']").val(data.summary);
					$('select[name="u-assignee"]').val(data.assignee);
					$('input[name="u-issue_type"]').val(data.issue_type);
					$('input[name="u-companycode"]').val(data.company_code);
					$('select[name="u-escalate"]').val(data.escalate_by);
					$('select[name="u-development"]').val(data.issue_development);
					$('select[name="u-status"]').val(data.ticket_status);
					$('select[name="u-reporter"]').val(data.reporter);
					$('select[name="u-priority"]').val(data.priority);
					$('input[name="u-estimate"]').val(data.estimated_time);
					$('input[name="u-timespent"]').val(data.time_spent);
					$('input[name="u-datecreated"]').val(data.date_created);
					$('#u-description').val(data.description);
					$('textarea[name="u-description"]').summernote('code', data.description);
					
					// $("#updateticketform .note-editor.note-frame .note-editing-area .note-editable").css("height","70px");
					// $("#updateticketform .note-editor.note-frame .note-editing-area .note-editable").css("border","none");
					if (data.ticket_task == '1') {
						$("#subtaskbox").show();
					}else if (data.ticket_task == "2") {
						$("#subtaskbox").hide();
					}

					
					var usercode = "<?php echo $_SESSION['user_code'];?>";
					var usertype = "<?php echo $_SESSION['user_type'];?>";

					if (usertype == "Admin" || usertype == "Super Admin") {
						
						$("#udevelopment").find("option[value='Todo']").attr("disabled",false);
						$("#udevelopment").find("option[value='Inprogress']").attr("disabled",false);
						$("#udevelopment").find("option[value='Done']").attr("disabled",false);

						$("#submitsubtask").show();
						$("#savechanges").show();
						$("#savechanges").attr("type","submit");
						$(".removeonkeychage").addClass("onkeychange");
						$(".removekeyup").addClass("keyup");

					}else{

						if (data.issue_development == 'Todo') {
							$("#udevelopment").find("option[value='Todo']").attr("disabled",false);
							$("#udevelopment").find("option[value='Inprogress']").attr("disabled",false);
							$("#udevelopment").find("option[value='Done']").attr("disabled",true);
						}
						else if (data.issue_development == 'Inprogress') {
							$("#udevelopment").find("option[value='Todo']").attr("disabled",true);
							$("#udevelopment").find("option[value='Inprogress']").attr("disabled",false);
							$("#udevelopment").find("option[value='Done']").attr("disabled",false);
						}
						else if (data.issue_development == 'Done') {
							$("#udevelopment").find("option[value='Todo']").attr("disabled",true);
							$("#udevelopment").find("option[value='Inprogress']").attr("disabled",true);
							$("#udevelopment").find("option[value='Done']").attr("disabled",false);

						}
						if (data.assignee == usercode) {

							if (data.issue_development == "Done" ) {

								$("#savechanges").attr("type","button");
								$("#savechanges").hide();
								$("#submitsubtask").hide();
								$(".onkeychange").addClass("removeonkeychage");
								$(".keyup").addClass("removekeyup");
								$(".removeonkeychage").removeClass("onkeychange");
								$(".removekeyup").removeClass("keyup");

							}else{

								$("#submitsubtask").show();
								$("#savechanges").show();
								$("#savechanges").attr("type","submit");
								$(".removeonkeychage").addClass("onkeychange");
								$(".removekeyup").addClass("keyup");

							}

							
						}else{

							if (usertype == "Admin" || usertype == "Super Admin") {
								$("#submitsubtask").show();
								$("#savechanges").show();
								$("#savechanges").attr("type","submit");
								$(".removeonkeychage").addClass("onkeychange");
								$(".removekeyup").addClass("keyup");
							}else{
								$("#savechanges").attr("type","button");
								$("#savechanges").hide();
								$("#submitsubtask").hide();
								$(".onkeychange").addClass("removeonkeychage");
								$(".keyup").addClass("removekeyup");
								$(".removeonkeychage").removeClass("onkeychange");
								$(".removekeyup").removeClass("keyup");
							}
							
						}
					}

					$('.select2').select2().trigger('blur');

				},error:function(data){

					console.log(data)

				}

			});

			$.ajax({
				url:"<?php echo base_url();?>get_controller/getticketsubtask/"+ticketcode,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#subtaskfield1").html(data.allsubtask);
					$("#attachfile").html(data.fileattach);
				},error:function(data){
					console.log(data)
				}
			});

			$.ajax({
				url:"<?php echo base_url();?>get_controller/getcommentlastrow/"+ticketcode,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#displaycomment").html(data.list);
					$("#displaycomment1").html(data.historylist);
					$("#displaycomment2").html(data.worklog);
				}

			});

		});

		$("body").on("click","#closesubtask",function(){
			$("#subtaskfield").empty();
		});

		$("body").on("click","#closecomment",function(){
			$("#addcommentfield").show();
			$("#commentfield").empty();
			
		});

		$("body").on("click","#closecomment1",function(){
			var d = $(this);
			$(".editcomment").removeClass("fieldbox");
			$("#fieldbox").remove();
			$(".editcomment").show();
			$(".deletecomment").show();
			
		});
		
		$("body").on("click","#closefile",function(){
			var ths = $(this);
			ths.closest(".fileuploads").remove();
		});

		$("body").on("click",".editcomment",function(){
			$(this).addClass('fieldbox');
			var id = $(this).attr("attrid");
			$(".editcomment").hide();
			$(".deletecomment").hide();

			var text = $(this).attr("attcomment");
			$("#addcommentfield").hide();
			$(".fieldbox").before(`
				<div class="row mb-2" id="fieldbox">
					<div class="col-12"><textarea type="text" class="form-control" autocomplete="off" id="focus1" placeholder="Work Description..." name="u-comment" style="height:20px auto;">`+text+`</textarea></div>
					<div class="col-12 mt-2">
						<button class="btn btn-sm btn-default float-right" type="button" id="closecomment1"> CANCEL </button>
						<button class="btn btn-sm btn-primary float-right mr-2" type="button" attrupdatecomment="update" attrid=`+id+` id="submitComment"><span class="fas fa-plus"></span> SAVE </button>
					</div>
				</div>`);
			
		});
		

		$("body").on("click","#subtaskbtn",function(){
			var usercode = "<?php echo $_SESSION['user_code'];?>";
			var user_type = "<?php echo $_SESSION['user_type'];?>";
			var uassignee = $("#uassignee").val();
			var ureporter = $("#ureporter").val();
			var udevelopment = $("#udevelopment").val();

			$("#subtaskfield").html(`
				<div class="row mb-2">
					<div class="col-12"><input type="text" class="form-control" autocomplete="off" id="focus" placeholder="Enter Subtask" name="u-subtask"></div>
					<div class="col-12 mt-2">
						<button class="btn btn-sm btn-default float-right" id="closesubtask"> CANCEL </button>
						<button class="btn btn-sm btn-default float-right mr-2" type="button" attrform="update" id="submitsubtask"><span class="fas fa-plus"></span> CREATE </button>
					</div>
				</div>
			`);
			if (user_type == "Admin" || user_type == "Super Admin") {
					
				$("#submitsubtask").show();

			}else{
				$("#submitsubtask").hide();
			}
			$("#focus").focus();
		});

		$("body").on("click","#addcommentfield",function(){
			$(this).hide();
			$("#commentfield").html(`
				<div class="row mb-2">
					<div class="col-12"><textarea type="text" class="form-control" autocomplete="off" id="focus1" placeholder="Work Description...." name="u-comment"></textarea></div>
					<div class="col-12 mt-2">
						<button class="btn btn-sm btn-default float-right" type="button" id="closecomment"> CANCEL </button>
						<button class="btn btn-sm btn-primary float-right mr-2" type="button" attrupdatecomment="create" attrid="" id="submitComment"><span class="fas fa-plus"></span> SAVE </button>
					</div>                       
				</div>
			`);
			$("#focus1").focus();
		});
		

		$("body").on("click",".note-editable",function(){
			
			$("#updateticketform .note-editor.note-frame .note-editing-area .note-editable").css("height","150px");
			$("#updateticketform .card-header.note-toolbar").css("display","block");
			$("#updateticketform .note-resizebar").css("display","block");
			
		});

		$('body').on('change',"#attachmentclip",function(event) {
        
	        var total_file=document.getElementById("attachmentclip").files.length;
	        
	        for(var i=0;i<total_file;i++)
	         {
	            var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
	            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
	                
	            }
	            var filename = event.target.files[i].name;
	            $('#attachfile').append(`
	                <div class="row fileuploads">
						<div class="col-12">
							<div class="card text-uppercase card-outline card-warning collapsed-card">
			                  <div class="card-header p-2">
			                    <h3 class="card-title username " ><a href="#">`+filename+`</a></h3>
			                    <div class="card-tools">
			                      <button type="button" class="btn btn-tool"  id="closefile"><a href="#"><span class="fas fa-trash"></span></a></i>
			                      </button>
			                    </div>
			                  </div>
			                </div>
						</div>
					</div>

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
	            $('#attachfile1').append(`
	                <div class="row fileuploads">
						<div class="col-12">
							<div class="card text-uppercase card-outline card-warning collapsed-card">
			                  <div class="card-header p-2">
			                    <h3 class="card-title username " ><a href="#">`+filename+`</a></h3>
			                    <div class="card-tools">
			                      <button type="button" class="btn btn-tool"  id="closefile"><a href="#"><span class="fas fa-trash"></span></a></i>
			                      </button>
			                    </div>
			                  </div>
			                </div>
						</div>
					</div>
	            `);
	         }
    	});
	});
</script>