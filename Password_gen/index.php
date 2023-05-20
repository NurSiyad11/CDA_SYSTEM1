<?php $get_id = $_GET['edit']; ?>
<?php
session_start();
include('../database/db.php');
$pass_error ="";
if(isset($_POST['Create']))
{
	$Pass_sts = $conn->query("SELECT Pass_status as st from `user` where ID='$get_id'  ")->fetch_assoc()['st'];


	$New_pass= md5($_POST['New_pass']);
	// $Con_pass=$_POST['Con_pass'];
	// if(strlen($New_pass) < 4){		
	// 	$pass_error='your password need to have minimum 4 Character';
	// }
	// elseif(strlen($New_pass) > 15){
	// 	$pass_error='your password need to have maximum 15 Character';
	// }
	if($Pass_sts == '0'){



	$result = mysqli_query($conn,"update user set Password='$New_pass' , Pass_status='1' where id='$get_id'         
		"); 		
	if ($result) {
		?>
		<script>    
		   window.addEventListener('load',function(){
			   swal({
				   title: "Success",
				   text: "Waad ku Guulaystey Inaad Sameysato Fure Siraad(Password) ",
				   icon: "success",
				   button: "Ok Done!",		   
			   })
			   .then(function() {
						   window.location = "../index.php";
					   });  
		   });   
	   </script>
		<?php
     	// echo "<script>alert('Record Successfully Updated');</script>";
     	// echo "<script type='text/javascript'> document.location = '../index4.php'; </script>";
	} else{
	  die(mysqli_error());
   }
}else{
	?>
	<script>    
	   window.addEventListener('load',function(){
		   swal({
			   title: "Warning",
			   text: "Sory, your Password Already generated. if you want to assist please contact the Administrator. ",
			   icon: "warning",
			   button: "Ok Done!",		   
		   })
		   .then(function() {
					   window.location = "../index.php";
				   });  
	   });   
   </script>
	<?php
}

	
}
?>



<!doctype html>
<html lang="en">
  <head>
  	<title>Creating New Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #09</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
						<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/pass.jpg);"></div>
						<h3 class="text-center mb-0">Welcome</h3>
						<p class="text-center">Please Create Your Password </p>
						<form action="#" class="login-form" method="POST">
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
								<input type="password" name="New_pass" id="New_pass"  class="form-control" placeholder="New Password" required autocomplete="off">
								<span class="text-danger font-weight-bol"> <?php echo $pass_error ?> </span>
							</div>
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
							<input type="password"  name="Con_pass" id="Con_pass" class="form-control" placeholder="Confirm Password" required autocomplete="off" >
							<span id="confrmpass" class="text-danger font-weight-bol"> </span>
							</div>
							<!-- <div class="form-group d-md-flex">
											<div class="w-100 text-md-right">
												<a href="#">Forgot Password</a>
											</div>
							</div> -->
							<div class="form-group">
								<button type="submit" name="Create"  class="btn form-control btn-primary rounded submit px-3"   onclick= ' return validation()' >Create Password</button>
							</div>
						</form>
						<!-- <div class="w-100 text-center mt-4 text">
						<p class="mb-0">Don't have an account?</p>
						<a href="#">Sign Up</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function validation(){			
				var pass = document.getElementById('New_pass').value;
				var confirmpass = document.getElementById('Con_pass').value;		

				if(pass!=confirmpass){
					document.getElementById('confrmpass').innerHTML =" **  New Password does not match the confirm password";
					return false;
				}
			}
		</script>
	</section>
		

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
   <!-- Sweet alert -->
   <script src="../src/scripts/sweetalert.min.js"></script>

	</body>
</html>

