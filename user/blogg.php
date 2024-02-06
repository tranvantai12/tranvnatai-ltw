<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tranvantai", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
}

$sql = "SELECT * FROM blog";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- <style>
    .product {
        position: relative;
    }

    .product-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 10px;
        text-align: center;
    }

    .product img {
        max-width: 100%;
        height: auto;
    }
</style> -->

<div class="row px-5 product">
    <?php foreach ($resultSet as $row) : ?>
        
            <img class="card-img-top" src="asset/images/<?= $row['image'] ?>" alt="">
            <div class="product-info">
                <h4 class="card-title"><?= $row['title'] ?></h4>
                <p>ID: <?= $row['id'] ?></p>
                <p>Content: <?= $row['content'] ?></p>
            </div>
      
    <?php endforeach; ?>
</div>
