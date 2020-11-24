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

    function showDetail($id)
    {
        $product = $this->productModel->findById($id);
        include_once 'views/front-end/products/detail.php';
    }

    public function getAllProduct()
    {
        $products = $this->productModel->getAll();
        include_once 'views/admin/product-manage.php';
    }

    function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'views/admin/add-product.php';
        } else {
            $id = 0;
            $name = $_REQUEST['product-name'];
            $image = $_REQUEST['product-image'];
            $price = $_REQUEST['product-price'];
            $price_old = $_REQUEST['product-price-old'];
            $product = [$id, $name, $image, $price, $price_old];
            $this->productModel->add($product);
            header('location:index.php?page=product-manage');
        }
    }

    function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id-product'];
            $product = $this->productModel->findById($id);
            include_once 'views/admin/update-product.php';
        } else {
            $id = $_REQUEST['product-id'];
            $name = $_REQUEST['product-name'];
            $image = $_REQUEST['product-image'];
            $price = $_REQUEST['product-price'];
            $price_old = $_REQUEST['product-price-old'];
            $product = [$id, $name, $image, $price, $price_old];
            $this->productModel->update($product);
            header('location:index.php?page=product-manage');
        }
    }

    function showAllProduct()
    {
        $products = $this->productModel->getAll();
        include_once 'views/front-end/product.php';
    }
//    function updateProduct() {
//        if ($_SERVER['REQUEST_METHOD']=='GET') {
//            $id = $_REQUEST['id'];
//            $user = $this->connectUser->getUser($id);
//            include_once 'src/View/update.php';
//        } else{
//            $id = $_REQUEST['user-id'];
//            $first = $_REQUEST['user-first'];
//            $last = $_REQUEST['user-last'];
//            $email = $_REQUEST['user-email'];
//            $birth = $_REQUEST['user-birth'];
//            $user = new User($id,$first,$last,$email,$birth);
//            $this->connectUser->update($user);
//            header('location:index.php');
//        }
//    }
    function deleteProduct($id)
    {
        $this->productModel->delete($id);
        header('location:index.php?page=product-manage');
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = "%" . $_REQUEST['search'] . "%";
            $products = $this->productModel->search($search);
            include_once 'views/admin/search-product.php';
        }
    }
}