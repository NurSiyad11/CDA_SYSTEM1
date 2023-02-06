<?php
session_start();
include('database/db.php');
$uid=$_SESSION['alogin'];
$time=time();
$query=mysqli_query($conn,"select * from user");
$i=1;
$html='';
while($row=mysqli_fetch_assoc($query)){
	$status='Offline';
	$class="btn-danger";
	if($row['Login_status']>$time){
		$status='Online';
		$class="btn-success";
	}
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
                  <td>'.$row['Name'].'</td>
                  <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
               </tr>';
	$i++;
}
echo $html;
?>