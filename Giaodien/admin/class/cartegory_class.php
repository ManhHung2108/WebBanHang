<?php
include "lib/database.php"; //gọi đến file này
// require_once('../../database.php');
?>
<?php

class cartegory
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insert_cartegory($cartegory_name)
    {
        $query = "INSERT INTO tbl_cartegory(category_name) VALUES ('$cartegory_name')";
        $result = $this->db->insert($query);  //bên file database.php
        header('Location:cartegorylist.php');
        // return $result;
    }
    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_cartegory ORDER BY category_id DESC";
        $result = $this->db->select($query);  //bên file database.php lấy dữ liệu
        return $result;
    }
    public function get_cartegory($cartegory_id)
    {
        $query = "SELECT * FROM tbl_cartegory WHERE category_id = '$cartegory_id'";
        $result = $this->db->select($query);  //bên file database.php lấy dữ liệu
        return $result;
    }
    public function update_cartegory($cartegory_name, $cartegory_id)
    {
        $query = "UPDATE tbl_cartegory SET category_name = '$cartegory_name' WHERE category_id = '$cartegory_id'";
        $result = $this->db->update($query);  //bên file database.php lấy dữ liệu
        header('Location:cartegorylist.php');
        // return $result;
    }

    public function delete_cartegory($cartegory_id)
    {
        $query = "DELETE FROM tbl_cartegory WHERE category_id = '$cartegory_id'";
        $result = $this->db->delete($query);  //bên file database.php lấy dữ liệu
        header('Location:cartegorylist.php');
        return $result;
    }
}
?>