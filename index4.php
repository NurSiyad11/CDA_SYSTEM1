<?php
session_start();
include('database/db.php');
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;



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
						swal.fire({
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
            else{
                $_SESSION['alogin']=$row['ID'];      
            
                $session = $row['ID'];
                $otp = sprintf("%'.06d",mt_rand(0,999999));
                $expiration = date("Y-m-d H:i" ,strtotime(date('Y-m-d H:i')." +1 mins"));
          
                $query=mysqli_query($conn,"update user set otp='$otp', otp_expiration='$expiration' where ID=".$_SESSION['alogin']);
                  $name=$row['Name'];       
                // $email_address=$row['Email'];

                    //Create instance of PHPMailer
                    $mail = new PHPMailer();
                    //Set mailer to use smtp
                        $mail->isSMTP();
                    //Define smtp host
                        $mail->Host = "smtp.gmail.com";
                    //Enable smtp authentication
                        $mail->SMTPAuth = true;
                    //Set smtp encryption type (ssl/tls)
                        $mail->SMTPSecure = "tls";
                    //Port to connect smtp
                        $mail->Port = "587";
                    //Set gmail username
                        $mail->Username = "siyaadgeneralservice@gmail.com";
                    //Set gmail password
                        $mail->Password = "fpzpktrcwxaeshpk";
                    //Email subject
                        $mail->Subject = "CDA System";
                    //Set sender email
                        $mail->setFrom('siyaadgeneralservice@gmail.com', "CDA N ");
                    //Enable HTML
                        $mail->isHTML(true);
                    //Attachment
                        // $mail->addAttachment('img/attachment.png');
                    //Email body
                        $mail->Body = " 
                        <html>
                           
                           <body  style=\"border: 2px solid #1D058D; margin: 25px 10px 20px 10px;\">
                              <h2  style=\"text-align:center; color: White; font-size: 200%; margin: 0px 0px 0px 0px; background-color : #1D058D; padding: 15px 5px 15px 5px;\">You are Attempting to Login CDA System</h2>
                              <p style=\"text-align:left;  margin: 25px 10px 10px 20px;\">Dear ".$name." </br></p>
                              <p style=\"text-align:left;  margin: 0px 10px 10px 20px;\">Here is your OTP (One-Time PIN) to verify your Identity. </br></p>
                              <h3 style=\"text-align:left;  margin: 0px 10px 10px 20px;\"> OTP : ".$otp."</br></h3>
                              <h3 style=\"text-align:left;  margin: 0px 10px 10px 20px;\"> Expiration Time : ".$expiration."</br></h3>
                           </body>
                    </html>";
                    //Add recipient
                        $mail->addAddress('cabdinur789@gmail.com');
                    //Finally send email
                        if ( $mail->send() ) {
                           echo "<script type='text/javascript'> document.location = 'verification.php'; </script>"; 
                        }else{
                           ?>
                           <Script>
                              window.addEventListener('load',function(){
                                 swal.fire({
                                    title: "Error",
                                    text: "Message could not be sent. Mailer Error: ",
                                    icon: "error",
                                    button: "Ok!",
                                 })
                                 .then(function() {
                                          window.location = "index4.php";
                                       });
                              });			
                           </Script>
                           <?php	
                           // echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
                        }
                    //Closing smtp connection
                        $mail->smtpClose();

                          //echo "<script type='text/javascript'> document.location = 'index4.php'; </script>"; 
                           ?>
                          <script>alert('Message could not be sent. Mailer Error: ');</script>;
                          <script>
                          window.location = "index4.php"; 
                          </script>
                           <?php
                         
            }
        }
    }
	else{ 	  
		?>
		<Script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Error",
					text: "Please Check Your Email or Password .... ",
					icon: "error",
					button: "Ok!",
				})
				.then(function() {
							window.location = "index4.php";
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
                  
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img class="first-slide" src="assets/images/img/banner1.png" alt="First slide">
                        </div>
                
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

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  
               </section>
            </div>
         </div>
      <!-- </div> -->
         
   
      <!--  footer -->
     
   <?php //include('footer.php')?>
      <!-- end footer -->
      <!-- Javascript files-->
      <?php include('includes/scripts.php')?>

   </body>
</html>