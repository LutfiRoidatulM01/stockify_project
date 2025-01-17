<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   

    public function index()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        $products_manajer = Product::all();

        return view('pages.manajer_gudang.ManajerProduct', compact('products_manajer', 'categories', 'suppliers'));
    }


}
