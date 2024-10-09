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
    <title>Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        /* Responsive styling */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input, button {
                padding: 12px;
                font-size: 16px;
            }
        }
        #error-message {
            color: red;
            text-align: center;
            padding: 10px;
            display: none; /* Initially hidden */
        }
       
          
    </style>
</head>
<body>
    <div id="error-message"></div>

    <form action="DB.php" method="POST">
    <h2>Sign Up</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required minlength="6"><br><br>
        
        <button type="submit">Sign Up</button>
    
   </div>

     <script>
    window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
}; 

document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData();
            formData.append('email', document.getElementById('email').value);

            // Send the data to the server using fetch
            fetch('DB.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Convert response to JSON
            .then(data => {
                const errorMessage = document.getElementById('error-message');
                
                if (data.status === 'error') {
                    // Show the error message outside the form
                    errorMessage.innerText = data.message;
                    errorMessage.style.display = 'block';  // Show the error message
                } else {
                    errorMessage.style.display = 'none';  // Hide the error if email is not taken
                    alert('Signup successful!');
                }
            })
            .catch(error => console.error('Error:', error));
        });
   </script>
</body>
</html>
