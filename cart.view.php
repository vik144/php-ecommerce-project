<?php

require 'cart.php';

//create cart object

$cart = new Cart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
      echo("added to cart");
    $cart->addProduct($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['product_quantity']);
    }
    if (isset($_POST['change'])) {
      $cart->changeQuantity($_POST['productId'], $_POST['quantity']);
  }
  if (isset($_POST['clear'])) {
      $cart->clearCart();
  }
}


//function to render cart items

function displayCart($cartItems) {
  if (!empty($cartItems)) {
      echo '<h2>Your Cart:</h2>';
      $totalPrice = 0;
      foreach ($cartItems as $product) {
        if($product['quantity']!=0){
          $productTotalPrice = $product['price'] * $product['quantity'];
          $totalPrice += $productTotalPrice;
          echo '<div class="flex justify-between items-center mt-6 pt-6">
          <div class="flex items-center">
            <img src="" width="60" class="rounded-full" />
            <div class="flex flex-col ml-3">
              <span class="md:text-md font-medium">'.$product['name'].'</span>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="pr-8 flex">
                <span class="font-semibold">-</span>
                <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2"
                    value="'.$product['quantity'].'" />
                <span class="font-semibold">+</span>
            </div>
            <div class="pr-8">
                <span class="text-xs font-medium">$'.$product['price'].' for each item</span>
            </div>
            <div><i class="fa fa-close text-xs font-medium"></i></div>
        </div>
        </div>';
        }
      }
      echo '<div class="my-5"><strong>Total Price: $'.$totalPrice.'</strong></div>';
      echo '<div class="flex justify-between items-center mt-6 pt-6 border-t">
      <form method="post" action="cart.view.php">
        <button type="submit" class="text-md font-medium text-red-500" name="clear">Clear Cart</button>
                              <div class="flex items-center">
      
      </form>
          <div class="text-md font-medium text-blue-500"><a href="products.php">Continue Shopping</a></div>
      </div>
                              <div class="flex justify-center items-center">
                                  <span class="text-sm font-medium text-gray-400 mr-1">Subtotal:</span>
                                  <span class="text-lg font-bold text-gray-800">'.$totalPrice.'$CAD</span>
                              </div>
                          </div>
                      </div>
                  </div>';
  } else {
      echo '<h2 class="my-2 text-2xl text-center"><b>Your Cart is Empty</b></h2>
      <div class="my-4 flex flex-row-reverse justify-center content-center">
      <img class="w-40" src="img/empty-cart.png"></img>
      </div>';
  }
}
?>





<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Active Wear Co</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: "#da373d",
                },
            },
        },
    };
    </script>
</head>

<body class="h-full">
    <!-- navigation bar start -->
    <?php include "navbar.php";?>

    <!-- nav bar end -->
    <!-- cart starts -->

    <main class="container mx-auto my-auto h-screen">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <div class="col-span-2 p-5">
                <div class="cart flex justify-between">
                    <h2 class="text-xl font-bold">Shopping Cart</h2>
                    <h3 class="text-xl font-bold">Items</h3>

                    </div>
                <hr class="border-black-300 text-center text-2xl mt-8" />
                <div>

<!-- display cart items -->
<?php
displayCart($cart->getCart());
?>




            <div class="bg-gray-100 p-5 col-span-2 sm:col-span-1">
                <div class="checkout">
                    <h2 class="text-xl font-bold">Order Summary</h2>
                    <hr class="border-black-300 text-center text-2xl mt-8" />
                    <div class="flex justify-between mt-5 uppercase font-semibold">
                        <!-- <span>Items 3</span>
                    <span>$24.90</span> -->
                    </div>
                    <div class="mt-5">
                        <span class="text-md font-medium uppercase">Shipping</span>
                        <div class="mt-2">
                            <div class="dropdown inline-block relative w-full">
                                <select
                                    class="bg-gray-300 text-gray-700 p-2 w-full inline-flex items-center justify-between rounded">
                                    <span class="mr-1">Select delivery</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                    <option value="selected">Cash On Delivery</option>
                                    <option value="1">Pre-payment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="my-5 items-star">
                        <span class="uppercase text-md font-medium">Promo code</span>
                        <input type="text" class="p-2 w-full mt-2 bg-gray-300 rounded" placeholder="Enter your code" />
                        <button class="py-2 px-6 bg-orange-400 text-white rounded mt-3">
                            Apply
                        </button>
                    </div>
                    <hr class="border-black-300 text-center text-2xl mt-8" />
                    <?php
                    if(isset($_SESSION['fname'])){
                      echo'
                      <a  href="./checkout.view.php" class="uppercase font-medium py-2 w-full bg-blue-500 text-white rounded mt-8">
                      checkout
                      </a>';
                    }
                    else{
                      echo'<div class="text-red-500 my-4">
                      <h3><a href="login.php">Login To Place Order</a></h3>
                      </div>';
                    }
                      ?>
                </div>
            </div>
        </div>
    </main>



    <!-- cart ends -->


    <?php include "footer.php";?>

</body>

</html>