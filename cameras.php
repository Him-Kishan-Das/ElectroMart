<?php
    session_start();
    $id = $_GET['catid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cameras</title>
    <style>
        <?php
            include './styles/cameras.css';
        ?>
    </style>
</head>
<body>
    <?php
        include './Components/dbconnect.php';
        include './Components/Navbar.php';
    ?>

    <div class="brands">
        <h1 class="brands-header-section">Canon</h1>
        <div class="camera-product-cards">
            <?php
                $sql = "SELECT * FROM `products` WHERE product_category_id = '$id'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<div class="camera-product-card">
                                <div class="camera-product-card-image">
                                    <img src="'. $row['product_url'] .'" alt="'. $row['product_name'] .'">
                                </div>
                                <a href="./product.php?id='.$row['product_id'] .'&name='. $row['product_name'] .'" style="text-decoration: none;  color: inherit">
                                    <div class="camera-product-card-heading">
                                        '. $row['product_name'] .'
                                    </div>
                                    <div class="camera-product-discount-price">
                                        Price: &#8377; '. $row['product_price'] .'
                                    </div>
                                    <div class="camera-product-actual-price">
                                        M.R.P.: &#8377;'. $row['product_actual_price'] .'
                                    </div>
                                    <button class="camera-product-card-add-to-cart">Add to Cart</button>
                                </a>
                            </div>';
                }
            ?>            
        </div>
    </div> 
</body>
</html>