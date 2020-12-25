<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('newlogin.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                Your Store / View Events
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> View Events
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_events = "select * from events";
        
                    $run_events = mysqli_query($con,$get_events);
        
                    while($row_event=mysqli_fetch_array($run_events)){
                        
                        $event_id = $row_event['event_id'];

                        $event_img = $row_event['event_img'];
                        
                        $event_date = $row_event['event_date'];
                        
                        $event_title = $row_event['event_title'];
                        
                        $event_desc = $row_event['event_desc'];
                ?>
                
                <div class="col-lg-4 col-md-4"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $event_title; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        <div class="panel-body"><!-- panel-body begin -->
                            
                            <img src="events_images/<?php echo $event_img; ?>" alt="<?php echo $event_title; ?>" class="img-responsive">    
                            
                        </div><!-- panel-body finish -->
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                                
                                
                                <div class="pull-right">
                                    <a href="index.php?delete_event=<?php echo $event_id; ?>" class="btn btn-danger"><!-- pull-right begin -->
                                     <span class="fa fa-trash"></span> Delete
                                    </a><!-- pull-right finish -->
                                </div>
                                <div class="pull-left">
                                    <a href="index.php?edit_event=<?php echo $event_id; ?>" class="btn btn-warning"><!-- pull-left begin -->
                                     <span class="fa fa-edit"></span> Edit
                                    </a><!-- pull-left finish -->
                                </div> 
                                
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } ?>
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>