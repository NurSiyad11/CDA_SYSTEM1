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
                    button: "Ok!",
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
      <?php //include('Apply_Form/Apply_form.php')?>
      <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary mb-3" >
                    <?php
                    	$Verify_email = $conn->query("SELECT Email as email from `user` where ID='$session_id' ")->fetch_assoc()['email'];
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
                                <!-- <div class="mb-3 row ">
                                    <label  class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-10 ">
                                    <input type="text" name="Company_name"  class="form-control"  placeholder="Enter Your Comapny Name" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row m-">
                                    <label  class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10 ">
                                    <input type="Gmail" name="Email"  class="form-control"  placeholder="example@gmail.com " required autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row m-">
                                    <label  class="col-sm-2 col-form-label">Phone Name</label>
                                    <div class="col-sm-10 ">
                                    <input type="number" name="Phone"  class="form-control"  placeholder="61xxxxxxx" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row m-">
                                    <label  class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10 ">
                                    <input type="text" name="Address"  class="form-control"  placeholder="Enter YourAddress Here" required autocomplete="off">
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-12">
                                    <button class="btn btn-primary" name="verify" type="submit">Login </button>
                                    </div>
                                </div>
                        </form>



                        
                        


                        <!-- <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- end Apply System Form  -->
      <!--  footer -->
      <?php //include('includes/footer.php')?>
      <!-- end footer -->     
   </body>
   <?php include('includes/scripts.php')?>
</html>