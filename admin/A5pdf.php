<?php include('../database/db.php')?>

<?php

if(isset($_POST['update-receipt']))
	{ 
$name=$_POST['name'];
$Date=$_POST['Date'];  
$RV=$_POST['RV']; 
$Amount=$_POST['Amount']; 
$memo=$_POST['memo']; 

$query = mysqli_query($conn,"SELECT * FROM setting ")or die(mysqli_error());
$row = mysqli_fetch_array($query);

$Com_name=$row['Company_name'];
$Address=$row['Address'];
$Email=$row['Email'];
$Tell=$row['Tell'];
$Phone=$row['Phone'];
$Logo=$row['Logo'];


//Getting image
// $image=file_get_contents("../uploads/logos/logo1-02.png");
// $imagedata=base64_encode($image);
// $imgpath='<img src="data:image/png;base64">';
 
// $HTML='<body><div>'.$imgpath.'</div></body>';



$html='

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
    *{
        margin-top: 0px;
        margin-bottom: 0px;
        margin-right: 10px;
        margin-left: 10px;
      }

	h1{ text-align:center; 
        color: #1D058D;
        font-family: "Times New Roman";
        font-size: 200%;
        margin: 20px 5px 20px 5px;
        

       
    }
    p{ text-align:left; 
        color: #1D058D;
        font-family: "Times New Roman";
        margin: 20px 5px 20px 25px;

    }
    line{color: #1D058D;
        margin: 20px 10px 20px 10px;

    }
    h2{ text-align:center; 
        color: #1D058D;
        font-family: "Times New Roman";
        font-size: 150%;
        margin: 10px 5px 20px 5px;
    }
    RV{ text-align:Right; 
        color: red;
        font-family: "Times New Roman";
    }
    





	</style>
</head>
<body>	
	<h1>'. $Com_name .'</h1><br><br>

    <table  cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <td><p>
        Adress : '.$Address.' <br>
        PHone : '.$Phone.' Tell: '.$Tell.' <br>
        Email : '.$Email.'<br>
        </p><br><br><br>
        </td>		
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>	</th>
    </tr>    
</table>	

  <line>___________________________________________________________________________________________</line>
  <h2> Payment Receipt </h2> <br><br>


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
    <td><RV>RV No# :  </RV>' . $RV . '<br/></td>
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


$dompdf->loadHtml($aData['html']);
$dompdf->set_option('isRemoteEnabled', TRUE);


?>

