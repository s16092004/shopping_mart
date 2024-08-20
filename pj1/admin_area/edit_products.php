<?php 
if(isset($_GET['edit_products']))
{
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from products where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_price=$row['product_price'];
    $product_manufacturer=$row['product_manufacturer'];
    $product_exp=$row['product_exp'];
    $category_id=$row['category_id'];
    $product_image=$row['product_image'];
    $product_rack=$row['product_rack'];
    $product_quantity=$row['product_quantity'];
    
    $select_category="Select * from categories where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit</h1>
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_tit" class="form-label">Product Title</label>
        <input type="text" id="product_tit" value=<?php echo $product_title?> name="product_tit" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_man" class="form-label">Product Manufacturer</label>
        <input type="text" id="product_man" value=<?php echo $product_manufacturer?> name="product_man" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_pri" class="form-label">Product Price</label>
        <input type="text" id="product_pri" value=<?php echo $product_price?> name="product_pri" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_ex" class="form-label">Product expiry date</label>
        <input type="text" id="product_ex" value=<?php echo $product_exp?> name="product_ex" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_rac" class="form-label">Product rack</label>
        <input type="text" id="product_rac" value=<?php echo $product_rack?> name="product_rac" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_q" class="form-label">Product quantity</label>
        <input type="text" id="product_q" value=<?php echo $product_quantity?> name="product_q" class="form-control" required="required">
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_cat" class="form-label">Product category</label>
        <select name="product_cat" class="form-select">
            <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
           <?php 
           $select_cateall="Select * from categories";
         $result_cateall=mysqli_query($con,$select_cateall);
        while($row_cate=mysqli_fetch_assoc($result_cateall))
        {
            $category_title=$row_cate['category_title'];
            $category_id=$row_cate['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
    ?>
        </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_img" class="form-label">Product Image</label>
        <div class="d-flex">
        <input type="file" id="product_img" name="product_img" class="form-control w-90 m-auto" required="required">
        <img src="./product_images/<?php echo $product_image?>" alt="" class="product_img">
        </div>
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="update product" class="btn btn-danger px-3 mb-3">
            

  </div>

</form>
</div>
<?php 
if(isset($_POST['edit_product']))
{
    $product_tit=$_POST['product_tit'];
    $product_man=$_POST['product_man'];
    $product_pri=$_POST['product_pri'];
    $product_ex=$_POST['product_ex'];
    $product_rac=$_POST['product_rac'];
    $product_q=$_POST['product_q'];
    $product_cat=$_POST['product_cat'];
    $product_img=$_FILES['product_img']['name'];
    $temp=$_FILES['product_img']['temp2'];
    if($product_tit!='' or $product_man!='' or $product_pri!='' or $product_ex!='' or $product_rac!='' or $product_q!='' or $product_cat!='' or $product_img!='')
    {
    move_uploaded_file($temp,"./product_images/$product_img");
    $update="update products set category_id='$product_cat', product_title='$product_tit', product_price='$product_pri' ,product_manufacturer='$product_man' ,product_exp='$product_ex' ,product_image='$product_img' ,product_rack='$product_rac' ,product_quantity='$product_q' where product_id=$edit_id";
    $result_update=mysqli_query($con,$update);
    if($result_update)
    {
        echo "<script>alert('Updated successfully')</script>";
        echo "<script>window.open('./insert_product.php','_elf')</script>";

    }
    }
}
?>