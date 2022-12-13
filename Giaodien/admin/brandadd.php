<?php
include "header.php";
include "slider.php";
include "class/brand_class.php"; //gọi tới file này
?>

<?php
$brand = new brand; //tạo đối tượng mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_id = $_POST['cartegory_id'];   //Lấy 2 biến ở form
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand->insert_brand($cartegory_id, $brand_name);
}
?>
<style>
select {
    height: 30px;
    width: 200px;
}
</style>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm loại sản phẩm</h1> <br>
        <form action="" method="POST">
            <select name="cartegory_id" id="">
                <option value="#">--Chọn danh mục</option>
                <?php
                $show_cartegory = $brand->show_cartegory();
                if ($show_cartegory) {
                    while ($result =  $show_cartegory->fetch_assoc()) { //lấy của bảng tbl_category để gán vào option select

                ?>
                <option value="<?php echo $result['category_id'] ?>"> <?php echo $result['category_name'] ?> </option>
                <?php
                    }
                }
                ?>
            </select> <br>
            <input name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm">
            <button type="submit">Thêm</button>
            <!-- <input type="submit" placeholder="Thêm"> -->
        </form>
    </div>
</div>
</section>
</body>

</html>