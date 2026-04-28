<?php
session_start();

if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = false;
}

$status = $_SESSION['status'];

if (isset($_GET['toggle'])) {
    if ($status = true) {
        $status = false;
    } else {
        $status = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Toggle</title>

    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            text-align: center;
            margin-top: 100px;
        }

        .box {
            display: inline-block;
            padding: 20px;
            background: white;
            border-radius: 10px;
        }

        .on {
            color: green;
        }

        .off {
            color: red;
        }
    </style>
</head>

<body>

<div class="box">
    <h1 class="<?php echo $status ? 'on' : 'off' ?>">
        <?php echo $status ? "ON" : "OFF" ?>
    </h1>

    <a href="?toggle=1">
        <button>Alternar</button>
    </a>
</div>

</body>
</html>
