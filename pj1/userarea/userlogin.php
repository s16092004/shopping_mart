<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align_items_center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <div class="form-outline mb-4">
                        <label for="user_username" clas="form_label">Username</label>
                         <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomlete="off" required="required" name="user_username"/>
</div>
                        
                         <div class="form-outline mb-4">
                        <label for="user_password" clas="form_label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomlete="off" required="required" name="user_password"/>
                        </div>
                        
</div> 
<div class="text-center">
    <input type="submit" value="login" class="bg-danger py-2  px-3 border-0" name="user_login">
    <p> Don't have an account? <a href="user_registration.php"  class="text-danger">Register</a></p>
</div>
</form>
</div>
</div>
</div>

</body>
</html>
<?php 
if(isset($_POST['user_login']))
{
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="Select * from user where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    $select_query_c="Select * from cart_details where ip_address='$user_ip'";
    $select_c=mysqli_query($con,$select_query_c);
    $row_count_c=mysqli_num_rows($select_c);

    if($row_count>0)
    {   
        $_SESSION['username']=$user_username;

        if(password_verify($user_password,$row_data['user_password']))
        {
           // echo "<script>alert('login successful')</script>";
           if($row_count==1 and $row_count_c==0)
           {
            $_SESSION['username']=$user_username;

                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
           }
           else{
            $_SESSION['username']=$user_username;

                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
           }
        }
       else
        {
            echo "<script>alert('Not present')</script>";
        }
    }
    else{
        echo "<script>alert('Invaild password')</script>";
    }
}
?>