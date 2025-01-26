<?php
  session_start();
  require_once('DB.php');

  if (!isset($_SESSION['user_data'])) {
    echo "<script>alert('로그인이 필요합니다')</script>";
    header('login_page.php');
    exit();
  } else {
    $user_data = $_SESSION['user_data'];
    $writer = $user_data['nick'];
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bulletinwrite.css">
  <title>Writing</title>
</head>


<body>
  <div class="header">
    <div class="nav">
      <div>
        <a href="index.php"><img class="home" src="img/home42.png"></a>
      </div>
      <a href="logout.php" class="nav-menu">Logout</a>
    </div>
  </div>

  <div class="content">
    <h1>Writing</h1>
    <table class="content-writeup">
      <form method="post" action="">
        <tr>
          <th>Title</th>
          <td>
            <input name="title">
          </td>
        </tr>
        <tr>
          <th>Writer</th>
          <td>
            <?php echo $writer ?>
          </td>
        </tr>
        <tr>
          <th>Content</th>
          <td>
            <textarea name="content" rows="15" cols="50"></textarea><br>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <button type="submit">Submit</button>
          </td>
          <td>
            <a href="bulletin_page.php">Cancel</a>
          </td>
        </tr>
      </form>
    </table>
  </div>
</body>

</html>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['title'])) {
      echo "<script>alert('Please write title')</script>";
      header('bulletin_write.php');
      exit();
    }
    else if (empty($_POST['content'])) {
      echo "<script>alert('please write content')</script>";
      header('bulletin_write.php');
      exit();
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    if ($_GET['edit']) {
      $idx = $_GET['edit'];

      $query = "UPDATE bulletin SET title='$title', content='$content' where idx='$idx'";
    } else {
      $query = "INSERT INTO bulletin VALUES(NULL, '$writer', '$title', '$content', '', '$date')";
    }
    
    mysqli_query(DB(), $query);

    mysqli_close(DB());
    
    echo "<script>window.location.href = 'bulletin_page.php';</script>";
    exit();
  }
?>