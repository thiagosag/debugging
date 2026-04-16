<?php
	session_start();

		$users = [
			 "admin" => ["password" => "1234", "role" => "admin"],
			 "dev" => ["password" => "dev", "role" => "user"]
		];

	if($_SERVER['REQUEST_METHOD'] === 'POST') {

		 if (isset($_POST['logout'])) {
		     session_destroy();
		     header("Location: auth.php");
		     exit;
		 } else { 
				$user = $_POST['user'];
			 	$pass = $_POST['pass'];
		 }

		 if (isset($users[$user]) && $users[$user]['password'] === $pass){
		     $_SESSION['logged'] = true;
		     $_SESSION['user'] = $user;
		     $_SESSION['role'] = $users[$user]['role'];
		 } else {
		 ?> <p>Login invalído</p> <?php
		}
	}

	if (!empty($_SESSION['logged']) && $_SESSION['logged']=== true){
		 header("Location: dashboard.php");
		 exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<form method="post">
			<div>
			User: <input type="text" name="user">
			Senha: <input type="password" name="pass">
			<input type="submit" value="Entrar">
		</form>
	</body>
</html>
