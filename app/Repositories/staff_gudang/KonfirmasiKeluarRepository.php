<?php

namespace App\Repositories\staff_gudang;

use App\Models\StockTransaction;

class KonfirmasiKeluarRepository
{
    public function findById($id)
    {
        return StockTransaction::findOrFail($id);
    }

    public function updateStatus($id, $status, $notes = null)
    {
        $transaction = $this->findById($id); 
        $transaction->status = $status; 
        if ($notes) {
            $transaction->notes = $notes; 
        }
        $transaction->save(); 

        return $transaction;
    }
}
