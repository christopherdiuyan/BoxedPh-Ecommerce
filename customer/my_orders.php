<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<center><!--  center Begin  -->
    
    <h2> My Orders </h2>
    
    <p class="lead"> Your orders on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a> 
        
    </p>
    <h5>Payment type will be a <strong>Cash On Pick-Up</strong></h5>
<p>Pickup process time, minimum of three(3) days and maximum of five(5) working days.</p>
    
</center><!--  center Finish  -->


<hr>

<div class="table-responsive" ><!--  table-responsive Begin  -->
    
    <table id="datatableid" class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> Order No. </th>
                <th> Amount Due </th>
                <th> Invoice No </th>
                <th> Qty </th>
                <th> Order Date</th>
                <th> Status </th>
                <th> Details</th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
           
           <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $amount = $row_orders['due_amount'];
                
                $due_amount = number_format($amount, 2, '.', '');
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                // $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
             
                $i++;
            
            ?>
            
            <tr ><!--  tr Begin  -->

                <th> <?php echo $i; ?> </th>
                <td> ₱ <?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                <td>
                    <a href="#del<?php echo $order_id ?>" data-toggle="modal" class="btn btn-primary btn-lg"><span class="fa fa-eye"></span> View Details</a>
                    <?php include('modal.php'); ?>
                </td>
                
            </tr><!--  tr Finish  -->
            
            <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->