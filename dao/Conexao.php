<?php

class Conexao {

    /**
     *
     * @var PDO Holds a PDO static instance.
     */
    private static $db;

    /**
     * Construtor cria uma nova conexão utilizando PDO.
     */
    function __construct() {

        self::db_conecta();
    }

    public function db_conecta() {
        try {
            self::$db = new PDO('pgsql:host=localhost;dbname=empresa', 'ifsul', 'ifsul');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //self::$db->exec("set names utf8");
        }
        catch (PDOException $err) {
            die('Erro ao conectar com o banco de dados: ' . $err->getMessage());
        }
    }
    /**
     * Caso seja necessário, cria uma instância da conxão,
     * senão, retorna a conexão já existente. É o
     * método singleton.
     *
     * @return PDO Connection Object
     */
    public static function getConexao() {
        if ( ! self::$db ) {
            new self();
        }
        return self::$db;
    }
}
?>
