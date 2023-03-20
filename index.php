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
									window.location = "index.php";
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
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home Page</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="assets/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="assets/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="assets/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="assets/ss/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   
   <body class="main-layout">


   <?php include('header.php')?>

      <!-- banner -->
      <!-- <div class="container"> -->
         <div class="row">
            <div class="col-12">
               <section class="banner_main">
                  <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
                     <!-- <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol> -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img class="first-slide" src="assets/images/img/banner1.png" alt="First slide">
                        </div>
                     <!--  <div class="carousel-item">
                           <img class="second-slide" src="assets/images/img/banner2.png" alt="Second slide">
                        </div> -->
                        <!-- <div class="carousel-item">
                           <img class="third-slide" src="assets/images/img/banner1.png" alt="Third slide">
                        </div> -->
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
                  <div class="booking_ocline">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="book_room">
                                 <h1>C.D.A System</h1>
                                 <form class="book_now" name="signin" method="post" >
                                    <div class="row">
                                       <div class="col-md-12">
                                          <span>User Name</span>
                                          <img class="date_cua" src="assets/images/img/user.png">
                                          <input class="online_book" placeholder="Enetr Username Here" type="email" name="username" id="username" required>
                                       </div>
                                       <div class="col-md-12">
                                          <span>Password</span>
                                          <img class="date_cua" src="assets/images/img/pass.png">
                                          <input class="online_book" placeholder="Enetr Password Here" type="password" name="password" id="password" required>
                                       </div>
                                       <div class="col-md-12">
                                          <button class="book_btn" name="signin" id="signin" type="submit">Login Now</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      <!-- </div> -->
         
      <!-- end banner -->
      <!-- about -->
      <!-- <div class="about">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>About Us</h2>
                    <p>our system is designed to help the customers of SGS company, to help them keep
                        track of their complete data, including purchases, payments and debts owed to 
                        customer.<br>
                        The customer data activity section provides the customer with complete 
                        information, for example: the customer will be able to know the product 
                        purchased him, the quantity purchased and the amount purchased him.<br>
                        The system also allows the customer to know the date of purchase and the 
                        type of product he bought.
                    
                     </p>
                     <a class="read_more" href="index.php">Login</a>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="assets/images/img/about.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      
      <!-- blog -->
      <!-- <div  class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our System</h2>
                     <p>Our System has the protection of customer custom data, the customer will be <br>
                        given a unique username and password to track his data. </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="assets/images/img/desk_dash.PNG" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Desktop Design</h3>
                        <span>The standard </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="assets/images/img/mob_dash.PNG" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Mobile Desgin</h3>
                        <span>The standard</span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="assets/images/img/lab_dash.PNG" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Labtop Design</h3>
                        <span>The standard </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- end blog -->
      <!--  footer -->
     
   <?php //include('footer.php')?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/js/custom.js"></script>
	  <!-- Sweet alert -->
	<script src="src/scripts/sweetalert.min.js"></script>
   </body>
</html>