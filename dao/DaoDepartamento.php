<?php

class DaoDepartamento{

    private $db = NULL;
    private $sql;
    private $pstmt;

    public function __construct(PDO $con) {
        $this->db = $con;
    }

    public function salvar(Departamento $dept){

        if($dept->getId() != NULL){ //é update
            $this->sql = "UPDATE departamento SET nome = :nome, descricao = :descricao
                WHERE id = :id";
        }

        else{
            $this->sql = "INSERT INTO departamento (nome, descricao)
                VALUES (:nome, :descricao)";
        }

        try{
            $this->pstmt = $this->db->prepare($this->sql);

            if($dept->getId() != NULL)
                $this->pstmt->bindParam(':id', $dept->getId(), PDO::PARAM_INT);

            $this->pstmt->bindParam(':nome', $dept->getNome(), PDO::PARAM_STR);
            $this->pstmt->bindParam(':descricao', $dept->getDescricao(), PDO::PARAM_STR);
            $this->pstmt->execute();

            Util::setSuccessMsg("Departamento salvo com sucesso.");
            return TRUE;
        }
        catch (PDOException $e){
            Util::setErrorMsg("Erro ao salvar departamento: + $e.");
            return FALSE;
        }
    }

    public function excluir($id){
        $this->sql = "DELETE FROM departamento WHERE id = :id";

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

    public function getDepartamentos() {
        $this->sql = "SELECT id, nome, descricao FROM departamento";

        try{
            $this->pstmt = $this->db->prepare($this->sql);
            $this->pstmt->execute();

            if($this->pstmt->rowCount() > 0){

                $res = array();

                while($row = $this->pstmt->fetch()){
                    $dep = new Departamento($this->db);
                    $dep->setId($row['id']);
                    $dep->setDescricao($row['descricao']);
                    $dep->setNome($row['nome']);
                    array_push($res, $dep);
                }

                return $res;
            }

            return FALSE;
        }
        catch(PDOException $e){
            die($e);
        }
    }

    public function getDepartamento($id){
        $this->sql = "SELECT * FROM departamento WHERE id = :id";

        try{
            $this->pstmt = $this->db->prepare($this->sql);
            $this->pstmt->bindParam(':id', $id, PDO::PARAM_INT);
            $this->pstmt->execute();

            if($this->pstmt->rowCount() > 0){
                $row = $this->pstmt->fetch();
                $dep = new Departamento($this->db);
                $dep->setId($row['id']);
                $dep->setDescricao($row['descricao']);
                $dep->setNome($row['nome']);
                return $dep;
            }

            return FALSE;
        }
        catch(PDOException $e){
            die($e);
        }
    }

}

?>
