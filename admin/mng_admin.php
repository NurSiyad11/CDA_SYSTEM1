<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>


<?php 

$time=time();
$query=mysqli_query($conn,"select * from user");
?>
<?php
// if (isset($_GET['delete'])) {
// 	$delete = $_GET['delete'];
// 	$sql = "DELETE FROM user where id = ".$delete;
// 	$result = mysqli_query($conn, $sql);
// 	if ($result) {
// 		echo "<script>alert('User deleted Successfully');</script>";
															 
//      	echo "<script type='text/javascript'> document.location = 'Mng_user.php'; </script>";
		
// 	}
// }
?>
<body>	
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
             <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Admin Section </h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="mng_user.php">Back</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>	

			<div class="card-box mb-30">				
				<div class="pd-20">
						<!-- <h2 class="text-blue h4">ALL Users </h2> -->
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
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
		                         $teacher_query = mysqli_query($conn,"select * from user where Role = 'Admin' ") or die(mysqli_error());
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
	                                  <?php } if($stats=="Inactive")  { ?>
                                       <span class="badge badge-danger">Inactive</span>
	                                  <?php } ?>									 
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_user.php?edit=<?php echo $row['ID'];?>"><i class="dw dw-edit2"></i> Edit</a>
											<!-- <a class="dropdown-item" href="generate_user_info.php?edit=<?php //echo $row['ID'];?>"><i class="dw dw-edit2"></i> Pdf</a> -->
											<!-- <a class="dropdown-item" href="Mng_user.php?delete=<?php //echo $row['ID'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a> -->
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>

					<!-- <script>
						function checkdelete(){
							return confirm('Do you Want to Delete this User ? ');
						}
					</script> -->
			   	</div>	
			</div>  		
		</div>    

	</div>
	<!-- js -->
    <?php  include('includes/scripts2.php'); ?>   

</body>
</html>