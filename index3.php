<?php
session_start();
include('database/db.php');
if(isset($_POST['signin']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql ="SELECT * FROM user where Email ='$username' AND password ='$password' ";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {

			if($row['Status'] == 'Inactive'){
				// $name = $row['Name'];
				?>
				<Script>
					window.addEventListener('load',function(){
						swal({
							title: "Warning",
							text: "Your Acount Is Inactive !!! ",							
							icon: "warning",
							button: "Ok!",
						})
						.then(function() {
									window.location = "Login";
								});
					});			
				</Script>
				<?php	
			}	
		   elseif($row['Role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['ID'];	  

				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

				$time=time()+1800; // 30 daqiiqo 
				$query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where ID=".$_SESSION['alogin']);
			 	echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
		    }
			elseif ($row['Role'] == 'Customer') {
		    	$_SESSION['alogin']=$row['ID'];
	
				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

				//Login Status Time
				$time=time()+1800;
				$query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where id=".$_SESSION['alogin']);
			 	
			 	echo "<script type='text/javascript'> document.location = 'Customer/index.php'; </script>";
		    }
			elseif ($row['Role'] == 'HOD') {
		    	$_SESSION['alogin']=$row['ID'];

				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

				$time=time()+1800;
				$query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where id=".$_SESSION['alogin']);
			 	echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
		    }		    
		}
	} 
	else{ 	  
		?>
		<Script>
			window.addEventListener('load',function(){
				swal({
					title: "Error",
					text: "Please Check Your Email or Password .... ",
					icon: "error",
					button: "Ok!",
				})
				.then(function() {
							window.location = "index.php";
						});
			});			
		</Script>
		<?php	
	//   echo "<script>alert('Please Check Your Email or Password');</script>";
	//   echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>CDA Management System</title>

	

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
<body class="login-page bg-info-1">
	<div class="login-header box-shadow bg-dark">
		<div class="container-fluid d-flex justify-content-between align-items-center ">
			<div class="brand-logo ">
				<a href="index.php">
					<img src="vendors/images/img/light_logo1.png" alt="">
				</a>
			</div>
			<div class="login-menu " >
				<ul>
					<!-- <li><a href="index.php" style="color: White"> Home</a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center ">
		<div class="container ">
			<div class="row align-items-center ">
				<div class="col-md-6 col-lg-7 ">
					<img src="vendors/images/img/banner.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5  ">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login Form</h2>
						</div>

						<form name="signin" method="post">
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="Admin" id="admin">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Customer
									</label>
									<label class="btn">
										<input type="radio" name="User" id="user">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
								</div>
							</div>
							<label >User Name</label><br>
							<div class="input-group custom">
								
								<input type="text" class="form-control form-control-lg" required name="username" placeholder="Enter Email Address">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<label for="">Password</label>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" required name="password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<!-- <div class="row pb-30">
							
								<div class="col-6">
									<div class="forgot-password"><a href="user_payment.php"><i class="dw dw-money-2"></i> User Payment</a></div>
								</div>
							</div> -->
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									

										<input class="btn btn-primary btn-lg btn-block" name="signin" id="signin" type="submit" value="Sign In">
										<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
									</div>
									<!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div> -->
									<!-- <div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Register To Create Account</a>
									</div> -->
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
	<!-- Sweet alert -->
	<script src="src/scripts/sweetalert.min.js"></script>





</body>
</html>