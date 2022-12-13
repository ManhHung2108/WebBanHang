<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"; //gọi tới file này
?>

<?php
$cartegory = new cartegory; //tạo đối tượng mới
$show_cartegory = $cartegory->show_cartegory(); //gọi bên class lấy được data
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách danh mục sản phẩm</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Tùy biến</th>
            </tr>
            <?php
            if ($show_cartegory) { //true
                $i = 0;
                while ($result = $show_cartegory->fetch_assoc()) { //Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database)
                    $i++; //lặp đến hết
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['category_id'] ?></td>
                <td><?php echo $result['category_name'] ?></td>
                <td><a href="cartegoryedit.php?cartegory_id=<?php echo $result['category_id'] ?>">Sửa</a>|
                    <a href="cartegorydelete.php?cartegory_id=<?php echo $result['category_id'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>
</section>
</body>

</html>