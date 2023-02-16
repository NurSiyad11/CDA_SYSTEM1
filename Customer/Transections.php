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
	



			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Transection</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table table-bordered stripe hover nowrap">
						<thead >
							<tr>				
								<th> No#</th>	
								<th> ##</th>							
								<th> Invoice No#</th>
								<th>Date</th>
								<th>Description</th>
								<th>Invoice</th>
								<th>Receipt</th>
								<!-- <th>File</th> -->
								<th>Action</th>												
																
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
								<td><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>
								<td><?php echo "$ ". number_format((float)htmlentities($result->empty), '2','.',','); ?></td>

								
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