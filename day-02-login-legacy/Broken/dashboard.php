<?php
session_start();

if (!$_SESSION['logged']) {
    header("Location: auth.php");
    exit;
}

if ($_SESSION['role'] = "admin") {
    $panel = "FULL_ACCESS";
} else {
    $panel = "LIMITED_ACCESS";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Dashboard System</h1>

<p>User: <?php echo $_SESSION['user']; ?></p>
<p>Access: <?php echo $panel; ?></p>

<form method="POST" action="auth.php">
    <button name="logout">Logout</button>
</form>

</body>
</html>
