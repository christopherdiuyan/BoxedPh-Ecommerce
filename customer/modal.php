<style>

.progress {
   width: 100%;
   justify-content: center;
  border: none !important;
  background-color: white;
  margin: 20px auto;
  text-align: center;
 padding-bottom: 80px;
}
.progress .circle,
.progress .bar {
  display: inline-block;
  background: white;
  width: 40px;
  height: 40px;
  border-radius: 40px;
  border: 1px solid #d5d5da;
  vertical-align:top;
}
.progress .bar {
  position: relative;
  width: 80px;
  height: 6px;
  margin: 0 -5px 17px -5px;
  border-left: none;
  border-right: none;
  border-radius: 0;
  top:16px;
  vertical-align:top
}
.progress .circle .label {
  display: inline-block;
  width: 32px;
  height: 32px;
  line-height: 32px;
  border-radius: 32px;
  margin-top: 3px;
  color: #b5b5ba;
  font-size: 2em;
}
.progress .circle .title {
  color: #b5b5ba;
  font-size: 2em;
  line-height: 18px;
  margin-left: -30px;
  display: block;
  width: 100px;
  margin-top: 5px;
}
/* Done / Active */

.progress .bar.done,
.progress .circle.done {
  background: #eee;
}
.progress .bar.active {
  background: linear-gradient(to right, #EEE 40%, #FFF 60%);
}
.progress .circle.done .label {
  color: #FFF;
  background: #8bc435;
  box-shadow: inset 0 0 2px rgba(0, 0, 0, .2);
}
.progress .circle.done .title {
  color: #444;
}
.progress .circle.active .label {
  color: #FFF;
  background: #0c95be;
  box-shadow: inset 0 0 2px rgba(0, 0, 0, .2);
}
.progress .circle.active .title {
  color: #0c95be;
}
#done-color{
background-color: #8bc435;
border-radius: 40px;
width: 40px;
  height: 30px;
}
#active-color{
 background-color: #0c95be; 
 border-radius: 40px;  
 width: 40px;
  height: 30px;
}
</style>

<div class="modal fade modal-lg" style="margin: auto;"id="del<?php echo $order_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Order Details</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="pull-right" style="padding-left: 10px;padding-top: 10px;">
                    <span><span id="done-color" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Done</span>
                    <span><span id="active-color" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Active</span>
                </div>
                <div class="modal-header">
                    <?php 
                    
                    $get_order = "select * from pending_orders where order_id='$order_id'";
                    $run_order = mysqli_query($con,$get_order);
                    $row_order = mysqli_fetch_array($run_order);
                    $customer_id = $row_order['customer_id'];
                    $product_id = $row_order['product_id'];
                    
                    $get_order = "select * from customer_orders where order_id='$order_id'";
                    $run_order = mysqli_query($con,$get_order);
                    $row_order = mysqli_fetch_array($run_order);
                    $due_amount = number_format($row_order['due_amount'], 2, '.', '');
                    $invoice_no = $row_order['invoice_no'];
                    $qty = $row_order['qty'];
                    $date = date_create($row_order['order_date']);
                    $order_status = $row_order['order_status'];
                    
                    switch($order_status){
                        case "Order Placed":
                            $orderID = 1;
                            break;
                        case "Order Processing":
                            $orderID = 2;
                            break;
                        case "Ready for Pickup":
                            $orderID = 3;
                            break;
                        case "Completed":
                            $orderID = 4;
                            break;
                    }
                    
                    ?>
                    <div class="progress" >
                        
                      <div class="circle done"> <span class="label"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                        <span class="title">Order Placed</span>
                    
                      </div> <span class="bar 
                      <?php 
                      if($orderID == 1){
                          echo"active";
                      }else{
                          echo "done";
                      }
                      ?>
                      "></span>
                      
                      
                      <div class="circle 
                      <?php 
                      if($orderID == 1){
                          echo"active";
                      }else{
                          echo "done";
                      }
                      ?>
                      "> <span class="label"><i class="fa fa-spinner" aria-hidden="true"></i></span>
                        <span class="title">Order Processing</span>
                    
                      </div> <span class="bar
                       <?php 
                      if($orderID == 2){
                          echo"active";
                      }elseif($orderID == 1){
                            echo "";
                      }else{
                          echo "done";
                      }
                      ?>
                      "></span>
                    
                    
                      <div class="circle 
                       <?php 
                      if($orderID == 2){
                          echo"active";
                      }elseif($orderID < 2){
                            echo "";
                      }else{
                          echo "done";
                      }
                      ?>
                      "> <span class="label"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Ready for Pickup</span>
                    
                      </div> <span class="bar
                      <?php 
                      if($orderID == 3){
                          echo"active";
                      }elseif($orderID < 3){
                            echo "";
                      }else{
                          echo "done";
                      }
                      ?>
                      "></span>
                    
                    
                      <div class="circle
                      <?php 
                      if($orderID == 3){
                          echo"active";
                      }elseif($orderID < 3){
                            echo "";
                      }else{
                          echo "done";
                      }
                      ?>
                      "> <span class="label">✓</span>
                        <span class="title">Completed</span>
                    
                      </div>
                    </div>
                    
                </div>
                
                <div class="modal-body">
				 <?php 
                
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
                    
                
                ?>
				<div class="container-fluid">
				    
                <div class="row">
                  
                    <img class="col-md-6" height="250" width="200" src="../admin_area/product_images/<?php echo $pro_img1 ?>" alt="">
                   
                    <div class="col-md-6">
                        <div class="product-details">
                               
                            <div class="pd-title">
                                
                                <h5>Order Date: <span>
                                    <?php echo strtoupper(date_format($date,"d M Y")); ?></span>
                                </h5>
                                
                                <h5>Invoice #:<span><?php echo $invoice_no ?></span></h5>
                                <h5>SKU:<span><?php echo $sku ?></span></h5>
                            </div>
                            <div class="pd-desc" style="padding-bottom:5%">
                                
                            </div>
                            <div class="pd-share">
                                <div class="p-code"><h6><strong >Price: </strong><font style="color:#e7ab3c">₱ <?php echo $pro_price ?></font></h6></div>
                            </div>
                            <div class="pd-color">
                                <h6>Qty: </h6><span><?php echo $qty ?></span>
                            </div>
                            <div class="pd-share">
                                <div class="p-code"><h6><strong >Total Payment: </strong><font style="color:#e7ab3c">₱ <?php echo $due_amount ?></font></h6></div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                </div> 
                
                
                <!--test-->
                
            
                <!--test end-->
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
				
            </div>
        </div>
    </div>