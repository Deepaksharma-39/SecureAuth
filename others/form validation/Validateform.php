<?php
// define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // check if name field is empty
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  // check if email field is empty
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if email address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  // check if message field is empty
  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
}

// sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name">
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Message: <textarea name="message" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $messageErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
