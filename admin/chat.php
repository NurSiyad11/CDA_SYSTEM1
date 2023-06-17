<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


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
								<h4>Chat</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Chat</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="bg-white border-radius-4 box-shadow mb-30">
					<div class="row no-gutters">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="chat-list bg-light-gray">
								<div class="chat-search">
									<span class="ti-search"></span>
									<input type="text" placeholder="Search Contact">
								</div>
								<div class="notification-list chat-notification-list customscroll">
									<?php 
										$query = mysqli_query($conn,"SELECT DISTINCT user.Name,user.Picture, support.Message, support.Reply, support.Time_user, support.Time_admin  FROM support INNER JOIN user ON   support.Cid=user.id      order by support.Time_user Desc") or die(mysqli_error());

										// $query = mysqli_query($conn,"SELECT * FROM  user where Role='Customer' ") or die(mysqli_error());

										while ($row = mysqli_fetch_array($query)) {
									?>
						
									<ul>
										<li>
											<a href="#">
												<form action="" method="GET">
													<!-- <img src="vendors/images/img.jpg" alt=""> -->
													<img src="<?php echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>"  alt="">

													<h3 class="clearfix"><?php echo $row['Name'] ?></h3>
													<p><i class="fa fa-circle text-light-green"></i> online</p>
												</form>
											</a>
										</li>


									
									</ul>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="chat-detail">
								<div class="chat-profile-header clearfix">
									<div class="left">
										<div class="clearfix">
											<div class="chat-profile-photo">
												<img src="vendors/images/profile-photo.jpg" alt="">
											</div>
											<div class="chat-profile-name">
												<h3>Rachel Curtis</h3>
												<span>New York, USA</span>
											</div>
										</div>
									</div>
									<div class="right text-right">
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												Setting
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Export Chat</a>
												<a class="dropdown-item" href="#">Search</a>
												<a class="dropdown-item text-light-orange" href="#">Delete Chat</a>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-box">
									<div class="chat-desc customscroll">
										<ul>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p class="">Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have requirements prepared. Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have requirements prepared. Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="chat-footer">
										<div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
										<div class="chat_text_area">
											<textarea placeholder="Type your message…"></textarea>
										</div>
										<div class="chat_send">
											<button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->


	<?php include('includes/scripts2.php'); ?>
	<!-- <script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script> -->
</body>
</html>