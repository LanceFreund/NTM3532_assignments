<?php
	require_once 'config.php';

	function connect() {
		// TODO Add to Existing: Fill in the arguments for the @mysqli_connect function
		$dbc = new mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect. ' . mysqli_connection_error());
		return $dbc;
	}

	function findPage($id) {
		$dbc = connect();
		$result = mysqli_query($dbc, "SELECT id FROM pages");

		$ids = array();
		while ($row = mysqli_fetch_array($result)) {
			array_push($ids, $row['id']);
		}
		$found = in_array($id, $ids);
		return $found;
	}

	function getPageId() {
		$dbc = connect();
		$query = "SELECT value FROM settings WHERE name='homePage'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);

		return $row['value'];
	}

	function title() {
		$dbc = connect();
		if ($_GET['id']) {
			$pageId = (int) $_GET['id'];
			$query = "SELECT title FROM pages WHERE id='$pageId' LIMIT 1";
		} else {
			$query = "SELECT value FROM settings WHERE name='homeTitle' LIMIT 1";
		}

		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);

		return $row[0];
	}

	function pageDetails($detail) {
		$dbc = connect();

		if ($_GET['id']) {
			$pageId = (int) $_GET['id'];
		} else {
			$pageId = getPageId();
		}

		$query = "SELECT $detail FROM pages WHERE id='$pageId' LIMIT 1";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		return $row[$detail];
	}

	function listPages() {
		$dbc = connect();
		$homeId = getPageId();

		$query = "SELECT title FROM pages WHERE id='$homeId'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		$homeTitle = $row['title'];

		echo "<li><a href='" . BASE_URL . "/index.php'>$homeTitle</a></li>";

		// TODO Add to Existing: Between the quotes in the line below write a select statement that retrieves the id and title from the pages table
		$query = "SELECT id, title FROM pages";
		$result = mysqli_query($dbc, $query);

		while ($row = mysqli_fetch_array($result)) {
			if ($row['id'] != $homeId) {
				$pageId = $row['id'];
				$pageTitle = $row['title'];
				echo "<li><a href='" . BASE_URL . "/index.php?id=$pageId'>$pageTitle</a></li>";
			}
		}
	}

	function displayAdmin() {
		$dbc = connect();
		$homeId = getPageId();

		// TODO Add to Existing: Between the quotes in the line below write a select statement that retrieves the id, title and date from the pages table
		$query = "SELECT id, title, date FROM pages";
		$result = mysqli_query($dbc, $query);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['id'];
			$title = $row['title'];
			$date = date('M d, Y', $row['date']);
			$hp = '';

			if ($id == $homeId) {
				$hp = '<strong> (Home Page)</strong>';
			}

			echo "<tr><td>$id</td><td><a href='". BASE_URL . "/index.php?id=$id'>$title</a>$hp</td>";
			echo "<td>$date</td>";
			echo "<td><a href='update.php?id=$id'>Edit</a> ";
			echo "<a href='delete_confirm.php?id=$id'>Delete</a> ";
			echo "<a href='set_home.php?id=$id'>Set as Home</a></td>";
		}

	}

	function verifyUser($name, $pass) {
		$dbc = connect();
		$username = mysqli_real_escape_string($dbc, $name);
		$password = mysqli_real_escape_string($dbc, $pass);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$result = mysqli_query($dbc, $query);

		if (mysqli_fetch_array($result)) {
			return true;
		} else {
			return false;
		}
	}

	function validateUser($name, $pass) {
		$check = verifyUser($name, md5($pass));

		if ($check) {
			$_SESSION['status'] = 'authorized';

			header('location: index.php');
		} else {
			return 'Please enter a correct username and password';
		}
	}

	function logout() {
		if (isset($_SESSION['status'])) {
			unset($_SESSION['status']);

			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
			}
		}
	}

	function checkMember() {
		session_start();

		if($_SESSION['status'] != 'authorized') {
			header('location: login.php');
		}
	}

	function redirect($message, $page=FALSE) {
		$my_get = array();
		$_GET['message'] = set_session_message($message);

		foreach ($_GET as $n=>$v) {
			$my_get[] = "{$n}={$v}";
		}

		if (count($my_get) > 0) {
			$my_get = '?'.implode('&',$my_get);
		} else {
			$my_get = '';
		}

		if (is_string($page)) {
			$location = '/final' . $page;
		} else {
			$location = $_SERVER['SCRIPT_NAME'];
		}

		$http = (!isset($_SERVER['HTTPS']) || strtolower($_SERVER['HTTPS'])!='on')?'http':'https';

		header("Location: {$http}://{$_SERVER['HTTP_HOST']}{$location}{$my_get}");
		exit;
	}

	function set_session_message($message) {
		$message_id = sha1(microtime(true));
		$_SESSION[$message_id] = $message;

		return $message_id;
	}