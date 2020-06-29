<?php
namespace model;

class UsersModel extends Model{

    private $users;

    public function __construct(){
        $this->getListUsers();
    }

    public function getUsers(){
        return $this->users;
    }

    public function setUsers($users){
        $this->users = $users;
    }

    public function getListUsers(){
        $sql = 'SELECT id, pseudo, email, password, date_creation, role_id FROM user ORDER BY id DESC';
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