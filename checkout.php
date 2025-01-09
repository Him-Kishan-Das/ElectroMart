<?php
session_start();
include './Components/dbconnect.php';

if (!isset($_SESSION['userid'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['userid'];

// Get all cart items for the user
$sql = "SELECT * FROM `cart` WHERE `cart_user_id` = '$userid'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $prId = $row['cart_product_id'];

        // Fetch product details (optional, if needed in the orders table)
        $sql2 = "SELECT * FROM `products` WHERE `product_id` = '$prId'";
        $result2 = mysqli_query($conn, $sql2);
        $product = mysqli_fetch_assoc($result2);

        // Insert into `orders` table
        $order_sql = "INSERT INTO `orders` (`user_id`, `product_id`, `order_timestamp`) 
                      VALUES ('$userid', '$prId', current_timestamp())";
        mysqli_query($conn, $order_sql);

        // Remove from `cart` table
        $delete_sql = "DELETE FROM `cart` WHERE `cart_user_id` = '$userid'";
        mysqli_query($conn, $delete_sql);
    }

    // Redirect to a success page
    header("Location: myProfile.php");
    exit();
} else {
    // If the cart is empty, redirect to the cart page
    header("Location: cart.php");
    exit();
}
?>
