<div class="row content">
<h1>Gio hàng</h1>
    <form action="<?= PATH ?>page=cart" method="post">
	<?php
	if(!isset($_SESSION['user'])){
		echo "<p>Đăng nhập để xem giỏ hàng</p>";
		exit();
	}
	if(!isset($_SESSION['cart']) || $_SESSION['number_of_item'] == 0){
		echo "<p>Chưa có sản phẩm trong giỏ hàng</p>";
	}
    else{
	?>
    <table border="1">
        <tr>
            <th></th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
            <th>id</th>
        </tr>
        <?php
        $cart = $_SESSION['cart'];
        $a = $_SESSION['amount'];
        $n = count($cart);
        $txt = "(";
        for($i = 0; $i < $n; $i++){
            $txt.= $cart[$i];
            if($i<$n-1){
                $txt.= ",";
            }
        }
        $txt.=")";
       $sql = "SELECT * FROM product WHERE id IN ".$txt;
       $result = $f->getAll($sql);
       $i = 0;
       $s=0;
       foreach($result as $row):
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $q = $_POST['amount'.$i];
            $_SESSION['amount'][$i] = $q;
        }
      else {
        $q = $a[$i];
      }
        ?>
        <tr class='class'>
            <td><input type='checkbox'></td>
            <td><img src='asset/images/<?= $row['image'] ?>' alt="" style='width:150px' /></td>
            <td><p><?= $row['image'] ?></p></td>
            <td><p><?= $row['price'] ?></p></td>
            <td><input class="text-center" type="number" name="amount<?= $i ?>" value="<?= $q; ?>" min="1" max="5"/></td>
            <td><?= $row['price']*$q ?></td>
            <td>
                <!-- <button type='button' class='btn btn-success rounded'><i class='fa-solid fa-toggle-off'></i></button>
                <button type='button' class='btn btn-primary rounded'><i class='fa-regular fa-eye'></i></button> 
                <button type='button' class='btn btn-info rounded'><i class='fa-solid fa-pen-to-square'></i></button>  -->
               <a href="<?= PATH?>page=delItemCart&id=<?= $row['id']?>"> <button type='button' class='btn btn-info rounded'><i class='fa fa-trash'></i></button> </a>
            </td>
            <td></td>
        </tr>
        <?php
           $s += $row['price']*$q;
        $i++;
     endforeach; 
     ?>
        <tr>
         
            <td colspan=5>Tổng cộng</td>
            <td colspan=4><?= $s; ?></td>
        </tr>
    </table>
    <div class="p-2 text-end">
        <p>
            <button type="submit" class="btn btn-success">Cap nhap</button>
            <a href="<?= PATH ?>page=delCart"> <button type='button' class='btn btn-success'>Hủy giõ hàng</button> </a>

        </p>
    </div>
    </form>
    <?php
    }
    ?>
</div>
<style>
    table {
        width: 1500px;
    }

    table,
    tr,
    td,
    th {
        border: 1px solid;
        border-collapse: collapse;
        text-align: center;
    }
</style>
