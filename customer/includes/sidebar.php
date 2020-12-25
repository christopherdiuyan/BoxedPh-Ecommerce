<style type="text/css">
    a{
        color: #3b424a;
    text-decoration: none;

    }
    .nav,li,a {
    position: relative;
    display: block;
}

a:hover {
  color: black;
}

@media (min-width: auto){
.nav{
        position: fixed;
        top: 51px;
        bottom: 0;
        width: 255px;
        overflow-y: auto;
        overflow-x: hidden;
        background-color: black;
        padding-bottom: 40px;
        border-radius: 0;
    }
    .nav li a{
        width: 255px;
    }
    .nav li a:hover, .nav li a:focus{
        outline: none;
        background-color: black !important;
    }
}

.nav li ul{
    padding: 0;
}

.nav li ul li a{
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    color: #999999;
    display: block;
}

.nav li ul li a:hover{
    color: black;
    background-color: #f0f0f0;
}

    </style>
    <div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div class="panel-heading"><!--  panel-heading  Begin  -->
        
        <?php 
        
        $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email='$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_image = $row_customer['customer_img'];
        
        $customer_name = $row_customer['customer_name'];
        
        if(!isset($_SESSION['customer_email'])){
            
        }else{
            echo "
                <h3 style='font-family: Brush Script MT, Brush Script Std, cursive;' align='center'>Welcome Back, </h3>
                <br/>
                <center>
                    <img src='customer_images/$customer_image' class='img-responsive' height='200px' width='200px'>
                </center>
                <h3 class='panel-title' align='center'>
                    $customer_name
                </h3>
            ";
        }
        
        ?>
        
    </div><!--  panel-heading Finish  -->
    
    <div class="panel-body"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                <a href="my_account.php?my_orders">
                    <i class="fa fa-shopping-cart"></i> My Orders
                </a>
            </li>

            <li class="<?php 
            
            if(isset($_GET['edit_account'])) 
            { echo "active"; }
            if(isset($_GET['change_pass']))
            { echo "active"; }
            if(isset($_GET['delete_account'])) 
            { echo "active"; } ?>"
            ><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Account Details
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->

                <ul id="cat" class="collapse"><!-- collapse begin -->
                    <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                        <a href="my_account.php?account_details">
                            <i class="fa fa-user"></i> View Profile
                        </a>
                    </li>
                    <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                        <a href="my_account.php?edit_account">
                            <i class="fa fa-pencil"></i> Edit Account
                        </a>
                    </li>
                    <li>
                        <a href="my_account.php?change_pass">
                            <i class="fa fa-lock"></i> Change Password
                        </a>
                    </li>
                    
                    <li>
                        <a href="my_account.php?delete_account">
                            <i class="fa fa-trash-o"></i> Delete Account
                        </a>
                    </li>
                </ul><!-- collapse finish -->
                <li class="<?php if(isset($_GET['my_wishlist'])){ echo "active"; } ?>">
                <a href="my_account.php?my_wishlist">
                    <i class="fa fa-heart"></i> My Wishlist
                </a>
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->