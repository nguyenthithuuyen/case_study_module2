<?php

namespace app\controller;

use app\model\ProductModel;

class HomeController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showHomePage() {
        $products = $this->productModel->getAll();
        include_once 'views/front-end/index.php';
    }
}