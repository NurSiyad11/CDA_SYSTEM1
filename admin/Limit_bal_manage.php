<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<?php
if (isset($_GET['delete'])) {
	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM limit_customer_bal where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Record deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'Limit_bal_manage.php'; </script>";
		
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
                    $query = mysqli_query($conn,"select * from limit_customer_bal")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<button class="btn btn-primary" type="submit" name="All_invoice"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-14">Total Customr Bal Limited </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from invoice where  Status = 'Pending'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending_order"> <i class="icon-copy dw dw-balance"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-16">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>            

                <div class="col-xl-4 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from invoice where Status = 'Rejected'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button  class="btn btn-danger"  type="submit" name="Rejected"><i class="icon-copy ion-close"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Rejected</div>
                            </div>
                        </div>
                    </div>
                </div>            			
            </div>


       			
			
			<!-- Customer All Invoice Start -->
			<?php 
			if(isset($_GET['All_invoice'])){
			?>
			<div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Total Customer Limit Balance</h2>
                </div>
                <div class="pb-20">
                    <!--   table stripe hover data-table-export nowrap         -->
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Company Name</th>
                                <th>Limited Balance </th>
                                <th>Memo</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;                           
                                
                                $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, limit_customer_bal.id, limit_customer_bal.Admin_id, limit_customer_bal.Cid,limit_customer_bal.Limit_bal, limit_customer_bal.Memo FROM limit_customer_bal INNER JOIN user ON   limit_customer_bal.Cid=user.ID order by limit_customer_bal.id Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($teacher_query)) {
                                //$id = $row['id'];
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
                                            <div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>								
                                
                                <td><?php echo $row['Com_name']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Limit_bal'], '2','.',','); ?></td>                            
                                <td><?php echo $row['Memo']; ?></td>
                        
                        
                                <!-- <td><?php //$stats=$row['Status'];
                               // if($stats=="Pending"){
                                ?>
                                <span class="badge badge-primary">Pending</span>
                                   
                                    <?php// } if($stats=="Approved")  { ?>
                                        <span class="badge badge-success">Approved</span>
                                    <?php// } if($stats=="Rejected")  { ?>
                                        <span class="badge badge-danger">Rejected</span>
                                    <?php //} 
                                ?>
                                </td> -->

                                <?php
                                // $admins = $row['Admin_id'];
                                // $query_admin_record = mysqli_query($conn,"SELECT user.Name, invoice.id, invoice.Cid FROM invoice INNER JOIN user ON   invoice.Admin_id=user.ID  where invoice.Admin_id='$admins' ") or die(mysqli_error());
                                // $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
                                <!-- <td><?php// echo $row_admin['Name']; ?></td> -->
                            
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <?php
                                    
                                        ?>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_limit_bal.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="Limit_bal_manage.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>  
                        </tbody>                        
                    </table>
                    <script>
                        function checkdelete(){
                            return confirm('Do you Want to Delete this Record ? ');
                        }
                    </script>
                </div>			      
            </div>
			<?php } elseif(isset($_GET['Pending_order'])){?>
			<!-- Customer All Invoice END -->


			<!-- Customer Pending Invoice Start -->		
			<div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Pending Invoice</h2>
                </div>
                <div class="pb-20">
                    <!--   table stripe hover data-table-export nowrap         -->
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Invoice No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>								
                                <th>Status</th>
                                <th>Recorded by</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                // $Role = $conn->query("SELECT Role as role from `user` where ID='$session_id'  ")->fetch_assoc()['role'];
                                
                                // if($Role =='Administrator'){
                                //     $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID order by invoice.Date Desc") or die(mysqli_error());
                                    
                                // }
                                // else{
                                //     $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.admin_id='$session_id' order by invoice.Date Desc") or die(mysqli_error());
                                
                                // }
                                $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Admin_id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.Status='Pending' order by invoice.Date Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($teacher_query)) {
                                //$id = $row['id'];
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
                                            <div class="weight-600"><?php echo $row['Com_name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>								
                                
                                <td><?php echo "INV# ". $row['invoice']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
                        
                                <td><?php $stats=$row['Status'];
                                if($stats=="Pending"){
                                ?>
                                <span class="badge badge-primary">Pending</span>
                                    <!-- <span style="color: green">Pending</span> -->
                                    <?php } if($stats=="Approved")  { ?>
                                        <span class="badge badge-success">Approved</span>
                                    <?php } if($stats=="Rejected")  { ?>
                                        <span class="badge badge-danger">Rejected</span>
                                    <?php } 
                                ?>
                                </td>

                                <?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, invoice.id, invoice.Cid FROM invoice INNER JOIN user ON   invoice.Admin_id=user.ID  where invoice.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
                                <td><?php echo $row_admin['Name']; ?></td>
                            
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <?php
                                    
                                        ?>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_invoice.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="Invoice.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>  
                        </tbody>                        
                    </table>
                    <script>
                        function checkdelete(){
                            return confirm('Do you Want to Delete this Record ? ');
                        }
                    </script>
                </div>			      
            </div>
			<?php } elseif(isset($_GET['Rejected'])){?>
			<!-- Customer Pending Invoice END -->

			

			<!-- Customer Rejected Invoice Start -->
			<div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Rejected Invoice</h2>
                </div>
                <div class="pb-20">
                    <!--   table stripe hover data-table-export nowrap         -->
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Invoice No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>								
                                <th>Status</th>
                                <th>Recorded by</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                // $Role = $conn->query("SELECT Role as role from `user` where ID='$session_id'  ")->fetch_assoc()['role'];
                                
                                // if($Role =='Administrator'){
                                //     $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID order by invoice.Date Desc") or die(mysqli_error());
                                    
                                // }
                                // else{
                                //     $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.admin_id='$session_id' order by invoice.Date Desc") or die(mysqli_error());
                                
                                // }
                                $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Admin_id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.Status='Rejected' order by invoice.Date Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($teacher_query)) {
                                //$id = $row['id'];
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
                                            <div class="weight-600"><?php echo $row['Com_name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>								
                                
                                <td><?php echo "INV# ". $row['invoice']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
                        
                                <td><?php $stats=$row['Status'];
                                if($stats=="Pending"){
                                ?>
                                <span class="badge badge-primary">Pending</span>
                                    <!-- <span style="color: green">Pending</span> -->
                                    <?php } if($stats=="Approved")  { ?>
                                        <span class="badge badge-success">Approved</span>
                                    <?php } if($stats=="Rejected")  { ?>
                                        <span class="badge badge-danger">Rejected</span>
                                    <?php } 
                                ?>
                                </td>

                                <?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, invoice.id, invoice.Cid FROM invoice INNER JOIN user ON   invoice.Admin_id=user.ID  where invoice.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
                                <td><?php echo $row_admin['Name']; ?></td>
                            
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <?php
                                    
                                        ?>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_invoice.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="Invoice.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>  
                        </tbody>                        
                    </table>
                    <script>
                        function checkdelete(){
                            return confirm('Do you Want to Delete this Record ? ');
                        }
                    </script>
                </div>			      
            </div>
			<?php } elseif(isset($_GET['Approved'])){?>
			<!-- Customer Rejected Order END -->

			

			<!-- Customer Approve Invoice Start -->
			<div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Approved Invoice</h2>
                </div>
                <div class="pb-20">
                    <!--   table stripe hover data-table-export nowrap         -->
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Invoice No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>								
                                <th>Status</th>
                                <th>Recorded by</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                // $Role = $conn->query("SELECT Role as role from `user` where ID='$session_id'  ")->fetch_assoc()['role'];
                                
                                // if($Role =='Administrator'){
                                //     $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID order by invoice.Date Desc") or die(mysqli_error());
                                    
                                // }
                                // else{
                                //     $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.admin_id='$session_id' order by invoice.Date Desc") or die(mysqli_error());
                                
                                // }
                                $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, invoice.id, invoice.Admin_id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID where invoice.Status='Approved' order by invoice.Date Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($teacher_query)) {
                                //$id = $row['id'];
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
                                            <div class="weight-600"><?php echo $row['Com_name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>								
                                
                                <td><?php echo "INV# ". $row['invoice']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
                        
                                <td><?php $stats=$row['Status'];
                                if($stats=="Pending"){
                                ?>
                                <span class="badge badge-primary">Pending</span>
                                    <!-- <span style="color: green">Pending</span> -->
                                    <?php } if($stats=="Approved")  { ?>
                                        <span class="badge badge-success">Approved</span>
                                    <?php } if($stats=="Rejected")  { ?>
                                        <span class="badge badge-danger">Rejected</span>
                                    <?php } 
                                ?>
                                </td>

                                <?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, invoice.id, invoice.Cid FROM invoice INNER JOIN user ON   invoice.Admin_id=user.ID  where invoice.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
                                <td><?php echo $row_admin['Name']; ?></td>
                            
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <?php
                                    
                                        ?>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_invoice.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="Invoice.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>  
                        </tbody>                        
                    </table>
                    <script>
                        function checkdelete(){
                            return confirm('Do you Want to Delete this Record ? ');
                        }
                    </script>
                </div>			      
            </div>
			<?php } ?>

			<!-- Customer else Part Display All Invoice Start -->
			
			<!-- Customer else Part Display All Invoice Start -->
			


			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php'); ?>
	
</body>
</html>