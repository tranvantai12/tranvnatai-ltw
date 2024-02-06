<?php
// process_add_product.php

// Bao gồm tệp Database.php để sử dụng class Database
require_once 'Database.php';

// Khởi tạo đối tượng Database
$f = new Database1();

// Tiếp tục với mã khác ở đây...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productType = $_POST['productType'];
    $productDescription = $_POST['productDescription'];
    $productSalePrice = isset($_POST['productSalePrice']) ? $_POST['productSalePrice'] : null;

    if ($_FILES['productImage']['error'] == UPLOAD_ERR_OK) {
        // Lấy thông tin về tệp tải lên
        $fileName = $_FILES['productImage']['name'];
        $fileTmpName = $_FILES['productImage']['tmp_name'];
        $fileSize = $_FILES['productImage']['size'];
        $fileType = $_FILES['productImage']['type'];

        // Đường dẫn lưu trữ tệp trên server
        $uploadDir = '../asset/images/';
        $uploadPath = $uploadDir . $fileName;

        // Di chuyển tệp tải lên vào thư mục lưu trữ
        move_uploaded_file($fileTmpName, $uploadPath);

        // Thực hiện truy vấn SQL để thêm sản phẩm vào cơ sở dữ liệu với đường dẫn hình ảnh
        $sqlAddProduct = "INSERT INTO product (name, price, Loai, description, sale_price, image) 
                          VALUES ('$productName', '$productPrice', '$productType', '$productDescription', '$productSalePrice', '$uploadPath')";
        
        // Thực hiện truy vấn thêm sản phẩm
        $f->exec($sqlAddProduct);

        // Chuyển hướng người dùng về trang danh sách sản phẩm sau khi thêm
        header("Location:index.php");
        exit();
    } else {
        // Xử lý lỗi tải lên hình ảnh
        echo "Có lỗi xảy ra khi tải lên hình ảnh.";
    }


}
$f->close();
?>
 
