<?php
defined('BASEPATH') OR exit('');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PCR TESTING</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url();?>upload/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
    <body>

<?php
	$url3 = $this->uri->segment(3);
?>
<style type="text/css">
	table thead tr{
        border: 1px solid black !important;
    }
    tr td{
        border: 1px solid black !important;
    }
    tr th{
        border: 1px solid black !important;
    }
</style>
<div class=" p-4 margin-top-5">
	    <div class="row">
	        <div class="col-xs-12 text-right hidden-print">
	        </div>
	    </div>
	    <div class="row margin-top-5">
	        <div class="col-xs-12 table-responsive">
	            <div class="panel panel-default">
	                <!-- Default panel contents -->
	                <div class="panel-heading text-right mt-2 mb-2">
	                  <button class="btn btn-primary btn-sm" id="printbtn">PRINT</button>
	                  <button class="btn btn-danger btn-sm" id="cancelbtn">CANCEL</button>
	                </div>
	                <div class="" >
	                    <div class="d-flex " >
	                    <div class=" text-left" style="flex: 0.2;" >
	                        <div class="p-3" >
	                            <img src="<?php echo base_url();?>icon/cduh.png" alt="logo" style="width: 160px;height: 150px;">
	                        </div>
	                    </div>

	                    <div class="text-center" style="flex: 1; font-weight: bold; " >
	                            <div style="font-size: 1.4em;" class="mt-3">CEBU DOCTORS` UNIVERSITY HOSPITAL</div>
	                            <h5>Osmeña Blvd., Capitol Site, Cebu City 6000</h5>
	                            <h5>Tel. No. (+63) 255-5555</h5>
	                            <div>
		                            <div style="font-size: 1.3em; font-weight: bold; " class="mt-4"></div>
		                            <div style="font-size: 1.3em;  font-weight: bold; " class="mt-5">COVID-19 RT-PCR TESTING</div>
		                        </div>
	                    </div>

	                    <div class="  text-center" style="flex: 0.2;" >
	                        <div class="p-3" >
	                            <img src="<?php echo base_url();?>icon/cdghlogo-400x400-400x400.png" alt="logo" style="width: 160px;height: 150px;">
	                        </div>
	                    </div>
	                </div>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <tr class="text-left text-uppercase text-sm">
                                <th  style="width: 1vw !important;">#</th>
                                <th  style="width: 12vw !important;">DATE</th>
                                <th  style="width: 5vw !important;">TIME</th>
                                <th  style="width: 25vw !important;">NAME</th>
                                <th  style="width: 1vw !important;">Age</th>
                                <th  style="width: 1vw !important;">Gender</th>
                                <th  style="width: 1vw !important;">Remarks</th>
                              </tr>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        		$url5 = "1";
                        		$count = 1;
                        		$result = $this->get->patientreports($url3,$url5);
                        		$status = "";
                        		if (count($result) > 0) {
                        			foreach($result as $row){
	                        			$info = $this->get->listpatient($row->sid);
	                        			if ($row->paymentstatus == 0) {
											$status = "Unpaid";
										}else if ($row->paymentstatus == 1){
											$status = "Paid";
										}
	                        			echo '
	                        			<tr >
											<td style="width: 1vw !important;" >'.$count.'</td>
											<td style="width: 12vw !important;" >'.date('F d Y' ,strtotime($row->date)).'</td>
											<td style="width: 5vw !important;" >'.$row->time.'</td>
											<td style="width: 25vw !important;" >'.$info->lastname.', '.$info->firstname.' '.$info->middlename.' </td>
											<td style="width: 1vw !important;" >'.$info->age.'</td>
											<td style="width: 1vw !important;" >'.$info->gender.'</td>
											<td style="width: 1vw !important;" ><div >'.$status.'</div></td>
										</tr>
	                        			';
	                        			$count++;
	                        		}
                        		}else{
                        			echo '

										<tr>
			                        		<td colspan="8">
			                        			No record Found!!
			                        		</td>
			                        	</tr>
                        			';
                        		}
                        		
                        	?>
                        	<tr>
                        		<td colspan="8">
                        			<?= date('Y-m-d h:i:s a',strtotime("+16 Hours")); ?>
                        		</td>
                        	</tr>
                        </tbody>
                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>

<script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript">
  	$("body").on("click","#printbtn",function(){
  		$(this).hide();
  		$("#cancelbtn").hide();
  		window.print();
  		setTimeout(function(){
  			$("#printbtn").show();
  			$("#cancelbtn").show();
  		},2000);
  	});
  	$("body").on("click","#cancelbtn",function(){
  		window.close();
  	});
  	
 </script>