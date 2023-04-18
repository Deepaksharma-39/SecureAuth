<!-- Login logic -->
<?php
session_start();
include "db_conn.php";

// Check for empty fields
if (empty($_POST['username']) || empty($_POST['password'])) {
    header("location: index.php?error=username and password required");
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
$stmt = $con->prepare('SELECT id, username, password FROM users WHERE username = ?');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
echo $user;
$stmt->close();

// Verify the password
if ($user && password_verify($_POST['password'], $user['password'])) {
    // Authentication succeeded, set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: home.php');
} else {
    // Authentication failed, show error message
    header("Location: index.php?error=Incorrect username or password");
    exit();
}

// Close the database connection
$con->close();
?>
 




session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])){
    


}

function validate($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$username=validate($_POST['username']);
$password=validate($_POST['password']);

if(empty($username)){
    header("location: index.php?error=username is required");
    exit();
}
else if(empty($password)){
    header("location: index.php?error=password required");
    exit();
}

$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    if($row['username']===$username && $row['password']===$password){
        echo "logged IN";
        $_SESSION['username']=$row['username'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        header("Location: home.php");
        exit();
    }
    else{
        header("Location: index.php");
    }
}
else{
   
    header("Location: index.php?error=Incorrect username or password");
    exit();
}



?>