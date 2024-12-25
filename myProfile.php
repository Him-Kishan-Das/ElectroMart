<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
        }

        .header h1 {
            font-size: 24px;
        }

        .header img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .container {
            display: flex;
            margin: 20px;
        }

        .sidebar {
            width: 20%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .content {
            flex: 1;
            background: #fff;
            margin-left: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .profile-details {
            flex: 1;
            margin-left: 20px;
        }

        .items-section {
            margin-top: 30px;
        }

        .items-section h3 {
            margin-bottom: 10px;
        }

        .items-list {
            width: 100%;
            border-collapse: collapse;
        }

        .items-list th, .items-list td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .items-list th {
            background: #f4f4f4;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 4px rgba(76, 175, 80, 0.3);
        }

        .save-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .save-button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <?php 
        include './Components/Navbar.php';
    ?>

    <div class="container">
      

        <div class="content">
            <div class="profile-header">
                <div class="profile-details">
                    <h2>him_kishan_das01</h2>
                    <p>Him Kishan Das</p>
                </div>
                
                <!-- <img src="Components/icons/user-solid.svg" alt="Profile Avatar"> -->
            </div>

            <form id="profile-form" action="update_profile.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="johndoe" disabled>
                </div>
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="name" name="name" value="johndoe" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="johndoe@example.com" disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="password123" disabled>
                </div>
                <button type="button" class="save-button" onclick="enableEditing()">Edit Profile</button>
            </form>

            <div class="items-section">
                <h3>Items Bought</h3>
                <table class="items-list">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wireless Mouse</td>
                            <td>$25</td>
                        </tr>
                        <tr>
                            <td>Keyboard</td>
                            <td>$40</td>
                        </tr>
                        <tr>
                            <td>Monitor</td>
                            <td>$150</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function enableEditing() {
            const inputs = document.querySelectorAll('#profile-form input');
            inputs.forEach(input => input.disabled = false);
        }
    </script>
</body>
</html>
