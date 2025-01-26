<?php
  require_once("DB.php");

  function logic4($userID, $userPass) {
    session_start();

    $hash_pass = hash('sha256', $userPass);
    
    $query = "SELECT * FROM users WHERE id = '$userID' and pass = '$hash_pass'";
    
    $result = mysqli_query(DB(), $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 0)
    {
      header("location:login_page.php?error=please check ID or Password");
      exit();
    }
    else
    {
      $_SESSION['user_data'] = $row;
      
      mysqli_close(DB());
      header("location:index.php");
      exit();
    }
  }

  function logic3($userID, $userPass) {
    session_start();

    $hash_pass = hash('sha256', $userPass);
    
    // compare only userID
    $query = "SELECT * FROM users WHERE id = '$userID'";
    $result = mysqli_query(DB(),$query);
    $row = mysqli_fetch_array($result);

    // check if the password equals to input password
    if ($row['pass'] != $hash_pass) {
      header("location:login_page.php?error=please check password");
      exit();
    } else {
      $_SESSION['user_data'] = $row;
      
      mysqli_close(DB());
      header("location:index.php");
      exit();
    }
  }

function logic($userID, $userPass) {
    session_start();

    $hash_pass = hash('sha256', $userPass);

    $escape_userID = mysqli_real_escape_string(DB(), $userID);
    $escape_hash_pass = mysqli_real_escape_string(DB(), $hash_pass);
    
    $query = "SELECT * FROM users WHERE id = '$escape_userID' and pass = '$escape_hash_pass'";
    
    $result = mysqli_query(DB(), $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 0)
    {
      header("location:login_page.php?error=please check ID or Password");
      exit();
    }
    else
    {
      $_SESSION['user_data'] = $row;
      
      mysqli_close(DB());
      header("location:index.php");
      exit();
    }
  }


  ?>