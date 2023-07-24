<?php
include('config-db.php');
session_start();

if (isset($_POST['addCard'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    $insert = "INSERT INTO card (user_id, product_id) VALUES ('$user_id', '$product_id')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        $success=" تمت إضافة المنتج إلى سلة المشتريات بنجاح"  ;
        // إعادة توجيه لصفحة تأكيد الإضافة إلى سلة المشتريات
        header("Location: index.php?id=$product_id");
        exit();
    } else {
        $error="حدث خطأ أثناء إضافة المنتج إلى سلة المشتريات" ;
        // إعادة توجيه إلى الصفحة الرئيسية أو صفحة خطأ
        header("Location: index.php");
        exit();
    }
}
?>
