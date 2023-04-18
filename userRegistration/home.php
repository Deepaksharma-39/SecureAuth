<!-- after logging user will be directed here -->

<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        
        <title>Home</title>
        <style>
            body {
                text-align: center;
                background-color: #f2f2f2;
                font-family: Arial, sans-serif;
            }
            h1 {
                color: #333;
                margin-top: 50px;
            }
            a {
                display: block;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        
    <h1>Hello, <?php echo $_SESSION['username'] ?></h1>
    <a href="logout.php">Logout</a>
    </body>
    </html>
    <?php
}else{
    echo "failed to create user session";
}

?>