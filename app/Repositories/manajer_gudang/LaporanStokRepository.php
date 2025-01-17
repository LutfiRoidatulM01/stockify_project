<?php

namespace App\Repositories\manajer_gudang;

use App\Models\Product;

class LaporanStokRepository
{
    public function getFilteredProducts($request)
    {
        $query = Product::query();

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereHas('stockTransactions', function ($query) use ($request) {
                $query->where('date', '>=', $request->start_date);
            });
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereHas('stockTransactions', function ($query) use ($request) {
                $query->where('date', '<=', $request->end_date);
            });
        }

      
        return $query->get();
    }
}
