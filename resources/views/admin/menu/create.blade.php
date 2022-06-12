<x-admin-dashboard title="TAMBAH MENU">
    <div class="w-1/4 text-lg">
        <form action="/dashboard/menu" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group pb-5 flex flex-col">
                <label for="nama" class="mb-2">Nama Menu</label>
                <input id="nama" class="form-control border border-slate-700 focus:border-none w-full rounded-full py-1 px-2 focus:outline-none focus:ring-1 focus:ring-accent focus:outline-secondary-1 focus:outline-2 focus:outline-offset-0" type="text" name="nama" autofocus autocomplete="off">
                @error('nama')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="harga" class="mb-2">Harga</label>
                <input id="harga" class="form-control border border-slate-700 focus:border-none w-full rounded-full py-1 px-2 focus:outline-none focus:ring-1 focus:ring-accent focus:outline-secondary-1 focus:outline-2 focus:outline-offset-0" type="number" name="harga" autocomplete="off">
                @error('harga')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="jenis" class="mb-2">Jenis</label>
                <select name="jenis" class="form-control border border-slate-700 focus:border-none w-full rounded-full py-1 px-2 focus:outline-none focus:ring-1 focus:ring-accent focus:outline-secondary-1 focus:outline-2 focus:outline-offset-0">
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="gambar" class="mb-2">Gambar</label>
                <input type="file" name="gambar" class="file:rounded-full file:border-none file:bg-accent file:text-white file:cursor-pointer cursor-pointer">
                @error('gambar')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="w-1/2 flex float-right">
                <button class="bg-accent text-white w-full rounded-full py-1" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-admin-dashboard>