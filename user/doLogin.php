<?php

$email = $_POST['email'];
$pass = $_POST['pswd'];
$sql = "SELECT * FROM user WHERE email = '". $email."' AND password = '". $pass."'";
$result = $f->getOne($sql);
if(!is_null($result)){
   $_SESSION['user'] = $result['username'];
   $_SESSION['userId'] = $result['id'];
    echo $_SESSION['user'];
    // header("Location:index.php");
}
else{
    echo "Error";
}
?>