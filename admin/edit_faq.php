<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['update']))
	{	
        $Question=$_POST['Question'];	   
        $Description=$_POST['Description']; 
        $Video=$_POST['Video']; 


	$result = mysqli_query($conn,"update faq set Question='$Question',   Description='$Description', Video='$Video'  where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'faq.php'; </script>";
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
								<h4>Update FAQ</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="faq.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">FAQ Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue h4"> Update Vendor Invoice Form</h4> -->
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>
                            	<?php
									// $query = mysqli_query($conn,"SELECT user.Name, user.Com_name,ven_invoice.id, ven_invoice.Vid,ven_invoice.V_invoice ,ven_invoice.Amount,ven_invoice.Date,ven_invoice.Memo FROM ven_invoice INNER JOIN user ON   ven_invoice.Vid=user.ID  where ven_invoice.id = '$get_id' ")or die(mysqli_error());
									$query = mysqli_query($conn,"SELECT * FROM faq where id = '$get_id' ")or die(mysqli_error());
                                    $row = mysqli_fetch_array($query);
									?>

								<div class="row">
								    <div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Question :</label>
                                            <input name="Question" class="form-control" type="text" value="<?php echo $row['Question']; ?>">
										</div>
									</div>								
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="Description" style="height: 15em;" placeholder="Description" class="form-control text_area" type="text" ><?php echo $row['Description']; ?></textarea>
										</div>
									</div>							
								</div>

                                <div class="row">
								    <div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Video Link :</label>
                                            <input name="Video" class="form-control" type="text" value="<?php echo $row['Video']; ?>">
										</div>
									</div>								
								</div>
																
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