<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['update']))
	{	
    $Title=$_POST['Title'];	
    $Message=$_POST['Message'];	
    $Memo=$_POST['Memo'];	
    $Status=$_POST['Status'];
    
    
	$date = new DateTime();
	$date->modify('+2 hour');
	$date1 = $date->format("Y-m-d h:i:s a");


	$result = mysqli_query($conn,"update debt_reminder set  Title='$Title', Update_date='$date1', Message='$Message', Memo='$Memo', Status='$Status' where id='$get_id'         
		"); 		
	if ($result) {
		?>
		<Script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Success",
					text: "Record Successfully Updated",
					icon: "success",
					button: "Ok Done!",
				})
				.then(function() {
							window.location = "edit_debt_reminder.php?edit=" + <?php echo ($get_id); ?>;
						});
			});			
		</Script>
		<?php
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
								<h4>Customer Dept Reminder</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="mng_debt_reminder.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">All debt Reminder</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Customer Debt Reminder </h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, user.Phone, user.Address, debt_reminder.id, debt_reminder.Title, debt_reminder.RegDate, debt_reminder.Update_date, debt_reminder.Message, debt_reminder.Memo, debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id where debt_reminder.id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >


								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Customer Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>							

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Company Name :</label>
											<input name="Com_name" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Com_name']; ?>">
										</div>
									</div>
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Phone Number :</label>
											<input name="Phone" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Phone']; ?>">
										</div>
									</div>									
								</div>


								<div class="row">
                                    <div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Address :</label>
											<input name="address" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Address']; ?>">
										</div>
									</div>	
									<!-- <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Date of sending  :</label>
											<input name="date" type="date" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Date']; ?>">
										</div>
									</div>		 -->
                                    <div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >System Register Date  :</label>
											<input name="sys_date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['RegDate']; ?>">
										</div>
									</div>					
								</div>

								<div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label></label>
                                            <p>Title</p>
                                        </div>
                                    </div>	
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <textarea name="Title" style="height: 3em;" placeholder="Description" class="form-control text_area" readonly type="text"><?php echo $row['Title']; ?></textarea>
                                        </div>
                                    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label></label>
                                            <p>Message</p>
                                        </div>
                                    </div>	
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <textarea name="Memo" style="height: 10em;" placeholder="Description" class="form-control text_area" readonly type="text"><?php echo $row['Message']; ?></textarea>
                                        </div>
                                    </div>	
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label></label>
                                            <p>Description</p>
                                        </div>
                                    </div>	
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <textarea name="Memo" style="height: 4em;" placeholder="Description" class="form-control text_area" readonly type="text"><?php echo $row['Memo']; ?></textarea>
                                        </div>
                                    </div>	
                                </div>

										
								
								<div class="row">
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Action Taken Date :</label>
											<input name="upDate" type="text" class="form-control " required="true" readonly value="<?php echo $row['Update_date']; ?>">
										</div>
									</div>	
                                    <div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Status :</label>
											<input name="st" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Status']; ?>">
										</div>
									</div>	                               							
									<div class="col-md-4 col-sm-4">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
                                                <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-edit-2"></i> Take Action</a>
											</div>
										</div>
									</div>
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
                                    <h4 class="modal-title" id="myLargeModalLabel">Dept Reminder Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
                                    <?php
                                        $query = mysqli_query($conn,"select * from debt_reminder where id='$get_id' ") or die(mysqli_error());
                                        $row = mysqli_fetch_array($query);
                                        ?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">                                    
                                            <div class="form-group">
												<label>Title</label>
												<input name="Title" class="form-control" type="text" autocomplete="off" required value="<?php echo $row['Title']; ?>">
											</div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" name="Message" required autocomplete="off" ><?php echo $row['Message']; ?> 
                                                </textarea>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Status :</label>
                                                    <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                        <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                                                    
                                                        <option value="Show">Show</option>
                                                        <option value="Hide">Hide</option>
                                                    </select>
                                                </div>
                                            </div>	                                            
                                         
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="Memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text"><?php echo $row['Memo']; ?> </textarea>
                                                </div>
                                            </div>	
                                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update" class="btn btn-primary" >Done</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>                               
                            </div>
                        </div>
                    </div>					
                </div>				

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>