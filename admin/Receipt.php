<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM receipt where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Receipt deleted Successfully');</script>";
															 
     	echo "<script type='text/javascript'> document.location = 'Receipt.php'; </script>";
		
	}
}

?>


<?php
	if(isset($_POST['Receipt']))
	{
	
	
	$name=$_POST['name'];	   
	$date=$_POST['date']; 	
	$RV=$_POST['RV'];	
	$amount=$_POST['amount']; 
	$memo=$_POST['memo']; 	 
 
	
	$pdf=$_FILES['pdf']['name'];
	$pdf_type=$_FILES['pdf']['type'];
	$pdf_size=$_FILES['pdf']['size'];
	$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
	$pdf_store="Rvpdf/".$pdf;

	move_uploaded_file($pdf_tem_loc,$pdf_store);


	

	$Cid = $conn->query("SELECT id as cid from `user` where name='$name'  ")->fetch_assoc()['cid'];
     
        mysqli_query($conn,"INSERT INTO receipt(Cid,Date,RV,Amount,Memo,File,Status) VALUES('$Cid','$date','$RV','$amount','$memo','$pdf','Pending')         
		") or die(mysqli_error()); ?>
		<script>alert('Receipt Records Successfully  Added');</script>;
		<script>
		window.location = "Receipt.php"; 


		</script>
		<?php   }

?>

<body>


	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Receipt </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Receipt Register</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Receipt Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="Receipt.php" enctype="multipart/form-data">
							<section>
								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Cusmtor Name :</label>
											<select name="name" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Customer</option>
													<?php
													$query = mysqli_query($conn,"select * from user where role ='Customer'");
													while($row = mysqli_fetch_array($query)){
													
													?>
												<option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>					
									
									<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date</label>
												<input name="date" class="form-control" required type="date">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Receipt Number :</label>
											<input name="RV" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="amount" type="text" placeholder="$00.00" class="form-control" required="true" autocomplete="off">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">											
											<label for="">Choose Your PDF File</label><br>
											<input id="pdf" type="file" name="pdf" value="" required="true"><br><br>
												
		
										</div>
									</div>

									<div class="col-md-12">
											<div class="form-group">
												<label>Memo / Description</label>
												<textarea name="memo" style="height: 5em;" class="form-control text_area" type="text"></textarea>
											</div>
										</div>							
								</div>
																
								<div class="row">				
											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="Receipt" id="Receipt" data-toggle="modal">Save&nbsp;Receipt</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>


				<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Customer Receipts</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>
								
								<th>Receipt No#</th>
								<th>Date </th>
								<th>Memo</th>
								<th>Amount</th>
								<th>Status</th>
								<th>File</th>
						
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID order by receipt.Date Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<!--
											<img src="<?php echo (!empty($row['Location'])) ? '../uploads/'.$row['Location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
								 			-->

										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								
								
	                            <td><?php echo "RV# ". $row['RV']; ?></td>
								<td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['Memo']; ?></td>
								<td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
							

								<td><?php $stats=$row['Status'];
	                             if($stats=="Pending"){
	                              ?>
								   <span class="badge badge-primary">Pending</span>
	                                  <!-- <span style="color: green">Pending</span> -->
	                                  <?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
	                                  <?php } if($stats=="Rejected")  { ?>
										<span class="badge badge-danger">Rejected</span>
	                                  <?php } 
	                             ?>



								<td><?php echo $row['File']; ?></td>
							
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											<a class="dropdown-item" href="Receipt.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
					<script>
						function checkdelete(){
							return confirm('Do you Want to Delete this Record ? ');
						}
					</script>
			   </div>

			</div>







			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php //include('includes/scripts.php')?>


		
<!-- js -->

	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<script src="../vendors/scripts/datatable-setting.js"></script></body>



</body>
</html>