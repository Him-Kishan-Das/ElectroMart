<?php
    
    session_start();
    $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Grey+Qo&family=Nanum+Gothic+Coding&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans+Narrow:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Grey+Qo&family=Nanum+Gothic+Coding&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans+Narrow:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');
    <?php
        include './styles/home.css';
    ?>
</style>
</head>
<body>
    <?php
        include './Components/dbconnect.php';
        include './Components/Navbar.php';
    ?>

    <!-- Mobile Sections  -->
    <div class="section-home-page">
        <h1 class="section-header">Popular Mobiles</h1>
        <div class="mobiles-product-cards">
            <?php
            $sql = "SELECT * FROM `products` WHERE product_category_id = '1'";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_image = $row['product_url'];
                $product_discount_price = $row['product_price'];
                $product_actual_price = $row['product_actual_price'];

                echo '
                    <div class="mobiles-product-card">
                        <div class="mobiles-product-card-image">
                            <img src="' . $product_image . '" alt="iphone 15">
                        </div>
                        <a href="./product.php?id='.$product_id .'&name='. $product_name .'" style="text-decoration: none;  color: inherit">
                            <div class="mobiles-product-card-heading">
                                '. $product_name .'
                            </div>
                            <div class="mobiles-product-discount-price">
                            Price: &#8377; '. $product_discount_price .'
                            </div>
                            <div class="mobiles-product-actual-price">
                                M.R.P.: &#8377;'. $product_actual_price .'
                            </div>
                            <a href="./addtoCart.php?prodid='. $row['product_id'].'&userid='. $userid .'">
                                <button class="mobiles-product-card-add-to-cart">Add to Cart</button>
                            </a>
                        </a>
                    </div>';
            }
            ?>
            
        </div>
    </div>
    
    <!-- Laptop Sections  -->
    <div class="section-home-page">
        <h1 class="section-header">Popular Laptops</h1>
        <div class="laptop-product-cards">
            <?php
                $sql = "SELECT * FROM `products` WHERE product_category_id = '2'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '
                        <div class="laptop-product-card">
                            <div class="laptop-product-card-image">
                                <img src="'. $row['product_url'] .'" alt="iphone 15">
                            </div>
                            <a href="./product.php?id='.$row['product_id'] .'&name='. $row['product_name'] .'" style="text-decoration: none;  color: inherit">
                                <div class="laptop-product-card-heading">
                                    '. $row['product_name'] .'
                                </div>
                                <div class="laptop-product-discount-price">
                                Price: &#8377; '. $row['product_price'] .'
                                </div>
                                <div class="laptop-product-actual-price">
                                    M.R.P.: &#8377;'. $row['product_actual_price'] .'
                                </div>
                                <a href="./addtoCart.php?prodid='. $row['product_id'].'&userid='. $userid .'">
                                    <button class="laptop-product-card-add-to-cart">Add to Cart</button>
                                </a>
                            </a>
                        </div>
                    ';
                }

            ?>
            
        </div>
    </div>

    <!-- Cameras Sections  -->
    <div class="section-home-page">
        <h1 class="section-header">Popular Cameras</h1>
        <div class="camera-product-cards">
            <?php
                $sql = "SELECT * FROM `products` WHERE product_category_id = '3'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '
                        <div class="camera-product-card">
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
                                <a href="./addtoCart.php?prodid='. $row['product_id'].'&userid='. $userid .'">
                                    <button class="camera-product-card-add-to-cart">Add to Cart</button>
                                </a>
                            </a>
                        </div>
                    ';
                }
            ?>
                        
                      
            
        </div>
    </div>

    <!-- Headphones Section  -->
    <div class="section-home-page">
        <h1 class="section-header">Popular Headphones</h1>
        <div class="headphones-product-cards">
            <?php
                $sql = "SELECT * FROM `products` WHERE product_category_id = '4'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<div class="headphones-product-card">
                            <div class="headphones-product-card-image">
                                <img src="'. $row['product_url'] .'" alt="'. $row['product_name'] .'">
                            </div>
                            <a href="./product.php?id='.$row['product_id'] .'&name='. $row['product_name'] .'" style="text-decoration: none;  color: inherit">
                                <div class="headphones-product-card-heading">
                                    '. $row['product_name'] .'
                                </div>
                                <div class="headphones-product-discount-price">
                                    Price: &#8377;'. $row['product_price'] .'
                                </div>
                                <div class="headphones-product-actual-price">
                                        M.R.P.: &#8377;'. $row['product_actual_price'] .'
                                </div>
                                <a href="./addtoCart.php?prodid='. $row['product_id'].'&userid='. $userid .'">
                                    <button class="headphones-product-card-add-to-cart">Add to Cart</button>
                                </a>
                            </a>
                        </div>';
                }
            ?>
            
        </div>     
    </div> 
</div>
</body>
</html>