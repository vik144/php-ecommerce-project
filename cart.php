<?php 

class Cart {
  public $product_name;
  public $product_price;
  public $product_quantity;
}

$cart = new Cart();

if(isset($_POST)) {
  $cart->product_name = $_POST["product_name"];
  $cart->product_price = $_POST["product_price"];
  $cart->product_quantity = $_POST["product_quantity"];
}

//set cart to cookie with json
$cart_json = json_encode($cart);
setcookie("cart", $cart_json); 

//redirect to cart.view.php
header("Location: cart.view.php");