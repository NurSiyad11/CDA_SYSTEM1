<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['update']))
	{	
        $Title=$_POST['Title'];	   
        $Message=$_POST['Message']; 
        $Status=$_POST['Status']; 

	$result = mysqli_query($conn,"update  reg_debt_reminder set Title='$Title',   Message='$Message', Status='$Status'  where id='$get_id'         
		"); 		
	if ($result) {
		?>
		<Script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Success",
					text: "Message Record Successfully Updated",
					icon: "success",
					button: "Ok Done!",
				})
				.then(function() {
							window.location = "edit_reg_debt_reminder.php?edit=" + <?php echo ($get_id); ?>;
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
								<h4>Update Message</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Reg_debt_reminder.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Message Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>
                            	<?php
									$query = mysqli_query($conn,"SELECT * FROM reg_debt_reminder where id = '$get_id' ")or die(mysqli_error());
                                    $row = mysqli_fetch_array($query);
									?>
									<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >
								<div class="row">
								    <div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Title :</label>
                                            <input name="Title" class="form-control" type="text" value="<?php echo $row['Title']; ?>">
										</div>
									</div>								
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Message </label>
											<textarea name="Message" style="height: 15em;" placeholder="Message" class="form-control text_area" type="text" ><?php echo $row['Message']; ?></textarea>
										</div>
									</div>							
								</div>
                                <div class="form-group">
                                    <label>Status :</label>
                                    <?php $Status = $row['Status'];
                                    if ($row['Status'] == '1'){
                                        $Status = "Active";
                                    }else{
                                        $Status = "Inactive";
                                    }
                                    ?>
                                    <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                        <option value="<?php echo $Status ?>"><?php echo $Status; ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>												
                                    </select>
                                </div>    

                                <!-- <div class="row">
								    <div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
                                            <input name="Video" class="form-control" type="text" value="<?php echo $row['Video']; ?>">
										</div>
									</div>								
								</div> -->
																
								<div class="row">											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="update"  data-toggle="modal">Update&nbsp;</button>
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