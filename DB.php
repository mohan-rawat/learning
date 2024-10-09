 <?php

// session_start();
// include('./dbconn.php');

// if (isset($_SESSION['user_id']) ) {
//   // If logged in, show Log Out link
//   session_destroy(); 

//   // Redirect to the login page
//   header("Location: homePage.php"); 
//   exit;
  
// }

// $name = $_POST['name'];
// $password = $_POST['password'];
// $email = $_POST['email'];

// $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

// if ($conn->query($sql) === TRUE) {
//   // Fetch the user details after successful insertion to log them in
//   $fetch_sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
//   $result = $conn->query($fetch_sql);

//   if ($result->num_rows > 0) {
//       // Fetch the user data
//       while ($row = $result->fetch_assoc()) {
//           // Validate the email and password, then start the session
//           if ($row['email'] == $email && $row['password'] == $password) {
//               $_SESSION['loggedin'] = true;            // Indicate the user is logged in
//               $_SESSION['user_id'] = $row['id'];       // Store user's ID
//               $_SESSION['user_email'] = $row['email']; // Store user's email
//               $_SESSION['user_name'] = $row['name'];   // Store user's name

//               // Redirect to home page or user dashboard
//               echo "<script> 
//                       window.location.href = './homePage.php'; 
          
                  
//                     </script>";
//           }
//       }
//   } else {
//       // If the user is not found
//       echo "Error logging in user.";
//   }
  
// } else {
//   // If there is an error during the insert operation
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


session_start();
include('./dbconn.php'); // This includes the database connection

// If a user is already logged in, log them out
if (isset($_SESSION['user_id'])) {
    session_destroy(); 
    // Redirect to the home page
    header("Location: homePage.php");
    exit;
}

// Get user input
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];

// Prepare and execute the query to check if the email already exists
$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email already exists
    echo json_encode(['status' => 'error', 'message' => 'Email already exists, please choose another email.']);
    exit; // Stop further execution
}

// Email does not exist, proceed to insert new user
$sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    // Fetch the user details after successful insertion to log them in
    $fetch_sql = "SELECT * FROM user WHERE email = ? AND password = ?";
    $fetch_stmt = $conn->prepare($fetch_sql);
    $fetch_stmt->bind_param("ss", $email, $password);
    $fetch_stmt->execute();
    $fetch_result = $fetch_stmt->get_result();

    if ($fetch_result->num_rows > 0) {
        // Fetch the user data
        $row = $fetch_result->fetch_assoc();
        
        // Start the session and store user details
        $_SESSION['loggedin'] = true;            // Indicate the user is logged in
        $_SESSION['user_id'] = $row['id'];       // Store user's ID
        $_SESSION['user_email'] = $row['email']; // Store user's email
        $_SESSION['user_name'] = $row['name'];   // Store user's name

        // Return success response
        echo json_encode(['status' => 'success', 'message' => 'Signup successful!']);
    } else {
        // If the user is not found
        echo json_encode(['status' => 'error', 'message' => 'Error logging in user.']);
    }
} else {
    // If there is an error during the insert operation
    echo json_encode(['status' => 'error', 'message' => 'Error inserting user: ' . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();


?> 