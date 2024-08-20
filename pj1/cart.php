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
    <style>
    .cart_img {
    width: 100px;
    height: 100px;
    object-fit: contain;

    }
</style>
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
          <a class="nav-link" href="#">Contacts</a>
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



<!-- third child -->
<div class="bg-light">
    <h3 class= "text-center">Geu Store</h3>
    <p class="text-center">Thank you for coming to our store</p>
</div>

<!-- 4 child-->
<div class ="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Product image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody> 
                <?php 
               
                $get_ip_add=getIPAddress();
                $total_price=0;
                $select_query="Select * from cart_details where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_array($result)){
                 $product_id=$row['product_id'];
                 $select_products="Select * from products where product_id='$product_id'";
                 $result_products=mysqli_query($con,$select_products);
                 while($row_product_price=mysqli_fetch_array($result_products))
                 {
                   $product_price=array($row_product_price['product_price']);
                   $price_table=$row_product_price['product_price'];
                   $product_title=$row_product_price['product_title'];
                   $product_image=$row_product_price['product_image'];
                   $product_values=array_sum($product_price);
                   $total_price+=$product_values;
               
                ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" id="" classs="form-input  w-50"></td>
                        <?php                 
                        $get_ip_add=getIPAddress();
                        if(isset($_POST['update_cart']))
                        {
                            $quantities=$_POST['qty'];
                            $update_cart="update cart_details set quantity=$quantities where ip_address='$get_ip_add'";
                            $result_product_q=mysqli_query($con,$update_cart);
                            $total_price= $total_price*$quantities;
                        }
?>
                    <td>Rs. <?php echo $price_table?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <input type="submit" value="remove cart" class="bg-danger px-3 py-2" name="remove_cart">

                    </td>
                </tr>
                <?php 
                  }
                  if($total_price>1500)
                  {
                   
                    $dis=$total_price*0.1;
                    $total_price-=$dis;
                    $total_price=round($total_price);
                  }
                  elseif($total_price>500)
                  {
                   
                    $dis=$total_price*0.05;
                    $total_price-=$dis;
                    $total_price=round($total_price);
                  }
                }
                ?>
            </tbody>
        </table>
        <div>
            <h4 class="px-3">Total:<strong class="text-danger">Rs. <?php
            echo $total_price;
            if($total_price>1500){
                echo " (Discount given of 10% for above 1500 price) ";
              }
              elseif($total_price>500){
                echo " (Discount given of 5% for above 500 price) ";
              }?></strong></h4>
            <?php echo "<input type='submit' value='continue shopping' class='bg-danger px-3 ' name='continue_shopping'>

           <button class='bg-danger px-3 '> <a href='./userarea/checkout.php'>checkout</a></button>";
            ?>
<?php
            if(isset($_POST['continue_shopping']))
            {
                echo "<script>window.open('index.php','_self')</script>";
            }
            ?>
        </div>
    </div>
</div>
</form>

<?php 
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart']))
    {
        foreach($_POST['removeitem'] as $remove_id)
        {
            echo $remove_id;
            $delete_query="Delete from cart_details where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete)
            {
                echo"<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();
?>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>