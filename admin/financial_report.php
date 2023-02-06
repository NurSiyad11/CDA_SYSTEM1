<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<body>	
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

    <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
                		                    
                <div class="row pb-10">
                    <div class="col-xl-4 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">           

                            <?php					
                            $RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];	
                            $format =number_format((float)$RV, '2','.',',');
                            ?> 

                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-20 text-dark"><?php echo "$ ". ($format);?></div>
                                    <div class="font-16 text-secondary weight-500">Total Cash In</div>
                                </div>
                                <!-- <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-money-1"></i></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">



                            
                            <?php

                            $PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
                            $format =number_format((float)$PV, '2','.',',');
                            ?> 

                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-20 text-dark"><?php echo "$ ". htmlentities($format); ?></div>
                                    <div class="font-16 text-secondary weight-500">Total Cash out</div>
                                </div>
                                <!-- <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-money-1"></span></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">

                            
                            <?php
                            
                            $RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
                            $PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
                            $Bal = $RV - $PV;
                            $format =number_format((float)$Bal, '2','.',',');

                            ?> 

                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-20 text-dark"><?php echo "$ ". ($format); ?></div>
                                    <div class="font-16 text-secondary weight-500">Balance</div>
                                </div>
                                <!-- <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-money-2" aria-hidden="true"></i></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                  
            </div>





            <div class="card-box mb-10">
                <div class="pd-20">
                    <h2 class="text-blue h4">Cash in And Cash Out</h2>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>NO#</th>
                                <th class="table-plus">Name</th>
                                <th>##</th>
                                <th> No#</th>
                                <th>Date </th>
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>                              
          
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php
                                $i =1;
                                $teacher_query = mysqli_query($conn,"SELECT id,name,D_RV,RV,Date,Memo,Amount,empty   FROM cash_receipt   UNION All SELECT id,name,D_PV,PV,Date,Memo,empty,Amount FROM cash_payment ORDER BY Date desc;") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['id'];
                                    ?>

                                <td><?php echo $i++; ?></td>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <!--
                                            <img src="<?php echo (!empty($row['Location'])) ? '../uploads/'.$row['Location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
                                            -->

                                        </div>
                                        <div class="txt">
                                            <div class="weight-600"><?php echo $row['name'] . " " ; ?></div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td><?php echo  $row['D_RV']; ?></td>
                                <td><?php echo  $row['RV']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['Memo']; ?></td>
                                <td><?php echo  $row['Amount']; ?></td>
                                <td><?php echo  $row['empty']; ?></td>
                      
                             
                            </tr>
                            <?php } ?>  
                        </tbody>
                    </table>
                </div>
            </div>

			   			
			<?php include('includes/footer.php'); ?>
		</div>
	</div>







    
	<!-- js -->



<!-- js -->

<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<script src="../vendors/scripts/datatable-setting.js"></script></body>


</body>
</html>