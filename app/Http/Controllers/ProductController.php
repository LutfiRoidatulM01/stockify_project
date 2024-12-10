<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        $categories = Category::all(); 
        $suppliers = Supplier::all();
        $products = Product::with(['category', 'supplier', 'stockTransactions'])->get();
        return view('pages.admin.products.index', compact('products', 'categories', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.s
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'sku' => 'required|unique:products,sku',
            'name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
        ]);

        $this->productService->createProduct($data);
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->productService->getProductById($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'sku' => 'required|unique:products,sku,' . $id,
            'name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
        ]);

        $this->productService->updateProduct($id, $data);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
