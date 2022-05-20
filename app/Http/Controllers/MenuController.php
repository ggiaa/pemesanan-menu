<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.index', [
            "menus" => Menu::latest()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'unique:menus|required',
            'slug' => '',
            'harga' => 'required|numeric',
            'jenis' => 'required',
            'gambar' => 'required|image|file',
        ]);

        $validate['slug'] = Str::slug($request->nama);
        $validate['gambar'] = $request->file('gambar')->store('image');

        Menu::create($validate);

        return redirect('/dashboard/menu')->with('success', 'Berhasil menambahkan menu baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', [
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'nama' => 'required',
            'slug' => '',
            'harga' => 'required|numeric',
            'jenis' => 'required',
            'gambar' => '',
        ];

        if ($request->nama !== $menu->nama) {
            $rules['nama'] = 'required|unique:menus';
        }

        $validate = $request->validate($rules);

        if ($request->file('gambar')) {
            Storage::delete($request->oldImage);

            $validate['gambar'] = $request->file('gambar')->store('image');
        }

        Menu::where('id', $menu->id)->update($validate);

        return redirect('/dashboard/menu')->with('success', 'Berhasil mengedit menu!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::delete($menu->gambar);
        }

        Menu::destroy($menu->id);

        return back()->with('success', 'Berhasil menghapus menu!');
    }
}
