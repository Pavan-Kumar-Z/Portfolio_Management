<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="port.css">
    
    <title>Create New Portfolio</title>
</head>
<body>

<h2>Create New Portfolio</h2>

<form action="portfoliodb.php" method="POST">
    <label for="name">Portfolio Name:</label><br>
    <input type="text" id="name" name="name"><br><br>
    <label for="id">ID:</label><br>
    <input type="text" id="id" name="id"><br><br>
    <input type="submit" value="Create Portfolio">

</form>

</body>
</html>
