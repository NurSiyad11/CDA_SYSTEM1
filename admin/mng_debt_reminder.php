<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
if (isset($_GET['delete'])) {	
	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM debt_reminder where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Record deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'mng_debt_reminder.php'; </script>";
		
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


			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from debt_reminder")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn  btn-primary" type="submit" name="All_debt_reminder"> <i class="icon-copy dw dw-support-1"></i></button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Debt Reminder </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-2 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from Support where  Status = 'Pending'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending"><i class="icon-copy dw dw-balance"></i></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-18">Pending</div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from Support where Reply != ''  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);				 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Replied"> <i class="icon-copy dw dw-file-134"></i></button>
									</div>
								</form>
                             
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Replied </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from debt_reminder where Status = 'Show'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Show"><i class="icon-copy dw dw-eye"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Show</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from debt_reminder where  Status = 'Hide'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-danger" type="submit" name="Hide"><i class="icon-copy dw dw-hide"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Hide</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>




	
			<!-- Customer All Debt Reminder Start -->
			<?php 
			if(isset($_GET['All_debt_reminder'])){
			?>
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Debt Reminder</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>						
								<th>DATE </th>
								<th>Registration Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Picture, debt_reminder.id, debt_reminder.RegDate, debt_reminder.Date,debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id ORDER BY debt_reminder.id desc  ";
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
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="Show"){
	                              ?>
								 	 <span class="badge badge-primary">Show</span>		                                 
	                                  <?php } if($stats=="Hide")  { ?>
										<span class="badge badge-danger">Hide</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_debt_reminder.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											<a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
											
											
											
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
			<?php } elseif(isset($_GET['Show'])){?>
			<!-- Customer All Debt Reminder END -->

			
			<!-- Customer Show Debt Reminder Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Debt Reminder</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>						
								<th>DATE </th>
								<th>Registration Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Picture, debt_reminder.id, debt_reminder.RegDate, debt_reminder.Date,debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id  where debt_reminder.Status = 'Show' ORDER BY debt_reminder.id desc  ";
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
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="Show"){
	                              ?>
								 	 <span class="badge badge-primary">Show</span>		                                 
	                                  <?php } if($stats=="Hide")  { ?>
										<span class="badge badge-danger">Hide</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_debt_reminder.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											<a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
											
											
											
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
			<?php } elseif(isset($_GET['Hide'])){?>
			<!-- Customer Show Debt Reminder END -->

			<!-- Customer Hide Debt Reminder Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Hidden Debt Reminders</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>						
								<th>DATE </th>
								<th>Registration Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Picture, debt_reminder.id, debt_reminder.RegDate, debt_reminder.Date,debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id  where debt_reminder.Status = 'Hide' ORDER BY debt_reminder.id desc  ";
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
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="Show"){
	                              ?>
								 	 <span class="badge badge-primary">Show</span>		                                 
	                                  <?php } if($stats=="Hide")  { ?>
										<span class="badge badge-danger">Hide</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_debt_reminder.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											<a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
											
											
											
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
			<?php } else {?>
			<!-- Customer Show Debt Reminder END -->


			<!-- Customer Else Part Displayed All Debt Reminder Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Debt Reminder</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Customer Name</th>						
								<th>DATE </th>
								<th>Registration Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT user.Name, user.Picture, debt_reminder.id, debt_reminder.RegDate, debt_reminder.Date,debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id ORDER BY debt_reminder.id desc  ";
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
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="Show"){
	                              ?>
								 	 <span class="badge badge-primary">Show</span>		                                 
	                                  <?php } if($stats=="Hide")  { ?>
										<span class="badge badge-danger">Hide</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_debt_reminder.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											<a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
											
											
											
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
			<!-- Customer Else Part Displayed All Debt Reminder END -->






		






			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts2.php'); ?>
</body>
</html>