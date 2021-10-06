<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data dari tabel transactiondetail lalu tampung kesebuah variabel
        $transactions = TransactionDetail::all();

        // lakukan pencarian jika ada request search dan get datanya
        if (request('search')) {
            $transactions = TransactionDetail::where('uuid', 'like', '%' . request('search') . '%')->get();
        };

        // tampilkan halaman yang dituju sekaligus lempar data yang sudah didapatkan
        return view('pages.transaction.transaction', [
            'title' => 'Transaction',
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ambil data transaksi sesuai id dan juga relasi dari tabel transaksi dan menu
        $transactions = TransactionDetail::with('transaction.menu')->findOrFail($id);

        return view('pages.transaction.detail', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setStatus(Request $request, $id)
    {
        // bikin validasi utk status
        $request->validate([
            'status' => 'required|in:PENDING,PROCESS,SUCCESS'
        ]);

        // ambil data transaksi detail sesuai id
        $data = TransactionDetail::findOrFail($id);
        // ubah status 
        $data["transaction_status"] = $request->status;
        // simpan datanya
        $data->save();

        return redirect()->route('transaction.index');
    }
}
