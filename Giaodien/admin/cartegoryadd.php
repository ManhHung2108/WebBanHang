<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"; //gọi tới file này
?>

<?php
$cartegory = new cartegory; //tạo đối tượng mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    if (empty(trim($_POST['cartegory_name']))) {
        $errors['cartegory_name']['required'] = 'Danh muc khong duoc de trong';
    }
    if (empty($errors)) {
        $cartegory_name = $_POST['cartegory_name'];                         //lấy ở input
        $insert_cartegory = $cartegory->insert_cartegory($cartegory_name); //gọi hàm bên class cartegory insert nó vào
    }
}
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm danh mục</h1>
        <form action="" method="POST">
            <input name="cartegory_name" type="text" placeholder="Nhập tên danh mục">

            <?php if (!empty($errors['cartegory_name']['required'])) {
                //dua ra thong bao loi
                echo '<spans style="color: red; font-size: 12px">' . $errors['cartegory_name']['required'] . '</spans>';
            }
            ?>

            <button type="submit">Thêm</button>
            <!-- <input type="submit" placeholder="Thêm"> -->
        </form>
    </div>
</div>
</section>
</body>

</html>