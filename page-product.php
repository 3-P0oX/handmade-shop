
<?php
        session_start();
        include('config-db.php');
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
        <a href="#">home</a>
        <a href="#">your page-product</a>
        <a href="#">serves</a>
        <input type="text" list="governorates" placeholder="here do you sell your product? " name="location">
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
        <span class="light-mode">light mode</span>
        <label class="switch-light-mode">
            <input type="checkbox">
            <span class="slider-switch"></span>
        </label>
    </div>


    <?php
        // استخراج معرف المنتج من الرابط
        $productID = $_GET['id'];

        $result = mysqli_query($conn, "SELECT * FROM product WHERE product_id='$productID'");
        $row = mysqli_fetch_array($result);

        echo "
            <form method='POST'>
                <div class='page-product'>
                    <img src='image/$row[product_img]' class='page-product-img'>
                    <hr>
                    <div class='page-product-content'>
                        <h5 class='page-product-title'>$row[product_name]</h5>
                        <hr>
                        <h6 class='location-product-view'>product location: $row[product_location]</h6>
                        <br>
                        <p class='page-product-description'>$row[product_description]</p>
                        <a href='insert-card.php?id=$row[product_id]&user_id=".$_SESSION['user_id']."' class='page-product-link'>add to card</a>
                    </div>
                </div>
            </form>
        ";
?>

</body>
    <script src="script.js"></script>
</html>