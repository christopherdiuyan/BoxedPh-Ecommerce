        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="login-form">
                        	
                        <h2>Login</h2>
                        <form action="check-out.php" method="post">
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
                            <!--<button type="submit" name="guest" class="site-btn login-btn">Login as Guest</button>-->
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
                        $select_customer = "select * from customers where customer_email='$customer_email'";
                        $run_customer1 = mysqli_query($db,$select_customer);
                        $row_customer = mysqli_fetch_array($run_customer1);
                        $c_id = $row_customer['customer_id'];
                        $c_name = $row_customer['customer_name'];
                        $c_u_id = $row_customer['customer_u_id'];
                        
                        $get_ip = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$get_ip'AND c_id='$c_id'";
                        $run_cart = mysqli_query($con,$select_cart);
                        $check_cart = mysqli_num_rows($run_cart);
                        
                        if($check_cart == 0 && mysqli_num_rows($run_customer)==1){
                            //check if there is no item in cart
                            $_SESSION['customer_email']=$customer_email;
                            $_SESSION['user_name'] = $c_name;
                            $_SESSION['user_uni_no'] = $c_u_id;
                            
                           echo "<script>alert('You are Logged in.')</script>"; 
                           echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
                           

                        }else{
                            //go to checkout if there is pending item in the cart
                            $_SESSION['customer_email']=$customer_email;
                            $_SESSION['user_name'] = $c_name;
                            $_SESSION['user_uni_no'] = $c_u_id;
                            
                           echo "<script>alert('You are Logged in')</script>"; 
                           echo "<script>window.open('check-out.php','_self')</script>";
                           
                            
                        }
                    }  
                    else  
                    {  
                        //return false; 
                         echo "<script>alert('Wrong User Details')</script>";
                         echo "<script>window.open('check-out.php','_self')</script>";
                    }  
            }  
    }
    else  
    {  
        //return false; 
         echo "<script>alert('Wrong User Details')</script>";
         echo "<script>window.open('check-out.php','_self')</script>";
    }
}

if(isset($_POST['guest'])){
    
    $customer_email = "customer3@gmail.com";
    $customer_pass = "1234";

    $select_customer = "select * from customers where customer_email='$customer_email'";  
    $run_customer = mysqli_query($con,$select_customer);
    if(mysqli_num_rows($run_customer) > 0)
    {
        while($row = mysqli_fetch_array($run_customer))  
            {  
                    if(password_verify($customer_pass, $row["customer_pass"]))  
                    {  
                        //return true; 
                        $select_customer = "select * from customers where customer_email='$customer_email'";
                        $run_customer1 = mysqli_query($db,$select_customer);
                        $row_customer = mysqli_fetch_array($run_customer1);
                        $c_id = $row_customer['customer_id'];
                        $c_name = $row_customer['customer_name'];
                        $c_u_id = $row_customer['customer_u_id'];
                        
                        $get_ip = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$get_ip'AND c_id='$c_id'";
                        $run_cart = mysqli_query($con,$select_cart);
                        $check_cart = mysqli_num_rows($run_cart);
                        
                        if($check_cart == 0 && mysqli_num_rows($run_customer)==1){
                            //check if there is no item in cart
                            $_SESSION['customer_email']=$customer_email;
                            $_SESSION['user_name'] = $c_name;
                            $_SESSION['user_uni_no'] = $c_u_id;
                            
                           echo "<script>alert('You are Logged in.')</script>"; 
                           echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
                           

                        }else{
                            //go to checkout if there is pending item in the cart
                            $_SESSION['customer_email']=$customer_email;
                            $_SESSION['user_name'] = $c_name;
                            $_SESSION['user_uni_no'] = $c_u_id;
                            
                           echo "<script>alert('You are Logged in')</script>"; 
                           echo "<script>window.open('check-out.php','_self')</script>";
                           
                            
                        }
                    }  
                    else  
                    {  
                        //return false; 
                         echo "<script>alert('Wrong User Details')</script>";
                         echo "<script>window.open('check-out.php','_self')</script>";
                    }  
            }  
    }
    else  
    {  
        //return false; 
         echo "<script>alert('Wrong User Details')</script>";
         echo "<script>window.open('check-out.php','_self')</script>";
    }
}

?>
