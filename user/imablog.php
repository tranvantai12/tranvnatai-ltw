<!-- <?php
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_POST['image'];
$sql = "SELECT * FROM blog WHERE title = '". $title."' AND content = '". $content."' AND image = '". $image."'";
$result = $f->getOne($sql);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $image = $_FILES['image'];

    if($image['size'] != 0){
        $a['image'] = $image['name'];
        $u = new Upload;
        $u->doUpload($image);
    }
   
}
?> -->

<?php
// Kết nối đến cơ sở dữ liệu (sử dụng PDO)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tranvantai", "root", "");
    // Thiết lập chế độ báo lỗi và chế độ UTF-8
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
}

// Lấy dữ liệu từ biểu mẫu (chẳng hạn từ $_POST)
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_POST['image'];
// Sử dụng prepared statement để chèn dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO blog (title, content, image) VALUES (:title, :content, :image)";
$stmt = $pdo->prepare($sql);

// Gán giá trị cho tham số
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':content', $content, PDO::PARAM_STR);
$stmt->bindParam(':image', $image, PDO::PARAM_STR);
// Thực thi truy vấn
try {
    $stmt->execute();
    echo "Bài viết đã được lưu thành công vào cơ sở dữ liệu.";
} catch (PDOException $e) {
    die("Lỗi khi thực hiện truy vấn: " . $e->getMessage());
}
?>
