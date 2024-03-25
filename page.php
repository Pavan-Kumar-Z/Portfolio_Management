<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortFolio Mangement</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>PortFolio Management</h1>
    </header>

    <div class="container">
        <h2>Login or Signup</h2>
        <form id="form_switch" action="#" method="GET">
            <input type="radio" id="login_radio" name="form_type" value="login" >
            <label for="login_radio">Login</label>
            <input type="radio" id="signup_radio" name="form_type" value="signup">
            <label for="signup_radio">Signup</label>
        </form>

        <div id="login_form">
            <h3>Login</h3>
            <form action="login.php" method="POST">
                <label for="login_email">Username:</label><br>
                <input type="text" id="login_email" name="login_email" required><br>
                <label for="login_password">Password:</label><br>
                <input type="password" id="login_password" name="login_password" required><br>
                <label class="checkbox-label">
                <input type="checkbox" class="check" name = "check" Not checked> Admin</label>
                <input type="submit" value="Login" name = "Login" >
                
            </form>

        </div>
        
        <div id="signup_form" style="display: none;">
            <h3>Signup</h3>
            <form action="signup.php" method="POST">
                <label for="first_name">First Name:</label><br>
                <input type="text" id="first_name" name="first_name" required><br>
                <label for="middle_name">Middle Name:</label><br>
                <input type="text" id="middle_name" name="middle_name"><br>
                <label for="last_name">Last Name:</label><br>
                <input type="text" id="last_name" name="last_name" required><br>
                <label for="phone_number">Phone Number:</label><br>
                <input type="tel" id="phone_number" name="phone_number" required><br>
                <label for="pan_number">PAN Number:</label><br>
                <input type="text" id="pan_number" name="pan_number" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Signup">
            </form>
        </div>
    </div>
    <script src="index.js" defer></script>

</body>
</html>
