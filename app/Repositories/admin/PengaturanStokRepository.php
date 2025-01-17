<?php

namespace App\Repositories\admin;

use App\Models\Product;

class PengaturanStokRepository
{
    public function updateMinimumStock($id, $minimumStock)
    {
        $product = Product::find($id);

        if (!$product) {
            return false;
        }

        $product->minimum_stock = $minimumStock;
        return $product->save();
    }
}
