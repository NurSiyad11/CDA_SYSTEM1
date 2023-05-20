<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				

				<div class="row">
					<?php			
						$query = mysqli_query($conn,"select * from receipt")or die(mysqli_error());
						$count = mysqli_num_rows($query);					 				
					?>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<form action="" method="GET">
										<div id="">	
											<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
											<button class="btn btn-primary" type="submit" name="All_receipt"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
										</div>
									</form>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo  ($count); ?></div>
									<div class="weight-300 font-16">Total Receipt</div>	
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<?php							
						$query = mysqli_query($conn,"select  Status from receipt where  Status = 'Pending'  ")or die(mysqli_error());
						$count = mysqli_num_rows($query);				
						?> 
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center ">	
								<div class="progress-data">
									<form action="" method="GET">
										<div id="">									
											<button class="btn btn-primary" type="submit" name="Pending_order"> <i class="icon-copy dw dw-balance"></i></button>
										</div>
									</form>
								</div>						
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo ($count); ?></div>
									<div class="weight-300 font-16">Pending</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 mb-30">
						<?php						
							$query= mysqli_query($conn,"select  Status from receipt where Status = 'Rejected'  ")or die(mysqli_error());
							$count = mysqli_num_rows($query);					
						?> 
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<form action="" method="GET">
										<div id="">									
											<button  class="btn btn-danger"  type="submit" name="Rejected"><i class="icon-copy ion-close"></i></button>
										</div>
									</form>
									
								</div>
							
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo ($count); ?></div>
									<div class="weight-300 font-17">Rejected</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 mb-30">
						<?php						
							$query= mysqli_query($conn,"select  Status from receipt where  Status = 'Approved'  ")or die(mysqli_error());
							$count = mysqli_num_rows($query);					 
						?> 
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">	
								<div class="progress-data">
									<form action="" method="GET">
										<div id="">									
											<button class="btn btn-success" type="submit" name="Approved"> <i class="icon-copy ion-checkmark"></i></button>
										</div>
									</form>
								</div>						
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo ($count); ?></div>
									<div class="weight-300 font-17">Approved</div>
								</div>
							</div>
						</div>
					</div>				
				</div>


				<!-- <div class="row pb-10">			
					<div class="col-xl-3 mb-30">
						<?php			
							$query = mysqli_query($conn,"select * from receipt ")or die(mysqli_error());
							$count = mysqli_num_rows($query);					 				
						?>
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="">
									<img src="../vendors/images/img/invoice.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo  ($count); ?></div>
									<div class="weight-300 font-18">Total Receipt </div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 mb-30">
						<?php			
							$query = mysqli_query($conn,"select * from receipt where Status='Pending' ")or die(mysqli_error());
							$count = mysqli_num_rows($query);					 				
						?>
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="">
									<img src="../vendors/images/img/Pending1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo  ($count); ?></div>
									<div class="weight-300 font-18">Pending </div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 mb-30">
						<?php			
							$query = mysqli_query($conn,"select * from receipt where Status='Rejected' ")or die(mysqli_error());
							$count = mysqli_num_rows($query);					 				
						?>
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="">
									<img src="../vendors/images/img/Rejected1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo  ($count); ?></div>
									<div class="weight-300 font-18">Rejected </div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 mb-30">
						<?php			
							$query = mysqli_query($conn,"select * from receipt where  Status='Approved' ")or die(mysqli_error());
							$count = mysqli_num_rows($query);					 				
						?>
						<div class="card-box height-100-p widget-style1 bg-white">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="">
									<img src="../vendors/images/img/Approved.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?php echo  ($count); ?></div>
									<div class="weight-300 font-18">Approved </div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

			


				<!-- Customer All Receipts Start -->
				<?php 
				if(isset($_GET['All_receipt'])){
				?>
				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">All Customer Receipts</h2>
					</div>
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
								$sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID order by receipt.Date Desc ";                           
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
													<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
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
				<?php } elseif(isset($_GET['Pending_order'])){?>
				<!-- Customer All Receipts END -->


				<!-- Customer Pending Receipts Start -->		
				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">Pending Receipts</h2>
					</div>
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
								$sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.Status='Pending' order by receipt.Date Desc ";                           
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
													<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
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
				<?php } elseif(isset($_GET['Rejected'])){?>
				<!-- Customer Pending Receipts END -->



				<!-- Customer Rejected Receipts Start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">Rejected Receipts</h2>
					</div>
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
								$sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.Status='Rejected' order by receipt.Date Desc ";                           
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
													<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
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
				<?php } elseif(isset($_GET['Approved'])){?>
				<!-- Customer Rejected Receipts END -->

				<!-- Customer Approved Receipts Start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">Approved Receipts</h2>
					</div>
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
								$sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.Status='Approved' order by receipt.Date Desc ";                           
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
													<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
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
				<?php } else{?>


				
			<!-- Customer else Part Display All Invoice Start -->
			<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">All Customer Receipts</h2>
					</div>
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
								$sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID order by receipt.Date Desc ";                           
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
													<a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
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
			<?php } ?>
			<!-- Customer else Part Display All Invoice Start -->
			


			</div>			
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>

</body>
</html>