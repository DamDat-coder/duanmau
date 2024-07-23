<?php

class UserModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBase();
    }
    function checkUser($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        return  $this->db->getone($sql);
    }

    function insertUser($data)
    {
        $sql = "INSERT INTO user(username,password,email) VALUES (?,?,?)";
        $param = [$data['username'], $data['password'], $data['email']];
        return $this->db->insert($sql, $param);
    }

    function checkmail($email)
    {
        $sql = "SELECT * FROM user WHERE email='$email'";
        return  $this->db->getone($sql);
    }
    function checkUsername($username)
    {
        $sql = "SELECT * FROM user WHERE username='$username'";
        return  $this->db->getone($sql);
    }
    function getUser()
    {
        $sql = "SELECT * FROM user";
        return $this->db->getAll($sql);
    }
    function getIdUser($iduser)
    {
        if ($iduser > 0) {
            $sql = "SELECT * FROM user WHERE id = $iduser";
            return $this->db->getOne($sql);
        }
    }
    function updateUser($data)
    {
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        $param = [$data['password'], $data['id']];
        return $this->db->update($sql, $param);
    }
    function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
    function getUserByUsername($username) {
        $query = "SELECT id, username, email, password FROM user WHERE username = ?";
        $params = [$username];
        return $this->db->getOne($query, $params);
    }
    
}
