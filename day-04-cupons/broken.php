<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
$coupons = [
    "PROMO10" => 10,
    "PROMO20" => 20,
    "VIP50" => 50
];

$price = 200;

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    if ($coupons[$code]) {
        $discount = $coupons[$code];
    } else {
        $discount = 0;
        $error = "Cupom inválido";
    }
}

// cálculo final
$final = $price - ($price * $discount / 100);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cupons</title>
</head>
<body>

<h1>Aplicar Cupom</h1>

<form>
    <input type="text" name="code" placeholder="Digite o cupom">
    <button type="submit">Aplicar</button>
</form>

<?php if ($error): ?>
    <p style="color:red"><?php echo $error ?></p>
<?php endif; ?>

<p>Preço original: R$ <?php echo $price ?></p>
<p>Desconto: <?php echo $discount ?>%</p>
<p>Total: R$ <?php echo $final ?></p>

</body>
</html>
