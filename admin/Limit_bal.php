<?php include('includes/header.php');?>
<?php include('../database/session.php');?>
<?php include('../database/db.php');?>
<?php include('includes/Administrator_only.php');?>


<?php
	if(isset($_POST['Save']))
	{
	$Name = $_POST['Name'];
	$Com_name = $_POST['Com_name'];
	$Limit_bal = $_POST['Limit_bal'];
	$Memo = $_POST['Memo'];

	$admin_id = $conn->query("SELECT ID as id from `user` where ID='$session_id' ")->fetch_assoc()['id'];
	$CID = $conn->query("SELECT ID as id from `user` where Com_name = '$Com_name' ")->fetch_assoc()['id']; 

	$query = mysqli_query($conn,"select * from limit_customer_bal where  Cid = '$CID' ")or die(mysqli_error());
	$count = mysqli_num_rows($query);     
	 

    if ($count > 0){ ?>
		<script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Warning",
					text: "Customer Balance Already Limited ",
					icon: "warning",
					button: "Ok Done!",			
				})
				.then(function() {
						window.location = "Limit_bal.php";
					});
			});
		</script>
	<?php
	}else{
        mysqli_query($conn,"INSERT INTO limit_customer_bal(Cid,Admin_id,Limit_bal,Memo) VALUES('$CID','$admin_id','$Limit_bal','$Memo')         
		") or die(mysqli_error()); ?>

		<script>    
		   window.addEventListener('load',function(){
			   swal.fire({
				   title: "Succcess",
				   text: "Customer Balance Successfully Limited ",
				   icon: "success",
				   button: "Ok Done!",		   
			   })
			   .then(function() {
						   window.location = "Limit_bal.php";
					   });  
		   });   
	   	</script>
		<?php   
	}
}
?>


<!-- 
	<script type="text/javascript">
		function letterOnly(input){
			var regex = /[^a-z ]/gi;
			input.value =input.value.replace(regex, "");
		}
		
	</script> -->
<body>	
<?php include('includes/navbar.php') ?>
<?php include('includes/right_sidebar.php') ?>
<?php include('includes/left_sidebar.php') ?>
<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Limit Customer Balance </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Limit Customer Balance</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="Limit_bal_manage.php" role="button" >
								View Customer Bal Limited
								</a>                      
							</div>
						</div>
					</div>
				</div>			

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4> Limit Customer Balanced</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="Com_name" id="nid" class="custom-select form-control" required="true" autocomplete="off">
                                        <option value="">Select Customer</option>
                                            <?php
                                            $query = mysqli_query($conn,"select * from user where role ='Customer'");
                                            while($row = mysqli_fetch_array($query)){													
                                            ?>
                                        <option value="<?php echo $row['Com_name']; ?>"><?php echo $row['Com_name']; ?> </option>
                                            <?php } ?>
                                    </select>
                                
                                
                                    <!-- <input type="text" name="User_gmail" value="<?php// if (isset($_GET['User_gmail'])) { echo $_GET['User_gmail']; } ?>" class="form-control"> -->
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php
                                if (isset($_GET['Com_name'])) {
                                    $Com_name = $_GET['Com_name'];

                                    $query = "SELECT * FROM user WHERE Com_name='$Com_name' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                               				?>
											<div class="row">
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="">Name</label>
														<input type="text" readonly class="form-control" value="<?= $row['Name']; ?>" >
													</div>
												</div>
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="">Company Name</label>
														<input type="text" readonly class="form-control" value="<?= $row['Com_name']; ?>" >
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="">Email Address</label>
														<input type="text" readonly class="form-control" value="<?= $row['Email']; ?>" >
													</div>
												</div>
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="">Phone Number</label>
														<input type="text" readonly class="form-control" value="<?= $row['Phone']; ?>" >
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="">Address</label>
														<input type="text" readonly class="form-control" value="<?= $row['Address']; ?>" >
													</div>
												</div>
												<div class="col-3">
													<div class="form-group mb-3">
														<label for="">User Role</label>
														<input type="text" readonly class="form-control" value="<?= $row['Role']; ?>" >
													</div>
												</div>
												<div class="col-3">
													<div class="form-group mb-3">
														<label for="">User Status</label>
														<input type="text" readonly class="form-control" value="<?= $row['Status']; ?>" >
													</div>
												</div>
											</div>    
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<label style="font-size:16px;"><b></b></label>
														<div class="modal-footer justify-content-center">
															<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-add"></i> Limit</a>
														</div>
													</div>
												</div>
											</div>                               
                                			<?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>               
                
			</div>

			<!-- Take Action Medium modal -->
			<div class="col-md-4 col-sm-12 mb-30">				
				<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">Limit Balance</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>                                    
							<div class="modal-body">
								<?php
								// $query = mysqli_query($conn,"SELECT * FROM apply_form  where id='$get_id'")or die(mysqli_error());
								// $row = mysqli_fetch_array($query);
								?>
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
										<!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
									
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
												<input name="Limit_bal" type="number" placeholder="Enter Balace You Want To Limit" class="form-control"  required="true" autocomplete="off">    									
                                            </div>
										</div>   
									
										
										<div class="form-group">
											<label>Description  </label>
											<textarea class="form-control" name="Memo" placeholder="Enter The Description Here " required autocomplete="off" ></textarea>
										</div>

									</div>
									<div class="modal-footer">
										<button type="submit" name="Save" class="btn btn-primary" >Save</button>
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
	<!-- js -->
	<?php include('includes/scripts.php')?>
	







</body>
</html>