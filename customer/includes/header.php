<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

?>
<?php
// $_SESSION['customer_email'] = "customer1@gmail.com";
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
        // echo "<script>window.open('details.php?pro_id=$id','_self')</script>";
    }
}

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id='$product_id'";
    $run_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $cat_id = $row_product['cat_id'];
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
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $title?></title>

    <!-- Google Font -->
    <!--<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">-->

    <!-- Css Styles -->
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="css/fonts.googleapis.css" type="text/css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">-->
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" type="text/css">-->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css">
    <!--<script src="css/sdk.js"></script>-->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
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
    
    #btnwishlish{
        height: 50px;
        background-color: #E7AB3C;
        border-color: #E7AB3C;
        border: 0px;
        box-shadow: 0px 0px;
    }
    .nav {
    background-color: #e7e7e7;
}
.nav-tabs> li.active > a, .nav-tabs> li.active > a:hover, .submenu > .nav {
    background-color: #bdbdbd;
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

</style>
</head>
<body>
<header class="header-section">

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
            <?php 
            if(!isset($_SESSION['customer_email'])){
                echo "<a href='../check-out.php' class='login-panel'><i class='fa fa-user'></i>Login</a>";
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
                <a href="../index.php">
                    <img src="../images/logo.png" alt="" style="width:200px; height:30px">
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
                    <a href="../customer/my_account.php?my_wishlist">
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
                    <a href="../shopping-cart.php">
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
                                            <td class='si-pic'><img src='../admin_area/product_images/$product_img1' width='100' height='100' alt=''></td>
                                            <td class='si-text'>
                                                <div class='product-selected'>
                                                    <p>₱ $product_price x $product_qty</p>
                                                    <a href='../details.php?pro_id=$product_id'>
                                                    <h6>$product_title</h6>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class='si-close'>
                                                 <form method='POST'>
                                                    <a href='../details.php?delete_product=$prod_id' class='ti-close'></a> 
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
                            <a href="../shopping-cart.php" class="primary-btn view-card">VIEW CART</a>
                            <a href="../check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
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
                        <a href="../index.php">Home</a>
                    </li>
                    <li class="">
                        <a href="../shop.php">Shop</a>
                        <ul class="dropdown">
                            <li><a href="../shop.php">Boxes</a></li>
                            <li><a href="../shop.php">Cards</a></li>
                            <li><a href="../shop.php">Ribbons</a></li>
                            <li><a href="../shop.php">Lasercut Items</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($active=='Partnership') echo"active"; ?>">
                        <a href="../partnership.php">Partnership</a>
                    </li>
                    <li class="<?php if($active=='About') echo"active"; ?>">
                        <a href="../about.php">About Us</a>
                    </li>
                    <li class="<?php if($active=='Contact') echo"active"; ?>">
                        <a href="../contact.php">Contact</a>
                    </li>
                    <li class="<?php if($active=='Pages') echo"active"; ?>"><a href="../faq.php">Pages</a>
                        <ul class="dropdown">
                            <li class="<?php if($active=='Faq') echo"active"; ?>"><a href="../faq.php">FAQ</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            </center>
            <div id="mobile-menu-wrap"></div>
        </div>      
    </div>
</header>
</body>

<script type="text/javascript">
  $(document).ready(function(){
    $("#country").keyup(function(){
      var query = $(this).val();
      if (query != "") {
        $.ajax({
                url: 'backend-search.php',
                method: 'POST',
                data: {query:query},
                success: function(data)
                {
                  $('#results').html(data);
                  $('#results').css('display', 'block');
                    $("#country").focusout(function(){
                        $('#results').css('display', 'none');
                    });
                    $("#country").focusin(function(){
                        $('#results').css('display', 'block');
                    });
                }
        });
      } else {
             $('#results').css('display', 'none');
      }
    });
  });
</script>

<script>
    $('a','.nav-tabs > li').hover(function(){ 
  $(this).trigger('click'); 
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $('.tab-pane').not($(this).attr('href')).removeClass('active');
});
</script>

<?php

    // Delete Pickup Address
    if(isset($_POST['delete_product'])){

        $id = $_POST['delete_product'];
        $delete_address= "delete from cart where p_id='$id'";
        
        if(mysqli_query($con,$delete_address)){
            echo "<script>alert('One of Your Item in Cart Has Been Deleted')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }

    if(isset($_POST['search_product'])){

        $search = $_POST['item'];

        $delete_address = "SELECT * FROM products WHERE product_title LIKE '%".$search."%' OR codice LIKE '%".$search."%' OR descrizione LIKE '%".$search."%'";
        
        if(mysqli_query($con,$delete_address)){
            echo "<script>alert('One of Your Pickup Address Has Been Deleted')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }
    

?>
