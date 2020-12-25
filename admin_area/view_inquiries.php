<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                Your Store / View Inquiries
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Inquiries
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="datatableid"class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Message</th>
                                <th style="width: 25%;text-align:center;"> Actions </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_inquiry = "select * from  inquiry";
                                
                                $run_inquiry = mysqli_query($con,$get_inquiry);
          
                                while($row_inquiry=mysqli_fetch_array($run_inquiry)){
                                    
                                    $inquiry_id = $row_inquiry['inquiry_id'];
                                    $name = $row_inquiry['name'];
                                    $email= $row_inquiry['email'];
                                    $message = $row_inquiry['message'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $name; ?> </td>
                                <td> <?php echo $email; ?></td>
                                <td> <?php echo $message; ?> </td>
                                <td style="text-align:center;"> 
                                     <a href="index.php?delete_inquiry=<?php echo $inquiry_id; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Remove</a>
                                     <a href="#" class="btn btn-primary"><i class="fa fa-send"></i> Send Email</a>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>