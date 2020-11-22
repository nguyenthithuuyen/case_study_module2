<?php
namespace app\model;


use PDO;
use PDOException;

class DBConnect
{
    protected $username;
    protected $password;
    protected $dsn;

    public function __construct()
    {
        $this->username = 'root';
        $this->password = '123456@Abc';
        $this->dsn = 'mysql:host=localhost;dbname=shop_demo';
    }

    function connect() {
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        }catch (PDOException $PDOException){
            echo $PDOException->getMessage();
            exit();
        }
    }
}