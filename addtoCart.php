<?php
    session_start();
    $prodid= $_GET['prodid'];
    $userid = $_GET['userid'];

    include './Components/dbconnect.php';

    $sql = "INSERT INTO `cart`(`cart_product_id`, `cart_user_id`) VALUES ('$prodid','$userid')";
    $result = mysqli_query($conn, $sql);
    header("Location: /electromarts/");
?>