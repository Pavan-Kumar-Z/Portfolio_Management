<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
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

    // Prepare data for insertion
    $type = $_POST['type'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $highest_price = $_POST['highest_price'];
    $price = $_POST['price'];
    $lot_size = isset($_POST['lot_size']) ? $_POST['lot_size'] : null;
    $premium_price = isset($_POST['premium_price']) ? $_POST['premium_price'] : null;
    $expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : null;

    // SQL query to insert data into the database
    $sql = "INSERT INTO holding (holding_Id, holding_name, holding_type, highest)
            VALUES ('$id', '$name', '$type', '$highest_price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    if ($lot_size == null) {
        $sql = "INSERT INTO stock (ID, Price)
            VALUES ('$id', '$price')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "INSERT INTO fo (ID,Lot_Size, Premium_Price, EXP_Date)
    VALUES ('$id', '$lot_size', '$premium_price', '$expiry_date')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    // Close connection
    $conn->close();
}
