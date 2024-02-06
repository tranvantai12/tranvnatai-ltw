<?php
  $sql ="SELECT * FROM product ORDER BY created_at DESC LIMIT 0,8";
  $result = $f->getAll($sql);
?>
<div class="row px-5 product">
  <h1 style="text-align:center">Sản phẩm mới</h1>
  <?php
  foreach($result as $value):
  ?>
  <div class="col-md-3">

<img class="card-img-top" src="asset/images/<?= $value['image']?>" alt="">

<h4 class="card-title" ><?= $value['name']?></h4>
<div class="d-flex justify-content-between mb-3">
  <div class="p-2">
<p><span class="text-danger"><?= $value['sale_price']?></span> <br><a href=""><button 
type="button" class="btn btn-primary rounded">Add Cart</button></a></p>
  </div>
  <div class="p-2 text-right">
<p><span class="text-decoration-line-through"><?= $value['price']?></span> <br>
<a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"><button 
type="button" class="btn btn-primary rounded">See profile</button></a></p>
  </div>
  </div>
</div>
<?php
endforeach;
?>
  </div>

  <?php
  $sql ="SELECT * FROM product ORDER BY is_on_sale DESC LIMIT 0,4";
  $result = $f->getAll($sql);
?>
<div class="row px-5 product">
  <h1 style="text-align:center">Sản phẩm khuến mãi </h1>
  <?php
  foreach($result as $value):
  ?>
  <div class="col-md-3">

<img class="card-img-top" src="asset/images/<?= $value['image']?>" alt="">

<h4 class="card-title" ><?= $value['name']?></h4>
<div class="d-flex justify-content-between mb-3">
  <div class="p-2">
<p><span class="text-danger"><?= $value['sale_price']?></span> <br><a href=""><button 
type="button" class="btn btn-primary rounded">Add Cart</button></a></p>
  </div>
  <div class="p-2 text-right">
<p><span class="text-decoration-line-through"><?= $value['price']?></span> <br>
<a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"><button 
type="button" class="btn btn-primary rounded">See profile</button></a></p>
  </div>
  </div>
</div>
<?php
endforeach;
?>
  </div>
  <?php
  $sql_view ="SELECT * FROM product ORDER BY views DESC LIMIT 0,4";
  $result = $f->getAll($sql_view);
?>
<div class="row px-5 product">
  <h1 style="text-align:center">Sản phẩm xem nhiều nhất </h1>
  <?php
  foreach($result as $value):
  ?>
  <div class="col-md-3">

<img class="card-img-top" src="asset/images/<?= $value['image']?>" alt="">

<h4 class="card-title" ><?= $value['name']?></h4>
<div class="d-flex justify-content-between mb-3">
  <div class="p-2">
<p><span class="text-danger"><?= $value['sale_price']?></span> <br><a href=""><button 
type="button" class="btn btn-primary rounded">Add Cart</button></a></p>
  </div>
  <div class="p-2 text-right">
<p><span class="text-decoration-line-through"><?= $value['price']?></span> <br>
<a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"><button 
type="button" class="btn btn-primary rounded">See profile</button></a></p>
  </div>
  </div>
</div>
<?php
endforeach;
?>
  </div>
