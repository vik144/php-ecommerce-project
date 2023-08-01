<?php
$cart_empty=false;
if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
$total=0;
//get cart from cookie
$cart_json = $_COOKIE["cart"];
$cart = json_decode($cart_json);
// echo "<pre>";
// print_r($cart);
// echo "</pre>";
if($cart == null) {
  echo "Cart is empty";
}
else{
  foreach($cart as $key){
    $qty=$key->product_quantity;
    $indi=$key->product_price;
    $sub=(int)$qty*(int)$indi;
    $total+=$sub;
  }
}
}
else{
  $cart_empty=true;
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
                    <h2 class="text-xl font-bold">Shoping Cart</h2>
                    <h3 class="text-xl font-bold"><?php 
                    if(!$cart_empty){
                      echo count($cart);}?> Items</h3>
                    
                </div>
                <hr class="border-black-300 text-center text-2xl mt-8" />
                <div>
                    <?php
                    if(!$cart_empty){
                foreach($cart as $p){
                  echo'
        <div class="flex justify-between items-center mt-6 pt-6">
          <div class="flex items-center">
            <img src="'.$p->src.'" width="60" class="rounded-full" />
            <div class="flex flex-col ml-3">
              <span class="md:text-md font-medium">'.$p->product_name.'</span>
                <span class="text-xs font-light text-gray-400">#Size-'.$p->size.'</span>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="pr-8 flex">
                <span class="font-semibold">-</span>
                <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2"
                    value="'.$p->product_quantity.'" />
                <span class="font-semibold">+</span>
            </div>
            <div class="pr-8">
                <span class="text-xs font-medium">$'.$p->product_price.' for each item</span>
            </div>
            <div><i class="fa fa-close text-xs font-medium"></i></div>
        </div>
        </div>
        ';}}
        else{
          
          echo'
          <h2 class="my-2 text-2xl text-center"><b>Your Cart is Empty</b></h2>
          <div class="my-4 flex flex-row-reverse justify-center content-center">
          <img class="w-40" src="img/empty-cart.png"></img>
          </div>';
        }
        ?>

                    <div class="flex justify-between items-center mt-6 pt-6 border-t">
                        <div class="flex items-center">
                            <i class="fa fa-arrow-left text-sm pr-2 text-blue-500"></i>
                            <span class="text-md font-medium text-blue-500"><a href="products.php">Continue Shopping</a></span>
                        </div>
                        <div class="flex justify-center items-center">
                            <span class="text-sm font-medium text-gray-400 mr-1">Subtotal:</span>
                            <span class="text-lg font-bold text-gray-800">$<?php 
                            if(!$cart_empty)
                            {
                            echo $total;
                            }
                            else{
                              echo '0';
                            }
                            
                            ?> CAD</span>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="flex justify-between mt-3 font-semibold">
                        <span class="uppercase">Total cost</span>
                        <span>$<?php 
                        if(!$cart_empty)
                        {
                        echo $total;
                      }
                        else{
                          echo '0';
                        }
                        ?></span>
                    </div>
                    <?php
                    if(isset($_SESSION['fname'])){
                      echo'
                      <button class="uppercase font-medium py-2 w-full bg-blue-500 text-white rounded mt-8">
                      checkout
                      </button>';
                    }
                    else{
                      echo'<div class="text-red-500 my-4">
                      <h3>Login To Place Order</h3>
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