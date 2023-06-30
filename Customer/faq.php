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
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Frequently asked questions</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">FAQ</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


				<div class="faq-wrap">
					<h4 class="mb-20 h4 text-blue">Frequently asked questions</h4>
					<div id="accordion">						
						<?php
							$i =1;
							$query = mysqli_query($conn,"SELECT * from faq order by  id desc  ") or die(mysqli_error());
							while ($row = mysqli_fetch_array($query)) {
							$id = $row['id'];
						?>
						<div class="card">							
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq<?php echo $i;?>">
								<!-- How can I send an order ? -->
								<?php echo $row['Question']?>
								</button>
							</div>
							<div id="faq<?php echo $i++?>" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. -->
									<!-- <?php //echo $row['Description']?> -->
									<p><?php echo nl2br($row['Description']); ?></p>
									<div class="pd-20 card-box mb-30">
										<!-- <div class="clearfix mb-20">
											<div class="pull-left">
												<h4 class="text-blue h4">Plyr YouTube Video</h4>
												<p class="font-14 ml-0">A simple, accessible HTML5 media player <a href="#" target="_blank" class="weight-700 text-blue">Click Here</a></p>
											</div>
										</div> -->
										<div class="col-md-6">
											<div class="container">
												<div data-type="youtube" data-video-id="<?php echo $row['Video']?>"></div>
											</div>
										</div>
										
									</div>

								</div>
							</div>							
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>

		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts1.php'); ?>

</body>
