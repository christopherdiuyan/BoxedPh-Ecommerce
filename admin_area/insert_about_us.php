<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert New about_us
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert about_us
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="tab-pane" id="about">
                    <p class="lead">About Us</p>
                    <div class="ln_solid"></div>
                    <form method="POST" class="form-horizontal form-label-left" id="about_form">
                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                History Date Start
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <input name="about_us_history_date" type="text" class="form-control">
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                History Description
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <textarea name="about_us_desc" style="height : 400px;" class="form-control"></textarea>
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="item form-group">   
                            <div class="form-group"><!-- form-group 3 begin -->
                                <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                    Current Background 
                                </label><!-- control-label col-md-3 finish --> 
                                <div class="col-md-6"><!-- col-md-6 begin -->
                                    <input type="file" name="about_us_image" class="form-control">
                                </div><!-- col-md-6 finish -->
                            </div><!-- form-group 3 finish -->
                        </div>

                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                Quote
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <textarea name="about_us_quote" cols="19" rows="6" class="form-control"></textarea>
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                Quote Author
                            </label><!-- control-label col-md-3 finish --> 
                            <div class="col-md-6"><!-- col-md-6 begin -->
                                <input name="about_us_quote_author" type="text" class="form-control">
                            </div><!-- col-md-6 finish -->
                        </div><!-- form-group finish -->

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" name="about_insert" id="about_update" class="btn btn-primary btn-block"><i class="fa fa-edit"></i>Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['about_insert'])){
        
        $about_us_history_date = $_POST['about_us_history_date'];
        $about_us_desc = $_POST['about_us_desc'];
        $about_us_quote = $_POST['about_us_quote'];
        $about_us_quote_author = $_POST['about_us_quote_author'];

        $about_us_image = $_FILES['about_us_image']['name'];
        $temp_name = $_FILES['about_us_image']['tmp_name'];

            move_uploaded_file($temp_name,"about_us_images/$about_us_img");

            move_uploaded_file($temp_name,"about_us_images/$about_us_image");
            
            $insert_about_us ="insert into settings_about_us (about_us_history_date,about_us_desc,about_us_image,about_us_quote,about_us_quote_author) values 
            ('$about_us_history_date','$about_us_desc','$about_us_image','$about_us_quote','$about_us_quote_author')";

        if(mysqli_query($con,$insert_about_us)){
            
            echo "<script>alert('New about_us Has Been Inserted')</script>";

            echo "<script>window.open('index.php?view_about_uses','_self')</script>";
            
        }

        
        
    }

?>

<?php } ?>