<x-admin-dashboard title="DETAIL">
    <div class="bg-white w-2/3 rounded-lg shadow-lg p-4 mx-auto">
        <div class="head text-center py-2 border-b-2 border-dashed border-slate-400">
            <p class="font-medium text-lg">PESANAN NOMER MEJA {{ $meja }}</p>
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
                <a href="/dashboard/pesanan" class="bg-accent text-white px-4 rounded-md py-1">Kembali</a>
            </div>
        </div>
    </div>
</x-admin-dashboard>