<div class="container mt-5"><br><br><br><br>
	<form action="<?php echo base_url();?>Healthful/upload_stories" method="post">
		<div class="row">
			<div class="col-md-6">
				<input type="text" name="uri_title" placeholder="uri_title" class="form-control"><br>

				<input type="text" name="thumbnail" placeholder="thumbnail" class="form-control" value="pressrelease/25yearsofmactan/thumbnail.jpg"><br>

				<input type="text" name="image" placeholder="image" class="form-control" value="pressrelease/25yearsofmactan/dsc08520-628x419.jpg"><br>

				<input type="text" name="keywords" placeholder="keywords" class="form-control"><br>

				<input type="text" name="title" placeholder="title" class="form-control"><br>

				<textarea rows="5" name="sub" placeholder="sub" class="form-control"></textarea><br>
				

			</div>

			<div class="col-md-6">
				
				<textarea rows="5" name="content" placeholder="content" class="form-control"></textarea><br>

				<textarea rows="5" name="slider" placeholder="slider" class="form-control"></textarea><br>

				<input type="text" name="date" placeholder="date" class="form-control"><br>

				<input type="text" name="type" placeholder="type" class="form-control"><br>

				<input type="submit" name="submit" placeholder="type" value="Submit" class="btn btn-primary">

			</div>

		</div>
	</form>
</div>
