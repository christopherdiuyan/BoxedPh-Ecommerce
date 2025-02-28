<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        $get_p = "select * from products where product_id='$edit_id'";
        $run_edit = mysqli_query($con,$get_p);
        $row_edit = mysqli_fetch_array($run_edit);
        $p_id = $row_edit['product_id'];
        $product_sku = $row_edit['sku'];
        $p_title = $row_edit['product_title'];
        $p_cat = $row_edit['p_cat_id'];
        $cat = $row_edit['cat_id'];
        $p_category = $row_edit['product_category'];

        $p_image1 = $row_edit['product_img1'];
        $p_image2 = $row_edit['product_img2'];
        $p_image3 = $row_edit['product_img3'];

        $p_price = $row_edit['product_price'];
        $p_color = $row_edit['product_color'];
        $p_size = $row_edit['product_size'];
        $p_material = $row_edit['product_material'];
        $product_stocks = $row_edit['product_stocks'];
        $p_keywords = $row_edit['product_keywords'];
        $p_desc = $row_edit['product_desc'];
        
    }
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];

        $get_cat = "select * from categories where cat_id='$cat'";
        $run_cat = mysqli_query($con,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_title'];

?>
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-shopping-cart fa-fw"></i> Update Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   <div class="form-group"><!-- form-group Begin  Product Name-->
                       
                      <label class="col-md-3 control-label"> Stock Keeping Unit (SKU) </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_sku" type="text" value="<?php  echo$product_sku ?>" class="form-control" readonly>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_cat" class="form-control"><!-- form-control Begin -->

                              <option disabled value="Select Product Category">Select Product Category</option>       
                              
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat" class="form-control"><!-- form-control Begin -->

                              <option disabled value="Select Category">Select Category</option>
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1"  type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2"  type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                  <div class="form-group"><!-- form-group Begin Product Color-->
                       
                      <label class="col-md-3 control-label"> Product Color </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_color" type="text" class="form-control" required value="<?php echo $p_color; ?>">
                          
                      </div><!-- col-md-6 Finish -->  
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin Product Size-->
                       
                      <label class="col-md-3 control-label"> Product Size </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_size" type="text" class="form-control" required value="<?php echo $p_size; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin Product Material-->
                       
                      <label class="col-md-3 control-label"> Product Material </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_material" type="text" class="form-control" required value="<?php echo $p_material; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin Product Material-->
                       
                      <label class="col-md-3 control-label"> Product Stocks </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_stocks" type="number" value="<?php echo $product_stocks ?>" autocomplete="off" min="0" max="999" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" id="udpate"value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>

<?php 

  if(isset($_POST['update'])){
    
    $product_title    = $_POST['product_title'];
    $product_cat      = $_POST['product_cat'];

    $cat              = $_POST['cat'];
    $product_price    = $_POST['product_price'];
    $product_color    = $_POST['product_color'];
    $product_size     = $_POST['product_size'];
    $product_material = $_POST['product_material'];
    $product_keywords = $_POST['product_keywords'];
    $product_stocks   = $_POST['product_stocks'];
    $product_desc     = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name']; 
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    if(!isset($file) && !isset($file) && !isset($file))//$temp_name1 != "" && $temp_name2 != "" && $temp_name3 != ""

    {
        // work for upload / update image2wbmp(image)
        // $product_img1 = $_FILES['product_img1']['name']; 
        // $product_img2 = $_FILES['product_img2']['name'];
        // $product_img3 = $_FILES['product_img3']['name'];
        
        // $temp_name1 = $_FILES['product_img1']['tmp_name'];
        // $temp_name2 = $_FILES['product_img2']['tmp_name'];
        // $temp_name3 = $_FILES['product_img3']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
        
        $update_product = "update products set 
        p_cat_id='$product_cat',
        cat_id='$cat',
        date=NOW(),
        product_title='$product_title',
        product_category='$p_cat_title',
        product_img1='$product_img1',
        product_img2='$product_img2',
        product_img3='$product_img3',
        product_keywords='$product_keywords',
        product_desc='$product_desc',
        product_price='$product_price', 
        product_color='$product_color', 
        product_size='$product_size', 
        product_stocks = '$product_stocks',
        product_material='$product_material' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
        
      }
      else
      {
         // if no image selected the old image remain as it is.

        $update_product = "update products set 
        p_cat_id='$product_cat',
        cat_id='$cat',
        date=NOW(),
        product_title='$product_title', 
        product_category='$p_cat_title',
        product_img1='$p_image1',
        product_img2='$p_image2 ',
        product_img3='$p_image3 ',
        product_keywords='$product_keywords',
        product_desc='$product_desc',
        product_price='$product_price', 
        product_color='$product_color', 
        product_size='$product_size', 
        product_stocks = '$product_stocks',
        product_material='$product_material' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Your product has been updated Successfully. No image has been updated')</script>";
        // echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
    }
    
}


?>


<?php } ?>