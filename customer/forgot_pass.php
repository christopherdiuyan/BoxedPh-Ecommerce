<?php 

    $active='Account';
    include("includes/header.php");

?>
<style>
    .input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: #DF7861;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid #DF7861;
}
</style>
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
      
         <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="login-form">
                        <form method="post">
                            <div class="text-center">
                              <h3><i class="fa fa-lock fa-4x"></i></h3>
                              <h2 class="text-center">Forgot Password?</h2>
                              <p>You can reset your password here.</p>
                                <div class="panel-body">
                                  
                                  <form class="form">
                                    <fieldset>
                                        <div class="input-container">
                                        <i class="fa fa-envelope icon" style="font-size: 2em"></i>
                                        <input class="input-field" placeholder="Email Address" class="form-control" type="email" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="" name="c_email">
                                      </div>
                                      <div class="group-input">
                                        <input class="site-btn login-btn" name="submit" value="Send My Password" type="submit">
                                      </div>
                                    </fieldset>
                                  </form>
                                  <div class="switch-login">
                                    <a href="../my_account.php" class="or-login">Or Login</a>
                                </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
         
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
        
<?php

if(isset($_POST['submit'])){
    
    $customer_email = $_POST['c_email'];

     echo "<script>alert('We will send code to your $customer_email')</script>";
     echo "<script>window.open('forgot_pass.php','_self')</script>";

}
?>