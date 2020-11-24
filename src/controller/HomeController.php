<?php

namespace app\controller;

use app\model\ProductModel;
use app\model\CategoryModel;

class HomeController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function showHomePage() {
        $products = $this->productModel->getAll();
        $categories=$this->categoryModel->getAll();
        include_once 'views/front-end/index.php';
    }
}