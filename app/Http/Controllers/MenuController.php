<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
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
        // ambil data menu sesuai kategori
        $pannacotta = Menu::where('categories', 'pannacotta');
        $liters = Menu::where('categories', 'liter');
        $mililiters = Menu::where('categories', 'mililiter');

        // lakukan pencarian jika ada request search
        if (request('search')) {
            $pannacotta->where('name', 'like', '%' . request('search') . '%');
            $liters->where('name', 'like', '%' . request('search') . '%');
            $mililiters->where('name', 'like', '%' . request('search') . '%');
        }

        return view('pages.menu.menu', [
            'title' => 'Menu',
            'pannacotta' => $pannacotta->get(),
            'liters' => $liters->get(),
            'mililiters' => $mililiters->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.menu.addmenu', [
            'title' => 'Add Menu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        // ambil semua data pada variabel request
        $data = $request->all();
        // membuat slug dgn helper str
        $data['slug'] = Str::of($request->name)->slug('-');
        // memindahkan penyimpanan file photo ke file bernama menu-photo
        $data['photo'] = $request->file('photo')->store('menu-photo');

        //insert data ke database
        Menu::create($data);
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // cari menu sesuai id
        $menus = Menu::findOrFail($id);

        return view('pages.menu.edit', [
            'title' => 'Edit',
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        // ambil semua data pada variabel request
        $data = $request->all();
        // membuat slug dgn helper str
        $data['slug'] = Str::of($request->name)->slug('-');
        // memindahkan penyimpanan file photo ke file bernama menu-photo
        $data['photo'] = $request->file('photo')->store('menu-photo');

        // tampung data menu sesuai id
        $menu = Menu::findOrFail($id);
        // update data ke database
        $menu->update($data);

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);

        return redirect()->route('menu.index');
    }
}
