





<?php

if(isset($_POST['A4pdf']))
	{
$name=$_POST['name'];
$email=$_POST['email'];  
$password=$_POST['password'];
$com_name=$_POST['com_name']; 
$address=$_POST['address']; 
$user_role=$_POST['user_role']; 
$phonenumber=$_POST['phonenumber']; 
$Status=$_POST['Status']; 
$sign=$_POST['sign']; 





$html='

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	*{text-align:left;}
	</style>
</head>
<body>	
	<h1>Customer Budget Management System</h1><br><br><br>
	
	

	<table  cellpadding="10" cellspacing="0" width="100%">
		<tr>
			<td><p>
			Adress : Muqdisho, Banaadir <br>
			Deg : Howl Wadaag Tell: 602203 <br>
			Email : example@gmail.com <br>
			</p><br><br><br>
			</td>		
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>	</th>
		</tr>
		
	</table>	
	<p>	_____________________________________________________________________________________</p><br>
	<h3>Customer Data Activity Management System </h3><br><br>

	<table border="" cellpadding="10" cellspacing="0" width="100%">
		<tr>
			<td></td>		
			<td><strong>Company Name : </strong>' . $com_name .'<br></td>
		</tr>		
	</table>	


	<p> Soo Dhawow Macaamiil, Waxaad Ku so Dhawaataa Qaybta Dhaqdhaqaaqa  
		Xogta Macaamiisha. C.D.A Management System, Systemkaan Waxa uu Kaa Caawinayaa In aad lasocitid Xogtaada.
	</p><br><br><br>

	<strong>Macaamiil Si aad ula soctid xogtaada Waxaad Boqataa caawiye.epizy.com </strong> <br>
	<strong>Qaybta EMAIL ID Waxaad Galisaa :  </strong>' . $email . '<br/>
	<strong>Qaybta Password Waxaad Galisaa :  </strong>' . $password . '<br/>
	<p>Kadib Sign in Taabo Si aad Systemka Gudaha ugu Gashid.  </p> <br/><br><br>

	<table  border="" cellpadding="0" cellspacing="0" width="" >
		<tr>
			<th>
			Customer Information :
			</th>		
			<th></th>
		
		</tr>
		<tr>
			<th></th>		
			<td><strong>Customer Name : </strong>' . $name . '<br/>
			<strong>Company Name : </strong>' . $com_name .'<br/>
			<strong>Email: </strong>' . $email .'<br/>
			<strong>Address: </strong>' . $address .'<br/>
			<strong>Phone Number : </strong>' . $phonenumber .'<br/>
			<strong>User Role : </strong>' . $user_role .'<br/>
			<strong>User Status : </strong>' . $Status .'<br/>
			<strong>Username : </strong>' . $email .'<br/>
			<strong>Paasword : </strong>' . $password .'<br/>
			</td>
		
		</tr>
	
	</table>	
	
	<br><br><br><br><br><br><br><br><br><br><br>


	<h4> Waxii Faafaahin ah Kala Soo Xaririr:</h4><br>
	<table  cellpadding="10" cellspacing="0" width="100%">
		<tr>
			<td>
			
			<p>
			Phone Number : +252613231772 <br>			
			Tell : 600000 <br>
			Email : nursiyad2022@gmail.com <br>			
			Whatsapp Number : +252613231772	<br>

			</p><br><br><br>

			</td>		
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>
			Signature of Secretary <br>
				<br>
				
			<strong>Professor </strong>' . $sign .'<br/>
			_________________________
			</th>
		</tr>
		
	</table>	





</body>
</html>';

			}

require 'vendrs/vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf= new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>0));


?>






























<?php include('../database/session.php')?>
<?php include('../database/db.php')?>
<?php $get_id = $_GET['edit']; ?>
<!-- Update users -->
<?php
	// ob_clean();
	// flush();
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


