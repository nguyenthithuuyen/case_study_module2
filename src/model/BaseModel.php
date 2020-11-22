<?php

namespace app\model;

class BaseModel
{
    protected $conn;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(); // array
    }

    function findById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }
}