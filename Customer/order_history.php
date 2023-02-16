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

			<div class="row">
				<?php			
					 $query = mysqli_query($conn,"select * from tbl_order where Cid='$session_id'")or die(mysqli_error());
					 $count = mysqli_num_rows($query);					 				
				?>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/order1.png" class="border-radius-100 shadow" width="50" height="50" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Applied Orderd </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 mb-30">
					<?php							
					$query = mysqli_query($conn,"select  Status from tbl_order where Cid = '$session_id' AND Status = 'Pending'  ")or die(mysqli_error());
					$count = mysqli_num_rows($query);				
					?> 
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center ">	
							<div class="progress-dat">
								<div id="">
								<img src="../vendors/images/img/Pending1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>						
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo ($count); ?></div>
								<div class="weight-300 font-18">Pending</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-2 mb-30">
					<?php						
						 $query= mysqli_query($conn,"select  Status from tbl_order where Cid = '$session_id' AND Status = 'Preparing'  ")or die(mysqli_error());
						 $count = mysqli_num_rows($query);				 
					?> 
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">	
							<div class="progress-dat">
								<div id="">
								<img src="../vendors/images/img/preparing2.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>						
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo ($count); ?></div>
								<div class="weight-300 font-17">Preparing</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-2 mb-30">
					<?php						
						 $query= mysqli_query($conn,"select  Status from tbl_order where Cid = '$session_id' AND Status = 'Reject'  ")or die(mysqli_error());
						 $count = mysqli_num_rows($query);					
					?> 
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-dat">
								<div id="">
								<img src="../vendors/images/img/Rejected1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>
						
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo ($count); ?></div>
								<div class="weight-300 font-17">Rejected</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-2 mb-30">
					<?php						
						 $query= mysqli_query($conn,"select  Status from tbl_order where Cid = '$session_id' AND Status = 'Approved'  ")or die(mysqli_error());
						 $count = mysqli_num_rows($query);					 
					?> 
					<div class="card-box height-100-p widget-style1 bg-white">
						<div class="d-flex flex-wrap align-items-center">	
							<div class="progress-dat">
								<div id="">
								<img src="../vendors/images/img/Approved.png" class="border-radius-100 shadow" width="30" height="30" alt="">
								</div>
							</div>						
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo ($count); ?></div>
								<div class="weight-300 font-17">Approved</div>
							</div>
						</div>
					</div>
				</div>				
			</div>


			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php

							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Cid='$session_id' order by tbl_order.id desc ";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
							foreach($results as $result)
							{               ?>  

							<tr>
								<td> <?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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


								
								<td>
									<div class="table-actions">										
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_order.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
												
											</div>
										</div>
								
									</div>
								</td>
							</tr>

							<?php $cnt++;} }?>  

						</tbody>						
					</table>
			   </div>
			</div>
		</div>
	</div>
<!-- js -->
<?php include('includes/scripts1.php'); ?>

</body>
</html>