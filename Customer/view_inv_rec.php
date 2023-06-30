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



<style>
	.pdf-container {
  position: relative;
  width: 100%;
  height: 0;
  padding-top: 100%; /* 1:1 aspect ratio */
  overflow: hidden;
}

#pdf-viewer {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

@media (max-width: 768px) {
  .pdf-container {
    padding-top: 150%; /* 2:3 aspect ratio */
  }
}
</style>










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
									// $inv = $conn->query("SELECT invoice as invoice from `invoice` where id='$get_id'  ")->fetch_assoc()['invoice'];
									// $Rv = $conn->query("SELECT RV as Rv from `receipt` where id='$get_id'  ")->fetch_assoc()['Rv'];
									// $query = mysqli_query($conn,"SELECT user.Name as Name,  invoice.invoice, invoice.Amount as Amount, invoice.Date as Date, invoice.Memo as Memo, invoice.Status as Status, invoice.File as File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.id='$get_id' and invoice.Cid='$session_id' and invoice.invoice='$inv' UNION All SELECT  user.Name as Name, receipt.RV, receipt.Amount as Amount, receipt.Date as Date, receipt.Memo as Memo, receipt.Status as Status, receipt.File as File From receipt INNER JOIN user ON receipt.Cid=user.ID  where receipt.id='$get_id' and receipt.Cid='$session_id' and receipt.RV='$Rv' ")or die(mysqli_error());
									
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
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
											<?php
												// $query2 = "SELECT * FROM invoice_receipt where id='$get_id' ";
												// $run2 = mysqli_query($conn,$query2);
												
												// $row = mysqli_fetch_assoc($run2);
													?>
												<!-- <a href="download.php?file=<?php// echo $rows['filename'] ?>">Download</a><br> -->
												<?php
												//}
												?>
											<!-- <a href="download.php?file=<?php //echo $row['File'] ?>">Download</a><br> -->
              
												<!-- <button class="btn btn-primary" name="Order_check" id="Order_check" data-toggle="modal">Update&nbsp;Invoice_Check</button> -->
											
												<!-- <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a> -->

											</div>
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


				
                <!-- Take Action Medium modal -->
                <!-- <div class="col-md-4 col-sm-12 mb-30">				
                    <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Invoice Status Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM invoice where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">
                                         
                                         
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
                </div> -->














			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
	<!-- <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script> -->




</body>
</html>