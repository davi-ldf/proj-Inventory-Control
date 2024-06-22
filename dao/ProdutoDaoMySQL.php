<?php 
require_once '../models/Usuario.php';

class ProdutoDaoMySQL implements ProdutoDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Produto $prod) {

    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM produtos");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $prod = new Produto();
                $prod->setId($item['id']);
                $prod->setNome($item['nome']);
                $prod->setQtd($item['qtd']);
                $prod->setPrice($item['price']);
                $prod->setCusto($item['custo']);
                $prod->setMCU($item['mcUni']);
                $prod->setMCT($item['mcTot']);

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