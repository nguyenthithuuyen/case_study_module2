<?php
namespace app\model;

class ProductModel extends BaseModel
{
    protected $table = 'products';
    public function __construct()
    {
        parent::__construct($this->table);
    }


}