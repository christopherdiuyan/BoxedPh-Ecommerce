<?php 

    $active='Shop';
    include("includes/header.php");

?>
    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="col-lg-3">

            <?php 
    
            include("includes/sidebar.php");
            
            ?> 
            </div>
                <div class="col-lg-9" >
                        <!-- Products starts here -->
                   <div id="products" class="row">
                        <div class="product-list">
                            <?php add_cart(); ?>
                            <?php getProducts(); ?>
                            <?php add_wishlist(); ?>
                            <?php //getSortedProducts(); ?>
                        </div>
                    </div>
                         <!-- Products ends here -->
                        
                        <div class="row"style="justify-content: center;">   <!-- row Start -->
                            <div class="loading-more">
                               <ul class="pagination" ><!-- pagination Begin -->

                                    <?php getPaginator(); ?>

                               </ul><!-- pagination Finish -->
                                   <!--  <i class="icon_loading"></i>
                                    <a href="#">
                                        Loading More
                                    </a> -->
                            </div>
                        </div> <!-- row Finish -->
                       
                    </div><!-- row Finish -->
                

            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->
    <script>
    function getProducts() {
      var x = document.getElementById("order").value;
    //   alert(x);
    //   document.getElementById("demo").innerHTML = "You selected: " + x;
    }
    </script>
