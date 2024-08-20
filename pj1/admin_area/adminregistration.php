
<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

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
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align_items_center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" clas="form_label">Username</label>
                         <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomlete="off" required="required" name="user_username"/>
</div>
                         <div class="form-outline mb-4">
                         <label for="user_email" clas="form_label">Email</label>
                         <input type="text" id="user_email" class="form-control" placeholder="Enter your email" autocomlete="off" required="required" name="user_email"/>
                         </div>
                         <div class="form-outline mb-4">
                        <label for="user_password" clas="form_label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomlete="off" required="required" name="user_password"/>
                        </div>
                       
</div> 
<div class="text-center">
    <input type="submit" value="Register" class="bg-danger py-2  px-3 border-0" name="admin_register">
    <p> Already have an account? <a href="adminlogin.php"  class="text-danger">Login</a></p>
</div>
</form>
</div>
</div>
</div>

</body>
</html>
<?php 
if(isset($_POST['admin_register']))
{
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password= password_hash($user_password,PASSWORD_DEFAULT);
    $select_query="Select * from admin where admin_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('email already exist')</script>";
    }
    else{
    $insert_query="insert into admin (admin_name,admin_email,admin_password ) values('$user_username','$user_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute)
    {
        echo"<script>alert('data inserted')</script>";
    }
}
}

?>