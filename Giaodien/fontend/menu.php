<?php
include "../admin/lib/database.php";

$db = new Database;
$query = "SELECT * FROM tbl_cartegory";
$categories = $db->select($query);  //bên file database.php lấy dữ liệu

function showCategories($categories, $parent_id = 0, $char = '')

{

    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON

    $cate_data = array();

    foreach ($categories as $key => $item) {

        // Nếu là chuyên mục con thì hiển thị

        if ($item['parent_id'] == $parent_id) {

            $cate_data[] = $item;

            unset($categories[$key]);
        }
    }



    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ

    if ($cate_data) {

        echo '<ul>';

        foreach ($cate_data as $key => $item) {

            // Hiển thị tiêu đề chuyên mục

            echo '<li>' . $item['title'];



            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp

            showCategories($categories, $item['id'], $char . '|---');

            echo '</li>';
        }

        echo '</ul>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bán hàng</title>
</head>

<body>
    <!-------------------------------Menu------------------------->
    <header>
        <div class="logo">
            <h2>SMOKE STORE</h2>
        </div>
        <div class="menu">
            <?php
            if ($categories) {
                while ($result = $show->fetch_assoc()) {
            ?>
            <li><a><?php echo $result['category_name'] ?></a>
                <ul class="submenu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Collection</a></li>
                    <li><a href="">Áo</a>
                        <ul>
                            <li><a href="">Áo Sơ Mi</a></li>
                            <li><a href="">Áo Thun</a></li>
                            <li><a href="">Áo Vest</a></li>
                            <li><a href="">Áo Khoác</a></li>
                            <li><a href="">Áo Len</a></li>
                        </ul>
                    </li>
                    <li><a href="">Quần</a>
                        <ul>
                            <li><a href="">Quần Jean</a></li>
                            <li><a href="">Quần Lửng</a></li>
                            <li><a href="">Quần Dài</a></li>
                        </ul>
                    </li>
                    <li><a href="">Hàng mới về</a></li>
                </ul>
            </li>
            <?php
                }
            }
            ?>
        </div>
        <div class="other">
            <li><input type="text" placeholder="Tìm kiếm"><i class="fas fa-search"></i></li>
            </li>
            <li><a class="fa fa-paw" href=""></a></li>
            <li><a class="fa fa-user" href=""></a></li>
            <li><a class="fa fa-shopping-bag" href="cart.html"></a></li>
        </div>
    </header>