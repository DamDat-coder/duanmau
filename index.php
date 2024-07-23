<?php
// Kiểm tra xem người dùng đã đăng nhập chưa


require_once '../admin/controller/AdCategoryController.php';
require_once '../admin/controller/AdProductController.php';
require_once '../admin/controller/AdUserController.php';
require_once '../app/model/database.php';
require_once '../app/model/CategoryModel.php';
require_once '../app/model/ProductModel.php';
require_once '../app/model/UserModel.php';

require_once '../admin/view/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'product':
            $product = new AdProductController();
            $product->viewPro();
            break;
        case 'category':
            $category = new AdCategoryController();
            $category->getAllcate();
            break;
        case 'user':
            $user = new AdUserController();
            $user->getAlluser();
            break;
        case 'addcate':
            $addcate = new AdCategoryController();
            $addcate->viewAdd();
            break;
        case 'addpro':
            $addpro = new AdProductController();
            $addpro->viewAdd();
            break;
        case 'editcate':
            $editcate = new AdCategoryController();
            $editcate->viewEdit();
            break;
        case 'editpro':
            $editpro = new AdProductController();
            $editpro->viewEdit();
            break;
        case 'edituser':
            $edituser = new AdUserController();
            $edituser->viewEdit();
            break;
        case 'delcate':
            $delcate = new AdCategoryController();
            $delcate->delcate();
            break;
        case 'delpro':
            $delpro = new AdProductController();
            $delpro->delpro();
            break;
        case 'deluser':
            $deluser = new AdUserController();
            $deluser->deluser();
            break;
        case 'insertcate':
            $insertcate = new AdCategoryController();
            $insertcate->addCate();
            break;
        case 'insertpro':
            $insertpro = new AdProductController();
            $insertpro->addPro();
            break;
        case 'edit_cate':
            $editcate = new AdCategoryController();
            $editcate->editCate();
            break;
        case 'edit_pro':
            $editpro = new AdProductController();
            $editpro->editPro();
            break;
        case 'edit_user':
            $edituser = new AdUserController();
            $edituser->editUser();
            break;
        
        default:
            $product = new AdProductController();
            $product->viewPro();
            break;
    }
} else {
    $product = new AdProductController();
    $product->viewPro();
}

require_once '../admin/view/footer.php';
