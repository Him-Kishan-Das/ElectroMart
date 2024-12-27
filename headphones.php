<?php
    session_start();
    $id = $_GET['catid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headphones</title>
    <style>
        <?php
            include './styles/headphones.css';
        ?>
    </style>
</head>
<body>
    <?php
        include './Components/dbconnect.php';
        include './Components/Navbar.php';
    ?>

    <div class="brands">
        <h1 class="brands-header-section">Asus</h1>
        <div class="headphones-product-cards">
            <?php
                $sql = "SELECT * FROM `products` WHERE product_category_id = '$id'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="headphones-product-card">
                            <div class="headphones-product-card-image">
                                <img src="'. $row['product_url'] .'" alt="iphone 15">
                            </div>
                            <a href="./product.php?id='.$row['product_id'] .'&name='. $row['product_name'] .'" style="text-decoration: none;  color: inherit">
                                <div class="headphones-product-card-heading">
                                    '. $row['product_name'] .'
                                </div>
                                <div class="headphones-product-discount-price">
                                    Price: &#8377; '. $row['product_price'] .'
                                </div>
                                <div class="headphones-product-actual-price">
                                    M.R.P.: &#8377;'. $row['product_actual_price'] .'
                                </div>
                                <button class="headphones-product-card-add-to-cart">Add to Cart</button>
                            </a>
                        </div>';
                }
            ?>
            
        </div>
    </div> 
</body>
</html>