<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>

<body>	
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
		
			<div class="row">
                <?php			
                    $query = mysqli_query($conn,"select Distinct UID from user_info ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);					 				
                ?>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">	
										<!--  <i class="icon-copy ion-disc" data-color="#17a2b8"></i> -->
										<button class="btn btn-primary" type="submit" name="All_users"> <i class="icon-copy dw dw-user2"></i> </button><span class="border-0"></span>
									</div>
								</form>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo  ($count); ?></div>
								<div class="weight-300 font-16">Visitors </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <?php					
                    $query = mysqli_query($conn,"Select distinct user.ID from user inner join user_info on user.ID=user_info.UID  where user.Role='Admin' or user.Role='administrator'   ")or die(mysqli_error());
                    $count = mysqli_num_rows($query);				
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center ">	
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Admins"> <i class="icon-copy dw dw-user2"></i> </i></button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-16">Admins</div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"Select distinct user.ID from user inner join user_info on user.ID=user_info.UID  where user.Role='Customer'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button  class="btn btn-primary"  type="submit" name="Customers"><i class="icon-copy dw dw-user2"></i></button>
									</div>
								</form>
                                
                            </div>
                        
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Customers</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <?php						
                        $query= mysqli_query($conn,"Select distinct user.ID from user inner join user_info on user.ID=user_info.UID  where user.Role='HOD'  ")or die(mysqli_error());
                        $count = mysqli_num_rows($query);					 
                    ?> 
                    <div class="card-box height-100-p widget-style1 bg-white">
                        <div class="d-flex flex-wrap align-items-center">	
                            <div class="progress-data">
								<form action="" method="GET">
									<div id="">									
										<button class="btn btn-primary" type="submit" name="Managers"> <i class="icon-copy dw dw-user2"></i> </button>
									</div>
								</form>
                            </div>						
                            <div class="widget-data">
                                <div class="h4 mb-0"><?php echo ($count); ?></div>
                                <div class="weight-300 font-17">Managers</div>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>


			<!-- All User Info  Start -->
			<?php 
			if(isset($_GET['All_users'])){
			?>
			<div class="card-box mb-30">				
				<div class="pd-20">
					<h2 class="text-blue h4"> User Info </h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
                                <th>No</th>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
								<th>Device</th>
                                <th>OS</th>
                                <th>Browser</th>
								 <th>Login Status</th>
								<th>Last Login Time</th>
								<th>POSITION</th>
								<!--<th>Status</th>						
								<th>Created By</th> -->
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>                            
							<tr>
								 <?php
                                 $i=1;
                                 
								// $UID = $conn->query("SELECT distinct UID as uid from `user_info`  ")->fetch_assoc()['uid'];
                               // $UID = mysqli_query($conn,"Select distinct UID from user_info  ") or die(mysqli_error());

		                      // $query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$UID'  order by user_info.id Desc ") or die(mysqli_error());
							  $query1 = mysqli_query($conn,"Select distinct UID from user_info ") or die(mysqli_error());   
							  while ($row1 = mysqli_fetch_array($query1)) {						
		                         $uid = $row1['UID'];

		                       $query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.UID, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$uid'  order by user_info.id Desc ") or die(mysqli_error());
							   $row = mysqli_fetch_array($query);
								 
								$time=time();
								$status='Offline';
								$class="btn-danger";
								if($row['Login_status']>$time){
										$status='Online';
										$class="btn-success";
								}
		                             ?>
								<td><?php echo $i++ ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Device']; ?></td>
	                            <td><?php echo $row['Device']; ?></td>
                                <td><?php echo $row['OS']; ?></td>
                                <td><?php echo $row['Browser']; ?></td>
							

								<td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
								<td><span style="Color: Blue"><?php echo $row['Login_time']; ?></span></td>


								<td><?php echo $row['Role']; ?></td>
                                
								<!-- <td><?php $stats=$row['Status'];
	                             if($stats=="Active"){
	                              ?>
                                    <span class="badge badge-success">Active</span>	                                
	                                  <?php } if($stats=="Inactive")  { ?>
                                       <span class="badge badge-danger">Inactive</span>
	                                  <?php } ?>	
								</td>								  -->
								
								<?php
									// $admin_ID = $row['Admin_id'];
									// $admin_Name = $conn->query("SELECT Name as name from `user` where ID='$admin_ID' ")->fetch_assoc()['name'];
								?>
								<!-- <td> <?php echo ($admin_Name);?></td> -->
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="view_user_info_Individual.php?edit=<?php echo $row['UID'];?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="generate_user_info.php?edit=<?php// echo $row['ID'];?>"><i class="dw dw-edit2"></i> Pdf</a> -->
											<!-- <a class="dropdown-item" href="Mng_user.php?delete=<?php //echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a> -->
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>

					<script>
						// function checkdelete(){
						// 	return confirm('Do you Want to Delete this User ? ');
						// }
					</script>

					<!-- Sceripts Online User Update  -->
					<script>
						function updateUserStatus(){
							jQuery.ajax({
								url:'../update_user_status.php',
								success:function(){
									
								}
							});
						}
						
						function getUserStatus(){
							jQuery.ajax({
								url:'../get_user_status.php',
								success:function(result){
									jQuery('#user_grid').html(result);
								}
							});
						}
						
						setInterval(function(){
							updateUserStatus();
						},1000);
						
						setInterval(function(){
							getUserStatus();
						},3000);
					</script>

			   	</div>	
			</div>  
			<?php } elseif(isset($_GET['Admins'])){?>
			<!-- All User Info  END -->


			<!-- Admin User Info  Start -->
			<div class="card-box mb-30">				
				<div class="pd-20">
					<h2 class="text-blue h4">Admins User Info </h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
                                <th>No</th>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
								<th>Device</th>
                                <th>OS</th>
                                <th>Browser</th>
								 <th>Login Status</th>
								<th>Last Login Time</th>
								<th>POSITION</th>
								<!--<th>Status</th>						
								<th>Created By</th> -->
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>                            
							<tr>
								<?php
                                $i=1;
                                 
								$query1 = mysqli_query($conn,"Select distinct UID from user_info INNER JOIN user ON   user_info.UID=user.ID  where user.Role='Admin' or user.Role='Administrator'  ") or die(mysqli_error());   
								while ($row1 = mysqli_fetch_array($query1)) {						
		                        $uid = $row1['UID'];

								$query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.UID, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$uid'  order by user_info.id Desc ") or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								 
								$time=time();
								$status='Offline';
								$class="btn-danger";
								if($row['Login_status']>$time){
										$status='Online';
										$class="btn-success";
								}
		                             ?>
								<td><?php echo $i++ ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Device']; ?></td>
	                            <td><?php echo $row['Device']; ?></td>
                                <td><?php echo $row['OS']; ?></td>
                                <td><?php echo $row['Browser']; ?></td>
							

								<td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
								<td><span style="Color: Blue"><?php echo $row['Login_time']; ?></span></td>


								<td><?php echo $row['Role']; ?></td>
                                
								<!-- <td><?php $stats=$row['Status'];
	                             if($stats=="Active"){
	                              ?>
                                    <span class="badge badge-success">Active</span>	                                
	                                  <?php } if($stats=="Inactive")  { ?>
                                       <span class="badge badge-danger">Inactive</span>
	                                  <?php } ?>	
								</td>								  -->
								
								<?php
									// $admin_ID = $row['Admin_id'];
									// $admin_Name = $conn->query("SELECT Name as name from `user` where ID='$admin_ID' ")->fetch_assoc()['name'];
								?>
								<!-- <td> <?php echo ($admin_Name);?></td> -->
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="view_user_info_Individual.php?edit=<?php echo $row['UID'];?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="generate_user_info.php?edit=<?php// echo $row['ID'];?>"><i class="dw dw-edit2"></i> Pdf</a> -->
											<!-- <a class="dropdown-item" href="Mng_user.php?delete=<?php //echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a> -->
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>

					<script>
						// function checkdelete(){
						// 	return confirm('Do you Want to Delete this User ? ');
						// }
					</script>

					<!-- Sceripts Online User Update  -->
					<script>
						function updateUserStatus(){
							jQuery.ajax({
								url:'../update_user_status.php',
								success:function(){
									
								}
							});
						}
						
						function getUserStatus(){
							jQuery.ajax({
								url:'../get_user_status.php',
								success:function(result){
									jQuery('#user_grid').html(result);
								}
							});
						}
						
						setInterval(function(){
							updateUserStatus();
						},1000);
						
						setInterval(function(){
							getUserStatus();
						},3000);
					</script>

			   	</div>	
			</div>  
			<?php } elseif(isset($_GET['Customers'])){?>
			<!-- Admin User Info  END -->
			

			<!-- Customer User Info  Start -->
			<div class="card-box mb-30">				
				<div class="pd-20">
					<h2 class="text-blue h4">Customer User Info </h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
                                <th>No</th>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
								<th>Device</th>
                                <th>OS</th>
                                <th>Browser</th>
								 <th>Login Status</th>
								<th>Last Login Time</th>
								<th>POSITION</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>                            
							<tr>
								<?php
                                $i=1;
                                 
								$query1 = mysqli_query($conn,"Select distinct UID from user_info INNER JOIN user ON   user_info.UID=user.ID  where user.Role='Customer'  ") or die(mysqli_error());   
								while ($row1 = mysqli_fetch_array($query1)) {						
		                        $uid = $row1['UID'];

								$query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.UID, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$uid'  order by user_info.id Desc ") or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								 
								$time=time();
								$status='Offline';
								$class="btn-danger";
								if($row['Login_status']>$time){
										$status='Online';
										$class="btn-success";
								}
		                             ?>
								<td><?php echo $i++ ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Device']; ?></td>
	                            <td><?php echo $row['Device']; ?></td>
                                <td><?php echo $row['OS']; ?></td>
                                <td><?php echo $row['Browser']; ?></td>
							

								<td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
								<td><span style="Color: Blue"><?php echo $row['Login_time']; ?></span></td>
								<td><?php echo $row['Role']; ?></td>								
							
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="view_user_info_Individual.php?edit=<?php echo $row['UID'];?>"><i class="dw dw-eye"></i> View</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>

					

					<!-- Sceripts Online User Update  -->
					<script>
						function updateUserStatus(){
							jQuery.ajax({
								url:'../update_user_status.php',
								success:function(){
									
								}
							});
						}
						
						function getUserStatus(){
							jQuery.ajax({
								url:'../get_user_status.php',
								success:function(result){
									jQuery('#user_grid').html(result);
								}
							});
						}
						
						setInterval(function(){
							updateUserStatus();
						},1000);
						
						setInterval(function(){
							getUserStatus();
						},3000);
					</script>

			   	</div>	
			</div>  
			<?php } elseif(isset($_GET['Managers'])){?>
			<!-- Admin User Info  END -->


			
			<!-- Manager User Info  Start -->
			<div class="card-box mb-30">				
				<div class="pd-20">
					<h2 class="text-blue h4">Manager User Info </h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
                                <th>No</th>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
								<th>Device</th>
                                <th>OS</th>
                                <th>Browser</th>
								 <th>Login Status</th>
								<th>Last Login Time</th>
								<th>POSITION</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>                            
							<tr>
								<?php
                                $i=1;
                                 
								$query1 = mysqli_query($conn,"Select distinct UID from user_info INNER JOIN user ON   user_info.UID=user.ID  where user.Role='HOD'  ") or die(mysqli_error());   
								while ($row1 = mysqli_fetch_array($query1)) {						
		                        $uid = $row1['UID'];

								$query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.UID, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$uid'  order by user_info.id Desc ") or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								 
								$time=time();
								$status='Offline';
								$class="btn-danger";
								if($row['Login_status']>$time){
										$status='Online';
										$class="btn-success";
								}
		                             ?>
								<td><?php echo $i++ ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Device']; ?></td>
	                            <td><?php echo $row['Device']; ?></td>
                                <td><?php echo $row['OS']; ?></td>
                                <td><?php echo $row['Browser']; ?></td>
							

								<td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
								<td><span style="Color: Blue"><?php echo $row['Login_time']; ?></span></td>
								<td><?php echo $row['Role']; ?></td>								
							
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="view_user_info_Individual.php?edit=<?php echo $row['UID'];?>"><i class="dw dw-eye"></i> View</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>

					

					<!-- Sceripts Online User Update  -->
					<script>
						function updateUserStatus(){
							jQuery.ajax({
								url:'../update_user_status.php',
								success:function(){
									
								}
							});
						}
						
						function getUserStatus(){
							jQuery.ajax({
								url:'../get_user_status.php',
								success:function(result){
									jQuery('#user_grid').html(result);
								}
							});
						}
						
						setInterval(function(){
							updateUserStatus();
						},1000);
						
						setInterval(function(){
							getUserStatus();
						},3000);
					</script>

			   	</div>	
			</div>  
			<?php } else{?>
			<!-- Manager User Info  END -->

			
			<!-- else part display All User Info  Start -->
			<div class="card-box mb-30">				
				<div class="pd-20">
					<h2 class="text-blue h4"> User Info </h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead >
							<tr>
                                <th>No</th>
								<th class="table-plus">FULL NAME</th>
								<th>Company Name</th>
								<th>Device</th>
                                <th>OS</th>
                                <th>Browser</th>
								 <th>Login Status</th>
								<th>Last Login Time</th>
								<th>POSITION</th>
								<!--<th>Status</th>						
								<th>Created By</th> -->
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>                            
							<tr>
								 <?php
                                 $i=1;
                                 
								// $UID = $conn->query("SELECT distinct UID as uid from `user_info`  ")->fetch_assoc()['uid'];
                               // $UID = mysqli_query($conn,"Select distinct UID from user_info  ") or die(mysqli_error());

		                      // $query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$UID'  order by user_info.id Desc ") or die(mysqli_error());
							  $query1 = mysqli_query($conn,"Select distinct UID from user_info ") or die(mysqli_error());   
							  while ($row1 = mysqli_fetch_array($query1)) {						
		                         $uid = $row1['UID'];

		                       $query = mysqli_query($conn,"Select   user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.UID, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID    where user_info.UID='$uid'  order by user_info.id Desc ") or die(mysqli_error());
							   $row = mysqli_fetch_array($query);
								 
								$time=time();
								$status='Offline';
								$class="btn-danger";
								if($row['Login_status']>$time){
										$status='Online';
										$class="btn-success";
								}
		                             ?>
								<td><?php echo $i++ ?></td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Name'] . " " ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Device']; ?></td>
	                            <td><?php echo $row['Device']; ?></td>
                                <td><?php echo $row['OS']; ?></td>
                                <td><?php echo $row['Browser']; ?></td>
							

								<td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
								<td><span style="Color: Blue"><?php echo $row['Login_time']; ?></span></td>


								<td><?php echo $row['Role']; ?></td>
                                
								<!-- <td><?php $stats=$row['Status'];
	                             if($stats=="Active"){
	                              ?>
                                    <span class="badge badge-success">Active</span>	                                
	                                  <?php } if($stats=="Inactive")  { ?>
                                       <span class="badge badge-danger">Inactive</span>
	                                  <?php } ?>	
								</td>								  -->
								
								<?php
									// $admin_ID = $row['Admin_id'];
									// $admin_Name = $conn->query("SELECT Name as name from `user` where ID='$admin_ID' ")->fetch_assoc()['name'];
								?>
								<!-- <td> <?php echo ($admin_Name);?></td> -->
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="view_user_info_Individual.php?edit=<?php echo $row['UID'];?>"><i class="dw dw-eye"></i> View</a>
											<!-- <a class="dropdown-item" href="generate_user_info.php?edit=<?php// echo $row['ID'];?>"><i class="dw dw-edit2"></i> Pdf</a> -->
											<!-- <a class="dropdown-item" href="Mng_user.php?delete=<?php //echo $row['id'] ?>" onclick= ' return checkdelete()' ><i class="dw dw-delete-3"></i> Delete</a> -->
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>

					<script>
						// function checkdelete(){
						// 	return confirm('Do you Want to Delete this User ? ');
						// }
					</script>

					<!-- Sceripts Online User Update  -->
					<script>
						function updateUserStatus(){
							jQuery.ajax({
								url:'../update_user_status.php',
								success:function(){
									
								}
							});
						}
						
						function getUserStatus(){
							jQuery.ajax({
								url:'../get_user_status.php',
								success:function(result){
									jQuery('#user_grid').html(result);
								}
							});
						}
						
						setInterval(function(){
							updateUserStatus();
						},1000);
						
						setInterval(function(){
							getUserStatus();
						},3000);
					</script>

			   	</div>	
			</div>  
			<?php } ?>
			<!-- else Part dispaly All User Info  END -->



		</div> 
	</div>
	<!-- js -->
    <?php  include('includes/scripts2.php'); ?>   

</body>
</html>