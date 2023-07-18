<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>


<?php
	if(isset($_POST['add']))
	{
 	
	$title=$_POST['title']; 
	$message=$_POST['message'];	

    $date = new DateTime();
	$date->modify('+2 hour');
	$date1 = $date->format("Y-m-d-D - h:i:s a");

	$Cid = $conn->query("SELECT id as cid from `user` where id='$session_id'  ")->fetch_assoc()['cid'];
 
    $Admin_id = $conn->query("SELECT id as Aid from `user` where Role='Administrator'  ")->fetch_assoc()['Aid'];

        mysqli_query($conn,"INSERT INTO support(Cid,Title,Message,Admin_id, Time_user, Status) VALUES('$Cid','$title','$message','$Admin_id' ,'$date1', 'Pending')         
		") or die(mysqli_error()); 
        ?>
        <script>
            window.addEventListener('load',function(){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'your Complaint Successfully  Submited',
            showConfirmButton: false,
            timer: 3000
            })
            .then(function() {
                window.location = "Support.php";
            });	
        });
        </script>
		<?php   
}

?>

<body>

    <?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>SUPPORT</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Support</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 mb-30">
                        <div class="card-box pd-30 pt-10 height-100-p">
                            <h2 class="mb-30 h4">Submit your complaint</h2>
                            <section>
                                <form name="save" method="post">
                                <div class="row">                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Title</label>
                                            <input name="title" type="text" placeholder="Enter The Title Here" class="form-control" required="true" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" placeholder="Enter The Message Here" required style="height: 12em;" class="form-control text_area" type="text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 text-right">
                                    <div class="dropdown">
                                        <input class="btn btn-primary" type="submit" value="Send" name="add" id="add">
                                    </div>
                                </div>
                                </form>
                            </section>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-md-6 col-sm-12 mb-30">
                        <?php $query= mysqli_query($conn,"select * from setting ")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
                        <div class="card-box pd-30 pt-10 height-100-p">
                            <h2 class="mb-30 h4">Contact Us</h2>
                            <div class="pb-20">
                            <h4 class="mb-30 h5">If you need any help, please contact us on the number below then to help you, thank you. </h4>
                                <div class="col-md-12">                              
                               
                                    <label for="inputEmail4" class="form-label"><i class="icon-copy ion-social-whatsapp"></i> Whats App <?php echo $row['Phone'];?></label>   <br>
            
                                    <label for="inputEmail4" class="form-label" ><i class="icon-copy ion-android-phone-portrait"></i> Phone Number <?php echo $row['Phone'];?></label><br>      
                                    
                                    <label for="inputEmail4" class="form-label" ><i class="icon-copy ion-android-call"></i> Tell Number <?php echo $row['Tell'];?></label>
                                </div>                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="faq-wrap">
                <h4 class="mb-20 h4 text-blue">Support Information</h4>
                <div id="accordion">						
                    <?php
                        $i =1;
                        $query = mysqli_query($conn,"SELECT * from support where Cid='$session_id' and Status !='Hide' order by  Time_user desc   ") or die(mysqli_error());
                        while ($row = mysqli_fetch_array($query)) {
                        $id = $row['id'];
                    ?>
                    <div class="card">							
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq<?php echo $i?>">
                            <?php echo $row['Title']?>
                            </button>
                        </div>
                        <div id="faq<?php echo $i++?>" class="collapse" data-parent="#accordion">
                          
                            <div class="blog-list">
                                <ul>
                                    <li>
                                        <div class="row no-gutters">
                                            <div class="col-lg-2 col-md-12 col-sm-12">
                                                <div class="blog-img bg-primary">                                                

                                                    <!-- <img src="vendors/images/img2.jpg" alt="" class="bg_img"> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12 col-sm-12">
                                                <div class="blog-caption">
                                                    <!-- <h4> Title: <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4> -->
                                                    <div class="blog-by">
                                                        <h6>Message: </h6>
                                                        <p> <?php echo $row['Message'];?> </p><br>
                                                    
                                                        <h6>Reply: </h6>
                                                        <?php
                                                        if($row['Reply'] != '' ){   
                                                               $Reply = $row['Reply'];
                                                        }else{
                                                             $Reply = "Waiting Reply";                                                                                                     
                                                          }
                                                        ?>                                                    
                                                            <p class="text-primary"><?php echo $Reply?></p>


                                                        <!--                                                     
                                                        <div class="pt-10">
                                                            <p>reply</p>
                                                            <a href="#" class="btn btn-outline-primary">Read More</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>                          
                                </ul>
                            </div>                        
        
                        </div>							
                    </div>
                    <?php } ?>  
                </div>
            </div>              




























			<?php include('includes/footer.php'); ?>
		</div>



	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>