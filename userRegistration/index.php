<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="register">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <?php
            if (isset($_GET['error']) && !empty(trim($_GET['error']))) {
                $error = htmlspecialchars($_GET['error']);
                echo '<p class="error">' . $error . '</p>';
            }
            ?>

            <label for="username"></label>
            <input type="text" name="username" placeholder="username" id="username" required>
            <label for="password"></label>
            <input type="password" name="password" placeholder="password" id="password" required>
            <input type="submit" value="Register">
            <p>already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>