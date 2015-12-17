<?php

  /*The code below ensures that when username & password are submitted to the $_POST array 
    The $_SESSION ensures that username = 'admin' and password = 'password' before it will load customers.php
    and redirects to the index page if the condition fails. */
  if( $_POST['username'] == 'admin' && $_POST['password'] == 'password' ) {
    session_start();
    // TODO New line: Set  $_SESSION['username'] equal to 'admin'
    $_SESSION['username'] = 'admin';
    // TODO New line: Set  $_SESSION['password'] equal to 'password'
    $_SESSION['password'] = 'password';
    header('Location: customers.php');
  } else {
    header('Location: index.php');
  }

?>