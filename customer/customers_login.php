<!--<div class="register-login-section spad">-->
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="../my_account.php" method="post">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input name="c_email" type="email" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input name="c_pass" type="password" id="pass">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="customer/forgot_pass.php" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" name="login" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="register.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    $select_customer = "select * from customers where customer_email='$customer_email'";  
    $run_customer = mysqli_query($con,$select_customer);
    if(mysqli_num_rows($run_customer) > 0)
    {
        while($row = mysqli_fetch_array($run_customer))  
            {  
                    if(password_verify($customer_pass, $row["customer_pass"]))  
                    {  
                        //return true;  
                        $get_ip = getRealIpUser();
    
                        $select_cart = "select * from wishlist where ip_add='$get_ip'";
                        $run_cart = mysqli_query($con,$select_cart);
                        $check_cart = mysqli_num_rows($run_cart);

                        if($check_cart==0){
                            //check if there is no item in cart
                            $_SESSION['customer_email']=$customer_email;
                           echo "<script>alert('You are Logged in')</script>"; 
                           echo "<script>window.open('customer/my_account.php?my_wishlist','_self')</script>";

                        }else{
                            //go to checkout if there is pending item in the cart
                            $_SESSION['customer_email']=$customer_email;
                           echo "<script>alert('You are Logged in')</script>"; 
                           echo "<script>window.open('customer/my_account.php?my_wishlist','_self')</script>";
                            
                        }
                    }  
                    else  
                    {  
                        //return false; 
                         echo "<script>alert('Wrong User Details')</script>";
                         echo "<script>window.open('../my_account.php','_self')</script>";
                    }  
            }  
    }
    else  
    {  
        //return false; 
         echo "<script>alert('Wrong User Details')</script>";
         echo "<script>window.open('../my_account.php','_self')</script>";
    }
}

?>