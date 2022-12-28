<?php
include "lib/database.php"; //gọi đến file này
?>
<?php

class product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
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

    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_sale = $_POST['product_price_sale'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name']; //chỉ lấy được tên
        //Khi POST ảnh được vứt vào folder tạm, giờ chuyển từ đó sang file uploads tên file là $_FILES['product_img']['name']
        move_uploaded_file($_FILES['product_img']['tmp_name'], "uploads/" . $_FILES['product_img']['name']);
        $query = "INSERT INTO tbl_product (
            product_name, 
            cartegory_id,
            brand_id,
            product_price,
            product_price_sale,
            product_desc,
            prodcut_img) 
            VALUES(
            '$product_name',
            '$cartegory_id',
            '$brand_id',
            '$product_price',
            '$product_price_sale',
            '$product_desc',
            '$product_img')";

        $result = $this->db->insert($query);  //bên file database.php; this để gọi hàm thành viên khác
        if ($result) {
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $product_id = $result['product_id']; //lấy product_id mới nhất
            $filename = $_FILES['product_img_desc']['name'];
            $filetmp = $_FILES['product_img_desc']['tmp_name'];

            foreach ($filename as $key => $value) { //index và data
                move_uploaded_file($filetmp[$key], "uploads/" . $value);
                $query = "INSERT INTO tbl_product_img_desc (product_id, product_img_desc) VALUES('$product_id', '$value')";
                $result = $this->db->insert($query);
            }
        }
        // header('Location:brandlist.php');
        // return $result; bỏ vào là dừng không lặp lại
    }
    public function show_brand_ajax($cartegory_id)
    {
        $query = "SELECT * FROM tbl_brand where cartegory_id = '$cartegory_id'";
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