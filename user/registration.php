<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addErr = $phoneErr = $userErr = $pasErr = $birthErr = $roleErr ="";
$name = $email = $gender = $add = $phone = $username = $pas = $birth = $role= "";
if ($_SERVER["REQUEST_METHOD"] =="POST"){
        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              if (empty($_POST["name"])) {
                $nameErr = "Name is required";
              } else {
                $name = test_input($_POST["name"]);
                $flag =1;
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                  $nameErr = "Only letters and white space allowed";
                  $flag = 0;
                }
              }
              //gender
              if ($_POST["gender"] == "") {
                $genderErr = "Gender is required";
                $flag = 0;
              } else {
                $gender = test_input($_POST["gender"]);
                // check if name only contains letters and whitespace
               $flag = 1;
              }
              //email
              if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $flag = 1;
              } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
                  $flag = 0;
                }
              }
              //birth
              if (empty($_POST["birth"])) {
                $birthErr = "Birth is required";
                $flag = 0;
              } else {
                $birth = test_input($_POST["birth"]);
                // check if name only contains letters and whitespace
               $flag = 1;
              }
                      //phone
                      if (empty($_POST["phone"])) {
                        $phoneErr = "Phone is required";
                        $flag = 0;
                      } else {
                        $phone = test_input($_POST["phone"]);
                        // check if name only contains letters and whitespace
                       $flag = 1;
                       $phone_pattern = "/^\d+$/";
                       if (!preg_match($phone_pattern,$phone)) {
                        $phoneErr = "Only letters and white space allowed";
                        $flag = 0;
                      }
                      }
                      //address
                      if (empty($_POST["add"])) {
                        $addErr = "Address is required";
                        $flag = 0;
                      } else {
                        $add = test_input($_POST["add"]);
                        // check if name only contains letters and whitespace
                       $flag = 1;
                      }   
                             //username
                             if (empty($_POST["user"])) {
                                $userErr = "Username is required";
                                $flag = 0;
                              } else {
                                $user = test_input($_POST["user"]);
                                // check if name only contains letters and whitespace
                               $flag = 1;
                              } 
                                  //password
                             if (empty($_POST["pas"])) {
                                $pasErr = "Password is required";
                                $flag = 0;
                              } else {
                                $pas = test_input($_POST["pas"]);
                                // check if name only contains letters and whitespace
                               $flag = 1;
                              } 
                              if($flag == 1) {
                                $i= "temp.png";
                                if($_FILES['image']['size'] ==0){
                                echo $_FILES['image']['error'];
                                } 
                                else {
                                  require("lib/file.php");
                                  $file = $_FILES['image'];
                                  $i = $file['name'];
                                  $u = new Upload();
                                  $u->doUpload($file);
                                }
                                $user = array(
                                        "username" => $_POST["user"],
                                        "password" => password_hash($_POST["pas"], PASSWORD_DEFAULT),
                                        "name" => $_POST["name"],
                                        "email" => $_POST["email"],
                                        "phone" => $_POST["phone"],
                                        "address" => $_POST["add"],
                                        "gender" => $_POST["gender"],
                                        "role" => $_POST["role"],

                                        'avatar' => $i
                                
                                );
                                $f->addRecord("user", $user);
                              }

}
?>
<div class="row px-5">
    <h2 class="text-success">ĐIỀN THÔN GITN LIÊN HỆ</h2>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=registration" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Họ Tên <span class="text-danger">(*)</label>
        <!-- <imput type="text" class="form-control" id="masv" placeholder="Ma kh" name="userid"> -->
        <input type="text" id="masv" class="form-control" placeholder="Trần Văn Tài" name="name" value="<?= $name?>" />
        <span class="error"><?= $nameErr ?></span>
</div>
<div class="mb-3 mt-3">
        <?php
        if(isset($gender) && $gender == 1){
                echo " <label for='gender' class='form-label'>Giới tínhs</label><br>

Nam:<input type='radio' id='vehicle1' class='form-check-input' name='gender' value='1' />
Nữ:<input type='radio' id='vehicle1' class='form-check-input' name='gender' value='0' />";
}
        else{
                echo " <label for='gender' class='form-label'>Giới tínhs</label><br>

Nam:<input type='radio' id='vehicle1' class='form-check-input' name='gender' value='1' />
Nữ:<input type='radio' id='vehicle1' class='form-check-input' name='gender' value='0' checked />";
        }
       
        ?>
         <span class="error"><?= $genderErr ?></span>

</div>
<div class="mb-3">
<label for="birthday">Ngày sinh</label></br>
  <input type="date" id="datemax" class="form-control" name="birth" 
  value="<?= $birth ?>" max="1979-12-31"><br>
  <span class="error"><?= $birthErr ?></span>
</div>
<div class="mb-3">
        <label for="phone" class="form-label">Điện thoại</label>
        <!-- <imput type="text" class="form-control" id="hoten" placeholder="Hoten" name="fullname"> -->
        <input type="text" id="hoten" class="form-control" placeholder="" 
        name="phone" value="<?= $phone ?>"><br>
        <span class="error"><?= $phoneErr ?></span>
</div>

<div class="mb-3 mt-3">
        <label for="email" class="form-label">Email</label>
        <!-- <imput type="email" rows="5" class="form-control" id="email" placeholder="Email" name="email"> -->
        <input type="email" id="email" class="form-control" placeholder="Email" 
        name="email" value="<?= $email ?>"><br>
        <span class="error"><?= $emailErr ?></span>
</div>
<div class="mb-3">
        <label for="add" class="form-label">Địa chỉ</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="text" id="lop" class="form-control" placeholder="Dia chi" 
        name="add" value="<?= $add ?>"><br>
        <span class="error"><?= $addErr ?></span>
</div>

<div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="text" id="lop" class="form-control" placeholder="role" 
        name="role" value="<?= $role ?>"><br>
        <span class="error"><?= $role ?></span>
</div>

<div class="mb-3">
        <label for="add" class="form-label">Image</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="file"  class="form-control" placeholder="Dia chi" 
        name="image" />
    
</div>
<div class="mb-3">
        <label for="user" class="form-label">Tên đăng nhập</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="text" id="ad" class="form-control" placeholder="Admin" 
        name="user"  value="<?= $username ?>"><br>
        <span class="error"><?= $userErr ?></span>
</div>
<div class="mb-3">
        <label for="pas" class="form-label">Password</label>
        <!-- <imput type="text" class="form-control" id="hoten" placeholder="Hoten" name="fullname"> -->
        <input type="password" id="pw" class="form-control" placeholder="Enter password" 
        name="pas" value="<?= $pas ?>"><br>
        <span class="error"><?= $pasErr ?></span>
</div>

<button type="submit" class="btn btn-primary" name ="submit">Lấy thông tin</button>
</form>



