<?php
session_start();
include("../lib/coreFuntion.php");
$f= new CoreFunction();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $sql = "SELECT * FROM user WHERE 
    email = '". $email ."' AND password = '". ($pass)."' AND role = 'admin'";

    $result = $f->getOne($sql);
    // print_r($result);
    if(!is_null($result)){
        $_SESSION['admin'] = $result['username'];
        header("Location:index.php");
        // echo'da thanh cong';   
        // echo $sql; 
        }
    else{
        // echo "kkk";
        header("Location:login.php");
    }
}
?>
