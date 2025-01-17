<?php

namespace App\Services\admin;

use App\Models\Category;
use App\Models\Supplier;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\admin\ProductsExport;
use Illuminate\Support\Facades\Storage;
use App\Repositories\admin\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProductById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct($id, array $data)
    {

        $product = $this->productRepository->findById($id);

        if (!empty($data['image']) && $product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct($id)
    {

        $product = $this->productRepository->findById($id);

      
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        return $this->productRepository->delete($id);
    }

    public function export()
    {
        $products = $this->productRepository->getAll();
        return Excel::download(new ProductsExport($products), 'products.xlsx');
    }

    public function importProducts($file)
    {
        // Menggunakan Maatwebsite untuk proses import
        Excel::import(new ProductsImport($this->productRepository), $file);
    }
}
