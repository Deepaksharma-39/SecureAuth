<?php
session_start();
include "db_conn.php";

// validate the user data
function validate($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$username=validate($_POST['username']);
$password=validate($_POST['password']);

// Check for empty fields
// if (empty($_POST['username']) || empty($_POST['password'])) {
//     header("location: index.php?error=username and password required");
// }


if($stmt=$con->prepare('SELECT id, password FROM users where username = ?')){
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0){
        header("Location: index.php?error= username already Exists");
    }
    else{
        if($stmt=$con->prepare('INSERT INTO users (username,password) values (?,?)'))  {
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $stmt->bind_param('ss', $_POST['username'],$password);
            $stmt->execute();
            header("Location: login.php?success= Registration successful");
        }
        else{
             header("Location: index.php?error= Registration failed");
        }
    }
    $stmt->close();
    
}
else{
     header("Location: index.php?error= Registration failed");
}

$con->close();

?>