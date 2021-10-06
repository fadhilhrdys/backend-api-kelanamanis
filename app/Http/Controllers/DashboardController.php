<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\TransactionDetail;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil data menu
        $menus = Menu::count();
        // ambil data orderan yang pending
        $orders = TransactionDetail::where('transaction_status', 'PENDING')->count();
        // ambil data 3 data transaksi yang terbaru
        $transactions = TransactionDetail::orderBy('id', 'DESC')->take(3)->get();
        // ambil data status transaksi untuk statistik
        $reports = [
            'PENDING' => TransactionDetail::where('transaction_status', 'PENDING')->count(),
            'PROCESS' => TransactionDetail::where('transaction_status', 'PROCESS')->count(),
            'SUCCESS' => TransactionDetail::where('transaction_status', 'SUCCESS')->count()
        ];

        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'menus' => $menus,
            'orders' => $orders,
            'transactions' => $transactions,
            'reports' => $reports
        ]);
    }
}
