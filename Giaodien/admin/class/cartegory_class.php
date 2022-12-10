<?php
include "database.php"; //gọi đến file này
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
        $querry = "INSERT INTO tbl_cartegory(category_name) VALUES ('$cartegory_name')";
        $result = $this->db->insert($querry);  //bên file database.php
        return $result;
    }
}
?>