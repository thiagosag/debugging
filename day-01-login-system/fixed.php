<?php
	session_start();

	$correctUser = "admin";
	$correctPass = "1234";

	if (isset($_POST['sair'])){
		$_SESSION = [];
		session_destroy();
		header("Location: fixed.php");
		exit;
	}

	if (isset($_POST['login'])){

		$user = $_POST['user'] ?? '';
		$pass = $_POST['pass'] ?? '';

		if ($user === $correctUser && $pass === $correctPass) {
		    $_SESSION['logged'] = true;
			header("Location: fixed.php");
			exit;
		} else {
			unset($_SESSION['logged']);
		    $error = "Usuário ou senha inválidos";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		
		<style>
		    body {
		        background: #f2f2f2;
		        font-family: Arial;
		    }

		    .container {
		        width: 300px;
		        margin: 100px auto;
		        background: white;
		        padding: 20px;
		        border-radius: 10px;
		    }

		    input {
		        width: 100%;
		        padding: 10px;
		        margin-bottom: 10px;
		        border: 1px solid #ccc;
		    }

		    button {
		        width: 100%;
		        padding: 10px;
		        background: blue;
		        color: white;
		        border: none;
		    }

		    .error {
		        color: red;
		    }
		</style>
	</head>

	<body>

		<div class="container">

			<h2>Login</h2>

			<?php if (!empty($error)): ?>
				<p class="error"><?php echo htmlspecialchars($error); ?></p>
			<?php endif; ?>

			<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) : ?>
				<h3>Bem-vindo!</h3>
				<form method="POST">
					<button type="submit" name="sair">Sair</button>
				</form>
			<?php else: ?>
				<form method="POST">
				    <input type="text" name="user" placeholder="Usuário">
				    <input type="password" name="pass" placeholder="Senha">
				    <button type="submit" name="login">Entrar</button>
				</form>
			<?php endif; ?>
		</div>
	</body>
</html>
