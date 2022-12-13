<?php
include "class/brand_class.php";
$brand = new brand;
if (!isset($_GET['brand_id']) || $_GET['brand_id'] == null) { //Nếu url ko tồn tại cartegory_id hoặc null
    echo "<script> window.location = 'cartegorylist.php'</script>";
    // header('Location:cartegorylist.php');
} else {
    $brand_id = $_GET['brand_id'];
}
$delete_brand = $brand->delete_brand($brand_id);