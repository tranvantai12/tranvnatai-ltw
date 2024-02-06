<?php
require('lib/file.php');
$userId = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $image = $_FILES['image'];
    $pass = $_POST['pswd'];
    $a = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['add'],
        'username' => $_POST['user'],
        'gender' => $_POST['gender'],
    );
    if($image['size'] != 0){
        $a['avatar'] = $image['name'];
        $u = new Upload;
        $u->doUpload($image);
    }
    if($pass != ""){
        $a['password'] = ($pass);
    }
    $f->editRecord("user", $userId ,$a);
}
$sql = "SELECT * FROM user WHERE id = $userId";
$result = $f->getOne($sql);


?>
<div class="row px-5">
    <div class="col-md-3">
    <ul class="list-group">
        <li class="list-group-item active"><a class="btn" href="">Cập nhật tài khoản</a></li>
        <li class="list-group-item"><a class="btn text-dark" href="">Quản lý đơn</a></li>
        <li class="list-group-item "><a class="btn text-dark" href="<?= PATH?>page=blog">Blog</a></li>
        <a href="logout.php">Đăng xuất</a>';
        </ul>
        </div>
        <div class="col-md-9">
        <h2 class="text-success">Cập nhật tài khoản</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=account&id=<?= $userId ?>" 
        method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">username <span class="text-danger">(*)</span></label>
            <input type="text" name="name" class="form-control"  placeholder="Ho ten" 
            value ="<?= $result['name']?>" />
            
        </div>
        <div class="mb-3 mt-3">
       
 <label for='gender' class='form-label'>Giới tínhs</label><br>

Nam:<input type='radio' id='vehicle1' class='form-check-input' name='gender'
 value=1 <?php if($result['gender'] ==1 ) echo "checked"; ?> />
Nữ:<input type='radio' id='vehicle1' class='form-check-input' name='gender' 
value=0  <?php if($result['gender'] ==0 ) echo "checked"; ?> />
</div>

<div class="mb-3 mt-3">
        <label for="phone" class="form-label">Điện thoại</label>
        <!-- <imput type="text" class="form-control" id="hoten" placeholder="Hoten" name="fullname"> -->
        <input type="text" id="hoten" class="form-control" placeholder="dien thoai" 
        name="phone" value= "<?= $result['phone'] ?>"><br>
      
</div>
<div class="mb-3 mt-3">
        <label for="email" class="form-label">Email</label>
        <!-- <imput type="email" rows="5" class="form-control" id="email" placeholder="Email" name="email"> -->
        <input type="email" id="email" class="form-control" placeholder="Email" 
        name="email" value = "<?= $result['email'] ?>"><br>
     
</div>
<div class="mb-3">
        <label for="add" class="form-label">Địa chỉ</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="text" id="lop" class="form-control" placeholder="Dia chi" 
        name="add" value = "<?= $result['address'] ?>"><br> 
</div>
<div class="mb-3">
        <label for="fileInput" class="form-label">Image</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="file"  class="form-control" id="fileInput" 
        name="image" >
    
</div>
<div class="mb-3">
        <label for="user" class="form-label">Tên đăng nhập</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="text" id="ad" class="form-control" placeholder="Ten dang nhap" 
        name="user"  value = "<?= $result['username'] ?>"><br>
       
</div>
<div class="mb-3">
        <label for="pas" class="form-label">Password</label>
        <!-- <imput type="text" class="form-control" id="hoten" placeholder="Hoten" name="fullname"> -->
        <input type="password" id="pw" class="form-control" placeholder="Enter password" 
        name="pswd" ><br>
       
</div>
<button type="submit" class="btn btn-primary" name ="submit">Lấy thông tin</button>
</form>
</div>
</div>