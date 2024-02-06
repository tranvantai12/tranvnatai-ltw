<?php
$sql = 'SELECT * FROM category';
$result = $f->getAll($sql);
print_r($result);
?>
<div style="margin-bottom: 20px;">
<div>
    <a href="<?= PATH_ADMIN?>page=catAdd" ><button type="button" class="btn btn-primary">Thêm</button></a>
</div>

</div>
<table class="table table-bordered">
    <tr>
        <th></th>
        <th>Tên danh mục</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    $i=1;
    foreach ($result as $value):
    ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $value['category_name'] ?></td>
        <td><a href="<?= PATH_ADMIN?>page=catEdit&catId=<?= $value['id'] ?>"><img src="../asset/images/l2.png" style="width: 20px; height: 20px;" /></a></td>
        <td><a href="<?= PATH_ADMIN?>page=catDel&catId=<?= $value['id'] ?>"><img src="../asset/images/l3.png" style="width: 20px; height: 20px;" /></a></td>
    </tr>
    <?php
    $i++;
    endforeach;
    ?>
</table>
