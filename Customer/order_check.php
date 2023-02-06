<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT id from invoice where Cid ='$session_id'";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count);?></div>
								<div class="font-14 text-secondary weight-500">Total Invoice</div>
							</div>
							<!-- <div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div> -->
						</div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						
						<?php
						$sql = "SELECT id from invoice where Cid ='$session_id' And Status='Pending'";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
						?>


						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count); ?></div>
								<div class="font-14 text-secondary weight-500">Pending</div>
							</div>
							<!-- <div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy dw dw-user-2"></span></div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php
						$sql = "SELECT id from invoice where Cid ='$session_id' And Status='Reject'";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Rejected </div>
							</div>
							<!-- <div class="widget-icon">							
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div> -->
						</div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php
						$sql = "SELECT id from invoice where Cid ='$session_id' And Status='Approved'";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Approved</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00fffcc1"><i class="icon-copy fa fa-hourglass" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4"> Customer Invoice</h2>
				</div>
				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>	
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>File  </th>		
								<th>ACTION</th>				
							</tr>
						</thead>
						<tbody>
							<tr>						

								<?php 						
								$i=1;
								$Cname = $conn->query("SELECT id as eid from `user`  where id='$session_id'  ")->fetch_assoc()['eid'];
								$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where Cid='$Cname' order by Date DESC ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
							
								 ?>  
								<td ><?php echo $i++; ?></td>
								<td><?php echo "INV# ". $row['invoice']; ?></td>
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
								<td><?php echo $row['Memo']; ?></td>
							
								<td><?php $stats=$row['Status'];
	                             if($stats=="Pending"){
	                              ?>
								  <span class="badge badge-primary">Pending</span>
	                                  <?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
	                                  <?php } if($stats=="Reject")  { ?>
										<span class="badge badge-danger">Rejected</span>
	                                  <?php }  ?>
	                            

								<td><?php echo $row['File']; ?></td>
								
								</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_order_check.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											
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