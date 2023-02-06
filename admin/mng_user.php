<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php 
// if(!isset($_SESSION['alogin'])){
// 	header('location:../index.php');
// 	die();
// }
$time=time();
$query=mysqli_query($conn,"select * from user");
?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM user where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('User deleted Successfully');</script>";
															 
     	echo "<script type='text/javascript'> document.location = 'Mng_user.php'; </script>";
		
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
			<div class="title pb-20">
				<h2 class="h3 mb-0">User Manage</h2>
			</div>
			

			<div class="row pb-10">

				

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
					<?php 
						 $query_reg_customer = mysqli_query($conn,"select * from user where Role = 'Customer' ")or die(mysqli_error());
						 $count_reg_customer = mysqli_num_rows($query_reg_customer);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_customer);?></div>
								<div class="font-20 text-secondary weight-500">Total Customers</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_Vendor = mysqli_query($conn,"select * from user where Role = 'Vendor' ")or die(mysqli_error());
						 $count_reg_Vendor = mysqli_num_rows($query_reg_Vendor);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_Vendor); ?></div>
								<div class="font-20 text-secondary weight-500">Total Vendors</div>
							</div>
						
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_hod = mysqli_query($conn,"select * from user where role = 'HOD' ")or die(mysqli_error());
						 $count_reg_hod = mysqli_num_rows($query_reg_hod);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_hod); ?></div>
								<div class="font-20 text-secondary weight-500">Department Heads</div>
							</div>
						
						</div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_admin = mysqli_query($conn,"select * from user where role = 'Admin' ")or die(mysqli_error());
						 $count_reg_admin = mysqli_num_rows($query_reg_admin);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_admin); ?></div>
								<div class="font-20 text-secondary weight-500">Administrators</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>


			<div class="card-box mb-30">
					<?php
					$sql = "SELECT id from user";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$usercount=$query->rowCount();
					?>
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Users :  <?php echo($usercount);?></h2>
					</div>
				<div class="pb-20">
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

					<script>
						function checkdelete(){
							return confirm('Do you Want to Delete this User ? ');
						}
					</script>

					<!-- Sceripts Online User Update  -->
					<script>
						function updateUserStatus(){
							jQuery.ajax({
								url:'../update_user_status.php',
								success:function(){
									
								}
							});
						}
						
						function getUserStatus(){
							jQuery.ajax({
								url:'../get_user_status.php',
								success:function(result){
									jQuery('#user_grid').html(result);
								}
							});
						}
						
						setInterval(function(){
							updateUserStatus();
						},1000);
						
						setInterval(function(){
							getUserStatus();
						},3000);
					</script>


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


    <!-- js -->
	<!-- <script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>    
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script> -->
	<!-- buttons for Export datatable -->
	<!-- <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<!-- <script src="vendors/scripts/datatable-setting.js"></script></body> --> -->

</body>
</html>