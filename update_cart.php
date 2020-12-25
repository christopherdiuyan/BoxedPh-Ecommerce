<?php 

include("includes/db.php");

?>
<?php 

if(isset($_POST['update_cart'])){
    
    // $ip_add = $_POST['update_cart'];
    
    $session_email = $_SESSION['customer_email'];
    $select_customer = "select * from customers where customer_email='$session_email'";
    $run_customer = mysqli_query($con,$select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $c_id = $row_customer['customer_id'];
    
    $ip_add = getRealIpUser();
    
    // $get_items = "select * from cart where ip_add='$ip_add'";
    // $run_items = mysqli_query($con,$get_items);
    // $size = mysqli_num_rows($run_items);
    // echo "<script>alert('$size Updated')</script>";
    $size = count($_POST['qty']);
    $i = 0;
    while ($i < $size) {
    // foreach($_POST["p_id"] AS $p_id){
        // echo "<script>alert('$p_id Updated')</script>";
        
        $qty = mysql_real_escape_string($_POST['qty'][$p_id]);
        
         echo "<script>alert('$qty Updated')</script>";
         
    	$query = "UPDATE cart SET qty='".$qty."', date=NOW() WHERE p_id = '".$p_id."' AND ip_add='".$ip_add."' AND c_id='".$c_id."' LIMIT 1";
    	
    	$result = mysqli_query($con,$query);
        
    }
    echo "<script>alert('Your Cart has been Updated Successfully')</script>"; 
    echo "<script>window.open('shopping-cart.php','_self')</script>";
}
?>