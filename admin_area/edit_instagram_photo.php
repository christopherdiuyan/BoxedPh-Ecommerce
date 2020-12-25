<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php 

    if(isset($_GET['edit_instagram_photo'])){
        
        $edit_instagram_photo_id = $_GET['edit_instagram_photo'];
        
        $edit_instagram_photo_query = "select * from instagram_section where instagram_photo_id='$edit_instagram_photo_id'";
        
        $run_edit_instagram_photo = mysqli_query($con,$edit_instagram_photo_query);
        
        $row_edit_instagram_photo = mysqli_fetch_array($run_edit_instagram_photo);
        
        $instagram_photo_id = $row_edit_instagram_photo['instagram_photo_id'];
        
        $instagram_url = $row_edit_instagram_photo['instagram_url'];

        $instagram_name = $row_edit_instagram_photo['instagram_name'];
        
        $instagram_img = $row_edit_instagram_photo['instagram_img'];
        
    }

?>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Instagram Photo
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-instagram fa-fw"></i> Edit Instagram Photo
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->

                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Instagram Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $instagram_name; ?> " name="instagram_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->

                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Instagram Url
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $instagram_url; ?> " name="instagram_url" type="url" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Instagram Photo </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="instagram_img" type="file" class="form-control form-height-custom">

                          <br>

                            <img src="instagram_images/<?php echo $instagram_img; ?>"alt="" width="70" height="70" class="img-responsive">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update_box" value="Update Photo" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update_box'])){

        $instagram_name = $_POST['instagram_name'];

        $instagram_url = $_POST['instagram_url'];

        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $instagram_img = $_FILES['instagram_img']['name'];
        
            $temp_name = $_FILES['instagram_img']['tmp_name'];

            move_uploaded_file($temp_name,"instagram_images/$instagram_img");

            $update_photo = "update instagram_section set instagram_name='$instagram_name',instagram_img='$instagram_img', instagram_url='$instagram_url' where instagram_photo_id='$instagram_photo_id'";

            $run_update_photo = mysqli_query($con,$update_photo);

            if($run_update_photo){
                
                echo "<script>alert('Your Instagram Photo Has Been Updated')</script>";

                echo "<script>window.open('index.php?view_instagram_photos','_self')</script>";
                
            }
        }
        else 
        {
            // work when no update image
            
            $update_photo = "update instagram_section set instagram_name='$instagram_name', instagram_url='$instagram_url' where instagram_photo_id='$instagram_photo_id'";

            $run_update_photo = mysqli_query($con,$update_photo);

            if($run_update_photo){
                
                echo "<script>alert('Your Instagram Photo Has Been Updated')</script>";

                echo "<script>window.open('index.php?view_instagram_photos','_self')</script>";
                
            }
        }
    }
?>

<?php } ?>