<x-admin-dashboard title="TAMBAH MENU">
    <div class="w-1/4 text-lg">
        <form action="/dashboard/menu" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group pb-5 flex flex-col">
                <label for="nama" class="mb-2">Nama Menu</label>
                <input id="nama" class="form-control w-full border border-slate-600 focus:outline-none rounded-lg p-1 focus:ring-2 focus:ring-accent" type="text" name="nama" autofocus autocomplete="off">
                @error('nama')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="harga" class="mb-2">Harga</label>
                <input id="harga" class="form-control w-full border border-slate-600 focus:outline-none rounded-lg p-1 focus:ring-2 focus:ring-accent" type="number" name="harga" autocomplete="off">
                @error('harga')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="jenis" class="mb-2">Jenis</label>
                <select name="jenis" class="form-control w-full border border-slate-600 focus:outline-none rounded-lg p-1 focus:ring-2 focus:ring-accent">
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
                <button class="bg-accent text-white w-full rounded-md py-1" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-admin-dashboard>