<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php
// if (isset($_GET['delete'])) {

// 	$delete = $_GET['delete'];
// 	$sql = "DELETE FROM tbl_order where Status='' and id = ".$delete;
// 	$result = mysqli_query($conn, $sql);
// 	$sts = $row['Status'];
// 	$st =$sts == '';
// 	if ($result =$st) {
// 		echo "<script>alert('Order deleted Successfully');</script>";
//      	echo "<script type='text/javascript'> document.location = 'Order_history.php'; </script>";
		
// 	}else{
// 		echo "<script>alert('Order Not deleted Successfully');</script>";
// 		echo "<script type='text/javascript'> document.location = 'Order_history.php'; </script>";
// 	}
// }

?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
			<div class="row pb-10">
				<div class="col-xl-4 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT id from tbl_order where Cid='$session_id'";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count);?></div>
								<div class="font-14 text-secondary weight-500">All_Applied_Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
							-->
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $status="Pending";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Cid = '$session_id' AND Status = '$status' ")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count); ?></div>
								<div class="font-14 text-secondary weight-500">Pending Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
								-->
						</div>
					</div>
				</div>


				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php 
						 $status="Preparing";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Cid = '$session_id' AND Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Preparing Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
								-->
						</div>
					</div>
				</div>


				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						
					<?php 
						 $status="Reject";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Cid = '$session_id' AND Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Rejected Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
								-->
						</div>
					</div>
				</div>


				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php 
						 $status="Approved";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Cid = '$session_id' AND Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Approved Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>



			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Orders</h2>
				</div>
					<!-- <div class="text-center">
						<button onclick = "window.print('Welcom')" class = "btn btn-primary">print</button>
					</div> -->
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Customer Name</th>
								<!-- <th>Oredr Type</th> -->
								<th>DATE Ordered</th>
								<th>Description</th>
								<th> Status</th>
								<th>File</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								//$status=1;
								$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Cid='$session_id' order by tbl_order.id desc ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  

								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'];?></div>
										</div>
									</div>
								</td>
								
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['Reason']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="Pending"){
	                              ?>
								 	 <span class="badge badge-primary">Pending</span>		                                 
	                                  <?php } if($stats=="Preparing")  { ?>
										<span class="badge badge-secondary">Preparing</span>	
	                                  <?php } if($stats=="Approved")  { ?>
								 <span class="badge badge-success">Approved</span>	
									 <?php } if($stats=="Reject")  { ?>
										<span class="badge badge-danger">Rejected</span>	
	                             <?php } ?>

								</td>
								<td><?php echo $row['File']; ?></td>				

								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="Order_history.php?delete=<?php //echo $row['id']; ?>"><i class="dw dw-delete-3"></i> Delete</a> -->
										</div>
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
			   </div>
			</div>



			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	

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