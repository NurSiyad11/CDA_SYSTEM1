<?php
session_start();
include('database/db.php');
require('UserInfo.php');
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
									window.location = "Home";
								});
					});			
				</Script>
				<?php	
			}	
         //  Admin 
		   elseif($row['Role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['ID'];	  

				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

			
				// $query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3' where ID=".$_SESSION['alogin']);
            
           $session = $row['ID'];
           $get_device= UserInfo::get_device();
           $get_os= UserInfo::get_os();
           $get_browser= UserInfo::get_browser();

           $time=time()+1800; // 30 daqiiqo 
         //   $F_time = $time->format("h:i:s a");

            // mysqli_query($conn,"INSERT INTO user_info(UID,Device,OS,Browser,Login_time,Login_status) VALUES('$session','$get_device','$get_os','$get_browser', '$date3' ,'$time' )         
            // ") or die(mysqli_error()); 


			 	echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
		    }
          // Administrator
          elseif($row['Role'] == 'Administrator') {
            $_SESSION['alogin']=$row['ID'];	  

            
           $date = new DateTime();
           $date->modify('+2 hour');
           $date3 = $date->format("D-d-m-Y h:i:s a");     
            
           $session = $row['ID'];
           $get_device= UserInfo::get_device();
           $get_os= UserInfo::get_os();
           $get_browser= UserInfo::get_browser();

           $time=time()+1800; // 30 daqiiqo 

            // mysqli_query($conn,"INSERT INTO user_info(UID,Device,OS,Browser,Login_time,Login_status) VALUES('$session','$get_device','$get_os','$get_browser', '$date3' ,'$time' )         
            // ") or die(mysqli_error()); 



            echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
         }
         // Customer
			elseif ($row['Role'] == 'Customer') {
		    	$_SESSION['alogin']=$row['ID'];
	
				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");

            
            $session = $row['ID'];
            $get_device= UserInfo::get_device();
            $get_os= UserInfo::get_os();
            $get_browser= UserInfo::get_browser();
 
            $time=time()+1800; // 30 daqiiqo 
 
            //  mysqli_query($conn,"INSERT INTO user_info(UID,Device,OS,Browser,Login_time,Login_status) VALUES('$session','$get_device','$get_os','$get_browser', '$date3' ,'$time' )         
            //  ") or die(mysqli_error()); 
 
 
 
			 	echo "<script type='text/javascript'> document.location = 'Customer/index.php'; </script>";
		    }
         //  Manager
			elseif ($row['Role'] == 'HOD') {
		    	$_SESSION['alogin']=$row['ID'];

				$date = new DateTime();
				$date->modify('+2 hour');
				$date3 = $date->format("D-d-m-Y h:i:s a");
            
            $session = $row['ID'];
            $get_device= UserInfo::get_device();
            $get_os= UserInfo::get_os();
            $get_browser= UserInfo::get_browser();
 
            $time=time()+1800; // 30 daqiiqo 
 
             mysqli_query($conn,"INSERT INTO user_info(UID,Device,OS,Browser,Login_time,Login_status) VALUES('$session','$get_device','$get_os','$get_browser', '$date3' ,'$time' )         
             ") or die(mysqli_error()); 
 
 
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




 
<?php include('includes/head.php')?>
   <body class="main-layout">

   <?php include('includes/header.php')?>

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
                                 <!-- <div class="select-role">
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
                                 </div> -->
                                 
                                 <form class="book_now" name="signin" method="post" >
                                    <div class="row">
                                       <div class="col-md-12">
                                          <span>User Name</span>
                                          <img class="date_cua" src="assets/images/img/user.png">
                                          <input class="online_book" placeholder="Enetr Your Email Here" type="email" name="username" id="username" required>
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
<!-- 
                                 <form class="book_now" name="signin" method="post" >
                                    <div class="row">
                                       <div class="col-md-12">
                                          <span>Use Name</span>
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
                                 </form> -->
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
      <?php include('includes/scripts.php')?>

   </body>
</html>