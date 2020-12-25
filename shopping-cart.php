<?php 
    $active='Shopping';
    include("includes/header.php");
    include("includes/db.php");
    
    
if(isset($_GET['prod_item']) && isset($_GET['dec_qty'])){
    
    global $db;
    
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
        $qty = $_GET['dec_qty'] -= 1;
        $p_id = $_GET['prod_item'];

        if($qty < 1){
            echo "<script>window.open('shopping-cart.php','_self')</script>";
        }
        else
        {
            $update_item = "update cart set qty='$qty' where ip_add='$ip_add' AND p_id='$p_id' AND c_id='$c_id'";
            $run_item = mysqli_query($db,$update_item);
            
            if($run_item){
                echo "<script>window.open('shopping-cart.php','_self')</script>";
            }
        }    
}

if(isset($_GET['prod_item']) && isset($_GET['add_qty'])){
    
    global $db;
    
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
        $qty = $_GET['add_qty'] += 1;
        $p_id = $_GET['prod_item'];

        $select_item = "select product_stocks from products where product_id='$p_id'";
        $run_item = mysqli_query($db,$select_item);
        $row_item = mysqli_fetch_array($run_item);
        $temp = $row_item['product_stocks'];
        
        if($row_item['product_stocks'] < $qty){
            $qty -= 1;
            echo "<script>alert('This product has ($qty) stocks only.')</script>";
            echo "<script>window.open('shopping-cart.php','_self')</script>";
        }
        else
        {
            $update_item = "update cart set qty='$qty' where ip_add='$ip_add' AND p_id='$p_id' AND c_id='$c_id'";
            $run_item = mysqli_query($db,$update_item);
            
            if($run_item){
                echo "<script>window.open('shopping-cart.php','_self')</script>";
            }
        }
}
?>
<style>
    #container{font-size:1.5em;}
    .quantity {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	margin-bottom: 33px;
	padding-top: 30px;
}

.quantity .prod-qty {
	width: 123px;
	height: 46px;
	border: 2px solid #ebebeb;
	padding: 0 15px;
	float: left;
	margin-right: 14px;
}

.quantity .prod-qty .qtybtn a{
	font-size: 24px;
	color: #b2b2b2;
	float: left;
	line-height: 38px;
	cursor: pointer;
	width: 18px;
}
.quantity .prod-qty .qtybtn a:hover {
	
	color: black;
}

 .quantity .prod-qty .qtybtn.dec a:hover {
	color: black;
}
.quantity .prod-qty .qtybtn.dec a{
	font-size: 30px;
}

 .quantity .prod-qty input {
	text-align: center;
	width: 52px;
	font-size: 14px;
	font-weight: 700;
	border: none;
	color: #4c4c4c;
	line-height: 40px;
	float: left;
}
</style>
<div id="container">
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="./shopping-cart.php">Pages</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<!--<form method="post" enctype="multipart/form-data">-->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="cart-table">
                    
                    <table id="datatableid">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
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
                                
                                $select_cart = "select * from cart where ip_add='$ip_add' AND c_id='$c_id'";
                                $run_cart = mysqli_query($con,$select_cart);
                                $count_cart= mysqli_num_rows($run_cart);

                                $amount3 = 0;
                                
                                while($row_cart = mysqli_fetch_array($run_cart)){
                                   
                                 $pro_id = $row_cart['p_id'];
                                   
                                 $pro_qty = $row_cart['qty'];
                                   
                                   $get_products = "select * from products where product_id='$pro_id'";
                                   
                                   $run_products = mysqli_query($con,$get_products);
                                   
                                   while($row_products = mysqli_fetch_array($run_products)){
                                       
                                       $product_id = $row_products['product_id'];
                                       
                                       $product_title = $row_products['product_title'];
                                       
                                       $product_img1 = $row_products['product_img1'];
                                       
                                       $amount1 = $row_products['product_price'];
                                       $only_price = number_format($amount1, 2, '.', '');
                                       
                                       $amount2 = $row_products['product_price']*$pro_qty;
                                       $sub_total = number_format($amount2, 2, '.', '');
                                       
                                       $amount3 += $sub_total;
                                       $total = number_format($amount3, 2, '.', '');
                                      
                            ?>
                            <tr>
                                <input type="hidden" id="product_id" value="<?php echo $product_id ?>">
                                <td class="cart-pic first-row">
                                    <img src="admin_area/product_images/<?php echo $product_img1 ?>" width="100" height="100" alt=""></td>
                                <td class="cart-title first-row">
                                    <a href="details.php?pro_id=<?php echo $product_id?>">
                                    <h5><?php echo $product_title ?></h5>
                                    </a>
                                </td>
                                <td class="p-price first-row">₱ <?php echo $only_price ?></td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="prod-qty">
                                            
                                            <span class="dec qtybtn"><a href="shopping-cart.php?prod_item=<?php echo $product_id ?>&amp;dec_qty=<?php echo $pro_qty ?>">-</a></span>
                                            <input min="1" max="999" autocomplete="off" id="pro-qty" type="number" readonly value="<?php echo $pro_qty ?>">
                                            <span class="inc qtybtn"><a href="shopping-cart.php?prod_item=<?php echo $product_id ?>&amp;add_qty=<?php echo $pro_qty ?>">+</a></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row" id="price">₱ <?php echo $sub_total ?></td>
                                <td class="close-td first-row">
                                    <!--<form method='POST'>-->
                                        <a href="shopping-cart.php?delete_product=<?php echo $product_id ?>" style="color: black;"><i class="ti-close"></i></a> 
                                     <!--</form>-->
                                </td>
                            </tr>

                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            
                            <a href="shop.php" class="primary-btn continue-shop">Continue shopping</a>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <!-- <li class="subtotal">Subtotal <span>$240.00</span></li> -->
                                <li class="cart-total">Total <span>₱ <?php echo $total ?></span></li>
                            </ul>
                            <a href="
                            <?php 
                            if($count_cart > 0)
                                echo "check-out.php";
                            else
                                echo "shopping-cart.php";
                            ?>
                            " class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
<!--</form>-->
</div>
<!-- Shopping Cart Section End -->

<!-- Footer Section Begin -->
<?php 

include("includes/footer.php");

?>
<!-- Footer Section End -->
<?php 

 if(isset($_POST['delete_product'])){

    $id = $_POST['delete_product'];
    $delete_address= "delete from cart where p_id='$id'";
    
    if(mysqli_query($con,$delete_address)){
        echo "<script>window.open('shopping-cart.php','_self')</script>";
    }
}
?>