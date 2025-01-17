<?php

namespace App\Repositories\manajer_gudang;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {


        return Product::with(['category', 'supplier', 'stockTransactions'])->paginate(10);
    }

    public function findById($id)
    {
        $product = Product::find($id);
        $product->total_stock = $product->stokMasuk - $product->stokKeluar;
        return Product::with(['category', 'supplier', 'stockTransactions'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->findById($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        $product->delete();
        return true;
    }

    public function bulkInsert(array $products)
    {
        return Product::insert($products);
    }
}
