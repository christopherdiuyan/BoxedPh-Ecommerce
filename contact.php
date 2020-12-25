<?php 

    $active='Contact';
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
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <div class="map spad" >
        <div class="section-title" style="text-align: center;">
            <h2>Our Customer Service is Available <strong>24</strong>/<strong>7</strong></h2>
        </div>
    </div>
    <!-- Map Section Begin -->
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9504141934203!2d121.00278561448074!3d14.60190058096041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9e2fb03877f%3A0x2361382220c33ef!2sBoxed%20PH!5e0!3m2!1sen!2sph!4v1584266728418!5m2!1sen!2sph" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contact Us</h4>
                        <p>Boxed PH offers a wide variety of boxes and cases that will suit your packaging needs for party favors and other gifts for important celebrations.</p>
                    </div>
                    <div class="contact-widget">
                        
                        <?php
                            $get_contents = "select * from settings_shop_details";
                            $run_contents = mysqli_query($con,$get_contents);

                            $run_service_contents=mysqli_fetch_array($run_contents);
                            
                            $shop_address_id = $run_service_contents['shop_address_id'];
                            $shop_address = $run_service_contents['shop_address'];
                            $phone_no = $run_service_contents['phone_no'];
                            $email = $run_service_contents['email'];
                         ?>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p><?php echo $shop_address ?></p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p><?php echo $phone_no ?></p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p><?php echo $email ?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p>
                            <form class="comment-form" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="c_name" placeholder="Your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" name="c_email" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your message" name="c_message"></textarea>
                                        <button type="submit" name="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                                
                            </form>
                                <?php add_inquiry();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->

</body>

</html>