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

    function showFormLogin() {
        include_once 'views/front-end/login.php';
    }

    function login($username, $password) {
        $userLogin = $this->userModel->getUserByUsernameAndPassword($username, $password);
        if ($userLogin) {
            $_SESSION["userLogin"] = $userLogin['name'];
            header('location: index.php');
        }else{
            header('location: index.php?page=login');
        }
    }

    function logout($username, $password) {
        $userLogout = $this->userModel->getUserByUsernameAndPassword($username, $password);
        if ($userLogout) {
            $_SESSION["userLogout"] = "";
            header('location: index.php');
        }
        // xoa session co key userLogin
        // header('location: index.php');
    }

    function checkLogin() {
        if ($_SESSION['userLogin'] == null) {
            header('location: index.php?page=login');
        }
    }
    function checkLogout(){
        if ($_SESSION['userLogout'] == null) {
            header('location: index.php?page=logout');
        }
    }
}