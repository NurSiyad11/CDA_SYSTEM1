
<?php //$get_id = $_GET['edit']; ?>

<?php

// Get the file ID from the POST request
$get_id = $_POST['edit'];

// Update the database
// $conn = mysqli_connect('localhost', 'username', 'password', 'database');
// $query = "DELETE FROM files WHERE id = $file_id";
// mysqli_query($conn, $query);
// mysqli_close($conn);

 mysqli_query($conn,"update tbl_order set  File='CDA Management System (21).pdf'  where id='$get_id'         
				");
?>