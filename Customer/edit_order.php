<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['Update']))
	{
		$st = $conn->query("SELECT Status as st from `tbl_order` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st !='Pending'){
			echo "<script>alert('This order was not updated, b/c the Administrator received the order');</script>";
			echo "<script type='text/javascript'> document.location = 'order_history.php'; </script>";
			
		}else {
			//$order=$_POST['order']; 	
			$date=$_POST['date']; 
			$Reason=$_POST['Reason']; 

			$pdf=$_FILES['pdf']['name'];
			$pdf_type=$_FILES['pdf']['type'];
			$pdf_size=$_FILES['pdf']['size'];
			$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
			$pdf_store="pdf/".$pdf;

			move_uploaded_file($pdf_tem_loc,$pdf_store);



			$result = mysqli_query($conn,"update tbl_order set  Date='$date', Reason='$Reason', File='$pdf'  where id='$get_id'         
				"); 		
			if ($result) {
				echo "<script>alert('Record Successfully Updated');</script>";
				echo "<script type='text/javascript'> document.location = 'order_history.php'; </script>";
			} else{
			die(mysqli_error());
			}
		
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
								<h4>Customer Order </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="order_history.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Order Update</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				
				<div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							
							<?php
							//$sql="SELECT Status from tbl_order where id='$get_id' ";
							//$query=mysqli_query($conn,$sql);
							//echo "$query";
							//$st = $conn->query("SELECT Status as St from `tbl_order` where id='$get_id'  ")->fetch_assoc()['st'];
							//$a=$st;
							//echo "$a";
							
							// echo "$sql"	?>
							<!-- <div class="weight-700 font-20 text-dark"><?php// echo "$ " .($st);?></div> -->
							<h4 class="text-blue h4">Update Order Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action=""  enctype="multipart/form-data">
							<section>

								<?php if ($role_id = 'Customer'): ?>
								<?php $query= mysqli_query($conn,"select * from user where id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
						
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Customer Name </label>
											<input name="name" type="text" class="form-control wizard-required" required="true" readonly autocomplete="off" value="<?php echo $row['Name']; ?>">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Company Name</label>
											<input name="com_name" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>						
								</div>
									<?php endif ?>
								


								<?php //if ($role_id = 'Customer'): ?>
								<?php $query= mysqli_query($conn,"select * from tbl_order where id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>order Date :</label>
											<input name="date" type="date" class="form-control date-picker" required="true" autocomplete="off" value="<?php echo $row['Date']; ?>">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">																						
											<label for="">Choose Your PDF File</label><br>
											<input id="pdf" type="file" name="pdf" value="<?php echo $row['File']; ?>" required="true"><br><br>
											
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Description :</label>
											<textarea id="textarea1" name="Reason" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"><?php echo $row['Reason']; ?></textarea>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary"  name="Update" id="Update"  data-toggle="modal">Update&nbsp;Order</button>
											</div>
										</div>
									</div>
								</div>
							</section>

							<section>
                                <div class="row">
                                    <?php
                                   
                                    $sql="SELECT file from tbl_order where id='$get_id' ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info !=''){
                                           ?>                                       
                                            <embed type="application/pdf" src="pdf/<?php echo $info['file'] ; ?>" width="900" height="500">
                                        <?php
                                        }else{
                                            echo "No file found";                                     
                                        ?>
                                        <?php
                                        }
                                        ?>
                                    <?php } ?>
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