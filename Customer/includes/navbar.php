<?php	
$sts = $conn->query("SELECT Status as sts from `user` where ID='$session_id'  ")->fetch_assoc()['sts'];
$role = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];

if($sts != 'Active'){
	unset($_SESSION['alogin']);
	session_destroy(); // destroy session
	header("location: ../index.php"); 
}
if($role != 'Customer'){
	unset($_SESSION['alogin']);
	session_destroy(); // destroy session
	header("location: ../index.php"); 
}

?>

<!-- Nav Bar Start -->
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


			<!-- Xussusin Notifiication  -->
			<div class="user-notification">
				<?php
					$query_count = mysqli_query($conn,"select * from debt_reminder where Status = 'Show' AND Cid='$session_id' ")or die(mysqli_error());
					$count = mysqli_num_rows($query_count);						
					
				?>
				<div class="dropdown">					
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification "> 
						<?php 
						if($count > 0){
							?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " ><p class="ml-2 "> <?php echo ($count);?></p> <span class="visually-hidden"></span></span>
							<?php } ?>

						</i>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<?php 					
						if($count > 0){
							?>
							<h5><?php echo "Xasuusin: ". ($count); ?></h5>
							<?php }else{
								echo "Wax Xusuusin Ah Majiraan Mahadsanid.";
							} ?>
						<div class="notification-list mx-h-350 customscroll">
							
							<ul>
							<?php 
								//$status="Pending Order";
								$sql = "SELECT user.Name, user.Com_name, user.Picture, debt_reminder.id, debt_reminder.Date, debt_reminder.Message, debt_reminder.Memo,debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id where debt_reminder.Status ='Show' AND Cid='$session_id' order by debt_reminder.Date desc";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
								 ?> 
								<li>
									<a href="#">		
										<img src="../vendors/images/img/xasusin.png" class="border-radius-100 shadow" width="50" height="50" alt="">
								
										<!-- <img src="../vendors/images/img.jpg" alt=""> -->
										<!-- <img src="<?php //echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt=""> -->
										<h3>Title : Fariin</h3>
										<p><?php  echo "Date : ". $row['Date'];?></p>
										<p><?php echo $row['Message'];?></p>
										
										
									</a>
								</li>
								<?php }?>								
							</ul>
						</div>
					</div>
				</div>
			</div>


			<!-- Replied Notification  -->
			<div class="user-notification">
				<?php
					$query_count = mysqli_query($conn,"select * from support where Reply != '' AND Status = 'Show' AND Cid='$session_id' ")or die(mysqli_error());
					$count = mysqli_num_rows($query_count);						
					
				?>
				<div class="dropdown">					
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-support-1 "> 
						<?php 
						if($count > 0){
							?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " ><p class="ml-2  "> <?php echo ($count);?></p> <span class="visually-hidden"></span></span>
							<?php } ?>

						</i>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<?php 					
						if($count > 0){
							?>
							<h5><?php echo "Replied: ". ($count); ?></h5>
							<?php }else{
								echo "Wax Reply Ah Majiraan Mahadsanid.";
							} ?>
						<div class="notification-list mx-h-350 customscroll">
							
							<ul>
							<?php 
								//$status="Pending Order";
								// $sql = "SELECT user.Name, user.Com_name, user.Picture, debt_reminder.id, debt_reminder.Date, debt_reminder.Message, debt_reminder.Memo,debt_reminder.Status FROM debt_reminder INNER JOIN user ON   debt_reminder.Cid=user.id where debt_reminder.Status ='Show' AND Cid='$session_id' order by debt_reminder.Date desc";
								$sql = "SELECT * FROM support where Reply != '' AND Status ='Show' AND Cid='$session_id' order by Time_admin desc";	
								$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
								 ?> 
								<li>
									<a href="#">		
										<img src="../vendors/images/img/Support.png" class="border-radius-100 shadow" width="50" height="50" alt="">
								
										<!-- <h3>Title : Replied</h3> -->
										
										<h3><?php  echo "Title  : ". $row['Title'];?></h3>
										<p><?php  echo "Time  : ". $row['Time_admin'];?></p>
										
										<p><?php echo "Replied : ". $row['Reply'];?></p>
										
										
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
							<!-- <img src="vendors/images/photo1.jpg" alt=""> -->
							<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="">
						</span>
						<span class="user-name"><?php echo $row['Name']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="Profile.php"><i class="dw dw-user1"></i> Profile</a>
						<!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a> -->
						<a class="dropdown-item" href="faq.php"><i class="icon-copy ion-help-circled"></i> Help</a>
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

