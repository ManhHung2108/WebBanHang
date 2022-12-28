<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php
$product = new product;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST, $_FILES);
    // echo '<pre>';
    // // echo print_r($_FILES);
    // echo print_r($_FILES['product_img_desc']['name']);
    // echo '</pre>';
    $insert_product = $product->insert_product($_POST, $_FILES);
}

?>
<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Thêm sản phẩm</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nhập tên sản phẩm<span style="color: red;">*</span></label>
            <input name="product_name" required type="text">
            <label for="">Chọn danh mục<span style="color: red;">*</span></label>
            <select name="cartegory_id" id="cartegory_id">
                <option value="#">--Chọn--</option>
                <?php
                $showcartegory = $product->show_cartegory();
                if ($showcartegory) {
                    while ($result = $showcartegory->fetch_assoc()) {
                ?>
                <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label>
            <select name="brand_id" id="brand_id">
                <option value="#">--Chọn--</option>
            </select>
            <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
            <input name="product_price" required type="text">
            <label for="">Giá khuyến mãi<span style="color: red;">*</span></label>
            <input name="product_price_sale" required type="text">
            <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
            <textarea name="product_desc" id="editor1" cols="30" rows="10"></textarea>
            <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
            <input name="product_img" required multiple type="file">
            <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
            <input name="product_img_desc[]" required multiple type="file">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>

<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
// CKEDITOR.replace('editor1');
CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
</script>
<script>
$(document).ready(function() { //Muốn sự kiện làm việc trên trang nên gọi hàm $(document).ready(), 
    //mọi thứ bên trong được tải ngay sau khi DOM được tải và trước khi trang đc tải
    $("#cartegory_id").change(function() { //bắt sự kiện change
        // alert($(this).val());
        var x = $(this).val() //lấy ra id của từng option
        $.get("productadd_ajax.php", { //get này phải cùng phương thức với bên productadd_ajax
            cartegory_id: x //truyền biến x sang cho productadd_ajax gán cho biến cartegory_id 
        }, function(data) {
            $("#brand_id").html(data); //gán cho select có id brand_id
        })
    })
})
</script>

</html>