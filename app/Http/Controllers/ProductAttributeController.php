<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        // Ambil data transaksi stok
        $atribut = ProductAttribute::all();

        return view('pages.admin.atribut.index', compact('atribut'));
    }
}
