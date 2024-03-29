<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">					
			<?php
			$Role = $conn->query("SELECT Role as role from `user` where ID='$session_id'  ")->fetch_assoc()['role'];
							
			if($Role =='Administrator'){		
			?>
			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from support")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn  btn-primary" type="submit" name="All_support"> <i class="icon-copy dw dw-support-1"></i></button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-18">Total Support </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from support where  Status = 'Pending'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending"><i class="icon-copy dw dw-balance"></i></i></button>
									</div>
								</form>
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
                        $query= mysqli_query($conn,"select  id from support where Reply != ''  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);				 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Replied"> <i class="icon-copy dw dw-file-134"></i></button>
									</div>
								</form>                             
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Replied </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from support where Status = 'Show'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Show"><i class="icon-copy dw dw-eye"></i></button>
									</div>
								</form>                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Show</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from support where  Status = 'Hide'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-danger" type="submit" name="Hide"><i class="icon-copy dw dw-hide"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Hide</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>



			<!-- Customer All Support Start -->
			<?php 
			if(isset($_GET['All_support'])){
			?>
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>
								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                      
								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Pending'])){?>
			<!-- Customer All Support END -->

			<!-- Customer Pending Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id  where support.Status='Pending' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>
								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>
								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <!-- <span style="color: red">Hide</span> -->
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>	
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Replied'])){?>
			<!-- Customer Pending Support END -->

			<!-- Customer Replied Support Start -->			
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Replied Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th> Recorded By</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Admin_id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id  where support.Reply !='' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>									
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <!-- <span style="color: red">Hide</span> -->
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>   
								<?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, support.id FROM support INNER JOIN user ON   support.Admin_id=user.ID  where support.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
								<td><?php echo $row_admin['Name']; ?></td>	               
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Show'])){?>
			<!-- Customer Replied Support END -->

			<!-- Customer Show Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Show Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th> Recorded By</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture,  support.id, support.Admin_id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id where support.Status ='Show' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>
								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              
								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <!-- <span style="color: red">Hide</span> -->
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>  
								<?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, support.id FROM support INNER JOIN user ON   support.Admin_id=user.ID  where support.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
								<td><?php echo $row_admin['Name']; ?></td>	             
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>			
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Hide'])){?>
			<!-- Customer Show Support END -->


			<!-- Customer Hide Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Hide Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th> Recorded By</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Admin_id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id where support.Status ='Hide' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>
								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>					
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              
								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <!-- <span style="color: red">Hide</span> -->
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>     

								<?php
                                $admins = $row['Admin_id'];
                                $query_admin_record = mysqli_query($conn,"SELECT user.Name, support.id FROM support INNER JOIN user ON   support.Admin_id=user.ID  where support.Admin_id='$admins' ") or die(mysqli_error());
                                $row_admin = mysqli_fetch_array($query_admin_record);
                                ?>
								<td><?php echo $row_admin['Name']; ?></td>	

								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } else{?>
			<!-- Customer All Support END -->
			

			<!-- Customer Else Part Displayed Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">All Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>
								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <!-- <span style="color: red">Hide</span> -->
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php }?>
			<!-- Customer Else Pars Displayed Support END -->
			








			<!-- Admins Part  -->
			<?php
				}
				else{
				?>
			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select * from Support")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
           
                <div class="col-xl-3 mb-30">
                    <?php							
                    $query = mysqli_query($conn,"select  Status from support where  Status = 'Pending'  ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Pending"><i class="icon-copy dw dw-balance"></i></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-18">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from support where Reply != ''  AND Admin_id='$session_id'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);				 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Replied"> <i class="icon-copy dw dw-file-134"></i></button>
									</div>
								</form>
                             
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Replied </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  Status from support where Status = 'Show'  AND Admin_id='$session_id'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-success" type="submit" name="Show"><i class="icon-copy dw dw-eye"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Show</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"select  id from support where  Status = 'Hide' AND Admin_id='$session_id' ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-dat">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-danger" type="submit" name="Hide"><i class="icon-copy dw dw-hide"></i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Hide</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>


			
			<!-- Customer Pending Support Start -->
			<?php if(isset($_GET['Pending'])){?>
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id  where support.Status='Pending' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Replied'])){?>
			<!-- Customer Pending Support END -->

			<!-- Customer Replied Support Start -->			
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Replied Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id  where support.Reply !='' AND support.Admin_id='$session_id' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Show'])){?>
			<!-- Customer Replied Support END -->

			<!-- Customer Show Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Show Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id where support.Status ='Show' AND support.Admin_id='$session_id' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } elseif(isset($_GET['Hide'])){?>
			<!-- Customer Show Support END -->


			<!-- Customer Hide Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Hide Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id where support.Status ='Hide' AND support.Admin_id='$session_id' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php } else{?>
			<!-- Customer All Support END -->
			

			<!-- Customer Else Part Displayed Support Start -->
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Pending Support</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
								<th>NO#</th>
								<th class="table-plus">Customer Name</th>	
								<th class="table-plus">Company Name</th>								
								<th>Time  </th>
								<th>Status</th> 
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								 $i =1;
		                         $teacher_query = mysqli_query($conn,"SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message, support.Time_user, support.Reply, support.Status  FROM support INNER JOIN user ON   support.Cid=user.id  where support.Status='Pending' order by support.Time_user Desc") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['id'];
		                             ?>

								<td><?php echo $i++; ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">											
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name']; ?></div>
										</div>
									</div>
								</td>						
								
	                            <td><?php echo $row['Com_name']; ?></td>							
								<td><?php echo $row['Time_user']; ?></td>                              

								<td><?php $stats=$row['Status'];
	                             if($stats=="Hide"){
	                              ?>
								  	<span class="badge badge-danger">Hide</span>
	                                  <?php } if($stats=="Show")  { ?>
									<span class="badge badge-success">Show</span>	                                
	                                  <?php } if($stats=="Pending")  { ?>
									<span class="badge badge-primary">Pending</span>
	                                  <?php } 
	                             ?>    
								</td>                  
									
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit_support.php?edit=<?php echo $row['id'];?>"><i class="dw dw-edit2"></i> View</a>
											
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>
			<?php }?>
			<!-- Customer Else Pars Displayed Support END -->
			<?php	}	?>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	
	<!-- js -->
	<?php include('includes/scripts2.php'); ?>



</body>
</html>