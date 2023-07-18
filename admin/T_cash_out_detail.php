<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM ven_invoice where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Record deleted Successfully');</script>";															 
     	echo "<script type='text/javascript'> document.location = 'vendor_Invoice.php'; </script>";		
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
								<h4>Cash Payment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cash Out Details</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="T_cash_in_detail.php" role="button" >
								View Cash In Details
								</a>                        
							</div>
						</div>
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
                                    <th>Recorded By</th>								
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$i =1;
									

									$query = mysqli_query($conn,"SELECT account.Acc_name, cash_payment.id, cash_payment.Admin_id, cash_payment.name, cash_payment.PV , cash_payment.Amount, cash_payment.Date, cash_payment.Memo FROM cash_payment INNER JOIN account ON   cash_payment.Acc_id=account.id  order by cash_payment.Date Desc") or die(mysqli_error());	
									while ($row = mysqli_fetch_array($query)) {
									$id = $row['id'];
										?>

									<td><?php echo $i++; ?></td>
									<td class="table-plus">
										<div class="name-avatar d-flex align-items-center">
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
                                    <?php
                                        $admins = $row['Admin_id'];
                                        $query_admin_record = mysqli_query($conn,"SELECT user.Name, ven_invoice.id, ven_invoice.Vid FROM ven_invoice INNER JOIN user ON   ven_invoice.Admin_id=user.ID  where ven_invoice.Admin_id='$admins' ") or die(mysqli_error());
                                        $row_admin = mysqli_fetch_array($query_admin_record);
                                        ?>
                                        <td><?php echo $row_admin['Name']; ?></td>

									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_cash_payment.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
											</div>
										</div>
									</td>
								</tr>
								<?php } ?>  
							</tbody>
						</table>
					</div>	
				</div>	


                			
			</div>			
		</div>
	</div>

	<!-- js -->	
	<?php include('includes/scripts2.php')?>

</body>
</html>