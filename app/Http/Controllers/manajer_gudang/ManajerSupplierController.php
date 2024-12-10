<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManajerSupplierController extends Controller
{
    public function index()
    {
         
        $suppliers = Supplier::all();

        // Kirim data ke view
        return view('pages.manajer_gudang.manajer_suppliers', compact('suppliers'));
    }
}
