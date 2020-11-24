<?php


namespace app\controller;


use app\model\CategoryModel;

class CategoryController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel= new CategoryModel();
    }

    function showDetail($id)
    {
        $category = $this->categoryModel->findById($id);
        include_once 'views/front-end/categories/detail.php';
    }

    public function getAllCategory()
    {
        $categories=$this->categoryModel->getAll();
        include_once 'views/admin/category-manage.php';
    }
    function addCategory() {
        if ($_SERVER['REQUEST_METHOD']=='GET') {
            include_once 'views/admin/add-category.php';
        } else{
            $id = 0;
            $name = $_REQUEST['category-name'];
            $image = $_REQUEST['category-image'];
            $created_at = $_REQUEST['category-created-at'];
            $update_at = $_REQUEST['category-update-at'];
            $category = [$id,$name,$image,$created_at,$update_at];
            $this->categoryModel->add($category);
            header('location:index.php?page=category-manage');
        }
    }
    function updateCategory() {
        if ($_SERVER['REQUEST_METHOD']=='GET') {
            $id=$_REQUEST['id-category'];
            $category=$this->categoryModel->findById($id);
            include_once 'views/admin/update-category.php';
        } else{
            $id = $_REQUEST['id-category'];
            $name = $_REQUEST['category-name'];
            $image = $_REQUEST['category-image'];
            $created_at = $_REQUEST['category-created-at'];
            $update_at = $_REQUEST['category-update-at'];
            $category = [$id,$name,$image,$created_at,$update_at];
            $this->categoryModel->update($category);
            header('location:index.php?page=category-manage');
        }
    }
    function showAllCategory()
    {
        $categories = $this->categoryModel->getAll();
        include_once 'views/front-end/category.php';
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
    function deleteCategory($id) {
        $this->categoryModel->delete($id);
        header('location:index.php?page=category-manage');
    }
}