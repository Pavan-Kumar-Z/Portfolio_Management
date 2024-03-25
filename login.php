<?php
// Start session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted and if it's a login request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];
        
        // Check if it's an admin login
        if(isset($_POST['check'])) {
            $sql = "SELECT * FROM admin WHERE username = '$email' AND password = '$password'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Admin login successful
                $_SESSION['Pan_no'] = $email; // Set Pan_no session variable
                //header("Location: userpage.php");
                header("Location: admin.php");

                exit; // Terminate script after redirection
            } else {
                // Admin login failed
                echo "Admin login failed. Invalid credentials.";
            }
        } else { // Regular user login
            $sql = "SELECT * FROM users WHERE Pan_No = '$email' AND password = '$password'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // User login successful
                $_SESSION['Pan_no'] = $email; // Set Pan_no session variable
                header("Location: userpage.php");
                exit; // Terminate script after redirection
            } else {
                // User login failed
                echo "User login failed. Invalid credentials.";
            }
        }
    }
}

// Close connection
$conn->close();
?>
