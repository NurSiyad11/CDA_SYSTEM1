<?php
 include('database/db.php');
//  include('database/session.php');
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// $Login_status = $conn->query("SELECT Login_status as st from `user` where ID='$session_id' ")->fetch_assoc()['st'];

if (isset($_SESSION['alogin'])) {
    $time = time();
    $query = mysqli_query($conn, "UPDATE user SET Login_status='$time' WHERE ID='{$_SESSION['alogin']}'");

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

