<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
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
							<p class="text-center text-muted font-14"><?php echo $row['Com_name']; ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $row['Email']; ?>
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
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Mangers </a>
										</li>

										<!--
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
										-->
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<div class="profile-timeline">
													<?php $query= mysqli_query($conn,"SELECT * from user where role='HOD' order by id desc limit 10")or die(mysqli_error());
																while ($row = mysqli_fetch_array($query)) {
		                        								$id = $row['ID'];
															?>
													<div class="timeline-month">
														<h5><?php echo $row['Name']; ?></h5>
													</div>
													<div class="profile-timeline-list">
														<ul>
															
															<li>
																<div class="date"><?php echo $row['Email']; ?></div><br>
																<div class="task-name"><i class="ion-ios-chatboxes"></i><?php echo "Name : ". $row['Name']; ?></div>
																<p><?php echo "Role : ". $row['Role']; ?></p>
																<p><?php echo "Phone : ". $row['Phone']; ?></p>
																<p><?php echo "Address : ". $row['Address']; ?></p>
																<p><?php echo "Status : ". $row['Status']; ?></p>
																


																<!--
																<div class="task-time">
																	<?php $stats=$row['Status'];
								                                       if($stats==1){
								                                        ?>
								                                           <span style="color: green">Approved</span>
								                                            <?php } if($stats==2)  { ?>
								                                           <span style="color: red">Not Approved</span>
								                                            <?php } if($stats==0)  { ?>
									                                       <span style="color: blue">Pending</span>
									                                <?php } ?>
																</div>
																-->

															</li>
															
															
														</ul>
													</div>
												<?php }?>
												</div>
											</div>
										</div>
										<!-- Timeline Tab End -->
										<!-- Setting Tab start -->
										
										<!-- Setting Tab End -->
									</div>
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