<!-- as08 index page -->
<?php
  // TODO New line: Start a session
  session_start();

  // The if statement below ensures that there is a username and password present befor loading customers.php
  if( isset($_SESSION['username']) && isset($_SESSION['password'])){
    header('Location: customers.php');
  }

?>

<!-- HTML FORM to login with passing username and password into the $_POST array-->
<!DOCTYPE html>
<html>
<head>
  <title>Customer Admin</title>
</head>
<body>
  <div id='content'>
    <form method='post' action='login.php'>
      <p>Username: <input type='text' name='username' id='username'></p>
      <p>Password: <input type='password' name='password' id='password'></p>
      <p><input type='submit' name='login' value='Login'></p>
    </form>
  </div>
</body>
</html>