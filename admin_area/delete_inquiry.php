<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_inquiry'])){
        
        $delete_inquiry_id = $_GET['delete_inquiry'];
        
        $delete_inquiry = "delete from inquiry where inquiry_id='$delete_inquiry_id'";
        
        $run_inquiry = mysqli_query($con,$delete_inquiry);
        
        if($run_inquiry){
            
            echo "<script>alert('One of Your Inquiry Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_inquiries','_self')</script>";
            
        }
        
    }

?>

<?php } ?>