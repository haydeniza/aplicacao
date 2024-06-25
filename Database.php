<?php


class Database{
    private $dbHost = "localhost";
    private $dbName = "ads";
    private $dbUser = "root";
    private $dbPass = "";


   private $con = null;
   
   public function Conectar(){

    if($this->con == null){
        
        try {
            $this->con = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName,$this->dbUser,$this->dbPass);

        } catch (Exception $ex) {
            echo "Erro na conexão".$ex->getmessage();
        }

        return $this->con;

   }
}

public function Desconectar(){
    $this->con = null;
}


}