<?php include('database/session.php')?>
<?php include('database/db.php')?>

<?php 
$time=time();
$query = mysqli_query($conn, "UPDATE user SET Login_status='$time' WHERE ID='$session_id' ");
//  $query = mysqli_query($conn, "UPDATE user SET Lg_status='0' WHERE ID='$session_id' ");
?>