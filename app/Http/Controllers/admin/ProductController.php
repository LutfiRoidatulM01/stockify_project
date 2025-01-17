<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\admin\ProductService;
use Illuminate\Support\Facades\Response;

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


        return view('pages.admin.products.product', compact('products', 'categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'sku' => 'required|unique:products,sku',
            'name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'nullable|string',
            'minimum_stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/products', 'public');
        }


        ActivityLogHelper::log('menambahkan produk baru ' . $request->name);


        $this->productService->createProduct($data);
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    public function edit(string $id)
    {
        $product = $this->productService->getProductById($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'sku' => 'required|unique:products,sku,' . $id,
            'name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/products', 'public');
        }

        $product = Product::findOrFail($id);
        ActivityLogHelper::log('Memperbarui produk: ' . $product->name);

        $this->productService->updateProduct($id, $data);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan.');
        }

        $this->productService->deleteProduct($id);
        ActivityLogHelper::log('Menghapus produk: ' . $product->name);

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function export(Request $request)
    {
        return $this->productService->export();
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        try {
            $this->productService->importProducts($request->file('file'));
            return redirect()->back()->with('success', 'Produk berhasil diimport.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


}
