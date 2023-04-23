<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
// if (isset($_GET['delete'])) {	
	
// 	$delete = $_GET['delete'];
// 	$sql = "DELETE FROM debt_reminder where id = ".$delete;
// 	$result = mysqli_query($conn, $sql);
// 	if ($result) {
// 		echo "<script>alert('Record deleted Successfully');</script>";
//      	echo "<script type='text/javascript'> document.location = 'mng_debt_reminder.php'; </script>";
		
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

			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from apply_form where Status='2' ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="">
                                <img src="../vendors/images/img/xasusin1.png" class="border-radius-100 shadow" width="50" height="50" alt="">
                                </div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
                                <div class="weight-300 font-18">Approved </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from apply_form where  Status = '2' AND Send_email='0' ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-data">
                                <div id="">
                               <a href="Wait_email.php"> <img src="../vendors/images/img/Pending1.png" class="border-radius-100 shadow" width="40" height="40" alt=""></a>
                                </div>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-16">Waiting</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from apply_form where  Status = '2' AND Send_email='1' ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-data">
                                <div id="">
                               <a href="Send_email.php"> <img src="../vendors/images/img/Pending1.png" class="border-radius-100 shadow" width="40" height="40" alt=""></a>
                                </div>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-16">Sent</div>
                            </div>
                        </div>
                    </div>
                </div>

              

            </div>


	



			

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Waiting For A Feedback</h2>
					</div>
				<div class="pb-20">
					<!-- data-table table stripe hover nowrap -->
					<table class="table stripe hover data-table-export nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Full Name</th>						
								<th>Comapny Name </th>
								<th>Email</th>
                                <th>Phone </th>
								<th> Status</th>	
                                <th> Gmail</th>							
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT * from apply_form where Status='2' ORDER BY id desc  ";
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
	                            <td><?php echo $row['Company_name']; ?></td>
								<td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Phone']; ?></td>


								<td><?php $stats=$row['Status'];
	                             if($stats=="0"){
	                              ?>
								 	 <span class="badge badge-primary">Pending</span>		                                 
	                                  <?php } if($stats=="1")  { ?>
										<span class="badge badge-secondary">Processing</span>	
	                             <?php } if($stats=="2")  { ?>
										<span class="badge badge-success">Approved</span>	
	                             <?php } if($stats=="3")  { ?>
										<span class="badge badge-danger">Rejected</span>	
	                             <?php }?>
								</td>

                                <td><?php $send_email=$row['Send_email'];
	                             if($send_email=="0"){
	                              ?>
								 	 <span class="badge badge-primary">Wait</span>		                                 
	                                  <?php } if($send_email=="1")  { ?>
										<span class="badge badge-success">Sent</span>	
	                             <?php } ?>
								</td>
											
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_feedback_req.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
											<!-- <a class="dropdown-item" href="mng_debt_reminder.php?delete=<?php// echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a> -->
											
											
											
										</div>
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<script>
						// function checkdelete(){
						// 	return confirm('Do you Want to Delete this Record ? ');
						// }
					</script>
					
			   </div>
			</div>






		






			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts2.php'); ?>
</body>
</html>