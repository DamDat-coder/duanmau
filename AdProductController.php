<?php
class AdProductController
{
    private $product;
    private $data;
    private $category;
    function __construct()
    {
        $this->category = new CategoryModel();
        $this->product = new ProductModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function viewPro()
    {
        $this->data['product'] = $this->product->getProduct(2);
        $this->renderview('product', $this->data);
    }
    function viewAdd()
    {
        $this->data['cate'] = $this->category->getCate();
        $this->renderview('addpro', $this->data);
    }
    function viewEdit()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['cate'] = $this->category->getCate();
            $this->data['detail_pro'] = $this->product->getIdPro($id);
            $this->renderview('editpro', $this->data);
        }
        // $this->renderview('editcate', $this->data);
    }


    function addPro()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['price'] = $_POST['price'];
            $data['amount'] = $_POST['amount'];
            $data['view'] = $_POST['view'];
            $data['idcate'] = $_POST['cate'];
            $data['image'] = $_FILES["image"]["name"];
            $file = '../img/' . $data['image'];
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            $this->product->insertPro($data);
        }
        echo '<script>alert("Thêm sản phẩm thành công");</script>';
        echo '<script>location.href="index.php?page=product";</script>';
    }
    function delPro()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $data = $this->product->getIdPro($id);
            $file = '../img/' . $data['image'];
            unlink($file);
            $this->product->deletePro($id);
            echo '<script>alert("Xoá sản phẩm thành công");</script>';
            echo '<script>location.href="index.php?page=product";</script>';
        }
    }
    function editPro()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['price'] = $_POST['price'];
            $data['amount'] = $_POST['amount'];
            $data['view'] = $_POST['view'];
            $data['idcate'] = $_POST['cate'];
            $data['image'] = $_FILES['image']['name'];
            $data['id'] = $_POST['idpro'];
            $data['image_old'] = $_POST['image_old'];
            if ($data['image'] == "") {
                $data['image'] = $data['image_old'];
            } else {
                $file = '../img/' . $data['image'];
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
                $file_old = '../img/' . $data['image_old'];
                unlink($file_old);
            }
            $this->product->updatePro($data);
            echo '<script>alert("Cập nhật sản phẩm thành công");</script>';
            echo '<script>location.href="index.php?page=product";</script>';
        }
    }
}
