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
			<div class="title pb-20">
				<h2 class="h3 mb-0">Supplier Report</h2>
			</div>		

			<div class="row pb-10">                  	
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice`  ")->fetch_assoc()['total'];
                        $format =number_format((float)$INV, '2','.',',');
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo "$ ". ($format);?></div>
								<div class="font-20 text-secondary weight-500">Total Vendor Invoices</div>
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
						$RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment`   ")->fetch_assoc()['total'];
                        $format =number_format((float)$RV, '2','.',',');
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo "$ ".  htmlentities($format); ?></div>
								<div class="font-20 text-secondary weight-500">Total Vendor Payment</div>
							</div>
							<!-- <div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div> -->
							
						</div>
					</div>
				</div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice`   ")->fetch_assoc()['total'];
                         $RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment`  ")->fetch_assoc()['total'];
                         $Bal = $INV - $RV;
                         $format =number_format((float)$Bal, '2','.',',');
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo "$ ". ($format); ?></div>
								<div class="font-20 text-secondary weight-500">Balance </div>
							</div>
							<!-- <div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div> -->
						</div>
					</div>
				</div>
			</div>


			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Vendor Balance Summary</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
                                <th>Balance</th>						
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
                            
							<tr>
								 <?php
		                         $teacher_query = mysqli_query($conn,"select * from user where Role='Vendor' ") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['ID'];


                                 $today_budget = $conn->query("SELECT id as eid from `user` where id='$id' ")->fetch_assoc()['eid'];
                                 $INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice` where Vid='$today_budget'  ")->fetch_assoc()['total'];
                                 $RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment` where Vid='$today_budget'  ")->fetch_assoc()['total'];
                                 $Bal = $INV - $RV;
                                 $format =number_format((float)$Bal, '2','.',',');
		                             ?>

								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Com_name']; ?></td>
                                <td><?php echo "$ $format"; ?></td>
	                         
								<td> 
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="vendor_details.php?edit=<?php echo $row['ID'];?>"><i class="dw dw-eye"></i> View</a>
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
        <?php include('includes/footer.php'); ?>

	</div>
	<!-- js -->
    <?php  //include('includes/scripts.php'); ?>


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