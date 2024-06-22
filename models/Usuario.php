<?php 
class Produto {
    private $id;
    private $nome;
    private $qtd;
    private $price;
    private $custo;
    private $mcUni;
    private $mcTot;

    public function getId() {
        return $this->id;
    }
    public function setId($i) {
        $this->id = trim($i);
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($n) {
        $this->nome = ucwords(trim($n));
    }

    public function getQtd() {
        return $this->qtd;
    }
    public function setQtd($q) {
        $this->qtd = trim($q);
    }

    public function getPrice() {
        return $this->price;
    }
    public function setPrice($p) {
        $this->price = trim($p);
    }

    public function getCusto() {
        return $this->custo;
    }
    public function setCusto($c) {
        $this->custo = trim($c);
    }

    public function getMCU() {
        return $this->mcUni;
    }
    public function setMCU($mcu) {
        $this->mcUni = trim($mcu);
    }

    public function getMCT() {
        return $this->mcTot;
    }
    public function setMCT($mct) {
        $this->mcTot = trim($mct); 
    }
}

interface ProdutoDAO {
    public function add(Produto $prod);
    public function findAll();
    public function findById($id);
    public function update(Produto $prod);
    public function delete($id);
}