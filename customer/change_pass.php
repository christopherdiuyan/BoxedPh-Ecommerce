<?php 
$active='edit_account';
$_SESSION['msg1'] = "";
?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<style>
.group-input{width: 60%;}
</style>
<h2 align="center"> Change Password </h2>
<p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
<div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="register-form">
                       <form name="chngpwd" action="" method="post" onSubmit="return valid();">

                            <div class="group-input">
                                <label for="username">Old Password *</label>
                                <input type="password" id="oldpass" name="oldpass" class="form-control" data-toggle="password" >
                            </div>
                            <div class="group-input">
                                <label for="pass">New Password *</label>
                                <input type="password" id="newpass" name="newpass" class="form-control" data-toggle="password" >
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="pass" name="newconpass" class="form-control" data-toggle="password">
                            </div>
                            <div class="group-input">
                            <button type="submit" name="Submit" class="site-btn register-btn">Change Password</button>
                            </div>
                            <!-- <input name="register" id="insert" value="REGISTER" type="submit" class="btn btn-primary form-control"> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
	$("#password").password('toggle');
</script>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.oldpass.value=="")
{
alert("Old Password Field is Empty !!");
document.chngpwd.oldpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Field is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.newconpass.value=="")
{
alert("Confirm Password Field is Empty !!");
document.chngpwd.newconpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.newconpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.newconpass.focus();
return false;
}
return true;
}
</script>

<?php
// if(isset($_POST['Submit']))
// {
//     $useremail = $_SESSION['customer_email'];
//     $oldpass = $_POST['oldpass'];
//     $newpassword = $_POST['newpass'];
    
//     $sql=mysqli_query($con,"SELECT customer_pass FROM customers where customer_pass='$oldpass' && customer_email='$useremail'");
//     $num=mysqli_fetch_array($sql);
    
//     if($num>0)
//     {
//          $update_c_pass = "update customers set customer_pass='$newpassword' where customer_email='$useremail'";
        
//         if(mysqli_query($con,$update_c_pass)){
//         $_SESSION['msg1']="Password Changed Successfully !!";    
//         }
        
//     }
//     else
//     {
//         $_SESSION['msg1']="Old Password not match !!";
//     }
//     }
// ?>
<?php 

if(isset($_POST['Submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['oldpass'];
    
    $c_new_pass = $_POST['newpass'];
    
    $c_new_pass_again = $_POST['newconpass'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
   
    if($check_c_old_pass == 0){
        
       echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        echo "<script>window.open('my_account.php?change_pass','_self')</script>";
    }
    
     $update_c_pass = "update customers set customer_pass='$c_new_pass_again' where customer_email='$c_email'";
    
        $run_c_pass = mysqli_query($con,$update_c_pass);
        
        if($run_c_pass){
            
            echo "<script>alert('Your password has been updated')</script>";
            
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            
        }
    
}

?>
