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
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
<?php
 $user_ip=getIPAddress();
 $get_user="Select * from user where user_ip='$user_ip'";
 $result=mysqli_query($con,$get_user);
 $run_query=mysqli_fetch_array($result);
 $user_id=$run_query['user_id'];

?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <ul class="navbar-nav me-auto " >
            <li class="nav-item">
                <a class="nav-link " href="#">Payment</a>
            </li>
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        </ul>
    </nav>
    <div class="nav-item">
          <a href=""><h2 class="text-center"></h2></a>
        </div>
        <div class="nav-item">
          <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay now</h2></a>
        </div>
</body>

</html>
