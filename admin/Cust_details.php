<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>

<?php
	if(isset($_POST['submit']))
	{   
	$Title=$_POST['Title']; 	
	$Message=$_POST['Message'];	
	$Status=$_POST['Status']; 
	$Memo=$_POST['Memo']; 	
	     
     $cid = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];

        mysqli_query($conn,"INSERT INTO debt_reminder(Cid,Title,Message,Status,Memo) 
		VALUES('$cid','$Title','$Message','$Status','$Memo')         
		") or die(mysqli_error()); ?>
        <Script>
			window.addEventListener('load',function(){
				swal.fire({
					title: "Success",
					text: "Record Successfully Updated",
					icon: "success",
					button: "Ok Done!",
				})
				.then(function() {
							window.location = "Cust_details.php?edit=" + <?php echo ($get_id); ?>;
						});
			});			
		</Script>
		<?php   }
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
                        <div class="col-md-6 col-sm-12 text-right">
                         <?php     
                                    $admin_rol = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
                                    if($admin_rol == 'Administrator'){                                   
                                ?>
                                <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal"> <i class="icon-copy ion-plus "></i> Dept Reminder</a>
                           <?php  }?>
						</div>                     
					</div>
				</div>



                <div class="row">
                    <div class="col-xl-4 mb-30">
                        <?php 		                    
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today'  ")->fetch_assoc()['total'];
                            $format =number_format((float)$Total, '2','.',',');                                               									
                        ?>  
                        <div class="card-box height-100-p widget-style1 bg-white">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format); ?></div>
                                    <div class="weight-300 font-15">Invoices </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-30">
                    
                        <div class="card-box height-100-p widget-style1 bg-white">
                         <?php                                 
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today'  ")->fetch_assoc()['total'];
                            $format2 =number_format((float)$Total, '2','.',',');                        										
                        ?>   
                            <div class="d-flex flex-wrap align-items-center ">	
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>						
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format2); ?></div>
                                    <div class="weight-300 font-15">Receipts</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-30">
                        <div class="card-box height-100-p widget-style1 bg-white">
                            <?php 
                                $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `invoice` where Cid='$today'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `receipt` where Cid='$today'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format_balance =number_format((float)$Bal, '2','.',',');										
                            ?>	
                            <div class="d-flex flex-wrap align-items-center">	
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>						
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format_balance); ?></div>
                                    <div class="weight-300 font-15">Balance </div>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>










				<div class="pd-20 card-box mb-30">
                    <?php
                      $cust_name = $conn->query("SELECT name as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid']; 
                      $com_name = $conn->query("SELECT Com_name as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];  
                    ?>                    
				
                    <div class="card-box mb-30">                                     
                        <div class="row">
                            <div class="col-7">
                                <h2 class="text-blue h4"><?php echo "Company Name:  $com_name"?></h2>
                            </div>
                            <div class="col-5">
                                <p class="text-blue "><?php echo "Customer Name:  $cust_name"?></p>

                            </div>
                        </div>                                                        


                        <!-- Table Display data -->
                        <div class="pb-10">
                            <table class="data-table table stripe hover nowrap">
                                <thead class="bg-dark text-white">
                                    <tr>				
                                        <th> No#</th>     
                                        <th class="datatable-nosort">ACTION</th>                                    
                                        <th class="datatable-nosort"> ##</th>							
                                        <th class="datatable-nosort"> Invoice No#</th>
                                        <th class="datatable-nosort">Date</th>
                                        <th class="datatable-nosort">Description</th>
                                        <th class="datatable-nosort">Invoice</th>
                                        <th class="datatable-nosort">Receipt</th>
                                        <th class="datatable-nosort">Balance</th>                               
                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>	
                                        <?php 						
                                        $i =1;
                                        $bal=0;
                                        $Cname = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                        $sql = "SELECT id,D_INV,invoice,File,Date,Memo,Amount,empty FROM invoice where Cid='$Cname' UNION All SELECT id,D_RV,RV,File,Date,Memo,empty,Amount FROM receipt where Cid='$Cname'  order by Date asc ";
                                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {                                    
                                        ?>  
                                        <td ><?php echo $i++; ?></td>
                                        <?php
                                        if($row['D_INV'] == 'INV#'){
                                        ?>
                                         <td><button data-id='<?php echo $row['id']; ?>' class="userinfo btn btn-danger">Inv PDF</button></td>
                                         <?php
                                           }else {
                                            ?>
                                            <td><a href="A5pdf2.php?edit=<?php echo $row['id']?>" name="receipt" id="receipt" class="btn btn-danger"> <i class="icon-copy dw dw-"></i>Rv PDF</a></td>
                                            <?php
                                           } 
                                        ?> 
                                        <td><?php echo  $row['D_INV']; ?></td>
                                        <td><?php echo  $row['invoice']; ?></td>
                                        <td><?php echo  $row['Date']; ?></td>								
                                        <td><?php echo $row['Memo']; ?></td>
                                        <td><?php echo "$ ". number_format((float)htmlentities($row['Amount']),'2','.',','); ?></td>
								        <td><?php echo "$ ". number_format((float)htmlentities($row['empty']), '2','.',','); ?></td>

                                        <?php 
                                        $in = $bal + $row['Amount'];;
                                        $out= $row['empty'];
                                        $bal = $in - $out;
                                        ?>
                                        <td><?php echo "$ ". number_format((float)htmlentities($bal),'2','.',','); ?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>            
				     

					<!-- Dept reminder popup  Medium modal -->
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
                                            $query = mysqli_query($conn,"select * from user where Role='Customer' AND ID='$get_id' ") or die(mysqli_error());
                                            $row = mysqli_fetch_array($query);
                                            ?>

                                        <form id="add-event" method=post>
                                            <div class="modal-body">
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


                                                <!-- Message Display automatic  -->
                                                <div class="form-group">
                                                    <label>Title 2</label>
                                                    <select name="Title" id="Tid" class="custom-select form-control" required="true" autocomplete="off">
                                                        <option value="">Select Title</option>
                                                        <?php
                                                        $query = mysqli_query($conn, "SELECT * FROM reg_debt_reminder where Status='1' ");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                            <option value="<?php echo $row['Title']; ?>"><?php echo $row['Title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control" name="Message" id="message" required autocomplete="off"> jhgdsjhgds </textarea>
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

                                                <!-- Script Automatic Display Mesage acording Title -->
                                                <script>
                                                    // Get the select element
                                                    var select = document.getElementById("Tid");
                                                    // Get the message textarea
                                                    var messageTextarea = document.getElementById("message");

                                                    // Add event listener for the "change" event
                                                    select.addEventListener("change", function() {
                                                        // Get the selected title
                                                        var selectedTitle = select.value;

                                                        // Send an AJAX request to retrieve the message for the selected title
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.onreadystatechange = function() {
                                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                                // Update the message textarea with the retrieved message
                                                                messageTextarea.value = xhr.responseText;
                                                            }
                                                        };
                                                        xhr.open("POST", "get_message.php", true);
                                                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                        xhr.send("SelectedTitle=" + selectedTitle);
                                                    });
                                                </script>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>                              
                                </div>
                            </div>
                        </div>					
                    </div>                  
				</div>


                <!-- add task popup start PDF FILE Display Modal-->
                <div class="modal fade customscroll" id="empModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">File Pdf</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-0">
                                <div class="task-list-form">
                                    <ul>
                                        <li>
                                            <section>
                                                <div class="row">
                                                    <div class="col-6">

                                                        </div>
                                                    </div>
                                                
                                                </div>                                
                                            </section>
                                                        
                                        </li>											
                                    </ul>
                                </div>									
                            </div>								
                        </div>
                    </div>
                </div>
                <!-- add task popup End -->    



			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>
</body>
</html>