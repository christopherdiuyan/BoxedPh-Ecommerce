<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

        
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" id="main">

        <!-- Page Heading -->
        <div class="go-title">
            <h3>General Settings</h3>
            <div class="go-line"></div>
        </div>
        <!-- Page Content -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="res">
                </div>
                <!-- /.start -->
                <div class="col-md-12">
                    <ul class="nav nav-tabs tabs-left">
                        <!-- <li class="active">
                            <a href="#logo" data-toggle="tab" aria-expanded="true">Logo</a>
                        </li> -->
                        <li class="active">
                            <a href="#website" data-toggle="tab" aria-expanded="false">Website Contents</a>
                        </li>
                        
                        <!--<li class="">-->
                        <!--    <a href="#pickup" data-toggle="tab" aria-expanded="false">PickUp Locations</a>-->
                        <!--</li>-->
                        <li class="">
                            <a href="#about" data-toggle="tab" aria-expanded="false">About Us</a>
                        </li>
                        <li class="">
                            <a href="#services" data-toggle="tab" aria-expanded="false">Services Details</a>
                        </li>
                        <li class="">
                            <a href="#links" data-toggle="tab" aria-expanded="false">Social Media Links</a>
                        </li>
                        <li class="">
                            <a href="#address" data-toggle="tab" aria-expanded="false">Shop Details</a>
                        </li>
                        <li class="">
                            <a href="#faq" data-toggle="tab" aria-expanded="false">FAQ's</a>
                        </li>
                        <!--<li class="">-->
                        <!--    <a href="#footer" data-toggle="tab" aria-expanded="false">Footer</a>-->
                        <!--</li>-->
                    </ul>
                </div>

                <div class="col-xs-12">
                <!-- Tab panes -->
                <div class="tab-content">
                <!-- LOGO TAB Starts-->
                <!--<div class="tab-pane" id="logo">-->
                <!--    <p class="lead">Website Logo</p>-->
                <!--    <div class="ln_solid"></div>-->
                <!--    <form method="POST" action="settings/logo" class="form-horizontal form-label-left" enctype="multipart/form-data">-->
                <!--        <input type="hidden" name="_token" value="UUhm46q6ps5dnY0kAMUIqdfX2OuEvagUHvA2BeR2">-->
                <!--        <div class="item form-group">-->
                <!--            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Logo-->
                <!--            </label>-->
                <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
                <!--                <img class="col-md-6" src="">-->
                <!--            </div>-->

                <!--        </div><br>-->
                        <!-- <input type="hidden" name="id" value="1"> -->
                <!--        <div class="item form-group">-->
                <!--            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Setup New Logo <span class="required">*</span>-->
                <!--            </label>-->
                <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
                <!--                <input type="file" name="logo" required="">-->
                <!--            </div>-->

                <!--        </div>-->

                <!--        <div class="ln_solid"></div>-->
                <!--        <div class="form-group">-->
                <!--            <div class="col-md-6 col-md-offset-3">-->
                                <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                <!--                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update Settings</button>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </form>-->
                <!--</div>-->
                <!-- LOGO TAB  Ends-->

                <div class="tab-pane active" id="website">
                    <p class="lead">Website Contents</p>
                    <?php 

                        $get_contents = "select * from settings_website_contents";

                        $run_contents = mysqli_query($con,$get_contents);

                        $run_website_contents=mysqli_fetch_array($run_contents);
                        
                        $website_content_id = $run_website_contents['website_content_id'];
                        $website_title = $run_website_contents['website_title'];
                        $website_tags = $run_website_contents['website_tags'];

                   echo "
                        <div class='ln_solid'></div>
                        <form method='POST' class='form-horizontal form-label-left' id='website_form'>

                            <div class='item form-group'>
                                <label class='control-label col-md-3 col-sm-3 col-xs-12' for='title'> Website Title <span class='required'>*</span>
                                </label>
                                <div class='col-md-6 col-sm-6 col-xs-12'>
                                    <input class='form-control col-md-7 col-xs-12' data-validate-length-range='6' name='website_title' placeholder='Website Title' required='required' type='text' value='$website_title'>
                                </div>
                            </div>
                             ";
                        ?>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" href="index.php?edit_website_content=<?php echo $website_content_id; ?>" name="website_update" id="website_update" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update Settings</button>
                            </div>
                        </div>
                    </form>
                    
                    <p class="lead">Website Footer</p>
                    <div class="ln_solid"></div>
                    <form method="POST" class="form-horizontal form-label-left" id="footer_form">
                        <?php 

                            $get_footer = "select * from settings_footer";

                            $run_footer = mysqli_query($con,$get_footer);

                            $run_settings_footer =mysqli_fetch_array($run_footer);
                            
                            $footer_id = $run_settings_footer['footer_id'];
                            $footer = $run_settings_footer['footer'];

                        ?>
                        <input type="hidden" name="_token" value="UUhm46q6ps5dnY0kAMUIqdfX2OuEvagUHvA2BeR2">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Footer<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="3" cols="60" class="form-control col-md-7 col-xs-12" name="footer" required="required"><?php echo $footer ?></textarea>
                            </div>
                        </div>

                        <div class="ln_solid">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                <button id="footer_update" href="index.php?edit_footer=<?php echo $footer_id; ?>" name="footer_update" type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update Settings
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>

                <!-- About Us -->
                <div class="tab-pane" id="about">
                    <p class="lead">About Us</p>
                    <div class="ln_solid"></div>
                    <form method="POST" class="form-horizontal form-label-left" id="about_form">

                         <?php 

                            $get_contents = "select * from settings_about_us WHERE about_us_id=2";
                            $run_contents = mysqli_query($con,$get_contents);
                            $run_website_contents=mysqli_fetch_array($run_contents);
                            
                            $about_us_id = $run_website_contents['about_us_id'];
                            $about_us_history_date = $run_website_contents['about_us_history_date'];
                            $about_us_desc = $run_website_contents['about_us_desc'];
                            $about_us_image = $run_website_contents['about_us_image'];
                            
                            $about_us_quote = $run_website_contents['about_us_quote'];
                            $about_us_quote_author = $run_website_contents['about_us_quote_author'];

                        ?>
                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                History Date Start
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <input value="<?php echo $about_us_history_date; ?>" name="about_us_history_date" type="text" class="form-control">
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                History Description
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <textarea name="about_us_desc" style="height : 400px;" class="form-control"><?php echo $about_us_desc; ?></textarea>
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="item form-group">   
                            <div class="form-group"><!-- form-group 3 begin -->
                                <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                    Current Background 
                                </label><!-- control-label col-md-3 finish --> 
                                <div class="col-md-6"><!-- col-md-6 begin -->
                                    <input type="file" name="about_us_image" class="form-control">
                                    <br>
                                    <img src="about_us_images/<?php echo $about_us_image; ?>"alt="" width="70" height="70" class="img-responsive">
                                </div><!-- col-md-6 finish -->
                            </div><!-- form-group 3 finish -->
                        </div>

                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                Quote
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <textarea name="about_us_quote" cols="19" rows="6" class="form-control"><?php echo $about_us_quote; ?></textarea>
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                Quote Author
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <input value="<?php echo $about_us_quote_author; ?>" name="about_us_quote_author" type="text" class="form-control">
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" name="about_update" id="about_update" class="btn btn-primary btn-block"><i class="fa fa-edit"></i>Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="services">
                    <p class="lead">Services Details
                    </p>
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_name"> Service Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Enter Service Name" name="service_name" required="required">
                            </div>
                            <br><br>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_desc">Service Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="event_desc" cols="19" rows="6" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="insert_services" name="insert_services" type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New Service</button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <p class="lead">Services</p>  
                        <div class="ln_solid"></div>  
                      <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" style="width: 100%;"> 
                                        <thead> 
                                            <tr role="row">
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;text-align: center;">Service Title</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 65%;text-align: center;">Service Description</th>
                                                <th tabindex="0" rowspan="1" colspan="1"style="width: 15%; text-align: center;">Actions</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <?php 
                        
                                                $get_address = "select * from settings_services";
                                    
                                                $run_address = mysqli_query($con,$get_address);
                                    
                                                while($run_settings_pickup_address=mysqli_fetch_array($run_address)){
                                                    $service_id = $run_settings_pickup_address['service_id'];
                                                    $service_name = $run_settings_pickup_address['service_name'];
                                                    $service_desc = $run_settings_pickup_address['service_desc'];
                                            
                                            ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $service_name ?></td> 
                                                <td><?php echo $service_desc ?></td> 
                                                <td> 
                                                    <form method="POST"> 
                                                        <a href="index.php?edit_service=<?php echo $service_id; ?>"class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a> 

                                                        <a href="index.php?delete_service=<?php echo $service_id; ?>" name="delete_service" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove </a>
                                                    </form> 
                                                </td> 
                                                <?php } ?>
                                            </tr>
                                        
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                      </div>
                </div>

                <div class="tab-pane" id="faq">
                    <p class="lead">Frequently Asked Questions
                    </p>
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_name"> Question <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Enter Service Name" name="question" required="required">
                            </div>
                            <br><br>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_desc">Answer<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="answer" cols="19" rows="6" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="insert_services" name="insert_faq" type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New FAQ's</button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <p class="lead">FAQ's</p>  
                        <div class="ln_solid"></div>  
                      <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" style="width: 100%;"> 
                                        <thead> 
                                            <tr role="row">
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;text-align: center;">Question</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 50%;text-align: center;">Answer</th>
                                                <th tabindex="0" rowspan="1" colspan="1"style="width: 14.5%; text-align: center;">Actions</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <?php 
                        
                                                $get_faq = "select * from settings_faqs";
                                    
                                                $run_faq = mysqli_query($con,$get_faq);
                                    
                                                while($run_settings_faq=mysqli_fetch_array($run_faq)){
                                                    $faq_id = $run_settings_faq['faq_id'];
                                                    $question = $run_settings_faq['question'];
                                                    $answer = $run_settings_faq['answer'];
                                            
                                            ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $question ?></td> 
                                                <td><?php echo $answer ?></td> 
                                                <td> 
                                                    <form method="POST"> 
                                                        <a href="index.php?edit_service=<?php echo $service_id; ?>"class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a> 

                                                        <a href="index.php?delete_service=<?php echo $service_id; ?>" name="delete_service" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove </a>
                                                    </form> 
                                                </td> 
                                                <?php } ?>
                                            </tr>
                                        
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                      </div>
                </div>

                <div class="tab-pane" id="pickup">
                    
                </div>

                <div class="tab-pane" id="links">
                    <p class="lead">Social Media Links</p>
                    <div class="ln_solid"></div>
                        <form method="POST" class="form-horizontal form-label-left" id="website_form">

                        <?php 

                        $get_links = "select * from settings_social_media_links";

                        $run_links = mysqli_query($con,$get_links);

                        $run_social_media_links=mysqli_fetch_array($run_links);
                        
                        $social_media_id = $run_social_media_links['social_media_id'];
                        $facebook_url = $run_social_media_links['facebook_url'];
                        $instagram_url = $run_social_media_links['instagram_url'];
                        ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook<span>*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="facebook_url" data-validate-length-range="6" placeholder="Links" required="required" type="url" value="<?php echo $facebook_url ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Instagram<span>*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="instagram_url" data-validate-length-range="6" placeholder="Links" required="required" type="url" value="<?php echo $instagram_url ?>">
                                </div>
                            </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" href="index.php?edit_social_media=<?php echo $social_media_id; ?>" name="update_social_media" id="social_media" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="address">
                    <p class="lead">Shop Details</p>
                    <div class="ln_solid"></div>

                    <?php 

                        $get_details = "select * from settings_shop_details";

                        $run_details = mysqli_query($con,$get_details);

                        $run_shop_details=mysqli_fetch_array($run_details);
                        
                        $shop_address_id = $run_shop_details['shop_address_id'];
                        $shop_address = $run_shop_details['shop_address'];
                        $phone_no = $run_shop_details['phone_no'];
                        $email = $run_shop_details['email'];

                    ?>

                    <form method="POST" class="form-horizontal form-label-left" id="about_form">
                        <input type="hidden" name="_token" value="UUhm46q6ps5dnY0kAMUIqdfX2OuEvagUHvA2BeR2">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> Street Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="3" cols="60" class="form-control col-md-7 col-xs-12" name="street_address" required="required"><?php echo $shop_address ?></textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone Number/s<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="3" cols="60" class="form-control col-md-7 col-xs-12" name="phone_no" required="required"><?php echo $phone_no ?></textarea>
                            </div>
                        </div>
                                            
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="email" placeholder="Email Address" required="required" type="text" value="<?php echo $email ?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                <button id="office_update" href="index.php?edit_shop_details=<?php echo $shop_address_id; ?>" name="update_shop_details" type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update Settings</button>
                            </div>
                        </div>
                    </form>
                  </div>

                <div class="tab-pane" id="footer">
                    
                </div>
                
                </div>
            </div>
        </div>
        <!-- /.end -->
    </div>
</div>

</div>
<!-- /.row -->
</div>

<?php 

// Update for Website Content
if(isset($_POST['website_update'])){

    $website_title = $_POST['website_title'];

    $website_tags = $_POST['website_tags'];

    $update_content = "update settings_website_contents set website_title='$website_title', website_tags='$website_tags' where website_content_id='$website_content_id'";

        if(mysqli_query($con,$update_content)){
            
            echo "<script>alert('Your Website Content Has Been Updated')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}

// Update for About Us
if(isset($_POST['about_update'])){

    $about_us_history_date = $_POST['about_us_history_date'];
    $about_us_desc = $_POST['about_us_desc'];
    
    $about_us_quote = $_POST['about_us_quote'];
    $about_us_quote_author = $_POST['about_us_quote_author'];

    // $get_contents = "select * from settings_about_us WHERE about_us_id=2";
    // $run_contents = mysqli_query($con,$get_contents);
    // $run_website_contents=mysqli_fetch_array($run_contents);
    
    // $about_us_id = $run_website_contents['about_us_id'];
    // $about_us_image = $run_website_contents['about_us_image'];
    $about_us_image_tmp = $_POST['about_us_image'];

    if($about_us_image_tmp == ""){

            $about_us_image = $_FILES['about_us_image']['name'];
            $temp_name = $_FILES['about_us_image']['tmp_name'];
            move_uploaded_file($temp_name,"about_us_images/$about_us_image");

            $update_content = "update settings_about_us set 
                about_us_history_date='$about_us_history_date',
                about_us_desc='$about_us_desc', 
                about_us_image='$about_us_image',
                about_us_quote='$about_us_quote',
                about_us_quote_author='$about_us_quote_author'
                where about_us_id='$about_us_id'";

                if(mysqli_query($con,$update_content)){
                
                echo "<script>alert('Your About Us Has Been Updated')</script>";
                echo "<script>window.open('index.php?general_settings','_self')</script>";
                
            }
        }
        else 
        {
            // work when no update image
            $update_content = "update settings_about_us set 
                about_us_history_date='$about_us_history_date',
                about_us_desc='$about_us_desc',
                about_us_quote='$about_us_quote',
                about_us_quote_author='$about_us_quote_author'
                where about_us_id='$about_us_id'";

                if(mysqli_query($con,$update_content)){
                
                echo "<script>alert('Your About Us Has Been Updated')</script>";
                echo "<script>window.open('index.php?general_settings','_self')</script>";
                
            }
        }
}

// Insert for Service
if(isset($_POST['insert_services'])){

    $service_name = $_POST['service_name'];

    $service_desc = $_POST['event_desc'];

    $insert_service = "insert into settings_services (service_name, service_desc) values ('$service_name','$service_desc')";

        if(mysqli_query($con,$insert_service)){
            
            echo "<script>alert('New Service Has Been Inserted')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}
// Delete Service ayaw gumana
if(isset($_GET['delete_service'])){

    $id1 = $_GET['delete_service'];
    $delete_address= "delete from settings_services where service_id='$id1'";
    
    if(mysqli_query($con,$delete_address)){
        echo "<script>alert('One of Your Service Has Been Deleted')</script>";
        echo "<script>window.open('index.php?general_settings','_self')</script>";
    }
    
}
// Insert for Pickup Location
if(isset($_POST['pickup_location'])){

    $pickup_address = $_POST['address'];

    $insert_address = "insert into settings_pickup_address (pickup_address) values ('$pickup_address')";

        if(mysqli_query($con,$insert_address)){
            
            echo "<script>alert('New Pickup Address Has Been Inserted')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}

// Insert for Pickup Location
if(isset($_POST['insert_faq'])){

    $question = $_POST['question'];

    $answer = $_POST['answer'];

    $insert_faq = "insert into settings_faqs (question, answer) values ('$question', '$answer')";

        if(mysqli_query($con,$insert_faq)){
            
            echo "<script>alert('New FAQ Has Been Inserted')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}


// Delete Pickup Address
if(isset($_GET['delete_pickup_address'])){

        $id = $_GET['delete_pickup_address'];
        $delete_address= "delete from settings_pickup_address where pickup_address_id='$id'";
        
        if(mysqli_query($con,$delete_address)){
            echo "<script>alert('One of Your Pickup Address Has Been Deleted')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
        }
        
    }

 // Update for Shop Details
if(isset($_POST['update_shop_details'])){

    $shop_address = $_POST['street_address'];

    $phone_no = $_POST['phone_no'];
    
    $email = $_POST['email'];

    $update_content = "update settings_shop_details set shop_address='$shop_address', phone_no='$phone_no', email='$email' where shop_address_id='$shop_address_id'";

        if(mysqli_query($con,$update_content)){
            
            echo "<script>alert('Your Shop Details Has Been Updated')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}   

 // Update for Footer
if(isset($_POST['footer_update'])){

    $footer = $_POST['footer'];

    $update_content = "update settings_footer set footer='$footer' where footer_id='$footer_id'";

        if(mysqli_query($con,$update_content)){
            
            echo "<script>alert('Your Footer Has Been Updated')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}

// Update for Social Media Links
if(isset($_POST['update_social_media'])){

    $facebook_url = $_POST['facebook_url'];

    $instagram_url = $_POST['instagram_url'];

    $update_social_media_links = "update settings_social_media_links set facebook_url='$facebook_url', instagram_url='$instagram_url' where social_media_id='$social_media_id'";

        if(mysqli_query($con,$update_social_media_links)){
            
            echo "<script>alert('Your Social Media Links Has Been Updated')</script>";
            echo "<script>window.open('index.php?general_settings','_self')</script>";
            
        }
}


?>
<?php } ?>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>