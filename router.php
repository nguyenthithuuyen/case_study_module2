<?php
$productController = new \app\controller\ProductController();
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
    case 'product-add':
        // kiem tra user logined
        $authController->checkLogin();

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
    default:
        $homeController->showHomePage();
}

?>