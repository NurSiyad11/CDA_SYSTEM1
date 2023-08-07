<?php include('includes/header.php'); ?>
<?php include('../database/db.php'); ?>
<?php include('../database/session.php');
?>


<?php

	if(isset($_POST['Balance'])) 
	{
		$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$session_id'  ")->fetch_assoc()['total'];
		$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$session_id'  ")->fetch_assoc()['total'];
		$Bal = $INV - $RV;
		$format_balance =number_format((float)$Bal, '2','.',',');
	
		?>
		<script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Your Balance is  <?Php echo "USD ". $format_balance?>",
					iconHtml: ' <i class="icon-copy ion-social-usd"></i>',
					
				})
				.then(function() {
							window.location = "index.php";
						});
			});	
		</script>
		<?php
	}
?>



<body>
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">	
			
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card text-bg-primary mb-3">					
					
						<div class="row">
							<div class="col-12">
								<div class="card-header text-center bg-blue" style="color:white">
									<form action="" method="POST">																							
										<button class="btn btn-light" type="submit" name="Balance"> <i class="icon-copy dw dw-eye "></i> </button><span class="border-0 ml-3"> Current Account Balance</span>
									</form>									
								</div>
							</div>
						</div>
						<div class="card-body">
							<?php
								$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$session_id'  ")->fetch_assoc()['total'];
								$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$session_id'  ")->fetch_assoc()['total'];
								$Bal = $INV - $RV;
								// $format_balance =number_format((float)$Bal, '2','.',',');
							
							?> 	
						
							<div class="row">							
								<div class="col-12">
									<?php
										$query = mysqli_query($conn,"select * from limit_customer_bal where Cid = '$session_id' ")or die(mysqli_error());
										$count = mysqli_num_rows($query); 
										if ($count > 0){
											$Limite_balance = $conn->query("SELECT Limit_bal as lmt FROM `limit_customer_bal` where Cid='$session_id'   ")->fetch_assoc()['lmt'];
											if($Bal > $Limite_balance){								
												?>
												<div class="alert alert-danger" role="alert">
													DIgniin: Macaamiil Haraagaaga Xisaabta Daynta waxa uu Gaaray Qadarka Cayimida Daynta, Fadalan Sida ugu Dhaqsiyaha Badan iskaga Bixi Lacga daynta ah !!!
												</div>
												<?php 
											}else{ ?>
												<p class=" ml-3 text-cente" style="color:bl">Welcome to our system! Once you log in, you'll be directed to your personalized dashboard where you can easily manage your account, view your recent activity. Your dashboard will display your current account balance, as well as any new or pending invoices. You can also review your recent transactions to keep track of your financial activity. If you have any questions or require assistance, please don't hesitate to contact our support team. We're here to assist you every step of the way.</p>
												<?php 
											} 
										} else{?>
											<p class=" ml-3 text-cente" style="color:bl">Welcome to our system! Once you log in, you'll be directed to your personalized dashboard where you can easily manage your account, view your recent activity. Your dashboard will display your current account balance, as well as any new or pending invoices. You can also review your recent transactions to keep track of your financial activity. If you have any questions or require assistance, please don't hesitate to contact our support team. We're here to assist you every step of the way.</p>
											<?php 
										} ?>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>


			


		


			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Last 10 Transection</h2>
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
																
							</tr>
						</thead>

						<tbody>

							<?php
					
							$sql = "SELECT id,D_INV,invoice,File,Date,Memo,Amount,empty FROM invoice where Cid='$session_id' UNION All SELECT id,D_RV,RV,File,Date,Memo,empty,Amount FROM receipt    where Cid='$session_id'   order by Date desc  Limit 10 ";
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
							
							</tr>

							<?php $cnt++;} }?>  

						</tbody>					
					
					</table>
			   </div>
			</div>


            <div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">New Invoice </h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead class="table-dark">
							<tr>		
								<th>NO#</th>								
								<th class="datatable-nosort"> Invoice No#</th>
								<th class="datatable-nosort">Date</th>
								<th class="datatable-nosort">Amount</th>
								<th class="datatable-nosort">Description</th>	
								<th class="datatable-nosort">Status  </th>			
								<!-- <th>File  </th>		 -->
								<th class="datatable-nosort">ACTION</th>	
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