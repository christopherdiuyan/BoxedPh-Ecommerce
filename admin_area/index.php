<?php 

    $active = '';
    session_start();

    include("includes/db.php");
    // $_SESSION['admin_email'] = "shamyvi15@gmail.com";
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_pending_orders = "select * from pending_orders";
        
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

        $get_categories = "select * from categories";
        
        $run_categories = mysqli_query($con,$get_categories);
        
        $count_categories = mysqli_num_rows($run_categories);
        
        $get_inquiry = "select * from inquiry";
        
        $run_inquiry = mysqli_query($con,$get_inquiry);
        
        $count_inquiries = mysqli_num_rows($run_inquiry);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="partnership_images/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoxedPH | Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" type="text/css">
    
</head>
<body>
    <div id="wrapper"><!-- #wrapper begin -->

        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        $active='Dashboard';
                }   if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                        $active='Products';
                }   if(isset($_GET['view_products'])){
                        
                        include("view_products.php");
                        $active='Products';
                        
                }   if(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");
                        $active='Products';
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                        $active='Products';
                        
                }   if(isset($_GET['insert_events'])){
                        
                        include("insert_events.php");
                        $active='Events';
                        
                }   if(isset($_GET['view_events'])){
                        
                        include("view_events.php");
                        $active='Events';
                        
                }   if(isset($_GET['delete_event'])){
                        
                        include("delete_event.php");
                        $active='Events';
                        
                }   if(isset($_GET['edit_event'])){
                        
                        include("edit_event.php");
                        $active='Events';
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        $active='Products_Categories';
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        $active='Products_Categories';
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        $active='Products_Categories';
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");
                        $active='Products_Categories';
                        
                }   if(isset($_GET['insert_cat'])){
                        
                        include("insert_cat.php");
                        $active='Categories';
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("view_cats.php");
                        $active='Categories';
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("edit_cat.php");
                        $active='Categories';
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("delete_cat.php");
                        $active='Categories';
                        
                }   if(isset($_GET['insert_slide'])){
                        
                        include("insert_slide.php");
                        $active='Slides';
                        
                }   if(isset($_GET['view_slides'])){
                        
                        include("view_slides.php");
                        $active='Slides';
                        
                }   if(isset($_GET['delete_slide'])){
                        
                        include("delete_slide.php");
                        $active='Slides';
                        
                }   if(isset($_GET['edit_slide'])){
                        
                        include("edit_slide.php");
                        $active='Slides';
                        
                }   if(isset($_GET['insert_box'])){
                        
                        include("insert_box.php");
                        $active='Boxes';
                        
                }   if(isset($_GET['view_boxes'])){
                        
                        include("view_boxes.php");
                        $active='Boxes';
                        
                }   if(isset($_GET['delete_box'])){
                        
                        include("delete_box.php");
                        $active='Boxes';
                        
                }   if(isset($_GET['edit_box'])){
                        
                        include("edit_box.php");
                        $active='Boxes';
                        
                }   if(isset($_GET['insert_instagram_photo'])){
                        
                        include("insert_instagram_photo.php");
                        $active='Instragram';
                        
                }   if(isset($_GET['view_instagram_photos'])){
                        
                        include("view_instagram_photos.php");
                        $active='Instragram';
                        
                }   if(isset($_GET['delete_instagram_photo'])){
                        
                        include("delete_instagram_photo.php");
                        $active='Instragram';
                        
                }   if(isset($_GET['edit_instagram_photo'])){
                        
                        include("edit_instagram_photo.php");
                        $active='Instragram';
                        
                }   if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        $active='Customers';
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        $active='Customers';
                        
                }   if(isset($_GET['view_orders'])){
                        
                        include("view_orders.php");
                        $active='Orders';
                        
                }   if(isset($_GET['delete_order'])){
                        
                        include("delete_order.php");
                        $active='Orders';
                        
                }   if(isset($_GET['view_inquiries'])){
                        
                        include("view_inquiries.php");
                        $active='Payments';
                        
                }   if(isset($_GET['delete_inquiry'])){
                        
                        include("delete_inquiry.php");
                        $active='Payments';
                        
                }   if(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        $active='Users';
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                        $active='Users';
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        $active='Users';
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        $active='Users';
                        
                }   if(isset($_GET['insert_terms'])){
                        
                        include("insert_terms.php");
                        $active='Terms';
                        
                }   if(isset($_GET['view_terms'])){
                        
                        include("view_terms.php");
                        $active='Terms';
                        
                }   if(isset($_GET['delete_term'])){
                        
                        include("delete_term.php");
                        $active='Terms';
                        
                }   if(isset($_GET['edit_term'])){
                        
                        include("edit_term.php");
                        $active='Terms';
                        
                }   if(isset($_GET['insert_layout_artist'])){
                        
                        include("insert_layout_artist.php");
                        $active='Partnership';
                        
                }   if(isset($_GET['view_layout_artist'])){
                        
                        include("view_layout_artist.php");
                        $active='Partnership';
                        
                }   if(isset($_GET['delete_layout_artist'])){
                        
                        include("delete_layout_artist.php");
                        $active='Partnership';
                        
                }   if(isset($_GET['edit_layout_artist'])){
                        
                        include("edit_layout_artist.php");
                        $active='Partnership';
                        
                }   if(isset($_GET['view_partnership_cover'])){
                        
                        include("view_partnership_cover.php");
                        $active='Partnership';
                        
                }   if(isset($_GET['edit_partnership_cover'])){
                        
                        include("edit_partnership_cover.php");
                        $active='Partnership';
                        
                }   if(isset($_GET['edit_css'])){
                        
                        include("edit_css.php");
                        $active='CSS_Editor';
                        
                }   if(isset($_GET['general_settings'])){
                        
                        include("general_settings.php");
                        $active='Settings';
                        
                }   if(isset($_GET['insert_social_media)'])){
                        
                        include("general_settings.php");
                        $active='Settings';
                        
                }   if(isset($_GET['delete_service)'])){
                        
                        include("general_settings.php");
                        $active='CSS_Editor';
                        
                }   if(isset($_GET['edit_social_media'])){
                        
                        include("general_settings.php");
                        $active='Settings';
                        
                }   if(isset($_GET['delete_social_media'])){
                        
                        include("general_settings.php");
                        $active='Settings';
                        
                }   if(isset($_GET['edit_website_content'])){
                        
                        include("general_settings.php");
                        $active='Settings';
                        
                }   if(isset($_GET['edit_shop_details'])){
                        
                        include("general_settings.php");
                       $active='Settings';
                        
                }   if(isset($_GET['edit_footer'])){
                        
                        include("general_settings.php");
                       $active='Settings';
                        
                }   if(isset($_GET['delete_pickup_address'])){
                        
                        include("general_settings.php");
                        $active='Settings';

                }   if(isset($_GET['edit_manufacturer'])){
                        
                        include("edit_manufacturer.php");
                        $active='Settings';
                }
                // insert_about_us.php
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
        <?php include("includes/sidebar.php"); ?>
    </div><!-- wrapper finish -->
    
<sript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></sript>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<scrip src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></scrip>
<script>
        $(document).ready(function() {
            $('#datatableid').DataTable(
                {
                
                "pagingType" : "full_numbers",
                "lengthMenu" : [
                	[10,25,20,-1],
                	[10,25,50,"All"]
                ],
                responsive: true,
                language:{
                	search: "_INPUT_",
                	searchPlaceholder: "Search records",
                }
                
                });
            
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click',function() {
                $('#editmodal').modal('show');
                
                $tr = $(this).closest('tr');
                
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                
                console.log(data);
                
                    
                    $('#update_id').val(data[0]);
                    $('#product_sku').val(data[1]);
                    $('#product_title').val(data[2]);
                    $('#product_cat').val(data[3]);
                    $('#cat').val(data[4]);
                    $('#product_img1').val(data[5]);
                    $('#product_img2').val(data[6]);
                    $('#product_img3').val(data[7]);
                    $('#product_price').val(data[8]);
                    $('#product_color').val(data[9]);
                    $('#product_size').val(data[10]);
                    $('#product_material').val(data[11]);
                    $('#product_stocks').val(data[12]);
                    $('#product_keywords').val(data[13]);
                    $('#product_desc').val(data[14]);

            });
        });
    </script>
</body>
</html>


<?php } ?>