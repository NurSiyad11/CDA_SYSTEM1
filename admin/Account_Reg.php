<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<?php 
	 if (isset($_GET['delete'])) {
		$get_id = $_GET['delete'];
		$sql = "DELETE FROM account where id = ".$get_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Account deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'Account_Reg.php'; </script>";
			
		}
	}
?>

<?php
	if(isset($_POST['add']))
	{	
	$Acc_name=$_POST['Acc_name'];	   
	$Acc_no=$_POST['Acc_no']; 	
	
	$query = mysqli_query($conn,"select * from account where Acc_name = '$Acc_name'")or die(mysqli_error());
	$count = mysqli_num_rows($query);       
	
	if ($count > 0){ ?>
		<script>
		alert('Account Already Exist');
	   </script>
	   <?php
		 }else{
			mysqli_query($conn,"INSERT INTO account(Acc_name,Acc_no) VALUES('$Acc_name','$Acc_no')         
			") or die(mysqli_error()); ?>
			<script>alert('Account Records Successfully  Added');</script>;
			<script>
			window.location = "Account_Reg.php"; 
			</script>
			<?php   }
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
                                <h4>Payment Mode</h4>
                            </div>							
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Account Registraion</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                        <div class="card-box pd-30 pt-10 height-100-p">								
                            <h2 class="mb-30 h4">New Account</h2>
                            <section>
                                <form name="save" method="post">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label >Account Name :</label>
                                            <input name="Acc_name" type="text" class="form-control" placeholder="Enter Account Name" required="true" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Account Number :</label>
                                            <input name="Acc_no" type="number" class="form-control" placeholder="Enter Account NO" required="true" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <div class="dropdown">
                                        <input class="btn btn-primary" type="submit" value="REGISTER" name="add" id="add">
                                    </div>
                                </div>
                                </form>
                            </section>
                        </div>
                    </div>

                    <?php
                        $RV = $conn->query("SELECT sum(Amount) as total FROM `cash_receipt`   ")->fetch_assoc()['total'];
                        $PV = $conn->query("SELECT sum(Amount) as total FROM `cash_payment`   ")->fetch_assoc()['total'];
                        $Bal = $RV - $PV;
                        $format =number_format((float)$Bal, '2','.',',');
					?> 
                    
                    <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                        <div class="card-box pd-30 pt-10 height-100-p">
                            <h2 class="mb-30 h4">Account List</h2>
                            <div class="pb-20">
                                <table class="data-table table-bordered table stripe hover nowrap">
                                    <thead class="table-primary">
                                    <tr>
                                        <th>SR NO.</th>
                                        <th class="table-plus">Accoutn Name</th>
                                        <th>Account Number</th>
                                        <th>Account Balance</th>
                                        <th class="datatable-nosort">ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php $sql = "SELECT * from account order by Acc_name ";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0)
                                        {
                                         foreach($results as $result)  {  
                                        // while($row = mysqli_fetch_array($query)){
                                            $test= ($result->id);
                                            $total_income = $conn->query("SELECT sum(Amount) as total from `cash_receipt` where Acc_id=$test   ")->fetch_assoc()['total'];
                                            $total_expense = $conn->query("SELECT sum(Amount) as total from `cash_payment` where Acc_id=$test ")->fetch_assoc()['total'];
                                            $Ba_Inc_exp = $total_income - $total_expense;
                                            $bal_format =number_format((float)$Ba_Inc_exp, '2','.',',');
                                                  
                                             ?>  

                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->Acc_name);?></td>
                                            <td><?php echo htmlentities($result->Acc_no);?></td>
                                            <td><?php echo $bal_format;?></td>
                                            <td>
                                                <div class="table-actions">
                                                    <!-- data-color="#265ed7"            data-color="#e95959"-->
                                                    <a href="edit_Account_Reg.php?edit=<?php echo htmlentities($result->id);?>"  class="btn btn-primary"> <i class="icon-copy dw dw-edit2"></i> </a>
                                                    <a href="Account_Reg.php?delete=<?php echo htmlentities($result->id);?>" class="btn btn-danger" onclick= ' return checkdelete()' ><i class="icon-copy dw dw-delete-3"></i> </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php $cnt++;} }?>  

                                    </tbody>
                                </table>
                                <script>
                                    function checkdelete(){
                                        return confirm('Do you Want to Delete this Record ? ');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts2.php')?>


</body>
</html>