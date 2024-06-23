<?php 
require 'config.php';
require 'dao/ProdutoDaoMySQL.php';

$produtoDao = new ProdutoDaoMySQL($pdo);
$lista = $produtoDao->findAll();
$somaMargem = $produtoDao->somaMargem();

?>

<a href="adicionar.php">ADICIONAR PRODUTO</a>

<table border="1" width=93%>
    <tr>
        <th>Id</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Preço de venda</th>
        <th>Custo de aquisição</th>
        <th>MC Unitária</th>
        <th>MC Total</th>
        <th>Alterações</th>
    </tr>
    <?php foreach($lista as $produto): ?>
        <tr>
            <td><?php echo $produto->getId();?></td>
            <td><?php echo $produto->getNome();?></td>
            <td><?php echo $produto->getQtd();?></td>
            <td><?php echo $produto->getPrice();?></td>
            <td><?php echo 'R$'.number_format($produto->getCusto(), 2, ',', '.');?></td>
            <td><?php echo 'R$'.number_format($produto->getMCU(), 2, ',', '.');?></td>
            <td><?php echo 'R$'.number_format( $produto->getMCT(), 2, ',', '.');?></td>
            <td>
                <a href="editar.php?id=<?=$produto->getId();?>">[Editar]</a>
                <a href="deletar.php?id=<?=$produto->getId();?>">[Deletar]</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<h2>Margem total do estoque: <?php echo 'R$'.number_format($somaMargem, 2, ',', '.');?></h2>