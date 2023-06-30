<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{	
		$st = $conn->query("SELECT Status as st from `apply_form` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st =='2'){
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: "This  is not updated, b/c you are already Approved this Request ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
								window.location = "edit_requested.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php			
		}else {
			$Status=$_POST['Status'];	
			$Memo=$_POST['Memo'];	

			$result = mysqli_query($conn,"update apply_form set Memo='$Memo', Status='$Status' where id='$get_id'         
				"); 		
			if ($result) {		
				?>
				<Script>
					window.addEventListener('load',function(){
						swal.fire({
							title: "Success",
							text: "Record Successfully <?php echo $Status?>",
							icon: "success",
							button: "Ok Done!",
						})
						.then(function() {
									window.location = "edit_requested.php?edit=" + <?php echo ($get_id); ?>;
								});
					});			
				</Script>
			<?php					
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
								<h4> View Requested</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Requested.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Requested</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<!-- <div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Invoice Check </h4>
							<p class="mb-20"></p>
						</div>
					</div> -->
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									//$query = mysqli_query($conn,"SELECT user.Name ,  invoice_receipt.invoice ,invoice_receipt.Amount,invoice_receipt.Date,invoice_receipt.Memo,invoice_receipt.Status, invoice_receipt.File  FROM invoice_receipt INNER JOIN user ON   invoice_receipt.Cid=user.ID where invoice_receipt.id='$get_id'")or die(mysqli_error());
									
									$query = mysqli_query($conn,"SELECT * FROM apply_form where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Full Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>							

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label> Company Name :</label>
											<input name="Company_name" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Company_name']; ?>">
										</div>
									</div>								
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Email Address :</label>
											<input name="Email" type="gmail" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Email']; ?>">
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label >Phone Number :</label>
											<input name="Phone" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Phone']; ?>">
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label >Tell Number :</label>
											<input name="Phone" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Tell']; ?>">
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
											<label >Address :</label>
											<input name="Address" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Address']; ?>">
										</div>
									</div>		
										<?php $stats=$row['Status'];
										if($stats=="0"){
											$Status = "Pending";
										}elseif($stats=="1"){
											$Status = "Processing";
										}elseif($stats=="2"){
											$Status = "Approved";
										}elseif($stats=="3"){
											$Status = "Rejected";
										}
										?>								                                 
											

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<input name="Status" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $Status?>">
										</div>
									</div>		
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">									
              
												<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a>

											</div>
										</div>
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
                                    <h4 class="modal-title" id="myLargeModalLabel">Request Status</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM apply_form  where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">
                                            <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                         
											<div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Status :</label>
                                                    <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                        <option value="<?php echo $row['Status']; ?>"><?php echo $Status ?></option>
														<option value="1">Processing</option>
                                                        <option value="2">Approved</option>
                                                        <option value="3">Rejected</option>
                                                    </select>
                                                </div>
                                            </div>	   
                                          
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" name="Memo" required autocomplete="off" ><?php echo $row['Memo']; ?></textarea>
                                            </div>
                                                                                 
                                         
                                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="Update" class="btn btn-primary" >Done</button>
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