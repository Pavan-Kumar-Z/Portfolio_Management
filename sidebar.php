<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>
    <link rel="stylesheet" type="text/css" href="sidebar.css">
</head>
<body>

<div class="sidebar" id="sidebar">
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
    <span class="close-btn" onclick="closeSidebar()">&#10005;</span>
</div>

<div id="main">
    <button onclick="openSidebar()">Open Sidebar</button>
</div>

<script src="sidebar.js"></script>

</body>
</html>
