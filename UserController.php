<?php
class UserController
{
    private $data;
    private $user;

    function __construct()
    {
        $this->user = new UserModel();
    }

    function renderView($view, $data = null)
    {


        $view = 'app/view/' . $view . '.php';
        require_once $view;
    }

    function viewSignin()
    {
        $this->renderView('signin');
    }

    function check()
    {
        if (isset($_POST['sub'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $this->user->checkUser($username, $password);

            if (is_array($result)) {
                $_SESSION['username'] = $result['username'];
                $_SESSION['role'] = $result['role'];

                if ($result['role'] == 1) {
                    header('Location: admin/index.php');
                } else {
                    header('Location: index.php');
                }
                exit();
            } else {
                echo '<script>alert("Đăng nhập thất bại - Sai thông tin hoặc chưa có tài khoản, xin vui lòng đăng ký!");</script>';
                echo '<script>window.history.back();</script>';
                exit();
            }
        }
    }

    function viewSignup()
    {
        $this->renderView('signup');
    }

    function addUser()
    {
        if (isset($_POST['sub'])) {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if (!empty($data['username'])) {
                if ($this->user->checkUsername($data['username'])) {
                    echo '<script>alert("Tên đăng nhập đã tồn tại - Vui lòng nhập lại Tên đăng nhập!");</script>';
                    echo '<script>location.href="index.php?page=signup";</script>';
                } elseif (!empty($data['password'])) {
                    if ($this->user->checkMail($data['email'])) {
                        echo '<script>alert("Email đã tồn tại - Vui lòng nhập lại email!");</script>';
                        echo '<script>location.href="index.php?page=signup";</script>';
                    } else {
                        $this->user->insertUser($data);
                        echo '<script>alert("Đăng ký thành công");</script>';
                        echo '<script>location.href="index.php?page=home";</script>';
                    }
                } else {
                    echo '<script>alert("Đăng ký thất bại do chưa nhập mật khẩu - Vui lòng nhập mật khẩu!");</script>';
                    echo '<script>location.href="index.php?page=signup";</script>';
                }
            } else {
                echo '<script>alert("Đăng ký thất bại do chưa nhập username - Vui lòng nhập username!");</script>';
                echo '<script>location.href="index.php?page=signup";</script>';
            }
        }
    }

    function signOut()
    {
        session_destroy();
        header("location:index.php");
    }

    function editUser()
    {
        if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
            header("Location: index.php?page=signin");
            exit();
        }

        $username = $_SESSION['username'];
        $user = $this->user->getUserByUsername($username);

        if ($user) {
            require 'app/view/edituser.php';
        } else {
            echo "Không tìm thấy thông tin người dùng.";
            exit();
        }
    }
    public function updatePassword()
    {
        if (isset($_POST['sub'])) {
            $id = $_POST['id'];
            $password = $_POST['password'];

            $data = [
                'id' => $id,
                'password' => $password
            ];

            $this->user->updateUser($data);

            echo '<script>alert("Cập nhật mật khẩu thành công");</script>';
            echo '<script>location.href="index.php?page=home";</script>';
        }
    }
}
