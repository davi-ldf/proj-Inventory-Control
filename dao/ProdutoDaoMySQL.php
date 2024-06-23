<?php 
require_once 'models/Produto.php';

class ProdutoDaoMySQL implements ProdutoDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Produto $prod) {
        $sql = $this->pdo->prepare("INSERT INTO produtos (nome, quantidade, preco, custo, mcu, mct) VALUES (:nome, :qtd, :preco, :custo, :mcu, :mct)");
        $sql->bindValue(':nome', $prod->getNome());
        $sql->bindValue(':qtd', $prod->getQtd());
        $sql->bindValue(':preco', $prod->getPrice());
        $sql->bindValue(':custo', $prod->getCusto());
        $sql->bindValue(':mcu', $prod->getMCU());
        $sql->bindValue(':mct', $prod->getMCT());
        $sql->execute();

        $prod->setId($this->pdo->lastInsertId());
        return $prod;
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

    public function findByName($name) {
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE nome = :nome");
        $sql->bindValue(':nome', $name);
        $sql->execute();

        if($sql->rowCount() > 0) {
        //Se achou um usuário com esse nome
            $data = $sql->fetch();

            $prod = new Produto();
            $prod->setId($data['id']);
            $prod->setNome($data['nome']);
            $prod->setQtd($data['quantidade']);
            $prod->setPrice($data['preco']);
            $prod->setCusto($data['custo']);
            $prod->setMCU($data['mcu']);
            $prod->setMCT($data['mct']);

            return $prod;

        } else {
            return false;
        }
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $prod = new Produto();
            $prod->setId($data['id']);
            $prod->setNome($data['nome']);
            $prod->setQtd($data['quantidade']);
            $prod->setPrice($data['preco']);
            $prod->setCusto($data['custo']);
            $prod->setMCU($data['mcu']);
            $prod->setMCT($data['mct']);

            return $prod;
        } else {
            return false;
        }

    }

    public function update(Produto $prod) {
        $sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, quantidade = :qtd, preco = :preco, custo = :custo, mcu = :mcu, mct = :mct WHERE id = :id");
        $sql->bindValue(':nome', $prod->getNome());
        $sql->bindValue(':qtd', $prod->getQtd());
        $sql->bindValue(':preco', $prod->getPrice());
        $sql->bindValue(':custo', $prod->getCusto());
        $sql->bindValue(':mcu', $prod->getMCU());
        $sql->bindValue(':mct', $prod->getMCT());
        $sql->bindValue(':id', $prod->getId());
        $sql->execute();

        return true;

    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
    }
}