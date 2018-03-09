<?php
class Sucesso {
    static function setSucesso($mensagem){
        $_SESSION["sucesso"]=$mensagem;
    }
    
    static function recebeSucesso(){
        if(!isset($_SESSION["sucesso"])){
            return null;
        }
        
        $sucesso=$_SESSION["sucesso"];
        $_SESSION["sucesso"]=null;
        
        return $sucesso;
    }
    
}