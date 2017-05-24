<!DOCTYPE html>
<?php
	session_start();

	define("USERNAME", "admin"); 
	define("PASSWORD", "testing"); 
	
	unset($_SESSION['admin']);
	
	if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		if(USERNAME == $_POST['username'] && PASSWORD == $_POST['password']) {
			$_SESSION['admin'] = "admin";
			echo "you logged in";
			header("Location: panel.php");
		}
	}
?>

<html>
<head>
	<title>Admin panel</title>
	<style>
		body {
			text-align: center;
		}
		
		form div {
			display: block;
			margin: 4px auto;
		}
	</style>
</head>
<body>
	<form action="" method="POST" autocomplete="off">
		<div><label for="username">Username: </label><br/><input type="text" id="username" name="username" value="admin"></div>
		<div><label for="password">Password:</label><br/><input type="password" id="password" name="password" value="testing"></div>
		<div><input type="submit" name="submit" value="submit"></div>
	</form>
</body>
