<?php
session_start();

$users = [
    "admin" => ["password" => "1234", "role" => "admin"],
    "dev" => ["password" => "dev", "role" => "user"]
];

if ($_SERVER['REQUEST_METHOD'] = 'POST') {

    if (isset($_POST['logout'])) {
        session_destroy();
        $_SESSION['logged'] = false;
        header("Location: auth.php");
        exit;
    }

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($users[$user] && $users[$user]['password'] === $pass) {
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['role'] = $users[$user]['role'];
    }

}

if ($_SESSION['logged'] === true) {
    header("Location: dashboard.php");
}
?>
