<x-admin-dashboard title="TAMBAH USER">
    <div>
        <form action="/dashboard/user" method="POST">
            @csrf
            <div class="w-1/2 mb-10">
                <div class="form-group pb-4">
                    <label for="name" class="block mb-1 font-semibold text-primary-1">Nama</label>
                    <input autocomplete="off" id="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control border border-slate-700 focus:border-none w-full rounded-lg py-1 px-1 focus:outline-none focus:ring-1 focus:ring-accent focus:outline-secondary-1 focus:outline-2 focus:outline-offset-0" type="text" name="name">
                    @error('name')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-4">
                    <label for="username" class="block mb-1 font-semibold text-primary-1">Username</label>
                    <input autocomplete="off" id="username" value="{{ old('username') }}" class="@error('username') is-invalid @enderror form-control border border-slate-700 focus:border-none w-full rounded-lg py-1 px-1 focus:outline-none focus:ring-1 focus:ring-accent focus:outline-secondary-1 focus:outline-2 focus:outline-offset-0" type="text" name="username">
                    @error('username')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-4">
                    <label for="password" class="block mb-1 font-semibold text-primary-1">Password</label>
                    <input autocomplete="off" id="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror form-control border border-slate-700 focus:border-none w-full rounded-lg py-1 px-1 focus:outline-none focus:ring-1 focus:ring-accent focus:outline-secondary-1 focus:outline-2 focus:outline-offset-0" type="password" name="password">
                    @error('password')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="text-right">
                    <button class="bg-accent text-white py-1 px-3 rounded w-1/4" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-dashboard>