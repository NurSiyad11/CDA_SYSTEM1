<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') ?>

<?php

$time=time();
$query=mysqli_query($conn,"select * from user");
?>

<body>

	<?php include('includes/navbar.php') ?>

	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>
	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<!-- <div class="card-box pd-20 height-100-p mb-30">

						<?php// $query= mysqli_query($conn,"select * from user where id = '$session_id'")or die(mysqli_error());
								//$row = mysqli_fetch_array($query);
						?>

				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="../vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?php //echo $row['Name']; ?></div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div> -->



			<div class="row">
				<?php
					
					$RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
					$PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
					$Bal = $RV - $PV;
					$format =number_format((float)$Bal, '2','.',',');
				?> 
			
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="40" height="40" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">Cash On Hand</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<?php
						
						$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice`   ")->fetch_assoc()['total'];
						$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt`   ")->fetch_assoc()['total'];
						$Bal = $INV - $RV;
						$format =number_format((float)$Bal, '2','.',',');
					?> 
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="40" height="40" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">Customer Balance</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<?php						
						$INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice`   ")->fetch_assoc()['total'];
						$RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment`   ")->fetch_assoc()['total'];
						$Bal = $INV - $RV;
						$format =number_format((float)$Bal, '2','.',',');
					?> 
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="40" height="40" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">Vendor Balance</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- <div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>

			<div class="conteiner p-2">
				<div class="row">
					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3">
							<div class="card-header text-center bg-blue" style="color:white">Cash On Hand</div>
							<div class="card-body">
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h4 class=" ml-3 text-center" style="color:bl">  6,000.00 </h4>
								</div>
								<!-- <h5 class="card-title ml-2 text-cente"> Cash On Hand</h5> -->
								<!-- <p class="card-text"></p> -->
							</div>
						</div>
					</div>

					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3 ">
							<div class="card-header text-center bg-blue" style="color:white">Customer Balance</div>
							<div class="card-body">
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h4 class=" ml-3 text-center">  6,000.00 </h4>
								</div>
								<!-- <h5 class="card-title ml-2 text-cente"> Cash On Hand</h5> -->
								<!-- <p class="card-text"></p> -->
							</div>
						</div>
					</div>

					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3" >
							<div class="card-header text-center bg-blue" style="color:white">Vendor Balance</div>
							<div class="card-body">
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h4 class=" ml-3 text-center">  6,000.00 </h4>
								</div>
								<!-- <h5 class="card-title ml-2 text-cente"> Cash On Hand</h5> -->
								<!-- <p class="card-text"></p> -->
							</div>
						</div>
					</div>
					
					<!-- <div class="card text-bg-primary mb-3 ml-3" style="max-width: 20rem;">
						<div class="card-header">Header</div>
						<div class="card-body">
							<h5 class="card-title">Primary card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div> -->
					<!-- <div class="card text-bg-primary mb-3 ml-3" style="max-width: 20rem;">
						<div class="card-header">Header</div>
						<div class="card-body">
							<h5 class="card-title">Primary card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div> -->



				</div>
			</div>
				<div class="row">
					<div class="col-xl-12 mb-30">
						<div class="card text-bg-primary mb-3">
							<div class="card-header text-left bg-" style="color:whibluete">Users</div>
							<div class="card-body">
								<!-- <div class="row"> -->
								<table class="data-table table stripe hover nowrap">
						<thead class="table-primary">
							<tr>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
								<th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
								<th>Login Status</th>
								<th>Last Login Time</th>
								<th>POSITION</th>
                                <th>Status</th>
						
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
                            
							<tr>

								 <?php
		                         $teacher_query = mysqli_query($conn,"select * from user") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['ID'];

								 $status='Offline';
								$class="btn-danger";
								if($row['Login_status']>$time){
										$status='Online';
										$class="btn-success";
								}
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
	                            <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Phone']; ?></td>
                                <td><?php echo $row['Address']; ?></td>
								<!-- <td><?php //echo $row['Login_status']; ?></td> -->

								<td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
								<td><span style="Color: Blue"><?php echo $row['Login_time']; ?></span></td>


								<td><?php echo $row['Role']; ?></td>
                                
								<td><?php $stats=$row['Status'];
	                             if($stats=="Active"){
	                              ?>
                                    <span class="badge badge-success">Active</span>	                                
	                                  <?php } if($stats=="Deactive")  { ?>
                                       <span class="badge badge-danger">Deactive</span>
	                                  <?php } ?>									 
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_user.php?edit=<?php echo $row['ID'];?>"><i class="dw dw-edit2"></i> Edit</a>
											<a class="dropdown-item" href="Mng_user.php?delete=<?php echo $row['ID'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>













								<!-- <table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
										<th scope="col">#</th>
										<th scope="col">First</th>
										<th scope="col">Last</th>
										<th scope="col">Handle</th>
										</tr>
									</thead>
									<tbody>
										<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
										</tr>
										<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
										</tr>
										<tr>
										<th scope="row">3</th>
										<td colspan="2">Larry the Bird</td>
										<td>@twitter</td>
										</tr>
									</tbody>
									</table>
									<!-- <div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div> -->
									<!-- <h4 class=" ml-3 text-center" style="color:bl">  6,000.00 </h4> -->
								</div>								
							<!-- </div> -->
						</div> -->
					</div>
				</div>
			


			<!-- <div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div> -->
			<!-- data-table table stripe hover nowrap -->



				




			<?php// include('includes/footer.php') ?>

		</div>
	</div>
	
	<?php// include('includes/scripts.php') ?>

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
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
	<script src="../src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script></body>


</body>
</html>