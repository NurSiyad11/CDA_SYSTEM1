<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>



<?php
	if(isset($_POST['apply']))
	{
	//$order_type=$_POST['order_type']; 
	$date=$_POST['date'];	
	$description=$_POST['description'];

	

	$pdf=$_FILES['pdf']['name'];
	$pdf_type=$_FILES['pdf']['type'];
	$pdf_size=$_FILES['pdf']['size'];
	$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
	$pdf_store="pdf/".$pdf;

	move_uploaded_file($pdf_tem_loc,$pdf_store);


	$Cid = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
 
	 



        mysqli_query($conn,"INSERT INTO tbl_order(Cid,Date,File,Reason,Status) VALUES('$Cid','$date','$pdf','$description','Pending')         
		") or die(mysqli_error()); ?>
		<script>alert('Apply order Successfully  Added');</script>;
		<script>
		window.location = "order_history.php"; 
		</script>
		<?php   
}

?>

<body>	
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pb-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Customer Order</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Apply Order</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


				<div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Order Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="apply_order.php" enctype="multipart/form-data">
							<section>

								<?php $query= mysqli_query($conn,"select * from user where id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
						
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Customer Name </label>
											<input name="name" type="text" class="form-control wizard-required" required="true" readonly autocomplete="off" value="<?php echo $row['Name']; ?>">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Company Name</label>
											<input name="text" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>						
								</div>
								
								

								
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>order Date :</label>
											<input name="date" type="date" class="form-control " required="true" autocomplete="off">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">											
											<label for="">Choose Your PDF File</label><br>
											<input id="pdf" type="file" name="pdf" value="" required="true"><br><br>
												
		
										</div>
									</div>

		



								</div>
								<div class="row">
									<div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Description :</label>
											<textarea id="textarea1" name="description" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"></textarea>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary"  name="apply" id="apply"  value="Upload" data-toggle="modal">Apply&nbsp;Order</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
					
				</div>






				

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>