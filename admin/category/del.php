<?php
$catId =$_GET['catId'];
$sql = "SELECT * FROM product WHERE cat_id = $catId";
$cat = $f->getAll($sql);
if(count($cat)>0){
    echo "<script>";
    echo "if (confirm('danh mục đã có sản phẩm không dc xóa')) {";
        echo " window.location.href= 'http://localhost/tranvantai-2121110082/admin/index.php?page=castList'";
        echo "} else{";
            echo "window.location.href ='';";
            echo "}";
            echo "</script>";
            exit();
}
else {
    $f->delRecord("category", $catId);
    header("Location:".PATH_ADMIN."page=castList");
    exit();
}

?>