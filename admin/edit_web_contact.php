<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{
	
	$Status=$_POST['Status'];	
	$Memo=$_POST['Memo'];  

	// $date = new DateTime();
	// $date->modify('+2 hour');
	// $date1 = $date->format("Y-m-d-D - h:i:s a");

	//$uid = $conn->query("SELECT id as uid from `user` where id='$session_id'  ")->fetch_assoc()['uid'];


	$result = mysqli_query($conn,"update web_contact set Status='$Status',Memo='$Memo' where id='$get_id'         
		"); 		
	if ($result) {
		?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Record Successfully Updated",
						icon: "success",						
					})
					.then(function() {
								window.location = "edit_web_contact.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
		<?php
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
								<h4>Web Contact </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Web_contact.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Web Contact View</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<!-- <div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">View Reply Support</h4>
							<p class="mb-20"></p>
						</div>
					</div> -->
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT * FROM web_contact  where id='$get_id'")or die(mysqli_error());
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
											<label >Email:</label>
											<input name="Email" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Email']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Numner :</label>
											<input name="phone" type="Text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Phone']; ?>">
										</div>
									</div>
									
								</div>

								<!-- <div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label >Title :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Title']; ?>">
										</div>
									</div>	
								</div> -->

								
								<div class="row">
									<div class="col-md-1">
									<label>Message </label>
									</div>
									<div class="col-md-11">
										<div class="form-group">
											<textarea name="Message" style="height: 10em;" placeholder="Description" readonly class="form-control text_area" type="text" ><?php echo $row['Message']; ?></textarea>
										</div>
									</div>
								</div>
								

								<div class="row">

									<div class="col-md-3 col-sm-12">
                                        <?php
                                        $sts= $row['Status'];
                                        if($sts == 0){
                                            $Stats="Pending";
                                        } elseif($sts == 1){
                                            $Stats ="Done";
                                        }
                                         ?>
										<div class="form-group">
											<label >Sattus:</label>
											<input name="Status" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $Stats ?>">
										</div>
									</div>	
									<div class="col-md-9 col-sm-12">
										<div class="form-group">
											<label >Description:</label>
											<input name="meomo" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Memo']; ?>">
										</div>
									</div>

									<!-- <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Time Replyed :</label>
											<input name="Date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Time_admin']; ?>">
										</div>
									</div>								 -->
								</div>

								<!-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Replied</label>
											<textarea name="reply" style="height: 5em;" readonly placeholder="Waiting To Reply" required="true" class="form-control text_area" type="text" ><?php echo $row['Reply']; ?></textarea>
										</div>
									</div>
								</div>							 -->
					
								
								<div class="row">					
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<!-- <button class="btn btn-primary" name="Update" id="Update" data-toggle="modal">Reply&nbsp;Support</button> -->
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
                                    <h4 class="modal-title" id="myLargeModalLabel">Reply </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM web_contact  where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">                                          
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
												<label>Status :</label>
												<select name="Status" id="status" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $Stats ?>"><?php echo $Stats ?></option>								
													<option value="0">Pending</option>
													<option value="1">Done</option>
												</select>
												</div>
											</div>	   
                                          
                                            <div class="form-group">
												<label>Description</label>
												<textarea class="form-control"  name="Memo"  required autocomplete="off"><?php echo $row['Memo']; ?></textarea>
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