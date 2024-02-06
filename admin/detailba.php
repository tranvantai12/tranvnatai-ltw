
<?php
if (!defined('PATH_ADMIN')) {
    define('PATH_ADMIN', '/admin/Database');
}
// Bao gồm tệp Database.php để sử dụng class Database
require_once 'Database.php';

// Khởi tạo đối tượng Database
$f = new Database1();

// Sử dụng $f để thực hiện các truy vấn SQL hoặc các thao tác khác trên cơ sở dữ liệu
$result = $f->getAll('SELECT * FROM product');
// Số lượng sản phẩm trên mỗi trang
$soSanPhamTrenTrang = 5;

// Số trang hiện tại
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính vị trí bắt đầu của sản phẩm trên trang hiện tại
$viTriBatDau = ($trangHienTai - 1) * $soSanPhamTrenTrang;

// Câu truy vấn SQL với LIMIT để lấy chỉ số sản phẩm trên trang hiện tại
$sql = "SELECT * FROM product LIMIT $viTriBatDau, $soSanPhamTrenTrang";
$result = $f->getAll($sql);

// Tính tổng số sản phẩm
$sqlTongSoSanPham = "SELECT COUNT(*) as tongSoSanPham FROM product";
$tongSoSanPham = $f->getOne($sqlTongSoSanPham)['tongSoSanPham'];

// Tính tổng số trang
$tongSoTrang = ceil($tongSoSanPham / $soSanPhamTrenTrang);
?>

<div class="row content">
    <h1>Gio hàng</h1>

    <table border="1">
        <tr>
            <th></th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Loại</th>
            <th>Chi tiết</th>
            <th>Khuyến mãi</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <div class="add-product-form">
    <h2>Thêm Sản Phẩm Mới</h2>
    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
        <label for="productName">Tên Sản Phẩm:</label>
        <input type="text" id="productName" name="productName" required>
    
        <label for="productPrice">Giá:</label>
        <input type="number" id="productPrice" name="productPrice" required>

        <label for="productType">Loại:</label>
        <input type="text" id="productType" name="productType" required>

        <label for="productDescription">Chi Tiết:</label>
        <textarea id="productDescription" name="productDescription" rows="4" required></textarea>

        <label for="productSalePrice">Khuyến Mãi:</label>
        <input type="number" id="productSalePrice" name="productSalePrice">

        <label for="productImage">Hình Ảnh:</label>
        <input type="file" id="productImage" name="productImage" accept="asset/images/*">

        <button type="submit" class="btn btn-success">Thêm Sản Phẩm</button>
    </form>
</div>

        <?php
        foreach ($result as $row) {
        ?>
            <tr class='class'>
                <td><input type='checkbox'><?= $row['id'] ?></td>
                <td><img src='../asset/images/<?= $row['image'] ?>' alt="" style='width:150px' /></td>
                <td><p><?= $row['name'] ?></p></td>
                <td><p><?= $row['price'] ?></p></td>
                <td><p><?= $row['Loai'] ?></p></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['sale_price'] ?></td>
                <td><img src="../asset/images/s1.jpg" style="width: 20px; height: 20px;" /></td>
                <td><img src="../asset/images/l3.png" style="width: 20px; height: 20px;" /></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <div class="pagination">
        <ul>
            <?php
            // Trong vòng lặp phân trang
for ($i = 1; $i <= $tongSoTrang; $i++) {
    echo "<li><a href='" . PATH_ADMIN . "page=detailba&trang=$i'>$i</a></li>";

}

            ?>
        </ul>
    </div>

    <div class="p-2 text-end">
        <p>
            <button type="submit" class="btn btn-success">Add</button>
        </p>
    </div>
</div>



<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border: 2px solid black; /* Thêm viền đen cho bảng */
}

th, td {
    border: 1px solid #ccc;
    text-align: center;
    padding: 10px;
}

th {
    background-color: #f2f2f2;
}

img {
    max-width: 100%;
    height: auto;
}

.product-info p {
    margin: 0; /* Loại bỏ margin mặc định của thẻ <p> */
}

.pagination {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pagination ul {
    list-style: none;
    display: flex;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    text-decoration: none;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.pagination a:hover {
    background-color: #eee;
}

.p-2.text-end {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.p-2.text-end button {
    margin-left: 10px;
}


</style>

