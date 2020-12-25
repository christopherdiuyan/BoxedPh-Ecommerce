<?php
    $active='Checkout';
    include("includes/header.php");
    
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];

?> 
<?php
	$paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr';
	$paypalId='boxedPh2@gmail.com';
?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./check-out.php">Pages</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="
            <?php
            if(isset($_GET['COP']) && isset($_GET['c_id'])){
                
                echo "order.php?c_id=_GET['c_id'])";
            }else{
                echo $paypalUrl; 
            }

            ?>
            
            " method="post" name="frmPayPal1"class="checkout-form">
                
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        
                        <div class="place-order">
                            <center>
                            <h4>Your Order</h4>
                            </center>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Amount</span></li>
                                    <?php

                                    $ip_add = getRealIpUser();
                                    $select_cart = "select * from cart where ip_add='$ip_add'";
                                    $run_cart = mysqli_query($con,$select_cart);

                                    $amount = 0;
                                   
                                    while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_qty = $row_cart['qty'];
                                       
                                       $get_products = "select * from products where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_img1 = $row_products['product_img1'];
                                           
                                           $only_price = number_format($row_products['product_price'], 2, '.', '');
                                           
                                           $sub_total = number_format($row_products['product_price']*$pro_qty, 2, '.', '');
                                           $amount += $sub_total;
                                           $total = number_format($amount, 2, '.', '');
                                           
                                    
                                ?>
                                    <li class="fw-normal"><?php echo $product_title?> x <?php echo $pro_qty?> <span>₱ <?php echo $sub_total?></span></li>
                                    <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="item_name" value="<?php echo $product_title?>">
                                    <input type="hidden" name="item_number" value="<?php echo $pro_id?>">
                                    <input type="hidden" name="amount" value="<?php echo $total?>">
                                    <input type="hidden" name="no_shipping" value="1">
                                    <input type="hidden" name="currency_code" value="PHP">
                                    <input type="hidden" name="cancel_return" value="https://boxed-ph.hostingerapp.com/shop.php">
                                    <input type="hidden" name="return" value="https://boxed-ph.hostingerapp.com/customer/my_account.php?c_id=<?php echo $customer_id ?>">
                                <?php } } ?>
                                    <li class="total-price">Total <span>₱ <?php echo $total?></span></li>
                                </ul>
                                <div class="order-btn">
                                    <a href="index.php" class="site-btn btn-info" >Cancel</a>
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <?php include("includes/footer.php");?>
