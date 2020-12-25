<center><!--  center Begin  -->
    <h2> My Wishlist </h2>
    <p class="lead"> Your Favorite items is on one place.</p>
    <p class="text-muted">
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a> 
    </p>
</center><!--  center Finish  -->
<hr>

<div class="cart-table"><!--  table-responsive Begin  -->
    <table id="datatableid" style="text-align: center;">
        <thead>
            <tr>
                <th>Image</th>
                <th class="p-name">Product Name</th>
                <th>Price</th>
                <th>Action</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
                
            <?php 
                $session_email = $_SESSION['customer_email'];
                $select_customer = "select * from customers where customer_email='$session_email'";
                $run_customer = mysqli_query($con,$select_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $c_id = $row_customer['customer_id'];
                
                $ip_add = getRealIpUser();
                
                $select_cart = "select * from wishlist where ip_add='$ip_add' AND c_id='$c_id'";
                $run_cart = mysqli_query($con,$select_cart);
                $total = 0;
                while($row_cart = mysqli_fetch_array($run_cart)){
                 $pro_id = $row_cart['p_id'];
                   $get_products = "select * from products where product_id='$pro_id'";
                   $run_products = mysqli_query($con,$get_products);
                   while($row_products = mysqli_fetch_array($run_products)){
                       $product_id = $row_products['product_id'];
                       $product_title = $row_products['product_title'];
                       $product_img1 = $row_products['product_img1'];
                       $amount = $row_products['product_price'];
                       $only_price = number_format($amount, 2, '.', '');
            ?>
            <tr>
                <td class="cart-pic first-row"><img src="../admin_area/product_images/<?php echo $product_img1 ?>" width="100" height="100" alt=""></td>
                <td class="cart-title first-row">
                    <a href="../details.php?pro_id=<?php echo $product_id?>">
                    <h5><?php echo $product_title ?></h5>
                    </a>
                </td>
                <td class="p-price first-row">₱ <?php echo $only_price ?>
                
                </td>
                <td class="cart-button first-row">
                    <form method="POST">
                    <a href="my_account.php?add_cart=<?php echo $product_id; ?>" style="font-size:1.3em;" name="addToCart" class="btn btn-warning"><span class="fa fa-shopping-cart"></span> Add To Cart
                    </a>
                    </form>
                </td>
                <td class="close-td first-row">
                    <form method="POST">
                        <a href="my_account.php?delete_product=<?php echo $product_id ?>" style="color: black;"><i class="ti-close"></i></a> 
                     </form>
                </td>
            </tr>
    
            <?php } } ?>
        </tbody>
    </table>
    <!--  table table-bordered table-hover Finish  -->
</div><!--  table-responsive Finish  -->
