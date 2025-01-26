<?php
// Connect DB
  require_once("registerLogic.php");

// Setting Post Value
  $register_ID = $_POST['id'];
  $register_Nickname = $_POST['nick'];
  $register_Password = $_POST['pass'];
  $register_PasswordCheck = $_POST['password'];
  $register_Email = $_POST['email'];

// Check Error
checkEmpty($register_ID, $register_Nickname, $register_Password, $register_PasswordCheck, $register_Email);

if ($register_Password != $register_PasswordCheck) {
  header("location:register_page.php?error=please check password");
  exit();
}

checkID($register_ID);
checkNick($register_Nickname);
checkEmail($register_Email);

// Parse to Hash Code
$hash_password = hash('sha256', $register_Password);

// Input into DB
$query = "INSERT INTO users VALUES ('$register_ID', '$hash_password', '$register_Nickname','$register_Email')";
mysqli_query(DB(), $query);

mysqli_close(DB());

header("location:login_page.php?success=Sign Up is Complete");
exit();

?>