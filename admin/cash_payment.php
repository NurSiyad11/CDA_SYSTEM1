<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM cash_payment where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Cash_payment deleted Successfully');</script>";															 
     	echo "<script type='text/javascript'> document.location = 'cash_payment.php'; </script>";		
	}
}
?>


<?php
	if(isset($_POST['payment']))
	{
	$name=$_POST['name'];	   
	$date=$_POST['date']; 	
	$PV=$_POST['PV'];	
	$amount=$_POST['amount']; 
	$memo=$_POST['memo']; 	
	$Ac_id=$_POST['Ac_name']; 	

	$total_in = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$Ac_id   ")->fetch_assoc()['total'];
	$total_out = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$Ac_id ")->fetch_assoc()['total'];
	$Bal_Inc_exp = $total_in - $total_out;
	echo "$Bal_Inc_exp";
	
	if($amount > $Bal_Inc_exp){ ?>
		<script>alert('Haraagaagu kuguma filna...  ' );</script>;
		<script>
		window.location = "cash_payment.php"; 
		</script>

		<?php
	} else{
     
        mysqli_query($conn,"INSERT INTO cash_payment(Admin_id,name,Date,PV,Amount,Memo,Acc_id) VALUES('$session_id','$name','$date','$PV','$amount','$memo','$Ac_id')         
		") or die(mysqli_error()); ?>
		<script>alert('Payment Records Successfully  Added');</script>;
		<script>
		window.location = "cash_payment.php"; 
		</script>
		<?php   } }

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
								<h4>Cash Payment </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cash Payment Register</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Cash Payment Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>            
								<div class="row">
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Payee :</label>
											<input name="name" type="text" class="form-control" placeholder="Payee" required="true" >
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
											<label>Payment Number :</label>
											<input name="PV" type="text" class="form-control" required="true" placeholder="Payment No#"  autocomplete="off">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="amount" type="number" placeholder="$00.00" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Account :</label>
											<select name="Ac_name" id="nid" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Account</option>
													<?php
													$query = mysqli_query($conn,"select * from account");  
													while($row = mysqli_fetch_array($query)){
														 $test=$row['id'];
														$total_income = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$test   ")->fetch_assoc()['total'];
														 $total_expense = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$test ")->fetch_assoc()['total'];
														 $Ba_Inc_exp = $total_income - $total_expense;
														 $bal_format =number_format((float)$Ba_Inc_exp, '2','.',',');
														if($bal_format > 0){
															?>													
															<option value="<?php echo $row['id']; ?>"><?php echo $row['Acc_name'] ?> <p> <?php echo " $bal_format"?> </p> </option>
													
													<?php } }	?>
											</select>
										</div>
									</div>	

									<div class="col-md-12">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="memo" placeholder="Description" style="height: 5em;" class="form-control text_area" type="text"></textarea>
										</div>
									</div>							
								</div>
																
								<div class="row">		
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="payment" id="payment" data-toggle="modal">Save&nbsp;Payment</button>
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
						<h2 class="text-blue h4">All Cash Payment</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO#</th>
									<th class="table-plus">Payee </th>								
									<th>Payment No#</th>
									<th>Account </th>
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
									

									$query = mysqli_query($conn,"SELECT account.Acc_name, cash_payment.id, cash_payment.name, cash_payment.PV , cash_payment.Amount, cash_payment.Date, cash_payment.Memo FROM cash_payment INNER JOIN account ON   cash_payment.Acc_id=account.id where cash_payment.Admin_id='$session_id' order by cash_payment.Date Desc") or die(mysqli_error());	
									while ($row = mysqli_fetch_array($query)) {
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
												<div class="weight-600"><?php echo $row['name'] . " " ; ?></div>
											</div>
										</div>
									</td>								
									
									<td><?php echo "PV# ". $row['PV']; ?></td>
									<td><?php echo $row['Acc_name']; ?></td>
									<td><?php echo $row['Date']; ?></td>
									<td><?php echo $row['Memo']; ?></td>
									<td><?php echo "$ ". $row['Amount']; ?></td>

									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_cash_payment.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
												<a class="dropdown-item" href="cash_payment.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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


</body>
</html>