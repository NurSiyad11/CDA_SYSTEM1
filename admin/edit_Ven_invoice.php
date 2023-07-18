<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['update_ven_invoice']))
	{	
    $name=$_POST['name'];	
	$Date=$_POST['Date'];  
	$invoice=$_POST['invoice']; 
	$Amount=$_POST['Amount']; 
	$memo=$_POST['memo']; 

	$Vid = $conn->query("SELECT id as Vid from `user` where Com_name='$name'  ")->fetch_assoc()['Vid'];

	$result = mysqli_query($conn,"update ven_invoice set Vid='$Vid',   Date='$Date', V_Invoice='$invoice',  Amount='$Amount', Memo='$memo' where id='$get_id'         
		"); 		
	if ($result) {
		?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Record Successfully Updated ",
						icon: "success",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_Ven_invoice.php?edit=" + <?php echo ($get_id); ?>;
					});
				});			
			</Script>
			<?php
     	// echo "<script>alert('Record Successfully Updated');</script>";
     	// echo "<script type='text/javascript'> document.location = 'Vendor_invoice.php'; </script>";
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

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Update Vendor Invoice</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="vendor_invoice.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vendor Invoice Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Vendor Invoice Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>
                            	<?php
									$query = mysqli_query($conn,"SELECT user.Name, user.Com_name,ven_invoice.id, ven_invoice.Vid,ven_invoice.V_invoice ,ven_invoice.Amount,ven_invoice.Date,ven_invoice.Memo FROM ven_invoice INNER JOIN user ON   ven_invoice.Vid=user.ID  where ven_invoice.id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
                					<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

								<div class="row">
								    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Vendor Name :</label>
											<select name="name" class="custom-select form-control" required="true" autocomplete="off">
											<option value="<?php echo $row['Com_name']; ?>"><?php echo $row['Com_name']; ?></option>
												<!-- <option value="">Select Customer</option> -->
													<?php
													$query = mysqli_query($conn,"select * from user where role ='Vendor'");
													while($row = mysqli_fetch_array($query)){
													
													?>
												<option value="<?php echo $row['Com_name']; ?>"><?php echo $row['Com_name']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>	
                                    
                                    
                                    <?php
									$query = mysqli_query($conn,"select * from ven_invoice where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Date</label>
												<input name="Date" class="form-control" type="Date" value="<?php echo $row['Date']; ?>">
											</div>
									</div>									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Vendor Invoice Number :</label>
											<input name="invoice" type="number" placeholder="Vendor Invoice No#" class="form-control" required="true" autocomplete="off" value="<?php echo $row['V_invoice']; ?>" >
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
												<button class="btn btn-primary" name="update_ven_invoice" id="update_ven_invoice" data-toggle="modal">Update&nbsp;</button>
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