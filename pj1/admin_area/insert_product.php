<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $price=$_POST['price'];
    $manufacturer=$_POST['manufacturer'];
    $expiry_date=$_POST['expiry_date'];
    $product_category=$_POST['product_category'];
    $rack=$_POST['rack'];
    $quantity=$_POST['quantity'];
    //images
    $image=$_FILES['image']['name'];
    //accesing img tmp name
    $temp_image=$_FILES['image']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $price=='' or $manufacturer=='' or $expiry_date=='' or $product_category=='' or $image=='' or $rack=='' or $quantity='')
    {
        echo "<script>alert('Please fill all the available fields')</script>";
        
        
    }
   
    else{
        
        move_uploaded_file($temp_image,"./product_images/$image");
        //insert query
        $insert_products="Insert into products(product_title,product_price,product_manufacturer,product_exp,category_id,product_image,product_rack,product_quantity) values('$product_title','$price','$manufacturer','$expiry_date','$product_category' ,'$image' ,'$rack' ,'$quantity')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Sucessfully inserted the products')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
        else{
            echo "script>alert('not inserted ')</script>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products Owner</title>
     <!--bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css file -->
     <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title"  id="product_title" class="form-control " placeholder="Enter Product title" autocomplete="off" required="required">
            </div>
            <!--PRICE-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product price</label>
                <input type="text" name="price"  id="price" class="form-control " placeholder="Enter Product price" autocomplete="off" required="required">
            </div>
            <!--manufacturer-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="manufacturer" class="form-label">Product manufacturer</label>
                <input type="text" name="manufacturer"  id="manufacturer" class="form-control " placeholder="Enter Product manufacturer" autocomplete="off" required="required">
            </div>
            <!--expiry date-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="expiry_date" class="form-label">Product expiry date</label>
                <input type="text" name="expiry_date"  id="expiry_date" class="form-control " placeholder="Enter expiry date" autocomplete="off" required="required">
            </div>
            <!--rack-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="rack" class="form-label">Product rack</label>
                <input type="text" name="rack"  id="rack" class="form-control " placeholder="Enter Product rack no." autocomplete="off" required="required">
            </div>
            <!--quantity-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="quantity" class="form-label">Product quantity</label>
                <input type="text" name="quantity"  id="quantity" class="form-control " placeholder="Enter Product quantity" autocomplete="off" required="required">
            </div>
            <!--category-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">select a category</option>
                    <?php 
                    $select_query="Select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!--image-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image" class="form-label">Product image</label>
                <input type="file" name="image"  id="image" class="form-control "  required="required">
            </div>
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
    
</body>
</html>