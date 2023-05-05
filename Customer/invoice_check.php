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


			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from invoice where Cid='$session_id' " )or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn btn-primary" type="submit" name="All_invoice"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-16">Total Invoice </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from invoice where  Status = 'Pending' AND Cid='$session_id'  ")or die(mysqli_error());
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
                        $query= mysqli_query($conn,"select  Status from invoice where Status = 'Rejected' AND Cid='$session_id' ")or die(mysqli_error());
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
                        $query= mysqli_query($conn,"select  Status from invoice where  Status = 'Approved' AND Cid='$session_id' ")or die(mysqli_error());
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




			<!-- Customer All Invoice Start -->
			<?php 
			if(isset($_GET['All_invoice'])){
			?>			
			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-blue h4"> Customer Invoice</h2>
				</div>
				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>	
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>ACTION</th>				
							</tr>
						</thead>

						<tbody>

							<?php
							$Cname = $conn->query("SELECT id as eid from `user`  where id='$session_id'  ")->fetch_assoc()['eid'];
							$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where Cid='$Cname' order by Date DESC ";					
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
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo htmlentities($result->Memo);?></td>

								<td><?php $stats=($result->Status);
								//<td><?php $stats=$row['Status'];
									if($stats=="Pending"){
									?>
										<span class="badge badge-primary">Pending</span>
										<?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
										<?php } if($stats=="Rejected")  { ?>
										<span class="badge badge-danger">Rejected</span>
										<?php }  ?>                         							
								</td>


								
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
			<?php } elseif(isset($_GET['Pending_order'])){?>
			<!-- Customer All Invoice END -->
		
			
			<!-- Customer Pending Invoice Start -->		
			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-blue h4"> Pending Invoice</h2>
				</div>				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>	
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>ACTION</th>				
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.Status='Pending' and Cid='$session_id' order by Date DESC ";					
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
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo htmlentities($result->Memo);?></td>

								<td><?php $stats=($result->Status);
								//<td><?php $stats=$row['Status'];
									if($stats=="Pending"){
									?>
										<span class="badge badge-primary">Pending</span>
										<?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
										<?php } if($stats=="Rejected")  { ?>
										<span class="badge badge-danger">Rejected</span>
										<?php }  ?>                         							
								</td>								
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
			<?php } elseif(isset($_GET['Rejected'])){?>
			<!-- Customer Pending Invoice END -->


			<!-- Customer Rejected Invoice Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-blue h4"> Rejected Invoice</h2>
				</div>				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>	
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>ACTION</th>				
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.Status='Rejected' and Cid='$session_id' order by Date DESC ";					
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
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo htmlentities($result->Memo);?></td>

								<td><?php $stats=($result->Status);
								//<td><?php $stats=$row['Status'];
									if($stats=="Pending"){
									?>
										<span class="badge badge-primary">Pending</span>
										<?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
										<?php } if($stats=="Rejected")  { ?>
										<span class="badge badge-danger">Rejected</span>
										<?php }  ?>                         							
								</td>								
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
			<?php } elseif(isset($_GET['Approved'])){?>
			<!-- Customer Rejected Order END -->


			<!-- Customer Approve Invoice Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-blue h4"> Approved Invoice</h2>
				</div>				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>	
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>ACTION</th>				
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.Status='Approved' and Cid='$session_id' order by Date DESC ";					
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
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo htmlentities($result->Memo);?></td>

								<td><?php $stats=($result->Status);
								//<td><?php $stats=$row['Status'];
									if($stats=="Pending"){
									?>
										<span class="badge badge-primary">Pending</span>
										<?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
										<?php } if($stats=="Rejected")  { ?>
										<span class="badge badge-danger">Rejected</span>
										<?php }  ?>                         							
								</td>								
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
			<?php } else{?>


			<!-- Customer else Part Display All Invoice Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-blue h4"> Customer Invoice</h2>
				</div>
				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>	
								<th>NO#</th>								
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>	
								<th>Status  </th>			
								<th>ACTION</th>				
							</tr>
						</thead>

						<tbody>
							<?php
							$Cname = $conn->query("SELECT id as eid from `user`  where id='$session_id'  ")->fetch_assoc()['eid'];
							$sql = "SELECT user.Name, invoice.id, invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.Status,invoice.File  FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where Cid='$Cname' order by Date DESC ";					
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
								<td><?php echo htmlentities($result->invoice);?></td>
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo htmlentities($result->Memo);?></td>

								<td><?php $stats=($result->Status);
							
									if($stats=="Pending"){
									?>
										<span class="badge badge-primary">Pending</span>
										<?php } if($stats=="Approved")  { ?>
										<span class="badge badge-success">Approved</span>
										<?php } if($stats=="Rejected")  { ?>
										<span class="badge badge-danger">Rejected</span>
										<?php }  ?>                         							
								</td>								
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
			<?php } ?>
			<!-- Customer else Part Display All Invoice Start -->
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts1.php'); ?>
</body>
