<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{	
		$get_id=$_GET['edit'];
		$st = $conn->query("SELECT Status as st from `invoice` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st =='Approved'){
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: "This invoice is not updated, b/c your Already Approved this invoice ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
								window.location = "edit_invoice_check.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php			
		}else {
			$Status=$_POST['Status'];	
			$Memo=$_POST['Memo'];	

			$result = mysqli_query($conn,"update invoice set Memo='$Memo', Status='$Status' where id='$get_id'         
				"); 		
			if ($result) {		
				?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Your <?php echo $Status ?>  This Invoice ",
						icon: "success",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_invoice_check.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php	
				
				// echo "<script>alert('Record Successfully Updated');</script>";
				// echo "<script type='text/javascript'> document.location = 'invoice_check.php'; </script>";
				// header('location: edit_invoice_check.php');
			} else{
			die(mysqli_error());
		}	
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
								<h4>Customer Invoice Check</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="invoice_check.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoice Check</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Invoice Check </h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									//$query = mysqli_query($conn,"SELECT user.Name ,  invoice_receipt.invoice ,invoice_receipt.Amount,invoice_receipt.Date,invoice_receipt.Memo,invoice_receipt.Status, invoice_receipt.File  FROM invoice_receipt INNER JOIN user ON   invoice_receipt.Cid=user.ID where invoice_receipt.id='$get_id'")or die(mysqli_error());
									
									$query = mysqli_query($conn,"SELECT user.Name ,  invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status, invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
								<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

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
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">								
              
												<!-- <button class="btn btn-primary" name="Order_check" id="Order_check" data-toggle="modal">Update&nbsp;Invoice_Check</button> -->
												<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a>

											</div>
										</div>
									</div>							
								</div>		
							</section>

							<section>
								<div class="row">
									<div class="col-12">
										<?php
										
										$sql="SELECT File from invoice where id='$get_id' ";
										$query=mysqli_query($conn,$sql);
										while ($info=mysqli_fetch_array($query)) {
											?>
											<!-- <a href="download.php?file=<?php echo $row['File'] ?>">Download</a><br> -->

											<?php
											if($info !=''){
											?>        
												<!-- <a href="download.php?file=<?php echo $row['File'] ?>">Download</a><br>                                -->
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
                                    
                                </div>
							</section>
						</form>
					</div>
				</div>


				
                <!-- Take Action Medium modal -->
                <div class="col-md-4 col-sm-12 mb-30">				
                    <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Invoice Status Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM invoice  where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">
                                            <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                         
											<div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Status :</label>
                                                    <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                        <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                                                    
                                                        <option value="Approved">Approved</option>
                                                        <option value="Rejected">Rejected</option>
                                                    </select>
                                                </div>
                                            </div>	   
                                          
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" name="Memo" required autocomplete="off" ><?php echo $row['Memo']; ?> 
                                                </textarea>
                                            </div>
                                                                                 
                                         
                                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="Update" class="btn btn-primary" >Update</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
									
                                </div>
                               
                            </div>
                        </div>
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