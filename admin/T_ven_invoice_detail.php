<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM ven_invoice where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		?>
        <script>
        window.addEventListener('load',function(){
            swal.fire({
                title: "Success",
                text: "Record deleted Successfully ",
                icon: "success",
                button: "Ok Done!",			
            })
            .then(function() {
                    window.location = "T_ven_invoice_detail.php";
                });
            });
        </script>
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
								<h4>Vendor Invoice</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vendor Invoice Details</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="T_ven_payment_detail.php" role="button" >
								View Vendor Payment Details
								</a>                        
							</div>
						</div>
					</div>
				</div>

		

				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">All Vendor Invoice</h2>
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
                                    <th>Recorded By</th>								
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<?php
									$i =1;
									$teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, ven_invoice.id,ven_invoice.Admin_id, ven_invoice.Vid,ven_invoice.V_invoice ,ven_invoice.Amount,ven_invoice.Date,ven_invoice.Memo FROM ven_invoice INNER JOIN user ON   ven_invoice.Vid=user.ID    order by ven_invoice.Date Desc") or die(mysqli_error());
									while ($row = mysqli_fetch_array($teacher_query)) {
									$id = $row['id'];
										?>

									<td><?php echo $i++; ?></td>
									<td class="table-plus">
										<div class="name-avatar d-flex align-items-center">								
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
												<a class="dropdown-item" href="edit_Ven_invoice.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="T_ven_invoice_detail.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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