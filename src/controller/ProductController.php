<?php


namespace app\controller;


use app\model\ProductModel;

class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    function showDetail($id) {
        $product = $this->productModel->findById($id);
        include_once 'views/front-end/products/detail.php';
    }


}