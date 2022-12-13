<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"; //gọi tới file này
?>

<!--------------------------- Lấy ra chính xác id của data cần sửa ---------------------------->
<?php
$cartegory = new cartegory; //tạo đối tượng mới
if (!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == null) { //Nếu url ko tồn tại cartegory_id hoặc null
    echo "<script> window.location = 'cartegorylist.php'</script>";
    // header('Location:cartegorylist.php');
} else {
    $cartegory_id = $_GET['cartegory_id'];
}

//set Value cho input
$get_cartegory = $cartegory->get_cartegory($cartegory_id); //bên class
if ($get_cartegory) {
    $result = $get_cartegory->fetch_assoc(); //Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database)
}
?>

<!----------------------------------Update----------------------------------->
<?php
$cartegory = new cartegory; //tạo đối tượng mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['cartegory_name'];                         //lấy ở input
    $update_cartegory = $cartegory->update_cartegory($cartegory_name, $cartegory_id); //gọi hàm bên class cartegory insert nó vào
}
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm danh mục</h1>
        <form action="" method="POST">
            <input name="cartegory_name" type="text" placeholder="Nhập tên danh mục"
                value="<?php echo $result['category_name'] ?>">

            <?php if (!empty($errors['cartegory_name']['required'])) {
                //dua ra thong bao loi
                echo '<spans style="color: red; font-size: 12px">' . $errors['cartegory_name']['required'] . '</spans>';
            }
            ?>

            <button type="submit">Sửa</button>
            <!-- <input type="submit" placeholder="Thêm"> -->
        </form>
    </div>
</div>
</section>
</body>

</html>