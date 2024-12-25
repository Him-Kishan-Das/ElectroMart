<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <style>
        <?php
            include './styles/signup.css';

        ?>
    </style>
</head>
<body>
<div class="signup-container">
        <h2>Create an Account</h2>

        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                include './Components/dbconnect.php';
                $username = $_POST['username'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmpassword'];
                $gender = $_POST['gender'];
                
                $alreadyExistUsername = "SELECT * FROM `users` WHERE username='$username'";
                $result = mysqli_query($conn, $alreadyExistUsername);
                $rowsForUsername = mysqli_num_rows($result);

                $alreadyExistEmail = "SELECT * FROM `users` WHERE email = '$email'";
                $result1 = mysqli_query($conn, $alreadyExistEmail);
                $rowsForEmail = mysqli_num_rows($result1);

                if ($rowsForUsername>0){
                    echo "Username already exist";
                }
                
                if($rowsForEmail > 0){
                    echo "Email already exist";
                }

                if($password == $confirmPassword){
                    $finalPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users`(`username`, `name`, `email`, `gender`, `password`, `timestamp`) VALUES ('$username','$name','$email','$gender', '$finalPassword', current_timestamp())";
                    $result2 = mysqli_query($conn, $sql);
                    if($result2){
                        echo 'Signup Successfull!!';
                    }
                    else{
                        echo "Signup Failes!!!";
                    }
                }

            }

        ?>
        <form action="<?php  $_SERVER['REQUEST_URI'] ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="confirmpassword" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" class="signup-button">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
</body>
</html>