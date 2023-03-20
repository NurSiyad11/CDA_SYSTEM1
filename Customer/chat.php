<!DOCTYPE html>
<html>

<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
	if(isset($_POST['chat']))
	{
	$message=$_POST['message'];	

	$date = new DateTime();
	$date->modify('+2 hour');
	$date1 = $date->format("Y-m-d-D - h:i:s a");


	$uid = $conn->query("SELECT id as uid from `user` where id='$session_id'  ")->fetch_assoc()['uid'];


	mysqli_query($conn,"INSERT INTO support(Cid,Message,Time_user,Admin_id, Status) VALUES('$uid','$message','$date1', '2', 'Pending')         
	") or die(mysqli_error()); ?>
	<script>alert('message Send');</script>;
	<script>
	window.location = "chat.php"; 
	</script>
	<?php   
	}
?>

<body>	
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Chat</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Chat</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="bg-white border-radius-4 box-shadow mb-30">
					<div class="row no-gutters">
						<!-- <div class="col-lg-3 col-md-4 col-sm-12">
							<div class="chat-list bg-light-gray">
								<div class="chat-search">
									<span class="ti-search"></span>
									<input type="text" placeholder="Search Contact">
								</div>
								<div class="notification-list chat-notification-list customscroll">
								
								</div>
							</div>
						</div> -->
						
							<?php 
								$query = mysqli_query($conn,"SELECT user.Name,user.Picture, support.Message, support.Reply, support.Time_user, support.Time_admin  FROM support INNER JOIN user ON   support.Cid=user.id    where support.Cid='$session_id' and support.Status !='Hide'  order by support.Time_user Desc") or die(mysqli_error());
							?>
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<form action="" method="post" >
								<div class="chat-detail">
									<div class="chat-profile-header clearfix">
										<div class="left">
											<div class="clearfix">
												<div class="chat-profile-photo">
													<!-- <img src="vendors/images/profile-photo.jpg" alt=""> -->
													<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>"  alt="">

												</div>
												<div class="chat-profile-name">
													<h3><?php echo $row['Name'] ?></h3>
													<span><?php echo $row['Address'] ?></span>
												</div>
											</div>
										</div>									
									</div>

									
										<div class="chat-box">
											<div class="chat-footer">
												<!-- <div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div> -->
												<div class="chat_text_area ">
													<textarea  type="text" name="message" required autocomplete="off" placeholder="Type your message…."></textarea>
												</div>
												<div class="chat_send ">
													<button class="btn btn-link" type="submit" name="chat"><i class="icon-copy ion-paper-airplane"></i></button>
												</div>
											</div>
										
											<div class="chat-desc customscroll">											
											
												<ul>								
												<?php										
												while ($row = mysqli_fetch_array($query)) {										
													?>
													<li class="clearfix admin_chat">
														<span class="chat-img">
															<!-- <img src="../vendors/images/chat-img2.jpg" alt=""> -->
															<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>"  alt="">

														</span>
														<div class="chat-body clearfix">
															<p ><?php echo $row['Message'];?></p>
															<div class="chat_time"><?php echo $row['Time_user'];?></div>
														</div>
													</li>

												
													
													<?php 
														//$query = mysqli_query($conn,"SELECT user.Name,user.Picture, support.Text, support.Reply, support.Time_user, support.Time_admin  FROM support INNER JOIN user ON   support.UID=user.id    where support.UID='$session_id' and support.Status !='Hide'  order by support.Time_user Desc") or die(mysqli_error());
														$Aid = $conn->query("SELECT Admin_id as Aid from `support` where Cid='$session_id'  ")->fetch_assoc()['Aid'];
														// $Admin_id = $conn->query("SELECT * from `user` where ID='$Aid' ")->fetch_assoc()['Admin_id'];
														//  $query = mysqli_query($conn,"SELECT user.Name,user.Picture, support.Message, support.Reply, support.Time_user, support.Time_admin  FROM support INNER JOIN user ON   support.Cid=user.id    where support.Cid='$session_id' and support.Status !='Hide' and support.Admin_id='$Aid'  order by support.Time_user Desc") or die(mysqli_error());

													?>
													<li class="clearfix">
														<span class="chat-img">
															<img src="../uploads/NO-IMAGE-AVAILABLE.jpg" alt="">
															<!-- <img src="<?php //echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>"  alt=""> -->

														</span>
														<?php
														 $query1 = mysqli_query($conn,"SELECT user.Name,user.Picture, support.Message, support.Reply, support.Time_user, support.Time_admin  FROM support INNER JOIN user ON   support.Cid=user.id    where support.Cid='$session_id' and support.Status !='Hide'   order by support.Time_user Desc") or die(mysqli_error());

														?>
														<div class="chat-body clearfix">
															<p><?php echo $row['Reply'];?></p>
															<div class="chat_time"><?php echo $row['Time_admin'];?></div>
														</div>
													</li>																							
													<?php }?>													
												</ul>											
											</div>											
										</div>
									

								</div>
							
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php')?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>