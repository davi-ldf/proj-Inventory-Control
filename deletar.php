<?php 
require 'config.php';
require 'dao/ProdutoDaoMySQL.php';

$produtoDao = new ProdutoDaoMySQL($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $produtoDao->delete($id);
}
header("location: index.php");
exit;