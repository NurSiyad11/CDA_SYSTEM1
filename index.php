<?php
session_start();
include('database/db.php');
if(isset($_POST['signin']))
{




	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql ="SELECT * FROM user where Email ='$username' AND password ='$password' AND Status ='Active'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if ($row['Role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['ID'];
		    //	$_SESSION['arole']=$row['Login_status'];
				//$today = date("F j, Y, g:i a");

				// $Object = new DateTime();  
				// $DateAndTime = $Object->format("d-m-Y h:i:s a"); 

				//$date = date('Y-m-d H:i:s');

				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

				$time=time()+600;
				$query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where id=".$_SESSION['alogin']);
			 	echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
		    }
		    elseif ($row['Role'] == 'Customer') {
		    	$_SESSION['alogin']=$row['ID'];
		    	//$_SESSION['arole']=$row['Login_status'];

				//Login Curent Time
				// $Object = new DateTime();  
				// $DateAndTime = $Object->format("d-m-Y h:i:s a");
				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");



				//Login Status Time
				$time=time()+600;
				$query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where id=".$_SESSION['alogin']);
			 	
			 	echo "<script type='text/javascript'> document.location = 'Customer/index.php'; </script>";
		    }
		    elseif ($row['Role'] == 'HOD') {
		    	$_SESSION['alogin']=$row['ID'];
		    	//$_SESSION['arole']=$row['Department'];
				
				// $Object = new DateTime();  
				// $DateAndTime = $Object->format("d-m-Y h:i:s a");

				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

				$time=time()+600;
				$query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where id=".$_SESSION['alogin']);
			 	
			 	echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
		    }
		}

	} 
	else{ 
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}
// $_SESSION['alogin']=$_POST['username'];
// 	echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
?>



<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>CDA Management System</title>

	<!-- Site favicon -->
	<!-- <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<!-- <img src="vendors/images/deskapp-logo.svg" alt=""> -->
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/img/banner.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To CDA </h2>
						</div>




						<form name="signin" method="post">
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Customer
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" required name="username" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" required name="password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->

										<input class="btn btn-primary btn-lg btn-block" name="signin" id="signin" type="submit" value="Sign In">
										<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>





					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>