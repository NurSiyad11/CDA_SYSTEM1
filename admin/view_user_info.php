<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>
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
								<h4>User Information</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="user_info_individual.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">View User Information</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue h4">Edit User</h4>
							<p class="mb-20"></p> -->
						</div>
						<!-- <div class="col-md-4 col-sm-12 text-right">
							<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-password-round"></i>Change Password</a>
						</div> -->
					</div>


					<!-- Change Password Modal  popup start -->
					<!-- <div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Change Passord</h5>
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
													<button type="submit" name="pass_change" id="pass_change"  class="btn btn-primary">Change</button>
													<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
												
												</form>
											</li>											
										</ul>
									</div>									
								</div>								
							</div>
						</div>
					</div> -->
					<!-- add task popup End -->




					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"Select user.Name, user.Com_name, user.Email, user.Phone, user.Address, user.Status, user.Picture, user.Role, user_info.id, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID where user_info.id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
                                    
                                    $time=time();
                                    $status='Offline';
                                    $class="btn-danger";
                                    if($row['Login_status']>$time){
                                            $status='Online';
                                            $class="btn-success";
                                    }
								?>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Name :</label>
											<input name="name" type="text" class="form-control wizard-required" readonly required="true" autocomplete="off" value="<?php echo $row['Name']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Company Name :</label>
											<input name="com_name" type="text" class="form-control wizard-required" readonly required="true" autocomplete="off" value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>
									
								</div>

								<div class="row">
                                    <div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Email']; ?>">
										</div>
									</div>	
																	
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Address']; ?>">
										</div>
									</div>
																	
								</div>
																
								<div class="row">	
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Phone']; ?>">
										</div>
									</div>	    			
                                    <div class="col-md-2 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Role']; ?>">
										</div>
									</div>	
                                    <div class="col-md-2 col-sm-12">
										<div class="form-group">
											<label>User Status :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Status']; ?>">
										</div>
									</div>	
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Login Time :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Login_time']; ?>">
										</div>
									</div>					
								</div>

                                <div class="row">	
                                    <div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label>Login Status :</label>
											<input name="phonenumber" type="text" class="form-control"   readonly required="true" autocomplete="off"value="<?php echo $status?>"  > 
										</div>
									</div>	    			
                                    <div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label>Device :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Device']; ?>">
										</div>
									</div>	
                                    <div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label>OS :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['OS']; ?>">
										</div>
									</div>	
                                    <div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label>Browser :</label>
											<input name="phonenumber" type="text" class="form-control" readonly required="true" autocomplete="off"value="<?php echo $row['Browser']; ?>">
										</div>
									</div>					
								</div>
							</section>
						</form>
					</div>








				
					
				</div>
			</div>
		</div>
        <?php include('includes/footer.php')?>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>