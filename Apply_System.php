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
// $error ="hgsdhgsf";
	if(isset($_POST['send']))
	{
	
	$F_name=$_POST['F_name'];	  
  $M_name=$_POST['M_name'];	 
  $L_name=$_POST['L_name'];	
	$Email=$_POST['Email']; 
	$Com_name=$_POST['Com_name']; 
	$Address=$_POST['Address']; 	 
	$Phone=$_POST['Phone']; 
  $Tell=$_POST['Tell']; 
	$Full_name= "$F_name "."$M_name "."$L_name";



    // $email = $_POST['email'];
    // $validate = filter_var($Email, FILTER_SANITIZE_EMAIL);
    // if(filter_var($validate,FILTER_VALIDATE_EMAIL) === false){
    //  $error =  "Email is not valid";
    // }
    // if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    //   $error = "Invalid email format";
    // }


    // else{
    // echo '<h4>Email is valid</h4>';
    // }



    $query = mysqli_query($conn,"select * from apply_form where Email = '$Email' ")or die(mysqli_error());
    $count = mysqli_num_rows($query);     
    

    if ($count > 0){ ?>
    <script>
       window.addEventListener('load',function(){
           swal.fire({
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
                 <p>Name : ".$Full_name." </p>
                 <p>Company Name : ".$Com_name." </p>
                 <p>Email Address : ".$Email." </p>
                 <p>Address : ".$Address." </p>
                 <p>Phone Number : ".$Phone." </p>
              
              </body>
       </html>";
       //Add recipient
           $mail->addAddress('cabdinur789@gmail.com');
       //Finally send email
           if ( $mail->send() ) {
            ?>
                <Script>
                  window.addEventListener('load',function(){
                      swal.fire({
                      title: "Success",
                      text: "Your request has been submitted and will be answered as soon as possible. ",
                      icon: "success",
                      button: "Ok Done!",				
                      
                    })
                    .then(function() {
                          window.location = "index4.php";
                        });	
                  });			
                </Script>
            <!-- <script>alert('Your request has been submitted and will be answered as soon as possible. ');</script>; -->
             <?php       

            // mysqli_query($conn,"INSERT INTO apply_form (Name,Email,Company_name,Address,Phone,Tell,Status) VALUES('$Full_name','$Email','$Com_name','$Address','$Tell','$Phone','0')         
            // ") or die(mysqli_error());
            ?>
                <!-- <script>       
               window.location = "index4.php"; 
               </script> -->
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



<head>
<link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>








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
 

    <form id="myForm" action="" method="post" autocomplete = "off">
      <h1 align = center>Apply Form</h1>
      <div style="text-align:center;">
        <span class="step" id = "step-1">1</span>
        <span class="step" id = "step-2">2</span>
        <!-- <span class="step" id = "step-3">3</span> -->
        <!-- <span class="step" id = "step-4">4</span> -->
      </div>

      <div class="tab" id = "tab-1">
        <p>Personal Information :</p>
        <label for=""> First Name</label>
        <input type ="text" name="F_name" placeholder="First Name" onkeyup="letterOnly(this)" onkeyup="validation(this)"  onkeyup="letterOnly(this)">
        <label for=""> Middle Name</label>
        <input type = "text" name="M_name" placeholder="Middle Name" onkeyup="letterOnly(this)">
        <label for=""> Last Name</label>
        <input type ="text"id="result" name="L_name" placeholder="Last Name" onkeyup="letterOnly(this)" >
        <!-- <button id="btn-get">GET</button> -->
       
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(1, 2);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-2">
        <p>Company Information:</p>
        <label for=""> Company Name</label>
        <input type = "text" id="Com_name" placeholder="Ener Your Company Name Here " name="Com_name">
        <!-- <label for=""> Email Address</label>
        <input type = "text" id="email" placeholder="Ener Your Email Address Here" name="Email" onkeyup="ValidateEmail(this)" > -->

        <label for=""> Phone Number</label>
        <input type = "number" placeholder="Ener Your Phone Number Here " name="Phone">
        <label for=""> Tell</label>
        <input type = "number" placeholder="Ener Your Tell / Landline Number Here" name="Tell">
        <label for=""> Address</label>
        <input type = "text"   placeholder="Ener Your Address Here" name="Address">
        <!-- <div id="result">
            Result
        </div> -->
        <!-- <button id="btn-get">GET</button> -->
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(2, 1);">Previous</div>
          <div class="index-btn" onclick="run(2, 3);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-3">
        <p>Login Information:</p>
        <!-- <input type = "text" placeholder="dd" name="dd">
        <input type = "text" placeholder="mm" name="mm">
        <input type = "text" placeholder="yy" name="yy">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(3, 2);">Previous</div>
          <div class="index-btn" onclick="run(3, 4);">Next</div>
        </div> -->

            <!-- <div class="inner">
                      <h3>Comfirm Details</h3>
              <div class="form-row table-responsive">
                <table class="table">
                  <tbody>
                    <tr class="space-row">
                      <th>Company Name:</th>
                      <td id="test"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Email Address:</th>
                      <td id="email-val"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Phone Number:</th>
                      <td id="phone-val"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Tell Number:</th>
                      <td id="Tell-val"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Address Location:</th>
                      <td id="address-val"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Gender:</th>
                      <td id="gender-val"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Account Name:</th>
                      <td id="account-name-val"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Account Number:</th>
                      <td id="account-number-val"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> -->


        <label for=""> Email Address</label>
        <input type = "email" id="email" required placeholder="Ener Your Email Address Here" name="Email"  >

        <!-- <form action="" method="GET">
          <input type = "text" id="result" readonly placeholder="Username" name="username" >
          <button id="btn-get">GET</button>
          <input type = "password" placeholder="Password" name="password">
        </form> -->
        <!-- <label for="" ><?php //echo $error;?></label> -->
        <label for="" id="Error"></label>
        <div class="index-btn-wrapper">          
          <div class="index-btn" onclick="run(3, 2);">Previous</div>
           <button class = "index-btn" type="submit" name="send" style = "background: blue;">Submit</button>
        </div>
      </div>

      <!-- <div class="tab" id = "tab-4">
        <p>Login Info:</p>
        <input type = "text" placeholder="Username" name="username">
        <input type = "password" placeholder="Password" name="password">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(4, 3);">Previous</div>
          <div class="index-btn" onclick="run(4, 5);">Next</div>
        </div>
      </div> -->

      <!-- <div class="tab" id = "tab-5">
          <input type = "text" placeholder="Username" name="username" >
          <input type = "password" placeholder="Password" name="password">
        <div class="index-btn-wrapper">
          
          <div class="index-btn" onclick="run(5, 4);">Previous</div>
          <button class = "index-btn" type="submit" name="submit" style = "background: blue;">Submit</button>
        </div>
      </div> -->
    </form>


			<!-- This Script Is Okey -->
			<script type="text/javascript">
				function letterOnly(input){
					var regex = /[^a-z ]/gi;
					input.value =input.value.replace(regex, "");
				}				
			</script>








      <script type="text/javascript">
				function validation(){			
					var F_name = document.getElementById('F_name').value;
					// var confirmpass = document.getElementById('con_pass').value;		

					if(F_name != " " ){
					  document.getElementById('test').innerHTML = " **  does not match the confirm password" ;
						return false;
					}else{
            document.getElementById('test').innerHTML = " ** else does not match the confirm password" ;
						return false;
          }
				 }
			</script>



    <!-- This Script Is Okey -->
    <script>
      // Default tab
      $(".tab").css("display", "none");
      $("#tab-1").css("display", "block");

      function run(hideTab, showTab){
        if(hideTab < showTab){ // If not press previous button
          // Validation if press next button
          var currentTab = 0;
          x = $('#tab-'+hideTab);
          y = $(x).find("input")
          for (i = 0; i < y.length; i++){
            if (y[i].value == ""){
              $(y[i]).css("background", "#ffdddd");
              return false;
            }
          }
        }
        

        // Progress bar
        for (i = 1; i < showTab; i++){
          $("#step-"+i).css("opacity", "1");
          
        }

        // Switch tab
        $("#tab-"+hideTab).css("display", "none");
        $("#tab-"+showTab).css("display", "block");
        $("input").css("background", "#fff");        
      }  
    </script>

























      <!--  Apply System Form Start -->
      <?php //include('Apply_Form/Apply_form.php')?>
      <!-- <div class="container p-5">
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



                        
                        


                      </div>
                </div>
            </div>
        </div>
      </div> -->
      <!-- end Apply System Form  -->
      <!--  footer -->
      <?php //include('includes/footer.php')?>
      <!-- end footer -->     
   </body>
   <?php include('includes/scripts.php')?>

   <!-- <script src="main.js"></script> -->

</html>