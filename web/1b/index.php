<!DOCTYPE HTML>  
<html>
<head>
<style>
  .error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $telErr = "";
$name = $email = $tel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["tel"])) {
    $telErr = "Number is required";
  } else {
    $tel = $_POST["tel"];
    if (!preg_match("/^[0-9' ]*$/",$tel)) {
      $telErr = "Only numbers allowed";
    }
  }
}

?>

<p><span class="error">* required field</span></p>
<form method="post" action="">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Number: <input type="text" name="tel">
  <span class="error">* <?php echo $telErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $tel;
?>

</body>
</html>