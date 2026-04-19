<?php
session_start();

if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = [
        ["name" => "Mouse", "stock" => 10],
        ["name" => "Teclado", "stock" => 5],
        ["name" => "Monitor", "stock" => 0]
    ];
}

$items = $_SESSION['items'];

// simular venda
if (isset($_GET['sell'])) {
    $id = $_GET['sell'];

    foreach ($items as $item) {
        if ($item[$id]['stock'] > 0) {
            $item[$id]['stock']--;
        }
    }
}

// calcular total em estoque
$total = 0;

foreach ($items as $i => $item) {
    $total = $item['stock'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventário</title>
</head>
<body>

<h1>Sistema de Estoque</h1>

<ul>
<?php foreach ($items as $i => $item): ?>
    <li>
        <?php echo $item['name'] ?> -
        <?php echo $item['stock'] ?> unidades
        <a href="?sell=<?php echo $i ?>">Vender</a>
    </li>
<?php endforeach; ?>
</ul>

<p>Total em estoque: <?php echo $total ?></p>

</body>
</html>
