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
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Waiting Feedback</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="feedback_req.php">Back</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Waiting</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Waiting For A Feedback</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
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
								$sql = "SELECT * from apply_form where Status='2' AND Send_email='0' ORDER BY id desc  ";
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
										</div>
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>					
			   </div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts2.php'); ?>
</body>
</html>