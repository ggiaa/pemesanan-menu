<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <!-- Sidebard -->
    <section>
        <div class="flex h-screen">
            <!-- sidebar -->
            <div class="sidebar w-1/5 flex flex-col shadow-lg hidden md:block bg-primary text-white">
                <div class="text-center py-8">
                    <span class="text-2xl font-medium text-accent">ADMIN</span>
                </div>

                <div class="flex-1 overflow-auto">
                    <a href="/dashboard">
                        <div class="py-3 px-6 border-y border-slate-600 {{ Request::is('dashboard') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }} flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            Dashboard
                        </div>
                    </a>
                    <a href="/dashboard/pesanan">
                        <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/pesanan*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }} flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>
                            Pesanan
                        </div>
                    </a>
                    <a href="/dashboard/menu">
                        <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/menu*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }} flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                                <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                                <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                            </svg>
                            Data Menu
                        </div>
                    </a>
                    <a href="/dashboard/user">
                        <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/user*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }} flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>Data User
                        </div>
                    </a>
                    <a href="/dashboard/laporan">
                        <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/laporan*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }} flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                            </svg>
                            Data Penjualan
                        </div>
                    </a>
                    <form action="/dashboard/logout" method="post">
                        @csrf
                        <div class="cursor-pointer">
                            <button class="py-3 px-6 border-b border-slate-600 w-full text-left flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                Logout</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end sidebar -->

            <div class="flex flex-col flex-1">
                <div class="py-3 border-b flex justify-center relative items-center bg-primary shadow-md text-white">
                    <h1 class="text-center text-2xl font-semibold">{{ $title }}</h1>

                    <!-- nav mobile -->
                    <div id="hamburger" class="absolute right-0 px-3 md:hidden">
                        <span class="w-[26px] h-[2px] my-[7px] block bg-slate-800 origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="w-[26px] h-[2px] my-[7px] block bg-slate-800 transition duration-300 ease-in-out"></span>
                        <span class="w-[26px] h-[2px] my-[7px] block bg-slate-800 origin-bottom-left transition duration-300 ease-in-out"></span>
                    </div>
                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full md:hidden lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="/dashboard">
                                    <div class="py-3 px-6 border-y border-slate-600 {{ Request::is('dashboard') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }}">Dashboard</div>
                                </a>
                            </li>
                            <li class="group">
                                <a href="/dashboard/books" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('dashboard/books*') ? 'text-sky-500 font-semibold' : '' }}">Books</a>
                            </li>
                            <li class="group">
                                <a href="/dashboard/menu">
                                    <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/menu*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }}">Data Menu</div>
                                </a>
                            </li>
                            <li class="group">
                                <a href="/dashboard/user">
                                    <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/user*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }}">Data User</div>
                                </a>
                            </li>
                            <li class="group">
                                <a href="/dashboard/laporan">
                                    <div class="py-3 px-6 border-b border-slate-600 {{ Request::is('dashboard/laporan*') ? 'bg-slate-400 bg-opacity-40 text-accent font-semibold' : '' }}">Data Penjualan</div>
                                </a>
                            </li>
                            <li class="group">
                                <form action="/dashboard/logout" method="post">
                                    @csrf
                                    <div class="cursor-pointer">
                                        <button class="py-3 px-6 border-b border-slate-600 w-full text-left">Logout</button>
                                    </div>
                                </form>
                            </li>

                        </ul>
                    </nav>
                    <!-- end nav mobile -->

                </div>


                <div class="flex-1 overflow-auto py-6 px-10 box-border bg-slate-50">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>
    <!-- EndSidebard -->

    <script>
        const hamburger = document.querySelector('#hamburger')
        const navMenu = document.querySelector("#nav-menu")

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('hamburger-active');
            navMenu.classList.toggle('hidden');
        })
    </script>
</body>

</html>