<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<!-- DELETE CODE FAQ -->
<?php
if (isset($_GET['delete'])) {	
	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM reg_debt_reminder where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
        ?>
		<script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Success",
					text: "Message deleted Successfully ",
					icon: "success",
					button: "Ok Done!",			
				})
				.then(function() {
						window.location = "Reg_debt_reminder.php";
					});
			});
		</script>
	<?php
		// echo "<script>alert('Record deleted Successfully');</script>";
     	// echo "<script type='text/javascript'> document.location = 'faq.php'; </script>";
		
	}
}
?>


<!-- ADD Code FAQ -->
<?php
	if(isset($_POST['Add']))
	{
        
        $Title=$_POST['Title'];	   
        $Message=$_POST['Message']; 
        $Status=$_POST['Status']; 
           
   
	$query = mysqli_query($conn,"select * from reg_debt_reminder where Title = '$Title' ")or die(mysqli_error());
	$count = mysqli_num_rows($query);     
	 

    if ($count > 0){ ?>
		<script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Warning",
					text: "Message Already exist ",
					icon: "warning",
					button: "Ok Done!",			
				})
				.then(function() {
						window.location = "Reg_debt_reminder.php";
					});
			});
		</script>
	<?php
	}else{
        mysqli_query($conn,"INSERT INTO reg_debt_reminder(Title,Message,Status) VALUES('$Title','$Message','$Status')         
        ") or die(mysqli_error()); ?>
        <script>    
		   window.addEventListener('load',function(){
			   swal.fire({
				  title: "success",
				   text: "Message Successfully Added ",
				   icon: "success",
				   button: "Ok Done!",		   
			   })
			   .then(function() {
						   window.location = "Reg_debt_reminder.php";
					   });  
		   });   
	   </script>
	 

        <!-- <script>alert('FAQ Records Successfully Added');</script>;
        <script>
        window.location = "faq.php"; 
        </script> -->
        <?php   
    
    }
    
}

?>



<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">

			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from reg_debt_reminder")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn  btn-primary" type="submit" name="All_debt_reminder"> <i class="icon-copy dw dw-support-1"></i></button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Messages </div>	
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from reg_debt_reminder where Status = '1'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Show"><i class="icon-copy fi-check"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Active</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from reg_debt_reminder where  Status = '0'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-danger" type="submit" name="Hide"><i class="icon-copy fi-x"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">In Active</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>

	

	
         <!-- ADD Message  modal -->
            <div class="col-md-4 col-sm-12 mb-30">				
                <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Create Message</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>                                    
                            <div class="modal-body">                           
                                <form id="add-event" method=post>
                                    <div class="modal-body">                                      
                                        
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input name="Title" class="form-control" type="text" placeholder="Enter The Title" autocomplete="off" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Nessage</label>
                                            <textarea class="form-control" name="Message" placeholder="Enter The Message" required autocomplete="off" ></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Status :</label>
                                            <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>												
                                            </select>
                                        </div>                                  
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Add" class="btn btn-primary" >ADD FAQ </button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>					
            </div>


			<div class="card-box mb-30">
				<div class="row">
					<div class="pd-20 col-md-6 col-sm-12">
						<h2 class="text-blue h4">All Message</h2>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">					
							<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="icon-copy ion-plus "></i> Add FAQ</a>

						</div>
					</div>
				</div>
				
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Title</th>	
                                <th> Status</th>						
								<!-- <th> Status</th>							 -->
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT * FROM reg_debt_reminder  ORDER BY id desc ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
								 ?>  
								<td ><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
									
										<div class="txt">
											<div class="weight-600"><?php echo $row['Title'];?></div>
										</div>
									</div>
								</td>						
                                <td><?php $Sts=$row['Status'];
	                             if($Sts=="0"){
	                              ?>
                                    <span class="badge badge-danger">Inactive</span>	                                
	                                  <?php } if($Sts=="1")  { ?>
                                       <span class="badge badge-success">Active</span>
	                                  <?php } ?>	
								</td>			
																		
								<td>
									<div class="dropdown">
                                    <a href="edit_reg_debt_reminder.php?edit=<?php echo $row['id'];?>"  class="btn btn-primary"> <i class="icon-copy dw dw-edit2"></i> Edit</a>
                                    <a class="btn btn-danger" href="Reg_debt_reminder.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
							
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<script>
						function checkdelete(){
							return confirm('Do you Want to Delete this Record ? ');
						}
					</script>
					
			   </div>
			</div>


			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts2.php'); ?>
</body>
</html>