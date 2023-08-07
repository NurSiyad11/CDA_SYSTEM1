<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['Update']))
	{	
		$get_id=$_GET['edit'];
		$st = $conn->query("SELECT Status as st from `receipt` where id='$get_id'  ")->fetch_assoc()['st'];
		$Status=$_POST['Status'];	
		$Reason=$_POST['Reason'];
		$Ac_id=$_POST['Ac_id'];

		$query = mysqli_query($conn, "SELECT * FROM receipt where id='$get_id'") or die(mysqli_error());
		$row = mysqli_fetch_array($query);

		$Cid =$row['Cid'];
		$Com_name = $conn->query("SELECT Com_name as cm from `user` where ID='$Cid'  ")->fetch_assoc()['cm'];
		$RV =$row['RV'];
		$Date =$row['Date'];
		$Amount =$row['Amount'];
		$Memo =$row['Memo'];	

		


		if($st =='Approved'){
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: "This Receipt is not <?php echo $Status ?> , b/c you already Approved this Receipt ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_receipt.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php			
		}	
		elseif($Status =='Rejected') {	

			$result = mysqli_query($conn,"update receipt set Status='$Status', Reason='$Reason' where id='$get_id'         
				"); 		
			if ($result) {			
				?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Your  <?php echo $Status ?> This Receipt ",
						icon: "success",
						// button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_receipt.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php					
			} else{
			die(mysqli_error());
			}
			
		}			
		elseif($Ac_id ==''){		
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: " please select an account ",
						icon: "warning",
						// button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_receipt.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php				
		}elseif($Status =='Approved'){
			mysqli_query($conn,"INSERT INTO cash_receipt(Admin_id,name,Date,RV,Amount,Memo,Acc_id) VALUES('$session_id','$Com_name','$Date','$RV','$Amount','$Memo','$Ac_id')         
			") or die(mysqli_error());

			$result = mysqli_query($conn,"update receipt set Status='$Status', Reason='$Reason' where id='$get_id'         
				"); 		
			if ($result) {			
				?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Your  Approved This Receipt ",
						icon: "success",
						// button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_receipt.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php					
			} else{
			die(mysqli_error());
			}
		}	else {			
				?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Un Known Error ",
						icon: "success",					
					})
					.then(function() {
						window.location = "edit_receipt.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php					
			
			
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
								<h4>Update Receipt</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="All_Receipt.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Receipt Status Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Receipt Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>
								<div class="row">
									<?php
									$query = mysqli_query($conn,"SELECT user.Name, user.Com_name, receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Reason,receipt.File,receipt.Status FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Company Name :</label>
											<input name="com_name" class="form-control" readonly required type="text" value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>	
                                  	<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Customer Name :</label>
											<input name="name" class="form-control" readonly required type="text" value="<?php echo $row['Name']; ?>">
										</div>
									</div>																									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Receipt No# :</label>
											<input name="RV" type="number" placeholder="Receipt No#" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['RV']; ?>" >
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date : </label>
											<input name="Date" class="form-control" readonly required type="Date" value="<?php echo $row['Date']; ?>">
										</div>
									</div>	
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="Amount" type="text" placeholder="$00.00" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Amount']; ?>">
										</div>
									</div>	
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<input name="status" class="form-control" readonly required type="text" value="<?php echo $row['Status']; ?>">
										</div>
									</div>																
								</div>
								<?php 
									$sts = $conn->query("SELECT Status as st from `receipt` where id='$get_id'  ")->fetch_assoc()['st'];
									if($sts == 'Rejected'){										
								?>
								<div class="col-md-12">
									<div class="form-group">
										<label>Reason To Rejected</label>
										<textarea name="Reason" style="height: 3em;" readonly placeholder="Reason" class="form-control text_area" type="text" ><?php echo $row['Reason']; ?></textarea>
									</div>
								</div>								
								<?php } ?>
							
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="memo" style="height: 7em;" readonly placeholder="Description" class="form-control text_area" type="text" ><?php echo $row['Memo']; ?></textarea>
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<!-- <button class="btn btn-primary" name="update-receipt" id="update-receeipt" data-toggle="modal">Update&nbsp;Receipt</button> -->
												<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a>
											</div>
										</div>
									</div>
								</div>															
							
							</section>
						</form>
					</div>
				</div>     
				

				  <!-- Medium modal -->
				<div class="col-md-4 col-sm-12 mb-30">				
                    <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Receipt Status Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                               


								<div class="modal-body">
									<?php
									$query = mysqli_query($conn, "SELECT * FROM receipt where id='$get_id'") or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

									<form id="add-event" method=post>
										<div class="modal-body">									
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
												<label>Status :</label>
												<select name="Status" id="status" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>

													<option value="Approved">Approved</option>
													<option value="Rejected">Rejected</option>
												</select>
												</div>
											</div>												
											<div class="form-group" id="memo-div" style="display: none;">
												<label>Reason To Reject</label>
												<textarea class="form-control"  name="Reason"  autocomplete="off"><?php echo $row['Reason']; ?></textarea>
											</div>	
											
											<div class="col-md-12 col-sm-12" id="account-div" style="display: none;">
												<div class="form-group">
													<label>Account :</label>
													<select name="Ac_id"  class="custom-select form-control"  autocomplete="off">
														<option value="">Select Account</option>
															<?php
															$query = mysqli_query($conn,"select * from account");
															while($row = mysqli_fetch_array($query)){													
															?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['Acc_name']; ?></option>
															<?php } ?>
													</select>
												</div>
											</div>	
											
										</div>
										<div class="modal-footer">
											<button type="submit" name="Update" class="btn btn-primary">Done</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
			
								<script>
									// Get the select element and the memo-div element
									const statusSelect = document.getElementById('status');
									const memoDiv = document.getElementById('memo-div');
									const accountDiv = document.getElementById('account-div');

									// Add a change event listener to the select element
									statusSelect.addEventListener('change', function() {
										// If the selected value is "Rejected", show the memo-div element and hide the account-div element, otherwise hide the memo-div element and show the account-div element
										if (statusSelect.value === 'Rejected') {
										memoDiv.style.display = 'block';
										accountDiv.style.display = 'none';
										} else if (statusSelect.value === 'Approved') {
										memoDiv.style.display = 'none';
										accountDiv.style.display = 'block';
										} else {
										memoDiv.style.display = 'none';
										accountDiv.style.display = 'none';
										}
									});
								</script>


									<script>
									// // Get the select element and the memo-div element
									// const statusSelect = document.getElementById('status');									
									// const memoDiv = document.getElementById('memo-div');

									// // const statusSelect = document.getElementById('status');									
									// const accounDiv = document.getElementById('account-div');


									// // Add a change event listener to the select element
									// statusSelect.addEventListener('change', function() {
									// 	// If the selected value is "Rejected", show the memo-div element, otherwise hide it
									// 	if (statusSelect.value === 'Rejected') {
									// 	memoDiv.style.display = 'block';
									// 	}else if (statusSelect.value === 'Approved') {
									// 	accountDiv.style.display = 'block';
									// 	} else {
									// 	memoDiv.style.display = 'none';
									// 	}
									// });
									</script>    
									
									
                            </div>
                        </div>
                    </div>					
                </div>
				


			</div>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>