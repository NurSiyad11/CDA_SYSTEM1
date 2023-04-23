<?php	
 $admin_role = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];

if($admin_role == 'Admin'){
	$accept = $admin_role;
}elseif($admin_role == 'Administrator'){
	$accept = $admin_role;
}
if($admin_role != $accept){
	unset($_SESSION['alogin']);
	session_destroy(); // destroy session
	header("location: ../index.php");
}
?>
