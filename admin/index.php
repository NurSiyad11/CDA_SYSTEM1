<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') ?>
<?php include('includes/Admin_Administrator.php') ?>

<?php	
	// $dataPoints1 = array(
	// 	array("label"=> "Cash On Hand", "y"=> 36.12),
	// 	array("label"=> "feb", "y"=> 34.87),
	// 	array("label"=> "mar", "y"=> 40.30),
	// 	array("label"=> "april", "y"=> 35.30),
	// 	array("label"=> "may", "y"=> 39.50),
	// 	array("label"=> "jun", "y"=> 50.82),
	// 	array("label"=> "july", "y"=> 74.70)

	// );
	// $dataPoints2 = array(
	// 	array("label"=> "Cash On Hamd", "y"=> 14.61),
	// 	array("label"=> "feb", "y"=> 70.55),
	// 	array("label"=> "mar", "y"=> 72.50),
	// 	array("label"=> "april", "y"=> 81.30),
	// 	array("label"=> "may", "y"=> 63.60),
	// 	array("label"=> "june", "y"=> 69.38),
	// 	array("label"=> "july", "y"=> 98.70)

		
		
	// 	);		
	?>

	<script>
	// window.onload = function () {
	
	// var chart = new CanvasJS.Chart("chartContainer", {
	// 	animationEnabled: true,
	// 	theme: "light3",
	// 	title:{
	// 		text: "Average Amount Cash in And Cash out."
	// 	},
	// 	axisY:{
	// 		includeZero: true
	// 	},
	// 	legend:{
	// 		cursor: "pointer",
	// 		verticalAlign: "center",
	// 		horizontalAlign: "right",
	// 		itemclick: toggleDataSeries
	// 	},
	// 	data: [{
	// 		type: "column",
	// 		name: "Total In",
	// 		indexLabel: "{y}",
	// 		yValueFormatString: "$#0.##",
	// 		showInLegend: true,
	// 		dataPoints: <?php //echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	// 	},{
	// 		type: "column",
	// 		name: "Total out",
	// 		indexLabel: "{y}",
	// 		yValueFormatString: "$#0.##",
	// 		showInLegend: true,
	// 		dataPoints: <?php //echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	// 	}]
	// });
	// chart.render();
	
	// function toggleDataSeries(e){
	// 	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
	// 		e.dataSeries.visible = false;
	// 	}
	// 	else{
	// 		e.dataSeries.visible = true;
	// 	}
	// 	chart.render();
	// }
	
	// }
	</script>





<body>
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="conteiner p-2">
				<div class="row">
					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3">
							<div class="card-header text-center bg-blue" style="color:white">Cash On Hand</div>
							<div class="card-body">
								<?php
								$RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
								$PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
								$Bal = $RV - $PV;
								$format =number_format((float)$Bal, '2','.',',');
								?> 
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollar7.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h5 class=" ml-3 text-center" style="color:bl"><?php echo  "USD " .($format) ?> </h5>
								</div>							
							</div>
						</div>
					</div>

					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3 ">
							<div class="card-header text-center bg-blue" style="color:white">Customer Balance</div>
							<div class="card-body">
								<?php 
									$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice`   ")->fetch_assoc()['total'];
									$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt`  ")->fetch_assoc()['total'];
									$Bal = $INV - $RV;
									$format =number_format((float)$Bal, '2','.',',');
								?>
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollar7.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h5 class=" ml-3 text-center"><?php echo "USD " . ($format) ?> </h5>
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
								<?php 
									$INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice`   ")->fetch_assoc()['total'];
									$RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment`  ")->fetch_assoc()['total'];
									$Bal = $INV - $RV;
									$format =number_format((float)$Bal, '2','.',',');
								?>
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollar7.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h5 class=" ml-3 text-center  "><?php echo "USD " . ($format) ?> </h5>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>		
		


			<div class="row">				
				<div class="col-xl-8 mb-30">
					<div class="card-box mb-30">
						<div class="pd-20">
							<h2 class="text-black h4">New Orders</h2>
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

									<?php
												
									$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Pending' ORDER BY tbl_order.id desc  ";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{               ?>  

									<tr>
										<td> <?php echo htmlentities($cnt);?></td>
										<td class="table-plus">
											<div class="name-avatar d-flex align-items-center">
												<div class="avatar mr-2 flex-shrink-0">
													<img src="<?php echo (!empty($result->picture)) ? '../uploads/'.$result->picture : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
												</div>
												<div class="txt">
													<div class="weight-600"><?php echo htmlentities($result->Name); ?></div>
												</div>
											</div>
										</td>
										<td><?php echo htmlentities($result->Com_name);?></td>
										<td><?php echo htmlentities($result->Date);?></td>	
										<td><?php echo htmlentities($result->RegDate);?></td>
										<td><?php $stats=$result->Status;
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
											<div class="table-actions">										
												<div class="dropdown">
													<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
														<i class="dw dw-more"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
														<a class="dropdown-item" href="edit_order.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
														
													</div>
												</div>								
											</div>
										</td>
									</tr>
									<?php $cnt++;} }?>  
								</tbody>	
							</table>
							<script>
								function checkdelete(){
									return confirm('Do you Want to Delete this Record ? ');
								}
							</script>							
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<h4 class="mb-20 h4">With budget List</h4>
						<?php	
						
						$query = mysqli_query($conn,"select * from account order by Acc_name");  
						while($row = mysqli_fetch_array($query)){
							$test=$row['id'];
							$total_income = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$test   ")->fetch_assoc()['total'];
							$total_expense = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$test ")->fetch_assoc()['total'];
							$Ba_Inc_exp = $total_income - $total_expense;
							$bal_format =number_format((float)$Ba_Inc_exp, '2','.',',');
							if($bal_format > 0){
							?>					
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								<?php echo $row['Acc_name']; ?>
									<span class="badge badge-green badge-pill"><?php echo "S ". ($bal_format)?></span>								
							</li>					
						</ul>
						<?php }  }?>							
					</div>
				</div>				
			</div>



			<!-- Customer Pending Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-black h4">New Support</h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead class=" bg-dark text-white" >
							<tr>
								<th>NO#</th>
								<th class="table-plus  datatable-nosort">Customer Name</th>	
								<th class="table-plus  datatable-nosort">Company Name</th>								
								<th class="datatable-nosort">Time  </th>
								<th class="datatable-nosort" >Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php
										
							// $sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Pending' ORDER BY tbl_order.id desc  ";
							
							$sql_support = "SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id  where support.Status='Pending' order by support.Time_user Desc" ;
							$query = $dbh -> prepare($sql_support);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
							foreach($results as $result)
							{               ?>  

							<tr>
								<td> <?php echo htmlentities($cnt);?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($result->picture)) ? '../uploads/'.$result->picture : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo htmlentities($result->Name); ?></div>
										</div>
									</div>
								</td>
								<td><?php echo htmlentities($result->Com_name);?></td>
								<td><?php echo htmlentities($result->Time_user);?></td>	

								<td><?php $stats=$result->Status;
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <!-- <span style="color: red">Hide</span> -->
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>   			
								
								
								<td>
									<div class="table-actions">										
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_support.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
												
											</div>
										</div>								
									</div>
								</td>
							</tr>
							<?php $cnt++;} }?>  
						</tbody>					
					</table>
			   </div>
			</div>













			<!-- data-table table stripe hover nowrap -->
			<?php include('includes/footer.php') ?>
		</div>
	</div>
	<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
	<?php include('includes/scripts2.php') ?>



</body>
</html>