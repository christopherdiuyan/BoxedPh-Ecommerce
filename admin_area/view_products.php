<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                Your Store / View Products
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Products
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="datatableid" class="table table-striped table-bordered table-hover" style="width: 100%" ><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th style="width: 5%;"> No.: </th>
                                <th style="width: 15%;"> Product SKU: </th>
                                <th style="width: 25%;"> Product Title: </th>
                                <th style="width: 10%;"> Product Image: </th>
                                <th style="width: 5%;"> Product Price: </th>
                                <th style="width: 5%;"> Product Stocks: </th>
                                <th style="width: 5%;"> Product Sold: </th>
                                <th style="width: 15%;"> Product Date: </th>
                                <th style="width: 40%;text-align: center;"> Actions </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from products";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];

                                    $sku = $row_pro['sku'];
                                    
                                    $pro_title = $row_pro['product_title'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];

                                    $product_stocks = $row_pro['product_stocks'];
                                    
                                    $pro_keywords = $row_pro['product_keywords'];
                                    
                                    $pro_date = $row_pro['date'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td style="text-align: center;"> <?php echo $i; ?> </td>
                                <td> <?php echo $sku; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td style="text-align: center;">
                                     <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"> 
                                </td>
                                <td style="text-align: center;"> ₱ <?php echo $pro_price; ?> </td>
                                <td style="text-align: center;<?php 
                                if($product_stocks == 0){
                                        echo "background-color:#ffadad";
                                    }
                                ?>"> <?php echo $product_stocks;
                                    if($product_stocks == 0){
                                        echo "<br><strong>Out of Stock!</strong>";
                                    }
                                ?> </td>
                                <td style="text-align: center;"> <?php 
                                
                                        $get_sold = "SELECT SUM(qty) AS QTY FROM pending_orders where product_id='$pro_id' LIMIT 1";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                        
                                        $row_pro=mysqli_fetch_array($run_sold);
                                        
                                        if($row_pro['QTY'] == "")
                                            echo "0";
                                            
                                        else
                                            echo $row_pro['QTY'];
                                    
                                     ?> 
                                </td>
                                <td> <?php echo $pro_date ?> </td>

                                <td style="text-align: center;"> 
                                   <form method="POST"> 
                                        <a href="index.php?edit_product=<?php echo $pro_id; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                        <div style="height:10px;"></div>
                                        <a href="#del<?php echo $pro_id; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></span> Remove</a>
                                    </form> 
                                    <?php include('modal.php'); ?>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea'});</script>
<?php } ?>
<!-- Trigger the modal with a button -->

