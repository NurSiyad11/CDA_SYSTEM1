<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php
// if (isset($_GET['delete'])) {
// 	$delete = $_GET['delete'];
// 	$sql = "DELETE FROM invoice where id = ".$delete;
// 	$result = mysqli_query($conn, $sql);
// 	if ($result) {
// 		echo "<script>alert('Invoice deleted Successfully');</script>";															 
//      	echo "<script type='text/javascript'> document.location = 'Invoice.php'; </script>";		
// 	}
// }
?>

<?php
	if(isset($_POST['Invoice']))
	{
		$name=$_POST['name'];	   
		$date=$_POST['date']; 	
		$invoice=$_POST['invoice'];	
		$amount=$_POST['amount']; 
		$memo=$_POST['memo']; 	
		
		$pdf=$_FILES['pdf']['name'];
		$pdf_type=$_FILES['pdf']['type'];
		$pdf_size=$_FILES['pdf']['size'];
		$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
		$pdf_store="pdf/".$pdf;

		move_uploaded_file($pdf_tem_loc,$pdf_store);
	     
     	$cid = $conn->query("SELECT id as cid from `user` where Com_name='$name'  ")->fetch_assoc()['cid'];
     	$Admin_id = $conn->query("SELECT id as Aid from `user` where ID='$session_id'  ")->fetch_assoc()['Aid'];
			// Check if the file name already exists in the database
			$result = mysqli_query($conn, "SELECT * FROM invoice WHERE File = '$pdf' ");

			if (mysqli_num_rows($result) > 0) {
				// File name already exists, generate a new file name
				?>
				<Script>
					window.addEventListener('load',function(){
						swal.fire({
							title: "Warning",
							text: "File name <?php echo $pdf?> already exists, generate a new file name",
							icon: "warning",
							button: "Ok Done!",
						})
						.then(function() {
									window.location = "invoice.php";
								});
					});			
				</Script>	
				<?php 

			}else{	
				mysqli_query($conn,"INSERT INTO invoice(Admin_id,Cid,Date,invoice,Amount,Memo,File,Status) 
				VALUES('$Admin_id','$cid','$date','$invoice','$amount','$memo','$pdf','Pending')         
				") or die(mysqli_error());?>
				<Script>
					window.addEventListener('load',function(){
						swal.fire({
							title: "Success",
							text: "Invoice Records Successfully  Added ",
							icon: "success",
							
						})
						.then(function() {
							window.location = "Invoice.php";
						});
					});			
				</Script>
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
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Invoice </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoice Register</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Invoice Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>	
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Company Name :</label>
											<select name="name" id="nid" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Customer</option>
													<?php
													$query = mysqli_query($conn,"select * from user where role ='Customer'");
													while($row = mysqli_fetch_array($query)){													
													?>
												<option value="<?php echo $row['Com_name']; ?>"><?php echo $row['Com_name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>																						
									<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date</label>
												<input name="date" class="form-control" type="date">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Invoice Number :</label>
											<input name="invoice" type="number" placeholder="Invoice No#" class="form-control" required="true" autocomplete="off">
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

									<!-- <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount</label>
											<input id="demo2" type="text"  name="demo2">
										</div>
									</div> -->

									<div class="">										
										<label for="">Choose Your PDF File</label><br>
										<input id="file" type="file" name="pdf" value="" required accept="pdf/*" onchange="validatePdf('file')"><br><br>
									</div>
									<div class="col-md-12">
											<div class="form-group">
												<label>Memo / Description</label>
												<textarea name="memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text"></textarea>
											</div>
										</div>							
								</div>
																
								<div class="row">												
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="Invoice" id="Invoice" data-toggle="modal">Save&nbsp;Invoice</button>
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
						<h2 class="text-blue h4">Manage Invoice</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO#</th>
									<th class="table-plus">Company Name</th>	
									<th class="table-plus">Customer Name</th>								
									<th>Invoice No#</th>
									<th>Date </th>
									<th>Memo</th>
									<th>Amount</th>								
									<th>Status</th>
									<!-- <th>File</th> -->
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<?php
									$i =1;
									// $Role = $conn->query("SELECT Role as role from `user` where ID='$session_id'  ")->fetch_assoc()['role'];
									
									// if($Role =='Administrator'){
									// 	$teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID order by invoice.Date Desc") or die(mysqli_error());
										
									// }
									// else{
									// 	$teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.admin_id='$session_id' order by invoice.Date Desc") or die(mysqli_error());
									
									// }
									$teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.admin_id='$session_id' order by invoice.Date Desc") or die(mysqli_error());
									while ($row = mysqli_fetch_array($teacher_query)) {
								
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
												<div class="weight-600"><?php echo $row['Com_name'] . " " ; ?></div>
											</div>
										</div>
									</td>								
									<td><?php echo $row['Name']; ?></td>
									<td><?php echo "INV# ". $row['invoice']; ?></td>
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
									</td>

									<!-- <td><?php //echo $row['File']; ?></td> -->
								
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<?php
										
											?>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_invoice.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
												<!-- <a class="dropdown-item" href="Invoice.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a> -->
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
		</div>
	</div>
	<!-- js -->	
	<?php include('includes/scripts2.php')?>
	<?php include('includes/script_pdf.php')?>



</body>
</html>