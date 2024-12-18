<?php

namespace App\Http\Controllers\staff_gudang;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\staff_gudang\KonfirmasiMasukService;

class KonfirmasiMasukController extends Controller
{

    protected $service;

    public function __construct(KonfirmasiMasukService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $transactions = StockTransaction::where('type', 'Masuk')
            ->where('status', 'pending')
            ->with('product', 'user') 
            ->get();

        return view('pages.staff_gudang.staff_stok.konfirmasi_masuk', compact('transactions'));
    }

    public function approve(Request $request, $id)
    {
        $notes = $request->input('notes');
        $this->service->approveTransaction($id, $notes);

        return redirect()->back()->with('success', 'Transaksi berhasil disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $notes = $request->input('notes');
        $this->service->rejectTransaction($id, $notes);

        return redirect()->back()->with('success', 'Transaksi berhasil ditolak.');
    }
}
