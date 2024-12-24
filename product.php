<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product - </title>
    <style>
        <?php
            include './styles/product.css';
        ?>
    </style>
</head>
<body>
    <?php
        include './Components/Navbar.php'
    ?>

    <div class="product-container">
        <div class="product-container-left">
            <div class="product-image">
                <img src="img\apple iphone 15.jpg" alt="">
            </div>
        </div>
        <div class="product-container-right">
            <h1 class="product-heading">Apple Iphone 15 (128GB) - Blue</h1>
            <hr class=product-horizontal-line>
            <div class="product-description-container">
                <ul class="product-description">
                    <li class="product-description-list">Brand -  Apple</li>
                    <li class="product-description-list">Colour - Blue</li>
                    <li class="product-description-list">DYNAMIC ISLAND COMES TO IPHONE 15 — Dynamic Island bubbles up alerts and Live Activities — so you don't miss them while you're doing something else. You can see who's calling, track your next ride, check your flight status, and so much more.</li>
                    <li class="product-description-list">INNOVATIVE DESIGN — iPhone 15 features a durable color-infused glass and aluminum design. It's splash, water, and dust resistant. The Ceramic Shield front is tougher than any smartphone glass. And the 6.1" Super Retina XDR display is up to 2x brighter in the sun compared to iPhone 14.</li>
                </ul>
            <hr class=product-horizontal-line>
            </div>
            <div class="product-price">
                <div class="product-discount-price">
                   Price: &#8377; 66,100
                </div>
                <div class="product-actual-price">
                    M.R.P.: &#8377;79,600.00
                </div>
            </div>
            <hr class=product-horizontal-line>
            <div class="product-buttons">
                <button class="product-button product-add-to-cart">Add to Cart</button>
                <button class="product-button product-buy-button">Buy</button>
            </div>
        </div>
    </div>
</body>
</html>