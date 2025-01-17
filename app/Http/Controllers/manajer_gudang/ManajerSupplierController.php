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
        return view('pages.manajer_gudang.manajer_suppliers', compact('suppliers'));
    }
}
