

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
                <div class="flex justify-between">
                    <h2 class="text-xl font-bold">Checkout</h2>
            </div>
            <form action="./checkout.php" method="POST">
            <?php
                    if(isset($_SESSION['fname'])){
                      echo'  <h2  class="text-xl font-bold my-2">Welcome ' . $_SESSION['fname'] . '</h2>
                    ';
                    }
                    else{
                      echo'  <label for="fname" class="block text-sm font-medium text-gray-700">
                      First Name</label>
                      <input type="text" name="fname" id="fname" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="First Name" >
                      <label for="lname" class="block text-sm font-medium text-gray-700">
                      Last Name</label>
                      <input type="text" name="lname" id="lname" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Last Name" >
                      <label for="email" class="block text-sm font-medium text-gray-700">
                      Email</label>
                      <input type="email" name="email" id="email" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Email" >
                      <hr>';
                    }
                      ?>
                <h4 class="text-xl font-bold my-3">Add Shipping Address</h4>
                <label for="address" class="block text-sm font-medium text-gray-700">
                Address</label>
                <input type="text" name="address" id="address" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Address" >
                <label for="city" class="block text-sm font-medium text-gray-700">
                City</label>
                <input type="text" name="city" id="city" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="City" >
                <label for="state" class="block text-sm font-medium text-gray-700">
                State</label>
                <input type="text" name="state" id="state" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="State" >  
                <label for="zip" class="block text-sm font-medium text-gray-700">
                Zip</label>
                <input type="text" name="zip" id="zip" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Zip" >
                <hr>
                <label for="card" class="block text-sm font-medium text-gray-700">
                Card Number</label>
                <input type="text" name="card" id="card" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Card Number" >
                <label for="exp" class="block text-sm font-medium text-gray-700">
                Expiration Date</label>
                <input type="text" name="exp" id="exp" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-1/2 shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="MM/YY" >
                <label for="cvv" class="block text-sm font-medium text-gray-700">
                CVV</label>
                <input type="text" name="cvv" id="cvv" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-1/2 shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="CVV" >
                <hr>
                <div class="flex justify-between gap-x-2">
                    <a href="./cart.view.php" class="uppercase font-medium py-2 w-full mt-8">
                    back to cart
                    </a>
                    <button type="submit" name="submit" class="uppercase font-medium py-2 w-full bg-blue-500 text-white rounded mt-8">
                    Place order
                    </button>
  </form>
                   
                </div>
            </div>
        </div>
    </main>



    <!-- cart ends -->


    <?php include "footer.php";?>

</body>

</html>