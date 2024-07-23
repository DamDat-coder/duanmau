<?php

class AdUserController
{
    private $data;
    private $user;

    function __construct()
    {
        $this->user = new UserModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function getAlluser()
    {
        $this->data['user'] = $this->user->getUser();
        $this->renderview('user', $this->data);
    }
    function viewEdit()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['detail_user'] = $this->user->getIdUser($id);
            $this->renderview('edituser', $this->data);
        }
    }
    function editUser()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['password'] = $_POST['password'];
            $data['password_old'] = $_POST['password_old'];
            $data['id'] = $_POST['iduser'];
            if ($data['password'] == '' || $data['password'] == $data['password_old']){
                echo '<script>alert("Vui lòng nhập mật khẩu mới");</script>';
                echo '<script>location.href="index.php?page=edituser&id= ' . $data['id'] . '";</script>';
            } 
            $this->user->updateUser($data);
            echo '<script>alert("Cập nhật người dùng thành công");</script>';
            echo '<script>location.href="index.php?page=user";</script>';
        }
    }
    function delUser()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $data = $this->user->getIdUser($id);
            $this->user->deleteUser($id);
            echo '<script>alert("Xoá người dùng thành công");</script>';
            echo '<script>location.href="index.php?page=user";</script>';
        }
    }
}
