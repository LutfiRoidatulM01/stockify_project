<?php

namespace App\Repositories\manajer_gudang;

use App\Models\StockTransaction;

class BarangMasukRepository
{
    
    public function getAllMasukTransactions()
    {
        return StockTransaction::where('type', 'Masuk')->paginate(10);
    }


    public function createTransaction($data)
    {
        return StockTransaction::create($data);
    }

    
    public function getTransactionById($id)
    {
        return StockTransaction::find($id);
    }

    
    public function updateTransaction($id, $data)
    {
        $transaction = StockTransaction::find($id);
        if ($transaction) {
            $transaction->update($data);
            return $transaction;
        }
        return null;
    }

   
    public function deleteTransaction($id)
    {
        $transaction = StockTransaction::find($id);
        if ($transaction) {
            $transaction->delete();
            return true;
        }
        return false;
    }
}
