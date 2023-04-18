<?php
    include "config.php";
    

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $last_name=$_POST['lastname'];
        $email=$_POST['email'];
        $password= $_POST['password'];
        $gender=$_POST['gender'];
    
    
    $sql = "INSERT INTO `users` (`name`, `lastname`, `email`, `password`, `gender`) VALUES ('$name', '$last_name', '$email', '$password', '$gender')";    $result=$conn->query($sql);
    
    if($result==TRUE){
        echo "new Record created successfully";
    }
    else{
        echo "error:failed". $sql ."<br/>". $conn->error;
    }
}
    
    ?>


<!DOCTYPE html>
<head>
    <title>Create</title>
</head>
<body>
    
<h2> Signup Form</h2>
<form action="" method="post">
<fieldset>
    <legend>Personal Information</legend>
    First Name :<br/>
    <input type="text" name="name">
    <br/>
    Last Name :<br/>
    <input type="text" name="lastname">
    <br/>
    Email :<br/>
    <input type="text" name="email">
    <br/>
    Password :<br/>
    <input type="text" name="password">
    <br/>
    Gender :<br/>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br/><br/>

    <input type="submit" name="submit" value="submit"
</fieldset>


</form>
</body>
</html>