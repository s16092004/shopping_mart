<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GEU SHOPPING MART</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MART</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./userarea/user_registration.php">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin_area/adminregistration.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
        </li>
        
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-success" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <ul class="navbar-nav me-auto">
    <?php
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='./userarea/userlogin.php'>Login</a>
    </li>";
    }
    else{
      echo " <li class='nav-item'>
      <a class='nav-link' href='./userarea/logout.php'>Logout</a>
    </li>";
    }
       
        ?>
    </ul>
</nav>

<!-- extra child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-danger ">
  <ul class="navbar-nav me-auto  " >
    <li class="nav-item ">
      <a class="nav-link " href="#">GEU SHOPPING MART</a>
    </li>
  </ul>
</nav>


<!-- third child -->
<div class="bg-light">
    <h3 class= "text-center">Geu Store</h3>
    <p class="text-center">Thank you for coming to our store</p>
</div>

<!-- fourth child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link text-light" href="#">Category</a>
        </li>
        <?php
         getcategories();
        ?>
    </ul>
</nav>    

<!-- fifth child -->
<!-- products -->
<div class="row px-5 mx-auto">
<?php
getproducts();
getucategories();
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 
?>
</div>
  


<!-- last child -->
<div class="bg-info p-3 text-center ">
    <p>All rights reserverd by GEU </p>
</div>
    </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>