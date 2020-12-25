    <div class="modal fade" id="del<?php echo $pro_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($con,"select * from products where product_id='".$pro_id."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Product Name: <strong><?php echo $drow['product_title']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                    <a href="index.php?delete_product=<?php echo $pro_id; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
