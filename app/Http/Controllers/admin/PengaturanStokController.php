<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\admin\PengaturanStokService;

class PengaturanStokController extends Controller
{

    protected $pengaturanStokService;

    public function __construct(PengaturanStokService $pengaturanStokService)
    {
        $this->pengaturanStokService = $pengaturanStokService;
    }

    public function index()
    {
        
        $products = Product::all();
        $products = Product::paginate(10);
        return view('pages.admin.stok.pengaturan_stok', compact('products' ));
    }

    public function updateMinimumStock(Request $request, $id)
    {
        $request->validate([
            'minimum_stock' => 'required|integer|min:0',
        ]);

        $result = $this->pengaturanStokService->updateMinimumStock($id, $request->input('minimum_stock'));

        if ($result) {
            return redirect()->back()->with('success', 'Stok minimum berhasil diperbarui.');
        }

        ActivityLogHelper::log('Memperbarui minimum stok');

        return redirect()->back()->with('error', 'Gagal memperbarui stok minimum.');
    }
    
    
}
