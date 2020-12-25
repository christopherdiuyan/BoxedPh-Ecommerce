<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<style type="text/css">
        
        
        .divider {								/* minor cosmetics */
            display: table; 
            font-size: 24px; 
            text-align: center; 
            font-family: arial; 
            width: 75%; 						/* divider width */
            margin: auto;					/* spacing above/below */
        }
        .divider span { display: table-cell; position: relative; }
        .divider span:first-child, .divider span:last-child {
            width: 50%;
            top: 13px;							/* adjust vertical align */
            -moz-background-size: 100% 2px; 	/* line width */
            background-size: 100% 2px; 			/* line width */
            background-position: 0 0, 0 100%;
            background-repeat: no-repeat;
        }
        .divider span:first-child {				/* color changes in here */
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(transparent), to(#000));
            background-image: -webkit-linear-gradient(180deg, transparent, #000);
            background-image: -moz-linear-gradient(180deg, transparent, #000);
            background-image: -o-linear-gradient(180deg, transparent, #000);
            background-image: linear-gradient(90deg, transparent, #000);
        }
        .divider span:nth-child(2) {
            color: #DF7861;
            font-family: arial; 
            padding: 0px 5px; width: auto; white-space: nowrap;
        }
        .divider span:last-child {				/* color changes in here */
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#000), to(transparent));
            background-image: -webkit-linear-gradient(180deg, #000, transparent);
            background-image: -moz-linear-gradient(180deg, #000, transparent);
            background-image: -o-linear-gradient(180deg, #000, transparent);
            background-image: linear-gradient(90deg, #000, transparent);
             
        }
    .badge
    {
        text-align: right; float: right; margin-right: 10px;
    }
</style>   
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        
        <a href="https://boxed-ph.hostingerapp.com/" target="_blank" class="navbar-brand" style="font-size: 1em;">
            <i class="fa fa-eye" ></i>  View My Website
        </a>
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav" style="padding-right: 10px;"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>
                
            </a><!-- dropdown-toggle finish -->

            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> My Account
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
        
            <li class="<?php if($active=='Dashboard') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            <!-- Your Store -->
            <div class="divider"><span></span><span>Your Store</span><span></span></div>
            <li class="<?php if($active=='Products') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-shopping-cart"></i> Products
                        <i class="fa fa-fw fa-caret-down"></i>
                        <span class="badge"><?php echo $count_products; ?></span>
                        
                </a><!-- a href finish -->
                
                <ul id="products" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_product"> Insert Product </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_products"> View Products </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Categories') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-sitemap"></i> Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                        <span class="badge"><?php echo $count_categories; ?></span>
                        
                </a><!-- a href finish -->
                
                <ul id="cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_cat"> Insert Category </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_cats"> View Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Products_Categories') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#p_cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-edit"></i> Product Types
                        <i class="fa fa-fw fa-caret-down"></i>
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                </a><!-- a href finish -->
                
                <ul id="p_cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_p_cat"> Insert Product Types </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_p_cats"> View Product Types </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Customers') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_customers"><!-- a href begin -->
                    <i class="fa fa-fw fa-users"></i> View Customers
                    <span class="badge" style=""><?php echo $count_customers; ?></span>
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li class="<?php if($active=='Orders') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    <i class="fa fa-fw fa-book"></i> View Orders
                    <span class="badge"><?php echo $count_pending_orders; ?></span>
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li class="<?php if($active=='Payments') echo"active"; ?>">
                <a href="index.php?view_inquiries">
                    <i class="fa fa-commenting-o"></i> View Inquiries
                    <span class="badge"><?php echo $count_inquiries; ?></span>
                </a>
            </li> 
            
            <!-- Your Website -->
            <div class="divider"><span></span><span>Your Website</span><span></span></div>
            <li class="<?php if($active=='Slides') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#slides"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-photo"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="slides" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_slide"> Insert Slide </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_slides"> View Slides </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Boxes') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#boxes"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dropbox"></i> Boxes
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="boxes" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_box"> Insert Box </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_boxes"> View Boxes </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Instragram') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#instagram"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-instagram"></i> Instragram Pictures
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="instagram" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_instagram_photo"> Insert Picture </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_instagram_photos"> View Pictures </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Events') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#manufacturer"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-star"></i> Events
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="manufacturer" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_events"> Insert Events </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_events"> View Events </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li class="<?php if($active=='Partnership') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#partnership"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Partnership 
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="partnership" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?view_partnership_cover"> View Partnership Cover </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_layout_artist"> Insert Layout Artist </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_layout_artist"> View Layout Artist </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li>
            <!--<li class="<?php //if($active=='Terms') echo"active"; ?>">-->
            <!--    <a href="#" data-toggle="collapse" data-target="#terms">-->
                        
            <!--            <i class="fa fa-fw fa-table"></i> Terms And Conditions-->
            <!--            <i class="fa fa-fw fa-caret-down"></i>-->
                        
            <!--    </a>-->
                
            <!--    <ul id="terms" class="collapse">-->
            <!--        <li>-->
            <!--            <a href="index.php?insert_terms"> Insert Term </a>-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <a href="index.php?view_terms"> View Terms </a>-->
            <!--        </li>-->
            <!--    </ul>-->
                
            <!--</li>-->
            <!--<li class="<?php //if($active=='CSS_Editor') echo"active"; ?>"><!-- li begin -->
            <!--    <a href="index.php?edit_css"><!-- a href begin -->
            <!--        <i class="fa fa-fw fa-pencil"></i> CSS Editor-->
            <!--    </a><!-- a href finish -->
            <!--</li>-->
            <!-- li finish -->
            
            <!-- Configuration -->
            <div class="divider"><span></span><span>Configuration</span><span></span></div>
            <li class="<?php if($active=='Users') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Users
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="users" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_user"> Insert User </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_users"> View Users </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit User Profile </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li class="<?php if($active=='Settings') echo"active"; ?>">
                <a href="index.php?general_settings"><!-- a href begin -->
                     <i class="fa fa-fw fa-cogs"></i> General Settings
                </a><!-- a href finish -->
            </li>

            <!--<li><!-- li begin -->
            <!--    <a href="logout.php"><!-- a href begin -->
            <!--        <i class="fa fa-fw fa-power-off"></i> Log Out-->
            <!--    </a><!-- a href finish -->
            <!--</li>-->
            <!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->


<?php } ?>