<div class="contact">
    <h2 class="text-success">ĐIỀN THÔN GITN LIÊN HỆ</h2>
    <form  action="<?= PATH?>page=contact" method="post">
    <div class="mb-3 mt-3">
        <label for="masv" class="form-label">Mã khách hàng</label>
        <!-- <imput type="text" class="form-control" id="masv" placeholder="Ma kh" name="userid"> -->
        <input type="text" id="masv" class="form-control" placeholder="Ma kh" name="userid"><br>
</div>
<div class="mb-3">
        <label for="hoten" class="form-label">Họ tên</label>
        <!-- <imput type="text" class="form-control" id="hoten" placeholder="Hoten" name="fullname"> -->
        <input type="text" id="hoten" class="form-control" placeholder="Hoten" name="fullname"><br>
</div>
<div class="mb-3">
        <label for="lop" class="form-label">Địa chỉ</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="text" id="lop" class="form-control" placeholder="Dia chi" name="address"><br>
</div>
<div class="mb-3 mt-3">
        <label for="email" class="form-label">Email</label>
        <!-- <imput type="email" rows="5" class="form-control" id="email" placeholder="Email" name="email"> -->
        <input type="email" id="email" class="form-control" placeholder="Email" name="email"><br>
</div>
<div class="mb-3 mt-3">
        <label for="masv" class="form-label">Nội dung liên hệ</label>
        <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
</div>
<button type="submit" class="btn btn-success" name ="submit">Lấy thông tin</button>
</form>
<?php
$userid = $name= $diachi=$email=$thongtin="" ;
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userid = $_POST["userid"];
        $name = $_POST["fullname"];
        $diachi = $_POST["address"];
        $email = $_POST["email"];
        $thongtin = $_POST["content"];
}

?>
<table class="table table-bordered">
        <tr><th>Mã khách hàng</th><td><?= $userid; ?></td></tr>
        <tr><th>Họ tên</th><td><?= $name; ?></td></tr>
        <tr><th>Địa chỉ</th><td><?= $diachi; ?></td></tr>
        <tr><th>Email</th><td><?= $email; ?></td></tr>
        <tr><th>Thông tin liên hệ</th><td><?= $thongtin; ?></td></tr>

</table>
</div>


