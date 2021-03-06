<?php 
namespace model;
use PDO;
use Exception;
abstract class Model {
    
    private $connection;

    private function checkConnection(){
        if($this->connection===null){
            return $this->getConnection();
        }
        return $connection;
    }

    private function getConnection(){
        try{
            $connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
        catch(Exception $errorConnection)
        {
            die('Erreur de connection: '.$errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters=NULL){
        if($parameters){
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }

        $result = $this->checkConnection()->query($sql);
        return $result;
    }
}