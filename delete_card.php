<?php
session_start();
include('config-db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT * FROM card WHERE product_id = $id AND user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if($row){
        mysqli_query($conn, "DELETE FROM card WHERE product_id = $id AND user_id = $user_id");
        header('Location: card.php');
        exit();
    }
}

header('Location: card.php');
exit();
?>
