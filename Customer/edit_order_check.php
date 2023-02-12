<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Order_check']))
	{
	
	$Status=$_POST['Status'];
	

	$result = mysqli_query($conn,"update invoice set Status='$Status' where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'order_check.php'; </script>";
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
								<h4>Customer Order Check</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="order_check.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Order Check</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Check Order </h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT user.Name ,  invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.id='$get_id'")or die(mysqli_error());
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
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Date Ordered :</label>
											<input name="date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Date']; ?>">
										</div>
									</div>							

									<div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Description :</label>
											<input name="memo" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Memo']; ?>">
										</div>
									</div>								
								</div>

								<div class="row">
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<select name="Status" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>

												<option value="Approved">Approved</option>
												<option value="Reject">Reject</option>
												
											</select>
										</div>
									</div>									
								</div>					
								
								<div class="row">					
									
									

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="Order_check" id="Order_check" data-toggle="modal">Apply&nbsp;Order_Check</button>
											</div>
										</div>
									</div>
								</div>
							</section>

							<section>
								<div class="row">
                                    <?php
                                    
                                    $sql="SELECT File from invoice_receipt where id='$get_id' ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info !=''){
                                           ?>                                       
                                            <embed type="application/pdf" src="../admin/pdf/<?php echo $info['File'] ; ?>" width="900" height="500">
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
</body>
</html>