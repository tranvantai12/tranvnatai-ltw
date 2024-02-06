<?php
ob_start();
session_start();
include_once("lib/coreFuntion.php");
include_once("lib/db.php");
$db= new Database();
$f= new CoreFunction();


define("PATH","http://localhost/tranvantai-2121110082/index.php?");
require("partial/hearder.php");
?>
<?php
if(!isset($_GET['page'])){
  $page="";
}
else{
  $page=$_GET['page'];
}

$router=[
  ''=>'pages/home.php',
  'home'=>'pages/home.php',
  'product'=>'product/product.php',
  'cart'=>'cart/cart.php',
  'contact'=>'user/contact.php',
  'registration'=>'user/registration.php',
  'detail'=>'product/detail.php',
  'catProduct'=>'product/catProduct.php',
  'search'=>'product/search.php',
  'login'=>'user/login.php',
  'doLogin'=>'user/doLogin.php',
  'account'=>'user/account.php',
  'addToCart'=>'cart/addToCart.php',
  'logout'=>'user/logout.php',
  'blog'=>'user/blog.php',
  'imablog'=>'user/imablog.php',
  'blogg'=>'user/blogg.php',
  'delItemCart'=>'cart/delItemCart.php',
  'delCart'=>'cart/delCart.php',
  // 'detailba'=>'category/detailba.php',
];
foreach($router as $key => $value){
  if($page == $key){
    include_once($value);
  }
}
?>
<?php
require("partial/footer.php");
?>