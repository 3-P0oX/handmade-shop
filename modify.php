<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    session_start();
    // Include database connection
    include('config-db.php');
    
    // Get the product ID from URL
    $id = $_GET['id'];
    
    // Fetch the product data from the database
    $update = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $id");
    $data =  mysqli_fetch_array($update);
    ?>

        <div class="main-page-modify">
            <form action="after_up_product.php" method="POST" enctype="multipart/form-data">
                <h1><b>Modify Product Data</b></h1>
                <img src='<?php echo "images/$data[product_img]"; ?>' alt="Product Image" >
                <br/>
                <input type="hidden" id="product_id" name="product_id" readonly value='<?php echo "$data[product_id]"?>'>
                <br/>
                <input type="hidden" id="merchant_id" name="merchant_id" readonly value='<?php echo "$_SESSION[merchant_id]"?>'>
                <br/>
                <label for="name">Product Name</label>
                <br>
                <input type="text" name="product_name" id="name"  value='<?php echo "$data[product_name]"?>' required>
                <br>
                <label for="name">Product category</label>
                <br/>
                <!-- Product section dropdown -->
                <select name="product-section" required>
                    <option value="" <?php if (empty($data['product_category'])) echo 'selected'; ?>>Select Product Section</option>
                    <option value="devices & electronics" <?php if ($data['product_category'] === 'devices & electronics') echo 'selected'; ?>>devices & electronics</option>
                    <option value="fashion & beauty" <?php if ($data['product_category'] === 'fashion & beauty') echo 'selected'; ?>>fashion & beauty</option>
                    <option value="sports" <?php if ($data['product_category'] === 'sports') echo 'selected'; ?>>sports</option>
                    <option value="automotive" <?php if ($data['product_category'] === 'automotive') echo 'selected'; ?>>automotive</option>
                    <option value="books" <?php if ($data['product_category'] === 'books') echo 'selected'; ?>>books</option>
                    <option value="gaming" <?php if ($data['product_category'] === 'gaming') echo 'selected'; ?>>gaming</option>
                    <option value="pets" <?php if ($data['product_category'] === 'pets') echo 'selected'; ?>>pets</option>
                    <option value="groceries & drinks" <?php if ($data['product_category'] === 'groceries & drinks') echo 'selected'; ?>>groceries & drinks</option>
                    <option value="deals & savings" <?php if ($data['product_category'] === 'deals & savings') echo 'selected'; ?>>deals & savings</option>
                </select>
                <br/>
                <label for="productFile"><b>Product price</b></label>
                <br/>
                <input type="text" id="category" name="product-category" value='<?php echo "$data[product_price]"?>' required>
                <br/>
                <label for="description">Product Description</label>
                <br>
                <textarea name="product-description" id="description" cols="40" rows="10" required placeholder="Product Description"><?php echo "$data[product_description]"?></textarea>
                <br/>
                <label for="location">Product location</label>
                <br>
                <input type="text" list="governorates" placeholder="Where do you sell your product?" name="location" value="<?php echo $data['product_location']; ?>">
                <datalist id="governorates">
                    <option value="All provinces"></option>
                    <option value="Cairo"></option>
                    <option value="Alexandria"></option>
                    <option value="Giza"></option>
                    <option value="Port Said"></option>
                    <option value="Suez"></option>
                    <option value="Luxor"></option>
                    <option value="Aswan"></option>
                        <option value="Assiut"></option>
                        <option value="Red Sea"></option>
                        <option value="Beheira"></option>
                        <option value="Beni Suef"></option>
                        <option value="Benha"></option>
                        <option value="Dakahlia"></option>
                        <option value="Damietta"></option>
                        <option value="Fayoum"></option>
                        <option value="Gharbia"></option>
                        <option value="Giza"></option>
                        <option value="Ismailia"></option>
                        <option value="Kafr El Sheikh"></option>
                        <option value="Matrouh"></option>
                        <option value="Minya"></option>
                        <option value="Monufia"></option>
                        <option value="Qena"></option>
                        <option value="Sharqia"></option>
                        <option value="North Sinai"></option>
                        <option value="Sohag"></option>
                        <option value="South Sinai"></option>
                        <option value="Kafr El Sheikh"></option>
                    </datalist>
                <br>
                    <input type="file" id="product-file" name="product-img" required>
                <br>
                    <input type="submit" value="Save" name="update">
                <br/>
                    <a href="product-merchant.php"><h4>View All Products</h4></a>
            </form>
        </div>
    </body>

</html>
