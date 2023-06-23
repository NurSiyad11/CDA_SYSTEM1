<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') 
// $time=time();
?>
<body>
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">			
	
			<div class="row">
				<?php	        	
						$customer_id = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
						$Total = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$customer_id'  ")->fetch_assoc()['total'];
						$format =number_format((float)$Total, '2','.',',');
				?>              
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<!-- <img src="../uploads/dollor1.png" class="border-radius-100 shadow" width="80" height="80" alt=""> -->
								<img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">

							</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">INVOICE</div>
							</div>
						</div>
						<div class="card-box "></div>
					</div>
				</div>
				

			

				<div class="col-xl-4 mb-30">
					<?php                        
						$customer_id = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
						$Total = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$customer_id'  ")->fetch_assoc()['total'];
						$format =number_format((float)$Total, '2','.',',');
					?> 
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<!-- <img src="../uploads/cash3.png" class="border-radius-100 shadow" width="80" height="80" alt=""> -->
								<img src="../vendors/images/img/dollar.png" class="border-radius-100 shadow" width="40" height="40" alt="">
	
							</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">RECEIPT</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<?php						
						                        
						$customer_id = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
						$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$customer_id'  ")->fetch_assoc()['total'];
						$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$customer_id'  ")->fetch_assoc()['total'];
						$Bal = $INV - $RV;
						$format =number_format((float)$Bal, '2','.',',');
					?> 
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<!-- <img src="../uploads/cash3.png" class="border-radius-100 shadow" width="80" height="80" alt=""> -->
								<img src="../vendors/images/img/dollar2.png" class="border-radius-100 shadow" width="40" height="40" alt="">
	
							</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">Balance</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All 10 Transection</h2>
					</div>
				<div class="pb-20">
					<!-- table-bordered -->
					<table class="data-table table  stripe hover nowrap">
						<thead class="bg-dark text-white">
							<tr>				
								<th> No#</th>	
								<th class="datatable-nosort"> ##</th>							
								<th class="datatable-nosort"> Invoice No#</th>
								<th class="datatable-nosort">Date</th>
								<th class="datatable-nosort">Description</th>
								<th class="datatable-nosort">Invoice</th>
								<th class="datatable-nosort">Receipt</th>
								<th class="datatable-nosort">Balance</th>
								<!-- <th>File</th> -->
								<th class="datatable-nosort" >Action</th>												
																
							</tr>
						</thead>

						<tbody>

							<?php
							$bal = 0;
							$sql = "SELECT id,D_INV,invoice,File,Date,Memo,Amount,empty FROM invoice where Cid='$session_id' UNION All SELECT id,D_RV,RV,File,Date,Memo,empty,Amount FROM receipt    where Cid='$session_id'   order by Date desc ";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							
							


							$cnt=1;
							if($query->rowCount() > 0)
							{
							foreach($results as $result)
							{       ?>  

							<tr>
								<td> <?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($result->D_INV);?></td>
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>	
								<td><?php echo htmlentities($result->Memo);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->empty), '2','.',','); ?></td>
								<td>
									<?php
									//$bal = $bal;
									$in = $bal + $result->Amount;
									$out= $result->empty;
									$bal = $in - $out;

									//$Total = $bal 
									
									// if($out = 0){
									// 	$Bal = $in;
									// }elseif($in = 0){
									// 	$Bal = $out;
									// }

									// if($in = 0){
									// 	$bal -= $out;
									// }elseif($out = 0){
									// 	$bal += $in ;
									// }
									

									 echo "$ ". number_format((float)htmlentities($bal), '2','.',',');
									// $total= $bal + $in - $out;
									 //echo "$ ". number_format((float)htmlentities($total), '2','.',',');
									//echo "$ ". number_format((float)htmlentities($result->balance), '2','.',',');

									?>
								</td>
								
								<td>
									<?php if($result->D_INV != 'INV#') {
									?>
									<div class="table-actions">										
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" name="update-receipt" href="../admin/A5pdf2.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> RV View</a>
											</div>
										</div>
								
									</div>
									<?php }	else{
										?>
										<div class="table-actions">										
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="view_inv_rec.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> INV View</a>
											</div>
										</div>
								
									</div>
									<?php
									}		?>
								</td>								
							</tr>
							<?php $cnt++;  
								
									// $total = $bal + $in - $out;
							 } } ?>  

						</tbody>

						<!-- <tfoot class="table-secondary">
							<tr>				
								<th> </th>	
								<th> </th>							
								<th> </th>
								<th></th>
								<th>Total</th>
								<th>500</th>
								<th>600</th>
								<th></th>							
							
																
							</tr>
									</tfoot> -->
					</table>
			   </div>
			</div>


		</div>
	</div>
	<?php //include('../Script_online.php') ?>
	
	<?php include('includes/scripts1.php') ?>

</body>
</html>