<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>


<?php $get_id = $_GET['edit']; ?>
<!-- Change Password -->
<?php
// 	if(isset($_POST['pass_change']))
// 	{
// 	$password=$_POST['password'];
// 	$result = mysqli_query($conn,"update user set password='$password' where id='$get_id'         
// 		"); 		
// 	if ($result) {
//      	echo "<script>alert('Password Changed Successfully ');</script>";
//      	echo "<script type='text/javascript'> document.location = 'mng_user.php'; </script>";
// 	} else{
// 	  die(mysqli_error());
//    }		
// }
?>

<?php
	// if(isset($_GET['update']))
	// {
	// 	$get_id=$_GET['edit'];



	// }
 ?>

<!-- Update users   && $_POST['edit'] == 'GET'-->
<?php

	if(isset($_POST['update']) ) 
	{
		// urldecode($_GET['id'])
	$get_id=$_GET['edit'];
	$name=$_POST['name'];
	$email=$_POST['email'];  
	$com_name=$_POST['com_name']; 
	$address=$_POST['address']; 

	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 
	$Status=$_POST['Status']; 

	$result = mysqli_query($conn,"update user set Name='$name',  Email='$email',Com_name='$com_name',  Address='$address',  Role='$user_role', Phone='$phonenumber', Status='$Status' where id='$get_id'         
		"); 		
	if ($result) {
		?>
		<Script>
			window.addEventListener('load',function(){
				swal({
					title: "Success",
					text: "Record Successfully Updated",
					icon: "success",
					button: "Ok Done!",
				})
				.then(function() {
							window.location = "edit_user.php?edit=" + <?php echo ($get_id); ?>;
						});
			});			
		</Script>
		<?php

     	// echo "<script>alert('Record Successfully Updated');</script>";
     	// echo "<script type='text/javascript'> document.location = 'edit_user.php?edit=' $get_id; </script>";
		//  $get_id=$_GET['edit'];
		//header("Location: edit_user.php?edit=" . $get_id);
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
								<h4>User Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="mng_user.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">User Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit User</h4>
							<p class="mb-20"></p>
						</div>
						<div class="col-md-4 col-sm-12 text-right">
							<a href="task-add" data-toggle="modal" data-target="#Medium-modal" class="bg-light-blue btn text-blue weight-500"><i class="ion-password-round"></i>View Password</a>
							<!-- <div class="col-12">     
								<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="dw dw-edit-2 "></i> Edit </a>

							</div> -->
						</div>
					</div>


					<!-- Administration Info Update.  Only See Administrator  -->
					<div class="col-md-4 col-sm-12 mb-30">				
						<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title" id="myLargeModalLabel">checking whether you are an administrator or not</h6>
										
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>    
										<!-- Change Password Modal Button  -->
									<!-- <div class="col-md-12 col-sm-12 text-right">
										<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-password-round"></i>Change Password</a>
									</div>     -->

									<div class="modal-body">
										<?php
											$err_pass ="welck";
											$query = mysqli_query($conn,"select * from user where ID='$session_id' ") or die(mysqli_error());
											$row = mysqli_fetch_array($query);
											?>

										<form id="add-event" method="GET">
											<div class="modal-body">
												<p>Here is checking whether you are an administrator or not</p>                                      
												
												<div class="form-group">
													<label>Administrator Name</label>
													<input name="Name" class="form-control" type="text" placeholder="Enter The Username" autocomplete="off" required readonly value="<?php echo $row ['Name'];?>">
												</div>
												<div class="form-group">
													<label>Password</label>
													<input name="Password" class="form-control" type="password" placeholder="Enter your Password" autocomplete="off" required  value="<?php if(isset($_GET['Password'])){ echo $_GET['Password']; } ?>" >
													<label for=""><?php echo $err_pass ;?></label>
												</div> 
												<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >
                                     
											</div>
											<div class="modal-footer">
												<?php
													if(isset($_GET['View']))
													{
														$Password=$_GET['Password'];
														$Pass_Admiministrator = $conn->query("SELECT Password as pass from `user` where id='$session_id'  ")->fetch_assoc()['pass'];
														if($Password == $Pass_Admiministrator){
														?>
															<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-password-round"></i>View User Password</a>
														<?php
														}else{
															$err_pass= "the password Is incorect";
														}		
													}
												?>
												<!-- <a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-password-round"></i>Change Password</a> -->

												<button type="submit" name="View" class="btn btn-primary" >View </button>
												<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
											</div>
											
										</form>
									</div>
									
								</div>
							</div>
						</div>					
					</div>
					<!-- Administration Info Update.  Only See Administrator  -->


					<!-- View user Password Modal  popup start -->
					<div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">User Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body pd-0">
									<div class="task-list-form">
										<?php
										$query = mysqli_query($conn,"select * from user where id = '$get_id' ")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
										?>
										<ul>
											<li>
												<form method="post" action="">
													<div class="form-group row">
														<label class="col-md-4">Name :</label>
														<div class="col-md-8">
															<input type="text" name="name" class="form-control" readonly autocomplete="off" value="<?php echo $row['Name']; ?>" >
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">Company Name :</label>
														<div class="col-md-8">
															<input type="text" name="com_name" class="form-control"  readonly autocomplete="off" value="<?php echo $row['Com_name']; ?>"> 
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">Email :</label>
														<div class="col-md-8">
															<input type="email" name="email" class="form-control" readonly autocomplete="off" value="<?php echo $row['Email']; ?>"> 
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">Password :</label>
														<div class="col-md-8">
															<input type="text" name="password" class="form-control" required="true" autocomplete="off" value="<?php echo $row['password']; ?>"> 
														</div>
													</div>
													<!-- <button type="submit" name="pass_change" id="pass_change"  class="btn btn-primary">Change</button> -->
													<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
												
												</form>
											</li>											
										</ul>
									</div>									
								</div>								
							</div>
						</div>
					</div>
					<!-- add task popup End -->



				




					<div class="wizard-content">
						<form method="post"  action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from user where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
								<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row['Name']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Company Name :</label>
											<input name="com_name" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Email']; ?>">
										</div>
									</div>	
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['password']; ?>">
										</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $row['Address']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $row['Phone']; ?>">
										</div>
									</div>									
								</div>
																
								<div class="row">				
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Role']; ?>"><?php echo $row['Role']; ?></option>
												<option value="Admin">Admin</option>
												<option value="HOD">HOD</option>
												<option value="Customer">Customer</option>
												<option value="Vendor">Vendor</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Status :</label>
											<select name="Status" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
											
											</select>
										</div>
									</div>					
								</div>
							



								<div class="row">
									<div class="col-md-12 col-sm-12">
										<?php
										$query = mysqli_query($conn,"select * from user where id = '$get_id' ")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
										?>
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button  href="createfile.php?edit=<?php echo $row['ID'];?>" class="btn btn-primary" name="update" id="update" data-toggle="modal">Update&nbsp;User</button>
												<!-- <a class="dropdown-item" href="user_view_pass.php?edit=<?php echo $get_id;?>"><i class="dw dw-edit2"></i> Edit</a> -->

												<!-- <button class="btn btn-primary" name="A4pdf" id="A4pdf" data-toggle="modal">Generate&nbsp; A4 Pdf</button>
												<button class="btn btn-primary" name="A5pdf" id="A5pdf" data-toggle="modal">Generate&nbsp;A5 Pdf</button> -->

											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>



 















				
					
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>