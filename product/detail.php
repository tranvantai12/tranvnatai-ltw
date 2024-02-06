<?php
$id = $_GET['id'];
$sql_view = "UPDATE product SET views = views + 1 WHERE id = $id";
$f->setQuery($sql_view);
$sql = "SELECT * FROM product WHERE id = $id";
$result = $f->getOne($sql);
?>
<div class="row">
    <div class="col-md-4 img-detail border">
        <img src="./asset/images/<?= $result['image']?>" alt="">
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="col-12">
                <h3 class="font-weight-semi-bold"><?= $result['name']?></h3>
                <div class="d-flex mb-2">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                    </div>
                </div>
                <!-- <small class="pt-1">(50 reviews)</small> -->
                <p class="pt-1"><?= $result['views']?>(review)</p>
            </div>

            <div class="col-12">
            <p class="mb-4"><?= $result['description'] ?></p>
        </div>
            <div class="col-12">
                <h3 class="font-weight-semi-bold mb-4">price:<?= $result['price'] ?></h3>
                <div class="input-group quantity mr-3" style="width: 110px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <small class="fas fa-minus"></small>
                        </button>
                    </div>
                    <input type="text" class="form-control text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <small class="fas fa-plus"></small>
                        </button>
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary mt-2" type="submit">
                        <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
