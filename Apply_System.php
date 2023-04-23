<?php include('includes/head.php')?>  
<?php include('database/db.php');
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<?php
	if(isset($_POST['submit']))
	{
	
	$Name=$_POST['Name'];	   
	$Email=$_POST['Email']; 
	$Company_name=$_POST['Company_name']; 
	$Address=$_POST['Address']; 	 
	$Phone=$_POST['Phone']; 

    $query = mysqli_query($conn,"select * from apply_form where Email = '$Email' ")or die(mysqli_error());
    $count = mysqli_num_rows($query);     
    

    if ($count > 0){ ?>
    <script>
       window.addEventListener('load',function(){
           swal({
               //title: "Warning",
               text: "Email Already exist ",
               icon: "warning",
               button: "Ok Done!",			
           })
           .then(function() {
                   window.location = "Apply_System.php";
               });
       });
   </script>
   <?php
    }else{

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
           $mail->setFrom('siyaadgeneralservice@gmail.com', "Apply CDA System");
       //Enable HTML
           $mail->isHTML(true);
       //Attachment
        //    $mail->addAttachment('vendors/images/email_img/pic1.jpg');
           
       //Email body
           $mail->Body = " 
           <html>
              <head>
                 <style>

                    body{
                       border: 2px solid #1D058D;
                       margin: 25px 10px 20px 10px;

                    }

                    *{
                       margin-top: 0px;
                       margin-bottom: 0px;
                       margin-right: 10px;
                       margin-left: 10px;
                       }

                    h1{ text-align:center; 
                       color: White;
                       
                       font-size: 200%;
                       margin: 0px px 20px 0px;
                       background-color : #1D058D;
                       padding: 15px 5px 15px 5px;
                       
                    }
                    p{  text-align:left; 
                       float: left;
                       color: #1D058D;
                       
                       margin: 0px 10px 10px 20px;

                    }
                    line{color: #1D058D;
                       margin: 0px 0px 20px 0px;

                    }
                    h2{ text-align:center; 
                       color: #1D058D;
                       
                       font-size: 150%;
                       margin: 10px 0px 20px 0px;
                       <!-- border: 3px solid #1D058D; -->        
                    }
                    RV{ text-align:Right; 
                       color: red;
                       
                    }
                    img{
                       float: right;    
                       margin: 0px 50px 0 10px;
                    }
                    
                 </style> 
              </head>
              <body>
              
                 <h2>You have requested to use the CDA SYSTEM</h2>
                 <p>Name : ".$Name." </p>
                 <p>Company Name : ".$Company_name." </p>
                 <p>Email Address : ".$Email." </p>
                 <p>Address : ".$Address." </p>
                 <p>Phone Number : ".$Phone." </p>
              
              </body>
       </html>";
       //Add recipient
           $mail->addAddress($Email);
       //Finally send email
           if ( $mail->send() ) {
            ?>
            <script>alert('Your request has been submitted and will be answered as soon as possible. ');</script>;
            
                <?php
            //   echo "<script type='text/javascript'> document.location = 'verification.php'; </script>"; 
            mysqli_query($conn,"INSERT INTO apply_form (Name,Email,Company_name,Address,Phone,Status) VALUES('$Name','$Email','$Company_name','$Address','$Phone','0')         
            ") or die(mysqli_error());
            ?>
                <script>       
               window.location = "index4.php"; 
               </script>
                <?php	
           }else{
            ?>
            <script>alert('Message could not be sent. Mailer Error ');</script>;
            <script>
            window.location = "Apply_System.php"; 
            </script>
             <?php
              // echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
           }
       //Closing smtp connection
           $mail->smtpClose();

             //echo "<script type='text/javascript'> document.location = 'index4.php'; </script>"; 
           

        
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
                      <h2>Apply To Use The System</h2>
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
                    <div class="card-header bg-dark text-white">Apply Form</div>
                    <div class="card-body p-5 ">
                        <form action="" method="POST">
                            <div class="mb-3 row ">
                                <label  class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10 ">
                                <input type="text" name="Name"  class="form-control"  placeholder="Enter Your Full Name" required autocomplete="off">
                                </div>
                            </div>                       
                            <div class="mb-3 row ">
                                    <label  class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-10 ">
                                    <input type="text" name="Company_name"  class="form-control"  placeholder="Enter Your Comapny Name" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row m-">
                                    <label  class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10 ">
                                    <input type="email" name="Email"  class="form-control"  placeholder="example@gmail.com " required autocomplete="off">
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
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <button class="btn btn-primary" name="submit" type="submit">Send </button>
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