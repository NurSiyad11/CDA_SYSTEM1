<?php include('includes/head.php')?>  
<?php include('database/session.php');?>
<?php include('database/db.php');
require('UserInfo.php');
?>

 







<?php
if(isset($_POST['verify']))
{
	
	$otp=$_POST['otp'];	   

    $query = mysqli_query($conn,"select * from user where ID = '$session_id' ")or die(mysqli_error());
    $row = mysqli_fetch_assoc($query); 

    if($row['otp'] != $otp){
        ?>
        <Script>
            window.addEventListener('load',function(){
                swal.fire({
                    title: "Error",
                    text: "Invailed OTP, Please Check Your OTP !!! ",							
                    icon: "error",
                    // button: "Ok!",
                })
                .then(function() {
                            window.location = "verification.php";
                        });
            });			
        </Script>
        <?php	
    }
    elseif($row['otp_expiration'] == 0 ){
        ?>
        <Script>
            window.addEventListener('load',function(){
                swal.fire({
                    title: "Warning",
                    text: "OTP Expired, Please Check Your OTP !!! ",							
                    icon: "warning",
                    button: "Ok!",
                })
                .then(function() {
                            window.location = "verification.php";
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

        $time=time()+1800; // 30 daqiiqo 
    
        $query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3', otp_expiration= '0' where ID=".$_SESSION['alogin']);
            
        $session = $row['ID'];
        $get_device= UserInfo::get_device();
        $get_os= UserInfo::get_os();
        $get_browser= UserInfo::get_browser();


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

        $query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3', otp_expiration= '0' where ID=".$_SESSION['alogin']);


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

        $query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3', otp_expiration= '0' where ID=".$_SESSION['alogin']);

    

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

        $query=mysqli_query($conn,"update user set Login_status='$time', Login_time='$date3', otp_expiration= '0' where ID=".$_SESSION['alogin']);


        //  mysqli_query($conn,"INSERT INTO user_info(UID,Device,OS,Browser,Login_time,Login_status) VALUES('$session','$get_device','$get_os','$get_browser', '$date3' ,'$time' )         
        //  ") or die(mysqli_error()); 


         echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
    }    
}

?>

<!-- Code Modal Center  -->
<style>
    .modelCenter{
        top:55% ! important;
        transform: translateY(-50%) ! important;
    }
</style>




   <!-- body -->
<body class="main-layout">
   <!-- header -->
   <?php include('includes/header.php')?>
      <!-- end header -->
     <div class="back_re">
         <div class="container ">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                      <h2>Login Verification </h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  Apply System Form Start -->
  
      <!-- <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary mb-3" >
                    <?php
                    	//$Verify_email = $conn->query("SELECT Email as email from `user` where ID='$session_id' ")->fetch_assoc()['email'];
                    ?>
                    <div class="card-header bg-dark text-white">Please Verify Your login Account</div>
                    <div class="card-body p-5 ">
                  <center> <h3>We have sent an OPT in your Email ( <?php echo $Verify_email?> ).</h3></center> 
                        <form action="" method="POST">
                           
                            <div class="mb-3 row ">
                                <label  class="col-sm-2 col-form-label">Enetr The OTP Code</label>
                                <div class="col-sm-10 ">
                                <input type="number" name="otp"  class="form-control"  placeholder="Please Enter The OTP Here " required autocomplete="off">
                                </div>
                            </div>                       
                    
                                <div class="row">
                                    <div class="col-12">
                                    <button class="btn btn-primary" name="submit" type="submit">Login </button>
                                    </div>
                                </div>
                        </form>
                       </div>
                </div>
            </div>
        </div>
      </div> -->
    <!-- end Apply System Form  -->
  

   <!-- blog -->
   <div  class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                    
                     <p class="margin_0">Welcome to the OTP Checking Page </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="blog_box">
                     <!-- <div class="blog_img">
                        <figure><img src="images/blog1.jpg" alt="#"/></figure>
                     </div> -->
                     <div class="blog_room">
                        <h3>OTP Checking</h3>
                        <span>One Time Pin(Password) </span>
                        <p>welcome to the OTP Checking Page. Your commitment to security is greatly appreciated, and we look forward to serving you with excellence.
                        Your safety is our top priority, and by implementing this one-time password (OTP) verification process, we strive to ensure the utmost protection for your account.</p><br>
                        <p>Thank you for your understanding and patience as we work together to maintain a secure environment. We value your trust, and we are confident that this verification process will contribute to a seamless and protected user experience.</p>
                        <p>If you encounter any difficulties or have any questions, our dedicated support team is standing by to assist you. Feel free to reach out, and we'll be more than happy to help.</p><br>
                        <h4>If you would like to receive the OTP verification pop-up, simply refresh your page, and you will see the designated area where you can enter the OTP.</h4>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="images/blog2.jpg" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>The standard chunk </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div> -->
               <!-- <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="images/blog3.jpg" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>The standard chunk </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
      <!-- end blog -->








    <!-- OTP Model Pop up-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modelCenter" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verify OTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                    <?php
                    	$Verify_email = $conn->query("SELECT Email as email from `user` where ID='$session_id' ")->fetch_assoc()['email'];
                    ?>
                        <div class="form-group">
                        <label for="recipient-name" class="col-form-label">We have sent an OPT in your Email</label>
                        <input type="text" class="form-control" id="recipient-name" readonly required value="<?php echo $Verify_email?>">
                        </div>
                        <div class="form-group">
                        <label for="message-text" class="col-form-label">Enter OTP :</label>
                        <input class="form-control" type="number" name="otp" required placeholder="Enter Here The OTP" id="message-text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="verify" class="btn btn-primary">Verify</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>
    </div>






<!-- JavaScript - Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script>



      <!--  footer -->
      <?php //include('includes/footer.php')?>
      <!-- end footer -->     
   </body>
   <?php include('includes/scripts.php')?>
</html>