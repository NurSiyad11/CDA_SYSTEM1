<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>

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
                    $query = mysqli_query($conn,"select * from web_contact")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn  btn-primary" type="submit" name="All"> <i class="icon-copy dw dw-support-1"></i></button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Web Contacts </div>	
                            </div>
                        </div>
                    </div>
                </div>
         

                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from web_contact where Status = '0'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending"><i class="icon-copy dw dw-eye"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from web_contact where  Status = '1'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Done"><i class="icon-copy dw dw-hide"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Done</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>




	
			<!-- Customer All Debt Reminder Start -->
			<?php 
			if(isset($_GET['All'])){
			?>
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Web Contacts</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Name</th>						
								<th>Email </th>
								<th>Phone</th>
                                <th>Reg Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT * FROM web_contact ORDER BY id desc  ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<!-- <div class="avatar mr-2 flex-shrink-0">
											<img src="<?php //echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div> -->
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'];?></div>
										</div>
									</div>
								</td>						
	                            <td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Phone']; ?></td>
                                <td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="0"){
	                              ?>
								 	 <span class="badge badge-primary">Pending</span>		                                 
	                                  <?php } if($stats=="1")  { ?>
										<span class="badge badge-success">Done</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_web_contact.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php //echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a> -->
											
											
											
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
			<?php } elseif(isset($_GET['Pending'])){?>
			<!-- Customer All Debt Reminder END -->

			
			<!-- Customer Show Debt Reminder Start -->
            <div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Web Contacts</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Name</th>						
								<th>Email </th>
								<th>Phone</th>
                                <th>Reg Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT * FROM web_contact where Status='0' ORDER BY id desc  ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">									
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'];?></div>
										</div>
									</div>
								</td>						
	                            <td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Phone']; ?></td>
                                <td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="0"){
	                              ?>
								 	 <span class="badge badge-primary">Pending</span>		                                 
	                                  <?php } if($stats=="1")  { ?>
										<span class="badge badge-success">Done</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_web_contact.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php //echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a> -->
											
											
											
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
			<?php } elseif(isset($_GET['Done'])){?>
			<!-- Customer Show Debt Reminder END -->

			<!-- Customer Hide Debt Reminder Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Done Web Contacts</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Name</th>						
								<th>Email </th>
								<th>Phone</th>
                                <th>Reg Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT * FROM web_contact where Status='1' ORDER BY id desc  ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">									
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'];?></div>
										</div>
									</div>
								</td>						
	                            <td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Phone']; ?></td>
                                <td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="0"){
	                              ?>
								 	 <span class="badge badge-primary">Pending</span>		                                 
	                                  <?php } if($stats=="1")  { ?>
										<span class="badge badge-success">Done</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_web_contact.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php //echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a> -->
											
											
											
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
						<h2 class="text-blue h4">ALL Web Contacts</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Name</th>						
								<th>Email </th>
								<th>Phone</th>
                                <th>Reg Date</th>
								<th> Status</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$i =1;
								$sql = "SELECT * FROM web_contact ORDER BY id desc  ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<!-- <div class="avatar mr-2 flex-shrink-0">
											<img src="<?php //echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div> -->
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'];?></div>
										</div>
									</div>
								</td>						
	                            <td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Phone']; ?></td>
                                <td><?php echo $row['RegDate']; ?></td>

								<td><?php $stats=$row['Status'];
	                             if($stats=="0"){
	                              ?>
								 	 <span class="badge badge-primary">Pending</span>		                                 
	                                  <?php } if($stats=="1")  { ?>
										<span class="badge badge-success">Done</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_web_contact.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php //echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a> -->
											
											
											
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