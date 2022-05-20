<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>

<body>

    <!-- <div class="bg-cover h-10">
        <img src="/image/cover.png" class="w-full">
    </div> -->

    <!-- header start -->
    <header class="bg-primary absolute top-0 left-0 w-full flex items-center z-10 py-3">
        <div class="container mx-auto pl-16 pr-32">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#home" class="font-bold text-lg text-white block">Lorem Cafe</a>
                </div>
                <div class="flex items-center">
                    <nav id="nav-menu" class="block static max-w-full text-white">
                        <ul class="flex gap-x-10 font-medium">
                            <li class="group">
                                <a href="" class="group-hover:text-accent uppercase">semua menu</a>
                            </li>
                            <li class="group">
                                <a href="" class="group-hover:text-accent uppercase">Makanan</a>
                            </li>
                            <li class="group">
                                <a href="" class="group-hover:text-accent uppercase">Minuman</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Hero Section start -->
    <section id="home" class="pt-20 pb-10">
        <div class="container mx-auto flex">
            <div class="flex-1 grid grid-cols-3 gap-8">
                <!-- card -->
                <div class="border rounded-md overflow-hidden shadow-lg">
                    <img src="/image/cover.png">
                    <div class="p-2">
                        <p class="text-center font-normal text-xl capitalize">Pizza</p>
                        <p class="text-center py-1">Rp. 35.400,00</p>
                        <div class="w-full flex justify-center pt-4 pb-1">
                            <button class="w-3/4 bg-accent rounded-md py-1 text-white font-semibold">Pesan</button>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>

            <div class="w-1/4 ml-8">
                <div class="bg-primary p-4 text-white rounded-md">
                    <p class="text-center font-medium uppercase pb-4 text-accent">Pesanan</p>
                    <div class="">
                        <p class="text-center pb-2">Belum Ada Pesanan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.onscroll = function() {
            const header = document.querySelector('header')
            const fixedNav = header.offsetTop;

            if (window.pageYOffset > fixedNav) {
                header.classList.add('navbar-fixed');
            } else {
                header.classList.remove('navbar-fixed');
            }
        }
    </script>
</body>

</html>