<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{
	
	$Status=$_POST['Status'];	
	$reply=$_POST['reply'];  

	$date = new DateTime();
	$date->modify('+2 hour');
	$date1 = $date->format("Y-m-d-D - h:i:s a");

	$uid = $conn->query("SELECT id as uid from `user` where id='$session_id'  ")->fetch_assoc()['uid'];


	$result = mysqli_query($conn,"update support set Status='$Status',Reply='$reply',Time_admin='$date1' ,Admin_id='$uid' where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'All_Support.php'; </script>";
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
								<h4>Support Reply </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="All_Support.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Supprt Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Reply Support</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT user.Name,user.Email,user.Phone, user.Picture, support.id, support.Message , support.Title , support.Time_user,support.Reply,support.Time_admin,support.Status FROM support INNER JOIN user ON   support.Cid=user.id where support.id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>							

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Numner :</label>
											<input name="phone" type="Text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Phone']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Time Send Message:</label>
											<input name="Date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Time_user']; ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label >Title :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Title']; ?>">
										</div>
									</div>	
								</div>

								
								<div class="row">
									<div class="col-md-1">
									<label>Message </label>
									</div>
									<div class="col-md-11">
										<div class="form-group">
											<!-- <label>Message </label> -->
											<textarea name="memo" style="height: 10em;" placeholder="Description" readonly class="form-control text_area" type="text" ><?php echo $row['Message']; ?></textarea>
										</div>
									</div>
								</div>
								

								<div class="row">									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<select name="Status" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
												<option value="Show">Show</option>
												<option value="Hide">Hide</option>
												
											</select>
										</div>
									</div>	

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Time Replyed :</label>
											<input name="Date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Time_admin']; ?>">
										</div>
									</div>								
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Reply Edit</label>
											<textarea name="reply" style="height: 5em;" placeholder="Reply" required="true" class="form-control text_area" type="text" ><?php echo $row['Reply']; ?></textarea>
										</div>
									</div>
								</div>							
					
								
								<div class="row">					
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="Update" id="Update" data-toggle="modal">Reply&nbsp;Support</button>
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