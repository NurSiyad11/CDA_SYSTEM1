<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit'];
//Include required PHPMailer files
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php
	if(isset($_POST['send']))
	{	
        $Message = $_POST['Message'];
        $Email = $_POST['To'];
		$st = $conn->query("SELECT Status as st from `apply_form` where id='$get_id'  ")->fetch_assoc()['st'];

		if($st !='2'){
            
			?>
			<Script>
				window.addEventListener('load',function(){
					swal({
						title: "Warning",
						text: "The Email Was not Sent b/c of  this Request is not approved ",
						icon: "warning",
						button: "Ok Done!",
					})
					.then(function() {
								window.location = "feedback_req.php";
							});
				});			
			</Script>
			<?php			
		}else {

            $query_apply_form = mysqli_query($conn,"select * from apply_form where id = '$get_id' ")or die(mysqli_error());
            $row = mysqli_fetch_assoc($query_apply_form);
            $Email = $row['Email'];

			$query_user = mysqli_query($conn,"select * from user where Email = '$Email' ")or die(mysqli_error());
            $row_user = mysqli_fetch_assoc($query_user);

			$Name = $row_user['Name'];
			$Com_name = $row_user['Com_name'];
			$Email_user = $row_user['Email'];
			$Address = $row_user['Address'];
			$Phone = $row_user['Phone'];
			$Role = $row_user['Role'];

			$ID = $row_user['ID'];

			$query_gen_pass = mysqli_query($conn,"select * from user where ID='$ID' and  Email = '$Email_user' and Com_name='$Com_name' ")or die(mysqli_error());
            $row_gen_pass = mysqli_fetch_assoc($query_gen_pass);
			$ID_gmail =  $row_gen_pass['ID'];
			


           
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
              <body style=\"border: 2px solid #1D058D; margin: 25px 10px 20px 10px; padding: 5px 5px 5px 5px; \" >
              
                 <h2  style=\"text-align:center; color: White; font-size: 200%; margin: 0px 0px 0px 0px; background-color : #1D058D; padding: 15px 5px 15px 5px;\"> C.D.A SYSTEM .....</h2>               
					<p style=\"text-align:left;  margin: 25px 10px 10px 20px;\">
						Address : Muqdisho, Banaadir <br>
						Deg : Howl Wadaag Tell: 602203 <br>
						Email : example@gmail.com <br>
					</p>
					
					
					<h3 style=\"text-align:left;  margin: 25px 10px 10px 20px;\"> C.D.A SYSTEM </h3>
					
					<table cellpadding=\"10\" width=\"100%\">
						<tr>
							<td></td>		
							<td><strong>Company Name : </strong>" . $Com_name ." </td>
						</tr>		
					</table>	


					<p style=\"text-align:left;  margin: 10px 20px 10px 20px;\"> Ku soo dhawoow foomka diiwaangelinta codsiga system_ka!  Waan ku faraxsanahay
					inaad xiisaynayso inaad codsato si aad u isticmaasho System_kaan. Systamkaan waxaa												   
					loo qaabeeyey inuu u ahaado mid u fudud isticmaalaha Systemka.
					</p>

					<strong>Isticmaale  Si aad Systemka u isticmaashid Waxaad Boqataa https://systemcda.epizy.com </strong> <br>
					<strong>Qaybta EMAIL ID Waxaad Galisaa :  </strong>".$Email_user  . "<br/>

					<strong>Si Aad u sameysato password kuu gaar ah fadlan riix linkigaan  :  </strong> <a  href=\"http://localhost/TestingPhp/deskapp_cda/Password_gen/index.php?edit=".$ID_gmail ."\"> Create New Password </a> <br/>
					<p>Kadib Sign in Taabo Si aad Systemka Gudaha ugu Gashid.  </p> <br/><br><br>

					<table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"\" >
						<tr>
							<th>
							<Strong>User Information : </strong>
							</th>		
							<th></th>
						
						</tr>
						<tr>
							<th></th>		
							<td><strong>User Name : </strong>" .$Name. "<br/>
							<strong>Company Name : </strong>" .$Com_name ."<br/>
							<strong>Email: </strong>" .$Email_user."<br/>
							<strong>Address: </strong>" .$Address ."<br/>
							<strong>Phone Number : </strong>".$Phone  ."<br/>
							<strong>User Type : </strong>" .$Role  ."<br/>
							</td>						
						</tr>					
					</table>				

					<br><br><br>


					<h4> Waxii Faafaahin ah Kala Soo Xaririr:</h4><br>
					<table  cellpadding=\"10\" cellspacing=\"0\" width=\"100%\">
						<tr>
							<td>
							
							<p>
							Phone Number : +252613231772 <br>			
							Tell : 600000 <br>
							Email : nursiyad2022@gmail.com <br>			
							Whatsapp Number : +252613231772	<br>

							</p><br><br><br>

							</td>		
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							Signature of Secretary <br>
								<br>
								
							<strong>Professor </strong>" .$Message ."<br/>
							______________________
							</th>
						</tr>						
					</table>	           
              
              </body>
       </html>";
       //Add recipient
           $mail->addAddress('nursiyad2022@gmail.com');
       //Finally send email
           if ( $mail->send() ) {
            ?>
            <script>alert('Email Sent Successfully . ');</script>;            
            <?php
             mysqli_query($conn,"update apply_form set Send_email='1' where id='$get_id' ") or die(mysqli_error());
            ?>
                <script>       
               window.location = "feedback_req.php"; 
               </script>
                <?php	
           }else{
            ?>
            <script>alert('Message could not be sent. Mailer Error ');</script>;
            <script>
            window.location = "feedback_req.php"; 
            </script>
             <?php
              // echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
           }
       //Closing smtp connection
           $mail->smtpClose();
	}	
}
?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4> View Feedback</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="feedback_req.php">Back</a></li>
									<li class="breadcrumb-item active" aria-current="page">Feedback</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									
									$query = mysqli_query($conn,"SELECT * FROM apply_form where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Full Name :</label>
											<input name="name" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
										</div>
									</div>							

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label> Company Name :</label>
											<input name="Company_name" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Company_name']; ?>">
										</div>
									</div>								
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Email Address :</label>
											<input name="Email" type="gmail" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Email']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Phone Number :</label>
											<input name="Phone" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Phone']; ?>">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-2 col-sm-12">
										<div class="form-group">
											<br><p> Description : </p>
										</div>
									</div>	
								
									<div class="col-md-10 col-sm-12">
										<div class="form-group">										
											<textarea name="memo" type="text" class="form-control" required="true" autocomplete="off" readonly ><?php echo $row['Memo']; ?></textarea>
										</div>
									</div>								
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Address :</label>
											<input name="Address" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $row['Address']; ?>">
										</div>
									</div>		
										<?php $stats=$row['Status'];
										if($stats=="0"){
											$Status = "Pending";
										}elseif($stats=="1"){
											$Status = "Processing";
										}elseif($stats=="2"){
											$Status = "Approved";
										}elseif($stats=="3"){
											$Status = "Rejected";
										}
										?>								                                 
											

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Status :</label>
											<input name="Status" type="text" class="form-control wizard-required" required="true" autocomplete="off"  readonly value="<?php echo $Status?>">
										</div>
									</div>		
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">									
              
												<a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"><i class="dw dw-email-1"></i> Send Email</a>

											</div>
										</div>
									</div>							
								</div>		
							</section>

						</form>
					</div>
				</div>


				
                <!-- Take Action Medium modal -->
                <div class="col-md-4 col-sm-12 mb-30">				
                    <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Send Feedback Email</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>                                    
                                <div class="modal-body">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM apply_form  where id='$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

                                    <form id="add-event" method=post>
                                        <div class="modal-body">
                                        
											<div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>From :</label>
                                                    <input name="From" type="text" class="form-control" readonly required="true" autocomplete="off" value="CDA System <siyaadgeneralservice@gmail.com>">
                                                </div>
                                            </div>	
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>To :</label>
                                                    <input name="To" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Email'];?>">
                                                </div>
                                            </div>   
                                          
                                            <?php
                                            $gmail = $conn->query("SELECT Email as email from `apply_form` where id='$get_id'  ")->fetch_assoc()['email'];
                                            $query1 = mysqli_query($conn,"SELECT * FROM user  where Email='$gmail'")or die(mysqli_error());
											$row1 = mysqli_fetch_array($query1);
											$count = mysqli_num_rows($query1);

											if($count < 1)
											{
											?>
												<div class="col-md-12 col-sm-12">
													<div class="form-group" data-toggle="tooltip" data-placement="bottom" title="Please Check The Email or Register the User  ">
														<label >Name :</label>
														<input name="Name" type="text" class="form-control" readonly required  autocomplete="off" value="User Not Found" >
													</div>
                                        	    </div> 
											<?php
											} else {
											?>
											
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<label>Name :</label>
														<input name="Name" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row1['Name'];?>">
													</div>
                                        	    </div> 
										
                                            
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" name="Message" required autocomplete="off" ></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="send" class="btn btn-primary" >Send</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
										<?php
											}
                                            ?>
                                    </form>
									
                                </div>
                               
                            </div>
                        </div>
                    </div>					
                </div>


			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>