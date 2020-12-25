<div class="partner-logo">  
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="../images/parner3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="../images/parner2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Partner Logo Section End -->

<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="../images/logo2.png" alt=""></a>
                        </div>
                        <?php
                            $get_slides = "select * from settings_shop_details";
                            $run_slides = mysqli_query($con,$get_slides);

                            $row_slides=mysqli_fetch_array($run_slides);
                            $shop_address = $row_slides['shop_address'];
                            $phone_no = $row_slides['phone_no'];
                            $email = $row_slides['email'];
                        ?>
                        <ul>
                            <li><?php echo $shop_address ?></li>
                            <li>Phone: <?php echo $phone_no ?></li>
                            <li>Email: <?php echo $email ?></li> 	
                        </ul>
                        <div class="footer-social" style="font-size: 1.5em;">
                            <?php
                                $get_slides = "select * from settings_social_media_links";
                                $run_slides = mysqli_query($con,$get_slides);

                                $row_slides=mysqli_fetch_array($run_slides);
                                $facebook = $row_slides['facebook'];
                                $facebook_url = $row_slides['facebook_url'];
                                $instagram = $row_slides['instagram'];
                                $instagram_url = $row_slides['instagram_url'];
                            ?>
                             <div class="footer-widget">
                                <h5>Social Media</h5>
                                <a href="<?php echo $facebook_url ?>"  target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo $instagram_url ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="../about.php">About Us</a></li>
                            <!--<li><a href="check-out.php">Checkout</a></li>-->
                            <li><a href="../contact.php">Contact</a></li>
                            <li><a href="../about.php#services">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li>
                                <!-- <a href="customer/my_account.php">My Account</a> -->
                                <?php 
                       
                               if(!isset($_SESSION['customer_email'])){
                                   echo"<a href='../check-out.php'>My Account</a>";
                               }else{
                                  echo"<a href='my_account.php?my_orders'>My Account</a>"; 
                               }
                               
                               ?>
                            </li>

                            <!--<li><a href="contact.php">Contact</a></li>-->
                            <li><a href="../shop.php">Shop</a></li>
                            <li><a href="../shopping-cart.php">Shopping Cart</a></li>
                            <li><a href="../check-out.php">Checkout</a></li>
                            <li><a href="../register.php">Register</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form method="post"class="subscribe-form">
                            <input type="email" name="email" placeholder="Enter Your Mail">
                            <button name="subscribe" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <?php
                            $get_slides = "select * from settings_footer";
                            $run_slides = mysqli_query($con,$get_slides);

                            $row_slides=mysqli_fetch_array($run_slides);
                            $footer = $row_slides['footer'];

                            echo "
                            <p>$footer</p>
                            ";
                           
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
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
    <script type="text/javascript">
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        function openCity(evt, cityName) {
          // Declare all variables
          var i, tabcontent, tablinks;

          // Get all elements with class="tabcontent" and hide them
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          // Get all elements with class="tablinks" and remove the class "active"
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }

          // Show the current tab, and add an "active" class to the button that opened the tab
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
    </script>
    <script>
        $(document).ready(function(){
            // Hide & Show Sidebar Toggle //
            $('.nav-toggle').click(function(){
                $('.panel-collapse,.collapse-data').slideToggle(700,function(){
                    if($(this).css('display')=='none'){
                        $(".hide-show").html('Show');
                    }else{
                        $(".hide-show").html('Hide');
                    }
                });
            });
            // Finish Hide & Show Sidebar Toggle //
            // Search Filters | by Letter // 
            $(function(){
                $.fn.extend({
                    filterTable: function(){
                        return this.each(function(){
                            $(this).on('keyup', function(){
                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');
                                if(search == ''){
                                    rows.show();
                                }else{
                                    rows.each(function(){
                                        var $this = $(this);
                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                    });
                                }
                            });
                        });
                    }
                });
                $('[data-action="filter"][id="dev-table-filter"]').filterTable();
            });
            // Finish Search Filters | by Letter //
        });
    </script>
    <script>
        $(document).ready(function(){
            // getProducts Function Begin //
            function getProducts(){
                // // Code For Manufacturers Begin //
                var sPath = '';
                var aInputs = $('li').find('.get_manufacturer');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });

                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'man[]=' + aKeys[i]+'&';
                    }

                }

                // // Code For Manufacturers Finish //

                // Code For Product Categories Begin //

                var aInputs = Array();
                var aInputs = $('li').find('.get_p_cat');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });

                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';
                    }
                }

                // Code For Product Categories Finish //

                // Code For Categories Begin //

                var aInputs = Array();
                var aInputs = $('li').find('.get_cat');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });

                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'cat[]=' + aKeys[i]+'&';
                    }
                }

                // Code For Categories Finish //

                // Loader When Loading Begin //    

                $('#wait').html('<img src="../images/load.gif"');

                // Loader When Loading Finish //  

                $.ajax({

                    url:"load.php",
                    method:"POST",

                    data: sPath+'sAction=getProducts',

                    success:function(data){

                        $('#products').html('');
                        $('#products').html(data);
                        $('#wait').empty();

                    }

                });

                $.ajax({

                    url:"load.php",
                    method:"POST",

                    data: sPath+'sAction=getPaginator',

                    success:function(data){

                        $('.pagination').html('');
                        $('.pagination').html(data);

                    }

                });

            }

            // getProducts Function Finish //

            // $('.get_manufacturer').click(function(){
            //     getProducts();
            // });

            $('.get_p_cat').click(function(){
                getProducts();
            });

            $('.get_cat').click(function(){
                getProducts();
            });

        });
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <scrip src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></scrip>
    <script>
           $(document).ready(function() {
             $('#datatableid').DataTable({
                 "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
             });
        } );
        </script>
        
    <?php

    if(isset($_POST['subscribe']))
    {
        $email = $_POST['email'];

        $insert_about_us ="insert into emails (email) values ('$email')";
        if(mysqli_query($con,$insert_about_us)){
            
            echo "<script>alert('We Will Send To You Our Latest Product Updates. Thank You For Subscribing Us.')</script>";

            echo "<script>window.open('index.php','_self')</script>";
            
        }
    }

    ?>