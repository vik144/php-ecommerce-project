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
                    <h2 class="text-xl font-bold">Checkout</h2>
            </div>
 
                    <?php
                    if(isset($_SESSION['fname'])){
                      echo'
                      <a href="./order-confirm.view.php" class="uppercase font-medium py-2 w-full bg-blue-500 text-white rounded mt-8">
                      checkout
                      </a>';
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