<?php 


//Need to save order into order table in database
//Need to save order details into order_details table in database

class Order{

  public $userId;
  public $productId;
  public $quantity;
}

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  //get cart from session
  $cart = $_SESSION["cart"];
}
if($cart == null) {
  echo "Cart cannot be empty";
}
else{
  foreach($cart as $item){
    echo $item['product_name'];
    echo $item['product_price'];
    echo $item['product_quantity'];
    echo $item['product_id'];
  }
}

if(isset($_POST['submit'])){
  $userId = $_SESSION['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $cardname = $_POST['cardname'];
  $cardnumber = $_POST['cardnumber'];
  $expmonth = $_POST['expmonth'];
  $expyear = $_POST['expyear'];
  $cvv = $_POST['cvv'];

  echo $qty;
}

