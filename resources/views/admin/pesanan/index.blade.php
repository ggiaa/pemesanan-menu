<x-admin-dashboard title="PESANAN">
    <div class="flex justify-end gap-x-2 mb-6 relative">
        @if (session('error'))
        <div class="pesan absolute text-center w-full">
            <p class="text-primary font-semibold">
                {{ session('error') }}
            </p>
        </div>
        @endif
        <p class="cari-btn border border-gray-200 rounded-full focus:outline-none px-6 py-1 cursor-pointer bg-accent text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
            Cari Data
        </p>
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
                        @if ($order->status == null)
                        <a href="/dashboard/pesanan/{{$order->no_meja}}/{{$order->id_menu}}" class="confirm-btn bg-primary text-white rounded-full px-6 py-1">Confirm</a>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="confirm-icon h-5 w-5 text-sky-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- modal start -->
    <div class="modal fixed bg-black bg-opacity-50 w-screen h-screen top-0 left-0 hidden">
        <div class="flex w-full h-full flex-col justify-center items-center">
            <div class="bg-primary rounded-lg overflow-hidden">
                <div class="bg-slate-800 py-3 text-slate-300 border-b border-b-gray-200 relative">
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
                        <input type="text" name="no_meja" autofocus class="border b-gray-200 rounded-lg focus:outline-none px-1">
                        <button class="border b-gray-200 bg-white text-primary font-semibold rounded-lg px-4">Cari</button>
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
        const pesan = document.querySelector('.pesan');

        showModal.addEventListener('click', function() {
            modal.classList.toggle('hidden');
        })

        close.addEventListener('click', function() {
            modal.classList.add('hidden');
        })

        setTimeout(function() {
            pesan.classList.add('hidden')
        }, 3000)
    </script>
</x-admin-dashboard>