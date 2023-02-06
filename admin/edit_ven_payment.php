<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['update_payment']))
	{
    $name=$_POST['name'];
	$Date=$_POST['Date'];  
	$PV=$_POST['PV']; 
	$Amount=$_POST['Amount']; 
	$memo=$_POST['memo']; 

	// $pdf=$_FILES['pdf']['name'];
	// $pdf_type=$_FILES['pdf']['type'];
	// $pdf_size=$_FILES['pdf']['size'];
	// $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
	// $pdf_store="Rvpdf/".$pdf;

	// move_uploaded_file($pdf_tem_loc,$pdf_store);

	$Vid = $conn->query("SELECT id as Vid from `user` where name='$name'  ")->fetch_assoc()['Vid'];

	$result = mysqli_query($conn,"update ven_payment set Vid='$Vid',   Date='$Date', V_payment='$PV',  Amount='$Amount', Memo='$memo' where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'vendor_payment.php'; </script>";
	

	} else{
	  die(mysqli_error());
   }		
}

?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Update Vendor Payment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Vendor_payment.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vendor Payment Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Vendor Payment Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>
								<div class="row">
									<?php
									$query = mysqli_query($conn,"SELECT user.Name, ven_payment.id, ven_payment.Vid,ven_payment.V_payment ,ven_payment.Amount,ven_payment.Date,ven_payment.Memo FROM ven_payment INNER JOIN user ON   ven_payment.Vid=user.ID  where ven_payment.id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
                                  
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Vendor Name :</label>
											<select name="name" id="name" class="custom-select form-control" required="true" autocomplete="off">
											<option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
												<option value="">Select Customer</option>
													<?php
													$query = mysqli_query($conn,"select * from user where role ='Vendor'");
													while($row = mysqli_fetch_array($query)){
													
													?>
												<option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>	
									<?php
									$query = mysqli_query($conn,"select * from ven_payment where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

									<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date</label>
												<input name="Date" class="form-control" required type="Date" value="<?php echo $row['Date']; ?>">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Vendor Paymet Number :</label>
											<input name="PV" type="text" placeholder="Vendor PV No#" class="form-control" required="true" autocomplete="off" value="<?php echo $row['V_payment']; ?>" >
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="Amount" type="text" placeholder="$00.00" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Amount']; ?>">
										</div>
									</div>
									
									<!-- <div class="">										
										<label for="">Choose Your PDF File</label><br>
										<input id="pdf" type="file" name="pdf" required value="Rvpdf/<?php echo $row['File']; ?>"><br><br>
									</div> -->

										<div class="col-md-12">
											<div class="form-group">
												<label>Memo / Description</label>
												<textarea name="memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text" ><?php echo $row['Memo']; ?></textarea>
											</div>
										</div>							
								</div>
																
								<div class="row">				
											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="update_payment" id="update-payment" data-toggle="modal">Update&nbsp;</button>
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