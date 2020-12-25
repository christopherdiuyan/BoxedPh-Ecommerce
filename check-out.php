<?php 

    $active='Account';
    include("includes/header.php");

?>

   <div id="preloder">
        <div class="loader"></div>
    </div>
    
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
          <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
           <section class="blog-details spad">
       
           
       <div class="col-lg-9"><!-- col-md-9 Begin -->
      
         <?php 
         
         if(!isset($_SESSION['customer_email'])){
             
             include("customer/customer_login.php");
             
         }else{
             
             include("payment_options.php");
             
         }
         
         ?>
       </div><!-- col-md-9 Finish -->
       
       
   </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->
   </section>
</body>
</html>