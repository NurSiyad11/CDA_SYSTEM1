<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<!-- UPDATE CODE FAQ  -->

<?php
// 	if(isset($_POST['update']))
// 	{	
//         $Question=$_POST['Question'];	   
//         $Description=$_POST['Description']; 
//         $Video=$_POST['Video']; 





// 	$result = mysqli_query($conn,"update debt_reminder set Date='$Date', Update_date='$date1', Message='$Message', Memo='$Memo', Status='$Status' where id='$get_id'         
// 		"); 		
// 	if ($result) {
//      	echo "<script>alert('Record Successfully Updated');</script>";
//      	echo "<script type='text/javascript'> document.location = 'mng_debt_reminder.php'; </script>";
// 	} else{
// 	  die(mysqli_error());
//    }		
// }
?>

<!-- DELETE CODE FAQ -->
<?php
if (isset($_GET['delete'])) {	
	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM faq where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Record deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'faq.php'; </script>";
		
	}
}
?>


<!-- ADD Code FAQ -->
<?php
	if(isset($_POST['Add_Faq']))
	{
        
        $Question=$_POST['Question'];	   
        $Description=$_POST['Description']; 
        $Video=$_POST['Video']; 
        // $Order_no=$_POST['Order_no']; 



        
        // $query1 = mysqli_query($conn,"select * from user where Com_name = '$com_name' ")or die(mysqli_error());
        // $count1 = mysqli_num_rows($query1);     

        // $query = mysqli_query($conn,"select Order_no from faq where Order_no = '$Order_no' ")or die(mysqli_error());
        // $count = mysqli_num_rows($query);     
        

            mysqli_query($conn,"INSERT INTO faq(Aid,Question,Description,Video) VALUES('$session_id','$Question','$Description','$Video')         
            ") or die(mysqli_error()); ?>
            <script>alert('FAQ Records Successfully Added');</script>;
            <script>
            window.location = "faq.php"; 
            </script>
            <?php   
        
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
                    $query = mysqli_query($conn,"select * from faq")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-10 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="">
                                <img src="../vendors/images/img/xasusin1.png" class="border-radius-100 shadow" width="50" height="50" alt="">
                                </div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
                                <div class="weight-300 font-18">Total FAQ </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">     
                        <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="icon-copy ion-plus "></i> Add FAQ</a>

                    </div>
                </div>
            </div>


	
         <!-- ADD FAQ  modal -->
            <div class="col-md-4 col-sm-12 mb-30">				
                <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Frequently Asked Question</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>                                    
                            <div class="modal-body">
                                <?php
                                    // $query = mysqli_query($conn,"select * from debt_reminder where id='$get_id' ") or die(mysqli_error());
                                    // $row = mysqli_fetch_array($query);
                                    ?>

                                <form id="add-event" method=post>
                                    <div class="modal-body">                                      
                                        
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input name="Question" class="form-control" type="text" placeholder="Enter The Question" autocomplete="off" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="Description" placeholder="Enter The Description FAQ" required autocomplete="off" ></textarea>
                                        </div>
                                        <!-- <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Status :</label>
                                                <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                    <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                                                
                                                    <option value="Show">Show</option>
                                                    <option value="Hide">Hide</option>
                                                </select>
                                            </div>
                                        </div>	 -->
                                        
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Link Video</label>
                                                <input name="Video" placeholder="Enter The Video Link" class="form-control" type="text">
                                            </div>
                                        </div>	
                                        <!-- <?php 
                                        // $query2 = mysqli_query($conn,"select * from faq ")or die(mysqli_error());
                                        // $count_no = mysqli_num_rows($query2);  
                                        // $count_no_1 = $count_no +1;
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ordered No#</label>
                                                <input name="Order_no" placeholder="Enter The Order No#" class="form-control" type="text"  value="<?php //echo ($count_no_1)?>" >
                                            </div>
                                        </div>	 -->
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Add_Faq" class="btn btn-primary" >ADD FAQ </button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>					
            </div>





			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Frequently Asked Questions</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>NO#</th>
								<th class="table-plus datatable-nosort">Question</th>	
                                <th> Video</th>						
								<!-- <th> Status</th>							 -->
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$i =1;
								$sql = "SELECT * FROM faq  ORDER BY id desc ";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?>  
								<td ><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<!-- <div class="avatar mr-2 flex-shrink-0">
											<img src="<?php //echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div> -->
										<div class="txt">
											<div class="weight-600"><?php echo $row['Question'];?></div>
										</div>
									</div>
								</td>						
	                            <td><?php echo  $row['Video']; ?></td>
							

							
											
								<td>
									<div class="dropdown">
                                    <a href="edit_faq.php?edit=<?php echo $row['id'];?>"  class="btn btn-primary"> <i class="icon-copy dw dw-edit2"></i> Edit</a>
                                    <a class="btn btn-danger" href="faq.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>

							
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