<?php 
require 'config.php';
require 'dao/ProdutoDaoMySQL.php';

$produtoDao = new ProdutoDaoMySQL($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$qtd = filter_input(INPUT_POST, 'qtd');
$price = filter_input(INPUT_POST, 'price');
$cost = filter_input(INPUT_POST, 'cost');
$mcu = filter_input(INPUT_POST, 'mcu');
$mct = filter_input(INPUT_POST, 'mct');

if($id && $name && $qtd && $price && $cost && $mcu && $mct) {

    $produto = new Produto();
    $produto->setId($id);
    $produto->setNome($name);
    $produto->setQtd($qtd);
    $produto->setPrice($price);
    $produto->setCusto($cost);
    $produto->setMCU($mcu);
    $produto->setMCT($mct);

    $produtoDao->update($produto);

    header("Location: index.php");
    exit;

} else {
    header("Location: editar.php?id=".$id);
    exit;
}