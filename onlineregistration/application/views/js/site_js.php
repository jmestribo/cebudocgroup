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
		$("body").on("submit","#savesite",function(e){
			e.preventDefault();

			var formattr = $(this).attr("formattr");
			var form = document.querySelector("#savesite");
			var name = form[name='site_name'].value;
			var fd = new FormData(form);
			fd.append("formtype",formattr);
			$(this).serialize();
			$.ajax({
				url:"<?php echo base_url();?>save_controller/save_site",
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

		$("body").on("click",".addsites",function(){
			var ths = $(this).attr("site_type");
			var projectid = $(this).attr("attrprojectid");
			var access = $(this).attr("attraccess");
			var projectname = $(this).attr("attrprojectname");
			var projectkey = $(this).attr("attrprojectkey");
			var user_lead = $(this).attr("user_lead");
			$("#pid").val(projectid);
			$("#project").val(projectname);
			$("#access").val(access);
			$("#key").val(projectkey);
			$("#user_lead").val(user_lead);
			if (ths == "add") {
				$("#savesite").attr("formattr","create");
				var form = document.querySelector("#savesite");
					form.reset();
			}else if(ths =="edit"){
				$("#savesite").attr("formattr","update");
			}
			$("#sitemodal").modal("show");

		});


		$("body").on("click","#deletesitelist",function(){
	    	var ths = $(this);
	   	 	var id = $(this).attr("attrid");
	    	var tabl = "tbl_sites";
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
				        
	    				ths.closest(".sitetr").remove();
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