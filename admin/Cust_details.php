<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['submit']))
	{
//	$name=$_POST['name'];	   
	$Date=$_POST['Date']; 	
	$Message=$_POST['Message'];	
	$Status=$_POST['Status']; 
	$Memo=$_POST['Memo']; 	
	     
     $cid = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];

        mysqli_query($conn,"INSERT INTO debt_reminder(Cid,Date,Message,Status,Memo) 
		VALUES('$cid','$Date','$Message','$Status','$Memo')         
		") or die(mysqli_error()); ?>
		<script>alert('Record Successfully  Submited');</script>;
		<script>
		window.location = "Cust_Report.php"; 
		</script>
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
								<h4>Customer Transection</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Cust_Report.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">Customer Details </li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="row pb-10">
                    <div class="col-xl-4 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                        <?php 		                    
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today'  ")->fetch_assoc()['total'];
                            $format =number_format((float)$Total, '2','.',',');
                                               									
                        ?>	
                                

                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-20 text-dark"><?php echo  "$ " .($format);?></div>
                                    
                                    <div class="font-15 text-secondary weight-500"> INVOICE </div>
                                </div>
                                <!-- <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-money-1"></i></div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">

                        <?php                                          
                            
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today'  ")->fetch_assoc()['total'];
                            $format =number_format((float)$Total, '2','.',',');
                        										
                        ?>   
                    
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">							
                                    <div class="weight-700 font-20 text-dark"><?php echo "$ " . htmlentities($format); ?></div>
                                <div class="font-15 text-secondary weight-500">RECEEPT</div>
                                </div>
                                <!-- <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-money-1"></span></div>
                                </div> -->
                            </div>
                        </div>				
                    </div>


                    <div class="col-xl-4 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">

                        <?php 
                        
                    
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today'  ")->fetch_assoc()['total'];
                            $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today'  ")->fetch_assoc()['total'];
                            $Bal = $INV - $RV;
                            $format_balance =number_format((float)$Bal, '2','.',',');										
                        ?>	
                        

                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-20 text-dark"><?php echo "$ " .($format_balance); ?></div>
                                    <div class="font-15 text-secondary weight-500">BALANCE</div>    
                                </div>
                                <!-- <div class="widget-icon">
                                    <div class="icon"><i class="icon-copy dw dw-money-2" aria-hidden="true"></i></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>








				<div class="pd-20 card-box mb-30">
                    <?php
                      $cust_name = $conn->query("SELECT name as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];  
                    ?>
                    
				
                    <div class="card-box mb-30">
                        <div >
                             <!-- <a href="inv_detail_report.php?edit=<?php //echo $get_id;?>"><i class="dw dw-edit2 "></i> Edit  </a>
                             <a href="inv_detail_report.php?edit=<?php //echo $get_id;?>"><i class=" dw dw-edit2 "></i> Edit</a> -->

                        </div>
                        <div class="pd-20" >
                               
                                <h2 class="text-blue h4"><?php echo "Customer Name:  $cust_name"?></h2>
                                <!-- <a class="dropdown-item" href="inv_detail_report.php?edit=<?php echo $get_id;?>"><i class="dw dw-edit2"></i> Edit</a> -->
                               <center><a href="inv_detail_report.php?edit=<?php echo $get_id;?>" class="bg-light-blue btn text-blue weight-500"><i class="icon-copy dw dw-eye " ></i> All Invoice Pdf</a> 
                                <a href="receipt_detail_report.php?edit=<?php echo $get_id;?>" class="bg-light-blue btn text-blue weight-500"><i class="icon-copy dw dw-eye " ></i> All Receipts Pdf </a>
                                <a  href="#" class="bg-light-blue btn text-blue weight-500" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-eye"></i> Dept Reminder</a>
												<!-- <img src="vendors/images/modal-img2.jpg" alt="modal"> -->
											</a>   
                            </center>
                                
                                <!-- <a href="inv_detail_report.php?edit=<?php //echo $get_id;?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="inv_detail_report.php?edit=<?php// echo $get_id;?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a> -->

                            </div>
                            
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>				
                                        <th> No#</th>                                       
                                        <th> ##</th>							
                                        <th> Invoice No#</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Invoice</th>
                                        <th>Receipt</th>
                                        <th>File</th>
                                        <!-- <th class="datatable-nosort">ACTION</th>                                  -->
                                    
                                                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>	
                                    <?php
									//$query = mysqli_query($conn,"SELECT user.Name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.id = '$get_id' ")or die(mysqli_error());
									//$new_row = mysqli_fetch_array($query);
									?>
					

                                        <?php 						
                                        $i =1;
                                        $Cname = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                        $sql = "SELECT id,D_INV,invoice,File,Date,Memo,Amount,empty FROM invoice where Cid='$Cname' UNION All SELECT id,D_RV,RV,File,Date,Memo,empty,Amount FROM receipt where Cid='$Cname'  order by Date desc ";
                                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                    
                                        ?>  
                                        <td ><?php echo $i++; ?></td>
                                       
                                        <td><?php echo  $row['D_INV']; ?></td>
                                        <td><?php echo  $row['invoice']; ?></td>
                                        <td><?php echo  $row['Date']; ?></td>								
                                        <td><?php echo $row['Memo']; ?></td>
                                        <td><?php echo $row['Amount']; ?></td>
                                        <td><?php echo $row['empty']; ?></td>
                                        <td><?php echo $row['File']; ?></td>
                                        <!-- <td>
                                            <div class="table-actions">
                                            <a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="icon-copy dw dw-eye " ></i> View</a>
                                                
                                            
                                            <a href="edit_department.php?edit=<?php //echo htmlentities($result->id);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                                <a href="department.php?delete=<?php //echo htmlentities($result->id);?>" data-color="#e95959" onclick= ' return checkdelete()' ><i class="icon-copy dw dw-delete-3"></i></a>
                                            </div>
                                        </td>                                                           -->

                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
					<!-- Medium modal -->
                    <div class="col-md-4 col-sm-12 mb-30">				
                        <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Dept Reminder</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>                                    
                                    <div class="modal-body">
                                        <?php
                                            // $query = mysqli_query($conn,"SELECT user.Name,user.Email, user.Picture, tbl_order.id, tbl_order.Date, tbl_order.Reason, tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.id='$get_id'")or die(mysqli_error());
                                            $query = mysqli_query($conn,"select * from user where Role='Customer' AND ID='$get_id' ") or die(mysqli_error());
                                            $row = mysqli_fetch_array($query);
                                            ?>

                                        <form id="add-event" method=post>
                                            <div class="modal-body">
                                                <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" name="name" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type='text' class="form-control" name="Com_name" required="true" autocomplete="off"  readonly value="<?php echo $row['Com_name']; ?>">
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Balance</label>
                                                    <input type='text' class="form-control" name="Com_name" required="true" autocomplete="off"  readonly value=" <?php echo "$ " .($format_balance); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type='date' class="form-control" name="Date" required="true" autocomplete="off" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control" name="Message" required autocomplete="off" >Xasuusin. Asc <?php echo $row['Name']; ?>  , Haraaga xisaabta deynta laguugu leeyahay waa <?php echo "$ " .($format_balance); ?> Wixii faahfaahin ah kala xiriir 2323232
                                                    </textarea>
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="Status">
                                                        <option value="Show">Show</option>
                                                        <option value="Hide">Hide</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="Memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text"></textarea>
                                                    </div>
                                                </div>	
                                                <!-- <div class="form-group">
                                                    <label>Event Icon</label>
                                                    <select class="form-control" name="eicon">
                                                        <option value="circle">circle</option>
                                                        <option value="cog">cog</option>
                                                        <option value="group">group</option>
                                                        <option value="suitcase">suitcase</option>
                                                        <option value="calendar">calendar</option>
                                                    </select>
                                                </div> -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
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
	<?php //include('includes/scripts.php')?>

<!-- js -->

<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

    

    
	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<script src="../vendors/scripts/datatable-setting.js"></script></body>





</body>
</html>