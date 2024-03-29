<!-- Nav Bar Start -->
<?php include('includes/Admin_Administrator.php') ?>





<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<!-- <div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								 <div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div> 
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div> -->
		</div>

		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>

			<!-- Orders Notification -->
			<div class="user-notification">
				<?php
					$query_count = mysqli_query($conn,"select * from tbl_order where Status = 'Pending'  ")or die(mysqli_error());
					$count = mysqli_num_rows($query_count);					
				?>
				<div class="dropdown">					
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification "> 
						<?php 
						if($count > 0){
							?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " ><p class="ml-2  "> <?php echo ($count);?></p> <span class="visually-hidden"></span></span>
							<?php } ?>
						</i>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
					<h5><?php echo "Orders: ". ($count); ?></h5>
						<div class="notification-list mx-h-350 customscroll">				 
							<ul>
							<?php 								
								$sql = "SELECT user.Name, user.Com_name, user.Picture, tbl_order.id, tbl_order.Date,tbl_order.Reason, tbl_order.File,tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.Status ='Pending' order by tbl_order.id desc";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
								 ?> 
								<li>
									<a href="All_order.php?Pending_order=">
										<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										<h3><?php echo $row['Name'];?></h3>
										<p><?php echo $row['Com_name'];?></p>
										<p><?php echo $row['Date'];?></p>
										<p><?php echo $row['Reason'];?></p>
									</a>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>

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




			

			<!-- Support Notification -->
			<div class="user-notification">
				<?php 							
				$query_count = mysqli_query($conn,"select * from support where Status = 'Pending' ")or die(mysqli_error());
				$count = mysqli_num_rows($query_count);						
					?>
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-message"></i>
						<?php 
						if($count > 0){
							?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " ><p class="ml-2 "> <?php echo ($count);?></p> <span class="visually-hidden"></span></span>
							<?php } ?>			
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<h5><?php echo "Supported: ". ($count); ?></h5>
						<div class="notification-list mx-h-350 customscroll">				
							<ul>
								<?php 
								$sql = "SELECT user.Name, user.Com_name, user.Picture, support.id, support.Message FROM support INNER JOIN user ON   support.Cid=user.ID where support.Status ='Pending' order by support.Time_user desc";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
								 ?> 
								<li>
								<a href="All_Support.php?Pending=">
									<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										<h3><?php echo $row['Name'];?></h3>										
										<p><?php echo $row['Com_name'];?></p>
										<p><?php echo $row['Message'];?></p>
									</a>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			
			<?php $query= mysqli_query($conn,"select * from user where ID = '$session_id'")or die(mysqli_error());
					$row = mysqli_fetch_array($query);
			?>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="">
						</span>
						<span class="user-name"><?php echo $row['Name']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="my_profile.php"><i class="dw dw-user1"></i> Profile</a>
						<?php
							$admin_role = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
						if($admin_role == 'Administrator'){
						?>
						<a class="dropdown-item" href="setting.php"><i class="dw dw-settings2"></i> Setting</a>
						<?php } ?>

						<a class="dropdown-item" href="faq.php"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="../logout.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			<!-- <div class="github-link">
				<a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
			</div> -->
		</div>
	</div>
	<!-- Nav Ber End -->

	

		