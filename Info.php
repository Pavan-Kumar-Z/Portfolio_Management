<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holding Information</title>
    <link rel="stylesheet" href="userpages.css">
</head>
<body>
<header>
    <div id = "container">
    <h3 class="name">Portfolio Management</h3>
    <a href = "Getinfo.php" class = "tag1">GET INFO</a>

    </div>
</header>
    <div class="holding-Info">
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "ID: " . $row["Pan_No"] . "<br>";
        echo "Name: " . $row["first_name"] . "<br>";
        echo "PhNO: " . $row["Phone_no"] . "<br>";
        echo "<hr>"; 
    }
} else {
    echo "No results";
}

// Close connection
$conn->close();
?>

    </div>
</body>
</html>
