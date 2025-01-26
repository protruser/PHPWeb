<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>

<body>
  <form method="post" action="login_proc.php">
    <h2>Login</h2>

    <?php if (isset($_GET['error'])){ ?>
    <p class="error"><?php echo $_GET['error'] ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])){ ?>
    <p class="success"><?php echo $_GET['success'] ?></p>
    <?php } ?>

    <label>ID</label>
    <input id="box" type="text" name="id" placeholder="ID" />
    <label>Password</label>
    <input id="box" type="password" name="pass" placeholder="Password" />
    <label class="login_button"><button type="submit">Login</button></label>
    <a href="register_page.php" class="register">Sign Up</a>
  </form>
</body>

</html>