<?php


namespace app\controller;


use app\model\UserModel;

class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    function showFormLogin()
    {
        include_once 'views/front-end/login.php';
    }



    function login($username, $password)
    {
        $userLogin = $this->userModel->getUserByUsernameAndPassword($username, $password);
        if ($userLogin) {
            $_session["userlogin"] = $userlogin['name'];
            if ($userLogin['name'] == 'uyen') {
                $this->productManage();
            } else {
                header('location: index.php');
            }
        } else {
            header('location: index.php?page=login');
        }
    }

    function logout()
    {
        $_SESSION["userLogin"] = null;
        header('location: index.php');
    }
    // xoa session co key userLogin
    // header('location: index.php');


    function checkLogin()
    {
        if ($_SESSION['userLogin'] == null) {
            header('location: index.php?page=login');
        }
    }

    function productManage()
    {
        header('location: index.php?page=product-manage');
    }
    function categoryManage()
    {
        header('location: index.php?page=category-manage');
    }

}