<?php


namespace app\model;


class UserModel extends BaseModel
{
    protected $table = 'users';
    public function __construct()
    {
        parent::__construct($this->table);
    }

    function getUserByUsernameAndPassword($username, $password) {
        $sql = "SELECT * FROM $this->table WHERE email = '$username' AND password = $password";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }
}