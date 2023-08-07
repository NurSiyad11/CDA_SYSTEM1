<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<?php
// assume $userId contains the ID of the user to be deleted
if (isset($_GET['delete'])) {
	try {
		$delete = $_GET['delete'];
		$sql = "DELETE FROM account where id = ".$delete;
		mysqli_query($conn, $sql);

		// display a success message
		echo '<script>
				window.addEventListener("load", function() {
					swal.fire({
						title: "Success",
						text: "Account deleted successfully.",
						icon: "success",
					}).then(function() {
						window.location = "Account_Reg.php";
					});
				});
			</script>';
	} catch (mysqli_sql_exception $e) {

		echo '<script>
				window.addEventListener("load", function() {
					swal.fire({
						title: "Error",
						text: "This Account cannot be deleted because this account Make Transection .",
						icon: "error",
					}).then(function() {
						window.location = "Account_Reg.php";
					});
				});
			</script>';
		}
}
?>


<?php $get_id = $_GET['edit']; ?>
<?php
 if(isset($_POST['edit']))
{
	 $Acc_name=$_POST['Acc_name'];
	 $Acc_no=$_POST['Acc_no'];

    $result = mysqli_query($conn,"update account set Acc_name = '$Acc_name' , Acc_no ='$Acc_no' where id = '$get_id' ");
    if ($result) {
        ?>
			<Script>
				window.addEventListener('load',function(){
					swal.fire({
						title: "Success",
						text: "Record Successfully Updated' ",
						icon: "success",
						button: "Ok Done!",
					})
					.then(function() {
						window.location = "edit_Account_Reg.php?edit=" + <?php echo ($get_id); ?>;
							});
				});			
			</Script>
			<?php	

	} else{
	  die(mysqli_error());
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
                                <h4>Account List</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Account_Reg.php">Back </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                        <div class="card-box pd-30 pt-10 height-100-p">
                            <h2 class="mb-30 h4">Edit Account</h2>
                            <section>
                                <?php
                                $query = mysqli_query($conn,"SELECT * from account where id = '$get_id'")or die(mysqli_error());
                                $row = mysqli_fetch_array($query);
                                ?>
  								<input type="hidden" name="edit" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit']; }else{ echo "$get_id";} ?>" >


                                <form name="save" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Account Name</label>
                                            <input name="Acc_name" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Acc_name']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input name="Acc_no" type="number" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase" value="<?php echo $row['Acc_no']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <div class="dropdown">
                                        <input class="btn btn-primary" type="submit" value="UPDATE" name="edit" id="edit">
                                    </div>
                                </div>
                                </form>
                            </section>
                        </div>
                    </div>
                    
                    <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                        <div class="card-box pd-30 pt-10 height-100-p">
                            <h2 class="mb-30 h4">Account List</h2>
                            <div class="pb-20">
                                <table class="data-table table stripe hover nowrap">
                                    <thead class="table-primary">
                                    <tr>
                                        <th>SR NO.</th>
                                        <th class="table-plus">Account Name</th>
                                        <th>Account Number</th>
                                        <th class="datatable-nosort">ACTION</th>
                                    </tr>
                                    </thead >
                                    <tbody>

                                        <?php $sql = "SELECT * from account where Admin_id='$session_id'and id='$get_id' order by Acc_name ";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {               ?>  

                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->Acc_name);?></td>
                                            <td><?php echo htmlentities($result->Acc_no);?></td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="edit_Account_Reg.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959" onclick= ' return checkdelete()' ><i class="icon-copy dw dw-delete-3"></i></a>
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