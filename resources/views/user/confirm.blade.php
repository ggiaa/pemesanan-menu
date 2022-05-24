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
    <div class="w-screen h-screen bg-slate-100 flex flex-col justify-center items-center">
        <div class="bg-white w-1/2 rounded-lg shadow-lg p-4">
            <div class="head text-center py-2 border-b-2 border-dashed border-slate-400">
                <p class="font-medium text-lg">PESANAN ANDA</p>
            </div>

            <div class="data mt-8">
                <table class="w-full">
                    <tr class="text-left">
                        <th>Nama Pesanan</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                    @php
                    $total = 0
                    @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->menu->nama }}</td>
                        <td>{{ $order->jumlah }}</td>
                        <td>{{ number_format($order->menu->harga) }}</td>
                        <td>{{ number_format($order->menu->harga * $order->jumlah) }}</td>
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
                    <a href="/home" class="bg-accent text-white px-4 rounded-md py-1">Tambah Pesanan</a>
                    <a href="/home/bayar/{{ $order->no_meja }}" class="bg-accent text-white px-4 rounded-md py-1">Bayar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>