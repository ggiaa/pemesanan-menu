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
                @foreach ($menus as $menu)
                <!-- card -->
                <div class="border rounded-md shadow-lg flex flex-col">
                    <img src="/image/cover.png" class="rounded-t-lg">
                    <div class="p-2 h-full px-4">
                        <div class="flex flex-col h-full">
                            <div class="flex-1 text-center pt-2 pb-8">
                                <span class="font-normal text-xl capitalize">{{ $menu->nama }}</span>
                            </div>
                            <p class="text-center font-bold">Rp. {{ number_format($menu->harga) }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <form action="/home/pesan/{{ $menu->slug }}" method="post">
                                    @csrf
                                    <div class="button">
                                        <input type="text" name="jumlah" class="jumlah w-[15%]" value="1">
                                        <p class="plus">+</p>
                                        <p class="minus">-</p>
                                    </div>
                                    <button type="submit" class="bg-accent rounded-lg py-1 px-5 text-center text-white font-semibold">Pilih</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                @endforeach
            </div>

            <div class="w-1/4 ml-8 relative">
                <div class="bg-primary p-4 text-white rounded-md fixed w-1/4">
                    <p class="pesanan-text text-center font-medium uppercase pb-4 text-accent">Pesanan</p>
                    <!-- pesanan start -->
                    <div class="">
                        @if (Session('pesanan') == null)
                        <div class="">
                            <p class="text-center pb-2">Belum Ada Pesanan</p>
                        </div>
                        @else
                        @php
                        $total = 0
                        @endphp
                        @foreach (session()->get('pesanan') as $p)
                        <div class="flex gap-x-2 flex-wrap py-1">
                            <div>
                                <a href="/home/hapus/{{ $p['id_menu'] }}">
                                    <p class="hapus px-2 bg-red-400 rounded-full">-</p>
                                </a>
                            </div>
                            <div class="">
                                <p>{{ json_decode(json_encode($p['nama'])) }}</p>
                            </div>
                            <div class="">
                                <p>Rp. {{ json_decode($p['harga']) }}</p>
                            </div>
                            <div class="jumlah">
                                <p>x {{ json_decode($p['jumlah']) }}</p>
                            </div>
                        </div>
                        @php
                        $total += json_decode($p['harga'] * $p['jumlah'])
                        @endphp

                        @endforeach
                        <div class="mt-5">
                            <p>Total : <span class="text-accent font-bold">Rp. {{ number_format($total) }}</span></p>
                        </div>
                        <div class=" mt-6 flex items-center">
                            <a href="/home/konfirmasi" class="bg-accent text-white flex-1 text-center rounded-md py-1 text-lg">Pesan Sekarang</a>
                        </div>
                        @endif
                    </div>
                    <!-- pesanan end -->
                </div>

                @if ($orders !== null)
                <div class="bg-accent fixed bottom-8 right-8 py-1 px-4 rounded-full text-white cursor-pointer">
                    <a href="/home/struk/{{ Session::get('meja') }}" class="lg">Kembali ke halaman pesanan</a>
                </div>
                @endif
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

        plus.forEach(e => {});

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