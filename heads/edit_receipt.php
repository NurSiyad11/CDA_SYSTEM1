<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['Update']))
	{	
		$st = $conn->query("SELECT Status as st from `receipt` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st =='Approved'){
			?>
			<Script>
				window.addEventListener('load',function(){
					swal({
						title: "Warning",
						text: "This Receipt is not updated, b/c you alredy Approved this Receipt ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
							window.location = "All_Receipt.php";
						});
				});			
			</Script>
			<?php			
		}else {
			$Status=$_POST['Status'];	
			// $Memo=$_POST['Memo'];	

			$result = mysqli_query($conn,"update receipt set Status='$Status' where id='$get_id'         
				"); 		
			if ($result) {			
				echo "<script>alert('Record Successfully Updated');</script>";
				echo "<script type='text/javascript'> document.location = 'All_Receipt.php'; </script>";
				
			} else{
			die(mysqli_error());
		}	
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
								<h4>Update Receipt</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="All_Receipt.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Receipt Status Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Update Receipt Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>
								<div class="row">
									<?php
									$query = mysqli_query($conn,"SELECT user.Name, user.Com_name, receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.File,receipt.Status FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Company Name :</label>
											<input name="com_name" class="form-control" readonly required type="text" value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>	
                                  	<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Customer Name :</label>
											<input name="name" class="form-control" readonly required type="text" value="<?php echo $row['Name']; ?>">
										</div>
									</div>																									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Receipt No# :</label>
											<input name="RV" type="number" placeholder="Receipt No#" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['RV']; ?>" >
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date : </label>
											<input name="Date" class="form-control" readonly required type="Date" value="<?php echo $row['Date']; ?>">
										</div>
									</div>	
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Amount :</label>
											<input name="Amount" type="text" placeholder="$00.00" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Amount']; ?>">
										</div>
									</div>	
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<input name="status" class="form-control" readonly required type="text" value="<?php echo $row['Status']; ?>">
										</div>
									</div>																
								</div>
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label>Memo / Description</label>
											<textarea name="memo" style="height: 7em;" readonly placeholder="Description" class="form-control text_area" type="text" ><?php echo $row['Memo']; ?></textarea>
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<!-- <button class="btn btn-primary" name="update-receipt" id="update-receeipt" data-toggle="modal">Update&nbsp;Receipt</button> -->
												<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a>
											</div>
										</div>
									</div>
								</div>
																
								<div class="row">	
									
								</div>
							</section>

							<section>
                                <div class="row">
                                    <?php                                    
                                    $sql="SELECT File from receipt where id='$get_id' ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info !=''){
                                           ?>                                       
                                            <embed type="application/pdf" src="../admin/pdf/<?php echo $info['File'] ; ?>" width="900" height="500">
                                        <?php
                                        }else{
                                           echo "No file found";   
										?>
										   <!-- <embed type="application/pdf" src="Rvpdf/Caawiye Design Company.pdf" width="900" height="500">                                   -->
                                        
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </div>                                
                            </section>
						</form>
					</div>
				</div>     
				

				  <!-- Medium modal -->
				<div class="col-md-4 col-sm-12 mb-30">				
                    <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Receipt Status Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM receipt  where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">
                                            <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                         
											<div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Status :</label>
                                                    <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                        <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                                                    
                                                        <option value="Approved">Approved</option>
                                                        <option value="Rejected">Rejected</option>
                                                    </select>
                                                </div>
                                            </div>	                                             
                                            <!-- <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" name="Memo" required autocomplete="off" ><?php// echo $row['Memo']; ?> 
                                                </textarea>
                                            </div> -->                                                                           
                                                         
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="Update" class="btn btn-primary" >Update</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>					
                </div>
				


			</div>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>