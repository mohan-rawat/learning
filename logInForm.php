<?php
session_start();

// Check if the session already exists
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    // If the session exists, redirect the user to the dashboard or another page
    header("Location: homePage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            /* margin-bottom: 20px; */
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 93%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="login-container">
      <form action="./loginn.php" method="POST">
        <h2>Login</h2>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form> 
       <p style="display: inline-block; margin-right:10px;"> Register Here </p> <a href="./signUpForm.php" target="_blank" style="text-decoration: none;">Sign Up</a>
    </div>

<script>
        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };
</script>  
</body>
</html>

