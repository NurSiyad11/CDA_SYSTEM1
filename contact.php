<?php include('includes/head.php')?>  
<?php include('database/db.php');?>

<?php
	if(isset($_POST['Send']))
	{
	$Name=$_POST['Name'];	   
	$Email=$_POST['Email']; 
	$Message=$_POST['Message']; 
	$Phone=$_POST['Phone']; 

        mysqli_query($conn,"INSERT INTO web_contact(Name,Email,Phone,Message) VALUES('$Name','$Email','$Phone','$Message')         
		") or die(mysqli_error()); ?>
      <script>    
		   window.addEventListener('load',function(){
			   swal.fire({
				   title: "Succcess",
				   text: "User Records Successfully Added ",
				   icon: "success",
				   button: "Ok Done!",		   
			   })
			   .then(function() {
						   window.location = "contact.php";
					   });  
		   });   
	   </script>
		
		<?php   

}

?>
	<script type="text/javascript">
		function letterOnly(input){
			var regex = /[^a-z ]/gi;
			input.value =input.value.replace(regex, "");
		}
		
	</script>






   <!-- body -->
<body class="main-layout">
   <!-- header -->
   <?php include('includes/header.php')?>

   <!-- end header inner -->
   <!-- end header -->
   <div class="back_re">
      <div class="container ">
         <div class="row">
            <div class="col-md-12">
               <div class="title">
                     <h2>Contact Us</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--  contact -->
   <div class="contact ">
      <div class="container bg-prima">
         <div class="row p-5">
            <div class="col-md-6">
               <form id="request" class="main_form" method="POST">
                  <div class="row">
                     <div class="col-md-12 ">
                        <input class="contactus" name="Name" placeholder="Name" required type="text" name="Name"> 
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" name="Email" placeholder="Email" required type="email" name="Email"> 
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" name="Phone" placeholder="Phone Number" required type="number" name="Phone Number">                          
                     </div>
                     <div class="col-md-12">
                        <textarea class="textarea" name="Message" placeholder="Message" required type="text" Message="Name"></textarea>
                     </div>
                     <div class="col-md-12">
                        <button  name="Send" class="send_btn">Send</button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-6">
               <div class="map_main">
                  <div class="map-responsive">
                     <!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe> -->
                        <img class="first-slide" src="assets/images/img/map3.png" alt="" >
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->
   <!--  footer -->
   <?php include('includes/footer.php')?>
   <!-- end footer -->
   <!-- Javascript files-->
   <?php include('includes/scripts.php')?>
</body>
