<?php
$admin_rol = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
if($admin_rol != 'Administrator'){
	unset($_SESSION['alogin']);
	session_destroy(); // destroy session
	header("location: ../index.php"); 
}

?>