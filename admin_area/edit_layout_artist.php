<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php 

    if(isset($_GET['edit_layout_artist'])){
        
        $edit_layout_artist_id = $_GET['edit_layout_artist'];
        
        $edit_layout_artist_query = "select * from partnership_section where layout_artist_id='$edit_layout_artist_id'";
        
        $run_edit_layout_artist = mysqli_query($con,$edit_layout_artist_query);
        
        $row_edit_layout_artist = mysqli_fetch_array($run_edit_layout_artist);
        
        $layout_artist_id = $row_edit_layout_artist['layout_artist_id'];
        
        $layout_artist_url = $row_edit_layout_artist['layout_artist_url'];

        $layout_artist_name = $row_edit_layout_artist['layout_artist_name'];
        
        $layout_artist_img = $row_edit_layout_artist['layout_artist_img'];
        
    }

?>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Layout Artist
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-instagram fa-fw"></i> Edit Layout Artist
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->

                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Layout Artist Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $layout_artist_name; ?>" name="layout_artist_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->

                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Layout Artist Url
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $layout_artist_url; ?> " name="layout_artist_url" type="url" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Layout Artist Photo </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="layout_artist_img" type="file" class="form-control form-height-custom">

                          <br>

                            <img src="partnership_images/<?php echo $layout_artist_img; ?>"alt="" width="70" height="70" class="img-responsive">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update_box" value="Update Layout Artist" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update_box'])){

        $layout_artist_name = $_POST['layout_artist_name'];

        $layout_artist_url = $_POST['layout_artist_url'];

        if(is_uploaded_file($_FILES['layout_artist_img']['tmp_name']))
        {
            $layout_artist_img = $_FILES['layout_artist_img']['name'];
        
            $temp_name = $_FILES['layout_artist_img']['tmp_name'];

            move_uploaded_file($temp_name,"layout_artist_images/$layout_artist_img");

            $update_photo = "update partnership_section set layout_artist_name='$layout_artist_name',layout_artist_img='$layout_artist_img', layout_artist_url='$layout_artist_url' where layout_artist_id='$layout_artist_id'";

            $run_update_photo = mysqli_query($con,$update_photo);

            if($run_update_photo){
                
                echo "<script>alert('Your Layout Artist Has Been Updated')</script>";

                echo "<script>window.open('index.php?view_layout_artist','_self')</script>";
                
            }
        }
        else 
        {
            // work when no update image
            
            $update_photo = "update partnership_section set layout_artist_name='$layout_artist_name', layout_artist_url='$layout_artist_url' where layout_artist_id='$layout_artist_id'";

            $run_update_photo = mysqli_query($con,$update_photo);

            if($run_update_photo){
                
                echo "<script>alert('Your Layout Artist Has Been Updated')</script>";

                echo "<script>window.open('index.php?view_layout_artist','_self')</script>";
                
            }
        }
    }
?>

<?php } ?>