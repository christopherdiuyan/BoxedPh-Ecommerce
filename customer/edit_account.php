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
<h2 align="center"> Edit Your Account </h2>

<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="register-form">
                   <form method="post" enctype="multipart/form-data">

                        <div class="group-input">
                            <label for="username">Full Name *</label>
                            <input type="text" name="c_name" id="username" value="<?php echo $customer_name?>">
                        </div>
                        <div class="group-input">
                            <label for="username">Contact Number *</label>
                            <input type="text" name="c_contact" id="username" value="<?php echo $customer_contact?>">
                        </div>
                        
                        <div class="group-input">
                            <label for="username">Address *</label>
                            <input type="text" name="c_address" id="username" value="<?php echo $customer_address?>">
                        </div>
                        <div class="group-input">
                            <label for="dateofbirth">Date Of Birth *</label>
                            <input type="date" name="c_dateofbirth" id="dateofbirth" value="<?php echo $customer_dateofbirth?>">
                        </div>
                        <div class="group-input">
                            <label for="username">Email Address *</label>
                            <input type="email" name="c_email" id="username" value="<?php echo $customer_email?>">
                        </div>
                        <div class="group-input"><!-- form-group Begin -->
                            <label> Profile Picture *</label>
                            
                            <input type="file" name="c_image" class="form-control form-height-custom">
                            <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Customer Image" width="100px" height="100px">
                            
                        </div><!-- form-group Finish -->
                        
                        <button type="submit" name="update" class="site-btn register-btn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

if(isset($_POST['update'])){
    

    //insert new record
    $update_id = $customer_id;
    $c_name = $_POST['c_name'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_dateofbirth = $_POST['c_dateofbirth'];
    $c_email = $_POST['c_email'];
    
    if(is_uploaded_file($_FILES['c_image']['tmp_name']))
    {
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
 
        $update_customer = "update customers set 
        customer_name='$c_name',
        customer_img='$c_image',
        customer_contact='$c_contact',
        customer_address='$c_address',
        customer_dateofbirth='$c_dateofbirth',
        customer_email='$c_email' 
        where customer_id='$update_id' ";
        
        $run_customer = mysqli_query($con,$update_customer);
        
        if($run_customer){
            echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
    else{
        $update_customer = "update customers set 
        customer_name='$c_name',
        customer_contact='$c_contact',
        customer_address='$c_address',
        customer_dateofbirth='$c_dateofbirth',
        customer_email='$c_email' 
        where customer_id='$update_id' ";
        
        $run_customer = mysqli_query($con,$update_customer);
        
        if($run_customer){
            echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
}
?>