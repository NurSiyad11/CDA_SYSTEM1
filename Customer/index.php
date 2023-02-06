<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') 
// $time=time();
?>
<script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'update_user_status.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'get_user_status.php',
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

<body>
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
			<div class="row">
				<?php				               
						
						$today_budget = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
						$Total = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today_budget'  ")->fetch_assoc()['total'];
						$format =number_format((float)$Total, '2','.',',');
										
				?> 
                
			
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../uploads/cash2.png" class="border-radius-100 shadow" width="80" height="80" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">INVOICE</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<?php                        
						$today_budget = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
						$Total = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today_budget'  ")->fetch_assoc()['total'];
						$format =number_format((float)$Total, '2','.',',');
					?> 
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../uploads/cash3.png" class="border-radius-100 shadow" width="80" height="80" alt="">
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
						                        
						$today_budget = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
						$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today_budget'  ")->fetch_assoc()['total'];
						$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today_budget'  ")->fetch_assoc()['total'];
						$Bal = $INV - $RV;
						$format =number_format((float)$Bal, '2','.',',');
					?> 
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="">
								<img src="../uploads/cash3.png" class="border-radius-100 shadow" width="80" height="80" alt="">
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
								<div class="weight-600 font-14">Balance</div>
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

			



			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Transection</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table table-bordered stripe hover nowrap">
						<thead class="table-primary">
							<tr>				
								<th> No#</th>	
								<th> ##</th>							
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Description</th>
								<th>Invoice</th>
								<th>Receipt</th>
								<th>File</th>
								<th>Action</th>

							
							
																
							</tr>
						</thead>
						<tbody>
							<tr>						

								<?php 						
								$i =1;
								$Cname = $conn->query("SELECT id as eid from `user` where id='$session_id'  ")->fetch_assoc()['eid'];
								// $sql = "SELECT id,D_INV,invoice,File,Date,Memo,Amount,empty FROM invoice where Cid='$Cname' UNION All SELECT id,D_RV,RV,File,Date,Memo,empty,Amount FROM receipt where Cid='$Cname'  order by Date desc ";

								$sql = "SELECT * FROM Invoice_Receipt where Cid='$Cname' order by Date desc ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
							
								 ?>  
								<td ><?php echo $i++; ?></td>
								<td><?php echo  $row['D_INV']; ?></td>
								<td><?php echo  $row['invoice']; ?></td>
	                            <td><?php echo  $row['Date']; ?></td>								
								<td><?php echo $row['Memo']; ?></td>
								<td><?php echo $row['Amount']; ?></td>
								<td><?php echo $row['empty']; ?></td>
								<td><?php echo $row['File']; ?></td>

								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_order_check_test.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											
										</div>
									</div>
								</td>
							
								

								
							
							</tr>
							<?php }?>
						</tbody>
						<tfoot class="table-secondary">
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
									</tfoot>
					</table>
			   </div>
			</div>


            <div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4"> Order Check</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead class="table-primary">
							<tr>		
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>File  </th>		
								<th>ACTION</th>	
							</tr>
						</thead>
						<tbody>
							<tr>

							

								<?php 						
								$i=1;
								$Cname = $conn->query("SELECT id as eid from `user`  where id='$session_id'  ")->fetch_assoc()['eid'];
								$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.id where Cid='$Cname' AND invoice.Status='Pending' order by Date DESC ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
							
								 ?> 

								<td ><?php echo $i++; ?></td>
								<td><?php echo "INV# ". $row['invoice']; ?></td>
	                            <td><?php echo $row['Date']; ?></td>
								<td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
								<td><?php echo $row['Memo']; ?></td>
								<td><span class="badge badge-primary"><?php echo $row['Status']; ?></span></td>
								<!-- <span class="badge badge-primary">Pending</span> -->
								<td><?php echo $row['File']; ?></td>
								</td>

								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_order_check.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											
										</div>
									</div>
								</td>


							</tr>
							<?php }?>
						</tbody>
					</table>
			   </div>
			</div>





            



				<div class="faq-wrap">
					<div id="accordion">
						<div class="card">
							<div class="card-header">
								<button class="btn btn-block" data-toggle="collapse" data-target="#faq1">
									Collapsible Group Item #1
								</button>
							</div>
							<div id="faq1" class="collapse show" data-parent="#accordion">


								<div class="card-body">
									<!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. -->
									<div class="row">
										
										<?php
										$teacher_query = mysqli_query($conn,"select * from user") or die(mysqli_error());
										while ($row = mysqli_fetch_array($teacher_query)) {
										$id = $row['ID'];
											?>
										<div class="col-xl-4 mb-30">
											<div class="card-box height-100-p widget-style1">
												<div class="d-flex flex-wrap align-items-center">
													<div class="progress-data">
														<div id="">
														<img src="<?php echo (!empty($row['Location'])) ? '../uploads/'.$row['Location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
														</div>
													</div>
													<div class="widget-data">
														<div class="h5 mb-0"><?php echo "". $row['Com_name']; ?></div>
														<div class="weight-600 font-14"><?php echo "". $row['Name']; ?></div>
														<div class="weight-600 font-14"><?php echo "". $row['Address']; ?></div>
													</div>
												</div>
												
											</div>
										</div>
										<?php } ?>
									
										<div class="col-xl-4 mb-30">
											<div class="card-box height-100-p widget-style1">
												<div class="d-flex flex-wrap align-items-center">
													<div class="progress-data">
														<div id="chart"></div>
													</div>
													<div class="widget-data">
														<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
														<div class="weight-600 font-14">Cash On Hand</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-4 mb-30">
											<div class="card-box height-100-p widget-style1">
												<div class="d-flex flex-wrap align-items-center">
													<div class="progress-data">
														<div id="chart"></div>
													</div>
													<div class="widget-data">
														<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
														<div class="weight-600 font-14">Cash On Hand</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-4 mb-30">
											<div class="card-box height-100-p widget-style1">
												<div class="d-flex flex-wrap align-items-center">
													<div class="progress-data">
														<div id="chart"></div>
													</div>
													<div class="widget-data">
														<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
														<div class="weight-600 font-14">Cash On Hand</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-4 mb-30">
											<div class="card-box height-100-p widget-style1">
												<div class="d-flex flex-wrap align-items-center">
													<div class="progress-data">
														<div id="chart"></div>
													</div>
													<div class="widget-data">
														<div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
														<div class="weight-600 font-14">Cash On Hand</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>

								</div>
							</div>
						</div>



						<!-- <div class="card">
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2">
									Collapsible Group Item #2
								</button>
							</div>
							<div id="faq2" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq3">
									Collapsible Group Item #3
								</button>
							</div>
							<div id="faq3" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
									<p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq4">
									Collapsible Group Item #4
								</button>
							</div>
							<div id="faq4" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq5">
									Collapsible Group Item #5
								</button>
							</div>
							<div id="faq5" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq6">
									Collapsible Group Item #6
								</button>
							</div>
							<div id="faq6" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
									<p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
								</div>
							</div>
						</div> -->

					</div>
				</div>










			<!-- <div class="card-box mb-30">
				<h2 class="h4 pd-20">Best Selling Products</h2>
				<table class="table hover multiple-select-row data-table-export nowrap">
					<thead>
						<tr>
							<th class="table-plus  datatable-nosort">Product</th>
							<th>Name</th>
							<th>Color</th>
							<th>Size</th>
							<th>Price</th>
							<th>Oty</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-1.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Shirt</h5>
								by John Doe
							</td>
							<td>Black</td>
							<td>M</td>
							<td>$1000</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-2.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Boots</h5>
								by Lea R. Frith
							</td>
							<td>brown</td>
							<td>9UK</td>
							<td>$900</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-3.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Hat</h5>
								by Erik L. Richards
							</td>
							<td>Orange</td>
							<td>M</td>
							<td>$100</td>
							<td>4</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-4.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Long Dress</h5>
								by Renee I. Hansen
							</td>
							<td>Gray</td>
							<td>L</td>
							<td>$1000</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-5.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Blazer</h5>
								by Vicki M. Coleman
							</td>
							<td>Blue</td>
							<td>M</td>
							<td>$1000</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div> -->


					<!-- Sceripts Online User Update  -->
					<!-- <script>
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
					</script> -->









			<?php //include('../Script_online.php') ?>

			<?php include('includes/footer.php') ?>

		</div>
	</div>
	<?php include('../Script_online.php') ?>
	
	<?php //include('includes/scripts.php') ?>

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