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
    <div class="w-screen h-screen image-cover flex flex-row justify-center items-center">
        <div class="bg-primary text-white px-6 pt-6 pb-8 rounded-lg relative w-full max-w-sm shadow-xl border border-gray-400">
            <div>
                <h1 class="text-3xl text-center font-medium pb-8">Lorem Cafe</h1>
                <p class="text-center pb-5">Silahkan masukkan nomor meja kamu :</p>
                <div class="">
                    <form method="POST">
                        @csrf
                        <div class="flex w-full gap-x-2">
                            <input type="text" name="nomer_meja" autofocus class="rounded-full py-1 focus:outline-none text-black font-semibold pl-2 flex-1" autocomplete="off">
                            <button type="submit" class="bg-white rounded-full text-black font-semibold px-4 p-1 border hover:scale-[1.02] hover:bg-gray-50">Konfirmasi</button>
                        </div>

                        @error('nomer_meja')
                        <div class="text-accent text-sm text-center absolute w-full left-0 mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="modal absolute top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex flex-col justify-center items-center h-full w-full">
            <div class="bg-white rounded-lg max-w-lg text-center overflow-hidden">
                <div class="bg-gray-200 py-2 relative">
                    <div class="absolute right-3 top-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="close h-6 w-6 text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <p class="font-medium text-xl text-gray-700 uppercase">Lorem Cafe</p>
                </div>
                <div class="p-4 mt-4">
                    <p class="mb-5">Pelayan sedang menuju ke meja anda, silahkan tunggu sebentar untuk melakukan pembayaran</p>
                    <p class="font-medium mt-8 mb-1 uppercase">terima kasih!</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        const modal = document.querySelector('.modal');
        const tutup = document.querySelector('.close');

        setTimeout(function() {
            modal.classList.add('hidden')
        }, 10000)

        tutup.addEventListener('click', function() {
            modal.classList.add('hidden')
        })
    </script>
</body>

</html>