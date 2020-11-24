<?php
$productController = new \app\controller\ProductController();
$categoryController=new\app\controller\CategoryController();
$homeController = new \app\controller\HomeController();
$authController = new \app\controller\AuthController();
$page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : null;

switch ($page) {
    case 'admin':
        break;
    case 'product-detail':
        $idProduct = $_REQUEST['id-product'];
        $productController->showDetail($idProduct);
        break;
    case 'add-product':

        // kiem tra user logined
//        $authController->checkLogin();
        $productController->addProduct();

        break;

    case 'update-product':
        $idProduct=$_REQUEST['id-product'];
        $productController->updateProduct();
        break;
    case 'delete-product':
        $idProduct=$_REQUEST['id-product'];
        $productController->deleteProduct($idProduct);
        break;
    case 'cart':
        echo 'cart';
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $authController->showFormLogin();
        } else {
            $username = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $authController->login($username, $password);
        }
        break;
    case 'products':
        $productController->showAllProduct();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'delete-category':
        $idCategory=$_REQUEST['id-category'];
        $categoryController->deleteCategory($idCategory);
        break;
    case 'product-manage':
        $productController->getAllProduct();
        break;
    case 'category-detail':
        $idCategory = $_REQUEST['id-category'];
        $productController->showDetail($idCategory);
        break;
    case 'add-category':
        $categoryController->addCategory();
        break;
    case 'update-category':
        $idCategory=$_REQUEST['id-category'];
        $categoryController->updateCategory();
        break;
    case 'categories':
        $categoryController->showAllCategory();
        break;
    case 'category-manage':
        $categoryController->getAllCategory();
        break;
    case 'search-product':
        $productController->search();
        break;
    default:
        $homeController->showHomePage();
}

?>