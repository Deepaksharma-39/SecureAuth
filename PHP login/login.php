<?php
session_start();

// Check for empty fields
if (empty($_POST['username']) || empty($_POST['password'])) {
    die('Empty Fields');
}

// Get the user from the database
$stmt = $con->prepare('SELECT id, username, password FROM users WHERE username = ?');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Verify the password
if ($user && password_verify($_POST['password'], $user['password'])) {
    // Authentication succeeded, set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: home.php');
} else {
    // Authentication failed, show error message
    die('Incorrect Username or Password');
}

// Close the database connection
$con->close();
?>
