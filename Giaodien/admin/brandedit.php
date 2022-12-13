<?php
include "header.php";
include "slider.php";
include "class/brand_class.php"; //gọi tới file này
?>

<!--------------------------- Lấy ra chính xác id của data cần sửa ---------------------------->
<?php
$brand = new brand; //tạo đối tượng mới
if (!isset($_GET['brand_id']) || $_GET['brand_id'] == null) { //Nếu url ko tồn tại cartegory_id hoặc null
    echo "<script> window.location = 'cartegorylist.php'</script>";
    // header('Location:cartegorylist.php');
} else {
    $brand_id = $_GET['brand_id'];
}

//set Value cho input
$get_brand = $brand->get_brand($brand_id); //bên class
if ($get_brand) {
    $result = $get_brand->fetch_assoc(); //Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database)
}
?>

<!----------------------------------Update----------------------------------->
<?php
$brand = new brand; //tạo đối tượng mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];                         //lấy ở input
    $update_brand = $brand->update_brand($brand_name, $brand_id); //gọi hàm bên class cartegory insert nó vào
}
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Sửa loại sản phẩm</h1>
        <form action="" method="POST">
            <input name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm"
                value="<?php echo $result['brand_name'] ?>">

            <?php if (!empty($errors['brand_name']['required'])) {
                //dua ra thong bao loi
                echo '<spans style="color: red; font-size: 12px">' . $errors['brand_name']['required'] . '</spans>';
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