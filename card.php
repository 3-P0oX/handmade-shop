<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myCard | عربتي</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title-page-card">
        <h3>🛒 my card</h3>
    </div>
    <?php
    include('config-db.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM card INNER JOIN product ON card.product_id = product.product_id WHERE card.user_id = $user_id";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
        echo"
        <main>
            <table class='table-page-card'>
                <thead class='head-table-card'>
                    <tr>
                        <th class='product-id-h'>id product</th>
                        <th id='header-table'>product_name</th>
                        <th id='header-table'>product price</th>
                        <th id='header-table'>delete product</th>
                        <th id='header-table'>view</th>
                    </tr>
                </thead>
                <tbody class='body-table-card'>
                    <form action='delete_card.php' method='GET'>
                    <tr>
                        <td class='product-id-h' name='id'>$row[product_id]</td>
                        <td id='tbody-table'>$row[product_name]</td>
                        <td id='tbody-table'>$row[product_price] EGP</td>
                        <td id='tbody-table'><a href='delete_card.php?id=$row[product_id]&user_id=$user_id'>delete</a></td>
                        <td id='tbody-table'><a href='page-product.php?id=$row[product_id]'>view</a></td>
                    </tr>
                    </form>
                </tbody>
            </table>
        </main>
        ";
    }
    ?>
</body>
</html>
