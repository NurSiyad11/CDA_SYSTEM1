<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
//  if(isset($_GET['edit'])){  $get_id =  $_GET['edit']; }else{ $get_id =  $_GET['edit'] ;};

$get_id = $_GET['edit'];

//  if(isset($_GET['from_date']) && isset($_GET['to_date'])){
//     $get_id = $_GET['edit'];
//  }
//  if(isset($_GET['refresh'])){
//     $get_id = $_GET['edit'];
//  }

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
								<h4>Account Transection</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="financial_report2.php">Back </a></li>
									<li class="breadcrumb-item active" aria-current="page">Account Details </li>
								</ol>
							</nav>
						</div>
					</div>
				</div>





                <div class="pd-20 card-box mb-30">
                    <?php
                        $Account_name = $conn->query("SELECT Acc_name as Acc_id from `Account` where id='$get_id'  ")->fetch_assoc()['Acc_id']; 
                    //   $com_name = $conn->query("SELECT Com_name as cid from `user` where id='$get_id'  ")->fetch_assoc()['cid'];  
                    ?>
                    <div class="pb-20">
                        <h2 class="text-blue h4"><?php echo "Account Name:  $Account_name"?></h2>

                        <!-- <div class="container pd-5">
                            <?php                     
                            // $F_date=date('Y-m-01');
                            // $T_date=date('Y-m-d');                   
                            ?>
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="from-group">
                                            <label > From Date  </label>
                                            <input type="date" name="from_date" class="form-control" value="<?php// if(isset($_GET['from_date'])){ echo $_GET['from_date']; }else{ echo "$F_date"; }; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="from-group">
                                            <label > To Date  </label>
                                            <input type="date" name="to_date" class="form-control" value="<?php// if(isset($_GET['to_date'])){ echo $_GET['to_date']; }else{ echo "$T_date";} ?>" >
                                        </div>
                                    </div>
                                    <input type="hidden" name="edit" class="form-control" value="<?php// if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >

                                   

                                    <div class="col-4">
                                        <div class="from-group">
                                            <label > Click to Filter  </label> <br>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <button type="submit" name="refresh" class="btn btn-primary">All</button>
                                          
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> -->

                        
                     
                        <table class="data-table table stripe hover nowrap">
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



                                   // if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['edit'])){
                                        // $get_id= $_GET['edit'];
                                       // $from_date= $_GET['from_date'];
                                      //  $to_date= $_GET['to_date'];
                                      //  $query = mysqli_query($conn,"SELECT id,name,Acc_id,D_RV,RV,Date,Memo,Amount,empty FROM cash_receipt where Acc_id = '$get_id'    UNION All SELECT id,name,Acc_id,D_PV,PV,Date,Memo,empty,Amount   FROM cash_payment where Acc_id = '$get_id'  ORDER BY Date asc") or die(mysqli_error());
                                       // $balance_1 = $conn->query("SELECT Date,Amount,empty, (Amount - empty ) as balance FROM cash_receipt where Acc_id = '$get_id' and Date < '$from_date' AND '$to_date'    UNION All SELECT Date,empty,Amount,(Amount - empty ) as balance  FROM cash_payment where Acc_id = '$get_id' and Date < '$from_date' AND '$to_date'   ")->fetch_assoc()['balance']; 


                                    //}if(isset($_GET['refresh'])){
                                     //  $query = mysqli_query($conn,"SELECT id,name,Acc_id,D_RV,RV,Date,Memo,Amount,empty   FROM cash_receipt where Acc_id = '$get_id'   UNION All SELECT id,name,Acc_id,D_PV,PV,Date,Memo,empty,Amount FROM cash_payment where Acc_id = '$get_id'   ORDER BY Date asc") or die(mysqli_error());
    
                                  //  }
                                   // $query_1 = mysqli_query($conn,"SELECT id,name,Acc_id,D_RV,RV,Date,Memo,Amount,empty, (Amount - empty ) as balance FROM cash_receipt where Acc_id = '$get_id' and Date < '$from_date' AND '$to_date'    UNION All SELECT id,name,Acc_id,D_PV,PV,Date,Memo,empty,Amount,(Amount - empty ) as balance  FROM cash_payment where Acc_id = '$get_id' and Date < '$from_date' AND '$to_date'  ORDER BY Date asc") or die(mysqli_error());

                                    ?>
                                    
                                    <!-- <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php //echo $balance_1 ?></td>
                                    </tr> -->
                                    <?php
                                    
                                  //  $query = mysqli_query($conn,"SELECT id,name,Acc_id,D_RV,RV,Date,Memo,Amount,empty   FROM cash_receipt where Acc_id = '$get_id'   UNION All SELECT id,name,Acc_id,D_PV,PV,Date,Memo,empty,Amount FROM cash_payment where Acc_id = '$get_id'   ORDER BY Date desc") or die(mysqli_error());
                                  $query = mysqli_query($conn,"SELECT id,name,Acc_id,D_RV,RV,Date,Memo,Amount,empty FROM cash_receipt where Acc_id = '$get_id'    UNION All SELECT id,name,Acc_id,D_PV,PV,Date,Memo,empty,Amount   FROM cash_payment where Acc_id = '$get_id'  ORDER BY Date asc") or die(mysqli_error());
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
                                    $Acc_name = $conn->query("SELECT Acc_name as Acc_name from `Account` where id='$Ac_id'  ")->fetch_assoc()['Acc_name']; 

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