<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<body>


	
<?php include('includes/navbar.php') ?>

<?php include('includes/right_sidebar.php') ?>
<?php include('includes/left_sidebar.php') ?>


	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Video Player</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Video Player</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Plyr HTML5 Video</h4>
							<p class="font-14 ml-0">A simple, accessible HTML5 media player <a href="#" target="_blank" class="weight-700 text-blue">Click Here</a></p>
						</div>
					</div>
					<div class="container">
						<video poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg?v1" controls crossorigin>
							<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.mp4" type="video/mp4">
							<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.webm" type="video/webm">
						</video>
					</div>
				</div> -->
<!-- 
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Plyr HTML5 Audio</h4>
							<p class="font-14 ml-0">A simple, accessible HTML5 media player <a href="https://github.com/sampotts/plyr" target="_blank" class="weight-700 text-blue">Click Here</a></p>
						</div>
					</div>
					<div class="container">
						<audio controls>
							<source src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3" type="audio/mp3">
							<source src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.ogg" type="audio/ogg">
							Your browser does not support the audio element.
						</audio>
					</div>
					m38O12p1_BY
				</div> -->

				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Plyr YouTube Video</h4>
							<p class="font-14 ml-0">A simple, accessible HTML5 media player <a href="#" target="_blank" class="weight-700 text-blue">Click Here</a></p>
						</div>
					</div>
					<div class="container">
						<div data-type="youtube" data-video-id="m38O12p1_BY"></div>
					</div>
				</div>


				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Video</h4>
							<p class="font-14 ml-0">A simple, accessible HTML5 media player <a href="#" target="_blank" class="weight-700 text-blue">Click Here</a></p>
						</div>
					</div>
					<div class="container">
						<div data-type="youtube" data-video-id="43wBH8YwaYM"></div>
					</div>
				</div>


<!-- 
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Plyr Vimeo Video</h4>
							<p class="font-14 ml-0">A simple, accessible HTML5 media player <a href="https://github.com/sampotts/plyr" target="_blank" class="weight-700 text-blue">Click Here</a></p>
						</div>
					</div>
					<div class="container">
						<div data-type="vimeo" data-video-id="143418951"></div>
					</div>
				</div> -->

			</div>
			
			<?php include('includes/footer.php')?>

		</div>
	</div>
	<?php include('includes/scripts.php')?>
	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/plyr/dist/plyr.js"></script>
	<script src="https://cdn.shr.one/1.0.1/shr.js"></script>
	<script>
		plyr.setup({
			tooltips: {
				controls: !0
			},
		});
	</script>
</body>
</html>