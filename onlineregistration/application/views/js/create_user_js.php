<script type="text/javascript">
	$(document).ready(function(){
		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
	
		var url = "<?php echo $this->uri->segment(3);?>";
		if (url == "role") {
			display_userrole();
		}else{
			display_user();
		}
		function display_user(){
			var val = "get";
			$.ajax({
				url:"<?php echo base_url();?>get_controller/get_userinformation/"+val,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#displayalluser").html(data.userlist);
				},error:function(data){
					console.log(data)
				}
			});
		}

		function display_userrole(){
			var val = "get";
			$.ajax({
				url:"<?php echo base_url();?>get_controller/getuserlist_role/"+val,
				type:"GET",
				dataType:"JSON",
				success:function(data){
					$("#displayuserrole").html(data);
				},error:function(data){
					console.log(data)
				}
			});
		}

		$("body").on("submit","#searchuserform",function(e){
			e.preventDefault();
			var val = $("#searchuser").val();
			if (val == "") {
				display_user();
			}else{
				$.ajax({
					url:"<?php echo base_url();?>get_controller/get_userinformation/"+val,
					type:"GET",
					dataType:"JSON",
					success:function(data){
						$("#displayalluser").html(data.userlist);
					},error:function(data){
						console.log(data)
					}
				});
			}
		})
		$("body").on("submit","#searchuserform1",function(e){
			e.preventDefault();
			var val = $("#searchuser").val();
			if (val == "") {
				display_userrole();
			}else{
				$.ajax({
					url:"<?php echo base_url();?>get_controller/getuserlist_role/"+val,
					type:"GET",
					dataType:"JSON",
					success:function(data){
						$("#displayuserrole").html(data);
					},error:function(data){
						console.log(data)
					}
				});
			}
		})

		$("body").on("submit","#create-user-form",function(e){
			e.preventDefault();
			var formattr = $(this).attr("attrform");
			var form = document.querySelector("#create-user-form");
			var fd = new FormData(form);
			fd.append("formtype",formattr);
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>create_controller/create_user",
				type:"POST",
				processData:false,
				contentType:false,
				data:fd,
				success:function(data){
					
				 	display_user();
				 	if (formattr == "create") {
				 		Toast.fire({
					        type: 'success',
					        title: ' Add User Successful!'
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


		$("body").on("click",".viewuserinfo",function(){
			$("#modaluser-lg").modal("show");
			var usercode = $(this).attr("user_code");
			$("#create-user-form").attr("attrform","update");
			
			if (usercode == "") {

				$("#create-user-form").attr("attrform","create");
				var form = document.querySelector("#create-user-form");
				form.reset();
				$(".modal-title").html('CREATE NEW USER');
			}else{
				
				$(".modal-title").html('UPDATE USER');

				$.ajax({
					url:"<?php echo base_url();?>get_controller/get_userinfo/"+usercode,
					type:"GET",
					dataType:"JSON",
					success:function(data){

						$("input[name='user_id']").val(data.user_id);
						$("input[name='user_code']").val(data.user_code);
						$("input[name='firstname']").val(data.firstname);
						$('input[name="lastname"]').val(data.lastname);
						$('input[name="middlename"]').val(data.middlename);
						$('input[name="email"]').val(data.email);
						$('input[name="password"]').val(data.password_text);
						$('input[name="local"]').val(data.local);
						$('input[name="ipaddress"]').val(data.ipaddress);
						$('input[name="age"]').val(data.age);
						$('input[name="contact"]').val(data.contact);
						$('select[name="user_status"]').val(data.status);
						$('select[name="user_type"]').val(data.user_type);
						$('select[name="position"]').val(data.position);
						$('select[name="useraction"]').val(data.action);
						$('.select2').select2().trigger('change');
						$("#password").attr("type","text");
						var usertype = "<?php echo $_SESSION['user_type'];?>";
						var usercodesession = "<?php echo $_SESSION['user_code'];?>";
						if (usertype != "User") {
							$(".passwordbox").show();
							$(".passwordbox1").show();
							$(".passwordbox2").show();
							$(".passwordbox3").show();
							$("#submituserbtn").show();

						}else{

							if (data.user_code == usercodesession) {

								$(".passwordbox").show();
								$(".passwordbox1").hide();
								$(".passwordbox2").hide();
								$(".passwordbox3").show();
								$("#submituserbtn").show();
								$("#submituserbtn").attr("type","submit");

							}else{

								$(".passwordbox").hide();
								$(".passwordbox1").hide();
								$(".passwordbox2").hide();
								$(".passwordbox3").show();
								$("#submituserbtn").hide();
								$("#submituserbtn").attr("type","button");

							}
						}

					},error:function(data){
						console.log(data)
					}
				});
			}
			
		});

		

	});
	
</script>
