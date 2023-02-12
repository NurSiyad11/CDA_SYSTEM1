<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<!-- Update users -->
<?php

	if(isset($_POST['update']))
	{
	$name=$_POST['name'];
	$email=$_POST['email'];  
	$com_name=$_POST['com_name']; 
	$address=$_POST['address']; 

	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 
	$Status=$_POST['Status']; 

	$result = mysqli_query($conn,"update user set Name='$name',  Email='$email',Com_name='$com_name',  Address='$address',  Role='$user_role', Phone='$phonenumber', Status='$Status' where id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'Mng_user.php'; </script>";
	} else{
	  die(mysqli_error());
   }		
}
?>




<?php
require_once __DIR__ . '/vendor/autoload.php';










if(isset($_POST['pdf']))
	{




$mpdf = new \Mpdf\Mpdf();
// $username=$_POST['username'];
// $usermail=$_POST['usermail'];
// $residence=$_POST['residence'];
// $userstory=$_POST['yourstory'];

// $name=$_POST['name'];
// 	$email=$_POST['email'];  
// 	$gender=$_POST['gender']; 
// 	$address=$_POST['address']; 
//     $password=$_POST['password'];


	$name=$_POST['name'];
	$email=$_POST['email'];  
	$password=$_POST['password'];
	$com_name=$_POST['com_name']; 
	$address=$_POST['address']; 
	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 

$infor ='';

$infor .='<h1>Customer Budget Management System</h1>';
$infor .='<p>
Adress : Muqdisho, Banaadir <br>
Deg : Howl Wadaag Tell: 602203 <br>
Email : example@gmail.com <br>
</p>';
$infor .='<h3>Customer Data Activity Management System </h3>';


$infor .='<p> Soo Dhawow Macaamiil, Waxaad Ku so Dhawaataa Qaybta Dhaqdhaqaaqa  
Xogta Macaamiisha. C.D.A Management System, Systemkaan Waxa uu Kaa Caawinayaa In aad lasocitid Xogtaada.
</p>';

$infor .='<strong>Macaamiil Si aad ula soctid xogtaada Waxaad Boqataa caawiye.epizy.com </strong> <br>';
$infor .='<strong>Qaybta EMAIL ID Waxaad Galisaa :  </strong>' . $email . '<br/>';
$infor .='<strong>Qaybta Password Waxaad Galisaa :  </strong>' . $password . '<br/>';
$infor .='<p>Kadib Sign in Taabo Si aad Systemka Gudaha ugu Gashid.  </p>' ;

$infor .='<strong>Username: </strong>' . $name . '<br/>';
$infor .='<strong>Email: </strong>' . $email .'<br/>';
$infor .='<strong>Comapny Name : </strong>' . $com_name .'<br/>';
$infor .='<strong>Address: </strong>' . $address .'<br/>';
$infor .='<strong>Phone Number : </strong>' . $phonenumber .'<br/>';

$infor .='<label class="col-md-4 bg-dark">dcjghvbcbv vhcjkvhxcnbvjkxcbv cxbvkcjxbvkjcxhbvkjchxb vkxjc gjk jklhg</label>' .'<br/>';

$infor .='<h5>Kadib Sign in Taabo Si aad Systemka Gudaha ugu Gashid. </h5>';




$mpdf->WriteHTML($infor);
$mpdf->Output();

















	}
?>