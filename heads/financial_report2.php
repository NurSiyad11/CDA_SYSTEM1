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
			<!-- <div class="title pb-20">
				<h2 class="h3 mb-0">Customer Report</h2>
			</div>	 -->
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
							<?php 
								$RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
								$PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
								$Bal = $RV - $PV;
								$cash_Bal =number_format((float)$Bal, '2','.',',');
							?>
						<div class="title">
							<h4>Cash on Hand Report</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo "Total Cash On Hand $ ".($cash_Bal); ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>


			<div class="col-lg-12 col-md-6 col-sm-12 mb-30">
				<?php
				$RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
				$PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
				$Bal = $RV - $PV;
				$format =number_format((float)$Bal, '2','.',',');
				//usort($format, 'sortTable');
				?> 
				<div class="card-box pd-30 pt-10 height-100-p">
					<div class="row">	
						<div class="col-3">
							<div class="pd-20">
								<h2 class="text-blue h4">Account List</h2>
							</div>
						</div>			
						
						<div class="col-9">
							<div class="col-md-12 col-sm-12 text-right">
								<a href="#" class="bg-light-blue btn text-blue weight-500"  data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Account Summary Balance </a>
								<button class="bg-light-blue btn text-blue weight-500"  type="button" id="downloadexcel1" class="btn btn-primary">Export to Excel</button>

							</div>
						</div>
				
					</div>
					<!-- <h2 class="mb-30 h4">Account List</h2>
					<a href="#" class="bg-light-blue btn text-blue weight-500"  data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Customer Summary Balance </a> -->

					<div class="pb-20">
						
						<table  id="example-table1" class="data-table table-bordered table stripe hover nowrap">
							<thead class="table-dark">
							<tr>
								<th>SR NO.</th>
								<th class="datatable-nosort">Account Name</th>
								<th class="datatable-nosort">Account Number</th>
								<th class="datatable-sort Asc">Account Balance</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
							</thead>
							<tbody>

								<?php $sql = "SELECT * from account order by Acc_name ";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)  {  
								// while($row = mysqli_fetch_array($query)){
									$test= ($result->id);
									$total_income = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$test   ")->fetch_assoc()['total'];
									$total_expense = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$test ")->fetch_assoc()['total'];
									$Ba_Inc_exp = $total_income - $total_expense;
									$bal_format =number_format((float)$Ba_Inc_exp, '2','.',',');
											
										?>  

								<tr>
									<td> <?php echo htmlentities($cnt);?></td>
									<td><?php echo htmlentities($result->Acc_name);?></td>
									<td><?php echo htmlentities($result->Acc_no);?></td>
									<td><?php echo $bal_format;?></td>
									

									<td>
										<div class="table-actions">                                             
											<a href="Account_details.php?edit=<?php echo htmlentities($result->id);?>"  class="btn btn-success"> <i class="icon-copy dw dw-eye"></i> View</a>
										</div>
									</td>
								</tr>

								<?php $cnt++;} }?>  

							</tbody>
						</table>

						<script>
								document.getElementById('downloadexcel1').addEventListener('click', function(){
									var table2excel = new Table2Excel();
										table2excel.export(document.querySelectorAll("#example-table1"));
								})
							</script>

						<script>
							function checkdelete(){
								return confirm('Do you Want to Delete this Record ? ');
							}
						</script>
					</div>
				</div>
			</div>





			<!-- Large modal -->
			<div class="col-md-4 col-sm-12 mb-30">
				<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="myLargeModalLabel">Cash  Balance Summary <?php echo "$ ".($cash_Bal); ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<div class="pb-20">
									<table id="example-table" class="data-table table stripe hover nowrap">
										<thead>
											<tr>
												<th>SR NO</th>
												<th class="table-plus">ACCOUNT NAME</th>
												<th>ACCOUNT NUMBER</th>
												<th>BALANCE</th>						
												<th class="datatable-nosort">ACTION</th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<?php
												$i=1; 
												$teacher_query = mysqli_query($conn,"select * from Account ") or die(mysqli_error());
												while ($row = mysqli_fetch_array($teacher_query)) {
												$id = $row['id'];
												
												$total_income = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$id   ")->fetch_assoc()['total'];
												$total_expense = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$id ")->fetch_assoc()['total'];
												$Ba_Inc_exp = $total_income - $total_expense;
												$bal_format =number_format((float)$Ba_Inc_exp, '2','.',',');

												if($bal_format > 0 ){		
													?>
												<td><?php echo $i++; ?></td>
												<td class="table-plus">
													<div class="name-avatar d-flex align-items-center">														
														<div class="txt">
															<div class="weight-600"><?php echo $row['Acc_name'] . " " ; ?></div>
														</div>
													</div>
												</td>
												<td><?php echo $row['Acc_no']; ?></td>
												<td><?php echo "$ $bal_format"; ?></td>
											
											
												<td>
													<div class="table-actions">                                             
														<a href="Account_details.php?edit=<?php echo  $row['id'];;?>"  class="btn btn-success"> <i class="icon-copy dw dw-eye"></i> View</a>
													</div>
												</td>
											</tr>
											<?php } }?>  
										</tbody>
									</table>					
								</div>	
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" id="downloadexcel" class="btn btn-primary">Export to Excel</button>
							</div>
							<script>
								document.getElementById('downloadexcel').addEventListener('click', function(){
									var table2excel = new Table2Excel();
										table2excel.export(document.querySelectorAll("#example-table"));
								})
							</script>
						</div>
					</div>
				</div>			
			</div>

		</div>
        <?php include('includes/footer.php'); ?>

	</div>
	<!-- js -->
    <?php  include('includes/scripts2.php'); ?>


   
</body>
</html>