<x-admin-dashboard title="LAPORAN PENJUALAN">
    <!-- 
    <div class="flex justify-end gap-x-2 mb-6">
        <p class="cari-btn border border-gray-200 rounded-full focus:outline-none px-6 py-1 cursor-pointer bg-white">Sorting Data</p>
    </div> -->

    <div class="w-full border-b border-gray-200 shadow rounded-lg overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="">
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">#</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">tanggal</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Total Penjualan</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($sales as $sale)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ date('d F o' , strtotime($sale->tanggal)) }}</td>
                    <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">Rp. {{ number_format($sale->total_semua) }}</td>
                    <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">
                        <a href="/dashboard/laporan/{{ $sale->tanggal }}" class="bg-sky-400 text-white px-6 py-1 rounded-full">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- modal start -->
    <!-- <div class="modal fixed bg-black bg-opacity-50 w-screen h-screen top-0 left-0 hidden">
        <div class="flex w-full h-full flex-col justify-center items-center">
            <div class="bg-white rounded-lg overflow-hidden w-full max-w-sm">
                <div class="bg-gray-50 py-3 text-gray-500 border-b border-b-gray-200 relative">
                    <div class="">
                        <p class="font-medium leading-4 text-center">Sorting Data Penjualan</p>
                    </div>
                    <div class="absolute right-3 top-1">
                        <span class="close font-bold text-2xl cursor-pointer text-red-500">&times;</span>
                    </div>
                </div>
                <div class="p-8">
                    <form method="get">
                        @csrf
                        <div class="flex flex-col">
                            <div class="flex justify-between mb-6">
                                <p>Dari Tanggal</p>
                                <input type="date" name="from" required id="from" class="border border-gray-200 rounded-lg px-4 py-1 focus:outline-none cursor-pointer">
                            </div>
                            <div class="flex justify-between mb-6">
                                <p>Sampai Tanggal</p>
                                <input type="date" name="to" required id="to" class="border border-gray-200 rounded-lg px-4 py-1 focus:outline-none cursor-pointer">
                            </div>
                            <div class="flex justify-end">
                                <button class=" bg-accent text-white focus:outline-none w-1/3 rounded-md py-1">Sorting</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- modal end -->

    <!-- <script>
        const showModal = document.querySelector('.cari-btn');
        const modal = document.querySelector('.modal');
        const close = document.querySelector('.close');

        showModal.addEventListener('click', function() {
            modal.classList.toggle('hidden');
        })

        close.addEventListener('click', function() {
            modal.classList.add('hidden');
        })
    </script> -->
</x-admin-dashboard>