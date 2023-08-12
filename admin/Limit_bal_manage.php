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
										<button class="btn btn-primary" type="submit" name="All_Limited"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
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
                  $query = mysqli_query($conn,"SELECT * FROM limit_customer_bal") or die(mysqli_error());
                  $count_warning = 0;
                  $count_unwarning = 0;                  
                  while ($row = mysqli_fetch_array($query)) {
                      $id = $row['id'];
                      $Cid = $row['Cid'];                  
                      $L_bal = $conn->query("SELECT Limit_bal as Lb from `limit_customer_bal` where id='$id'")->fetch_assoc()['Lb'];                  
                      $Cust_id = $conn->query("SELECT id as cid from `user` where id='$Cid'")->fetch_assoc()['cid'];
                      $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$Cust_id'")->fetch_assoc()['total'];
                      $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$Cust_id'")->fetch_assoc()['total'];
                      $Bal = $INV - $RV;
                  
                      if ($L_bal < $Bal) {
                          $stats = "warning";
                          $count_warning++;
                      } else {
                          $stats = "unwarning";
                          $count_unwarning++;
                      }
                  }                 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-danger" type="submit" name="warning"> <i class="icon-copy fi-alert"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count_warning); ?></div>
                                <div class="weight-300 font-16">Warning</div>
                            </div>
                        </div>
                    </div>
                </div>            

                <div class="col-xl-4 mb-30">                   
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button  class="btn btn-success"  type="submit" name="unwarning"><i class="icon-copy fi-check"></i></button>
									</div>
								</form>                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count_unwarning); ?></div>
                                <div class="weight-300 font-17">Unwarning</div>
                            </div>
                        </div>
                    </div>
                </div>            			
            </div>


       			
			
			<!-- Customer All Limited Bal Start -->
			<?php 
			if(isset($_GET['All_Limited'])){
			?>
			<div class="card-box mb-30">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-1">
                            <p class="breadcrumb-item"><a href="Limit_bal.php">Back</a></p>
                        </div>
                        <div class="col-11">
                        <h2 class="text-blue h4">Total Customer Limit Balance</h2>
                        </div>
                    </div>                
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Company Name</th>
                                <th>Balance</th>
                                <th>Memo</th>                                
                                <th>Limited Balance </th>
                                <th>Status</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;                        
                                $query = mysqli_query($conn,"SELECT user.Name, user.Com_name, limit_customer_bal.id, limit_customer_bal.Admin_id, limit_customer_bal.Cid,limit_customer_bal.Limit_bal, limit_customer_bal.Memo FROM limit_customer_bal INNER JOIN user ON   limit_customer_bal.Cid=user.ID order by limit_customer_bal.id Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $Cid = $row['Cid'];
                                    ?>
                                <td><?php echo $i++; ?></td>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">                                        
                                        <div class="txt">
                                            <div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>							
                                <td><?php echo $row['Com_name']; ?></td>                              
            
                                <?php
                                $L_bal = $conn->query("SELECT Limit_bal as Lb from `limit_customer_bal` where id='$id'  ")->fetch_assoc()['Lb'];

                                $Cust_id = $conn->query("SELECT id as cid from `user` where id='$Cid'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');
                                if($L_bal < $Bal){
                                    $stats = "warning";
                                }else{
                                    $stats ="unwarning";
                                }
                                ?>                              
                                <td><?php echo $format_balance; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Limit_bal'], '2','.',','); ?></td>                            

                                <td><?php
                                if($stats=="warning"){
                                ?>
                                <span class="badge badge-danger">Warning</span>
                                   
                                    <?php } if($stats=="unwarning")  { ?>
                                        <span class="badge badge-success">UnWarning</span>
                                    <?php } 
                                ?>
                                </td>                            
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
			<?php } elseif(isset($_GET['warning'])){?>
			<!-- Customer All Limited BAl END -->


			<!-- Customer warning Start -->		
			<div class="card-box mb-30">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-1">
                            <p class="breadcrumb-item"><a href="Limit_bal.php">Back</a></p>
                        </div>
                        <div class="col-11">
                        <h2 class="text-blue h4">Total Customer Limit Balance</h2>
                        </div>
                    </div>                
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Company Name</th>
                                <th>Balance</th>
                                <th>Memo</th>                                
                                <th>Limited Balance </th>
                                <th>Status</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;                        
                                $query = mysqli_query($conn,"SELECT user.Name, user.Com_name, limit_customer_bal.id, limit_customer_bal.Admin_id, limit_customer_bal.Cid,limit_customer_bal.Limit_bal, limit_customer_bal.Memo FROM limit_customer_bal INNER JOIN user ON   limit_customer_bal.Cid=user.ID order by limit_customer_bal.id Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $Cid = $row['Cid'];
                                    ?>
                                <td><?php echo $i++; ?></td>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">                                        
                                        <div class="txt">
                                            <div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>							
                                <td><?php echo $row['Com_name']; ?></td>                              
            
                                <?php
                                $L_bal = $conn->query("SELECT Limit_bal as Lb from `limit_customer_bal` where id='$id'  ")->fetch_assoc()['Lb'];

                                $Cust_id = $conn->query("SELECT id as cid from `user` where id='$Cid'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');
                                if($L_bal < $Bal){
                                    $stats = "warning";
                                }else{
                                    $stats ="unwarning";
                                }
                                ?>                              
                                <td><?php echo $format_balance; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Limit_bal'], '2','.',','); ?></td>                            

                                <td><?php
                                if($stats=="warning"){
                                ?>
                                <span class="badge badge-danger">Warning</span>
                                   
                                    <?php } if($stats=="unwarning")  { ?>
                                        <span class="badge badge-success">UnWarning</span>
                                    <?php } 
                                ?>
                                </td>                            
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
			<?php } elseif(isset($_GET['unwarning'])){?>
			<!-- Customer warning END -->

			

			<!-- Customer unwarning   Start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-1">
                            <p class="breadcrumb-item"><a href="Limit_bal.php">Back</a></p>
                        </div>
                        <div class="col-11">
                        <h2 class="text-blue h4">Total Customer Limit Balance</h2>
                        </div>
                    </div>                
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Company Name</th>
                                <th>Balance</th>
                                <th>Memo</th>                                
                                <th>Limited Balance </th>
                                <th>Status</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;                        
                                $query = mysqli_query($conn,"SELECT user.Name, user.Com_name, limit_customer_bal.id, limit_customer_bal.Admin_id, limit_customer_bal.Cid,limit_customer_bal.Limit_bal, limit_customer_bal.Memo FROM limit_customer_bal INNER JOIN user ON   limit_customer_bal.Cid=user.ID order by limit_customer_bal.id Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $Cid = $row['Cid'];
                                    ?>
                                <td><?php echo $i++; ?></td>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">                                        
                                        <div class="txt">
                                            <div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>							
                                <td><?php echo $row['Com_name']; ?></td>                              
            
                                <?php
                                $L_bal = $conn->query("SELECT Limit_bal as Lb from `limit_customer_bal` where id='$id'  ")->fetch_assoc()['Lb'];

                                $Cust_id = $conn->query("SELECT id as cid from `user` where id='$Cid'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');
                                if($L_bal < $Bal){
                                    $stats = "warning";
                                }else{
                                    $stats ="unwarning";
                                }
                                ?>                              
                                <td><?php echo $format_balance; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Limit_bal'], '2','.',','); ?></td>                            

                                <td><?php
                                if($stats=="warning"){
                                ?>
                                <span class="badge badge-danger">Warning</span>
                                   
                                    <?php } if($stats=="unwarning")  { ?>
                                        <span class="badge badge-success">UnWarning</span>
                                    <?php } 
                                ?>
                                </td>                            
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
			<?php } else{?>
			<!-- Customer unwarning END -->

			


			<!-- Customer else Part Display All Limited Start -->
			<div class="card-box mb-30">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-1">
                            <p class="breadcrumb-item"><a href="Limit_bal.php">Back</a></p>
                        </div>
                        <div class="col-11">
                        <h2 class="text-blue h4">Total Customer Limit Balance</h2>
                        </div>
                    </div>                
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Company Name</th>
                                <th>Balance</th>
                                <th>Memo</th>                                
                                <th>Limited Balance </th>
                                <th>Status</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;                        
                                $query = mysqli_query($conn,"SELECT user.Name, user.Com_name, limit_customer_bal.id, limit_customer_bal.Admin_id, limit_customer_bal.Cid,limit_customer_bal.Limit_bal, limit_customer_bal.Memo FROM limit_customer_bal INNER JOIN user ON   limit_customer_bal.Cid=user.ID order by limit_customer_bal.id Desc") or die(mysqli_error());

                                while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $Cid = $row['Cid'];
                                    ?>
                                <td><?php echo $i++; ?></td>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">                                        
                                        <div class="txt">
                                            <div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>							
                                <td><?php echo $row['Com_name']; ?></td>                              
            
                                <?php
                                $L_bal = $conn->query("SELECT Limit_bal as Lb from `limit_customer_bal` where id='$id'  ")->fetch_assoc()['Lb'];

                                $Cust_id = $conn->query("SELECT id as cid from `user` where id='$Cid'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$Cust_id'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');
                                if($L_bal < $Bal){
                                    $stats = "warning";
                                }else{
                                    $stats ="unwarning";
                                }
                                ?>                              
                                <td><?php echo $format_balance; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo "$ ". number_format((float)$row['Limit_bal'], '2','.',','); ?></td>                            

                                <td><?php
                                if($stats=="warning"){
                                ?>
                                <span class="badge badge-danger">Warning</span>
                                   
                                    <?php } if($stats=="unwarning")  { ?>
                                        <span class="badge badge-success">UnWarning</span>
                                    <?php } 
                                ?>
                                </td>                            
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
            <?php }?>
			<!-- Customer else Part Display All Limited Start -->
			


			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php'); ?>
	
</body>
</html>