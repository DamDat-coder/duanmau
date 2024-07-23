<?php

class CategoryModel{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    function getCate(){
        $sql = "SELECT * FROM category";
        return $this->db->getAll($sql);
    }
    function insertCate($data){
        $sql = "INSERT INTO category(cate_name) VALUES(?)";
        //$data =["cate_name",...]
        $param =[$data['cate_name']];
        return $this->db->insert($sql,$param);
    }
    function updateCate($data){
        $sql = "UPDATE category SET cate_name = ?WHERE id = ?";
        $param =[$data['cate_name'],$data['id']];
        return $this->db->update($sql,$param);
    }
    function delCate($id) {
        $sql = "DELETE FROM category WHERE id = ?";
        $this->db->delete($sql,[$id]);
    }
    function getIdcate($id) {
        $sql = "SELECT * FROM category WHERE id = $id";
        return $this->db->getone($sql);
    }
}