<?php
$catId = $_GET['id'];
$sql_cat ="SELECT category_name FROM category WHERE id = $catId";
$resultCat = $f->getOne($sql_cat);
$sql = "SELECT * FROM product WHERE cat_id = $catId";
$result = $f->getAll($sql);
?>
<div class="row px-5 product">
  <h1 style="text-align:center"><?= $resultCat['category_name'] ?></h1>
  <?php
  foreach($result as $value):
  ?>
  <div class="col-md-3">

<img class="card-img-top" src="asset/images/<?= $value['image']?>" alt="">

<h4 class="card-title" ><?= $value['name']?></h4>
<div class="d-flex justify-content-between mb-3">
  <div class="p-2">
<p><span class="text-danger"><?= $value['sale_price']?></span> <br>
<a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"><button 
type="button" class="btn btn-primary rounded">See profile</button></a></p>
  </div>
  <div class="p-2 text-right">
<p><span class="text-decoration-line-through"><?= $value['price']?></span> <br>
<a href="<?= PATH ?>page=addToCart&id=<?= $value['id'] ?>"><button 
type="button" class="btn btn-primary rounded">Add Tocart</button></a></p>
  </div>
  </div>
</div>
<?php
endforeach;
?>
  </div>