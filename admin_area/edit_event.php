<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('newlogin.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_event'])){
        
        $edit_event_id = $_GET['edit_event'];
        
        $edit_event = "select * from events where event_id='$edit_event_id'";
        
        $run_edit_event = mysqli_query($con,$edit_event);
        
        $row_edit_event = mysqli_fetch_array($run_edit_event);
        
        $event_id = $row_edit_event['event_id'];
        
        $event_title = $row_edit_event['event_title'];
        
        $event_date = $row_edit_event['event_date'];

        $event_desc = $row_edit_event['event_desc'];
        
        $event_img = $row_edit_event['event_img'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Events
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-star fa-fw"></i> Edit Events
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Event Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="event_title" type="text" class="form-control" value="<?php echo $event_title;?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->

                    <div class="form-group"><!-- form-group 1.1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Date  
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="event_date" type="date" class="form-control" value="<?php echo $event_date;?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1.1 finish -->
                    
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Events Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="event_img" class="form-control">

                            <br>

                            <img src="events_images/<?php echo $event_img; ?>"alt="" width="70" height="70" class="img-responsive">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Event Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="event_desc" cols="19" rows="6" class="form-control"><?php echo $event_desc;?></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Submit Now" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update'])){

        $event_date = $_POST['event_date'];
        $event_title = $_POST['event_title'];
        $event_desc = $_POST['event_desc'];

        if(is_uploaded_file($_FILES['event_img']['tmp_name']))
        {
            $event_img = $_FILES['event_img']['name'];
            $temp_name = $_FILES['event_img']['tmp_name'];
            move_uploaded_file($temp_name,"events_images/$event_img");
            
            $update_slide = "update events set event_img='$event_img', event_date='$event_date', event_title='$event_title', event_desc='$event_desc' where event_id='$event_id'";
            
            $run_update_slide = mysqli_query($con,$update_slide);
            
            if($run_update_slide){
            
            echo "<script>alert('Your Event has been updated Successfully')</script>"; 
            echo "<script>window.open('index.php?view_events','_self')</script>";
            
            }
        }
        else
        {
            // if no image selected the old image remain as it is.
            $update_slide = "update events set 
            event_date='$event_date', 
            event_title='$event_title', 
            event_desc='$event_desc' 
            where event_id='$event_id'";
            
            $run_update_slide = mysqli_query($con,$update_slide);
            
            if($run_update_slide){
            
            echo "<script>alert('Your Event has been updated Successfully')</script>"; 
            echo "<script>window.open('index.php?view_events','_self')</script>";
            
            }
        }
    }

?>

<?php } ?>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>