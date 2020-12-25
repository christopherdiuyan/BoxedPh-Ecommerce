<?php 

    $active='About';
    include("includes/header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
  
    <!-- Header End -->
    
     <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>About Us</h2>

                            <?php 
                                $get_contents = "select * from settings_about_us WHERE about_us_id=2";
                                $run_contents = mysqli_query($con,$get_contents);
                                $run_website_contents=mysqli_fetch_array($run_contents);
                                
                                $about_us_history_date = $run_website_contents['about_us_history_date'];
                                $about_us_desc = $run_website_contents['about_us_desc'];
                                $about_us_image = $run_website_contents['about_us_image'];
                                
                                $about_us_quote = $run_website_contents['about_us_quote'];
                                $about_us_quote_author = $run_website_contents['about_us_quote_author'];
                            ?>
                            <p>History<span>- <?php echo $about_us_history_date ?></span></p>
                        </div>
                        
                        <div class="blog-detail-desc">
                           <p><?php echo $about_us_desc ?></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="adming_area/about_us_images/<?php echo $about_us_imag ?>" alt="">
                        </div>
                        <div class="blog-quote">
                            <p><br><?php echo $about_us_quote ?> <span>- <?php echo $about_us_quote_author ?></span></p>
                        </div>
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="images/event1.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/event2.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/event3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <p>We offer both ready-made and personalized invites, even invitation materials and other items like souvenir boxes, guest books, cupcake wrappers, cupcake toppers, messsage cards, and place cards are available</p>
    <!-- Services Section Begin -->
                        <div class="blog-more">
                            <div class="blog-detail-title" id="services">
                            <h1>Services</h1>
                        </div>
                            <div class="row">
                                <?php 
                                    $get_contents = "select * from settings_services";
                                    $run_contents = mysqli_query($con,$get_contents);

                                    while($run_service_contents=mysqli_fetch_array($run_contents)){
                                    
                                    $service_id = $run_service_contents['service_id'];
                                    $service_name = $run_service_contents['service_name'];
                                    $service_desc = $run_service_contents['service_desc'];

                                ?>
                                <div class="col-sm-4">
                                    <h3><?php echo $service_name ?></h3>
                                    <p><?php echo $service_desc ?></p>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <br>
    <!-- Services Section End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
    
  <?php 
    
    include("includes/footer.php");
    
    ?>
</body>

</html>