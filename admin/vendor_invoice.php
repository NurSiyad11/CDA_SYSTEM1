<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php
// if (isset($_GET['delete'])) {
// 	$delete = $_GET['delete'];
// 	$sql = "DELETE FROM ven_invoice where id = ".$delete;
// 	$result = mysqli_query($conn, $sql);
// 	if ($result) {
// 		echo "<script>alert('Record deleted Successfully');</script>";															 
//      	echo "<script type='text/javascript'> document.location = 'vendor_Invoice.php'; </script>";		
// 	}
// }
?>


<?php
	if(isset($_POST['V_Invoice']))
	{
	$name=$_POST['name'];	   
	$date=$_POST['date']; 	
	$invoice=$_POST['invoice'];	
	$amount=$_POST['amount']; 
	$memo=$_POST['memo']; 	
		     
    $Vid = $conn->query("SELECT id as Vid from `user` where Com_name='$name'  ")->fetch_assoc()['Vid'];
	$Admin_id = $conn->query("SELECT id as Aid from `user` where ID='$session_id'  ")->fetch_assoc()['Aid'];

        mysqli_query($conn,"INSERT INTO ven_invoice(Admin_id,Vid,Date,V_invoice,Amount,Memo) 
		VALUES('$Admin_id','$Vid','$date','$invoice','$amount','$memo')         
		") or die(mysqli_error()); ?>
		<Script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Success",
					text: "Vendor Invoice Records Successfully  Added ",
					icon: "success",					
				})
				.then(function() {
					window.location = "vendor_invoice.php";
				});
			});			
		</Script>
		<?php   
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
								<h4>Vendor Invoice</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vendor Invoice Register</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Vendor Invoice Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>		

								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Vendor Name :</label>
											<select name="name" id="nid" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Vendor Company Name</option>
													<?php
													$query = mysqli_query($conn,"select * from user where role ='Vendor'");
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
												<input name="date" required class="form-control" type="date">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Vendor Invoice Number :</label>
											<input name="invoice" type="number" placeholder="Vendor Invoice No#" class="form-control" required="true" autocomplete="off">
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
												<button class="btn btn-primary" name="V_Invoice" id="V_Invoice" data-toggle="modal">Save&nbsp;</button>
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
						<h2 class="text-blue h4">Manage Vendor Invoice</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO#</th>
									<th class="table-plus">Vendor Company Name</th>
									<th class="table-plus">Vendor  Name</th>
								
									<th>Ven Invoice No#</th>
									<th>Date </th>
									<th>Memo</th>
									<th>Amount</th>					
								
							
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<?php
									$i =1;
									$teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, ven_invoice.id, ven_invoice.Vid,ven_invoice.V_invoice ,ven_invoice.Amount,ven_invoice.Date,ven_invoice.Memo FROM ven_invoice INNER JOIN user ON   ven_invoice.Vid=user.ID  where ven_invoice.admin_id='$session_id'  order by ven_invoice.Date Desc") or die(mysqli_error());
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
												<div class="weight-600"><?php echo $row['Com_name'] . " " ; ?></div>
											</div>
										</div>
									</td>
									<td><?php echo $row['Name']; ?></td>
									<td><?php echo "INV# ". $row['V_invoice']; ?></td>
									<td><?php echo $row['Date']; ?></td>
									<td><?php echo $row['Memo']; ?></td>
									<td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>

									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<?php
										
											?>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_Ven_invoice.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
												<!-- <a class="dropdown-item" href="vendor_invoice.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a> -->
											</div>
										</div>
									</td>
								</tr>
								<?php } ?>  
							</tbody>
						</table>
						<!-- <script>
							function checkdelete(){
								return confirm('Do you Want to Delete this Record ? ');
							}
						</script> -->
					</div>			      
				</div>
			</div>			
		</div>
	</div>

	<!-- js -->	
	<?php include('includes/scripts2.php')?>

</body>
</html>