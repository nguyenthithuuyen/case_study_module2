<?php

namespace app\model;

class ProductModel extends BaseModel
{
    protected $table = 'products';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function add($products)
    {

        $sql = "INSERT INTO `products`(`name`, `image`, `price`, `price_old`) VALUES (?,? ,?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $products[1]);
        $stmt->bindParam(2, $products[2]);
        $stmt->bindParam(3, $products[3]);
        $stmt->bindParam(4, $products[4]);
        $stmt->execute();

    }

    function update($product)
    {

        $sql = "UPDATE `products` SET `name`=:name,`image`=:image,`price`=:price,`price_old`=:price_old WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $product[0]);
        $stmt->bindParam(":name", $product[1]);
        $stmt->bindParam(":image", $product[2]);
        $stmt->bindParam(":price", $product[3]);
        $stmt->bindParam(":price_old", $product[4]);
        $stmt->execute();
    }

    function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function search($key)
    {
        $sql = 'SELECT * FROM `products` WHERE `name` LIKE :key ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':key',$key);
        $stmt->execute();

    }
}