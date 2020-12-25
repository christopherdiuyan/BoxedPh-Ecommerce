<?php 

    $active='Partnership';
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
                        <span>Partnership</span>
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
                        <div class="section-title">
                            <h2>We are Connected</h2>
                        </div>
                        <?php 

                        $get_partnership_cover = "select * from partnership_cover";

                        $run_partnership_cover = mysqli_query($con,$get_partnership_cover);

                        $row_partnership_cover=mysqli_fetch_array($run_partnership_cover);

                            $partnership_title = $row_partnership_cover['partnership_title'];
                            $partnership_desc = $row_partnership_cover['partnership_desc'];
                            $partnership_img = $row_partnership_cover['partnership_img'];

                            echo "
                                <div class='row'>
                                <center>
                                    <img src='admin_area/partnership_images/$partnership_img' width='500px' height='500px' alt=''>
                                    <p>$partnership_desc</p>
                                    </center>
                                </div>
                            ";
                        ?>
                        
						<br>
                        <div class="blog-more">
                            <div class="section-title">
                                <h2>Layout Artist</h2>
                            </div>
                            <div class="row">
                            <?php 

                                $get_layout_artist = "select * from partnership_section";

                                $run_layout_artist = mysqli_query($con,$get_layout_artist);

                                while($row_layout_artist=mysqli_fetch_array($run_layout_artist)){

                                    $layout_artist_name = $row_layout_artist['layout_artist_name'];
                                    $layout_artist_url = $row_layout_artist['layout_artist_url'];
                                    $layout_artist_img = $row_layout_artist['layout_artist_img'];
                                ?> 
                                
                                <div class="col-sm-4">
                                    <a href="<?php echo"$layout_artist_url"; ?>" target="_blank">
                                    <div class="single-banner">
                                    
                                    <img src="admin_area/partnership_images/<?php echo "$layout_artist_img"; ?>" alt="">
                                    
                                    </div>
                                    </a>
                                    <center>
                                        <p><?php echo $layout_artist_name ?></p>       
                                    </center>
									 
                                </div>

                            <?php }?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

  <!-- Partner Logo Section Begin -->
    
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->
</body>

</html>