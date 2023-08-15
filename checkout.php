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
    <?php
        include 'navbar.php';
        require 'connect.php';
        
        $orderTotal = 0;
        $cartData = [];
        $userId = $_SESSION["u_id"];
        

       
        // ****** CHeck if user is logged in ******
        redirectToLoginIfNotLoggedIn();
        // ****** Get Data from Cart ******
        getCartData();
         // ****** Save order to database ******


         if (isset($_POST['submit'])) {
          
          $orderQuery = "INSERT INTO `orders`(`customer_id`, `order_total`) VALUES (" . $userId . "," . $orderTotal . ")";
          if (mysqli_query($conn, $orderQuery)) {
            
              $orderID = mysqli_insert_id($conn);
              $order_detail_query = "INSERT INTO `order_details`(`product_id`, `product_qty`, `order_id`, `price`, `product_name`) VALUES (?,?,?,?,?)";
              $stmt = mysqli_prepare($conn, $order_detail_query);
  
              if ($stmt && $cartData != null) {
                  mysqli_stmt_bind_param($stmt, "iiiis", $productID, $quantity, $orderID, $price, $name);
  
                  foreach ($cartData as $product) {
                      $productID = $product['id'];
                      $quantity = $product['quantity'];
                      $price = $product['price'];
                      $name = $product['name'];
                      mysqli_stmt_execute($stmt);
                  }
  
                  mysqli_stmt_close($stmt);
                  flashMessage("success", "Order placed successfully");
              } else {
                flashMessage("Order Failed", "Sorry your order could not be placed.");
              }
          } else {
              echo "Error with order query";
          }
      }


    ?>

    <div class=" container mx-auto p-6 mb-8">
        <!-- ... Order Receipt HTML ... -->
        <h1 class="text-2xl font-semibold mb-4">Order Receipt</h1>
        <!-- Render order receipt here -->
                  <?php renderCartData(); ?>
                  <div class="mt-4">
        <!-- Link to print receipt: with order id as query string -->
        <?php echo '<a class="bg-blue-500 hover:bg-blue-600 text-white font-semibold mx-2 py-2 px-4 rounded" target="_blank" href="order-print.php?order_id=' . $orderID . '"> Print Receipt</a>'; ?>
        <a class="bg-green-500 hover:bg-green-600 text-white font-semibold mx-3 py-2 px-4 rounded" href="index.php">Go to Home Page</a>    
    </div>

        <div class="mt-4 flex justify-end">
            <p class="text-lg font-semibold">Order Total: <span class="text-green-500"><?php echo $orderTotal; ?></span></p>
        </div>
    </div>

  

</body>




</html>

<?php
function redirectToLoginIfNotLoggedIn() {
    if (!isset($_SESSION['fname'])) {
        header("Location:login.php");
        die();
    }else{
       $userId = $_SESSION["u_id"];
    }
}

function flashMessage($title, $description) {
    echo '<div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="font-bold">' . $title . '</p>
                    <p class="text-sm">' . $description . '</p>
                </div>
            </div>
        </div>';
}

//get cart data from cookie
function getCartData() {
  global $orderTotal;
  global $cartData;

  if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
      $cartData = json_decode($_COOKIE['cart'], true);
  }
  
  if ($cartData != null) {
      foreach ($cartData as $productData) {
          $orderTotal += $productData['price'] * $productData['quantity'];
      }
  }
}
//render cart data as table rows
function renderCartData() {
  global $cartData;

  if ($cartData == null) {
      echo "Cart cannot be empty";
      return;
  }else{
    //start table
    echo '<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">';

        //create product rows
    foreach ($cartData as $productData) {
      echo '
      <tr>
      <td class="px-6 py-4 whitespace-nowrap">' . $productData['name'] . '</td>
      <td class="px-6 py-4 whitespace-nowrap">$' . $productData['price'] . '</td>
      <td class="px-6 py-4 whitespace-nowrap">' . $productData['quantity'] . '</td>
      </tr>
      ';
  }
  }
  //end table
  echo '</tbody>
  </table>';}
?>







<?php

//values from checkout form
  // $fname = $_POST['fname'];
  // $lname = $_POST['lname'];
  // $email = $_POST['email'];
  // $address = $_POST['address'];
  // $city = $_POST['city'];
  // $state = $_POST['state'];
  // $zip = $_POST['zip'];
  // $cardname = $_POST['cardname'];
  // $cardnumber = $_POST['cardnumber'];
  // $expmonth = $_POST['expmonth'];
  // $expyear = $_POST['expyear'];
  // $cvv = $_POST['cvv'];