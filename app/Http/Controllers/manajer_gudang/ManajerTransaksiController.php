<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;
use App\Services\manajer_gudang\TransaksiService;

class ManajerTransaksiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $transactions = $this->transaksiService->getAllTransactions();
        $users = User::all();

        return view('pages.manajer_gudang.transaksi', compact('transactions', 'products', 'users'));
    }

    protected $transaksiService;

    public function __construct(TransaksiService $transaksiService)
    {
        $this->transaksiService = $transaksiService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|in:Masuk,Keluar',
            'quantity' => 'required|integer',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $this->transaksiService->createTransaction($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaction = $this->transaksiService->getTransactionById($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|in:Masuk,Keluar',
            'quantity' => 'required|integer',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $this->transaksiService->updateTransaction($id, $request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $this->transaksiService->deleteTransaction($id);
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
