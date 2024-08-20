<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<div class="container-fluid p-0">
        <nav class="navbar navbar-expand -lg navbar-light bg-danger">
            <div class="container-fluid">
                <img src="../images/adminreg.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        
                    </ul>
                </nav>
            </div>

        </nav>
        <!--second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Profile</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-danger p-1  align-items-center">
                <div class="p-3">
                    <a href="#">
                    <p class="text-light text-center"></p>
                </div>
                <div class="button text-center bg-danger my3">
                    <button><a href="../index.php" class="nav-link-text-light bi-info my-1">Home</a></button>
                    <button><a href="../display_all.php" class="nav-link-text-light bi-info my-1">Products</a></button>
                    <button><a href="profile.php" class="nav-link-text-light bi-info my-1">Pending</a></button>
                    <button><a href="logout.php" class="nav-link-text-light bi-info my-1">Logout</a></button>
                    <li class="nav-link-text-light my-1  py-3"><button><a class=" bi-info">Cart item</a></button>
                   <a class="nav-link" href="../cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
        
                <div>
               <?php get_user_order_details()?>
            </div>
        </div>
       
    </div>

  
    

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>