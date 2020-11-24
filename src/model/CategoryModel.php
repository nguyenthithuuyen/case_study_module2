<?php

namespace app\model;

class CategoryModel extends BaseModel
{
    protected $table = 'categories';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function add($categories)
    {

        $sql = "INSERT INTO `categories`(`name`, `image`, `created_at`, `updated_at`) VALUES (?,? ,?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $categories[1]);
        $stmt->bindParam(2, $categories[2]);
        $stmt->bindParam(3, $categories[3]);
        $stmt->bindParam(4, $categories[4]);
        $stmt->execute();

    }

    function update($category)
    {
        $sql = "UPDATE `categories` SET `name`=:name,`image`=:image WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $category[0]);
        $stmt->bindParam(":name", $category[1]);
        $stmt->bindParam(":image", $category[2]);

        $stmt->execute();
    }

    function delete($id)
    {
        $sql = "DELETE FROM `categories` WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}