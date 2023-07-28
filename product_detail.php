<?php
$id=(int)$_GET['id'];
// echo $id;
if(is_numeric($id) && $id!=0){
  // echo " i ran wrong";
  include 'connect.php';
  $query_product="SELECT * FROM `products` WHERE `srno` = $id";
  $result_product=mysqli_query($conn,$query_product);
  $num_row=mysqli_num_rows($result_product);
}
// else{
//   header("Location:products.php");
// }
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
    <!-- product detail starts -->

    <!--
  This component uses @tailwindcss/forms and @tailwindcss/typography

  yarn add @tailwindcss/forms @tailwindcss/typography
  npm install @tailwindcss/forms @tailwindcss/typography

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]

  @layer components {
    .no-spinner {
      -moz-appearance: textfield;
    }

    .no-spinner::-webkit-outer-spin-button,
    .no-spinner::-webkit-inner-spin-button {
      margin: 0;
      -webkit-appearance: none;
    }
  }
-->

              <?php
              if($num_row ==1){
                while($row=mysqli_fetch_assoc($result_product))
                { $product_name = $row['product_name'];
                  $product_price = $row['product_price'];
              ?>
    <section>
      <div class="relative mx-auto max-w-screen-xl px-4 py-8">
        <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
          <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
            <img alt="Les Paul" src="<?php echo $row['product_src'];?>" class="aspect-square w-full rounded-xl object-cover" />

            <div class="grid grid-cols-2 gap-4 lg:mt-4">
              <img alt="Les Paul" src="https://images.unsplash.com/photo-1456948927036-ad533e53865c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" class="aspect-square w-full rounded-xl object-cover" />

              <img alt="Les Paul" src="https://images.unsplash.com/photo-1456948927036-ad533e53865c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" class="aspect-square w-full rounded-xl object-cover" />
            </div>
          </div>

          <div class="sticky top-0">
            <strong class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600"> Pre Order </strong>

            <div class="mt-8 flex justify-between">
              <!-- displaying data -->
              <div class="max-w-[35ch] space-y-2">
                <h1 class="text-xl font-bold sm:text-2xl"><?php echo $row["product_name"]?></h1>

                <p class="text-sm">Highest Rated Product</p>

                <div class="-ms-0.5 flex">
                  <?php
                  for ($i = 0; $i < $row["product_rating"]; $i++) {    
                  echo'
                  <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>';
                  }
                    ?>
                  <?php
                  for ($i = 0; $i < 5-$row["product_rating"]; $i++) {    
                    echo'
                  <svg class="h-5 w-5 text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /> -->
                  </svg>';
                  }
                  ?>
                </div>
              </div>

              <p class="text-lg font-bold">$<?php echo $row["product_price"]?> CAD</p>
            </div>

            <div class="mt-4">
              <div class="prose max-w-none">
                <p><?php echo $row["product_desc"]?></p>
              </div>

              <!-- <button class="mt-2 text-sm font-medium underline">Read More</button> -->
            </div>
            <?php }}?>
            <form class="mt-8" action="cart.php" method="post">
              <!-- <fieldset>
                <legend class="mb-1 text-sm font-medium">Color</legend>

                <div class="flex flex-wrap gap-1">
                  <label for="color_tt" class="cursor-pointer">
                    <input type="radio" name="color" id="color_tt" class="peer sr-only" />

                    <span class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"> Texas Tea </span>
                  </label>

                  <label for="color_fr" class="cursor-pointer">
                    <input type="radio" name="color" id="color_fr" class="peer sr-only" />

                    <span class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"> Fiesta Red </span>
                  </label>

                  <label for="color_cb" class="cursor-pointer">
                    <input type="radio" name="color" id="color_cb" class="peer sr-only" />

                    <span class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"> Cobalt Blue </span>
                  </label>
                </div>
              </fieldset> -->
                  <input type="hidden" value="<?php echo $product_name?>" name="product_name">
                  <input type="hidden" value="<?php echo $product_price?>" name="product_price">
              <fieldset class="mt-4">
                <legend class="mb-1 text-sm font-medium">Size</legend>

                <div class="flex flex-wrap gap-1">
                  <label for="size_xs" class="cursor-pointer">
                    <input type="radio" name="size" id="size_xs" class="peer sr-only" />

                    <span class="group inline-flex h-8 w-14 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"> 25mm </span>
                  </label>

                  <label for="size_s" class="cursor-pointer">
                    <input type="radio" name="size" id="size_s" class="peer sr-only" />

                    <span class="group inline-flex h-8 w-14 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"> 30mm </span>
                  </label>

                  <label for="size_m" class="cursor-pointer">
                    <input type="radio" name="size" id="size_m" class="peer sr-only" />

                    <span class="group inline-flex h-8 w-14 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"> 35mm </span>
                  </label>

                  <label for="size_l" class="cursor-pointer">
                    <input type="radio" name="size" id="size_l" class="peer sr-only" />

                    <span class="group inline-flex h-8 w-14 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"> 40mm </span>
                  </label>

                  <label for="size_xl" class="cursor-pointer">
                    <input type="radio" name="size" id="size_xl" class="peer sr-only" />

                    <span class="group inline-flex h-8 w-14 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"> 45mm </span>
                  </label>
                </div>
              </fieldset>

              <div class="mt-8 flex gap-4">
                <div>
                  <label for="quantity" class="sr-only">Qty</label>

                  <input type="number" name="product_quantity" id="quantity" min="1" value="1" class="w-12 rounded border-gray-200 py-3 text-center text-xs [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                </div>

                <button type="submit" class="block rounded bg-green-600 px-5 py-3 text-xs font-medium text-white hover:bg-green-500">Add to Cart</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include "footer.php";?>

    <!-- product detail ends -->
  </body>
</html>
