<?php

class ProductController
{
    private $category;
    private $product;
    private $data = [];

    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->product = new ProductModel();
    }

    public function view($view, $data = [])
    {
        $view = __DIR__ . '/../view/' . $view . '.php';
        require_once $view;
    }

    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $product = $this->product->getIdPro($id);

        if (is_array($product)) { // is_array trả về mảng
            $newViewCount = $product['view'] + 1;
            $this->product->updateProView($id, $newViewCount);

            $this->data['dsspdm'] = $this->product->get_cate_pro($id, $product['idcate']);
            $this->data['spct'] = $product;

            $this->view('detail', $this->data);
        } else {
            echo "Không có sản phẩm này";
        }
    }
    
    public function viewProcate()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id']; 
            $this->data['dsdm'] = $this->category->getCate();
            $this->data['cate'] = $this->category->getIdcate($id);
            $this->data['procate'] = $this->product->get_all_cate_pro($id);

            $this->view('procate', $this->data);
        } else {
            echo "Không có danh mục này";
        }
    }

    public function search()
    {
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
            $this->data['dsdm'] = $this->category->getCate();
            $this->data['products'] = $this->product->searchProducts($query);
            $this->view('search', $this->data);
        } else {
            echo "Vui lòng nhập từ khóa tìm kiếm.";
        }
    }
}
?>
