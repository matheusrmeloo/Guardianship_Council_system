<?php
class Erros {
    static function setErro($mensagem){
        $_SESSION["erro"]=$mensagem;
    }
    
    static function recebeErro(){
        if(!isset($_SESSION["erro"])){
            return null;
        }
        
        $erro=$_SESSION["erro"];
        $_SESSION["erro"]=null;
        
        return $erro;
    }
    
}