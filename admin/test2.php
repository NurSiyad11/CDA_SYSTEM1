<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<?// $get_id = $_GET['edit']; ?>

<?php
$msg="";
	if(isset($_POST['submit1']))
	{
	// Authorisation details.

    // $username =$_POST['Name']; 
	// $hash = $_POST['Hash']; 

    $curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_URL, 'https://smsapi.hormuud.com/token');
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('Username' => 'NuurSiyaad', 'Password' => '123Nur789', 'grant_type' => 'test')));

		$response = curl_exec($curl);

		$character = json_decode($response);

		$headers = array("Content-Type: application/json; charset=utf-8","Authorization: Bearer ".$character->access_token);

		$data = array(
		"mobile" => "613231772",
		"message" => "SMS Context Welcome ",
		"senderid" => "Nuur "
		);

		$url = 'https://smsapi.hormuud.com/api/SendSMS';

		$postdata = json_encode($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
        $msg = $result;
		curl_close($ch);

    }
?>



<?php
	// if(isset($_POST['submit']))
	// {   
	// $Date=$_POST['Date']; 	
	// $Message=$_POST['Message'];	
	// $Status=$_POST['Status']; 
	// $Memo=$_POST['Memo']; 	
	     
    //  $cid = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];

    //     mysqli_query($conn,"INSERT INTO debt_reminder(Cid,Date,Message,Status,Memo) 
	// 	VALUES('$cid','$Date','$Message','$Status','$Memo')         
	// 	") or die(mysqli_error()); ?>
	// 	<script>//alert('Record Successfully  Submited');</script>;
	// 	<script>
	// 	window.location = "Cust_Report.php"; 
	// 	</script>
	// 	<?php  // }
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
								<h4>Customer Transection</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Cust_Report.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">Customer Details </li>

								</ol>
							</nav>
						</div>
					</div>
				</div>



          








<div class="row">
    <div class="col">
        <label for=""><?php echo ($msg);?></label>
    </div>
</div>
				<div class="pd-20 card-box mb-30">
                    <div class="modal-body">
                        
                        <form id="add-event" method=post>
                            <div class="modal-body">
                                <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="Name" required="true" >
                                </div>
                                <div class="form-group">
                                    <label>Hash</label>
                                    <input type='text' class="form-control" name="Hash" required="true" >
                                </div>
                                
                                <div class="form-group">
                                    <label>Sender</label>
                                    <input type='text' class="form-control" name="Sender" required="true" >
                                </div>
                                <div class="form-group">
                                    <label>Number</label>
                                    <input type='text' class="form-control" name="Number" required="true"  >
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="Message" required  ></textarea>
                                </div>
<!--                                 
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="Status">
                                        <option value="Show">Show</option>
                                        <option value="Hide">Hide</option>
                                        
                                    </select>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="Memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text"></textarea>
                                    </div>
                                </div>	 -->
                                <!-- <div class="form-group">
                                    <label>Event Icon</label>
                                    <select class="form-control" name="eicon">
                                        <option value="circle">circle</option>
                                        <option value="cog">cog</option>
                                        <option value="group">group</option>
                                        <option value="suitcase">suitcase</option>
                                        <option value="calendar">calendar</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit1" class="btn btn-primary" >Submit</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>





                    
					<!-- Medium modal -->
                    <div class="col-md-4 col-sm-12 mb-30">				
                        <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Dept Reminder</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>                                    
                                    <div class="modal-body">
                                        <?php
                                            // $query = mysqli_query($conn,"SELECT user.Name,user.Email, user.Picture, tbl_order.id, tbl_order.Date, tbl_order.Reason, tbl_order.Status FROM tbl_order INNER JOIN user ON   tbl_order.Cid=user.id where tbl_order.id='$get_id'")or die(mysqli_error());
                                            $query = mysqli_query($conn,"select * from user where Role='Customer' AND ID='$get_id' ") or die(mysqli_error());
                                            $row = mysqli_fetch_array($query);
                                            ?>

                                        <form id="add-event" method=post>
                                            <div class="modal-body">
                                                <!-- <h4 class="text-blue h4 mb-10">Add Event Detai</h4> -->
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" name="name" required="true" autocomplete="off"  readonly value="<?php echo $row['Name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type='text' class="form-control" name="Com_name" required="true" autocomplete="off"  readonly value="<?php echo $row['Com_name']; ?>">
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Balance</label>
                                                    <input type='text' class="form-control" name="Com_name" required="true" autocomplete="off"  readonly value=" <?php echo "$ " .($format_balance); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type='date' class="form-control" name="Date" required="true" autocomplete="off" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control" name="Message" required autocomplete="off" >Xasuusin. Asc <?php echo $row['Name']; ?>  , Haraaga xisaabta deynta laguugu leeyahay waa <?php echo "$ " .($format_balance); ?> Wixii faahfaahin ah kala xiriir 2323232</textarea>
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="Status">
                                                        <option value="Show">Show</option>
                                                        <option value="Hide">Hide</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="Memo" style="height: 5em;" placeholder="Description" class="form-control text_area" type="text"></textarea>
                                                    </div>
                                                </div>	
                                                <!-- <div class="form-group">
                                                    <label>Event Icon</label>
                                                    <select class="form-control" name="eicon">
                                                        <option value="circle">circle</option>
                                                        <option value="cog">cog</option>
                                                        <option value="group">group</option>
                                                        <option value="suitcase">suitcase</option>
                                                        <option value="calendar">calendar</option>
                                                    </select>
                                                </div> -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
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
	<?php include('includes/scripts2.php')?>

<!-- js -->





</body>
</html>