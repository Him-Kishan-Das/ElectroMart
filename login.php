<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 20px 6px rgb(12, 27, 110);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 4px rgba(37, 117, 252, 0.3);
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background: #2575fc;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-button:hover {
            background: #1d63d0;
        }

        .login-container p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container p a {
            color: #2575fc;
            text-decoration: none;
        }

        .login-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include './Components/dbconnect.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `users` WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            $checkNoUser = mysqli_num_rows($result);
            if($checkNoUser == 1){
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row['password'])){
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $row['username'];
                    // echo 'login sucessfull';
                    header("Location: /electromarts/");
                }
                else{
                    echo 'Login Failed! Incomplete Password';
                }
            }

        }

    ?>

    <div class="login-container">
        <h2>Login</h2>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>
