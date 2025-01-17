<?php

namespace App\Http\Controllers\staff_gudang;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\staff_gudang\KonfirmasiKeluarService;

class KonfirmasiKeluarController extends Controller
{
    protected $service;

    public function __construct(KonfirmasiKeluarService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $transactions = StockTransaction::where('type', 'Keluar')
            ->where('status', 'pending')
            ->with('product', 'user')
            ->get();

        return view('pages.staff_gudang.staff_stok.konfirmasi_keluar', compact('transactions'));
    }

    public function dikeluarkan($id, Request $request)
    {
        $notes = $request->input('notes'); 
        $this->service->confirmTransaction($id, $notes); 
        ActivityLogHelper::log('Melakukan konfirmasi barang keluar');
        return redirect()->back()->with('success', 'Transaksi berhasil disetujui.');
    }
}
