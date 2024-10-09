<?php 

  session_start();     
print_r($_SESSION);

    if (isset($_SESSION['user_id']) ) {
      // If logged in, show Log Out link
      session_destroy(); 

      // Redirect to the login page
      header("Location: homePage.php"); // Replace with the path to your login form
      exit;
      
    }
?>



<!-- <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
   
    <style>
     
    </style>
</head>
<body>


  <form action="loginn.php" method="POST">
        <button type="submit">Logout</button>
    </form>
    
</body>
</html>  -->