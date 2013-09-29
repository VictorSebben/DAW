<?php

class Util {

    const POST = 'POST';
    const GET = 'GET';
    const REQUEST = 'REQUEST';
    const SESSION = 'SESSION';

    const SUCCESS_MSGS = 'success_msgs';
    const NOTICE_MSGS = 'notice_msgs';
    const ERROR_MSGS = 'error_msgs';

    public static function getVar($nomeParam, $metodo = self::REQUEST){
        $val = NULL;

        switch($metodo){
            case self::POST:
                if(isset($_POST[$nomeParam]) && trim($_POST[$nomeParam]) != NULL)
                    $val = $_POST[$nomeParam];
                break;
            case self::GET:
                if(isset($_GET[$nomeParam]) && trim($_GET[$nomeParam]) != NULL)
                    $val = $_GET[$nomeParam];
                break;
            case self::SESSION:
                if(isset($_SESSION[$nomeParam]) && $_SESSION[$nomeParam] != NULL)
                    $val = $_SESSION[$nomeParam];
                break;
            default:
                if(isset($_REQUEST[$nomeParam]) && trim($_REQUEST[$nomeParam]) != NULL)
                    $val = $_REQUEST[$nomeParam];
                break;
        }

        return $val;
    }


    public static function pr(Array $arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    public static function printObjAttr($obj, $field){
        if($obj->__get($field) != NULL)
            echo $obj->__get($field);
    }

    public static function printVar($var){
        if($var != NULL)
            echo $var;
    }

    public static function setErrorMsg($msg){
        if(!isset($_SESSION[self::ERROR_MSGS])){
            $_SESSION[self::ERROR_MSGS] = array($msg);
        }
        else {
            $_SESSION[self::ERROR_MSGS][] = $msg;
        }
    }

    public static function setNoticeMsg($msg){
        if(!isset($_SESSION[self::NOTICE_MSGS])){
            $_SESSION[self::NOTICE_MSGS] = array($msg);
        }
        else {
            $_SESSION[self::NOTICE_MSGS][] = $msg;
        }
    }

    public static function setSuccessMsg($msg){
        if(!isset($_SESSION[self::SUCCESS_MSGS])){
            $_SESSION[self::SUCCESS_MSGS] = array($msg);
        }
        else {
            $_SESSION[self::SUCCESS_MSGS][] = $msg;
        }
    }

    public static function showSystemMsgs(){
        $msgsSucesso = self::getVar(self::SUCCESS_MSGS, self::SESSION);
        $msgsAviso = self::getVar(self::NOTICE_MSGS, self::SESSION);
        $msgsErro = self::getVar(self::ERROR_MSGS, self::SESSION);

        if($msgsSucesso !== NULL){
            unset($_SESSION[self::SUCCESS_MSGS]);
            include 'views/helpers/sucesso.html.php';
        }

        if($msgsAviso !== NULL){
            unset($_SESSION[self::NOTICE_MSGS]);
            include 'views/helpers/aviso.html.php';
        }

        if($msgsErro !== NULL){
            unset($_SESSION[self::ERROR_MSGS]);
            include 'views/helpers/erro.html.php';
        }
    }

}

?>
