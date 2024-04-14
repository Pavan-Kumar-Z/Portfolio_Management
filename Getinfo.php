<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Getinfo.css">
    <title>Getinfo</title>
</head>

<body>
    <div id="container">
        <h3 class="name">Portfolio Management</h3>
        <form action="GetInfo.php" method="POST">
            <input type="text" id="ID" name="ID" required><br>
            <input type="submit" value="GetInfo" name="GetInfo">
        </form>
    </div>
    <?php
    session_start();

    // Check if form is submitted
    if (isset($_POST['GetInfo'])) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "portfolio_db";


        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $pan_no = $_POST['ID'];

        $user_sql = "SELECT * FROM users WHERE Pan_No = '$pan_no'";
        $user_result = $conn->query($user_sql);

        if ($user_result->num_rows > 0) {
            $user_row = $user_result->fetch_assoc();

            $portfolio_sql = "SELECT * FROM portfolio WHERE ID = '$pan_no'";
            $portfolio_result = $conn->query($portfolio_sql);

            if ($portfolio_result->num_rows > 0) {
                echo '<div class="portfolio-info">';
                while ($portfolio_row = $portfolio_result->fetch_assoc()) {
                    echo "Portfolio ID: " . $portfolio_row['Portfolio_Id'] . "<br>";
                    echo "Portfolio Name: " . $portfolio_row['Portfolio_name'] . "<br>";
                    echo "<a href='viewuser.php?Portfolio_Id=" . $portfolio_row["Portfolio_Id"] . "&ID=" . $pan_no . "' class='tag1'>View</a><hr>";

                    echo "<hr>";
                }
                echo '</div>';
            } else {
                echo "No portfolio information found.";
            }
        } else {
            echo "No user found with the provided ID";
        }

        // Close connection
        $conn->close();
    }
    ?>

</body>

</html>