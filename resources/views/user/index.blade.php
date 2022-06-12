<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>

<body class="bg-gray-200">

    <!-- header start -->
    <header class="bg-primary absolute top-0 left-0 w-full flex items-center z-10 py-4">
        <div class="container mx-auto pl-16 pr-32">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <p class="text-lg text-white block cursor-default font-bold leading-4 uppercase">Lorem Cafe</p>
                </div>
                <div class="flex items-center">
                    <nav id="nav-menu" class="block static max-w-full text-white">
                        <ul class="flex gap-x-10">
                            <li class="group">
                                <a href="/home" class="{{ Request::is('home') ? 'text-accent' : '' }} group-hover:text-accent capitalize font-medium">semua menu</a>
                            </li>
                            <li class="group">
                                <a href="/home/makanan" class="{{ Request::is('home/makanan') ? 'text-accent' : '' }} group-hover:text-accent capitalize font-medium">Makanan</a>
                            </li>
                            <li class="group">
                                <a href="/home/minuman" class="{{ Request::is('home/minuman') ? 'text-accent' : ''}} group-hover:text-accent capitalize font-medium">Minuman</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- menu Section start -->
    <section class="pt-20 pb-10">
        <div class="container mx-auto flex">
            <div class="flex-1 grid grid-cols-3 gap-8">
                @foreach ($menus as $menu)
                <!-- card -->
                <div class="border border-gray-100 rounded-md shadow-lg flex flex-col bg-white overflow-hidden">
                    <div class="h-[60%]">
                        <img src="/{{$menu->gambar}}" class="h-full w-full object-cover">
                    </div>
                    <div class="p-2 px-4 h-[40%]">
                        <div class="flex flex-col h-full justify-between">
                            <div class="text-center pt-2 pb-0">
                                <span class="font-normal text-lg capitalize">{{ $menu->nama }}</span>
                            </div>
                            <div class="mt-2">
                                <p class="text-center font-medium">Rp. {{ number_format($menu->harga) }}</p>
                            </div>
                            <div class="mb-2">
                                <form action="/pesan/{{ $menu->slug }}" method="post">
                                    @csrf
                                    <div class="flex mt-4 justify-between">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 plus cursor-pointer stroke-2 stroke-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                            <input type="text" name="jumlah" class="jumlah w-[15%] text-center font-semibold" value="1">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 minus cursor-pointer stroke-2 stroke-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="button">
                                            <button type="submit" class="bg-primary rounded-full text-sm py-1 px-5 text-center text-white font-semibold shadow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                @endforeach
            </div>

            <div class="w-1/4 ml-8 relative flex flex-col justify-between">
                <div class="bg-white p-4 text-primary rounded-md fixed w-1/4 max-h-[75%] overflow-y-auto shadow-md">
                    <p class="pesanan-text text-center font-medium uppercase pb-4 text-accent">Pesanan</p>
                    <!-- pesanan start -->
                    <div class="relative">

                        @if (Session('pesanan') == null)

                        <div class="">
                            <p class="text-center pb-2 font-semibold">Belum Ada Pesanan</p>
                        </div>

                        @else

                        <?php $total = 0 ?>

                        <table>
                            @foreach (session()->get('pesanan') as $p)
                            <tr class="text-sm align-top text-left font-semibold">
                                <td class="py-2 pt-2 pr-1 w-[8%]">
                                    <div class="flex">
                                        <a href="/hapus/{{ $p['id_menu'] }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td class="py-2">
                                    <div class="">
                                        <p>{{ json_decode(json_encode($p['nama'])) }}</p>
                                    </div>
                                </td>
                                <td class="py-2 w-[27%] px-1">
                                    <div class="">
                                        <p>Rp. {{ number_format(json_decode($p['harga'] * $p['jumlah'])) }}</p>
                                    </div>
                                </td>
                                <td class="py-2 w-[10%] pl-1">
                                    <div class="jumlah">
                                        <p class="font-medium text-accent">x {{ json_decode($p['jumlah']) }}</p>
                                    </div>
                                </td>
                            </tr>
                            <?php $total += json_decode($p['harga'] * $p['jumlah']) ?>
                            @endforeach
                        </table>

                        <div class="mt-5">
                            <p>Total : <span class="text-accent font-bold">Rp. {{ number_format($total) }}</span></p>
                        </div>
                        <div class=" mt-6 flex items-center">
                            <a href="/konfirmasi" class="bg-primary font-medium text-white flex-1 text-center rounded-full shadow-lg py-1">Konfirmasi Pesanan</a>
                        </div>
                        @endif
                    </div>
                    <!-- pesanan end -->
                </div>

                <div class="p-4 text-white rounded-md fixed w-1/4 bottom-0">
                    @if ($orders)
                    <div class="bg-accent font-medium py-2 px-4 rounded-full text-white cursor-pointer w-full text-center">
                        <a href="/struk/{{ Session::get('meja') }}" class="flex justify-center gap-x-2 items-center">
                            <div>
                                <p class="float-left">Halaman Pembayaran</p>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    @endif
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

        const plus = document.querySelectorAll('.plus')
        const minus = document.querySelectorAll('.minus')
        const jumlah = document.querySelectorAll('.jumlah')


        for (let i = 0; i < plus.length; i++) {
            plus[i].addEventListener('click', function() {
                jumlah[i].value = ++jumlah[i].value;
            })

            minus[i].addEventListener('click', function() {
                if (jumlah[i].value != 1) {
                    jumlah[i].value = --jumlah[i].value;
                }
            })
        }
    </script>
</body>

</html>