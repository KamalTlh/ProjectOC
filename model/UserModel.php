<?php
namespace App\model;

class UserModel extends Model{

    private $id;
    private $pseudo;
    private $password;
    private $date_creation;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getDate_Creation(){
        return $this->date_creation;
    }

    public function setDate_Creation($date_creation){
        $this->date_creation = $date_creation;
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            
            // Si le setter correspondant existe.
            if (method_exists($this, $method)){
            // On appelle le setter.
            $this ->$method($value);
            }
        }
        return $this;
    }

    public function getUser($userId){
        $sql = 'SELECT id, pseudo, password, date_creation FROM user WHERE id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->hydrate($user);
    }
    
    public function createUser($post){
        $sql = 'INSERT INTO user (pseudo, password, date_creation) VALUES (?, ?, NOW())';
        $this->createQuery($sql, [$post['pseudo'], password_hash($post['password'],PASSWORD_BCRYPT)]);
    }

    public function updateUser($user, $userId){
        extract($user);
        $sql =' UPDATE user SET pseudo = ?, password= ? WHERE id = ?';
        $this->createQuery($sql, [$pseudo, password_hash($password, PASSWORD_BCRYPT), $userId]);
    }

    public function deleteUser($userId){
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }

    public function login($post){
        $sql = 'SELECT id password FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post['pseudo']]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post['password'], $result['password']);
        $data->closeCursor();
        return [
            'result'=> $result,
            'isPasswordValid'=> $isPasswordValid
        ];
    }
}