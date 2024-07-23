<?php

class CartController {

    private $product;
    private $data;

    function __construct() {

        $this->product = new ProductModel();
        $this->data = ['dsdm' => [], 'dssp' => [], 'dsview' => []]; // Khởi tạo $data là một mảng rỗng
    }

    public function view($data) {
        require_once 'app/view/home.php'; 
    }

    function cart() {
        $this->data['dssp'] = $this->product->getProduct(2); 
        $this->data['dsview'] = $this->product->getProduct(1);
        $this->data['dssh'] = $this->product->amountProducts(1);
        $this->view($this->data); 
}
}