<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<!-- Profile Image Update Code  -->
<?php
if (isset($_POST["update_image"])) {

	$image = $_FILES['image']['name'];

	if(!empty($image)){
		move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.$image);
		$Picture = $image;	
	}
	else {
		echo "<script>alert('Please Select Picture to Update');</script>";

	}

    $result = mysqli_query($conn,"update user set Picture='$Picture' where id='$session_id'         
		")or die(mysqli_error());
    if ($result) {
     	echo "<script>alert('Profile Picture Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'my_profile.php'; </script>";
	} else{
	  die(mysqli_error());
   }
}

?>


<!-- Addministrator Info Update -->
<?php

	if(isset($_POST['update_info']))
	{
	$name=$_POST['Name'];
	$com_name=$_POST['Com_name']; 
	$address=$_POST['Address']; 
	$phone=$_POST['Phone']; 

	$result = mysqli_query($conn,"update user set Name='$name', Com_name='$com_name',  Address='$address',  Phone='$phone' where id='$session_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'my_profile.php'; </script>";
	} else{
	  die(mysqli_error());
   }		
}
?>

<!-- Change Password -->
<?php
	if(isset($_POST['pass_change']))
	{
	$Old_pass=$_POST['Old_pass'];
	$Email=$_POST['Email'];  
	$Confirm_pass=$_POST['Confirm_pass'];

	$administrator_Pass = $conn->query("SELECT Password as pass from `user` where ID='$session_id' ")->fetch_assoc()['pass'];

	if($Old_pass == $administrator_Pass)
	{	
		$result = mysqli_query($conn,"update user set Email='$Email', password='$Confirm_pass' where id='$session_id'         
			"); 		
		if ($result) {
			echo "<script>alert('Password Changed Successfully ');</script>";
			echo "<script type='text/javascript'> document.location = 'my_profile.php'; </script>";
		} else{
		die(mysqli_error());
		}
	}	else{ ?>
		<script>
		window.addEventListener('load',function(){
			swal({
				//title: "Warning",
				text: "Your Old Password is incorrect Please Enter The Coorect Password ",
				icon: "warning",
				button: "Ok Done!",			
			})
			.then(function() {
					window.location = "my_profile.php";
				});
		});
	</script>
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
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">

							<?php $query= mysqli_query($conn,"select * from user  where id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
							?>

							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="" class="avatar-photo">
								<form method="post" enctype="multipart/form-data">
									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="weight-500 col-md-12 pd-5">
													<div class="form-group">
														<div class="custom-file">
															<input name="image" id="file" type="file" class="custom-file-input" accept="image/*" onchange="validateImage('file')">
															<label class="custom-file-label" for="file" id="selector">Choose file</label>		
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" name="update_image" value="Update" class="btn btn-primary">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<h5 class="text-center h5 mb-0"><?php echo $row['Name']. " "; ?></h5>
							<p class="text-center text-muted  font-16"><span class="badge badge-success"><i class="icon-copy fa fa-circle" aria-hidden="true"></i > Online</span></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Company Name:</span>
										<?php echo $row['Com_name']; ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?php echo $row['Phone']; ?>
									</li>
									<li>
										<span>My Role:</span>
										<?php echo $row['Role']; ?>
									</li>
									<li>
										<span>Address:</span>
										<?php echo $row['Address']; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
					



					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Administrator</a>
										</li>
										<?php 
										$admin_rol = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
										if($admin_rol == 'Administrator'){
										?>	
										
										<li class="nav-item">
											<div class="row pt-3 ml-3">
												<div class="col-12">     
													<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="dw dw-edit-2 "></i> Edit </a>

												</div>
											</div>
										</li>	
										<?php 	} ?>																
									</ul>
									<div class="tab-content">									
										<div class="container p-5">
											<?php
												$query = mysqli_query($conn,"SELECT * from user where id = '$session_id'")or die(mysqli_error());
												$row = mysqli_fetch_array($query);
											?>

											<form method="post" action="" >
												<div class="row">
													<div class="col-md-6">
														<label class="form-label">User Name</label>
														<input type="text" name="name"  class="form-control" placeholder="Username" required readonly autocomplete="off" value="<?php echo $row['Name'];?>">
													</div>
													<div class="col-md-6">
														<label for="inputPassword4" class="form-label">Company Name</label>
														<input type="text"   name="Com_name"class="form-control"  placeholder="" readonly required autocomplete="off" value="<?php echo $row['Com_name'];?>">
													</div>	
												</div>
												<br>
										
												<div class="row">
													<div class="col-md-6">
														<label class="form-label">Phone</label>
														<input type="number" name="phone" class="form-control" placeholder="25261326222" readonly  required autocomplete="off" value="<?php echo $row['Phone'];?>">
													</div>													
													<div class="col-md-6">
														<label for="inputAddress" class="form-label">Address</label>
														<input type="text" name="address" class="form-control" id="inputAddress" placeholder="Addrsess" readonly  required autocomplete="off" value="<?php echo $row['Address'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-6">
														<label class="form-label">Status</label>
														<input type="text" name="status" class="form-control" placeholder=""  required readonly autocomplete="off" value="<?php echo $row['Status'];?>">
													</div>													
													<div class="col-md-6">
														<label for="inputAddress" class="form-label">Last Login Time</label>
														<input type="text" name="lg_time" class="form-control" id="inputAddress" placeholder="" readonly required autocomplete="off" value="<?php echo $row['Login_time'];?>">
													</div>
												</div>
												<br>


											</form>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>



					<!-- Administration Info Update.  Only See Administrator  -->
						<div class="col-md-4 col-sm-12 mb-30">				
							<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Administrator Info</h4>
											
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>    
											<!-- Change Password Modal Button  -->
										<div class="col-md-12 col-sm-12 text-right">
											<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-password-round"></i>Change Password</a>
										</div>    

										<div class="modal-body">
											<?php
												$query = mysqli_query($conn,"select * from user where ID='$session_id' ") or die(mysqli_error());
												$row = mysqli_fetch_array($query);
												?>

											<form id="add-event" method=post>
												<div class="modal-body">                                      
													
													<div class="form-group">
														<label>User Name</label>
														<input name="Name" class="form-control" type="text" placeholder="Enter The Username" autocomplete="off" required  value="<?php echo $row ['Name'];?>">
													</div>
													<div class="form-group">
														<label>Company Name</label>
														<input name="Com_name" class="form-control" type="text" placeholder="Enter The Company Name" autocomplete="off" required  value="<?php echo $row ['Com_name'];?>">
													</div>                                      
													<div class="form-group">
														<label>Phone Number</label>
														<input name="Phone" class="form-control" type="number" placeholder="Enter The Phone NO" autocomplete="off" required  value="<?php echo $row ['Phone'];?>">
													</div>
													<div class="form-group">
														<label>Address</label>
														<input name="Address" class="form-control" type="text" placeholder="Enter The Address" autocomplete="off" required  value="<?php echo $row ['Address'];?>">
													</div>
												
												</div>
												<div class="modal-footer">
													<button type="submit" name="update_info" class="btn btn-primary" >Update </button>
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
												</div>
											</form>
										</div>
										
									</div>
								</div>
							</div>					
						</div>




					<!-- Change Password Modal  popup start -->
					<div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Change Email & Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body pd-0">
									<div class="task-list-form">
										<?php
										$query = mysqli_query($conn,"select * from user where id = '$session_id' ")or die(mysqli_error());
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
														<label class="col-md-4">Gmail :</label>
														<div class="col-md-8">
															<input type="gmail" name="Email" class="form-control" required autocomplete="off" value="<?php echo $row['Email']; ?>" >
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">Current Password :</label>
														<div class="col-md-8">
															<input type="password" name="Old_pass"  class="form-control"  required autocomplete="off" > 
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">New Password :</label>
														<div class="col-md-8">
															<input type="password" name="New_pass" id="New_pass" class="form-control" required autocomplete="off"> 
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">Corfirm Password :</label>
														<div class="col-md-8">
															<input type="password" name="Confirm_pass" id="Confirm_pass" class="form-control" required="true" autocomplete="off" >
															<span id="confrmpass" class="text-danger font-weight-bol"> </span> 
														</div>
													</div>
													<button type="submit" name="pass_change" id="pass_change"  class="btn btn-primary" onclick= 'return validation()' >Change</button>
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


					<!-- Confirm Password Checker Code Start -->
					<script type="text/javascript">
						function validation(){			
							var pass = document.getElementById('New_pass').value;
							var confirmpass = document.getElementById('Confirm_pass').value;		

							if(pass!=confirmpass){
								document.getElementById('confrmpass').innerHTML =" ** New Password does not match the confirm password";
								return false;
							}
						}
					</script>
					<!-- Confirm Password Checker Code END -->


					



				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>

		


	<!-- <script type="text/javascript">
		var loader = function(e) {
			let file = e.target.files;

			let show = "<span>Selected file : </span>" + file[0].name;
			let output = document.getElementById("selector");
			output.innerHTML = show;
			output.classList.add("active");
		};

		let fileInput = document.getElementById("file");
		fileInput.addEventListener("change", loader);
	</script> -->
	<script type="text/javascript">
		 function validateImage(id) {
		    var formData = new FormData();
		    var file = document.getElementById(id).files[0];
		    formData.append("Filedata", file);
		    var t = file.type.split('/').pop().toLowerCase();
		    if (t != "jpeg" && t != "jpg" && t != "png") {
		        alert('Please select a valid image file');
		        document.getElementById(id).value = '';
		        return false;
		    }
		    if (file.size > 1050000) {
		        alert('Max Upload size is 1MB only');
		        document.getElementById(id).value = '';
		        return false;
		    }

		    return true;
		}
	</script>
</body>
</html>