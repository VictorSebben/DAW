<?php

class Funcionario {

    private $id;
    private $nome;
    private $estadoCivil;
    private $cpf;
    private $conjuge;
    private $telefone;
    private $endereco;
    private $cargo;
    private $idDep;

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

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getConjuge() {
        return $this->conjuge;
    }

    public function setConjuge($conjuge) {
        $this->conjuge = $conjuge;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getIdDep() {
        return $this->idDep;
    }

    public function setIdDep($idDep) {
        $this->idDep = $idDep;
    }

}

?>
