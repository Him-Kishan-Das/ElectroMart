<?php
    session_start();
    include './Components/dbconnect.php';
    $userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        <?php
            include './styles/cart.css';
        ?>
    </style>
</head>
<body>
    <?php
        include './Components/Navbar.php';
    ?>

    <div class="cart-container">
        <?php
            $sql = "SELECT * FROM `cart` WHERE cart_user_id = '$userid'";
            $result = mysqli_query($conn, $sql);

            $total_price= 0;
            while($row=mysqli_fetch_assoc($result)){
                $prId = $row['cart_product_id'];
                $sql2 = "SELECT * FROM `products` WHERE product_id='$prId'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<div class="cart-item">
                        <img src="'. $row2['product_url'] .'" alt="'. $row2['product_name'] .'" class="item-image">
                        <div class="item-details">
                            <div class="item-title">'. $row2['product_name'] .'</div>
                            <div class="item-price">&#8377;'. $row2['product_price'] .'</div>
                        </div>
                    </div>';     
                $total_price += $row2['product_price'];
            }
            echo '<div class="cart-summary">
                Total: &#8377; '. $total_price .'
                <br>
                <a href="checkout.html" class="checkout-button">Proceed to Checkout</a>
            </div>';
        ?>

    </div>
</body>
</html>
