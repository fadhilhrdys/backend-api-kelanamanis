<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function get(Request $request, $id)
    {
        // get data transaction detail sesuai id
        $menu = TransactionDetail::with('transaction.menu')->find($id);

        // jika data menu ada
        if ($menu) {
            return ResponseFormatter::success($menu, 'Data berhasil diambil');
        } else {
            return ResponseFormatter::error(null, 'Data tidak tersedia', 404);
        }
    }
}
