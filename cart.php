<?php 

class Cart {
  public $product_name;
  public $product_price;
  public $product_quantity;
  public $size;
  public $src;
}

$cart = new Cart();

if(isset($_POST)) {
  $cart->product_name = $_POST["product_name"];
  $cart->product_price = $_POST["product_price"];
  $cart->product_quantity = $_POST["product_quantity"];
  $cart->size = $_POST["size"];
  $cart->src = $_POST["img_src"];
}
if (isset($_COOKIE['cart'])) {
  echo 'iran prevuous cooie';
  $cart_json = $_COOKIE["cart"];
  $cartprevious = json_decode($cart_json);
  $cartprevious[]=$cart;
  $cart_json_latest = json_encode($cartprevious);
  setcookie("cart", $cart_json_latest); 
}
else{
  echo 'iran new cooie';
  // $temp=['product_name'=>$cart->product_name,'product_price'=>$cart->product_price,'product_quantity'=>$cart->product_quantity,'size'=>$cart->size,'src'=>$cart->src];
  $temp[]=$cart;
  $cart_json_new = json_encode($temp);
  setcookie("cart", $cart_json_new);
}
if (isset($_COOKIE['cart'])) {
  echo $_COOKIE['cart'];
} else {
  echo "Cookie 'cookie_name' is not set.";
}

header("Location: cart.view.php");


//set cart to cookie with json

//redirect to cart.view.php