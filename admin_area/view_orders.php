<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
    
    if(isset($_GET['view_orders']) && isset($_GET['status']) && isset($_GET['c_id'])){
        
        $prod_id = $_GET['view_orders'];
        $status = $_GET['status'];
        $c_id = $_GET['c_id'];
        
        $update_item1 = "update pending_orders set order_status='$status' where customer_id='$c_id' AND product_id='$prod_id'";
        $run_item1 = mysqli_query($con,$update_item1);
        
        $get_item = "select invoice_no from pending_orders where customer_id='$c_id' AND product_id='$prod_id'";
        $run_item = mysqli_query($con,$get_item);
        $row_item = mysqli_fetch_array($run_item);
        $invoice_no = $row_item['invoice_no'];
        
        $update_item2 = "update customer_orders set order_status='$status' where customer_id='$c_id' AND invoice_no='$invoice_no'";
        $run_item2 = mysqli_query($con,$update_item2);
        
        if($run_item1 && $run_item2){
                echo "<script>window.open('index.php?view_orders','_self')</script>";
            }
    }
?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
               Your Store / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Orders
                    <div class="pull-right">
                    <span><span style="background-color: lightgreen;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Completed</span>
                    <span><span style="background-color: #d9edf7;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Ready for Pickup</span>
                    <span><span style="background-color: #ffff83;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Order Processing</span>
                    
                </div>
               </h3><!-- panel-title finish --> 
               
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="datatableid" class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer Email: </th>
                                <th> Invoice No: </th>
                                <th> Product Name: </th>
                                <th> Product Qty: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th style="text-align: center;"> Status: </th>
                                <!--<th style="width: 40%;text-align: center;"> Actions </th>-->
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                            
                                $i=0;
                                $status = array("Order Processing" => 1, "Ready for Pickup" => 2, "Completed" => 3);
                                $get_orders = "select * from pending_orders";
                                
                                $run_orders = mysqli_query($con,$get_orders);
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_id = $row_order['product_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $get_products = "select * from products where product_id='$product_id'";
                                    
                                    $run_products = mysqli_query($con,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);
                                    
                                    $product_title = $row_products['product_title'];
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $get_c_order = "select * from customer_orders where order_id='$order_id'";
                                    
                                    $run_c_order = mysqli_query($con,$get_c_order);
                                    
                                    $row_c_order = mysqli_fetch_array($run_c_order);
                                    
                                    $order_date = $row_c_order['order_date'];
                                    
                                    $amount = $row_c_order['due_amount'];
                                    
                                    $order_amount = number_format($amount, 2, '.', '');
                                    
                                    $i++;
                                   
                            
                            ?>
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_date; ?> </td>
                                <td>₱ <?php echo $order_amount; ?> </td>
                                <td>
                                    <span class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" 
                                        <?php 
                                            if("Completed" == $order_status){
                                                echo"disabled";
                                            }
                                        ?>
                                        style="background-color: 
                                         <?php
                                            if("Completed" == $order_status){
                                                echo"lightgreen;color: black;border: 0px;";
                                            }elseif($order_status == "Order Processing"){
                                                echo"#ffff83;color: black;border: 0px;";
                                            }
                                            elseif($order_status == "Order Placed")
                                                echo"#DF7861";
                                            else{
                                                echo"#d9edf7;color: black;border: 0px;";
                                                
                                            }
                                        ?>
                                        "
                                        type="button" data-toggle="dropdown" aria-expanded="true"><?php echo $order_status;?>
                                            <span class="caret"></span>
                                            
                                        </button>
                                        <ul class="dropdown-menu"> 
                                            <?php 
                                            foreach($status as $key => $value){
                                                echo"
                                                <li><a href='index.php?view_orders=$product_id&amp;status=$key&amp;c_id=$c_id'>
                                                $key</a></li>
                                                ";
                                            }
                                            ?>
                                        </ul>
                                    </span>
                                </td>
                                <!--<td style="text-align: center;"> -->
                                <!--<form method="POST">  -->
                                
                                <!--<a href="index.php?delete_order=<?php //echo $order_id; ?>" name="delete_service" class="btn btn-danger"><i class="fa fa-trash"></i> Remove </a>-->
                                <!--</form> -->
                                <!--</td>-->
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>