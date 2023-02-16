<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<?php
if (isset($_GET['delete'])) {

	
	$delete = $_GET['delete'];
	$sql = "DELETE FROM tbl_order where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Oder deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'Testing.php'; </script>";
		
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
                    $query = mysqli_query($conn,"select * from tbl_order")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="">
                                <img src="../vendors/images/img/order1.png" class="border-radius-100 shadow" width="50" height="50" alt="">
                                </div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
                                <div class="weight-300 font-18">Total Applied Orderd </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from tbl_order where  Status = 'Pending'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-dat">
                                <div id="">
                                <img src="../vendors/images/img/Pending1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
                                </div>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-18">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Preparing'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);				 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
                                <div id="">
                                <img src="../vendors/images/img/preparing2.png" class="border-radius-100 shadow" width="30" height="30" alt="">
                                </div>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Preparing</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where Status = 'Reject'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
                                <div id="">
                                <img src="../vendors/images/img/Rejected1.png" class="border-radius-100 shadow" width="30" height="30" alt="">
                                </div>
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Rejected</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from tbl_order where  Status = 'Approved'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
                                <div id="">
                                <img src="../vendors/images/img/Approved.png" class="border-radius-100 shadow" width="30" height="30" alt="">
                                </div>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Approved</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>
        
        


            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                <div class="pd-20 card-box">
                    <h5 class="h4 text-blue mb-20">All Orders Info</h5>
                    <div class="tab">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home2" role="tab" aria-selected="true">All Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">Pending Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact2" role="tab" aria-selected="false">Preparing orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Reject2" role="tab" aria-selected="false">Rejected orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Approved2" role="tab" aria-selected="false">Approved orders</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home2" role="tabpanel">
                                <div class=" mt-4 pb-20">
                                    <table class="data-table table stripe hover nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO#</th>
                                                <th class="table-plus datatable-nosort">Customer Name</th>                                            
                                                <th>DATE Ordered</th>
                                                <th>Reg Date Ordered</th>
                                                <th> Status</th>
                                                <th class="datatable-nosort">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                $i =1;
                                                $sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id ORDER BY tbl_order.id desc  ";
                                                    $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>  
                                                <td ><?php echo $i++; ?></td>
                                                <td class="table-plus">
                                                    <div class="name-avatar d-flex align-items-center">
                                                        <div class="avatar mr-2 flex-shrink-0">
                                                            <img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
                                                        </div>
                                                        <div class="txt">
                                                            <div class="weight-600"><?php echo $row['Name'];?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php echo $row['RegDate']; ?></td>

                                                <td><?php $stats=$row['Status'];
                                                if($stats=="Pending"){
                                                ?>
                                                    <span class="badge badge-primary">Pending</span>		                                 
                                                    <?php } if($stats=="Preparing")  { ?>
                                                        <span class="badge badge-secondary">Preparing</span>	
                                                    <?php } if($stats=="Approved")  { ?>
                                                <span class="badge badge-success">Approved</span>	
                                                    <?php } if($stats=="Reject")  { ?>
                                                        <span class="badge badge-danger">Rejected</span>	
                                                <?php } ?>

                                                </td>

                                            

                                                
                                                <!-- <td><?php //echo $row['File']; ?></td>				 -->

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
                                                            <a class="dropdown-item" href="All_order.php?edit=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Edit</a>
                                                            </a>
                                                            <a class="dropdown-item" href="All_order.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
                                                            
                                                            
                                                            
                                                        </div>
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

                            <!-- Pending Order Tab Start -->
                            <div class="tab-pane fade" id="profile2" role="tabpanel">                                
                                    <div class="mt-4 pb-20">
                                    <table class="data-table table stripe hover nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO#</th>
                                                <th class="table-plus datatable-nosort">Customer Name</th>                                            
                                                <th>DATE Ordered</th>
                                                <th>Reg Date Ordered</th>
                                                <th> Status</th>
                                                <th class="datatable-nosort">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                $i =1;
                                                $sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Pending' ORDER BY tbl_order.id desc  ";
                                                    $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>  
                                                <td ><?php echo $i++; ?></td>
                                                <td class="table-plus">
                                                    <div class="name-avatar d-flex align-items-center">
                                                        <div class="avatar mr-2 flex-shrink-0">
                                                            <img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
                                                        </div>
                                                        <div class="txt">
                                                            <div class="weight-600"><?php echo $row['Name'];?></div>
                                                        </div>
                                                    </div>
                                                </td>                                         
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php echo $row['RegDate']; ?></td>

                                                <td><?php $stats=$row['Status'];
                                                if($stats=="Pending"){
                                                ?>
                                                    <span class="badge badge-primary">Pending</span>		                                 
                                                    <?php } if($stats=="Preparing")  { ?>
                                                        <span class="badge badge-secondary">Preparing</span>	
                                                    <?php } if($stats=="Approved")  { ?>
                                                <span class="badge badge-success">Approved</span>	
                                                    <?php } if($stats=="Reject")  { ?>
                                                        <span class="badge badge-danger">Rejected</span>	
                                                <?php } ?>
                                                

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
                                                            <a class="dropdown-item" href="All_order.php?edit=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Edit</a>
                                                            </a>
                                                            <a class="dropdown-item" href="All_order.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
                                                            
                                                            
                                                            
                                                        </div>
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

                            <!-- Preparing Order Tab Start -->
                            <div class="tab-pane fade" id="contact2" role="tabpanel">                            
                                <div class="mt-4 pb-20">
                                    <table class="data-table table stripe hover nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO#</th>
                                                <th class="table-plus datatable-nosort">Customer Name</th>                                            
                                                <th>DATE Ordered</th>
                                                <th>Reg Date Ordered</th>
                                                <th> Status</th>
                                                <th class="datatable-nosort">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                $i =1;
                                                $sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Preparing' ORDER BY tbl_order.id desc  ";
                                                    $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>  
                                                <td ><?php echo $i++; ?></td>
                                                <td class="table-plus">
                                                    <div class="name-avatar d-flex align-items-center">
                                                        <div class="avatar mr-2 flex-shrink-0">
                                                            <img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
                                                        </div>
                                                        <div class="txt">
                                                            <div class="weight-600"><?php echo $row['Name'];?></div>
                                                        </div>
                                                    </div>
                                                </td>                                         
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php echo $row['RegDate']; ?></td>

                                                <td><?php $stats=$row['Status'];
                                                if($stats=="Pending"){
                                                ?>
                                                    <span class="badge badge-primary">Pending</span>		                                 
                                                    <?php } if($stats=="Preparing")  { ?>
                                                        <span class="badge badge-secondary">Preparing</span>	
                                                    <?php } if($stats=="Approved")  { ?>
                                                <span class="badge badge-success">Approved</span>	
                                                    <?php } if($stats=="Reject")  { ?>
                                                        <span class="badge badge-danger">Rejected</span>	
                                                <?php } ?>
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
                                                            <a class="dropdown-item" href="All_order.php?edit=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Edit</a>
                                                            </a>
                                                            <a class="dropdown-item" href="All_order.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
                                                            
                                                            
                                                            
                                                        </div>
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

                            <!-- Reject Order Tab Start -->
                            <div class="tab-pane fade" id="Reject2" role="tabpanel">
                                <div class="mt-4 pb-20">
                                    <table class="data-table table stripe hover nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO#</th>
                                                <th class="table-plus datatable-nosort">Customer Name</th>                                            
                                                <th>DATE Ordered</th>
                                                <th>Reg Date Ordered</th>
                                                <th> Status</th>
                                                <th class="datatable-nosort">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                $i =1;
                                                $sql = "SELECT user.Name, user.Picture, tbl_order.id, tbl_order.RegDate, tbl_order.Date,tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status='Reject' ORDER BY tbl_order.id desc  ";
                                                    $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>  
                                                <td ><?php echo $i++; ?></td>
                                                <td class="table-plus">
                                                    <div class="name-avatar d-flex align-items-center">
                                                        <div class="avatar mr-2 flex-shrink-0">
                                                            <img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
                                                        </div>
                                                        <div class="txt">
                                                            <div class="weight-600"><?php echo $row['Name'];?></div>
                                                        </div>
                                                    </div>
                                                </td>                                         
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php echo $row['RegDate']; ?></td>

                                                <td><?php $stats=$row['Status'];
                                                if($stats=="Pending"){
                                                ?>
                                                    <span class="badge badge-primary">Pending</span>		                                 
                                                    <?php } if($stats=="Preparing")  { ?>
                                                        <span class="badge badge-secondary">Preparing</span>	
                                                    <?php } if($stats=="Approved")  { ?>
                                                <span class="badge badge-success">Approved</span>	
                                                    <?php } if($stats=="Reject")  { ?>
                                                        <span class="badge badge-danger">Rejected</span>	
                                                <?php } ?>
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="edit_order.php?edit=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> Edit</a>
                                                            <a class="dropdown-item" href="All_order.php?edit=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"><i class="dw dw-eye"></i> Edit</a>
                                                            </a>
                                                            <a class="dropdown-item" href="All_order.php?delete=<?php echo $row['id']; ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"  ></i> Delete</a>
                                                            
                                                            
                                                            
                                                        </div>
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

                            <!-- Approved Order Tab Start -->
                            <div class="tab-pane fade" id="Approved2" role="tabpanel">
                                    <div class="mt-4 pb-20">
                                    jhdzfgjhdfffknvnx jkdxhjkd jknd jkhd jkh           jhdzfgjhdfffknvnx jkdxhjkd jknd jkhd jkh         jhdzfgjhdfffknvnx jkdxhjkd jknd jkhd jkh         jhdzfgjhdfffknvnx jkdxhjkd jknd jkhd jkh         jhdzfgjhdfffknvnx jkdxhjkd jknd jkhd jkh         jhdzfgjhdfffknvnx jkdxhjkd jknd jkhd jkh                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>














            <!-- Large modal -->
            <div class="col-md-4 col-sm-12 mb-30">
                <!-- <div class="pd-20 card-box height-100-p"> -->
                    <!-- <h5 class="h4">Large modal</h5>
                    <a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
                        <img src="vendors/images/modal-img1.jpg" alt="modal">
                    </a> -->
                    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                <div class="wizard-content">
                        <form method="post" action="">
                            <section>
                                <?php
                                    $query = mysqli_query($conn,"SELECT user.Name,user.Email, user.Picture, tbl_order.id, tbl_order.Date, tbl_order.Reason, tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.id='$get_id'")or die(mysqli_error());
                                    $row = mysqli_fetch_array($query);
                                ?>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label >Name :</label>
                                            <input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
                                        </div>
                                    </div>							

                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Email Address :</label>
                                            <input name="email" type="email" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Email']; ?>">
                                        </div>
                                    </div>
                                
                                </div>


                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label >Date Ordered :</label>
                                            <input name="date" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Date']; ?>">
                                        </div>
                                    </div>							

                                    <div class="col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label>Resson :</label>
                                            <input name="Resson" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Reason']; ?>">
                                        </div>
                                    </div>								
                                </div>

                                <div class="row">									
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Status :</label>
                                            <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                                                <option value="Preparing">Preparing Order</option>												
                                                <option value="Approved Order">Approved Order</option>
                                                <option value="Reject Order">Reject Order</option>
                                            </select>
                                        </div>
                                    </div>									
                                </div>					
                                
                                <div class="row">											
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label style="font-size:16px;"><b></b></label>
                                            <div class="modal-footer justify-content-center">
                                                <button class="btn btn-primary" name="order" id="order" data-toggle="modal">Apply&nbsp;Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <?php                                    
                                    $sql="SELECT file from tbl_order where id='$get_id' ";
                                    $query=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($query)) {
                                        ?>
                                        <?php
                                        if($info !=''){
                                            ?>                                       
                                            <embed type="application/pdf" src="../Customer/pdf/<?php echo $info['file'] ; ?>" width="900" height="500">
                                        <?php
                                        }else{
                                            echo "No file found";                                     
                                        ?>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>







            <?php include('includes/footer.php'); ?>
        </div>       
    </div>
	
    <?php include('includes/scripts2.php'); ?>


</body>
</html>