<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


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

	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
			<?php
			$Role = $conn->query("SELECT Role as role from `user` where ID='$session_id'  ")->fetch_assoc()['role'];
							
			if($Role =='Administrator'){		
			?>
			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from tbl_order")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn btn-primary" type="submit" name="All_order"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
									</div>
								</form>
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
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending_order"> <i class="icon-copy dw dw-balance"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-16">Pending</div>
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
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Preparing"> <i class="icon-copy dw dw-shopping-cart2"></i></button>
									</div>
								</form>
                             
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-14">Preparing</div>
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
								<form action="" method="GET">
									<div id="">									
										<button  class="btn btn-danger"  type="submit" name="Rejected"><i class="icon-copy ion-close"></i></button>
									</div>
								</form>
                                
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
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Approved"> <i class="icon-copy ion-checkmark"></i></button>
									</div>
								</form>
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
			<?php 
			if(isset($_GET['All_order'])){
			?>
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
			<?php } elseif(isset($_GET['Pending_order'])){?>
			<!-- Customer All Order END -->


			<!-- Customer Pending Order Start -->		
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Pending' ORDER BY tbl_order.id desc  ";
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
			<?php } elseif(isset($_GET['Preparing'])){?>
			<!-- Customer Pending Order END -->



			<!-- Customer Preaping Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Preparing Orders</h2>
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
								<th> Recorded By</th>						
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.Admin_id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Preparing' ORDER BY tbl_order.id desc  ";
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
								<?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, tbl_order.id FROM tbl_order INNER JOIN user ON   tbl_order.Admin_id=user.ID  where tbl_order.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
								<td><?php echo $row_admin['Name']; ?></td>		
		
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
			<?php } elseif(isset($_GET['Rejected'])){?>
			<!-- Customer Preparing Order END -->		

			<!-- Customer Rejected Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Rejected Orders</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>
								<th class="table-plus datatable-nosort" >Company Name</th>						
								<th>DATE Ordered</th>
								<th>Reg Date Ordered</th>
								<th> Status</th>
								<th>Recorded By</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.Admin_id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Reject' ORDER BY tbl_order.id desc  ";
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
								<?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, tbl_order.id FROM tbl_order INNER JOIN user ON   tbl_order.Admin_id=user.ID  where tbl_order.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
								<td><?php echo $row_admin['Name']; ?></td>			
		
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
			<?php } elseif(isset($_GET['Approved'])){?>
			<!-- Customer Rejected Order END -->

			<!-- Customer Approve Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Approved Orders</h2>
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
								<th>Recorded By</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.Admin_id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Approved' ORDER BY tbl_order.id desc  ";
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
								<?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, tbl_order.id FROM tbl_order INNER JOIN user ON   tbl_order.Admin_id=user.ID  where tbl_order.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
								<td><?php echo $row_admin['Name']; ?></td>					
		
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
			<?php } else{ ?>
			<!-- Customer Approved Order END -->

			<!-- Customer Else Part DIspaly All Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Customer Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id  ORDER BY tbl_order.id desc  ";
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
			<?php }?>
			<!-- Customer Else Part Display All Order END -->






			<?php
				}
				else{
				?>
			<div class="row">

                <div class="col-xl-3 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from tbl_order where  Status = 'Pending'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending_order"> <i class="icon-copy dw dw-balance"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-16">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Preparing' AND Admin_id='$session_id'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);				 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Preparing"> <i class="icon-copy dw dw-shopping-cart2"></i></button>
									</div>
								</form>
                             
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-14">Preparing</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Reject' AND Admin_id='$session_id'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button  class="btn btn-danger"  type="submit" name="Rejected"><i class="icon-copy ion-close"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Rejected</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where  Status = 'Approved' AND Admin_id='$session_id' ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Approved"> <i class="icon-copy ion-checkmark"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Approved</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>		


			<!-- Customer Pending Order Start -->
			<?php 
			if(isset($_GET['Pending_order'])){
			?>		
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Pending' ORDER BY tbl_order.id desc  ";
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
			<?php } elseif(isset($_GET['Preparing'])){?>
			<!-- Customer Pending Order END -->



			<!-- Customer Preaping Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Preparing Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Preparing' AND tbl_order.Admin_id='$session_id' ORDER BY tbl_order.id desc  ";
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
			<?php } elseif(isset($_GET['Rejected'])){?>
			<!-- Customer Preparing Order END -->		

			<!-- Customer Rejected Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Rejected Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Reject' AND tbl_order.Admin_id='$session_id'  ORDER BY tbl_order.id desc  ";
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
			<?php } elseif(isset($_GET['Approved'])){?>
			<!-- Customer Rejected Order END -->

			<!-- Customer Approve Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Approved Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Approved' AND tbl_order.Admin_id='$session_id' ORDER BY tbl_order.id desc  ";
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
			<?php } else{ ?>
			<!-- Customer Approved Order END -->

			<!-- Customer Else Part DIspaly All Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Orders</h2>
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
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Pending' ORDER BY tbl_order.id desc  ";
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
			<?php }?>
			<!-- Customer Else Part Display All Order END -->



				<?php
				}
			?>












			


			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php'); ?>
	
</body>
</html>