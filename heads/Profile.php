<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php

if (isset($_POST["update_image"])) {

	$image = $_FILES['image']['name'];

	// Check if the file name already exists in the database
	$result1 = mysqli_query($conn, "SELECT * FROM user WHERE Picture = '$image' ");

	if (mysqli_num_rows($result1) > 0) {
		// File name already exists, generate a new file name
		?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: "Picture name <?php echo $image ?> already exists, generate a new Picture name",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
								window.location = "Profile.php";
							});
				});			
			</Script>	
			<?php 
	}
	elseif(!empty($image)){
		move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.$image);
		$Picture = $image;	

		$result = mysqli_query($conn,"update user set Picture='$Picture' where id='$session_id'         
		")or die(mysqli_error());
		if ($result) {
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
					title: "Success",
					text: "Profile Picture Successfully Updated ",
					icon: "success",
					button: "Ok Done!",				
					
				})
				.then(function() {
					window.location = "Profile.php";
				});	
			});			
				</Script>
			<?php
		} else{
		die(mysqli_error());
		}
	}
	else {
		echo "<script>alert('Please Select Picture to Update');</script>";
	}

  
}

?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container" >
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

							<?php $query= mysqli_query($conn,"select * from user where id = '$session_id'")or die(mysqli_error());
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
															<input name="image" id="file" type="file" class="custom-file-input" required accept="image/*" onchange="validateImage('file')">
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
							<h5 class="text-center h5 mb-0"><?php echo $row['Name']; ?></h5>
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
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Manager</a>
										</li>
									
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
		


<script>
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
    var img = new Image();
    img.onload = function() {
        var width = this.width;
        var height = this.height;
        if (width < 500 || height < 500) {
            alert('Image dimensions are too small. Please select an image with dimensions greater than 500x500."');
            document.getElementById(id).value = '';
            return false;
        } else if (width > 600 || height > 600) {
            alert('Image dimensions are too large. Please select an image with dimensions less than 600x600');
            document.getElementById(id).value = '';
            return false;
        }
    };
    img.src = window.URL.createObjectURL(file);
    return true;
	}
</script>

</body>
</html>