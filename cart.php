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
        <div class="cart-item">
            <img src="item1.jpg" alt="Item 1" class="item-image">
            <div class="item-details">
                <div class="item-title">Wireless Mouse</div>
                <div class="item-price">$25</div>
            </div>
        </div>
        <div class="cart-item">
            <img src="item2.jpg" alt="Item 2" class="item-image">
            <div class="item-details">
                <div class="item-title">Mechanical Keyboard</div>
                <div class="item-price">$40</div>
            </div>
        </div>
        <div class="cart-item">
            <img src="item3.jpg" alt="Item 3" class="item-image">
            <div class="item-details">
                <div class="item-title">27" Monitor</div>
                <div class="item-price">$150</div>
            </div>
        </div>

        <div class="cart-summary">
            Total: $215
            <br>
            <a href="checkout.html" class="checkout-button">Proceed to Checkout</a>
        </div>
    </div>
</body>
</html>
