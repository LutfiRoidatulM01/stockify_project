<?php

namespace App\Repositories\manajer_gudang;

use App\Models\StockTransaction;

class TransaksiRepository
{
    public function getAll()
    {
        return StockTransaction::with(['product', 'user'])->get();
    }

    public function findById($id)
    {
        return StockTransaction::with(['product', 'user'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return StockTransaction::create($data);
    }

    public function update($id, array $data)
    {
        $transaction = StockTransaction::findOrFail($id);
        $transaction->update($data);
        return $transaction;
    }

    public function delete($id)
    {
        $transaction = StockTransaction::findOrFail($id);
        $transaction->delete();
        return true;
    }
}
