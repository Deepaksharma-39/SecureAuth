<!-- Login logic -->
<?php
session_start();
include "db_conn.php";

// Check for empty fields
if (empty($_POST['username']) || empty($_POST['password'])) {
    header("location: login.php?error=username and password required");
}

function validate($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$username=validate($_POST['username']);
$password=validate($_POST['password']);

// Get the user from the database
$username = $_POST['username'];
$password = $_POST['password'];

echo "Username: $username<br>";
echo "Password: $password<br>";

$stmt = $con->prepare('SELECT id, username, password FROM users WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    // authentication successful
    // set session variables, redirect to protected page, etc.
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: home.php");
} else {
    // authentication failed
    // redirect to login page with error message, etc.
    if (!$user) {
        echo "Invalid username";
    } else {
        echo "Incorrect password";
    }
}

$stmt->close();
