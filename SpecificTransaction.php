<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUERIES</title>
    <link rel="stylesheet" href="SpecificTransaction.css">
</head>
<body>
<header>
    <div id="container">
        <h3 class="name">Portfolio Management</h3>
        <a href="page.php" class="tag">LOGOUT</a>
    </div>
</header>
<form method="post" action="">
    <label for="date1">Enter Start Date:</label>
    <input type="date" id="date1" name="date1">

    <label for="date2">Enter End Date:</label>
    <input type="date" id="date2" name="date2">

    <input type="submit" value="Submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolio_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users INNER JOIN transactions ON users.Pan_No = transactions.ID AND transactions.dates BETWEEN '$date1' AND '$date2'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["first_name"] . "<br>";
            echo "" . $row["Phone_no"] . "<br>";
        }
        echo "<hr>";
    } else {
        echo "No results";
    }

    $conn->close();
}
?>
</body>
</html>
