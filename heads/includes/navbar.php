<!-- Nav Bar Start -->
<?php	
$sts = $conn->query("SELECT Status as sts from `user` where ID='$session_id'  ")->fetch_assoc()['sts'];
$role = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];

if($sts != 'Active'){
	unset($_SESSION['alogin']);
	session_destroy(); // destroy session
	header("location: ../index.php"); 
}
if($role != 'HOD'){
	unset($_SESSION['alogin']);
	session_destroy(); // destroy session
	header("location: ../index.php"); 
}

?>


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

			<div class="user-notification">
				<?php
					$query_count = mysqli_query($conn,"select * from receipt where Status = 'Pending' ")or die(mysqli_error());
					$count = mysqli_num_rows($query_count);						
					
				?>
				<div class="dropdown">
					
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification "> 
						<?php 
						if($count > 0){
							?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " ><p class="ml-2 text-light"> <?php echo ($count);?></p> <span class="visually-hidden"></span></span>
							<?php } ?>

						</i>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<h5><?php echo "Orders: ". ($count); ?></h5>
						<div class="notification-list mx-h-350 customscroll">				
			
							<ul>
							<?php 
								//$status="Pending Order";
								$sql = "SELECT user.Name, user.Com_name, user.Picture, receipt.id, receipt.RV, receipt.Date,receipt.Memo, receipt.Amount, receipt.Status FROM receipt INNER JOIN user ON   receipt.Cid=user.id where receipt.Status ='Pending' order by receipt.Date desc";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {

								 ?> 
								<li>
									<a href="New_Receipt.php">
										
										<!-- <img src="../vendors/images/img.jpg" alt=""> -->
										<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										<h3><?php echo $row['Com_name'];?></h3>
										<p ><?php echo $row['Name'];?></p>										
										<p><?php echo "RV# " . $row['RV'];?></p>
										<td ><?php echo "Amount: $ ". number_format((float)htmlentities($row['Amount']), '2','.',','); ?></td>
										<p><?php echo $row['Date'];?></p>
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
						<a class="dropdown-item" href="setting.php"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
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
