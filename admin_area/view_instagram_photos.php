<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
             Your Website / View Instagram Photos
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-instagram fa-fw"></i> View Instagram Photos
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_photos = "select * from instagram_section ORDER BY instagram_photo_id DESC";
        
                    $run_photos = mysqli_query($con,$get_photos);
        
                    while($run_instagram_section=mysqli_fetch_array($run_photos)){

                        $instagram_photo_id = $run_instagram_section['instagram_photo_id'];   

                        $instagram_name = $run_instagram_section['instagram_name'];

                        $instagram_url = $run_instagram_section['instagram_url'];
                        
                        $instagram_img = $run_instagram_section['instagram_img'];
                
                ?>
                
                <div class="col-lg-4 col-md-4"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $instagram_name; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        <div class="panel-body"><!-- panel-body begin -->
                            
                            <img src="instagram_images/<?php echo $instagram_img; ?>" alt="<?php echo $instagram_name; ?>" class="img-responsive">    
                            
                        </div><!-- panel-body finish -->
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                                
                                <div class="pull-right">
                                    <a href="index.php?delete_instagram_photo=<?php echo $instagram_photo_id; ?>" class="btn btn-danger"><!-- pull-right begin -->
                                     <span class="fa fa-trash"></span> Delete
                                    </a><!-- pull-right finish -->
                                </div>
                                <div class="pull-left">
                                    <a href="index.php?edit_instagram_photo=<?php echo $instagram_photo_id; ?>" class="btn btn-warning"><!-- pull-left begin -->
                                     <span class="fa fa-edit"></span> Edit
                                    </a><!-- pull-left finish -->
                                </div> 
                                
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-4 col-md-4 finish -->
                
                <?php } ?>
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>