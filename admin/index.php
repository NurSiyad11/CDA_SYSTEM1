<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') ?>

<body>
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="conteiner p-2">
				<div class="row">
					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3">
							<div class="card-header text-center bg-blue" style="color:white">Cash On Hand</div>
							<div class="card-body">
								<?php
								$RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
								$PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
								$Bal = $RV - $PV;
								$format =number_format((float)$Bal, '2','.',',');
								?> 
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h4 class=" ml-3 text-center" style="color:bl"><?php echo ($format) ?> </h4>
								</div>							
							</div>
						</div>
					</div>

					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3 ">
							<div class="card-header text-center bg-blue" style="color:white">Customer Balance</div>
							<div class="card-body">
								<?php 
									$INV = $conn->query("SELECT sum(Amount) as total FROM `invoice`   ")->fetch_assoc()['total'];
									$RV = $conn->query("SELECT sum(Amount) as total FROM `receipt`  ")->fetch_assoc()['total'];
									$Bal = $INV - $RV;
									$format =number_format((float)$Bal, '2','.',',');
								?>
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h4 class=" ml-3 text-center"><?php echo ($format) ?> </h4>
								</div>
								<!-- <h5 class="card-title ml-2 text-cente"> Cash On Hand</h5> -->
								<!-- <p class="card-text"></p> -->
							</div>
						</div>
					</div>

					<div class="col-xl-4 mb-30">
						<div class="card text-bg-primary mb-3" >
							<div class="card-header text-center bg-blue" style="color:white">Vendor Balance</div>
							<div class="card-body">
								<?php 
									$INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice`   ")->fetch_assoc()['total'];
									$RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment`  ")->fetch_assoc()['total'];
									$Bal = $INV - $RV;
									$format =number_format((float)$Bal, '2','.',',');
								?>
								<div class="row">
									<div id="" class=" ml-5">
										<img src="../vendors/images/img/dollor.png" class="border-radius-100 shadow" width="30" height="30" alt="">
									</div>
									<h4 class=" ml-3 text-center"><?php echo ($format) ?> </h4>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>				


			<!-- <div class="row">				
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div>
							<p>welcome </p>
						</div>
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


			<?php// include('includes/footer.php') ?>

		</div>
	</div>
	
	<?php include('includes/scripts2.php') ?>



</body>
</html>