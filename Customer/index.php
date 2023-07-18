<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') 
// $time=time();
?>
      <!-- <script>
            window.addEventListener('load',function(){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'your Complaint Successfully  Submited',
            showConfirmButton: false,
            timer: 3000
            })
            .then(function() {
                window.location = "index.php";
            });	
        });
        </script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script>
function showPass()
{
	var pass = document.getElementById('pass');
	if(document.getElementById('check').checked)
	{
		pass.setAttribute('type','text');
	}else{
		pass.setAttribute('type','password');
	}
}

</script>



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
					// text: "<?Php //echo "$ ". $format?>",
					
					//iconHtml: ' <i class="icon-copy ion-social-usd-outline"></i>',
					iconHtml: ' <i class="icon-copy ion-social-usd"></i>',
					//icon: "money",
					// button: "Ok Done!",
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
							$RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
							$PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
							$Bal = $RV - $PV;
							$format_balance =number_format((float)$Bal, '2','.',',');
							?> 	
						
							<div class="row">							
								<div class="col-12">
									<?php
										$Limite_balance = $conn->query("SELECT Limit_bal as lmt FROM `limit_customer_bal` where Cid='$session_id'   ")->fetch_assoc()['lmt'];
										if($format_balance > $Limite_balance){								
											?>
											<div class="alert alert-danger" role="alert">
												DIgniin: Macaamiil Haraagaaga Xisaabta Daynta waxa uu Gaaray Qadarka Cayimida Daynta, Fadalan Sida ugu Dhaqsiyaha Badan iskaga Bixi Lacga daynta ah !!!
											</div>
											<?php }else{ ?>
													<p class=" ml-3 text-cente" style="color:bl">Welcome to our system! Once you log in, you'll be directed to your personalized dashboard where you can easily manage your account, view your recent activity. Your dashboard will display your current account balance, as well as any new or pending invoices. You can also review your recent transactions to keep track of your financial activity. If you have any questions or require assistance, please don't hesitate to contact our support team. We're here to assist you every step of the way.</p>
											<?php } ?>

									<!-- <form action="" method="POST">	
										<div id="" class=" ml-5">
											<button class="btn btn-primary" type="submit" name="Balance"> <i class="icon-copy dw dw-eye"></i> </button><span class="border-0"></span>
										</div>
									</form> -->
									<!-- <p class=" ml-3 text-center" style="color:bl">Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.</p> -->
									<!-- <h4 class=" ml-3 text-center" style="color:bl"><?php //echo  "$ " .($format) ?> </h4> -->
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>

		
		
			<!-- 
			<div class="row">
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
					
						<div id="chart5"></div>
					</div>
				</div>

				<div class="col-xl-6 mb-30">
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
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
								<!-- <th>Balance</th> -->
								<!-- <th>Action</th>					 -->							
																
							</tr>
						</thead>

						<tbody>

							<?php
							// $Cname = $conn->query("SELECT id as eid from `user` where id='$session_id'  ")->fetch_assoc()['eid'];
							// $sql = "SELECT * FROM Invoice_Receipt where Cid='$Cname' order by Date desc ";						
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