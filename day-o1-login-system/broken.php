<?php
session_start();

$correctUser = "admin";
$correctPass = "1234";

if ($_SERVER['REQUEST_METHOD'] = 'POST') { // BUG 1

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user = $correctUser && $pass = $correctPass) { // BUG 2
        $_SESSION['logged'] = true;
    } else {
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
            margin-bottom: 10px
            border: 1px solid #ccc; /* BUG 3 */
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

    <?php if ($error): ?> <!-- BUG 4 -->
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($_SESSION['logged'] == true): ?> <!-- BUG 5 -->
        <h3>Bem-vindo!</h3>
    <?php else: ?>
        <form method="POST">
            <input type="text" name="user" placeholder="Usuário">
            <input type="password" name="pass" placeholder="Senha">
            <button type="submit">Entrar</button>
        </form>
    <?php endif; ?>

</div>

</body>
</html>
