<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Supplier Transection</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Supplier_report.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">Vendor Details </li>
								</ol>
							</nav>
						</div>
					</div>
				</div> -->



                <div class="row">
                    <div class="col-xl-4 mb-30">
                        <?php 		                    
                            $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                            $Total = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice` where Vid='$today'  ")->fetch_assoc()['total'];
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
                                    <div class="weight-300 font-15">Vendor Invoices </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-30">
                    
                        <div class="card-box height-100-p widget-style1 bg-white">
                            <?php                                      
                                $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                $Total = $conn->query("SELECT sum(Amount) as total FROM `ven_payment` where Vid='$today'  ")->fetch_assoc()['total'];
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
                                    <div class="weight-300 font-15">Vendor Payment</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-30">
                        <div class="card-box height-100-p widget-style1 bg-white">
                            <?php 
                                $today = $conn->query("SELECT id as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];
                                $INV = $conn->query("SELECT sum(Amount) as total FROM `ven_invoice` where Vid='$today'  ")->fetch_assoc()['total'];
                                $RV = $conn->query("SELECT sum(Amount) as total FROM `ven_payment` where Vid='$today'  ")->fetch_assoc()['total'];
                                $Bal = $INV - $RV;
                                $format3 =number_format((float)$Bal, '2','.',',');										
                            ?>	
                            <div class="d-flex flex-wrap align-items-center">	
                                <div class="progress-data">
                                    <div id="">
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                                    </div>
                                </div>						
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format3); ?></div>
                                    <div class="weight-300 font-15">Balance </div>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>



				<div class="pd-20 card-box mb-30">
                    <?php
                      $ven_name = $conn->query("SELECT name as name from `user` where id='$get_id'  ")->fetch_assoc()['name'];  
                      $ven_Com_name = $conn->query("SELECT Com_name as C_name from `user` where id='$get_id'  ")->fetch_assoc()['C_name']; 
                    ?>
                    
				
                    <div class="card-box mb-30">
                       
                        <div class="" >                               
                            <!-- <div class="row">
                                <div class="col-8">
                                <h2 class="text-blue h4"><?php// echo "Company Name:  $ven_Com_name"?></h2>

                                </div>
                                <div class="col-4">
                                <p class="text-blue "><?php //echo "Vendor Name:  $ven_name"?></p>

                                </div>
                            </div>  -->
                            <div class="row">
                                <div class="col-1">                       
                                    <button  class="bg-light-blue btn text-blue weight-500"  type="button"><a href="Supplier_report.php">Back </a></button>
                                 </div>
                                <div class="col-4">
                                    <div class="col-md-12 col-sm-12 text-left">
                                        <p class="text-blue "><?php echo "  $ven_Com_name"?></p>

                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="col-md-12 col-sm-12 text-right">
                                        <p class="text-blue "><?php echo "Vendor Name:  $ven_name"?></p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="col-md-12 col-sm-12 text-right">
                                        <button class="bg-light-blue btn text-blue weight-500"  type="button" id="downloadexcel" class="btn btn-primary">Export</button>
                                    </div>
                                </div>
                              
                            </div>

                        </div>
                            
                        <div class="pb-20">
                            <table id=example-table class="data-table table stripe hover nowrap">
                                <thead class="bg-dark text-white">
                                    <tr>				
                                        <th> No#</th>                                       
                                        <th class="datatable-nosort"> ##</th>							
                                        <th class="datatable-nosort"> Vendor INV No#</th>
                                        <th class="datatable-nosort">Date</th>
                                        <th class="datatable-nosort">Description</th>
                                        <th class="datatable-nosort">Invoice</th>
                                        <th class="datatable-nosort">Payment</th>
                                        <th class="datatable-nosort">Balance</th>
                                                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>	
                                    <?php
									//$query = mysqli_query($conn,"SELECT user.Name, invoice.id, invoice.Cid,invoice.invoice ,invoice.Amount,invoice.Date,invoice.Memo,invoice.File,invoice.Status FROM invoice INNER JOIN user ON   invoice.Cid=user.ID  where invoice.id = '$get_id' ")or die(mysqli_error());
									//$new_row = mysqli_fetch_array($query);
									?>
					

                                        <?php 						
                                        $i =1;
                                        $bal=0;
                                        $Vname = $conn->query("SELECT id as Vid from `user` where id='$get_id'  ")->fetch_assoc()['Vid'];
                                        $sql = "SELECT id,D_INV, V_invoice,Date,Memo,Amount,empty FROM ven_invoice where Vid='$Vname' UNION All SELECT id,D_PV, V_payment,Date,Memo,empty,Amount FROM ven_payment where Vid='$Vname'  order by Date asc ";
                                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                    
                                        ?>  
                                        <td ><?php echo $i++; ?></td>
                                       
                                        <td><?php echo  $row['D_INV']; ?></td>
                                        <td><?php echo  $row['V_invoice']; ?></td>
                                        <td><?php echo  $row['Date']; ?></td>								
                                        <td><?php echo $row['Memo']; ?></td>
                                        <td><?php echo $row['Amount']; ?></td>
                                        <td><?php echo $row['empty']; ?></td>
                                        <!-- <td><?php echo $row['balance']; ?></td> -->

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

                    
					<!-- add task popup start -->
					<div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Change Passord</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body pd-0">
									<div class="task-list-form">
										<?php                                  
										//$query = mysqli_query($conn,"select * from user where id = '$id' ")or die(mysqli_error());
										//$row = mysqli_fetch_array($query);
										?>
										<ul>
											<li>
                                                <section>
                                                    <div class="row">
                                                        <?php

                                                        $teacher_query = mysqli_query($conn,"select * from invoice where Cid='$get_id' ") or die(mysqli_error());
                                                        while ($row = mysqli_fetch_array($teacher_query)) {
                                                        $id = $row['id'];
                                                        $today= $conn->query("SELECT id as eid from `invoice` where id='$id' ")->fetch_assoc()['eid'];
                                                        
                                                        $sql="SELECT File from invoice where id='$today' ";
                                                        $query=mysqli_query($conn,$sql);
                                                        while ($info=mysqli_fetch_array($query)) {
                                                            ?>
                                                            <?php
                                                            if($info !=''){
                                                            ?>                                       
                                                                <embed type="application/pdf" src="invpdf/<?php echo $info['File'] ; ?>" width="900" height="500">
                                                            <?php
                                                            }else{
                                                                echo "No file found";                                     
                                                            ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        <?php
                                                        } }
                                                        ?>
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

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>







</body>
</html>