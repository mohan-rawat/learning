<?php
session_start(); 
include('./dbconn.php');

if (isset($_SESSION['user_id']) ){
   
  // Destroy the session
  session_destroy();
  exit;
}

$password = $_POST['password'];
$email = $_POST['email'];
$fetch_sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

$result = $conn->query($fetch_sql);

if ($result->num_rows > 0) {
    // Output data of the row
    while($row = $result->fetch_assoc()) {
        if($row['email'] == $email && $row['password'] == $password ){
          $_SESSION['loggedin'] = true;            // Indicate the user is logged in
          $_SESSION['user_id'] = $row['id'];       // Store user's ID
          $_SESSION['user_email'] = $row['email']; // Store user's email
          $_SESSION['user_name'] = $row['name'];
         echo"<script>
          
         window.location.href = './homePage.php';
                  
          </script>";
        } 
       
    }
} else {
  echo"<script>
          alert('no records found');
    window.location.href = './logInForm.php';
   </script>";
}




?>