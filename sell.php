<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holding Information</title>
    <link rel="stylesheet" href="viewtransaction.css">
</head>
<body>
    <div class="holding-info">
    <?php
session_start();

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

// SQL query to select data from the holding table
$sql = "SELECT * FROM transactions where ID = '" . $_SESSION['Pan_no'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Holding ID: " . $row["Holding_Id"] . "<br>";
        echo "Portfolio ID: " . $row["Portfolio_Id"] . "<br>";
        echo "Quantity: " . $row["quantity"] . "<br>";
        echo "Type: " . $row["Buysell"] . "<br>";
       
        echo "<hr>"; // Separating each holding's information
        echo "<form action='selldb.php' method='GET'>";
        echo "<input type='number' id='quantity' name='quantity' min='1' max='100'>";
        echo "<input type='hidden' name='holding_Id' value='" . $row["Holding_Id"] . "'>";
        echo "<input type='hidden' name='portfolio_id' value='" . $row["Portfolio_Id"]. "'>";
        echo "<input type='submit' value='Sell Holding' class='tag2'>";
        echo "</form>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

    </div>
</body>
</html>
