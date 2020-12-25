<div class="col-lg-10 offset-lg-3"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
    
    ?>
    <style> strong{font-weight: bold;}
    
    a{color: #3987da;}
    a:hover {
      color: black;
    }
    </style>
    <div class="panel panel-default">
    <div class="panel-heading" style="background: #f5f5f5; ">
     <h2 class="text-center">Payment Options For You</h2>     
    </div>
    
    <br><br>
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <!--<a href="order.php?c_id=<?php echo $customer_id ?>" style="font-size:2em;"> -->
        <a href="checkout.php?COP&amp;c_id=<?php echo $customer_id ?>" style="font-size:2em;">
         <strong>C</strong>ash <strong>O</strong>n <strong>P</strong>ickup 
         
         </a>
         
     </p><!-- lead text-center Finish -->
     
     <center><!-- center Begin -->
         
        <p class="lead"><!-- lead Begin -->
            
            <a href="checkout.php?paypal"style="font-size:2em;">
                <i class="fa fa-paypal"  aria-hidden="true"></i>
                aypal Payment
                
            </a>
            
        </p> <!-- lead Finish -->
         
     </center><!-- center Finish -->
    
</div><!-- box Finish -->
</div>