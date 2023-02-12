<?php include('includes/header.php') ?>
<?php include('../database/db.php') ?>
<?php include('../database/session.php') ?>

<?php	
	$dataPoints1 = array(
		array("label"=> "Cash On Hand", "y"=> 36.12),
		array("label"=> "feb", "y"=> 34.87),
		array("label"=> "mar", "y"=> 40.30),
		array("label"=> "april", "y"=> 35.30),
		array("label"=> "may", "y"=> 39.50),
		array("label"=> "jun", "y"=> 50.82),
		array("label"=> "july", "y"=> 74.70)

	);
	$dataPoints2 = array(
		array("label"=> "Cash On Hamd", "y"=> 14.61),
		array("label"=> "feb", "y"=> 70.55),
		array("label"=> "mar", "y"=> 72.50),
		array("label"=> "april", "y"=> 81.30),
		array("label"=> "may", "y"=> 63.60),
		array("label"=> "june", "y"=> 69.38),
		array("label"=> "july", "y"=> 98.70)

		
		
		);		
	?>

	<script>
	window.onload = function () {
	
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		theme: "light3",
		title:{
			text: "Average Amount Cash in And Cash out."
		},
		axisY:{
			includeZero: true
		},
		legend:{
			cursor: "pointer",
			verticalAlign: "center",
			horizontalAlign: "right",
			itemclick: toggleDataSeries
		},
		data: [{
			type: "column",
			name: "Total In",
			indexLabel: "{y}",
			yValueFormatString: "$#0.##",
			showInLegend: true,
			dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		},{
			type: "column",
			name: "Total out",
			indexLabel: "{y}",
			yValueFormatString: "$#0.##",
			showInLegend: true,
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render();
	
	function toggleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		}
		else{
			e.dataSeries.visible = true;
		}
		chart.render();
	}
	
	}
	</script>





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
										<img src="../vendors/images/img/cash.png" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<h4 class=" ml-3 text-center" style="color:bl"><?php echo  "$ " .($format) ?> </h4>
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
										<img src="../vendors/images/img/cash.png" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<h4 class=" ml-3 text-center"><?php echo "$ " . ($format) ?> </h4>
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
										<img src="../vendors/images/img/cash.png" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<h4 class=" ml-3 text-center  "><?php echo "$ " . ($format) ?> </h4>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>			
			
		


			<div class="row">				
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<!-- <div id="chart5"></div> -->
						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<h4 class="mb-20 h4">With budget List</h4>
						<?php	
						
						$query = mysqli_query($conn,"select * from account order by Acc_name");  
						while($row = mysqli_fetch_array($query)){
							$test=$row['id'];
							$total_income = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$test   ")->fetch_assoc()['total'];
							$total_expense = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$test ")->fetch_assoc()['total'];
							$Ba_Inc_exp = $total_income - $total_expense;
							$bal_format =number_format((float)$Ba_Inc_exp, '2','.',',');
							if($bal_format > 0){
							?>					
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								<?php echo $row['Acc_name']; ?>
									<span class="badge badge-green badge-pill"><?php echo "S ". ($bal_format)?></span>								
							</li>					
						</ul>
						<?php }  }?>	
						
					</div>
				</div>

				<!-- <div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart5"></div>
					</div>
				</div> -->
			</div>
			<!-- data-table table stripe hover nowrap -->


		

			

	
			
























			

		</div>
	</div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<?php include('includes/scripts.php') ?>



</body>
</html>