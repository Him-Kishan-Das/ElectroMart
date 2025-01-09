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
    <title>My Profile</title>
    <link rel="stylesheet" href="./styles/myProfile.css">
</head>
<body>
    <?php 
        include './Components/Navbar.php';
    ?>

    <div class="container">
      

        <div class="content">
            <?php
                $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_id = ?");
                $stmt->bind_param("s", $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
            ?>
            <div class="profile-header">
                <div class="profile-details">
                    <h2><?php echo $row['username']; ?></h2>
                    <p><?php echo $row['username']; ?></p>
                </div>
                
                <!-- <img src="Components/icons/user-solid.svg" alt="Profile Avatar"> -->
            </div>
            
            <form id="profile-form" action="myProfile.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="user_name" value="<?php echo $row['username'] ?>" >
                </div>
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>" >
                </div>
                <button type="submit" class="save-button">Edit Profile</button>
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $username = $_POST['user_name'];
                    $name= $_POST['name'];
                    $email = $_POST['email'];
                    $sql2 = "UPDATE `users` SET `username`='$username',`name`='$name',`email`='$email' WHERE `user_id`='$userid'";
                    $result2 = mysqli_query($conn, $sql2);
                    
                }
            ?>

            <div class="items-section">
                <h3>Orders</h3>
                
                <table class="items-list">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql3 = "SELECT * FROM `orders` WHERE `user_id`='$userid'";
                        $result3 = mysqli_query($conn, $sql3);
                        while($row3 = mysqli_fetch_assoc($result3)){
                            $sql4 = "SELECT * FROM `products` WHERE `product_id` = {$row3['product_id']}";
                            $result4 = mysqli_query($conn, $sql4);
                            $row4 = mysqli_fetch_assoc(($result4));
                            echo '<tr>
                                    <td>'. $row4['product_name'] .'</td>
                                    <td>&#8377;'. $row4['product_price'] .'</td>
                                </tr>';
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        
    </script>
</body>
</html>
