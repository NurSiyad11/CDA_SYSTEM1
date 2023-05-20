<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') ?>

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
										<img src="../vendors/images/img/cash.png" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<h4 class=" ml-3 text-center" style="color:bl"><?php echo  "$ " .($format) ?> </h4>
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
										<img src="../vendors/images/img/cash.png" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<h4 class=" ml-3 text-center"><?php echo "$ " . ($format) ?> </h4>
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
										<img src="../vendors/images/img/cash.png" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<h4 class=" ml-3 text-center  "><?php echo "$ " . ($format) ?> </h4>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>			
			
		


			<div class="row">				
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">New Customer Receipts</h2>
						<div class="card-box mb-30">
							<!-- <div class="pd-20">
								<h2 class="text-blue h4">New Customer Receipts</h2>
							</div> -->
							<div class="pb-20">
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th>NO#</th>
											<th class="table-plus">Customer Name</th>								
											<th>Receipt No#</th>
											<th>Date </th>
											<th>Memo</th>
											<th>Amount</th>
											<th>Status</th>						
											<th class="datatable-nosort">ACTION</th>
										</tr>
									</thead>


									<tbody>
										<?php                               
										$sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID Where receipt.Status='Pending' order by receipt.Date Desc ";                           
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
											<td><?php echo htmlentities($result->Com_name);?></td>
											<td><?php echo htmlentities($result->RV);?></td>
											<td><?php echo htmlentities($result->Date);?></td>	
											<td><?php echo htmlentities($result->Memo);?></td>
											<td ><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>

											<td><?php $stats=($result -> Status);
											if($stats=="Pending"){
											?>
											<span class="badge badge-primary">Pending</span>
												<!-- <span style="color: green">Pending</span> -->
												<?php } if($stats=="Approved")  { ?>
													<span class="badge badge-success">Approved</span>
												<?php } if($stats=="Rejected")  { ?>
													<span class="badge badge-danger">Rejected</span>
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
															<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-edit-2"></i> View</a>
															<a class="dropdown-item" name="update-receipt" href="../admin/A5pdf2.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> RV View</a>

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




						<!-- <div id="chart5"></div> -->
						<!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div> -->
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

				<!-- <div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart5"></div>
					</div>
				</div> -->
			</div>
			<!-- data-table table stripe hover nowrap -->

			<?php include('includes/footer.php') ?>


		</div>
	</div>
	<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
	<?php include('includes/scripts2.php') ?>



</body>
</html>