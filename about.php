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
    <section class="relative bg-cover bg-center h-96" style="background-image: url('./img/seriesx.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center">
            <div>
                <h1 class="text-4xl font-bold text-white mb-4">Watch Box</h1>
                <p class="text-xl text-white">Luxury Watches for Business Professionals</p>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section class="py-12 px-6 bg-white">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-6">About Watch Box</h2>
            <p class="text-gray-600">
                Since our inception, Watch Box has been dedicated to offering only the finest luxury watches to our discerning clientele. Each timepiece is a testament to our commitment to excellence, design, and the rich tradition of watchmaking. 
            </p>
            <p class="mt-4 text-gray-600">
                Business professionals know the importance of making a lasting impression. With a piece from Watch Box, ensure that your timepiece speaks volumes about your commitment to quality and style.
            </p>
        </div>
    </section>

    <?php include "footer.php";?>

</body>

</html>