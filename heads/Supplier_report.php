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
			<!-- <div class="title pb-20">
				<h2 class="h3 mb-0">Supplier Report</h2>
			</div>	 -->
			
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
							<?php 
								$INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice`   ")->fetch_assoc()['total'];
								$PV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment`  ")->fetch_assoc()['total'];
								$Bal = $INV - $PV;
								$ven_format_bal =number_format((float)$Bal, '2','.',',');
							?>
						<div class="title">
							<h4>Supplier Report</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo "Total Vendor Balance  $ ".($ven_format_bal); ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>






			<div class="card-box mb-30">
				<div class="row">
					<div class="col-3">
						<h2 class="text-blue h4">Vendor Balance</h2>
					</div>
					
					<div class="col-9">
						<div class="col-md-12 col-sm-12 text-right">
							<a href="#" class="bg-light-blue btn text-blue weight-500"  data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Vendor Summary Balance </a>
							<button class="bg-light-blue btn text-blue weight-500"  type="button" id="downloadexcel1" class="btn btn-primary">Export to Excel</button>
						</div>
					</div>
				</div>



				<!-- Large modal Vendor Balance Sumary -->
				<div class="col-md-4 col-sm-12 mb-30">
						<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myLargeModalLabel">Vendor Balance Summary</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<div class="modal-body">
										<div class="pb-20">
											<table id="example-table" class="data-table table stripe hover nowrap">
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
														if($format > 0 ){														
														
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
													<?php } } ?>  
												</tbody>
											</table>											
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" id="downloadexcel" class="btn btn-primary">Export to Excel</button>
									</div>
				
								</div>
							</div>
						</div>
				</div>




				
				<div class="pb-20">
					<table id="example-table1" class="data-table table stripe hover nowrap">
						<thead class="table-dark">
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
    <?php  include('includes/scripts2.php'); ?>


<!-- js -->




 
</body>
</html>