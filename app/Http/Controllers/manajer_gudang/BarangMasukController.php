<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\manajer_gudang\BarangMasukService;

class BarangMasukController extends Controller
{


    protected $service;

    public function __construct(BarangMasukService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $products = Product::all();
        $transactions = $this->service->getAllMasukTransactions();
        return view('pages.manajer_gudang.manajer_stock.barang_masuk', compact('transactions', 'products'));
    }

    public function store(Request $request)
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
            'type' => 'Masuk',
            'user_id' => auth()->user()->id,
        ];

        $this->service->createTransaction($data);
        ActivityLogHelper::log('Menambahkan transaksi masuk');
        return redirect()->route('barang_masuk.index')->with('success', 'Transaksi barang masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaction = $this->service->getTransactionById($id);
        if (!$transaction) {
            return redirect()->route('barang_masuk.index')->with('error', 'Transaksi tidak ditemukan.');
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
            'type' => 'Masuk',
            'user_id' => auth()->user()->id,
        ];

        $transaction = $this->service->updateTransaction($id, $data);
        ActivityLogHelper::log('Mengubah data transaksi masuk');
        if ($transaction) {
            return redirect()->route('barang_masuk.index')->with('success', 'Transaksi berhasil diperbarui.');
        }

        return redirect()->route('barang_masuk.index')->with('error', 'Transaksi tidak ditemukan.');
    }

    public function destroy($id)
    {
        $deleted = $this->service->deleteTransaction($id);
        if ($deleted) {
            return redirect()->route('barang_masuk.index')->with('success', 'Transaksi berhasil dihapus.');
        }
        ActivityLogHelper::log('Menghapus data transaksi masuk');
        return redirect()->route('barang_masuk.index')->with('error', 'Transaksi tidak ditemukan.');
    }
}
