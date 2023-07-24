<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- product-merchant-add content container -->
        <div class="product-merchant-add">
            <!-- Product form -->
            <form action="insert-product.php" method="POST" enctype="multipart/form-data" class="form-product-merchant-add">
                <h1>Add a Product</h1>
                <img src="image/icon/logo-add(1).png" alt="logo" class="logo-adding">
                <br/>
                <!-- Product Name input -->
                <input type="text" name="product-name" placeholder="Product Name" required>
                <input type="text" name="product-price" placeholder="Product price" required>
                <br/>
                <!-- Product section dropdown -->
                <select name="product-section" required>
                    <option value="">Select Product Section</option>
                    <option value="devices & electronics">devices & electronics</option>
                    <option value="fashion & beauty">fashion & beauty</option>
                    <option value="sports">sports</option>
                    <option value="automotive">automotive</option>
                    <option value="books">books</option>
                    <option value="gaming">gaming</option>
                    <option value="pets">Images</option>
                    <option value="groceries & drinks">groceries & drinks</option>
                    <option value="deals & savings">deals & savings</option>
                </select>
                <br/>
                <!-- Product Description textarea -->
                <textarea name="product-description" cols="40" rows="10" required placeholder="Product Description"></textarea>
                <br/>
                <input type="text" list="governorates" placeholder="here do you sell your product? " name="location">
                    <datalist id="governorates">
                    <option value="All provinces">
                    <option value="Cairo">
                    <option value="Alexandria">
                    <option value="Giza">
                    <option value="Port Said">
                    <option value="Suez">
                    <option value="Luxor">
                    <option value="Aswan">
                    <option value="Assiut">
                    <option value="Red Sea">
                    <option value="Beheira">
                    <option value="Beni Suef">
                    <option value="Benha">
                    <option value="Dakahlia">
                    <option value="Damietta">
                    <option value="Fayoum">
                    <option value="Gharbia">
                    <option value="Giza">
                    <option value="Ismailia">
                    <option value="Kafr El Sheikh">
                    <option value="Matrouh">
                    <option value="Minya">
                    <option value="Monufia">
                    <option value="Qena">
                    <option value="Sharqia">
                    <option value="North Sinai">
                    <option value="Sohag">
                    <option value="South Sinai">
                    <option value="Kafr El Sheikh">
                </datalist>

                <!-- Product Address input -->
                <input type="hidden" name="merchant-id" id="merchant-id" readonly value="1" required>
                <br>
                <label for="productFile"><b>Picture of the Product</b></label>
                <br/>
                <!-- Product Image input -->
                <input type="file" id="product-file" name="product-img" required>
                <br/>
                <!-- Upload Button -->
                <input type="submit" value="Upload" name="upload">
                <br/>
                <!-- Link to view all products -->
                <a href="product-merchant.php"><h4>View All Products</h4></a>
            </form>

        </div>
</body>
</html>
