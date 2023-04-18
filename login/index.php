<!-- here users will enter login data -->

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form action="login.php" method="post">
    <h2>Login</h2>
    <?php if(isset($_GET['error'])){?>

        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php  } ?>
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="User name">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
    <p>Don't have an account? <a href="register.html">Register here</a>.</p>
</form>

</body>
</html>