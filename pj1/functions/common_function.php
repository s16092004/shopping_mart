<?php
function getproducts()
{
global $con;
if(!isset($_GET['category'])){
$select_query="Select *from products order by rand() LIMIT 0,6";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_image=$row['product_image'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  echo " <div class ='col-md-4 mb-2 '>
  <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Rs. $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
      </div>
  </div>
</div>";
}
}
}


function get_all_products()
{
  global $con;
  if(!isset($_GET['category'])){
  $select_query="Select *from products order by rand() ";
  $result_query=mysqli_query($con,$select_query);
  //$row=mysqli_fetch_assoc($result_query);
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query))
  {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    echo " <div class ='col-md-4 mb-2 '>
    <div class='card' style='width: 18rem;'>
      <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>Rs. $product_price</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>        
        </div>
    </div>
  </div>";
  }
  }
}


function getucategories()
{
global $con;

if(isset($_GET['category'])){
  $category_id=$_GET['category'];
$select_query="Select * from products where category_id= $category_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0)
{
  echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_image=$row['product_image'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  echo " <div class ='col-md-4 mb-2 '>
  <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Rs. $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
      </div>
  </div>
</div>";
}
}
}

function getcategories()
{
    global $con;
    $select_categories="Select * from categories";
    $result_categories=mysqli_query($con,$select_categories);
    //$row_data=mysqli_fetch_assoc($result_categories);
    //echo $row_data['category_title'];
    while($row_data=mysqli_fetch_assoc($result_categories))
    {
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo "<li class='nav-item'>
      <a class='nav-link' href='index.php?category=$category_id'>$category_title</a>
    </li>";
    }
}


function search_products()
{
global $con;
if(isset($_GET['search_data_product']))
{
  $search_data_value=$_GET['search_data'];
$search_query="Select *from products where product_title like'%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);
//$row=mysqli_fetch_assoc($search_query);
//echo $row['product_title'];
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0)
{
  echo "<h2 class='text-center text-danger'>This product is not available</h2>";
}
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_image=$row['product_image'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  echo " <div class ='col-md-4 mb-2 '>
  <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Rs. $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
      </div>
  </div>
</div>";
}
}
}

function viewdetails()
{
  global $con;
if(isset($_GET['product_id'])){
if(!isset($_GET['category'])){
  $product_id=$_GET['product_id'];
$select_query="Select * from products where product_id=$product_id";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_image=$row['product_image'];
  $product_price=$row['product_price'];
  $product_rack=$row['product_rack'];
  $product_quantity=$row['product_quantity'];
  $category_id=$row['category_id'];
  echo " <div class ='col-md-4 mb-2 '>
  <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Rs. $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
      <a href='index.php' class='btn btn-secondary'>Home</a>
      </div>
  </div>
</div>

<div class='col-md-8  px45'>
<h4 class='text-center  text-danger'>QUANTITY = $product_quantity left in the store</h4>
<h4 class='text-center  text-danger'>Present in $product_rack rack in the store</h4>

</div>";
}
}
}
}



function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart
function cart(){
if(isset($_GET['add_to_cart'])){
 global $con;
 $get_ip_add=getIPAddress();
 $get_product_id=$_GET['add_to_cart'];
 $select_query="Select * from cart_details where ip_address='$get_ip_add' and product_id=$get_product_id";
 $result_query=mysqli_query($con,$select_query);
 $num_of_rows=mysqli_num_rows($result_query);
 if($num_of_rows>0)
 {
   echo "<script>alert('Alresdy present in the cart')</script>";
   echo"<script>window.open('index.php','_self')</script>";
 }
 else{
  $insert_query="insert into cart_details (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item added into the cart')</script>";
  echo"<script>window.open('index.php','_self')</script>";
 }
}
}

//cart no.
function cart_item(){
  if(isset($_GET['add_to_cart'])){
   global $con;
   $get_ip_add=getIPAddress();
   $select_query="Select * from cart_details where ip_address='$get_ip_add'";
   $result_query=mysqli_query($con,$select_query);
   $num_of_rows=mysqli_num_rows($result_query);
   }
   else{
    global $con;
    $get_ip_add=getIPAddress();
    $select_query="Select * from cart_details where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
   }
  echo $num_of_rows;
  }

  function get_user_order_details()
  {
    global $con;
    $get_ip_add=getIPAddress();
    
  
    if(isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $get_details = "SELECT * FROM user WHERE username='$username'";
      $result_query = mysqli_query($con, $get_details);
  
      while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        $get_orders="Select * from cart_details where ip_address='$get_ip_add' ";
        $result_orders_query = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result_orders_query);
  
        if ($row_count > 0) {
          echo "<h3 class='text-center'>You have <span>$row_count</span> pending orders</h3> <p class='text-center'><a href='' class='text-dark'></a></p>";
        }
        else{
          echo "<h3 class='text-center'>You have 0 pending orders</h3> <p class='text-center'><a href='' class='text-dark'></a></p>";

        }
      }
    } else {
      echo "Session username not set.";
    }
  }

?>

