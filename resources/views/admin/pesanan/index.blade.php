<x-admin-dashboard title="PESANAN">
    <div class="flex justify-end gap-x-2 mb-6">
        <form action="/dashboard/pesanan" method="get">
            <p class="cari-btn border border-gray-200 rounded-full focus:outline-none px-6 py-1 cursor-pointer bg-white">Cari Data Pesanan</p>
        </form>
    </div>
    <div class="w-full border-b border-gray-200 shadow rounded-lg overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="">
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">#</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Nomer Meja</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Nama Pesanan</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Jumlah</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($orders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $order->no_meja }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $order->menu->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $order->jumlah }}</td>
                    <td class="px-6 py-2 whitespace-nowrap border-b border-gray-200">
                        <button class="bg-accent text-white rounded-full px-6 py-1">Confirm</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- modal start -->
    <div class="modal fixed bg-black bg-opacity-50 w-screen h-screen top-0 left-0 hidden">
        <div class="flex w-full h-full flex-col justify-center items-center">
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="bg-gray-50 py-3 text-gray-500 border-b border-b-gray-200 relative">
                    <div class="">
                        <p class="font-medium leading-4 text-center">Masukkan Nomer Meja</p>
                    </div>
                    <div class="absolute right-3 top-1">
                        <span class="close font-bold text-2xl cursor-pointer text-red-500">&times;</span>
                    </div>
                </div>
                <div class="p-8">
                    <form action="/dashboard/pesanan/detail" method="post">
                        @csrf
                        <input type="text" name="no_meja" class="border b-gray-200 rounded-lg focus:outline-none px-1">
                        <button class="border b-gray-200 rounded-lg px-4">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

    <script>
        const showModal = document.querySelector('.cari-btn');
        const modal = document.querySelector('.modal');
        const close = document.querySelector('.close');

        showModal.addEventListener('click', function() {
            modal.classList.toggle('hidden');
        })

        close.addEventListener('click', function() {
            modal.classList.add('hidden');
        })
    </script>
</x-admin-dashboard>