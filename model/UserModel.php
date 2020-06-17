<?php
namespace App\model;

class UserModel extends Model{

    private $id;
    private $pseudo;
    private $email;
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

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
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

    public function isPseudoUnique($post){
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post['pseudo']]);
        $isPseudoUnique = $result->fetchColumn();
        if($isPseudoUnique) {
            return '<p><b>Le pseudo existe déjà</b></p>';
        }
    }

    public function isEmailUnique($post){
        $sql = 'SELECT COUNT(email) FROM user WHERE email = ?';
        $result = $this->createQuery($sql, [$post['email']]);
        $isEmailUnique = $result->fetchColumn();
        if($isEmailUnique) {
            return '<p><b>L\'email existe déjà</b></p>';
        }
    }

    public function getUser($userId){
        $sql = 'SELECT id, pseudo, email, password, date_creation FROM user WHERE id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->hydrate($user);
    }
    
    public function createUser($post){
        $sql = 'INSERT INTO user (pseudo, email, password, date_creation) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$post['pseudo'], $post['email'], password_hash($post['password'],PASSWORD_BCRYPT)]);
 
    }

    public function updateUser($user, $userId){
        extract($user);
        $sql =' UPDATE user SET pseudo = ?, email = ?,  password= ? WHERE id = ?';
        $this->createQuery($sql, [$pseudo, $email, password_hash($password, PASSWORD_BCRYPT), $userId]);
    }

    public function deleteUser($userId){
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }

    public function updatePassword($user, $userId){
        extract($user);
        if ( $password === $verified_password){
            $sql =' UPDATE user SET password = ? WHERE id = ?';
            $this->createQuery($sql, [password_hash($password, PASSWORD_BCRYPT), $userId]);
        }
    }

    public function login($post){
        $sql = 'SELECT id, password FROM user WHERE pseudo = ? OR email = ?';
        $data = $this->createQuery($sql, [$post['userlog'], $post['userlog']]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post['password'], $result['password']);
        return [
            'result'=> $result,
            'isPasswordValid'=> $isPasswordValid
        ];
    }
}