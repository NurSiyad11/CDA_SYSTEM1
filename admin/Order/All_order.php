<?php include('../includes/header.php')?>
<?php include('../../database/session.php')?>
<?php include('../../database/db.php')?>


<?php
if (isset($_GET['delete'])) {
	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM tbl_order where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Oder deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'All_order.php'; </script>";
		
	}
}

?>

<body>

	<?php include('../includes/navbar.php')?>
	<?php include('../includes/right_sidebar.php')?>
	<?php include('../includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
			
			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from tbl_order")or die(mysqli_error());
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
                    $query = mysqli_query($conn,"select  Status from tbl_order where  Status = 'Pending'  ")or die(mysqli_error());
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
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Preparing'  ")or die(mysqli_error());
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
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Reject'  ")or die(mysqli_error());
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
                        $query= mysqli_query($conn,"select  Status from tbl_order where  Status = 'Approved'  ")or die(mysqli_error());
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

			<!-- Customer All Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Customer Orders</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>
								<th>Company Name</th>
								<!-- <th>Oredr Type</th> -->
								<th>DATE Ordered</th>
								<th>Reg Date Ordered</th>
								<th> Status</th>
								<!-- <th>File</th> -->
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id ORDER BY tbl_order.id desc  ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
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
								
								<td><?php echo $row['Com_name']; ?></td>
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['RegDate']; ?></td>

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

							

								
								<!-- <td><?php //echo $row['File']; ?></td>				 -->

								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											
											<a class="dropdown-item" href="All_order.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
											
											
											
										</div>
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<script>
						function checkdelete(){
							return confirm('Do you Want to Delete this Record ? ');
						}
					</script>
					
			   </div>
			</div>
			<!-- Customer All Order END -->

			<!-- Customer Pending Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Customer Orders</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>
								<th>Company Name</th>						
								<th>DATE Ordered</th>
								<th>Reg Date Ordered</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id ORDER BY tbl_order.id desc  ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
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
								
								<td><?php echo $row['Com_name']; ?></td>
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['RegDate']; ?></td>

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
		
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											
											<a class="dropdown-item" href="All_order.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
											
											
											
										</div>
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<script>
						function checkdelete(){
							return confirm('Do you Want to Delete this Record ? ');
						}
					</script>
					
			   </div>
			</div>
			<!-- Customer Pending Order END -->



			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('../includes/scripts2.php'); ?>
	
</body>
</html>