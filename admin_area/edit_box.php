<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_box'])){
        
        $edit_box_id = $_GET['edit_box'];
        
        $edit_box_query = "select * from boxes_section where box_id='$edit_box_id'";
        
        $run_edit_box = mysqli_query($con,$edit_box_query);
        
        $row_edit_box = mysqli_fetch_array($run_edit_box);
        
        $box_id = $row_edit_box['box_id'];
        
        $box_title = $row_edit_box['box_title'];
        
        $box_img = $row_edit_box['box_img'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Box
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Box
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Box Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $box_title; ?> " name="box_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                   <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Box Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="event_img" class="form-control">

                            <br>

                            <img src="box_images/<?php echo $box_img; ?>"alt="" width="70" height="70" class="img-responsive">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Box" name="update_box" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

  if(isset($_POST['update_box'])){
      
      $box_title = $_POST['box_title'];

      if(is_uploaded_file($_FILES['file']['tmp_name']))
      {
        $box_img = $_FILES['box_img']['name'];
        
        $temp_name = $_FILES['box_img']['tmp_name'];
        
        move_uploaded_file($temp_name,"box_images/$box_img");

        $update_box = "update boxes_section set box_title='$box_title',box_img='$box_img' where box_id='$box_id'";
        
        $run_update_box = mysqli_query($con,$update_box);
        
        if($run_update_box){
            
            echo "<script>alert('Your Box Has Been Updated')</script>";
          
          echo "<script>window.open('index.php?view_boxes','_self')</script>";
            
        }
      }
      else
      {
        $update_box = "update boxes_section set box_title='$box_title' where box_id='$box_id'";
        
        $run_update_box = mysqli_query($con,$update_box);
        
        if($run_update_box){
            
            echo "<script>alert('Your Box Has Been Updated')</script>";
          
          echo "<script>window.open('index.php?view_boxes','_self')</script>";
            
        }
      }

      
  }
?>
<?php } ?> 