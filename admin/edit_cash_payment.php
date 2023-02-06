<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>

<?php

	if(isset($_POST['update-Payment']))
	{
    $name=$_POST['name'];	
	$Date=$_POST['Date'];  
	$PV=$_POST['PV'];
	$Amount=$_POST['Amount']; 
	$memo=$_POST['memo']; 

	$result = mysqli_query($conn,"update cash_payment set  name='$name',  Date='$Date', PV='$PV',  Amount='$Amount', Memo='$memo' where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'cash_payment.php'; </script>";
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
								<h4>Update Cash Payment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="cash_payment.php">Back to Cash Payment</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cash Payment Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Cash Payment Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
                                    <?php
									$query = mysqli_query($conn,"select * from cash_payment where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>                             
								<div class="row">
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Payee  :</label>
											<input name="name" type="text" class="form-control" required="true"  value="<?php echo $row['name']; ?>">
										</div>
									</div>	
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date</label>
											<input name="Date" class="form-control" type="Date" value="<?php echo $row['Date']; ?>">
										</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Payment Number :</label>
											<input name="PV" type="text" placeholder="Payment No#" class="form-control" required="true" autocomplete="off" value="<?php echo $row['PV']; ?>" >
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
												<button class="btn btn-primary" name="update-Payment" id="update-Payment" data-toggle="modal">Update&nbsp;Cash_Payment</button>
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