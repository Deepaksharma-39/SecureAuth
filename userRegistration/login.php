<!-- here users will enter login data -->

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
<form action="signinLogic.php" method="post">
    <h2>Login</h2>
     <?php
            if (isset($_GET['error']) && !empty(trim($_GET['error']))) {
                $error = htmlspecialchars($_GET['error']);
                echo '<p class="error">' . $error . '</p>';
            }
            ?>
            <?php
            if (isset($_GET['success']) && !empty(trim($_GET['success']))) {
                $success = htmlspecialchars($_GET['success']);
                echo '<p class="success">' . $success . '</p>';
            }
            ?>
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="User name">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</form>

</body>
</html>