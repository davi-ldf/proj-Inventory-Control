<?php 
require 'config.php';
require 'dao/ProdutoDaoMySQL.php';

$produtoDao = new ProdutoDaoMySQL($pdo);

$name = filter_input(INPUT_POST, 'name');
$qtd = filter_input(INPUT_POST, 'qtd');
$price = filter_input(INPUT_POST, 'price');
$cost = filter_input(INPUT_POST, 'cost');
$mcu = filter_input(INPUT_POST, 'mcu');
$mct = filter_input(INPUT_POST, 'mct');

if($name && $qtd && $price && $cost && $mcu && $mct) {

    if($produtoDao->findByName($name) === false) {
        $novoProduto = new Produto();
        $novoProduto->setNome($name);
        $novoProduto->setQtd($qtd);
        $novoProduto->setPrice($price);
        $novoProduto->setCusto($cost);
        $novoProduto->setMCU($mcu);
        $novoProduto->setMCT($mct);

        $produtoDao->add($novoProduto);

        header("Location: index.php");
        exit;
    } else {
        header("Location: adicionar.php");
        exit;
    }

} else {
    header("Location: adicionar.php");
    exit;
}