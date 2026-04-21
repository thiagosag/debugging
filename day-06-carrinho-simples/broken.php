<?php
	session_start();

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}

	$products = [
		1 => ["name" => "Camiseta", "price" => 50],
		2 => ["name" => "Calça", "price" => 120],
		3 => ["name" => "Tênis", "price" => 200]
	];

	$cart = $_SESSION['cart'];

	// adicionar produto
	if (isset($_GET['add'])) {
		$id = $_GET['add'];

		if ($products[$id]) {
			$cart[$id]['qty']++;
			$cart[$id]['price'] = $products[$id]['price'];
			$cart[$id]['name'] = $products[$id]['name'];
		}
	}

	// remover produto
	if (isset($_GET['remove'])) {
		unset($cart[$_GET['remove']]);
	}

	// calcular total
	$total = 0;

	foreach ($cart as $item) {
		$total += $item['price'] * $item['qty'];
	}

	$_SESSION['cart'] = $cart;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Carrinho</title>
</head>
<body>

<h1>Produtos</h1>

<ul>
	<?php foreach ($products as $id => $p): ?>
		<li>
			<?php echo $p['name'] ?> - R$ <?php echo $p['price'] ?>
			<a href="?add=<?php echo $id ?>">Adicionar</a>
		</li>
	<?php endforeach; ?>
</ul>

<h2>Carrinho</h2>

<ul>
	<?php foreach ($cart as $id => $item): ?>
		<li>
			<?php echo $item['name'] ?> (<?php echo $item['qty'] ?>)
			<a href="?remove=<?php echo $id ?>">Remover</a>
		</li>
	<?php endforeach; ?>
</ul>

<p>Total: R$ <?php echo $total ?></p>

</body>
</html>
