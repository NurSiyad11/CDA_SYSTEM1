<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php include('includes/Administrator_only.php');?>
<?php $get_id = $_GET['edit']; ?>

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
								<h4>User Information</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="user_info_individual.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">View User Information</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


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
                                    <th class="datatable-nosort">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                <tr>
                                    <?php
                                    $i=1;
                                    $teacher_query = mysqli_query($conn,"Select user.Name, user.Com_name, user.Picture, user.Role, user_info.id, user_info.Device, user_info.OS, user_info.Browser, user_info.Login_status, user_info.Login_time FROM user_info INNER JOIN user ON   user_info.UID=user.ID  where user_info.UID='$get_id' order by user_info.id Desc ") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($teacher_query)) {
                                    $id = $row['id'];
                                    
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
                                    <td><?php echo $row['Com_name']; ?></td>
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
                                                <a class="dropdown-item" href="view_user_info.php?edit=<?php echo $row['id'];?>"><i class="dw dw-eye"></i> View</a>
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


			</div>
		</div>
        <?php include('includes/footer.php')?>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>
</body>
</html>