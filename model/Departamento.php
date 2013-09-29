<?php

class Departamento {

    private $db = NULL;
    private $pstmt = NULL;
    private $id = NULL;
    private $nome = NULL;
    private $descricao = NULL;

    public function __get($field) {
        return $this->$field;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

?>
