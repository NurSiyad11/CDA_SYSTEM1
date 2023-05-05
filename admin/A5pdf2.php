<?php include('../database/db.php')?>

<?php $get_id = $_GET['edit']; ?>
<?php
// if(isset($_POST['receipt']))
// 	{ 

// select Receipt date
$query_RV = mysqli_query($conn,"SELECT * FROM receipt where id='$get_id' ")or die(mysqli_error());
$row_rv = mysqli_fetch_array($query_RV);

$Date=$row_rv['Date'];
$RV=$row_rv['RV'];
$Amount=$row_rv['Amount'];
$memo=$row_rv['Memo'];


// select name of user 
$Cid = $row_rv['Cid'];
$query_cust = mysqli_query($conn,"SELECT * FROM user where ID='$Cid' ")or die(mysqli_error());
$row_cust = mysqli_fetch_array($query_cust);
$name= $row_cust['Name'];



//select setting or company information
$query = mysqli_query($conn,"SELECT * FROM setting ")or die(mysqli_error());
$row = mysqli_fetch_array($query);

$Com_name=$row['Company_name'];
$Address=$row['Address'];
$Email=$row['Email'];
$Tell=$row['Tell'];
$Phone=$row['Phone'];
$Logo=$row['Logo'];





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

			// }

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

