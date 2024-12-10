<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManajerProductController extends Controller
{
    public function index()
    {
        // Ambil semua data produk dari database
        $products = Product::all();
        $categories = Category::all(); 
        $suppliers = Supplier::all();

        // Kirim data ke view
        return view('pages.manajer_gudang.product_manajer', compact('products', 'categories','suppliers'));
    }

}
