<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_layout_artist'])){
        
        $delete_layout_artist_id = $_GET['delete_layout_artist'];
        
        $delete_layout_artist = "delete from partnership_section where layout_artist_id='$delete_layout_artist_id'";
        
        $run_delete_layout_artist = mysqli_query($con,$delete_layout_artist);
        
        if($run_delete_layout_artist){
            
            echo "<script>alert('One of Your Layout Artist Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_layout_artist','_self')</script>";
            
        }
        
    }

?>




<?php } ?>