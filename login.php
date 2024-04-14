<?php
// Start session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];
        
        if(isset($_POST['check'])) {
            $sql = "SELECT * FROM admin WHERE username = '$email' AND password = '$password'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $_SESSION['Pan_no'] = $email; 
                header("Location: admin.php");

                exit; 
            } else {
                echo "Admin login failed. Invalid credentials.";
            }
        } else { 
            $sql = "SELECT * FROM users WHERE Pan_No = '$email' AND password = '$password'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $_SESSION['Pan_no'] = $email; 
                header("Location: userpage.php");
                exit; 
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
