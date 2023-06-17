<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{	
	$Status=$_POST['Status'];	
	$Reason_RJ=$_POST['Reason_RJ'];	

	$st = $conn->query("SELECT Status as st from `tbl_order` where id='$get_id'  ")->fetch_assoc()['st'];

	if($st =='Approved'){
		?>
	<Script>
			window.addEventListener('load',function(){
			swal.fire({
				title: "Warning",
				text: "You Can`t able to make  <?php echo $Status?>, b/c You are already Approved",
				icon: "warning",
				button: "Ok Done!",				
				
			})
			.then(function() {
				window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
					});			
		});			
	</Script>
		<?php			
	}else {

		$result = mysqli_query($conn,"update tbl_order set Status='$Status', Reason_RJ='$Reason_RJ', Admin_id='$session_id'  where id='$get_id'         
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
								window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
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
								<h4>Customer Order</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="All_order.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Orders</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Customer Order </h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT user.Name,user.Email, user.Picture, tbl_order.id, tbl_order.Date, tbl_order.Reason, tbl_order.Reason_RJ, tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >


								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>						
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Email']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Date Ordered :</label>
											<input name="date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Date']; ?>">
										</div>
									</div>	
								</div>


								<div class="row">														
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Message From Customer  :</label>
											<input name="Resson" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Reason']; ?>">
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status  :</label>
											<input name="Status" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Status']; ?>">
										</div>
									</div>	
								
									<?php 
										$sts = $conn->query("SELECT Status as st from `tbl_order` where id='$get_id'  ")->fetch_assoc()['st'];
										if($sts == 'Reject'){										
									?>
									<div class="col-md-8">
										<div class="form-group">
											<label>Reason To Rejected</label>
											<textarea name="Reason" style="height: 3em;" readonly placeholder="Reason" class="form-control text_area" type="text" ><?php echo $row['Reason_RJ']; ?></textarea>
										</div>
									</div>																
									<?php } ?>
								</div>
								<!-- <div class="row">									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<select name="Status" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php //echo $row['Status']; ?>"><?php //echo $row['Status']; ?></option>
												<option value="Preparing">Preparing Order</option>
												<option value="Approved">Approved Order</option>
												<option value="Reject">Reject Order</option>
											</select>
										</div>
									</div>	
								</div>					 -->
								
								<div class="row">							
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<!-- <button class="btn btn-primary" name="order" id="order" data-toggle="modal">Apply&nbsp;Order</button> -->
												<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a>

											</div>
										</div>
									</div>
								</div>
							</section>

							<!-- PDF Oredr Dispaly  -->
							<section>
                                <div class="row">
                                    <?php
                                    
                                    $sql="SELECT file from tbl_order where id='$get_id' ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info !=''){
                                           ?>                                       
                                            <embed type="application/pdf" src="../Customer/pdf/<?php echo $info['file'] ; ?>" width="900" height="500">
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
                <div class="col-md-4 col-sm-12 mb-30">				
                    <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Order Status Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM tbl_order  where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">
                                            <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                         
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
												<label>Status :</label>
												<select name="Status" id="status" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
													<option value="Preparing">Preparing</option>									
													<option value="Approved">Approved</option>
													<option value="Reject">Rejected</option>
												</select>
												</div>
											</div>	   
                                          
                                            <div class="form-group" id="memo-div" style="display: none;">
												<label>Reason To Reject</label>
												<textarea class="form-control"  name="Reason_RJ"  autocomplete="off"><?php echo $row['Reason_RJ']; ?></textarea>
											</div>	                                                                           
                                                                                
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="Update" class="btn btn-primary" >Done</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>									
                                </div>
								<script>
									// Get the select element and the memo-div element
									const statusSelect = document.getElementById('status');
									const memoDiv = document.getElementById('memo-div');

									// Add a change event listener to the select element
									statusSelect.addEventListener('change', function() {
										// If the selected value is "Rejected", show the memo-div element, otherwise hide it
										if (statusSelect.value === 'Reject') {
										memoDiv.style.display = 'block';
										} else {
										memoDiv.style.display = 'none';
										}
									});
								</script>  
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