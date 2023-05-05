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
                    $query = mysqli_query($conn,"select * from tbl_order where Cid='$session_id' ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn btn-primary" type="submit" name="All_order"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Applied Orderd </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from tbl_order where  Status = 'Pending' AND Cid='$session_id'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-dat">
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

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Preparing'  AND Cid='$session_id' ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);				 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Preparing"> <i class="icon-copy dw dw-shopping-cart2"></i></button>
									</div>
								</form>
                             
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-14">Preparing</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Reject'  AND Cid='$session_id' ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
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

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where  Status = 'Approved' AND Cid='$session_id'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
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
		
		
		
		
		
		
		
			<!-- Customer All Order Start -->
			<?php 
			if(isset($_GET['All_order'])){
			?>
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php

							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Cid='$session_id' order by tbl_order.id desc ";
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
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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
			   </div>
			</div>
			<?php } elseif(isset($_GET['Pending_order'])){?>
			<!-- Customer All Order END -->


			<!-- Customer Pending Order Start -->	
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php
							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Status='Pending' and tbl_order.Cid='$session_id' order by tbl_order.id desc ";
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
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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
			   </div>
			</div>
			<?php } elseif(isset($_GET['Preparing'])){?>
			<!-- Customer Pending Order END -->

			<!-- Customer Preaping Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Preparing Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php
							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Status='Preparing' and tbl_order.Cid='$session_id' order by tbl_order.id desc ";
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
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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
			   </div>
			</div>
			<?php } elseif(isset($_GET['Rejected'])){?>
			<!-- Customer Preparing Order END -->	

			<!-- Customer Rejected Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Rejected Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php
							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Status='Reject' and tbl_order.Cid='$session_id' order by tbl_order.id desc ";
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
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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
			   </div>
			</div>
			<?php } elseif(isset($_GET['Approved'])){?>
			<!-- Customer Rejected Order END -->

			<!-- Customer Approve Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Approved Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php
							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Status='Approved' and tbl_order.Cid='$session_id' order by tbl_order.id desc ";
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
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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
			   </div>
			</div>
			<?php } else{ ?>
			<!-- Customer Approved Order END -->

			<!-- Customer Else Part DIspaly All Order Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Orders</h2>
				</div>
					
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<!-- <th class="table-plus datatable-nosort">Customer Name</th> -->
								<th>NO.</th>
								<th>DATE Ordered</th>
								<th>Description</th>
							
								<!-- <th>File</th> -->
								<th> Status</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>

						<tbody>

							<?php

							$sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.Reason ,tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.ID where tbl_order.Cid='$session_id' order by tbl_order.id desc ";
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
								<td><?php echo htmlentities($result->Date);?></td>
								<td><?php echo htmlentities($result->Reason);?></td>

								<td><?php $stats=($result->Status);
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
			   </div>
			</div>
			<?php }?>
			<!-- Customer Else Part Display All Order END -->

		</div>
	</div>
<!-- js -->
<?php include('includes/scripts1.php'); ?>

</body>
</html>