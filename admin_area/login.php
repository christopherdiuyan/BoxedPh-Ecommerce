<?php 
    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login1.css">
    <title>Admin Page</title>
</head>
<body>
<form action="#" class="form-login" method="POST">
    <div class="login-form">
        <h1>SIGN IN</h1>
        <!-- <div class="logo-picture">
            <img src="admin_images/img_4942.jpg" width="100" height="100"></img>
        </div> -->
        <div class="form-group ">
        <input type="text" class="form-control" placeholder="Email Address" id="username" name="admin_email">
        <i class="fa fa-user"></i>
        </div>

        <div class="form-group log-status">
        <input type="password" class="form-control" placeholder="Password" id="password" name="admin_pass">
        <i class="fa fa-lock"></i>
        </div>

        <span class="alert">Invalid Credentials</span>
        <a class="link" href="#">Lost your password?</a>
        <button type="submit" name="admin_login" class="log-btn">Login</button>
    </div>
</form>
</body>
</html>
<?php 
    if(isset($_POST['admin_login'])){
        
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
             echo "<script>
             $('#password').removeClass('shake_effect')  
             setTimeout(function()
             {
              $('#password').addClass('shake_effect')
             },1) 

             $('.form-control').keypress(function(){
                 $('.log-status').removeClass('wrong-entry')
            })
             setTimeout(function()
             {
                $('.log-status').addClass('wrong-entry')
             },1) 

             $('.alert').fadeIn(500)
             setTimeout(function()
             {
                $('.alert').fadeOut(1500) 
             },1)
            </script>";
        }
    }
?>