<?php include('../database/db.php')?>

<?php


$userid = $_POST['userid'];

    $sql="SELECT File from invoice where id='$userid' ";
    $query=mysqli_query($conn,$sql);
    while ($info=mysqli_fetch_array($query)) {
        ?>
        <?php
        if($info !=''){
        ?>                                       
            <embed type="application/pdf" src="pdf/<?php echo $info['File'] ; ?>" width="500" height="500">
        <?php
        }else{
            echo "No file found";                                     
        ?>
    <?php
    } }
?>









