<?php
include('config-db.php');
session_start();

$id = $_GET['id'];
$enquiry = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $id");
$data = mysqli_fetch_array($enquiry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تأكيد شراء المنتج</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-page-confirm">
        <form action="insert-card.php" method="POST">
            <h2>هل تريد شراء المنتج</h2>
            <br>
            <img src='image/<?php echo $data["product_img"] ?>' alt="">
            <input type="hidden" name="product_id" value='<?php echo $data["product_id"] ?>'>
            <input type="hidden" name="user_id" value='<?php echo $_SESSION["user_id"] ?>'>
            <input type="text" readonly name="location" value='هذا المنتج متوفر في: <?php echo $data["product_location"] ?>'>
            <input type="text" readonly name="name" value='<?php echo $data["product_name"] ?>'>
            <input type="text" readonly name="price" value='<?php echo $data["product_price"] . 'EGP' ?>'>
            <input type="submit" readonly name="addCard" value="تأكيد">
            <br>
            <a href="index.php">العودة للصفحة الرئيسية</a>
        </form>
    </div>
</body>
</html>
