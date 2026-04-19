<?php
	session_start();

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	#print_r($_SESSION['items']);

	if (!isset($_SESSION['items'])) { #Se NÃO existe sesão de itens então adicione a sessão itens...
		 $_SESSION['items'] = [
		     ["name" => "Mouse", "stock" => 10],
		     ["name" => "Teclado", "stock" => 5],
		     ["name" => "Monitor", "stock" => 0]
		 ];
	} else {
		print_r($_SESSION['items']);
	}
	$items = array();
	$items = $_SESSION['items']; #Variavel "Items" recebe a sessão, mas em um caso onde ela não exista?

	// simular venda
	if(isset($_GET['sell'])){
		$id = $_GET['sell'];
			if($items[$id]['stock'] > 0){
			$items[$id]['stock']--;

		}
		$_SESSION['items'] = $items;
		header('Location: fixed.php');
		exit;
	}

	// calcular total em estoque
	$total = 0; #Variavel importante declarada.

	foreach ($items as $item) { #Percorre '$items' e adiciona a '$total'...
		 $total += $item['stock']; 
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
