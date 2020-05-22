<?php 

class Database {

    const DB_HOST = 'mysql:host=localhost;dbname=jean_forteroche;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    private $connection;

    private function checkConnection(){
        if($this->connection===null){
            return $this->getConnection();
        }
        return $connection;
    }

    private function getConnection(){
        try{
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
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