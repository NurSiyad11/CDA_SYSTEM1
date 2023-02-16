<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['update-receipt']))
	{	
    $name=$_POST['name'];	
	$Date=$_POST['Date'];  
	$RV=$_POST['RV']; 	
	$Amount=$_POST['Amount']; 
	$memo=$_POST['memo']; 
	$Ac_name=$_POST['Ac_name']; 

	$Ac_id = $conn->query("SELECT id as cid from `account` where Acc_name='$Ac_name'  ")->fetch_assoc()['cid'];

	$result = mysqli_query($conn,"update cash_receipt set Acc_id='$Ac_id', name='$name',  Date='$Date', RV='$RV',  Amount='$Amount', Memo='$memo' where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'cash_receipt.php'; </script>";
	} else{
	  die(mysqli_error());
   }		
}
?>
<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Update Cash Receipt</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="cash_receipt.php">Back to Cash Receipt</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cash Receipt Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Cash Receipt Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
                                    <?php
									$query = mysqli_query($conn,"SELECT account.Acc_name,   cash_receipt.id, cash_receipt.name, cash_receipt.RV ,cash_receipt.Amount,cash_receipt.Date, cash_receipt.Memo FROM cash_receipt INNER JOIN account ON   cash_receipt.Acc_id=account.id  where cash_receipt.id = '$get_id'") or die(mysqli_error());	
									$row = mysqli_fetch_array($query);
									?>
                           
								<div class="row">
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Received From :</label>
											<input name="name" type="text" class="form-control" required="true"  value="<?php echo $row['name']; ?>">
										</div>
									</div>				                                  
									<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date</label>
												<input name="Date" class="form-control" type="Date" value="<?php echo $row['Date']; ?>">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Receipt Number :</label>
											<input name="RV" type="text" placeholder="Receipt No#" class="form-control" required="true" autocomplete="off" value="<?php echo $row['RV']; ?>" >
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="Amount" type="text" placeholder="$00.00" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Amount']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Account :</label>
											<select name="Ac_name" id="nid" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Acc_name'];?>"><?php echo $row['Acc_name'];?></option>
													<?php
													$query1 = mysqli_query($conn,"select * from account");
													while($row = mysqli_fetch_array($query1)){													
													?>
												<option value="<?php echo $row['Acc_name']; ?>"><?php echo $row['Acc_name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>	
									<?php 
									$query = mysqli_query($conn,"select * from cash_receipt where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<div class="col-md-12">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text" ><?php echo $row['Memo']; ?></textarea>
										</div>
									</div>							
								</div>
																
								<div class="row">				
											
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="update-receipt" id="update-receeipt" data-toggle="modal">Update&nbsp;Cash_Receipt</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>                                      
			</div>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>