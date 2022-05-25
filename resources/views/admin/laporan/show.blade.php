<x-admin-dashboard title="Penjualan {{ date('d F o' , strtotime($date)) }}">
    <div class="w-full border-b border-gray-200 shadow rounded-lg overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="">
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">#</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Menu</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Jumlah Terjual</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Sub Total</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php $total = 0; ?>
                @foreach ($sales as $sale)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $sale->menu->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $sale->jumlah }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">Rp. {{ number_format($sale->sub_harga) }}</td>
                </tr>
                <?php $total += $sale->sub_harga ?>
                @endforeach
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200" colspan="3">Total :</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200"><span class="font-semibold">Rp. {{ number_format($total) }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin-dashboard>