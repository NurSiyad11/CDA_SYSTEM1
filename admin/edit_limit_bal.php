<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{	
        $Limit_bal = $_POST['Limit_bal'];
        $Memo = $_POST['Memo'];	

        $result = mysqli_query($conn,"update limit_customer_bal set Memo='$Memo', Limit_bal='$Limit_bal' where id='$get_id'         
            "); 		
        if ($result) {		
            ?>
            <Script>
                window.addEventListener('load',function(){
                    swal.fire({
                        title: "Success",
                        text: "Record Successfully Updated",
                        icon: "success",
                        button: "Ok Done!",
                    })
                    .then(function() {
                                window.location = "edit_limit_bal.php?edit=" + <?php echo ($get_id); ?>;
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
								<h4> View Limited Balance</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Limit_bal_manage.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Limite Balace Manage</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Email,  user.Phone, limit_customer_bal.id ,limit_customer_bal.Cid, limit_customer_bal.Admin_id,limit_customer_bal.Memo,limit_customer_bal.Limit_bal  FROM limit_customer_bal INNER JOIN user ON   limit_customer_bal.Cid=user.ID where limit_customer_bal.id='$get_id'")or die(mysqli_error());
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
											<input name="Company_name" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Com_name']; ?>">
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
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Phone Number :</label>
											<input name="Phone" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Phone']; ?>">
										</div>
									</div>									
								</div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label >Limited Balance :</label>
											<input name="Limit" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value=" <?php echo "$ ". number_format((float)$row['Limit_bal'], '2','.',','); ?>">
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
								<h4 class="modal-title" id="myLargeModalLabel">Update Limit Balance</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>                                    
							<div class="modal-body">
								
                                <?php 
                                $Company_name=$row['Com_name'];
                                $Cust_id = $conn->query("SELECT id as cid from `user` where Com_name='$Company_name'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');										
                                ?>	
								<form id="add-event" method=post>
									<div class="modal-body">																	
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label>Name :</label>
												<input name="Name" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Name'];?>">
											</div>
										</div> 
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label>Company Name :</label>
												<input name="Com_name" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Com_name'];?>">
											</div>
										</div> 

                                        <div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label>Current Balance :</label>
												<input name="Current_bal" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo "$ ". $format_balance; ?>">
											</div>
										</div>	
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label>Enter Limit Balance :</label>
												<input name="Limit_bal" type="number" placeholder="Enter Balace You Want To Limit" class="form-control"  required="true" autocomplete="off" value="<?php echo $row['Limit_bal']; ?>">    									
                                            </div>
										</div>   
									
										
										<div class="form-group">
											<label>Description  </label>
											<textarea class="form-control" name="Memo" placeholder="Enter The Description Here " required autocomplete="off" ><?php echo $row['Memo']; ?></textarea>
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