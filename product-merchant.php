<?php
session_start();
if (!isset($_SESSION['merchant_id'])) {
    // التاجر غير مسجل الدخول، قم بإعادة توجيهه إلى صفحة تسجيل الدخول
    header("Location: login-merchant.php");
    exit();
}

// استخدم $_SESSION['merchant_id'] للإشارة إلى معرف التاجر في قواعد البيانات أو التحكم بعمليات    اضافة المنتجات 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>handmade</title>
</head>
<body>
    <div class="navbar navbar-menu">
        <a href="index.php">home</a>
        <a href="card.php">your card</a>
        <a href="#">serves</a>
        <a href="#">contact</a>
    </div>
    <div class="navbar navbar-menu-icon">
        <a href="#">&#127968;</a>
        <a href="#">&#128722;</a>
        <a href="#">💼</a>
        <a href="#">&#128483;</a>
    </div>



    <div class="show-sidebar">&#9776</div>
        <div class="sidebar" id="sidebar">
            <div class="input-search">
                <input type="search" name="search" id="search" placeholder="  search">
                <button type="submit">&#128269</button>
            </div>
            <h3>
                categories
            </h3>
            <div class="side-menu">
                <ul>
                <li><a href="#">deals & savings</a></li>
                    <li><a href="#">groceries & drinks</a></li>
                        <li><a href="#">pets</a></li>
                            <li><a href="#">gaming</a></li>
                                <li><a href="#">books</a></li>
                            <li><a href="#">automotive</a></li>
                        <li><a href="#">sports</a></li>
                    <li><a href="#">fashion & beauty</a></li>
                <li><a href="#">devices & electronics</a></li>
            </ul>
        </div>
        <h3>your a merchant</h3>
        <div class="sidebar-contact">
            <ul>
                <li>
                    <a href="login-merchant.php" class="social-link">manage your account</a>
                </li>
                <li>
                    <a href="signup-merchant.php" class="social-link">start selling with us</a>
                </li>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-manage-your-profiles"></i> manage your profiles</a>
                </li>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-sitting"></i>&#9881; sitting</a>
                </li>
            </ul>
        </div>
        <span class="light-mode">light mode</span>
        <label class="switch-light-mode">
            <input type="checkbox">
            <span class="slider-switch"></span>
        </label>
    </div>



    <?php
        include('config-db.php');
        if(isset($_SESSION['merchant_id'])){
            $merchant_id = $_SESSION['merchant_id'];
        // استعلام SQL لاسترداد الفئات المختلفة
        $categoryQuery = mysqli_query($conn, "SELECT DISTINCT product_category FROM product WHERE merchant_id='$merchant_id'");

        while ($categoryRow = mysqli_fetch_array($categoryQuery)) {
            $category = $categoryRow['product_category'];

            // استعلام SQL لاسترداد المنتجات في الفئة المحددة وللتاجر المعين
            $productsQuery = mysqli_query($conn, "SELECT * FROM product WHERE product_category='$category' AND merchant_id='$merchant_id'");

            echo "
                <div class='title-section'>
                    <h2>
                        <div class='container-title'>$category</div>
                    </h2>
                </div>
                <div class='scrollbar'>
                    <div class='scroll-content'>
            ";

            while ($row = mysqli_fetch_array($productsQuery)) {
                echo "
                    <div class='card'>
                        <img src='image/$row[product_img]' class='card-img'>
                        <div class='card-content'>
                            <h5 class='card-title'>$row[product_name]</h5>
                            <h6 class='location-product-view'>Product location: $row[product_location]</h6>
                            <a href='delete-product.php?id=$row[product_id]&merchant_id=".$_SESSION['merchant_id']."' class='view-link'>delete</a>
                            <a href='modify.php?id=$row[product_id]&merchant_id=$_SESSION[merchant_id]' name='modify' class='card-link'>modify</a>
                        </div>
                    </div>
                ";
            }
        }
    }
        mysqli_close($conn);
        ?>




</body>
    <script src="script.js"></script>
</html>