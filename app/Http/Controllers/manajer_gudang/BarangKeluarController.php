<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;
use App\Services\manajer_gudang\BarangKeluarService;

class BarangKeluarController extends Controller
{
    // public function index()
    // {
    //     $transactions = StockTransaction::where('type', 'Keluar')->get();

    //     return view('pages.manajer_gudang.manajer_stock.barang_keluar', compact('transactions'));
    // }

    protected $service;

    public function __construct(BarangKeluarService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $products = Product::all();
        $transactions = $this->service->getAllKeluarTransactions();
        return view('pages.manajer_gudang.manajer_stock.barang_keluar', compact('transactions', 'products'));
    }

    public function store(Request $request)
    {
        $validated =$request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $data = [
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'date' => $validated['date'],
            'notes' => $validated['notes'],
            'type' => 'Keluar',
            'user_id' => auth()->user()->id,
        ];

        $this->service->createTransaction($data);

        return redirect()->route('barang_keluar.index')->with('success', 'Transaksi barang keluar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaction = $this->service->getTransactionById($id);
        if (!$transaction) {
            return redirect()->route('barang_keluar.index')->with('error', 'Transaksi tidak ditemukan.');
        }

        $products = Product::all();
        return view('pages.manajer_gudang.manajer_stock.edit_transaksi', compact('transaction', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $data = [
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'date' => $validated['date'],
            'notes' => $validated['notes'],
            'type' => 'Keluar',
            'user_id' => auth()->user()->id,
        ];

        $transaction = $this->service->updateTransaction($id, $data);

        if ($transaction) {
            return redirect()->route('barang_keluar.index')->with('success', 'Transaksi berhasil diperbarui.');
        }

        return redirect()->route('barang_keluar.index')->with('error', 'Transaksi tidak ditemukan.');
    }

    public function destroy($id)
    {
        $deleted = $this->service->deleteTransaction($id);
        if ($deleted) {
            return redirect()->route('barang_keluar.index')->with('success', 'Transaksi berhasil dihapus.');
        }

        return redirect()->route('barang_keluar.index')->with('error', 'Transaksi tidak ditemukan.');
    }
}
