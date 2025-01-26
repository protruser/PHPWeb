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
    $query = "DELETE FROM bulletin where idx='$no'";

    mysqli_query(DB(), $query);

    mysqli_close(DB());
    
    echo "<script>window.location.href = 'bulletin_page.php';</script>";
  }
  
?>