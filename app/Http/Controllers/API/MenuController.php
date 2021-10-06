<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function all(Request $request)
    {
        // tampung semua data
        $id = $request->input('id');
        $name = $request->input('name');
        $slug = $request->input('slug');
        $categories = $request->input('categories');

        // jika idnya ada
        if ($id) {
            // cari menu yang memiliki id yang sama dan ditampung kedalam variabel
            $menus = Menu::find($id);
            // jika ada datanya
            if ($menus) {
                return ResponseFormatter::success($menus, 'Data Berhasil Diambil');
                // jika tidak ada tampilkan eror
            } else {
                return ResponseFormatter::error(null, 'Data Tidak Ada', 404);
            };
        };

        // cari data sesuai slug
        if ($slug) {
            // cari menu yang memiliki slug yang sama dan ditampung kedalam variabel
            $menus = Menu::where('slug', $slug)->first();
            // jika ada datanya
            if ($menus) {
                return ResponseFormatter::success($menus, 'Data Berhasil Diambil');
                // jika tidak ada tampilkan eror
            } else {
                return ResponseFormatter::error(null, 'Data Tidak Ada', 404);
            };
        };

        // cari data sesuai name n categories
        $menus = Menu::all();

        if ($name) {
            $menus->where('name', 'like', '%', $name, '%');
        };

        if ($categories) {
            $menus->where('categories', 'like', '%', $categories, '%');
        }

        return ResponseFormatter::success($menus, 'Data Berhasil Diambil');
    }
}
