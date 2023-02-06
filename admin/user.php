<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
	if(isset($_POST['add_user']))
	{
	
	$name=$_POST['name'];	   
	$email=$_POST['email']; 
	$password=$_POST['password']; 
	$com_name=$_POST['com_name']; 
	$address=$_POST['address']; 	 
	$role=$_POST['role']; 
	$phonenumber=$_POST['phonenumber']; 
	$Status=$_POST['Status']; 


	 $query = mysqli_query($conn,"select * from user where Email = '$email'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ ?>
	 <script>
	 alert('Data Already Exist');
	</script>
	<?php
      }else{
        mysqli_query($conn,"INSERT INTO user(Name,Email,password,Com_name,Address,Role,Phone,Status) VALUES('$name','$email','$password','$com_name','$address','$role','$phonenumber','$Status')         
		") or die(mysqli_error()); ?>
		<script>alert('User Records Successfully Added');</script>;
		<script>
		window.location = "user.php"; 


		</script>
		<?php   }
}

?>



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
								<h4>User Registration </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">User Registration</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> User Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Name :</label>
											<input name="name" type="text" placeholder="Enter personal Name" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Company Name :</label>
											<input name="com_name" type="text" placeholder="Enter Company Name" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" placeholder="Enter Email"class="form-control" required="true" autocomplete="off">
										</div>
									</div>								

								</div>

								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>								
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" placeholder="Enter Address" class="form-control" required="true" autocomplete="off">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" placeholder="Enter Phone Number"class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									
								
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
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
												<option value="">Select Status</option>
												<option value="Active">Active</option>
												<option value="Deactive">Deactive</option>
												
											</select>
										</div>
									</div>



								</div>

								<div class="row">				
											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_user" id="add_user" data-toggle="modal">Add&nbsp;User</button>
											</div>
										</div>
									</div>
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