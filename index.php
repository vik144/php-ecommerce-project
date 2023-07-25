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
    <?php include "navbar.php"; ?>
    <?php
      // Check if the session variable 'username' is set
      if (isset($_SESSION['fname'])) {
          // The 'username' session variable is set
          echo ' 
             <div class="container" id="alertbox">
                 <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                     role="alert">
                     <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                         <path
                             d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                     </svg>
                     <p>Welcome <b>'.$_SESSION["fname"]. $_SESSION["lname"].'</b>    See our new Arrivals and get 50% on clearance stock!!!!.</p>
         
                     <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                         <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                             <title>Close</title>
                             <path
                                 d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                         </svg>
                     </span>
                 </div>
             </div>';
          
      } 
?>
    <!-- nav bar end -->
    <!-- hero start -->
    <div class="relative overflow-hidden bg-white">
        <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
            <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
                <div class="sm:max-w-lg">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Summer styles are finally
                        here</h1>
                    <p class="mt-4 text-xl text-gray-500">This year, our new summer collection will shelter you from the
                        harsh elements of a world that doesn't care if you live or die.</p>
                </div>
                <div>
                    <div class="mt-10">
                        <!-- Decorative image grid -->
                        <div aria-hidden="true"
                            class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                            <div
                                class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                <div class="flex items-center space-x-6 lg:space-x-8">
                                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                    </div>
                                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                    </div>
                                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg"
                                                alt="" class="h-full w-full object-cover object-center" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#"
                            class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">Shop
                            Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero end -->
    <!-- product collection start -->
    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Collections</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                                alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                class="h-full w-full object-cover object-center" />
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Desk and Office
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Work from home accessories</p>
                    </div>
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                                alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                                class="h-full w-full object-cover object-center" />
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Self-Improvement
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Journals and note-taking</p>
                    </div>
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg"
                                alt="Collection of four insulated travel bottles on wooden shelf."
                                class="h-full w-full object-cover object-center" />
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Travel
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Daily commute essentials</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product collection end -->
    <!-- footer starts -->
    <?php include "footer.php"?>
    <!-- footer ends -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
    </script>

    <script>
    $(".closealertbutton").click(function(e) {
        // $('.alertbox')[0].hide()
        // e.preventDefault();
        pid = $(this).parent().parent().hide(500)
        console.log(pid)
        // $(".alertbox", this).hide()
    })
    </script>
</body>

</html>