<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<!-- Inserting Account  -->
<?php
	if(isset($_POST['Acc_save']))
	{	
	$Acc_name=$_POST['Acc_name'];	   
	$Acc_no=$_POST['Acc_no']; 	
	
	$query = mysqli_query($conn,"select * from account where Acc_name = '$Acc_name'")or die(mysqli_error());
	$count = mysqli_num_rows($query);       
	
	if ($count > 0){ ?>
		<Script>
            window.addEventListener('load',function(){
                swal.fire({
                    title: "Warning",
                    text: "Account Already Exist ",
                    icon: "warning",
                    button: "Ok Done!",
                })
                .then(function() {
                    window.location = "cash_receipt.php";
                        });
            });			
        </Script>

	   <?php
		 }else{
			mysqli_query($conn,"INSERT INTO account(Admin_id,Acc_name,Acc_no) VALUES('$session_id','$Acc_name','$Acc_no')         
			") or die(mysqli_error()); ?>
			<Script>
            window.addEventListener('load',function(){
                swal.fire({
                    title: "Success",
                    text: "Account  Successfully  Added ",
                    icon: "success",
                    button: "Ok Done!",
                })
                .then(function() {
                    window.location = "cash_receipt.php";
                        });
            });			
        	</Script>
			<?php  
		 }
	}
?>



<!-- Insert Receipt Data -->
<?php
	if(isset($_POST['Receipt']))
	{
	
	$name=$_POST['name'];	   
	$date=$_POST['date']; 	
	$RV=$_POST['RV'];	
	$amount=$_POST['amount']; 
	$memo=$_POST['memo']; 	 
	$Ac_id=$_POST['Ac_name']; 	 

	 $query = mysqli_query($conn,"select * from cash_receipt ")or die(mysqli_error());
	 $count = mysqli_num_rows($query);     
     
        mysqli_query($conn,"INSERT INTO cash_receipt(Admin_id,name,Date,RV,Amount,Memo,Acc_id) VALUES('$session_id','$name','$date','$RV','$amount','$memo','$Ac_id')         
		") or die(mysqli_error()); ?>
			<Script>
            window.addEventListener('load',function(){
                swal.fire({
                    title: "Success",
                    text: "Receipt Successfully  Added ",
                    icon: "success",
                    button: "Ok Done!",
                })
                .then(function() {
                    window.location = "cash_receipt.php";
                });
            });			
        	</Script>
		<?php   }
?>

<body>	
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Cash Receipt </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cash Receipt Register</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="row">
							<div class="pull-left">
								<h4 class="text-blue h4">Cash Receipt Form</h4>
								<p class="mb-20"></p>
							</div>
							<div class="col-md-4 col-sm-12 text-right"> 
								<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500" ><i class=" icon-copy ion-plus-circled "></i> Account Registration </a>
							</div>
						</div>						
					</div>

					<!-- add task popup start -->
					<div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Registration Account</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body pd-0">
									<div class="task-list-form">
										<ul>
											<li>
												<form method="post" action="">
													<div class="form-group row">
														<label class="col-md-4">Account Name :</label>
														<div class="col-md-8">
															<input type="text" name="Acc_name" class="form-control" required placeholder="Enter Account Name" autocomplete="off" >
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4">Account  NO :</label>
														<div class="col-md-8">
															<input type="text" name="Acc_no" class="form-control"  required placeholder="Enter Account Number" autocomplete="off" > 
														</div>
													</div>
													
													<button type="submit" name="Acc_save" id="Acc_save"  class="btn btn-primary">Save</button>
													<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
												
												</form>
											</li>											
										</ul>
									</div>									
								</div>								
							</div>
						</div>
					</div>
					<!-- add task popup End -->


					<!--Start code Form Receipt for  -->
					<div class="wizard-content">
						<form method="post" action="">
							<section>                              
								<div class="row">
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Received From :</label>
											<input name="name" type="text" placeholder="Received From" class="form-control" required="true" >
										</div>
									</div>                                       
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date</label>
											<input name="date" class="form-control" required type="date">
										</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Receipt Number :</label>
											<input name="RV" type="number" placeholder="Receipt No#" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="amount" type="text" placeholder="$00.00" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Account :</label>
											<select name="Ac_name" id="nid" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Account</option>
													<?php
													$query = mysqli_query($conn,"select * from account");
													while($row = mysqli_fetch_array($query)){													
													?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['Acc_name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>	

									<div class="col-md-12">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="memo" placeholder="Description " style="height: 5em;" class="form-control text_area" type="text"></textarea>
										</div>
									</div>							
								</div>
																
								<div class="row">				
											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="Receipt" id="Receipt" data-toggle="modal">Save&nbsp;Receipt</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>                    
				</div>


				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">All Cash Receipts</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO#</th>
									<th class="table-plus">Received From</th>								
									<th>Receipt No#</th>
									<th>Account </th>
									<th>Date </th>
									<th>Memo</th>
									<th>Amount</th>				
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<?php
									$i =1;
									$query = mysqli_query($conn,"SELECT account.Acc_name, cash_receipt.id, cash_receipt.name, cash_receipt.RV ,cash_receipt.Amount,cash_receipt.Date,cash_receipt.Memo FROM cash_receipt INNER JOIN account ON   cash_receipt.Acc_id=account.id where cash_receipt.Admin_id='$session_id' order by cash_receipt.Date Desc") or die(mysqli_error());	
									while ($row = mysqli_fetch_array($query)) {
									$id = $row['id'];
										?>										
									<td><?php echo $i++; ?></td>
									<td class="table-plus">
										<div class="name-avatar d-flex align-items-center">
											<div class="avatar mr-2 flex-shrink-0">
												<!--
												<img src="<?php echo (!empty($row['Location'])) ? '../uploads/'.$row['Location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
												-->
											</div>
											<div class="txt">
												<div class="weight-600"><?php echo $row['name'] . " " ; ?></div>
											</div>
										</div>
									</td>								
									
									<td><?php echo "RV# ". $row['RV']; ?></td>
									<td><?php echo $row['Acc_name']; ?></td>
									<td><?php echo $row['Date']; ?></td>
									<td><?php echo $row['Memo']; ?></td>
									<td><?php echo "$ ". $row['Amount']; ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_cash_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
											</div>
										</div>
									</td>
								</tr>
								<?php } ?>  
							</tbody>
						</table>
					</div>			   
				</div>			
			</div>
			
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>

</body>
</html>