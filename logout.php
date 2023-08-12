<?php
//  include('database/db.php');
 include('Lg_status.php');
// session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['alogin']);
session_destroy(); // destroy session
header("location: index.php"); 




// $time=time();
// $user_id=$_SESSION['alogin'];
// $query=mysqli_query($conn,"update user set Login_status='$time' where ID= '{$_SESSION['alogin']}' ");
// unset($_SESSION['alogin']);
// session_destroy(); // destroy session
// header("location:index.php"); 
?>

