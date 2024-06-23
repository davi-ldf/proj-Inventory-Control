<?php 
require 'config.php';
require 'dao/ProdutoDaoMySQL.php';

$produtoDao = new ProdutoDaoMySQL($pdo);
$produto = false;

$id = filter_input(INPUT_GET, 'id');
if($id) {

    $produto = $produtoDao->findById($id);

}

if($produto === false) {
    header("Location: index.php");
    exit;

}
?>
<h1>Editar Usuário</h1>
<form action="editar_action.php" method="post">

    <input type="hidden" name="id" value="<?php echo $produto->getId(); ?>">

<label>
        Nome: <br>
        <input type="text" name="name" value="<?php echo $produto->getNome(); ?>">
    </label> <br> <br>
    <label>
        Quantidade: <br>
        <input type="number" name="qtd" value="<?php echo $produto->getQtd(); ?>">
    </label> <br> <br>
    <label>
        Preço: <br>
        <input type="number" name="price" value="<?php echo $produto->getPrice(); ?>">
    </label> <br> <br>
    <label>
        Custo: <br>
        <input type="number" name="cost" value="<?php echo $produto->getCusto(); ?>">
    </label> <br> <br>
    <label>
        MC Unitário: <br>
        <input type="number" name="mcu" value="<?php echo $produto->getMCU(); ?>">
    </label> <br> <br>
    <label>
        MC Total: <br>
        <input type="number" name="mct" value="<?php echo $produto->getMCT(); ?>">
    </label> <br> <br>
    
    <input type="submit" value="Salvar">

</form>