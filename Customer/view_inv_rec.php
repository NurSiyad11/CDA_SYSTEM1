<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php 
$get_id = $_GET['edit']; 
$Cid = $conn->query("SELECT Cid as cid from `invoice` where id='$get_id'  ")->fetch_assoc()['cid'];
if($Cid != $session_id){
	
	echo "<script>alert('Un able to view thsi invoice');</script>";
	echo "<script type='text/javascript'> document.location = 'invoice_check.php'; </script>";
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
								<h4>Customer Invoice And Receipt View</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Transections.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">View</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue h4">Invoice And Receipt </h4> -->
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
								
									$query = mysqli_query($conn,"SELECT user.Name ,  invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status, invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Customer Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>							

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Invoice No# :</label>
											<input name="invoice" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo "INV# ".$row['invoice']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Amount :</label>
											<input name="order" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo "$ ".$row['Amount']; ?>">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-2 col-sm-12">
										<div class="form-group">
											<br><p> Description : </p>
										</div>
									</div>	
								
									<div class="col-md-10 col-sm-12">
										<div class="form-group">										
											<textarea name="memo" type="text" class="form-control" required="true" autocomplete="off" readonly ><?php echo $row['Memo']; ?></textarea>
										</div>
									</div>								
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Date Ordered :</label>
											<input name="date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Date']; ?>">
										</div>
									</div>							

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<input name="date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Status']; ?>">
										</div>
									</div>		
														
								</div>		
							</section>

							<section>							
								<div class="row">								
									<?php
																	
									$sql="SELECT File from invoice where id='$get_id' ";
									$query=mysqli_query($conn,$sql);
									while ($info=mysqli_fetch_array($query)) {
										if($info !=''){
										?>   
										<div class="col-12">										
									   		<a href="../admin/pdf/<?php echo $info['File'] ; ?>" download class="btn btn-primary">Download PDF</a>										
										</div>
										<embed type="application/pdf" src="../admin/pdf/<?php echo $info['File'] ; ?>" width="900" height="600">
										<?php
										}else{
											echo "No file found";                                     
										?>
										<?php
										}
										?>
									<?php
									}
									?>					
                                    
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
	<!-- <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script> -->




</body>
</html>