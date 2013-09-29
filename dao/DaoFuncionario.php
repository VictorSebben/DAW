<?php

class DaoFuncionario {

    private $db = NULL;
    private $sql;
    private $pstmt;

    public function __construct(PDO $con) {
        $this->db = $con;
    }

    public function salvar(Funcionario $func){

        if($func->getId() != NULL){ //é update
            $this->sql = "UPDATE departamento SET nome = :nome, descricao = :descricao
                WHERE id = :id";
        }

        else{
            $this->sql = "INSERT INTO funcionario (nome,  estado_civil,  cpf,  conjuge,  telefone,  endereco,  cargo,  id_dep)
                VALUES (:nome,  :estado_civil,  :cpf,  :conjuge,  :telefone,  :endereco,  :cargo,  :id_dep)";
        }

        try{
            $this->pstmt = $this->db->prepare($this->sql);

            if($func->getId() != NULL)
                $this->pstmt->bindParam(':id', $func->getId(), PDO::PARAM_INT);

            $this->pstmt->bindParam(':nome', $func->getNome(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':estado_civil', $func->getEstadoCivil(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':cpf', $func->getCpf(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':conjuge', $func->getConjuge(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':telefone', $func->getTelefone(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':endereco', $func->getEndereco(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':cargo', $func->getCargo(), PDO::PARAM_STR);
            $this->pstmt->bindParam('id_dep', $func->getIdDep(), PDO::PARAM_INT);
            $this->pstmt->execute();

            Util::setSuccessMsg("Funcionário salvo com sucesso.");
            return TRUE;
        }
        catch (PDOException $e){
            die($e);
            Util::setErrorMsg("Erro ao salvar funcionário: + $e.");
            return FALSE;
        }
    }


    public function excluir($id){
        $this->sql = "DELETE FROM funcionario WHERE id = :id";

        try{
            $this->pstmt = $this->db->prepare($this->sql);
            $this->pstmt->bindParam(':id', $id, PDO::PARAM_INT);
            $this->pstmt->execute();

            Util::setSuccessMsg("Registro removido com sucesso.");
            return TRUE;
        }
        catch(PDOException $e){
            Util::setErrorMsg("Erro ao tentar remover registro + $e.");
            RETURN FALSE;
        }
    }


    public function getFuncionarios() {
        $this->sql = "SELECT id, nome, estado_civil, cpf,
            conjuge, telefone, endereco, cargo, id_dep
            FROM funcionario";

        try{
            $this->pstmt = $this->db->prepare($this->sql);
            $this->pstmt->execute();

            if($this->pstmt->rowCount() < 1){
                Util::setNoticeMsg("Não há funcionários cadastrados.");
                return FALSE;
            }

            if($this->pstmt->rowCount() > 0){

                $res = array();

                while($row = $this->pstmt->fetch(PDO::FETCH_OBJ)){
                    $func = new Funcionario($this->db);
                    $func->setId($row->id);
                    $func->setNome($row->nome);
                    $func->setEstadoCivil($row->estado_civil);
                    $func->setCpf($row->cpf);
                    $func->setConjuge($row->conjuge);
                    $func->setTelefone($row->telefone);
                    $func->setEndereco($row->endereco);
                    $func->setCargo($row->cargo);
                    $func->setIdDep($row->id_dep);

                    array_push($res, $func);
                }

                return $res;
            }

            return FALSE;
        }
        catch(PDOException $e){
            die($e);
        }
    }

    public function getFuncionario($id){
        $this->sql = "SELECT * FROM funcionario WHERE id = :id";

        try{
            $this->pstmt = $this->db->prepare($this->sql);
            $this->pstmt->bindParam(':id', $id, PDO::PARAM_INT);
            $this->pstmt->execute();

            if($this->pstmt->rowCount() > 0){
                $row = $this->pstmt->fetch();
                $func = new Funcionario($this->db);
                $func->setId($row['id']);
                $func->setNome($row['nome']);
                $func->setEstadoCivil($row['estado_civil']);
                $func->setCpf($row['cpf']);
                $func->setConjuge($row['conjuge']);
                $func->setTelefone($row['telefone']);
                $func->setEndereco($row['endereco']);
                $func->setCargo($row['cargo']);
                $func->setIdDep($row['id_dep']);
                return $func;
            }

            return FALSE;
        }
        catch(PDOException $e){
            die($e);
        }
    }

}

?>
