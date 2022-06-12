<x-admin-dashboard title="EDIT">
    <div class="w-1/4 text-lg">
        <form action="/dashboard/menu/{{ $menu->slug }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group pb-5 flex flex-col">
                <label for="nama" class="mb-2">Nama Menu</label>
                <input id="nama" value="{{ old('nama',$menu->nama) }}" class="form-control w-full border border-slate-600 focus:outline-none rounded-full px-2 py-1 focus:ring-1 focus:ring-accent" type="text" name="nama" autofocus autocomplete="off">
                @error('nama')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="harga" class="mb-2">Harga</label>
                <input id="harga" value="{{ old('harga', $menu->harga) }}" class="form-control w-full border border-slate-600 focus:outline-none rounded-full px-2 py-1 focus:ring-1 focus:ring-accent" type="number" name="harga" autocomplete="off">
                @error('harga')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="jenis" class="mb-2">Jenis</label>
                <select name="jenis" class="form-control w-full border border-slate-600 focus:outline-none rounded-full px-2 py-1 focus:ring-1 focus:ring-accent">
                    <option value="makanan" {{ $menu->jenis == 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ $menu->jenis == 'minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>
            <div class="form-group pb-5 flex flex-col">
                <label for="gambar" class="mb-2">Gambar</label>
                <img src="/{{ $menu->gambar }}" width="50%" class="mb-2">

                <input type="hidden" name="oldImage" value="{{ $menu->gambar }}">

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