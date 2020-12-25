<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php 

    if(isset($_GET['edit_partnership_cover'])){
        
        $edit_partnership_id = $_GET['edit_partnership_cover'];
        
        $edit_partnership_query = "select * from partnership_cover where partnership_id='$edit_partnership_id'";
        
        $run_edit_partnership = mysqli_query($con,$edit_partnership_query);
        
        $row_edit_partnership = mysqli_fetch_array($run_edit_partnership);
        
        $partnership_id = $row_edit_partnership['partnership_id'];
        
        $partnership_desc = $row_edit_partnership['partnership_desc'];

        $partnership_title = $row_edit_partnership['partnership_title'];
        
        $partnership_img = $row_edit_partnership['partnership_img'];
        
    }

?>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Partnership Cover
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-instagram fa-fw"></i> Edit Partnership Cover
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->

                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Layout Artist Title
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $partnership_title; ?>" name="partnership_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Partnership Cover Photo </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="partnership_img" type="file" class="form-control form-height-custom">

                          <br>

                            <img src="partnership_images/<?php echo $partnership_img; ?>"alt="" width="70" height="70" class="img-responsive">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Partnership Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="partnership_desc" cols="19" rows="6" class="form-control"><?php echo $partnership_desc;?></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update_box" value="Update Partnership Cover" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update_box'])){

        $partnership_title = $_POST['partnership_title'];

        $partnership_desc = $_POST['partnership_desc'];

        if(is_uploaded_file($_FILES['partnership_img']['tmp_name']))
        {
            $partnership_img = $_FILES['partnership_img']['name'];
        
            $temp_name = $_FILES['partnership_img']['tmp_name'];

            move_uploaded_file($temp_name,"partnership_images/$partnership_img");

            $update_photo = "update partnership_cover set partnership_title='$partnership_title',partnership_img='$partnership_img', partnership_desc='$partnership_desc' where partnership_id='$partnership_id'";

            $run_update_photo = mysqli_query($con,$update_photo);

            if($run_update_photo){
                
                echo "<script>alert('Your Partnership Cover Has Been Updated')</script>";

                echo "<script>window.open('index.php?view_partnership_cover','_self')</script>";
                
            }
        }
        else 
        {
            // work when no update image
            
            $update_photo = "update partnership_cover set partnership_title='$partnership_title', partnership_desc='$partnership_desc' where partnership_id='$partnership_id'";

            $run_update_photo = mysqli_query($con,$update_photo);

            if($run_update_photo){
                
                echo "<script>alert('Your Partnership Cover Has Been Updated')</script>";

                echo "<script>window.open('index.php?view_partnership_cover','_self')</script>";
                
            }
        }
    }
?>

<?php } ?>

<script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>