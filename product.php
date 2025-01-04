<?php
    session_start();
    $id = $_GET['id'];
    $name = $_GET['name'];
    $userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Product -  ' . $name . ''; ?></title>
    <style>
        <?php
            include './Components/dbconnect.php';
            include './styles/product.css';
        ?>
    </style>
</head>
<body>
    <?php
        include './Components/Navbar.php'
    ?>

    <div class="product-container">
        <?php
            $sql = "SELECT * FROM `products` WHERE product_id = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

        echo '
        <div class="product-container-left">
            <div class="product-image">
                <img src="' . $row['product_url'] . '" alt="">
            </div>
        </div>
        <div class="product-container-right">
            <h1 class="product-heading">'. $row['product_name'] .'</h1>
            <hr class=product-horizontal-line>
            <div class="product-description-container">
                <ul class="product-description">
                    '. $row['product_description'] .'
                </ul>
            <hr class=product-horizontal-line>
            </div>
            <div class="product-price">
                <div class="product-discount-price">
                   Price: &#8377; '. $row['product_price'] .'
                </div>
                <div class="product-actual-price">
                    M.R.P.: &#8377;'. $row['product_actual_price'] .'
                </div>
            </div>
            <hr class=product-horizontal-line>
            <div class="product-buttons">
                <a href="./addtoCart.php?prodid='. $row['product_id'].'&userid='. $userid .'">
                    <button class="product-button product-add-to-cart">Add to Cart</button>
                </a>
                <button class="product-button product-buy-button">Buy</button>
            </div>
        </div>';

        ?>
    </div>
</body>
</html>