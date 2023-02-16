<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
if (isset($_GET['delete'])) {
	// swal({		
	// 	title: "Are you sure?",
	// 	text: "Once deleted, you will not be able to recover this imaginary file!",
	// 	icon: "warning",
	// 	buttons: true,
	// 	dangerMode: true,
	// })
	//   .then((willDelete) => {
	// 	if (willDelete) {
	// 	  swal("Poof! Your imaginary file has been deleted!", {
	// 		icon: "success",
	// 	  });
	// 	} else {
	// 	  swal("Your imaginary file is safe!");
	// 	}
	//   });
	
	
	
	
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
			
			<div class="row pb-10">
				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT id from tbl_order ";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$empcount=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">All_Applied_Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
							-->
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $status="Received Order";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Status = '$status'")or die(mysqli_error());
						 $count_reg_staff = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_staff); ?></div>
								<div class="font-14 text-secondary weight-500">Received_Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
								-->
						</div>
					</div>
				</div>


				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php 
						 $status="Preparing Order";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Preparing_Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
								-->
						</div>
					</div>
				</div>



				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php 
						 $status="Pending Order";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Pending_Order </div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
								-->
						</div>
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						
					<?php 
						 $status="Reject Order";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Rejected_Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
								-->
						</div>
					</div>
				</div>


				<div class="col-xl-2 col-lg-2 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

					<?php 
						 $status="Approved Order";;
						 $query = mysqli_query($conn,"select Status from tbl_order where Status = '$status'")or die(mysqli_error());
						 $count = mysqli_num_rows($query);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count); ?></div>
								<div class="font-14 text-secondary weight-500">Approved_Order</div>
							</div>
							<!--
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>








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
								$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id ORDER BY tbl_order.id desc  ";
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
								
								<!-- <td><?php //echo $row['Order_type']; ?></td> -->
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
											<a class="dropdown-item" href="All_order.php?edit=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Edit</a>
											</a>
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






				<!-- Large modal -->
			<div class="col-md-4 col-sm-12 mb-30">
				<!-- <div class="pd-20 card-box height-100-p"> -->
					<!-- <h5 class="h4">Large modal</h5>
					<a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
						<img src="vendors/images/modal-img1.jpg" alt="modal">
					</a> -->
					<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
								<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT user.Name,user.Email, user.Picture, tbl_order.id, tbl_order.Date, tbl_order.Reason, tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
								?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>							

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Email']; ?>">
										</div>
									</div>
								
								</div>


								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Date Ordered :</label>
											<input name="date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Date']; ?>">
										</div>
									</div>							

									<div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Resson :</label>
											<input name="Resson" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Reason']; ?>">
										</div>
									</div>								
								</div>

								<div class="row">
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<select name="Status" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
												<!-- <option value="Received Order">Received Order</option> -->
												<option value="Preparing">Preparing Order</option>
												<!-- <option value="Pending">Pending</option> -->
												<option value="Approved Order">Approved Order</option>
												<option value="Reject Order">Reject Order</option>
											</select>
										</div>
									</div>
									
								</div>					
								
								<div class="row">
									
									
									

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="order" id="order" data-toggle="modal">Apply&nbsp;Order</button>
											</div>
										</div>
									</div>
								</div>
							</section>

							<section>
                                <div class="row">
                                    <?php
                                    
                                    $sql="SELECT file from tbl_order where id='$get_id' ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info !=''){
                                           ?>                                       
                                            <embed type="application/pdf" src="../Customer/pdf/<?php echo $info['file'] ; ?>" width="900" height="500">
                                        <?php
                                        }else{
                                            echo "No file found";                                     
                                        ?>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </div>                                
                            </section>


						</form>
					</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				<!-- </div> -->
			</div>







			<?php include('includes/footer.php'); ?>
		</div>
	</div>
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
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</body>
</html>