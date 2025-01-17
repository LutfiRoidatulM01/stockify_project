<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Repositories\admin\ProductRepository;

class ProductsImport implements ToCollection
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function collection(Collection $rows)
    {
        $products = [];

        foreach ($rows as $key => $row) {
            // Skip header row
            if ($key === 0) {
                continue;
            }

            $products[] = [
                'name' => $row[0],
                'sku' => $row[1],
                'category_id' => $row[2],
                'supplier_id' => $row[3],
                'purchase_price' => $row[4],
                'selling_price' => $row[5],
                'description' => $row[6],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Bulk insert ke database
        $this->productRepository->bulkInsert($products);
    }
}
