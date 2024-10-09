<?php
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header {
            background-color: #4CAF50;
            /* Green background */
            color: white;
            /* White text */
            padding: 6px;
            /* Padding around the header */
        }

        .header-title {
            text-align: center;
            /* Center the title */
            margin: 0;
            /* Remove default margin */
        }

        nav {
            display: flex;
            /* Use Flexbox for the navigation */
            justify-content: center;
            /* Center the links */
            margin-top: 10px;
            /* Space above the navigation */
        }

        nav a {
            color: white;
            /* White text for links */
            margin: 0px 11px;
            /* Space between links */
            text-decoration: none;
            /* Remove underline */
        }

        nav .auth-links {
            margin-left: auto;
            /* Push the login and signup links to the right */
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                /* Stack links vertically on small screens */
                align-items: center;
                /* Center items */
            }

            nav a {
                margin: 10px 0;
                /* Space between stacked links */
            }
        }

        .hero {

            background-size: cover;
            /* Cover the entire hero section */
            background-position: center;
            /* Center the background image */
            color: white;
            /* Text color */
            display: flex;
            /* Flexbox layout */
            flex-direction: column;
            /* Stack items vertically */
            justify-content: center;
            /* Center items vertically */
            align-items: center;
            /* Center items horizontally */
            height: 600px;
            /* Fixed height for the hero section */
            text-align: center;
            /* Center text */
            padding: 20px;
            /* Padding around the hero section */
        }

        .hero h1 {
            font-size: 48px;
            /* Heading font size */
            margin: 0;
            /* Remove default margin */
        }

        .hero p {
            font-size: 24px;
            /* Description font size */
            margin: 10px 0;
            /* Margin above and below description */
        }

        

       .cta-button:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }

        .cta-button {
            display: block;
            width: 152px;
            margin: auto;
            background-color: #4CAF50;
            /* Button background color */
            color: white;
            /* Button text color */
            padding: 15px 30px;
            /* Padding for button */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            text-decoration: none;
            /* Remove underline */
            font-size: 18px;
            /* Button font size */
            transition: background-color 0.3s;
            /* Transition effect */
            margin-bottom: 180px;

        }

        .image-container {
            display: block;
            /* Make the image container block-level */
            text-align: center;
            /* Center the image */
            margin-top: 10px;
            /* Add some space above the image */
        }

        .image-container {
            display: block;
            position: absolute;
            text-align: center;
            margin-top: 10px;
            top: 100px;
            overflow: hidden;
            /* Prevent overflow */

        }

        .image-container img {
            object-fit: cover;
            /* Ensures the image fills the container while maintaining aspect ratio */
            object-position: center;
            /* Center the image */
            clip-path: inset(0px 0px 312px 0px);  /* Crop from bottom */
        }

        .centertext {
            position: absolute;
            z-index: 5;
        }

        .profile{
            margin: -10px;
            margin-right: 0px;
        }


        footer {
    background-color: #4CAF50;
    color: white;
    
    text-align: center;
    

   }

   .footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding-top: 10px;
   }


   .footer-section {
    flex: 1;
    margin: 10px;
    min-width: 200px;
   }

    .footer-section h2 {
    margin-bottom: 0px;
    font-size: 18px;
    color: #ecf0f1;
    }

    .footer-section p, .footer-section a {
    color: white;
    font-size: 14px;
    line-height: 1.6;
    padding:0 75px;
    }

   .footer-section a {
    display: block;
    margin: 5px 0;
    text-decoration: none;
   }

   .footer-section a:hover {
    color: #ecf0f1;
   }
/* 

   #userDetails{
             display: none;
             margin-top: 10px;
             background-color: #4CAF50;
             position: absolute;
             top: 101px;
             right: 100px;
             width: 193px; 
             text-align: center;
             height: 95px;
             z-index: 100;  
         } */
   #userDetails {
    display: none;
    margin-top: 10px;
    background-color: #4CAF50;
    position: absolute;
    top: 101px;
    right: 100px;
    width: 193px;
    text-align: center;
    height: 105px;
    z-index: 100;
    overflow-wrap: break-word;    
    white-space: normal;       
    overflow: hidden; 

}


</style>
</head>

<body>
    <header>
        <h1 style="text-align: center;">Welcome to My Website</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Services</a>
            <a href="/">Contact</a>
            <div class="auth-links">
            <?php
           // Check if the user is logged in
          if (isset($_SESSION['user_id']) ) {
            $username = $_SESSION['user_name'];
            $email = $_SESSION['user_email'];
            $firstLetter = strtoupper($username[0]);
            echo '<div class="profile">';
            // echo '<class="profile">';
            echo '<span class="profile-initial" style="
          
            background-color: #3498db;
            padding: 12px 15px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            line-height: 10px;
            border-radius: 50%;
            ">' . htmlspecialchars($firstLetter) . '</span>';
            
            echo '<a href="logout.php">Log Out</a>';
            echo '</div>';



              // Hidden user details
           echo '<div id="userDetails" style="display:none; margin-top: 10px;">';
           echo '<p><strong>Username:</strong> ' . htmlspecialchars($username) . '</p>';
           echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
        //    echo '<p><strong>Address:</strong> ' . htmlspecialchars($address) . '</p>';
           echo '</div>';
        } else {    
            echo '<a href="signUPForm.php">Sign Up</a>';
            echo '<a href="logInForm.php">Log In</a>';
        }
        
        ?>
   
            </div>
        </nav>
    </header>
    <section class="hero">
        <div class="image-container">
            <img src="https://plus.unsplash.com/premium_photo-1676496046182-356a6a0ed002?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        </div>
        <div class="centertext">
            <h1 style="color: #44bd44;">Welcome to Our Website</h1>
            <p>Your journey to success starts here.</p>
            <a href="signUPForm.php" class="cta-button" >Get Started</a>
        </div>
    </section>



    <footer>
    <div class="footer-container">
        <div class="footer-section about">
            <h2>About Us</h2>
            <p>We are a team of passionate developers building useful and efficient web applications. Our goal is to deliver top-notch services to help your business grow.</p>
        </div>
        
        <div class="footer-section contact">
            <h2>Contact Us</h2>
            <p>Email: info@example.com</p>
            <p>Phone: +123-456-7890</p>
            <p>Address: 123 Street, City, Country</p>
        </div>
        
        <div class="footer-section social">
            <h2>Follow Us</h2>
            <a href="#"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a>
        </div>
    </div>
    
</footer>

<script>


    function toggleDetails() {
        // Toggle the visibility of user details
        var details = document.getElementById('userDetails');
        if (details.style.display === 'none' || details.style.display === '') {
             details.style.display = 'block'; // Show the details
        } else {
            details.style.display = 'none'; // Hide the details
        }
    }



    document.addEventListener("DOMContentLoaded", () => {
    const profileInitials = document.getElementsByClassName('profile-initial');
                            if (profileInitials.length > 0) {
                                  profileInitials[0].addEventListener('mouseover', () => {
                                   toggleDetails(true);
        });

                         // Add event listener for mouseout to hide details
                             profileInitials[0].addEventListener('mouseout', () => {
                             toggleDetails(false); // Hide details on mouseout
         });
    }
});
    
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
};

</script>

</body>

</html>