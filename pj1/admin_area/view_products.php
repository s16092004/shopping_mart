<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-center text-dark">PRODUCTS</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-danger">
        <tr>
            <th>Product ID</th>
            <th>Product title</>
            <th>Product image</th>
            <th>Product price</th>
            <th>product manufacturer</th>
            <th>product exp</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php 
    $get_products="Select * from products";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $product_manufacturer=$row['product_manufacturer'];
        $product_exp=$row['product_exp'];
        $number++;
        ?>
        <tr class='text-center'>
        <td><?php echo $number; ?></td>
        <td><?php echo $product_title ;?></td>
        <td><img src='./product_images/<?php echo $product_image;?>' class='product_img'/></td>
        <td>Rs. <?php echo $product_price;?></td>
        <td><?php echo $product_manufacturer ;?></td>
        <td><?php echo $product_exp ;?></td>
        <td><a href='index.php?edit_products=<?php echo $product_id;?>' class='text-light'>Edit</td>
        <td><a href='index.php?delete_product=<?php echo $product_id;?>' class='text-light'>Delete</td>

        <?php
    }
    ?>


</tr>
</tbody>
</table>
</body>
</html>


