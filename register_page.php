<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/login.css">
  <title>Register</title>
</head>

<body>
  <form method="post" action="register_proc.php">
    <h2>Sign Up</h2>
    <?php if (isset($_GET['error'])) { ?>
    <?php echo $_GET['error'] ?>
    <?php } ?>
    <label>ID</label>
    <input id="box" type="text" name="id" placeholder="ID" />
    <label>Nickname</label>
    <input id="box" type="text" name="nick" placeholder="Nickname">
    <label>Password</label>
    <input id="box" type="password" name="pass" placeholder="Password" />
    <label>Password Check</label>
    <input id="box" type="password" name="password" placeholder="PasswordCheck" />
    <label>Email</label>
    <input id="box" type="text" name="email" placeholder="Email">
    <label class="login_button"><button type="submit">Register</button></label>
  </form>
</body>

</html>