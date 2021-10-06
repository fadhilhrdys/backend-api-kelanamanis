<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        // tampung semua data dari request kesebuah variabel kecuali data transaction
        $data = $request->except('transaction');
        // buat format uuid e.g INV/2021/8921
        $data['uuid'] = 'INV/' . date('Y/') . mt_rand(1000, 9999);
        // buat tempat penyimpanan untuk photo payment
        $data['payment'] = $request->file('payment')->store('payment');

        // masukan data ke tabel transactiondetails
        $transactions = TransactionDetail::create($data);

        foreach ($request->transaction as $menus) {
            $transaction[] = new Transaction([
                'transaction_detailID' => $transactions->id,
                'menuID' => $menus
            ]);
        }

        // simpan data relasinya
        $transactions->transaction()->saveMany($transaction);
        // kembalikan datanya ke response formatter
        return ResponseFormatter::success($transaction);
    }
}
