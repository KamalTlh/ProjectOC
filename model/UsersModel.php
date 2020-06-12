<?php
namespace App\model;
use App\model\UserModel;

class UsersModel extends Model{

    private $users;

    public function getUsers(){
        return $this->users;
    }

    public function setUsers($users){
        $this->users = $users;
    }

    public function getListUsers(){
        $sql = 'SELECT id, pseudo, password, date_creation FROM user ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach( $result as $row){
            $user = new UserModel();
            $userId = $row['id'];
            $users[$userId] = $user->hydrate($row);
        }
        $result->closeCursor();
        $this->setUsers($users);
        return $users;
    }
}