<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bulletin.css">
  <title>Bulletin List</title>
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
    <h1>ITM Community</h1>
    <form class="board">
      <table>
        <thead>
          <tr>
            <th width="50">No</th>
            <th width="500">Title</th>
            <th width="120">Writer</th>
            <th width="120">Date</th>
          </tr>
        </thead>
        <?php
          require_once('DB.php');

          $posts_per_page = 10;
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

          $find = isset($_GET['find']) ? $_GET['find'] : '';

          $offset = ($current_page - 1) * $posts_per_page;

          if (!empty($find)) {
            $count_query = "SELECT COUNT(*) AS total_count FROM bulletin WHERE title LIKE '%$find%'";
          } else {
            $count_query = "SELECT COUNT(*) AS total_count FROM bulletin";
          }

          $count_result = mysqli_query(DB(), $count_query);
          $count_data = mysqli_fetch_assoc($count_result);
          $total_posts = $count_data['total_count'];

          $total_pages = ceil($total_posts / $posts_per_page);

          if (isset($find)) {
            $query = "SELECT * FROM bulletin WHERE title LIKE '%$find%' ORDER BY idx DESC LIMIT $offset, $posts_per_page";
          } else {
            $query = "SELECT * FROM bulletin ORDER BY idx DESC LIMIT $offset, $posts_per_page";
          }

          $result = mysqli_query(DB(), $query);

          while ($board = $result->fetch_array()) {
          ?>

        <tbody>
          <td width="50"><?php echo $board['idx'] ?></td>
          <td width="500"><a href="bulletin_view.php?no=<?php echo $board['idx']?>"
              class="title"><?php echo $board['title'] ?></a></td>
          <td width="120"><?php echo $board['user'] ?></td>
          <td width="50"><?php echo $board['date'] ?></td>
        </tbody>
        <?php }?>
      </table>
    </form>
    <form method="get" action="">
      <input name="find" placeholder="Title">
      <button>Find</button>
    </form>
    <div class="pagination">
      <?php

      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
          echo "<span>$i</span>";
        } else {
          echo "<a href='?page=$i&find=$find'>$i</a>";
        }
      }
      ?>
    </div>
    <div>
      <a href="bulletin_write.php"><button class="write">Writing</button></a>
    </div>
  </div>
</body>

</html>