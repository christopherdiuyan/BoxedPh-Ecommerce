<?php 

    $active='Faq';
    include("includes/header.php");

?>
<!DOCTYPE html>
<html lang="zxx">

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
                        <a href="./faq.php">Pages</a>
                        <span>FAQs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">

                            <?php  
                                $get_faq = "select * from settings_faqs";
                                $run_faq = mysqli_query($con,$get_faq);
                                $count = 0;
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $count += 1;
                                    $slideid = "#slide".$count;
                                    $slide = "slide".$count;
                                    $faq_id = $row_faq['faq_id'];
                                    $question = $row_faq['question'];
                                    $answer = $row_faq['answer'];

                                    echo "
                                        <div class='card'>
                                            <div class='card-heading'>
                                                <a class=''data-toggle='collapse' data-target='$slideid'>
                                                    $question
                                                </a>
                                            </div>
                                            <div id='$slide' class='collapse' data-parent='#accordionExample'>
                                                <div class='card-body'>
                                                    <p>$answer</p>
                                                </div>
                                            </div>
                                        </div>

                                    "; 
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->

    <!-- Partner Logo Section Begin -->
     
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php 
    
    include("includes/footer.php");
    
    ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>