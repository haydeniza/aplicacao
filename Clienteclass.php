<?php 


class Clienteclass{
    private $db;
    


    function __construct($con) {
        $this->db = $con;
    }


    public function getAll(){
        try {
            $sql = "select * from cliente";

            $stmt = $this->db->prepare($sql);
            
            if( $stmt->execute()){
                return $stmt;
            }
            else{
                return false;

            }
            
        } catch (Exception $ex) {
            echo "Erro ".$ex->getmessage();

        }
    }



    public function getId($id){

        try {
            $sql = "select * from cliente where cli_id=?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(
                $id
            ));
            return $stmt;
        } catch (Exception $ex) {
            echo"Erro".$ex->getmessage();
        }
    }



    public function insertCliente($nome,$idade,$email,$contato,$profissao){
        try {
            $sql = "insert into cliente values (null,?,?,?,?,?)";

            $stmt = $this->db->prepare($sql);

            if($stmt->execute(
                array(
                    $nome,$idade,$email,$contato,$profissao 
                ))){
                    return $stmt;

                }
                else{
                    return false;
                }

        } catch (Exception $ex) {
            echo "Erro".$ex->getmessage();

        }


    }


    public function editarCliente($nome,$idade,$email,$contato,$profissao,$id){
        try {
            $sql = "update cliente set cli_nome=?,cli_idade=?,cli_email=?,cli_contato=?,cli_profissao=? where cli_id=?";

            $stmt = $this->db->prepare($sql);

            if($stmt->execute(array(
                $nome,$idade,$email,$contato,$profissao ,$id
            ))){
                return $stmt;
            
            }
            else{
                return false;
            }

    
        } catch (Exception $ex) {
            echo "Editado con Sucesso".$ex->getmessage();
        }
    }








}