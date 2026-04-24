<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

    $pedidos = [
        ["id" => 1, "cliente" => "Ana", "total" => 250.50],
        ["id" => 2, "cliente" => "Bruno", "total" => 99.90],
        ["id" => 3, "cliente" => "Carlos", "total" => 150.00],
        ["id" => 4, "cliente" => "Ana", "total" => 300.00],
        ["id" => 5, "cliente" => "Bruno", "total" => 200.00],
    ];

    // Agrupar total gasto por cliente
    $totais = [];

    foreach ($pedidos as $pedido) {
        if (!isset($totais[$pedido["cliente"]])) {
            $totais[$pedido["cliente"]] = 0;
        }
        $totais[$pedido["cliente"]] += $pedido["total"];
    }

    // Ordenar do maior para o menor
    arsort($totais);

    // Pegar top 2 clientes
    $topClientes = array_slice($totais, 0, 2);

    // Exibirs
    foreach ($topClientes as $cliente => $total) {
        echo $cliente . " - R$" . number_format($total, 2, ',', '.') . "<br>";
    }

?>