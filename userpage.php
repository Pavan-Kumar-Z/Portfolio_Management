

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userpages.css">
    <title>UserPages</title>
</head>
<body>
<header>
    <div id = "container">
    <h3 class="name">Portfolio Management</h3>
    <a href = "portfolio.php" class = "tag1">PORTFOLIO</a>
    <a href = "Watchlist.php" class = "tag">WATCHLIST</a>
    <a href = "transaction.php" class = "tag">TRANSACTION</a>
    <a href = "page.php" class = "tag">LOGOUT</a>
    </div>
</header>
<div class="Portfolio-info">

<?php 
session_start();

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

// SQL query to select data from the portfolio table
$sql = "SELECT * FROM portfolio WHERE ID = '" . $_SESSION['Pan_no'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Portfolio_name"] . "<br>";
        //$_SESSION['portfolio_id'] = $row["Portfolio_Id"] ;
        echo "ID: " . $row["Portfolio_Id"] . "<br>";
        echo "<a href='addtoportfolio.php?portfolio_id=" . $row["Portfolio_Id"] . "' class='tag2'>Add Holding</a>";
        echo "<a href='viewportfolio.php?portfolio_id=" . $row["Portfolio_Id"] . "' class='tag3'>View Portfolio</a>";
        echo "<hr>"; // Separating each portfolio's information

    }
} else {
    echo "0 results";
}
$conn->close();
?>



</div>

</body>
</html>

