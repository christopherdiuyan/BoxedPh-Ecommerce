<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_instagram_photo'])){
        
        $delete_instagram_photo_id = $_GET['delete_instagram_photo'];
        
        $delete_instagram_photo = "delete from instagram_section where instagram_photo_id='$delete_instagram_photo_id'";
        
        $run_delete_instagram_photo = mysqli_query($con,$delete_instagram_photo);
        
        if($run_delete_instagram_photo){
            
            echo "<script>alert('One of Your Instagram Picture Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_instagram_photos','_self')</script>";
            
        }
        
    }

?>




<?php } ?>