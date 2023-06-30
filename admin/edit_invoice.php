<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<!-- Update Pdf file -->
<?php
	if(isset($_POST['update_file']))
	{
		$st = $conn->query("SELECT Status as st from `invoice` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st =='Approved')
		{
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: "This invoice is not updated, b/c the customer Approved this invoice ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_invoice.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php			
		}else 
		{
			$pdf=$_FILES['pdf']['name'];
			$pdf_type=$_FILES['pdf']['type'];
			$pdf_size=$_FILES['pdf']['size'];
			$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
			$pdf_store="pdf/".$pdf;
			move_uploaded_file($pdf_tem_loc,$pdf_store);

			$result = mysqli_query($conn,"update invoice set  File='$pdf'  where id='$get_id'         
				"); 		
			if ($result) {
				?>
				<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Invoice File Successfully Updated ",
						icon: "success",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_invoice.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php
			} else{
			die(mysqli_error());
			}	
		}	
		
	}
?>




<?php
	if(isset($_POST['update-invoice']))
	{
		$st = $conn->query("SELECT Status as st from `invoice` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st =='Approved')
		{
			?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Warning",
						text: "This invoice is not updated, b/c the customer Approved this invoice ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_invoice.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php			
		}else 
		{
			$name=$_POST['name'];	
			$Date=$_POST['Date'];  
			$invoice=$_POST['invoice']; 
			$Amount=$_POST['Amount']; 
			$memo=$_POST['memo']; 

			$cid = $conn->query("SELECT id as cid from `user` where Com_name='$name'  ")->fetch_assoc()['cid'];
			$result = mysqli_query($conn,"update invoice set Cid='$cid',   Date='$Date', Invoice='$invoice',  Amount='$Amount', Memo='$memo' where id='$get_id'         
				"); 		
			if ($result) {
				?>
				<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Record Successfully Updated ",
						icon: "success",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_invoice.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php
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
								<h4>Update Invoice</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Invoice.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoice Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Invoice Form</h4>
						</div>
						<div class="row">						
							<div class="col-md-12 col-sm-12 text-right">
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






						<!-- Form update others  -->
						<form method="post" action="" enctype="multipart/form-data">
							<section>
                           		 <?php
									$query = mysqli_query($conn,"SELECT user.Name,user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Reason,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
								<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

								<div class="row">
								    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Company Name :</label>
											<select name="name" class="custom-select form-control" required="true" autocomplete="off">
											<option value="<?php echo $row['Com_name']; ?>"><?php echo $row['Com_name']; ?></option>
												<option value="">Select Customer</option>
													<?php
													$query_role = mysqli_query($conn,"select * from user where role ='Customer'");
													while($row_role = mysqli_fetch_array($query_role)){
													
													?>
												<option value="<?php echo $row_role['Com_name']; ?>"><?php echo $row_role['Com_name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>	                                    
                                
									<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date</label>
												<input name="Date" class="form-control" type="Date" value="<?php echo $row['Date']; ?>">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Invoice Number :</label>
											<input name="invoice" type="number" placeholder="Invoice No#" class="form-control" required="true" autocomplete="off" value="<?php echo $row['invoice']; ?>" >
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="Amount" type="text" placeholder="$00.00" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Amount']; ?>">
										</div>
									</div>

									<div class="col-md-8">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="memo" style="height: 7em;" placeholder="Description" class="form-control text_area" type="text" ><?php echo $row['Memo']; ?></textarea>
										</div>
									</div>							
								</div>


								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status  :</label>
											<input name="Status" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Status']; ?>">
										</div>
									</div>	
								
									<?php 
										$sts = $conn->query("SELECT Status as st from `invoice` where id='$get_id'  ")->fetch_assoc()['st'];
										if($sts == 'Rejected'){										
									?>
									<div class="col-md-8">
										<div class="form-group">
											<label>Reason To Rejected</label>
											<textarea name="Reason" style="height: 3em;" readonly placeholder="Reason" class="form-control text_area" type="text" ><?php echo $row['Reason']; ?></textarea>
										</div>
									</div>																
									<?php } ?>
								</div>
																
								<div class="row">											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="update-invoice" id="update-invoice" data-toggle="modal">Update&nbsp;Invoice</button>
											</div>
										</div>
									</div>
								</div>
							</section>



							









							<section>
                                <div class="row">
                                    <?php
                                    
                                    $sql="SELECT File from invoice where id='$get_id'  ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info != '' ){
											//echo "No file found";  
                                           ?>                                       
                                            <embed type="application/pdf" src="pdf/<?php echo $info['File'] ; ?>" width="1200" height="500">
                                        <?php
                                        }else{
                                            echo "No file found";                                     
                                        ?>
										  <!-- <embed type="application/pdf" src="pdf/test.pdf"  width="900" height="500"> -->

                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
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
	<?php include('includes/script_pdf.php')?>
</body>
</html>