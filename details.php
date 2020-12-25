<?php 

session_start();

$active='Shopping';

include("includes/db.php");
include("functions/functions.php");
require_once 'comments/Config/Functions.php';
?>
<?php 

if(isset($_SESSION['customer_email'])){
    $email = $_SESSION['customer_email'];
    
    $get_items = "select * from customers where customer_email='$email'";
    $run_items = mysqli_query($db,$get_items);
    
    $row_items=mysqli_fetch_array($run_items);
    
    $customer_name = $row_items['customer_name'];
}
if(isset($_GET['delete_product'])){

    $id = $_GET['delete_product'];
    $delete_item= "delete from cart where p_id='$id'";
    
    if(mysqli_query($con,$delete_item)){
        echo "<script>window.open('details.php?pro_id=$id','_self')</script>";
    }
}

if(isset($_GET['pro_id'])){
    
    
    
    $product_id = $_GET['pro_id'];
    $_SESSION['pro_id'] = $product_id;
    $prod_id = $_SESSION['pro_id'];
    $get_product = "select * from products where product_id='$product_id'";
    $run_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $cat_id = $row_product['cat_id'];
    $categ_id = $cat_id;
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $pro_img3 = $row_product['product_img3'];
    $product_keywords = $row_product['product_keywords'];
    $product_category = $row_product['product_category'];
    $product_size = $row_product['product_size'];   
    $product_color = $row_product['product_color'];
    $product_materials = $row_product['product_material'];
    $product_stocks = $row_product['product_stocks'];
    $sku = $row_product['sku'];
    
    $current_prodID = $product_id ;
    global $current_prodID;

    $temp_id2 = $p_cat_id;
    global $temp_id2;
    
    $temp_id3 = $p_cat_id;
    if(!isset($_SESSION['customer_email'])){
   $_SESSION['user_uni_no'] = 0;
}
$Fun_call = new Functions();
global $post_no;

$field['customer_u_id'] = $_SESSION['user_uni_no'];

$sel_user_img = $Fun_call->select_assoc('customers',$field);


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['pro_id']) && is_numeric($_GET['pro_id'])){

        $post_no = $Fun_call->validate($_GET['pro_id']);

        $condition['product_id'] = $post_no;
        $fetch_post = $Fun_call->select_assoc('products', $condition);

        if(!$fetch_post){
            echo"<script>window.open('shop.php','_self')</script>"; 
        }

    }
    else{
       echo"<script>window.open('shop.php','_self')</script>";  
    }

}
else{
    echo"<script>window.open('shop.php','_self')</script>"; 
}
}
 
global $db;
    
    if(isset($_GET['add_wishlist'])){
        
        $session_email = $_SESSION['customer_email'];
        $select_customer = "select * from customers where customer_email='$session_email'";
        $run_customer = mysqli_query($db,$select_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $c_id = $row_customer['customer_id'];
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_wishlist'];
        
        $check_product = "select * from wishlist where ip_add='$ip_add' AND p_id='$p_id' AND c_id='$c_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in your wishlist')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into wishlist (c_id,p_id,ip_add) values ('$c_id','$p_id','$ip_add')";
            
            $run_query = mysqli_query($db,$query);
            echo "<script>alert('Successfully added in your wishlist')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
    $get_product = "select * from settings_website_contents where website_content_id='1'";
    $run_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_array($run_product);
    $title = $row_product['website_title'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../admin_area/partnership_images/logo.png">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title?></title>

    <!-- Google Font -->
    <!--<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">-->

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/fonts.googleapis.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!--<script src="https://kit.fontawesome.com/f124118c9b.js" crossorigin="anonymous"></script>-->
    <script src="js/kit.fontawesome.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="comments/CSS/Stylesheet.css">
    <!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
    <script type="text/javascript">
    $(document).ready(function(){
        $('.advanced-search input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("backend-search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".advanced-search").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    </script>
    <style>
    #btnwishlish{
        height: 50px;
        background-color: #E7AB3C;
        border-color: #E7AB3C;
        border: 0px;
        box-shadow: 0px 0px;
    }
    /* Formatting search box */
    .advanced-search{
        width: 100%;
        /*width: 300px;*/
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .advanced-search input[type="text"]{
        width: 100%;
        height: 50px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .advanced-search input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        width: 100%;
        background-color: white;
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p a{
        color: black;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    
    #btnaddcart{
        height: 50px;
        background-color: #E7AB3C;
        border-color: #E7AB3C;
        border: 0px;t
        box-shadow: 0px 0px;
    }
    #btnwishlist {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}
    input[type=number]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
  input{font-size: 1.5em;}
  /* Dropdown Button */
  .dropbtn {
    background-color: #ffffff;
    color: #211515;
    padding: 16px;
    font-size: 16px;
    border: none;
  }

  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
    font-size: 1.5em;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {background-color: #ddd;}

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {display: block;}

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {background-color: #ececec;}

 #ask a:link {
  text-decoration: none;
}

#ask a:visited {
  text-decoration: none;
}

#ask :hover {
    color: blue;
  text-decoration: underline;
}

#ask a:active {
  text-decoration: underline;
}
</style>
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    boxed.phl@gmail.com

                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +6393 2887 0687
                </div>
            </div>
            
            <div class="ht-right">
                <!-- <a href="check-out.php"> -->
                    <!-- <div class=""></div> -->
                    
                    <?php 
                    
                    
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href='check-out.php' class='login-panel'><i class='fa fa-user'></i>Login</a>";
                        }else
                        {
                            echo "
                            
                            <div class='dropdown'>
                              <button class='dropbtn'><i class='fa fa-user'></i>  $customer_name 
                              <b class='caret'></b></button>               
                              <div class='dropdown-content'>
                                <a href='customer/my_account.php?my_orders'>My Account</a>
                                <li class='divider' style='background-color: black; height:1px; list-style-type: none;'></li>
                                <a href='logout.php'>
                                <i class='fa fa-fw fa-power-off'></i>
                                Logout
                                </a>
                              </div>
                              </div>
                            ";
                        }?>

                        </div>
        </div>
    </div>

    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="images/logo.png" alt="" style="width:200px; height:30px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <div class="input-group" style="max-width: 100%">
                            <input type="text" autocomplete="off" placeholder="Search in BoxedPH" />
                            <div class="result"></div>
                            <button type="button" name="search_product"><i class="ti-search"></i></button>   
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="customer/my_account.php?my_wishlist">
                                <i class="icon_heart_alt"></i>
                                <?php 
                                if(isset($_SESSION['customer_email'])){
                                    echo "<span>";
                                    items_wishlist(); 
                                    echo "</span>";
                                }
                                ?>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="shopping-cart.php">
                                <i class="icon_bag_alt"></i>
                                <span><?php items(); ?></span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <?php
                                            $subTotal = 0;
                                            $total = 0;
                                            
                                            if(isset($_SESSION['customer_email'])){
                                                $session_email = $_SESSION['customer_email'];
                                                $select_customer = "select * from customers where customer_email='$session_email'";
                                                $run_customer = mysqli_query($db,$select_customer);
                                                $row_customer = mysqli_fetch_array($run_customer);
                                                $c_id = $row_customer['customer_id'];
                                            }
                                            else
                                                $c_id = 0; // 0 = For Guest Customer ID
                                                
                                            $ip_add = getRealIpUser();
                                            $get_items = "select * from cart where ip_add='$ip_add' AND c_id='$c_id'";
                                            $run_items = mysqli_query($db,$get_items);
                                            
                                            while($row_items=mysqli_fetch_array($run_items)){
                                                
                                                $prod_id = $row_items['p_id'];
                                                $product_qty = $row_items['qty'];

                                                $get_slides = "select * from products WHERE product_id='$prod_id '";
                                                $run_slides = mysqli_query($con,$get_slides);
                                                $row_slides=mysqli_fetch_array($run_slides);

                                                $product_id = $row_slides['product_id'];
                                                $product_img1 = $row_slides['product_img1'];
                                                $product_price = $row_slides['product_price'];
                                                $product_title = $row_slides['product_title'];

                                                echo
                                                "
                                                <tr>
                                                    <td class='si-pic'><img src='admin_area/product_images/$product_img1' width='100' height='100' alt=''></td>
                                                    <td class='si-text'>
                                                        <div class='product-selected'>
                                                            <p>₱ $product_price x $product_qty</p>
                                                            <a href='details.php?pro_id=$product_id'>
                                                            <h6>$product_title</h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class='si-close'>
                                                         <form method='POST'>
                                                            <a href='details.php?delete_product=$prod_id' class='ti-close'></a> 
                                                         </form>
                                                    </td>
                                                    
                                                </tr>
                                        
                                                ";
                                                $subTotal = $product_price * $product_qty;
                                                $total += $subTotal;
                                            }
                                                if($total == 0){
                                                    echo "Your Cart is Empty.";
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>₱ <?php echo $total ?></h5>
                                </div>
                                <div class="select-button">
                                    <a href="shopping-cart.php" class="primary-btn view-card">VIEW CART</a>
                                    <a href="check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
            </div>
            <center>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="<?php if($active=='Home') echo"active"; ?>">
                        <a href="./index.php">Home</a>
                    </li>
                    <li class="<?php if($active=='Shop') echo"active"; ?>">
                        <a href="./shop.php">Shop</a>
                        <ul class="dropdown">
                            <li><a href="./shop.php">Boxes</a></li>
                            <li><a href="./shop.php">Cards</a></li>
                            <li><a href="./shop.php">Ribbons</a></li>
                            <li><a href="./shop.php">Lasercut Items</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($active=='Partnership') echo"active"; ?>">
                        <a href="./partnership.php">Partnership</a>
                    </li>
                    <li class="<?php if($active=='About') echo"active"; ?>">
                        <a href="./about.php">About Us</a>
                    </li>
                    <li class="<?php if($active=='Contact') echo"active"; ?>">
                        <a href="./contact.php">Contact</a>
                    </li>
                    <li class="<?php if($active=='Pages') echo"active"; ?>"><a href="#">Pages</a>
                        <ul class="dropdown">
                            <!--<li class="<?php //if($active=='Event') echo"active"; ?>"><a href="./event.php">Event</a></li>-->
                            <li class="<?php if($active=='Faq') echo"active"; ?>"><a href="./faq.php">Faq</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </nav>
            </center>
            <div id="mobile-menu-wrap"></div>
        </div>      
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    
    <section class="product-shop spad page-details">
        
        <div class="container">

            <div class="col-lg-3"><!-- col-md-3 Begin -->
               <?php 
                
                include("includes/sidebar.php");
                
                ?>
           </div><!-- col-md-3 Finish -->

            <div class="col-lg-9">
                
                <form action="details.php?add_to_cart=<?php echo $_SESSION['pro_id'] ?>" method="post">
                    <?php add_to_cart(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom"> 
                            <img class="product-big-img" height="440" width="440" src="admin_area/product_images/<?php echo $pro_img1 ?>" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>


                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="admin_area/product_images/<?php echo $pro_img1 ?>">
                                    <img src="admin_area/product_images/<?php echo $pro_img1 ?>"width="140px;" height="140px;" alt="">
                                </div>
                                <div class="pt" data-imgbigurl="admin_area/product_images/<?php echo $pro_img2 ?>">
                                    <img src="admin_area/product_images/<?php echo $pro_img2 ?>" width="140px;" height="140px;" alt="">
                                </div>
                                <div class="pt" data-imgbigurl="admin_area/product_images/<?php echo $pro_img3 ?>">
                                    <img src="admin_area/product_images/<?php echo $pro_img3 ?>"width="140px;" height="140px;" alt="">
                                </div>
                                <div class="pt" data-imgbigurl="admin_area/product_images/<?php echo $pro_img1 ?>">
                                    <img src="admin_area/product_images/<?php echo $pro_img1 ?>"width="140px;" height="140px;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>
                                    <?php echo $product_category ?>
                                </span>
                                
                                <h3><?php echo $pro_title ?></h3>
                                
                                <!--<form method="POST" action="-->
                                
                                <!--">-->
                                <a href="
                                <?php
                                if(isset($_SESSION['customer_email'])){
                                   echo "details.php?add_wishlist=$product_id";
                                }else
                                    echo "customer/my_account.php?my_wishlist";
                                ?>
                                " class="heart-icon" name="wishbtn" id="btnwishlist"style="color: magenda;">
                                    <i class="icon_heart_alt"></i>
                                </a>
                                    <?php 
                                    if(isset($_POST['wishbtn']))
                                    echo"<script>window.open('details.php?pro_id=$product_id','_self')</script>"; 
                                    ?>
                                <!--</form>-->
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div>
                            
                            <div class="pd-desc">
                                <p><?php echo $pro_desc ?></p>
                                <h4>₱ <?php echo $pro_price ?><span>₱ <?php echo $pro_price + ($pro_price * 0.20); ?></span>
                                </h4>
                            </div>
                            <div class="pd-color">
                                <h6>Available Colors:</h6>
                                <div class="pd-color-choose">
                                    <h6><?php echo $product_color ?></h6>
                                </div>
                            </div>
                            <div class="pd-color">
                            <h6>Size:</h6>
                               <h5><?php echo "$product_size"; ?></h5> 
                            </div>
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input name="product_qty" min="1" max="999" autocomplete="off" type="number" value="1">
                                </div>
                                <p class="text-center buttons">
                                <button id="btnaddcart" class="primary-btn pd-cart"> Add To Cart</button>
                                
                                </p>
                            </div>
                            <ul class="pd-tags">

                                <?php 
                                    $get_cat = "select * from categories where cat_id='$categ_id'";
                                    
                                    $run_cat = mysqli_query($con,$get_cat);
                                    $row_cat = mysqli_fetch_array($run_cat);
                                    
                                    $cat_title = $row_cat['cat_title'];

                                echo "
                                    <li><span>CATEGORIES</span>: $cat_title </li>
                                    <li><span>MATERIALS</span>: $product_materials  </li>
                                ";
                                    
                                ?>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code"><h5>SKU: <?php echo $sku ?></h5></div>
                                <div class="pd-social">
                                    <!--<h6>Follow Us:</h6>-->
                                    <!--<a href="https://www.facebook.com/boxed.phl/"><i class="ti-facebook"></i></a>-->
                                    <!--<a href="https://www.instagram.com/boxed.phl/"><i class="ti-instagram"></i></a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
                
                <div class="product-tab">
                    
                    <div class="tab-item">
                        <ul class="nav" role="tablist" style="display: flex;">
                            <li>
                                <a class="tablinks" onclick="openCity(event, 'tab-1')" id="defaultOpen" style="font-size: 1.1em;">DESCRIPTION</a>
                            </li>
                            <li>
                                <a class="tablinks" onclick="openCity(event, 'tab-2')" style="font-size: 1.1em;">Questions about this Product</a>
                            </li>
                            <li>
                                <a class="tablinks" onclick="openCity(event, 'tab-3')" style="font-size: 1.1em;">Customer Reviews</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Description -->
                    <div id="tab-1" class="tabcontent">
                        <div class="product-content">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5>Introduction</h5>
                                    <p><?php echo "$pro_desc";?></p>
                                </div>
                                <div class="col-lg-5">

                                    <?php 
                                    
                                    $get_cat = "select * from product_categories where p_cat_id='$temp_id2'";
                                    $run_cat = mysqli_query($con,$get_cat);
                                    $row_cat = mysqli_fetch_array($run_cat);

                                    $p_cat_image = $row_cat['p_cat_image'];
                                    
                                    echo "<img src='admin_area/product_images/$p_cat_image' alt='Image not found'>";
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Questions for products-->
                    <div id="tab-2" class="tabcontent">
                        <!--Test Here-->
                      
                        <br>
                        
                        <div class="load-comments" id="target">
                        </div>
                        <?php if(isset($_SESSION['customer_email'])) { ?>
                        <hr>
                        <div class="card-body">
                            <form id="comment_post" method="post">
                                <div class="leave-comment">
                                       <h4>Ask Question</h4>
                                </div>
                                <div class="comment-area">
                                    <div class="comment-area-text">
                                        <textarea class="form-control" style="font-size:1.5em; resize: none;" id="usercomment" cols="30" rows="5" placeholder="Tell us what you thought about it"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="site-btn">Send message</button>
                                        <span id="comment_error" class="error-msg" style="font-size: 1.5em; padding-left: 50%; color: red;"></span>
                                        <span id="comment_success" class="success-msg" style="font-size: 1.5em; padding-left: 50%; color: lightgreen;"></span>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <?php } else { ?>
                        <?php 
                            echo "
                            
                            <center>
                                <table id='ask'>
                    				<tr style='font-size: 12pt;'>
                    				<td><a href='my_account.php' >Login</a></td><td>&nbsp;or&nbsp;</td><td><a href='register.php'>Register</a></td><td>&nbsp;to ask questions.</td>
                    				</tr>
                				</table>
                				</center>
                            ";
                        }
                        ?>
                        <!--Text End-->
                    </div>
                    <!--Reviews-->
                    <div id="tab-3" class="tabcontent">
                        <br>
                        
                        <div class="rev-load-comments" id="rev-target">
                        </div>
                        <?php if(isset($_SESSION['customer_email'])) { ?>
                        <hr>
                        <div class="card-body">
                            <form id="rev-comment_post" method="post">
                                <div class="leave-comment">
                                       <h4>Leave A Review</h4>
                                </div>
                                <div class="comment-area">
                                    <div class="comment-area-text">
                                        <textarea class="form-control" style="font-size:1.5em; resize: none;" id="rev-usercomment" cols="30" rows="5" placeholder="Tell us what you thought about it"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="site-btn">Send message</button>
                                        <span id="rev-comment_error" class="error-msg" style="font-size: 1.5em; padding-left: 50%; color: red;"></span>
                                        <span id="rev-comment_success" class="success-msg" style="font-size: 1.5em; padding-left: 50%; color: lightgreen;"></span>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <?php } else { ?>
                        <?php 
                            echo "
                            
                            <center>
                                <table id='ask'>
                    				<tr style='font-size: 12pt;'>
                    				<td><a href='my_account.php' >Login</a></td><td>&nbsp;or&nbsp;</td><td><a href='register.php'>Register</a></td><td>&nbsp;to ask questions.</td>
                    				</tr>
                				</table>
                				</center>
                            ";
                        }
                        ?>
                    </div>

                </div>
            </div>
            
        </div>
        
    </section>
    
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php 
                    getRelatedProducts();
                ?>
            </div>

        </div>
    </div>
    
    <!-- Related Products Section End -->

    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->
    
</body>

</html>
<?php

    // Delete Pickup Address
    if(isset($_POST['delete_product'])){

        $id = $_POST['delete_product'];
        $delete_address= "delete from cart where p_id='$id'";
        
        if(mysqli_query($con,$delete_address)){
            echo "<script>alert('One of Your Pickup Address Has Been Deleted')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }

?>