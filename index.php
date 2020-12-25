<?php 

    $active='Home';
    include("includes/db.php");
    include("includes/header.php");
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    
    .tab-item ul li:nth-child(1) a{
        border-right: 1px solid #fbd275;
    }
    .tab-item ul li:nth-child(2) a{
        border-right: 1px solid #fbd275;
    }
    .tab-item ul li:nth-child(3) a{
        border-right: 1px solid #fbd275;
    }
    .tab-item ul li a{
        color:#846938;
        border-top: 1px solid #fbd275;
        border-left: 1px solid #fbd275;
        border-bottom: 1px solid #fbd275;
    }
    .nav{
        background: #fbd275;
    }
    .nav li  a{
        background: #fbd275;
    }
    .nav li  a:hover{
        background: #f7c451;
        color:black;
    }
    </style>
</head>
<body>
    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <!-- slides starts here -->
        <?php 
            $get_slides = "select * from slider";
            $run_slides = mysqli_query($con,$get_slides);

            while($row_slides=mysqli_fetch_array($run_slides)){

                $slide_name = $row_slides['slider_name'];
                $slide_image = $row_slides['slide_image'];

                echo "

                <div class='single-hero-items set-bg' data-setbg='images/$slide_image'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-5'>
                                <h1>Boxed PH</h1>
                                <p>Providing Digital Prints and Packaging Solution</p>
                                <a href='shop.php' class='primary-btn'>Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }

            $get_slides = "select * from slider LIMIT 1,2";
            $run_slides = mysqli_query($con,$get_slides);

            while($row_slides=mysqli_fetch_array($run_slides)){
                $slide_name = $row_slides['slider_name'];
                $slide_image = $row_slides['slide_image'];
                echo "
                <div class='single-hero-items set-bg' data-setbg='images/$slide_image'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-5'>
                                <h1>Boxed PH</h1>	
                                <p>Make your dream wedding invitation cards</p>
                                <a href='shop.php' class='primary-btn'>Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="col"> 
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">

            <?php 
               
               $get_boxes = "select * from boxes_section LIMIT 3";
               $run_boxes = mysqli_query($con,$get_boxes);

               while($run_boxes_section=mysqli_fetch_array($run_boxes)){

                $box_title = $run_boxes_section['box_title'];
                $box_img = $run_boxes_section['box_img'];
                $cat_id = $run_boxes_section['cat_id'];
               
               ?>
                <div class="col-lg-4">
                    <div class="single-banner"> 
                        <img src="admin_area/box_images/<?php echo $box_img ?>" alt="">
                        <div class="inner-text">
                            <a href="shop.php?cat=<?php echo $cat_id?>">
                                 <h4><?php echo $box_title ?></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <?php    } ?>
            </div>
        </div>
    </div>
    </div>
    <!-- Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="images/bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Get your own boxes and cards<br /> hurry and buy now </p>
                    <div class="product-price">
                        12%
                        <span>Sale</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="shop.php" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->
    
    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-10" style="padding-right: 90px;">
                    <div class="filter-control" >
                        <div class="section-title">
                            <h2>Best Sellers</h2>
                        </div>
                        <div  class="tab-item">
                            <center>
                            <ul class="nav" role="tablist" style="display: flex;">
                                <li>
                                    <a class="tablinks" onclick="openCity(event, 'boxes')" id="defaultOpen">Boxes</a>
                                </li>
                                <li>
                                    <a class="tablinks" onclick="openCity(event, 'cards')">Cards</a>
                                </li>
                                <li>
                                    <a class="tablinks" onclick="openCity(event, 'ribbons')">Ribbons</a>
                                </li>
                                <li>
                                    <a class="tablinks" onclick="openCity(event, 'lasercuts')">Lasercuts</a>
                                </li>
                            </ul>
                            </center>
                        </div>
                    </div>
                    
                    <?php add_wishlist(); ?>
                    <div id="boxes" class="tabcontent">
                        <?php getPro_Boxes(); ?>
                    </div>
    
                    <div id="cards" class="tabcontent">
                       <?php getPro_Cards();?>
                    </div>
    
                    <div id="ribbons" class="tabcontent">
                        <?php getPro_Ribbons();?>
                    </div>
    
                    <div id="lasercuts" class="tabcontent">
                        <?php getPro_Lasercuts();?>
                    </div>
                    <?php add_carts(); ?>
                </div>
            <!-- Start Display Products here -->
                
                <!-- Ends Display Products here -->
                <div  class="col-lg-2 ">
                    <div class="product-large set-bg m-large" data-setbg="images/rib1.jpg">
                        <h2>Ribbons</h2>
                        <a href="shop.php">Discover More</a>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
    <?php 

        $get_insta_photos = "select * from instagram_section LIMIT 6";

        $run_photos = mysqli_query($con,$get_insta_photos);

        while($row_photo=mysqli_fetch_array($run_photos)){

            $instagram_url = $row_photo['instagram_url'];
            $instagram_img = $row_photo['instagram_img'];
        ?>
        <a href="<?php echo $instagram_url ?>" target="_blank"> 
        <div class="insta-item set-bg" data-setbg="admin_area/instagram_images/<?php echo $instagram_img; ?>" >
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5 style="color:white;">boxed.phl</h5>
            </div>
        </div>
        </a>
        <?php    } ?> 
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Event Section Begin -->
    <section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Boxed PH Events</h2>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
            $get_events = "select * from events LIMIT 3";
            $run_events = mysqli_query($con,$get_events);
            while($row_event=mysqli_fetch_array($run_events)){
                $event_id = $row_event['event_id'];
                $event_img = $row_event['event_img'];
                $event_date = $row_event['event_date'];
                $event_title = $row_event['event_title'];
                $event_desc = $row_event['event_desc'];
            ?>    
        <div class="col-lg-4 col-md-6">
            <div class="single-latest-blog">
                <img src="admin_area/events_images/<?php echo $event_img; ?>" alt="">
                <div class="latest-text">
                    <div class="tag-list">
                        <div class="tag-item">
                            <i class="fa fa-calendar-o"></i>
                            <?php echo $event_date; ?>
                        </div>
                    </div>
                    <a href="#">
                        <h4><?php echo $event_title; ?></h4>
                    </a>
                    <p><?php echo $event_desc; ?></p>
                </div>
            </div>
        </div>
                    <?php    } ?>   
                     
                        <!-- Event 3 ends -->
        </div>
            <!-- Benefits starts -->
        <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over ₱ 99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Benefits ends -->
    </div>
    </section>
    <div class="col-lg-12">
        <div class="section-title">
            <h2 style="font-size:2.5em;">Show your love!</h2>
            <div align="center">
            <table style="text-align: center;justify-content: center;">
                <tr>
                    <td>
                        <h5>Share</h5>
                    </td>
                    <td>
                         <h5>Like us on Facebook</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $url = "https://boxed-ph.hostingerapp.com/";
                        echo "
                            <div class='fb-share-button' data-href='$url' data-layout='button_count' data-size='large'><a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=$url src=sdkpreparse' class='fb-xfbml-parse-ignore'>Share</a></div>
                        ";
                        ?>
                    </td>
                    <td>
                        <div class="fb-like" data-href="https://www.facebook.com/boxed.phl/" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                    </td>
                </tr>
            </table>
        </div>
        </div>
    </div>
    
    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->
</body>
</html>