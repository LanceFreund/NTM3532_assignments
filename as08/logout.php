<?php

  // Once the logout button is selected it calls this page to kill the connection and then direct the user to index.php
  // TODO New line: Start a session
  session_start();

  // TODO New line: destroy the session
  session_destroy();

  header('Location: index.php');

  exit;