<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>


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
								<h4>USER</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="mng_user.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">User Info</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Generate User Information</h4>
							<p class="mb-20"></p>
						</div>		
					</div>

					<div class="wizard-content">
						<form method="post" action="htmltopdf.php">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from user where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
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

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Signature :</label>
											<input name="sign" type="text" class="form-control wizard-require" autocomplete="off">
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
                                                 <button class="btn btn-primary" name="A4pdf" id="A4pdf" data-toggle="modal">Generate&nbsp; Pdf</button>
												<!-- <button  href="createfile.php?edit=<?php // echo $row['ID'];?>" class="btn btn-primary" name="update" id="update" data-toggle="modal">Update&nbsp;User</button> -->
												<!-- <button class="btn btn-primary" name="A5pdf" id="A5pdf" data-toggle="modal">Generate&nbsp;A5 Pdf</button> -->

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