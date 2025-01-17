<?php

namespace App\Repositories\admin;

use App\Models\StockTransaction;
use App\Models\Transaksi;

class LaporanTransaksiRepository
{
    public function getLaporanTransaksiData()
    {
        return StockTransaction::with('product')->get();
    }

    public function getLaporanTransaksi($filters)
    {
        $query = StockTransaction::query();

        if (!empty($filters['transaction_type'])) {
            $query->where('type', $filters['transaction_type']);
        }

        if (!empty($filters['start_date'])) {
            $query->whereDate('date', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('date', '<=', $filters['end_date']);
        }

        return $query->get();
    }
}