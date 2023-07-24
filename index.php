<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // المستخدم غير مسجل الدخول، قم بإعادة توجيهه إلى صفحة تسجيل الدخول
    header("Location: login.php");
    exit();
}
// if (!isset($_SESSION['dark_mode'])) {
//     // القيمة الافتراضية: الوضع النهاري
//     $_SESSION['dark_mode'] = false;
// }
// $rootClass = $_SESSION['dark_mode'] ? 'dark-mode' : '';

// استخدم $_SESSION['user_id'] للإشارة إلى معرف المستخدم في قواعد البيانات أو التحكم بعمليات الإضافة إلى سلة المشتريات
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
        <input type="text" list="governorates" placeholder="product in your location " name="location">
                    <datalist id="governorates" >
                    <option class="option-navbar" value="All provinces">
                    <option class="option-navbar" value="Cairo">
                    <option class="option-navbar" value="Alexandria">
                    <option class="option-navbar" value="Giza">
                    <option class="option-navbar" value="Port Said">
                    <option class="option-navbar" value="Suez">
                    <option class="option-navbar" value="Luxor">
                    <option class="option-navbar" value="Aswan">
                    <option class="option-navbar" value="Assiut">
                    <option class="option-navbar" value="Red Sea">
                    <option class="option-navbar" value="Beheira">
                    <option class="option-navbar" value="Beni Suef">
                    <option class="option-navbar" value="Benha">
                    <option class="option-navbar" value="Dakahlia">
                    <option class="option-navbar" value="Damietta">
                    <option class="option-navbar" value="Fayoum">
                    <option class="option-navbar" value="Gharbia">
                    <option class="option-navbar" value="Giza">
                    <option class="option-navbar" value="Ismailia">
                    <option class="option-navbar" value="Kafr El Sheikh">
                    <option class="option-navbar" value="Matrouh">
                    <option class="option-navbar" value="Minya">
                    <option class="option-navbar" value="Monufia">
                    <option class="option-navbar" value="Qena">
                    <option class="option-navbar" value="Sharqia">
                    <option class="option-navbar" value="North Sinai">
                    <option class="option-navbar" value="Sohag">
                    <option class="option-navbar" value="South Sinai">
                    <option class="option-navbar" value="Kafr El Sheikh">
                </datalist>
        <a href="#">contact</a>
    </div>
    <div class="navbar navbar-menu-icon">
        <a href="#">&#127968;</a>
        <a href="#">&#128722;</a>
        <input type="text" list="governorates" placeholder="product in your location " name="location" style="width: 135px;">
                    <datalist id="governorates">
                    <option class="option-navbar" value="All provinces">
                    <option class="option-navbar" value="Cairo" >
                    <option class="option-navbar" value="Alexandria" >
                    <option class="option-navbar" value="Giza" >
                    <option class="option-navbar" value="Port Said" >
                    <option class="option-navbar" value="Suez" >
                    <option class="option-navbar" value="Luxor" >
                    <option class="option-navbar" value="Aswan" >
                    <option class="option-navbar" value="Assiut" >
                    <option class="option-navbar" value="Red Sea" >
                    <option class="option-navbar" value="Beheira" >
                    <option class="option-navbar" value="Beni Suef" >
                    <option class="option-navbar" value="Benha" >
                    <option class="option-navbar" value="Dakahlia" >
                    <option class="option-navbar" value="Damietta" >
                    <option class="option-navbar" value="Fayoum" >
                    <option class="option-navbar" value="Gharbia" >
                    <option class="option-navbar" value="Giza" >
                    <option class="option-navbar" value="Ismailia" >
                    <option class="option-navbar" value="Kafr El Sheikh" >
                    <option class="option-navbar" value="Matrouh" >
                    <option class="option-navbar" value="Minya" >
                    <option class="option-navbar" value="Monufia" >
                    <option class="option-navbar" value="Qena" >
                    <option class="option-navbar" value="Sharqia" >
                    <option class="option-navbar" value="North Sinai" >
                    <option class="option-navbar" value="Sohag" >
                    <option class="option-navbar" value="South Sinai" >
                    <option class="option-navbar" value="Kafr El Sheikh" >
                </datalist>
        <a href="#">📞</a>
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
        <h3> your account</h3>
        <div class="sidebar-contact">
            <ul>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-login"></i> login & security</a>
                </li>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-your-order"></i>&#128666; your order</a>
                </li>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-manage-your-profiles"></i> manage your profiles</a>
                </li>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-memberships"></i> memberships</a>
                </li>
                <li>
                    <a class="social-link" href="#"><i class="ac lg-history"></i> history</a>
                </li>                  
                <li>
                    <a class="social-link" href="#"><i class="ac lg-sitting"></i>&#9881; sitting</a>
                </li>                  
            </ul>
        </div>
        <h3>your a merchant</h3>
        <div class="sidebar-contact">
            <ul>
                <li><a href="login-merchant.php" class="social-link">manage your account</a></li>
                <li><a href="signup-merchant.php" class="social-link">start selling with us</a></li>
            </ul>
        </div>
        <span class="light-mode">light mode</span>
        <label class="switch-light-mode">
            <input type="checkbox">
            <span class="slider-switch"></span>
        </label>
    </div>



    <div class="slideshow-container">
        <div class="slide-show">
            <img src="image/product(11).jpg" alt="Image 1">
        </div>
        <div class="all-thumbnail">
            <img class="thumbnail item-1" src="image/product(11).jpg" onclick="currentSlide(1)" alt="صورة 1">
            <img class="thumbnail item-2" src="image/product(12).jpg" onclick="currentSlide(2)" alt="صورة 2">
            <img class="thumbnail item-3" src="image/product(13).jpg" onclick="currentSlide(3)" alt="صورة 3">
        </div>
        <div class="slide-show">
            <img src="image/product(12).jpg" alt="Image 2">
            </div>
            <div class="slide-show">
            <img src="image/product(13).jpg" alt="Image 3">
            </div>
        </div>



        <?php
            include('config-db.php');

            // استعلام SQL لاسترداد الفئات المختلفة
            $categoryQuery = mysqli_query($conn, "SELECT DISTINCT product_category FROM product");

            while ($categoryRow = mysqli_fetch_array($categoryQuery)) {
                $category = $categoryRow['product_category'];

                // استعلام SQL لاسترداد المنتجات في الفئة المحددة
                $productsQuery = mysqli_query($conn, "SELECT * FROM product WHERE product_category='$category'");

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
                                <a href='page-product.php?id=$row[product_id]&user_id=".$_SESSION['user_id']."' class='view-link'>view</a>
                                <a href='confirm.php?id=$row[product_id]&user_id=$_SESSION[user_id]' name='addCard' class='card-link'>Add to cart</a>
                            </div>
                        </div>
                    ";
                }

                echo "
                        </div>
                    </div>
                ";
            }

            mysqli_close($conn);
            ?>

</body>
    <script src="script.js"></script>
</html>