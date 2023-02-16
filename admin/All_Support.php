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
					$sql = "SELECT id from support";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$usercount=$query->rowCount();
				?> 
			
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1 bg-info">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../uploads/user2.png" class="border-radius-100 shadow" width="50" height="50" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h3 mb-0"><?php echo  ($usercount); ?></div>
								<div class="weight-600 font-18">Total Support</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<?php
						
					
						$sql = "SELECT id from support where Reply='' ";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
					?> 
					<div class="card-box height-100-p widget-style1 bg-info">
						<div class="d-flex flex-wrap align-items-center ">
							<div class="progress-data">
								<div id="">
								<img src="../uploads/user2.png" class="border-radius-100 shadow" width="50" height="50" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h3 mb-0"><?php echo ($count); ?></div>
								<div class="weight-600 font-18">New Support</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<?php						
		

						$sql = "SELECT id from support where Reply!='' ";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$count=$query->rowCount();
					?> 
					<div class="card-box height-100-p widget-style1 bg-info">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../uploads/user2.png" class="border-radius-100 shadow" width="50" height="50" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h3 mb-0"><?php echo ($count); ?></div>
								<div class="weight-600 font-18">Replyed Support</div>
							</div>
						</div>
					</div>
				</div>				
			
			</div>









			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead class="table-primary ">
							<tr>
								<th>NO#</th>
								<th class="table-plus">Name</th>								
								<th>Message</th>								
								<!-- <th>Reply</th> -->
								<th>Time  </th>
								<th>Status</th>                                
						
								
						
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name,user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
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
								
								
	                            <td><?php echo $row['Message']; ?></td>
								<!-- <td><?php // echo $row['Reply']; ?></td> -->
								<td><?php echo $row['Time_user']; ?></td>
                               
							
                               
								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
	                                  <span style="color: red">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
	                                 <span style="color: Blue">Show</span>
	                                  <?php } if($stats=="Pending")  { ?>
	                                 <span style="color: Blue">Pending</span>
	                                  <?php } 
	                             ?>                            
						
							
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>












			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php //include('includes/scripts.php')?>


	
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