<?php
include('config-db.php');
if(isset($_POST['upload'])){
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_section = $_POST['product-section'];
    $product_description = $_POST['product-description'];
    $location = $_POST['location'];
    $merchant_id = $_POST['merchant-id'];
    $product_img = $_FILES['product-img']['name'];
    $image_temp = $_FILES['product-img']['tmp_name'];
    $image_path = "images/".$product_img;

    $insert = "INSERT INTO product (product_name, product_price, product_description, product_img, product_category, merchant_id, product_location) 
    VALUES ('$product_name', '$product_price', '$product_description', '$product_img', '$product_section', '$merchant_id', '$location')";
    $result = mysqli_query($conn, $insert);

    if($result && move_uploaded_file($image_temp, $image_path)){
        $success="تم رفع المنتج بنجاح";
    }else{
        $error= "لم يتم رفع المنتج";
    }
    header('location: add-product.php');
}
?>
