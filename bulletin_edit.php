<?php
  require_once('DB.php');

  session_start();

  $no = $_GET['find'];
  $writer = $_GET['writer'];

  if ($_SESSION['user_data']['nick'] != $_GET['writer']) {
    echo "<script>alert('No Authority!');";
    echo "window.location.href = 'bulletin_view.php?no=$no';</script>";
    exit();
  } else {
    header("location:bulletin_write.php?edit=$no");
  }
  
?>