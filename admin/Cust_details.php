<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['submit']))
	{   
	$Date=$_POST['Date']; 	
	$Message=$_POST['Message'];	
	$Status=$_POST['Status']; 
	$Memo=$_POST['Memo']; 	
	     
     $cid = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];

        mysqli_query($conn,"INSERT INTO debt_reminder(Cid,Date,Message,Status,Memo) 
		VALUES('$cid','$Date','$Message','$Status','$Memo')         
		") or die(mysqli_error()); ?>
        <Script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Success",
					text: "Record Successfully Updated",
					icon: "success",
					button: "Ok Done!",
				})
				.then(function() {
							window.location = "Cust_details.php?edit=" + <?php echo ($get_id); ?>;
						});
			});			
		</Script>
		<!-- <script>alert('Record Successfully  Submited');</script>;
		<script>
		window.location = "Cust_Report.php"; 
		</script> -->
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
                        <div class="col-md-6 col-sm-12 text-right">
                         <?php     
                                    $admin_rol = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
                                    if($admin_rol == 'Administrator'){                                   
                                ?>
                                <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="icon-copy ion-plus "></i> Dept Reminder</a>
                           <?php  }?>
							<!-- <div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div> -->
						</div>
                        <!-- <div class="row">
                            <div class="col-12"> 
                                <?php     
                                    $admin_rol = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
                                    if($admin_rol == 'Administrator'){                                   
                                ?>
                                <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="icon-copy ion-plus "></i> Dept Reminder</a>
                           <?php  }?>
                            </div>
                        </div> -->
					</div>
				</div>



                <div class="row">
                    <div class="col-xl-4 mb-30">
                        <?php 		                    
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today'  ")->fetch_assoc()['total'];
                            $format =number_format((float)$Total, '2','.',',');                                               									
                        ?>  
                        <div class="card-box height-100-p widget-style1 bg-white">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format); ?></div>
                                    <div class="weight-300 font-15">Invoices </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-30">
                    
                        <div class="card-box height-100-p widget-style1 bg-white">
                         <?php                                 
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today'  ")->fetch_assoc()['total'];
                            $format2 =number_format((float)$Total, '2','.',',');                        										
                        ?>   
                            <div class="d-flex flex-wrap align-items-center ">	
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>						
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format2); ?></div>
                                    <div class="weight-300 font-15">Receipts</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-30">
                        <div class="card-box height-100-p widget-style1 bg-white">
                            <?php 
                                $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');										
                            ?>	
                            <div class="d-flex flex-wrap align-items-center">	
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>						
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format_balance); ?></div>
                                    <div class="weight-300 font-15">Balance </div>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>










				<div class="pd-20 card-box mb-30">
                    <?php
                      $cust_name = $conn->query("SELECT name as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid']; 
                      $com_name = $conn->query("SELECT Com_name as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];  
                    ?>
                    
				
                    <div class="card-box mb-30">                       
                     
                        <div class="row">
                            <div class="col-7">
                                <h2 class="text-blue h4"><?php echo "Company Name:  $com_name"?></h2>

                            </div>
                            <div class="col-5">
                                <p class="text-blue "><?php echo "Customer Name:  $cust_name"?></p>

                            </div>
                        </div>                                                        
                
                            
                        <!-- <div class="container pd-5">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="from-group">
                                            <label > From Date  </label>
                                            <input type="date" name="from_date" class="form-control" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="from-group">
                                            <label > To Date  </label>
                                            <input type="date" name="to_date" class="form-control" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" >
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="from-group">
                                            <label > Click to Filter  </label> <br>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> -->

                        <!-- Table Display data -->
                        <div class="pb-10">
                            <table class="data-table table stripe hover nowrap">
                                <thead class="bg-dark text-white">
                                    <tr>				
                                        <th> No#</th>     
                                        <th class="datatable-nosort">ACTION</th>                                    
                                        <th class="datatable-nosort"> ##</th>							
                                        <th class="datatable-nosort"> Invoice No#</th>
                                        <th class="datatable-nosort">Date</th>
                                        <th class="datatable-nosort">Description</th>
                                        <th class="datatable-nosort">Invoice</th>
                                        <th class="datatable-nosort">Receipt</th>
                                        <th class="datatable-nosort">Balance</th>                               
                    
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
                                        $bal=0;
                                        $Cname = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                        $sql = "SELECT id,D_INV,invoice,File,Date,Memo,Amount,empty FROM invoice where Cid='$Cname' UNION All SELECT id,D_RV,RV,File,Date,Memo,empty,Amount FROM receipt where Cid='$Cname'  order by Date asc ";
                                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                    
                                        ?>  
                                        <td ><?php echo $i++; ?></td>
                                        <?php
                                        if($row['D_INV'] == 'INV#'){
                                        ?>
                                         <td><button data-id='<?php echo $row['id']; ?>' class="userinfo btn btn-danger">Inv PDF</button></td>
                                         <?php
                                           }else {
                                            ?>
                                            <td><a href="A5pdf2.php?edit=<?php echo $row['id']?>" name="receipt" id="receipt" class="btn btn-danger"> <i class="icon-copy dw dw-"></i>Rv PDF</a></td>
                                            <?php
                                           } 
                                        ?> 
                                        <td><?php echo  $row['D_INV']; ?></td>
                                        <td><?php echo  $row['invoice']; ?></td>
                                        <td><?php echo  $row['Date']; ?></td>								
                                        <td><?php echo $row['Memo']; ?></td>
                                        <td><?php echo "$ ". number_format((float)htmlentities($row['Amount']),'2','.',','); ?></td>
								        <td><?php echo "$ ". number_format((float)htmlentities($row['empty']), '2','.',','); ?></td>
                                        <!-- <td><?php //echo $row['Amount']; ?></td>
                                        <td><?php //echo $row['empty']; ?></td> -->


                                        <!-- <td><?php //echo $row['File']; ?></td> -->
                                            
                                        <?php 
                                        $in = $bal + $row['Amount'];;
                                        $out= $row['empty'];
                                        $bal = $in - $out;
                                        ?>
                                        <td><?php echo "$ ". number_format((float)htmlentities($bal),'2','.',','); ?></td>

                                        <!-- <td><?php echo $bal; ?></td> -->

                                        
                                        

                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>                 
				     



					<!-- Dept reminder popup  Medium modal -->
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
                                                    <textarea class="form-control" name="Message" required autocomplete="off" >Xasuusin. Asc <?php echo $row['Name']; ?>  , Haraaga xisaabta deynta laguugu leeyahay waa <?php echo "$ " .($format_balance); ?>  Wixii faahfaahin ah kala xiriir +252613231772</textarea>
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









                
                <!-- <div class="modal fade" id="empModal"  role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">PDF</h4>
                                      <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                    </div> -->




					<!-- add task popup start PDF FILE Display Modal-->
					<div class="modal fade customscroll" id="empModal" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">File Pdf</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body pd-0">
									<div class="task-list-form">
										<ul>
											<li>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-6">

                                                            </div>
                                                        </div>
                                                    
                                                    </div>                                
                                                </section>
                                                           
											</li>											
										</ul>
									</div>									
								</div>								
							</div>
						</div>
					</div>
					<!-- add task popup End -->    










			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>

<!-- js -->





</body>
</html>