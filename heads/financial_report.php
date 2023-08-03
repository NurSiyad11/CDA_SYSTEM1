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
                
            
                <div class="row">                                                                   
                    <div class="col-xl-4 mb-30">
                        <?php					
                        $RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];	
                        $format =number_format((float)$RV, '2','.',',');
                        ?> 
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="">
                                    <!-- <img src="../uploads/dollor1.png" class="border-radius-100 shadow" width="80" height="80" alt=""> -->
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">

                                </div>
                                </div>
                                <div class="widget-data">
                                    <div class="h5 mb-0"><?php echo "$ ". ($format); ?></div>
                                    <div class="weight-600 font-14">Total In</div>
                                </div>
                            </div>
                            <div class="card-box "></div>
                        </div>
                    </div>
                    

                

                    <div class="col-xl-4 mb-30">
                        <?php
                        $PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
                        $format =number_format((float)$PV, '2','.',',');
                        ?> 
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="">
                                    <!-- <img src="../uploads/cash3.png" class="border-radius-100 shadow" width="80" height="80" alt=""> -->
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
        
                                </div>
                                </div>
                                <div class="widget-data">
                                    <div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
                                    <div class="weight-600 font-14">Total Out</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-30">
                       <?php
                            $RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
                            $PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
                            $Bal = $RV - $PV;
                            $format =number_format((float)$Bal, '2','.',',');
                        ?> 
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="">
                                    <!-- <img src="../uploads/cash3.png" class="border-radius-100 shadow" width="80" height="80" alt=""> -->
                                    <img src="../vendors/images/img/dollar3.png" class="border-radius-100 shadow" width="40" height="40" alt="">
        
                                </div>
                                </div>
                                <div class="widget-data">
                                    <div class="h4 mb-0"><?php echo "$ ". ($format); ?></div>
                                    <div class="weight-600 font-14">Balance</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <div class="pd-20 card-box mb-30">
                    <div class="pb-20">
                    <div class="row">	
                        <div class="col-3">
                          <h2 class="text-blue h4">Cash In & Out</h2>	
                        </div>
                        <div class="col-9">
                            <div class="col-md-12 col-sm-12 text-right">
                                <button class="bg-light-blue btn text-blue weight-500"  type="button" id="downloadexcel" class="btn btn-primary">Export to Excel</button>
                            </div>
                        </div>	
                       
                        	
                        
                      
							
						</div>                                                             
                       
                    </div>
                    <table id="example-table" class="data-table table stripe hover nowrap">
                            <thead class="table-dark">
                                <tr>
                                    <th>NO#</th>
                                    <th class="datatable-nosort">Name</th>
                                    <th class="datatable-nosort" >##</th>
                                    <th class="datatable-nosort" > No#</th>
                                    <th class="datatable-nosort" >Date </th>
                                    <th class="datatable-nosort" >Account Name</th>
                                    <th class="datatable-nosort" >Debit</th>
                                    <th class="datatable-nosort" >Credit</th>   
                                    <th class="datatable-nosort" >Balance</th>                              
                
                                </tr>
                            </thead>                             
                                <tr>
                                    <?php
                                    $i =1;
                                    $income= 0;
                                    $expense =0;
                                    $Total=0;

                                    $Bala = 0;

                                 $query = mysqli_query($conn,"SELECT id,Acc_id,name,D_RV,RV,Date,Memo,Amount,empty   FROM cash_receipt    UNION All SELECT id,Acc_id,name,D_PV,PV,Date,Memo,empty,Amount FROM cash_payment    ORDER BY Date asc") or die(mysqli_error()); 
                                 while ($row = mysqli_fetch_array($query)) {
                                    $id = $row['id'];
                                  
                                        ?>

                                    <td><?php echo $i++; ?></td>
                                    <td class="table-plus">
                                        <div class="name-avatar d-flex align-items-center">                                            
                                            <div class="txt">
                                                <div class="weight-600"><?php echo $row['name'] . " " ; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td><?php echo  $row['D_RV']; ?></td>
                                    <td><?php echo  $row['RV']; ?></td>
                                    <td><?php echo $row['Date']; ?></td>


                                    <?php
                                    $Ac_id= $row['Acc_id'];
                                    $Acc_name = $conn->query("SELECT Acc_name as Acc_name from `account` where id='$Ac_id'  ")->fetch_assoc()['Acc_name']; 

                                    ?>
                                    <td><?php echo $Acc_name ;?></td>
                                    <td><?php echo "$ ". number_format((float)$row['Amount'], '2','.',','); ?></td>
                                    <td><?php echo "$ ". number_format((float)$row['empty'], '2','.',','); ?></td>
                                    <!-- <td><?php //echo "$ ". number_format((float)$row['balance'], '2','.',','); ?></td> -->
                                    <?php
                                   // $Bala= $row['balance'];
                                    $in= $Bala + $row['Amount'];
                                    $out= $row['empty'];
                                    $Bala= $in - $out;                                

                                    ?>
                                    <td><?php echo "$ ". number_format((float)$Bala, '2','.',','); ?></td>

                                    <!-- <td><?php echo  $row['Amount']; ?></td> -->
                                    <!-- <td><?php echo  $row['empty']; ?></td> -->
                            
                                    
                                </tr>
                                <?php 
                                
                                $total_income= $row['Amount'];
                                $income += $total_income;

                                
                                $total_exp = $row['empty'];
                                $expense += $total_exp;

                                $Total=$income - $expense;
                                ?>
                                <?php                               
                            }  ?>  
                            </tbody>
                            <tfoot class="">
                                <th></th>
                                <th class="table-plus"></th>
                                <th> </th>								
                                <th></th>
                                
                                <th></th>
                                <th>Total</th>
                                <th><?php echo "$ ". number_format((float)$income, '2','.',',');  ?></th>
                                <th><?php echo "$ ". number_format((float)$expense, '2','.',',');  ?></th>
                                <th><?php echo "$ ". number_format((float)$Total, '2','.',',');  ?></th>
                                
                                <!-- <th><?php //echo $to ?></th> -->
                            </tfoot>
                        </table>
                        <!-- <script>
                            document.getElementById('downloadexcel').addEventListener('click', function(){
                                var table2excel = new Table2Excel();
                                    table2excel.export(document.querySelectorAll("#example-table"));
                            })
                        </script> -->
                </div>         

			   			
			<?php include('includes/footer.php'); ?>
		</div>
	</div>

	<!-- js -->
    <?php  include('includes/scripts2.php'); ?>





    
	<!-- js -->



</body>
</html>