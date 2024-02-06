<?php
$catId =$_GET['catId'];
$sql = "SELECT * FROM category WHERE id = $catId";
$cat = $f->getOne($sql);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catname'];
    $cat =[
        'category_name'=>$catName
    ];
    $message = $f->checkExist("category","category_name",$catName);
   if($message != 1){
    $f->message($message);
   }
   else{
        $f->editRecord("category",$catId,$cat);
    header("Location:".PATH_ADMIN."page=castList");
    exit();
   }

}
?>
<div stype="width:400px">
<form action="<?= PATH_ADMIN?>page=catEdit&catId=<?= $catId ?>" method="post" id="formLogin">
<div class="form-group">
    <label for="name">Tên danh mục</label>
    <input type="name" class="form-control" name="catname" value="<?= $cat['category_name']?>"/> 

</div>
<input type="submit" class="btn btn-primary" value="Submit"/>
</form>
</div>
