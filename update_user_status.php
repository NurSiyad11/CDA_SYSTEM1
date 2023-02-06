<?php
session_start();
include('database/db.php');
include('database/session.php');

//$uid=$_SESSION['alogin'];
$time=time()+60;
$query=mysqli_query($conn,"update user set Login_status=$time where ID=$session_id");
?>