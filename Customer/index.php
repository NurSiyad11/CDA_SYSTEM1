<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') 
// $time=time();
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
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

			


			<!-- Small modal -->
			<!-- <div class="col-md-4 col-sm-12 mb-30">
				<div class="pd-20 card-box height-100-p">
					<h5 class="h4">Small modal</h5>
					<a href="#" class="btn-block" data-toggle="modal" data-target="#small-modal" type="button">
						<img src="vendors/images/modal-img3.jpg" alt="modal">
					</a>
					<div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
								</div>
								<div class="modal-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->


			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Transection</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table table-bordere stripe hover nowrap">
						<thead >
							<tr>				
								<th> No#</th>	
								<th> ##</th>							
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Description</th>
								<th>Invoice</th>
								<th>Receipt</th>
								<!-- <th>Balance</th> -->
								<!-- <th>Action</th>					 -->							
																
							</tr>
						</thead>

						<tbody>

							<?php

							// $sql = "SELECT * from account order by Acc_name ";

							$Cname = $conn->query("SELECT id as eid from `user` where id='$session_id'  ")->fetch_assoc()['eid'];
							$sql = "SELECT * FROM Invoice_Receipt where Cid='$Cname' order by Date desc ";						
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
								<td><?php echo htmlentities($result->D_INV);?></td>
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>	
								<td><?php echo htmlentities($result->Memo);?></td>
								<td ><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td ><?php echo "$ ". number_format((float)htmlentities($result->empty), '2','.',','); ?></td>
								<!-- <td class="Amounts">10</td>
								<td class="Amounts">20</td> -->
								<!-- <td id="Total"></td> -->
								<!-- 
								<td>
									<div class="table-actions">										
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_invoice_check.php?edit=<?php //echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
												
											</div>
										</div>
								
									</div>
								</td> -->
							</tr>

							<?php $cnt++;} }?>  

						</tbody>




					
						<tfoot class="">
							<tr>				
								<th> </th>	
								<th> </th>							
								<th> </th>
								<th></th>
								<th>Total</th>
								<th></th>
								<th></th>
									
							
																
							</tr>
									</tfoot>
					</table>
			   </div>
			</div>


            <div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">New Invoice </h2>
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
								<!-- <th>File  </th>		 -->
								<th>ACTION</th>	
							</tr>
						</thead>

						<tbody>

							<?php
							
							// $sql = "SELECT * from account order by Acc_name ";
							$Cname = $conn->query("SELECT id as eid from `user`  where id='$session_id'  ")->fetch_assoc()['eid'];
							$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.id where Cid='$Cname' AND invoice.Status='Pending' order by Date DESC ";
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
								<td><?php echo "INV#". htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo htmlentities($result->Memo);?></td>
								<td><span class="badge badge-primary"><?php echo htmlentities($result->Status);?> </span></td>
							
								<td>
									<div class="table-actions">										
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_invoice_check.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
												
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
		</div>
	</div>
	<?php include('includes/footer.php') ?>
	
	<?php include('includes/scripts1.php') ?>
	

</body>
</html>