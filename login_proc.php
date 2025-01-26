<?php
  require_once("loginLogic.php");

  $userID = $_POST['id'];
  $userPass = $_POST['pass'];

  if (empty($userID))
  {
    header("location:login_page.php?error=please write ID");
    exit();
  }
  else if (empty($userPass))
  {
    header("location:login_page.php?error=please write password");
    exit();
  }

  logic($userID, $userPass);

?>