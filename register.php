<?php 

    $active='Register';
    include("includes/header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    input[type=date]::-webkit-inner-spin-button, 
    input[type=date]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
        input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                    
                        <h2>Register</h2>
                        <form method="post" action="register.php" enctype="multipart/form-data" autocomplete="off">

                            <div class="group-input">
                                <input type="hidden" class="form-control form-height-custom" name="c_image" value="default_profile.png" required>
                                <label for="username">Full Name *</label>
                                <input type="text" name="c_name" id="username" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Contact Number *</label>
                                <input type="number" name="c_contact" id="username" required oninvalid="this.setCustomValidity('Contact number should not contain any special characters, symbols or spaces')" onchange="this.setCustomValidity('')">
                            </div>
                            
                            <div class="group-input">
                                <label for="username">Address *</label>
                                <input type="text" name="c_address" id="username" required>
                            </div>
                            <div class="group-input">
                                <label for="dateofbirth">Date Of Birth *</label>
                                <input type="date" name="c_dateofbirth" id="dateofbirth" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Email Address *</label>
                                <input type="email" name="c_email" id="username" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" name="c_password" id="pass" required> 
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" name="c_confirm_password" id="con-pass" required>
                            </div>
                            <button type="submit" name="register" class="site-btn register-btn">REGISTER</button>
                            <!-- <input name="register" id="insert" value="REGISTER" type="submit" class="btn btn-primary form-control"> -->
                        </form>
                        <div class="switch-login">
                            <a href="./login.html" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
<!-- Partner Logo Section Begin -->
     
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
</body>

</html>

<?php 

if(isset($_POST['register'])){
    $c_name = $_POST['c_name'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_dateofbirth = $_POST['c_dateofbirth'];
    $c_email = $_POST['c_email'];
    $c_u_id = rand(1000000000000000, 10000000000000000);
    $pass = $_POST['c_confirm_password'];
    $c_pass = password_hash($pass, PASSWORD_DEFAULT); 
    $c_ip = getRealIpUser();
    
    $c_image = "default_profile.png";
    
    $insert_customer = "insert into customers 
    (customer_u_id,customer_name,customer_img,customer_contact, customer_address, customer_dateofbirth, customer_email,customer_pass,customer_ip) 
    values 
    ('$c_u_id','$c_name','$c_image','$c_contact','$c_address','$c_dateofbirth','$c_email','$c_pass','$c_ip')";
    $run_customer = mysqli_query($con,$insert_customer);
    
    if($run_customer){
        
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        
    }
}

?>