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
            <script>alert('Your request has been submitted and will be answered as soon as possible. ');</script>;
            
                <?php
            //   echo "<script type='text/javascript'> document.location = 'verification.php'; </script>"; 
            mysqli_query($conn,"INSERT INTO apply_form (Name,Email,Company_name,Address,Phone,Tell,Status) VALUES('$Full_name','$Email','$Com_name','$Address','$Tell','$Phone','0')         
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
        <input type ="text" name="F_name" placeholder="First Name" >
        <label for=""> Middle Name</label>
        <input type = "text" name="M_name" placeholder="Middle Name">
        <label for=""> Last Name</label>
        <input type ="text"id="result" name="L_name" placeholder="Last Name" >
        <button id="btn-get">GET</button>
       
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(1, 2);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-2">
        <p>Comany Information:</p>
        <label for=""> Company Name</label>
        <input type = "text" id="input-get" placeholder="Ener Your Company Name Here " name="Com_name">
        <label for=""> Email Address</label>
        <input type = "email" placeholder="Ener Your Email Address Here" name="Email">
        <label for=""> Phone Number</label>
        <input type = "number" placeholder="Ener Your Phone Number Here " name="Phone">
        <label for=""> Tell</label>
        <input type = "number" placeholder="Ener Your Tell / Landline Number Here" name="Tell">
        <label for=""> Address</label>
        <input type = "text"   placeholder="Ener Your Address Here" name="Address">
        <div id="result">
            Result
        </div>
        <button id="btn-get">GET</button>
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(2, 1);">Previous</div>
          <div class="index-btn" onclick="run(2, 3);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-3">
        <p>Overview Information:</p>
        <!-- <input type = "text" placeholder="dd" name="dd">
        <input type = "text" placeholder="mm" name="mm">
        <input type = "text" placeholder="yy" name="yy">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(3, 2);">Previous</div>
          <div class="index-btn" onclick="run(3, 4);">Next</div>
        </div> -->
        
        <form action="" method="GET">
          <input type = "text" id="result" readonly placeholder="Username" name="username" >
          <button id="btn-get">GET</button>
          <input type = "password" placeholder="Password" name="password">
        </form>
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



    <script>
      $(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Back',
            next : '<i class="zmdi zmdi-chevron-right"></i>',
            finish : '<i class="zmdi zmdi-chevron-right"></i>',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            var fullname = $('#first_name').val() + ' ' + $('#middle_name').val() + ' ' + $('#last_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var Tell = $('#Tell').val();
            var address = $('#address').val();
            var gender = $('form input[type=radio]:checked').val();
            var account_name = $('#account_name').val();
            var account_number = $('#account_number').val();

            $('#fullname-val').text(fullname);
            $('#email-val').text(email);
            $('#phone-val').text(phone);
            // $('#email-val').text(email);
            $('#Tell-val').text(Tell);
            $('#address-val').text(address);
            $('#gender-val').text(gender);
            $('#account-name-val').text(account_name);
            $('#account-number-val').text(account_number);

            return true;
        }
    });
});

    </script>





<script>
  // let btnGet = document.querySelector('#btn-get');
// let btnSet = document.querySelector('#btn-set');
// let inputGet = document.querySelector('#input-get');
// let inputSet = document.querySelector('#input-set');
// let result = document.querySelector('#result');

// btnGet.addEventListener('click', () =>{
//     result.innerText = inputGet.value;
// });

// btnSet.addEventListener('click', () =>{
//     inputGet.value = inputSet.value;
// });

</script>



    
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


      function validateForm() {
  // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
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
</html>