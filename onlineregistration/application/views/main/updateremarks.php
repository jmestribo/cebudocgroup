	<?php
	$urlsched = $this->uri->segment(3);
	$urlpid= $this->uri->segment(4);
	?>

	<div class="container">
		<div class="card  mt-4">
			<div class="card-body ">
				<form action="<?php echo base_url();?>PatientInformation/submitremarks" method="post">
					<label>REMARKS</label>
					<div class="input-group mb-3">
				        <select class="form-control" name="remarks">
							<option value="">Select Remark</option>
							<option value="1">Paid</option>
							<option value="0">Unpaid</option>
						</select>
						<input type="hidden" name="schedid" value="<?php echo $urlsched;?>">
						<input type="hidden" name="pid" value="<?php echo $urlpid;?>">
				     </div>
				     <div>
				     	<button type="submit" class="btn btn-primary btn-block btn-sm">SUBMIT</button>
				     </div>
				</form>
			</div>
		</div>
	</div>
