<?php
//get cart from cookie
$cart_json = $_COOKIE["cart"];
$cart = json_decode($cart_json);

if($cart == null) {
  echo "Cart is empty";
}else{
  echo "Product name: " . $cart->product_name . "<br>";
  echo "Product price: " . $cart->product_price . "<br>";
  echo "Product quantity: " . $cart->product_quantity . "<br>";
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
        <h3 class="text-xl font-bold">3 Items</h3>
      </div>
      <hr class="border-black-300 text-center text-2xl mt-8" />
      <div>
        <div class="flex justify-between items-center mt-6 pt-6">
          <div class="flex items-center">
            <img src="https://admin.regalfurniturebd.com/storage/uploads/fullsize/2020-12/csm-220-web-1.jpg" width="60" class="rounded-full" />
            <div class="flex flex-col ml-3">
              <span class="md:text-md font-medium"><?=  $cart->product_name ?></span>
              <span class="text-xs font-light text-gray-400">#41551</span>
              <span class="text-sm font-light text-orange-400">Categories-1</span>
            </div>
          </div>
          <div class="flex justify-center items-center">
            <div class="pr-8 flex">
              <span class="font-semibold">-</span>
              <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2" value="1" />
              <span class="font-semibold">+</span>
            </div>
            <div class="pr-8">
              <span class="text-xs font-medium"><?=  $cart->product_price ?>$</span>
            </div>
            <div><i class="fa fa-close text-xs font-medium"></i></div>
          </div>
        </div>
        <div class="flex justify-between items-center pt-6 mt-6 border-t">
          <div class="flex items-center">
            <img src="https://admin.regalfurniturebd.com/storage/uploads/fullsize/2019-05/cfv-220-7-1-66.jpg" width="60" class="rounded-full" />
            <div class="flex flex-col ml-3">
              <span class="text-md font-medium w-auto">Product -2</span>
              <span class="text-xs font-light text-gray-400">#66999</span>
              <span class="text-sm font-light text-orange-400">Categories-2</span>
            </div>
          </div>
          <div class="flex justify-center items-center">
            <div class="pr-8 flex">
              <span class="font-semibold">-</span>
              <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2" value="1" />
              <span class="font-semibold">+</span>
            </div>
            <div class="pr-8">
              <span class="text-xs font-medium">$10.50</span>
            </div>
            <div><i class="fa fa-close text-xs font-medium"></i></div>
          </div>
        </div>
        <div class="flex justify-between items-center mt-6 pt-6 border-t">
          <div class="flex items-center">
            <img src="https://admin.regalfurniturebd.com/storage/uploads/fullsize/2021-03/cfc-204.jpg" width="60" class="rounded-full" />
            <div class="flex flex-col ml-3">
              <span class="text-md font-medium">Product -3</span>
              <span class="text-xs font-light text-gray-400">#86577</span>
              <span class="text-sm font-light text-orange-400">Categories-3</span>
            </div>
          </div>
          <div class="flex justify-center items-center">
            <div class="pr-8 flex">
              <span class="font-semibold">-</span>
              <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2" value="1" />
              <span class="font-semibold">+</span>
            </div>
            <div class="pr-8">
              <span class="text-xs font-medium">$10.50</span>
            </div>
            <div><i class="fa fa-close text-xs font-medium"></i></div>
          </div>
        </div>
        <div class="flex justify-between items-center mt-6 pt-6 border-t">
          <div class="flex items-center">
            <i class="fa fa-arrow-left text-sm pr-2 text-blue-500"></i>
            <span class="text-md font-medium text-blue-500">Continue Shopping</span>
          </div>
          <div class="flex justify-center items-center">
            <span class="text-sm font-medium text-gray-400 mr-1">Subtotal:</span>
            <span class="text-lg font-bold text-gray-800"> $24.90</span>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-100 p-5 col-span-2 sm:col-span-1">
      <div class="checkout">
        <h2 class="text-xl font-bold">Order Summary</h2>
        <hr class="border-black-300 text-center text-2xl mt-8" />
        <div class="flex justify-between mt-5 uppercase font-semibold">
          <span>Items 3</span>
          <span>$24.90</span>
        </div>
        <div class="mt-5">
          <span class="text-md font-medium uppercase">Shipping</span>
          <div class="mt-2">
            <div class="dropdown inline-block relative w-full">
              <select class="bg-gray-300 text-gray-700 p-2 w-full inline-flex items-center justify-between rounded">
                <span class="mr-1">Select delivery</span>
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
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
          <span>$24.90</span>
        </div>
        <button class="uppercase font-medium py-2 w-full bg-blue-500 text-white rounded mt-8">
          checkout
        </button>
      </div>
    </div>
  </div>
</main>



    <!-- cart ends -->


    <?php include "footer.php";?>

</body>

</html>