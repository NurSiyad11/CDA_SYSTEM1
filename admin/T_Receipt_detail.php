<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<?php
if (isset($_GET['delete'])) {
	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM receipt where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
        ?>
        <script>
        window.addEventListener('load',function(){
            swal.fire({
                title: "Success",
                text: "Record deleted Successfully ",
                icon: "success",
                button: "Ok Done!",			
            })
            .then(function() {
                    window.location = "T_Receipt_detail.php";
                });
            });
        </script>
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
			
        		
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Customer Receipts</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Receipts</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary " href="T_invoice_detail.php" role="button" >
                               View Invoice Details
                            </a>                        
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from receipt")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn btn-primary" type="submit" name="All_receipt"> <i class="icon-copy dw dw-invoice-1"></i> </button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-16">Total Receipt</div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from receipt where  Status = 'Pending'  ")or die(mysqli_error());
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

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from receipt where Status = 'Rejected'  ")or die(mysqli_error());
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

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from receipt where  Status = 'Approved'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Approved"> <i class="icon-copy ion-checkmark"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Approved</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>


       			
			
			<!-- Customer All Receipts Start -->
			<?php 
			if(isset($_GET['All_receipt'])){
			?>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">All Customer Receipts</h2>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Receipt No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Recorded By</th>						
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                $teacher_query = mysqli_query($conn,"SELECT user.Name,  user.Com_name,  receipt.id, receipt.Admin_id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID order by receipt.Date Desc") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['id'];
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
                                
                                <td><?php echo "RV# ". $row['RV']; ?></td>
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
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
                                            <a class="dropdown-item" href="T_Receipt_detail.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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
			<!-- Customer All Receipts END -->


			<!-- Customer Pending Receipts Start -->		
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Pending Receipts</h2>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Receipt No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Recorded By</th>						
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                $teacher_query = mysqli_query($conn,"SELECT user.Name,  user.Com_name,  receipt.id, receipt.Admin_id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.Status='Pending' order by receipt.Date Desc") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['id'];
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
                                
                                <td><?php echo "RV# ". $row['RV']; ?></td>
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
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
                                            <a class="dropdown-item" href="T_Receipt_detail.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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
			<!-- Customer Pending Receipts END -->

			

			<!-- Customer Rejected Receipts Start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Rejected  Receipts</h2>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Receipt No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Recorded By</th>						
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                $teacher_query = mysqli_query($conn,"SELECT user.Name,  user.Com_name,  receipt.id, receipt.Admin_id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID where receipt.Status='Rejected' order by receipt.Date Desc") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['id'];
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
                                
                                <td><?php echo "RV# ". $row['RV']; ?></td>
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
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
                                            <a class="dropdown-item" href="T_Receipt_detail.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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
			<!-- Customer Rejected Receipts END -->

			

			<!-- Customer Approved Receipts Start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">Approved Receipts</h2>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Receipt No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Recorded By</th>						
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                $teacher_query = mysqli_query($conn,"SELECT user.Name,  user.Com_name,  receipt.id, receipt.Admin_id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID  where receipt.Status='Approved' order by receipt.Date Desc") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['id'];
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
                                
                                <td><?php echo "RV# ". $row['RV']; ?></td>
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
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
                                            <a class="dropdown-item" href="T_Receipt_detail.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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


			<!-- Customer else Part Display All Invoice Start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h2 class="text-blue h4">All Customer Receipts</h2>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Customer Name</th>								
                                <th>Receipt No#</th>
                                <th>Date </th>
                                <th>Memo</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Recorded By</th>						
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i =1;
                                $teacher_query = mysqli_query($conn,"SELECT user.Name,  user.Com_name,  receipt.id, receipt.Admin_id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID order by receipt.Date Desc") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['id'];
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
                                
                                <td><?php echo "RV# ". $row['RV']; ?></td>
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
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_receipt.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
                                            <a class="dropdown-item" name="update-receipt" href="../admin/A5pdf2.php?edit=<?php echo $row['id'];?>"><i class="dw dw-eye"></i> View PDF</a>

                                            <a class="dropdown-item" href="T_Receipt_detail.php?delete=<?php echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a>
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
			


			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php'); ?>
	
</body>
</html>