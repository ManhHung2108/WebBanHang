<?php
include "database.php"; //gọi đến file này
?>
<?php

class brand
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insert_brand($cartegory_id, $brand_name)
    {
        $query = "INSERT INTO tbl_brand(cartegory_id, brand_name) VALUES ('$cartegory_id', '$brand_name')";
        $result = $this->db->insert($query);  //bên file database.php; this để gọi hàm thành viên khác
        header('Location:brandlist.php');
        // return $result;
    }
    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_cartegory ORDER BY category_id DESC";
        $result = $this->db->select($query);  //bên file database.php lấy dữ liệu
        return $result;
    }
    public function show_brand()
    {
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";

        //gộp 2 bảng lại
        $query = "SELECT tbl_brand.*, tbl_cartegory.category_name 
        FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.category_id 
        ORDER BY tbl_brand.brand_id DESC";

        $result = $this->db->select($query);  //bên file database.php lấy dữ liệu
        return $result;
    }
}
?>