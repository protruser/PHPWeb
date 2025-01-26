<?php
  require_once('DB.php');

  $idx = $_GET['no'];
  
  $query = "SELECT * FROM bulletin WHERE idx = '$idx'";
  $result = mysqli_query(DB(), $query);

  $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['title']?></title>
  <link rel="stylesheet" href="css/bulletinview.css">
</head>

<body>
  <div class="content">
    <div class="header">
      <div class="nav">
        <div>
          <a href="index.php"><img class="home" src="img/home42.png"></a>
        </div>
        <a href="logout.php" class="nav-menu">Logout</a>
      </div>
    </div>
  </div>

  <div class="body">
    <h1>ITM Community</h1>
    <table class="bulletin">
      <div>
        <tr class="title">
          <th width="100">Title</th>
          <td>
            <?php echo $row['title']?>
          </td>
        </tr>
        <tr>
          <th width="100">Writer</th>
          <td>
            <?php echo $row['user'] ?>
          </td>
        </tr>
        <tr>
          <th width="100">Content</th>
          <td>
            <?php echo $row['content']?>
          </td>
        </tr>
      </div>
    </table>
    <div class="function">
      <form method="get" action="bulletin_edit.php" class="function-button">
        <input type="hidden" name="find" value=<?php echo $idx?>>
        <input type="hidden" name="writer" value="<?php echo $row['user']?>">
        <button type="submit">Edit</button>
      </form>
      <form method="get" action="bulletin_delete.php" class="function-button">
        <input type="hidden" name="find" value=<?php echo $idx?>>
        <input type="hidden" name="writer" value="<?php echo $row['user']?>">
        <button type="submit">Delete</button>
      </form>
      <div>
        <a href="bulletin_page.php" class="function-link"><button class="toList">Bulletin List</button></a>
      </div>
    </div>
  </div>
</body>

</html>