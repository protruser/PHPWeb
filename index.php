<?php
  session_start();
  
  if (!isset($_SESSION['user_data'])) {
    echo "<script>alert('Go to Login Page')</script>";
    header("location:login_page.php");
    exit();
  } else {
    $user = $_SESSION['user_data'];
    $_SESSION['user'] = $user;
    echo "<script>window.location.href='bulletin_page.php';</script>";
  }
?>