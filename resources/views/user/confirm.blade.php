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
    <div class="w-screen h-screen image-cover flex flex-col justify-center items-center">
        <div class="bg-white w-1/2 rounded-lg shadow-lg p-4">
            <div class="head text-center py-2 border-b-2 border-dashed border-slate-300">
                <p class="font-medium text-lg">PESANAN ANDA</p>
            </div>

            <div class="data mt-8">
                <table class="w-full">
                    <tr class="text-left">
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Nama Pesanan</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Jumlah</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Harga Satuan</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Subtotal</th>
                    </tr>
                    @php
                    $total = 0
                    @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">{{ $order->menu->nama }}</td>
                        <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">{{ $order->jumlah }}</td>
                        <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">{{ number_format($order->menu->harga) }}</td>
                        <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">{{ number_format($order->menu->harga * $order->jumlah) }}</td>
                    </tr>
                    @php
                    $total += $order->menu->harga * $order->jumlah
                    @endphp
                    @endforeach
                </table>

                <div class="pt-8">
                    <p>Total tagihan : <span class="font-bold text-accent">Rp. {{ number_format($total) }}</span></p>
                </div>

                <div class="mt-8 flex justify-end gap-x-4">
                    <a href="/home" class="bg-primary text-white px-4 rounded-full py-1">Tambah Pesanan Lainnya</a>
                    <a href="/bayar/{{ $order->no_meja }}" class="bg-primary text-white px-4 rounded-full py-1">Bayar Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
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
                <div class="p-4">
                    <p class="mb-1 mt-4">Pesanan anda saat ini sedang dibuatkan, mohon menunggu. Pesanan akan diantar ke meja anda secepatnya</p>
                    <p class="font-medium mt-8 mb-1 uppercase">terima kasih telah memesan!</p>
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