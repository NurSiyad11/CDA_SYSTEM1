





<?php

if(isset($_POST['update-receipt']))
	{
// $name=$_POST['name'];
// $email=$_POST['email'];  
// $password=$_POST['password'];
// $com_name=$_POST['com_name']; 
// $address=$_POST['address']; 
// $user_role=$_POST['user_role']; 
// $phonenumber=$_POST['phonenumber']; 
// $Status=$_POST['Status']; 
// $sign=$_POST['sign']; 
$name=$_POST['name'];
$Date=$_POST['Date'];  
$RV=$_POST['RV']; 
$Amount=$_POST['Amount']; 
$memo=$_POST['memo']; 




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
	<h1>Customer Budget Management System</h1><br><br>

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
___________________________________________________________________________________<br>
<table border="" cellpadding="10" cellspacing="0" width="100%">
<tr> 	
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><h2> Payment Receipt </H2></td>
    <td></td>
    <td></td>
    <td>	</td>
</tr>    
</table>	<br><br>

<table border="" cellpadding="10" cellspacing="0" width="100%">
<tr> 	
    <td><strong> Date :  </strong>' . $Date . '<br/></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><strong>RV No# :  </strong>' . $RV . '<br/></td>
</tr>    
</table>	<br>	
<table border="1" cellpadding="10" cellspacing="0" width="100%">
<tr> 	
    <td> <strong> Name :</strong></td>
    <td>'.$name.' </td>
</tr>  
<tr> 	
    <td><strong>Payment Amount :</strong></td>
    <td> $ ' .$Amount. '</td>
    
</tr>      
<tr> 	
    <td><strong>Descrition :</strong></td>
    <td> ' .$memo. '</td>
    
</tr>     

</table>	

	

</body>
</html>';

			}

require 'vendrs/vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf= new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A5','landscape');

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


