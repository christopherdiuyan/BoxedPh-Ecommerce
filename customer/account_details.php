<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_address = $row_customer['customer_address'];

$customer_dateofbirth = $row_customer['customer_dateofbirth'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_img'];

?>
<style>
.form-control{
      font-size: 1.5em;  
    }
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
<h2 align="center"> Account Profile </h2>

<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="register-form">
                   <form method="post" enctype="multipart/form-data">
                       <div class="group-input">
                        <center>
                            <img src="customer_images/<?php echo$customer_image?>" class="img-responsive" height="50%" width="50%" style="border-radius: 50%;">
                            <label for="username"> Profile Image</label>
                        </center>
                        </div>
                        <div class="group-input">
                            <label for="username">Full Name *</label>
                            <input type="text" readonly ="c_name" id="username" value="<?php echo $customer_name?>">
                        </div>
                        <div class="group-input">
                            <label for="username">Contact Number *</label>
                            <input type="text" readonly name="c_contact" id="username" value="<?php echo $customer_contact?>">
                        </div>
                        
                        <div class="group-input">
                            <label for="username">Address *</label>
                            <input type="text" readonly name="c_address" id="username" value="<?php echo $customer_address?>">
                        </div>
                        <div class="group-input">
                            <label for="dateofbirth">Date Of Birth *</label>
                            <input type="date" readonly name="c_dateofbirth" id="dateofbirth" value="<?php echo $customer_dateofbirth?>">
                        </div>
                        <div class="group-input">
                            <label for="username">Email Address *</label>
                            <input type="email" readonly name="c_email" id="username" value="<?php echo $customer_email?>">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
