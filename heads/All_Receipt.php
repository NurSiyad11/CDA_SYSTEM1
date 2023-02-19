<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				

			<div class="row pb-10">			
				<div class="col-xl-3 mb-30">
					<?php			
						$query = mysqli_query($conn,"select * from receipt ")or die(mysqli_error());
						$count = mysqli_num_rows($query);					 				
					?>
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/invoice.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Receipt </div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 mb-30">
					<?php			
						$query = mysqli_query($conn,"select * from receipt where Status='Pending' ")or die(mysqli_error());
						$count = mysqli_num_rows($query);					 				
					?>
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/Pending1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Pending </div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 mb-30">
					<?php			
						$query = mysqli_query($conn,"select * from receipt where Status='Rejected' ")or die(mysqli_error());
						$count = mysqli_num_rows($query);					 				
					?>
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/Rejected1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Rejected </div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 mb-30">
					<?php			
						$query = mysqli_query($conn,"select * from receipt where  Status='Approved' ")or die(mysqli_error());
						$count = mysqli_num_rows($query);					 				
					?>
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/Approved.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Approved </div>
							</div>
						</div>
					</div>
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
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$i =1;
									$teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID order by receipt.Date Desc") or die(mysqli_error());
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
									</td>						
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
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