<?php include('includes/head.php')?>  
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
      <div class="container bg-primary">
         <div class="row p-5">
            <div class="col-md-6">
               <form id="request" class="main_form">
                  <div class="row">
                     <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name" type="type" name="Name"> 
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Email" type="type" name="Email"> 
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">                          
                     </div>
                     <div class="col-md-12">
                        <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                     </div>
                     <div class="col-md-12">
                        <button class="send_btn">Send</button>
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
