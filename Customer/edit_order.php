<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<!-- Update Pdf file -->
<?php
	if(isset($_POST['update_file']))
	{
		$get_id=$_GET['edit'];
		$st = $conn->query("SELECT Status as st from `tbl_order` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st !='Pending'){
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
					title: "Warning",
					text: "This order was not updated, b/c the Administrator received the order ",
					icon: "warning",
					button: "Ok Done!",				
					
				})
				.then(function() {
					window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
				});	
			});			
			  </Script>
			<?php		
		}else {	
			$pdf=$_FILES['pdf']['name'];
			$pdf_type=$_FILES['pdf']['type'];
			$pdf_size=$_FILES['pdf']['size'];
			$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
			$pdf_store="pdf/".$pdf;
			move_uploaded_file($pdf_tem_loc,$pdf_store);

			// $result = mysqli_query($conn,"update tbl_order set  File='$pdf'  where id='$get_id'         
			// 	"); 		
			// if ($result) {

		
				// Your PHP code here

				// Output the SweetAlert2 code after the PHP code
				?>
				<script>
			// 	window.addEventListener('load',function(){
			// 		Swal.fire({
			// 		title: 'Success',
			// 		text: 'Apply order Successfully Added',
			// 		icon: 'success',
			// 		confirmButtonColor: '#3085d6',
			// 		confirmButtonText: 'Ok Done!'
			// 		}).then((result) => {
			// 		if (result.isConfirmed) {
			// 			window.location = 'order_history.php';
			// 		}
			// 	});
			// });






			// window.addEventListener('load',function(){
			// 	const swalWithBootstrapButtons = Swal.mixin({
			// 	customClass: {
			// 		confirmButton: 'btn btn-success',
			// 		cancelButton: 'btn btn-danger'
			// 	},
			// 	buttonsStyling: false
			// 	})

			// 	swalWithBootstrapButtons.fire({
			// 	title: 'Are you sure?',
			// 	text: "You won't be able to revert this!",
			// 	icon: 'warning',
			// 	showCancelButton: true,
			// 	confirmButtonText: 'Yes, delete it!',
			// 	cancelButtonText: 'No, cancel!',
			// 	reverseButtons: true
			// 	}).then((result) => {
			// 	if (result.isConfirmed) {
			// 		const xhr = new XMLHttpRequest();
			// 		xhr.onreadystatechange = function() {
			// 		if (this.readyState === 4 && this.status === 200) {
			// 			swalWithBootstrapButtons.fire(
			// 			'Deleted!',
			// 			'Your file has been deleted.',
			// 			'success'
			// 			);
			// 		}
			// 		};
			// 		xhr.open('POST', 'update_order_pdf.php', true);
			// 		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			// 		xhr.send('edit=' + get_id);
			// 		// xhr.send('file_id=' + file_id);
			// 	} else if (result.dismiss === Swal.DismissReason.cancel) {
			// 		swalWithBootstrapButtons.fire(
			// 		'Cancelled',
			// 		'Your imaginary file is safe :)',
			// 		'error'
			// 		);
			// 	}
			// 	});
			// });


			window.addEventListener('load',function(){
				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
					title: 'Are you sure?',
					text: "To Update This File !!!",
					icon: 'question',
					showCancelButton: true,
					confirmButtonText: 'Yes, update it!',
					cancelButtonText: 'No, cancel!',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
					<?php
						 $query = "UPDATE tbl_order SET File='$pdf' WHERE id='$get_id'";
						$result = mysqli_query($conn, $query);
						
						if ($result === true) {
							?>
							swalWithBootstrapButtons.fire(
								'Updated!',
								'Your file has been updated.',
								'success'
							).then(function() {
								window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
								});
							
							<?php	
						} else {
							?>
							swalWithBootstrapButtons.fire(
								'Error',
								'There was an error updating your file.',
								'error'
							);
							<?php
						}
						?>
					 }
					 	else if (result.dismiss === Swal.DismissReason.cancel) {
						swalWithBootstrapButtons.fire(
							'Cancelled',
							'Your file is safe :)',
							'error'
						).then(function() {
							window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
						});
					}
				});
			});

			



				</script>
				<?php
				
			
								// echo "<script>alert('File  Successfully Updated');</script>";
				// echo "<script type='text/javascript'> document.location = 'order_history.php'; </script>";
			// } else{
			// die(mysqli_error());
			// }		
		}
	}
?>


<!-- Update Text -->
<?php
	if(isset($_POST['Update']))
	{
		$st = $conn->query("SELECT Status as st from `tbl_order` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st !='Pending'){
			?>
		<Script>
				window.addEventListener('load',function(){
				swal.fire({
					title: "Warning",
					text: "This order was not updated, b/c the Administrator received the order ",
					icon: "warning",
					button: "Ok Done!",				
					
				})
				.then(function() {
					window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
						});			
			});			
		</Script>
			<?php			
		}else {
			//$order=$_POST['order']; 	
			// $date=$_POST['date']; 
			$Reason=$_POST['Reason']; 

			$result = mysqli_query($conn,"update tbl_order set   Reason='$Reason' where id='$get_id'         
				"); 		
			if ($result) {
				?>
				<script>
					window.addEventListener('load',function(){
						Swal.fire({
						title: 'Success',
						text: 'Record Successfully Updated',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Ok Done!'
						}).then((result) => {
						if (result.isConfirmed) {
							window.location = "edit_order.php?edit=" + <?php echo ($get_id); ?>;
						}
						});
					});
				</script>
				<?php
				// echo "<script>alert('Record Successfully Updated');</script>";
				// echo "<script type='text/javascript'> document.location = 'order_history.php'; </script>";
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
						<div class="row">
							<div class="pull-left">
								<h4 class="text-blue h4">Update Order Form</h4>				
							</div>
							<div class="col-md-4 col-sm-12 text-right">
								<a href="modal" class="bg-light-blue btn text-blue weight-500" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="dw dw-edit-2 "></i> Choose New File</a>
							</div>
						</div>
					</div>
					<div class="wizard-content">

						<!-- Model choose New Pdf File -->
						<form method="post" enctype="multipart/form-data">
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="weight-500 col-md-12 pd-5">
											<div class="form-group">
												<div class="custom-file">
													<input name="pdf" id="file" type="file" required class="custom-file-input" accept="pdf/*" onchange="validatePdf('file')">
													<label class="custom-file-label" for="file" id="selector">Choose file</label>		
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" name="update_file" value="Update" class="btn btn-primary">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</form>

				

						<!-- Form Sending Order  -->
						<form method="post" action=""  enctype="multipart/form-data">
							<section>
								<?php if ($role_id = 'Customer'): ?>
								<?php $query= mysqli_query($conn,"select * from user where id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>	
								<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >
					
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

							
								<?php $query= mysqli_query($conn,"select * from tbl_order where id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
								<div class="row">
								
									<!-- <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>order Date :</label>
											<input name="date" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Date']; ?>">
										</div>
									</div> -->
								<!-- 
								</div>
								<div class="row"> -->
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Description :</label>
											<textarea id="textarea1" name="Reason" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"><?php echo $row['Reason']; ?></textarea>
										</div>
									</div>
									<div class="col-md-2 col-sm-12">
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
	<?php include('includes/script_pdf.php')?>			
</body>
</html>