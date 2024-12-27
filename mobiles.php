<?php
    session_start();
    $id = $_GET['catid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiles</title>
    <style>
        <?php 
            include './styles/mobiles.css';
        ?>
    </style>
</head>
<body>
    <?php
        include './Components/dbconnect.php';
        include './Components/Navbar.php';
    ?>
    <div class="brands">
        <!-- <h1 class="brands-header-section">Iphone</h1> -->
        <div class="mobiles-product-cards">
        <?php
            $sql = "SELECT * FROM `products` WHERE product_category_id = '$id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="mobiles-product-card">
                        <div class="mobiles-product-card-image">
                            <img src="'. $row['product_url'] .'" alt="'. $row['product_name'] .'">
                        </div>
                        <a href="./product.php?id='.$row['product_id'] .'&name='. $row['product_name'] .'" style="text-decoration: none;  color: inherit">
                            <div class="mobiles-product-card-heading">
                            '. $row['product_name'] .'
                            </div>
                            <div class="mobiles-product-discount-price">
                            Price: &#8377; '. $row['product_price'] .'
                            </div>
                            <div class="mobiles-product-actual-price">
                                M.R.P.: &#8377;' . $row['product_actual_price'] . '
                            </div>
                            <button class="mobiles-product-card-add-to-cart">Add to Cart</button>
                        </a>
                </div>';
            }
            
        ?>
            
            
        </div>
    </div>
</body>
</html>