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
            <div class="col-12">										
                <a href="../admin/pdf/<?php echo $info['File'] ; ?>" download class="btn btn-primary">Download PDF</a>										
            </div>                                   
            <embed type="application/pdf" src="../admin/pdf/<?php echo $info['File'] ; ?>" width="500" height="500">
        <?php
        }else{
            echo "No file found";                                     
        ?>
    <?php
    } }
?>









