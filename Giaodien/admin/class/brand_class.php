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

        //gộp 2 bảng lại, lấy ra được tên danh mục
        $query = "SELECT tbl_brand.*, tbl_cartegory.category_name 
        FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.category_id 
        ORDER BY tbl_brand.brand_id DESC";
        // $query = "SELECT tbl_brand.*, tbl_cartegory.category_name 
        // FROM tbl_brand, tbl_cartegory WHERE tbl_brand.cartegory_id = tbl_cartegory.category_id";


        $result = $this->db->select($query);  //bên file database.php lấy dữ liệu
        return $result;
    }

    public function get_brand($brand_id)
    {
        $query = "SELECT * FROM tbl_brand where brand_id = '$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_brand($brand_name, $brand_id)
    {
        $query = "UPDATE tbl_brand SET brand_name = '$brand_name' WHERE brand_id ='$brand_id'";
        $result = $this->db->update($query);
        header("Location:brandlist.php");
    }

    public function delete_brand($brand_id)
    {
        $query = "DELETE FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this->db->delete($query);
        header("Location:brandlist.php");
    }
}
?>