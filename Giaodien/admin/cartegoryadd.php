<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"; //gọi tới file này
?>

<?php
$cartegory = new cartegory; //tạo đối tượng mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['cartegory_name'];                         //lấy ở input
    $insert_cartegory = $cartegory->insert_cartegory($cartegory_name); //gọi hàm bên class cartegory insert nó vào
}
?>

<div class="admin-content-right">
    <div class="admin-content-right-category_add">
        <h1>Thêm danh mục</h1>
        <form action="" method="POST">
            <input required name="cartegory_name" type="text" placeholder="Nhập tên danh mục">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>

</html>