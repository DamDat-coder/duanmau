<?php
class ProductModel
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function getProduct($sp)
    {
        $sql = "SELECT * FROM product";
        if ($sp == 1) {
            $sql .= " ORDER BY view DESC LIMIT 4";
        } else {
            $sql .= " ORDER BY id ASC";
        }
        return $this->db->getAll($sql);
    }

    function amountProducts()
    {   
        $sql = "SELECT * FROM product WHERE amount != 0 ORDER BY amount ASC LIMIT 4";
        return $this->db->getAll($sql);
    }

    function updateProView($idpro, $newViewCount)
    {
        $sql = "UPDATE product SET view = ? WHERE id = ?";
        $param = [$newViewCount, $idpro];
        return $this->db->update($sql, $param);
    }

    function getIdPro($idpro)
    {
        if ($idpro > 0) {
            $sql = "SELECT * FROM product WHERE id = ?";
            return $this->db->getOne($sql, [$idpro]);
        }
    }

    function getIdCate($idpro)
    {
        $sql = "SELECT idcate FROM product WHERE id = ?";
        return $this->db->getOne($sql, [$idpro]);
    }

    function get_cate_pro($idpro, $idcate)
    {
        $sql = "SELECT * FROM product WHERE idcate = ? AND id <> ? LIMIT 3";
        return $this->db->getAll($sql, [$idcate, $idpro]);
    }

    function insertPro($data)
    {
        $sql = "INSERT INTO product(name,price,amount,image,view,idcate) VALUES(?,?,?,?,?,?)";
        $param = [$data['name'], $data['price'], $data['amount'], $data['image'], $data['view'], $data['idcate']];
        return $this->db->insert($sql, $param);
    }

    function deletePro($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    function updatePro($data)
    {
        $sql = "UPDATE product SET name = ?,price = ?,amount = ?,image = ?,view = ? WHERE id = ?";
        $param = [$data['name'], $data['price'], $data['amount'], $data['image'], $data['view'], $data['id']];
        return $this->db->update($sql, $param);
    }

    function get_all_cate_pro($idcate)
    {
        $sql = "SELECT * FROM product WHERE idcate = ?";
        return $this->db->getAll($sql, [$idcate]);
    }

    // Thêm phương thức tìm kiếm sản phẩm
    function searchProducts($query)
        {
            $sql = "SELECT * FROM product WHERE name LIKE ?";
            return $this->db->getAll($sql, ['%' . $query . '%']);
        }
}
?>
