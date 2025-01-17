<?php

namespace App\Repositories\manajer_gudang;

use App\Models\StockTransaction;

class LaporanBarangRepository
{
    public function getLaporanBarangData()
    {
        return StockTransaction::with('product')->get();
    }

    public function getLaporanBarang($filters)
{
    $query = StockTransaction::query();

    if (!empty($filters['type'])) {
        $query->where('type', $filters['type']);
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
