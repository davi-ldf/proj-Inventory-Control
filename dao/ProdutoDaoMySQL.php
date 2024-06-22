<?php 
require_once 'models/Produto.php';

class ProdutoDaoMySQL implements ProdutoDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Produto $prod) {

    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM produtos");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $prod = new Produto();
                $prod->setId($item['id']);
                $prod->setNome($item['nome']);
                $prod->setQtd($item['quantidade']);
                $prod->setPrice($item['preco']);
                $prod->setCusto($item['custo']);
                $prod->setMCU($item['mcu']);
                $prod->setMCT($item['mct']);

                $array[] = $prod;
            }
        }
        
        return $array;

    }

    public function findByName($nome) {
        
    }

    public function findById($id) {

    }

    public function update(Produto $prod) {
        
    }

    public function delete($id) {
        
    }
}