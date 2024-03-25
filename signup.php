<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $pan_number = $_POST['pan_number'];
    $password = $_POST['password'];


    $sql = "INSERT INTO users (first_name, middle_name, last_name, phone_number, pan_number, password)
    VALUES ('$first_name', '$middle_name', '$last_name', '$phone_number', '$pan_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>
