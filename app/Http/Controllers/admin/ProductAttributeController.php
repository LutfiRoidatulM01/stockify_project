<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\admin\ProductAttributeService;

class ProductAttributeController extends Controller
{

    protected $productAttributeService;

    public function __construct(ProductAttributeService $productAttributeService)
    {
        $this->productAttributeService = $productAttributeService;
    }

    public function index()
    {
        $products = Product::all();
        $atribut = $this->productAttributeService->getAllAttributes();
        return view('pages.admin.atribut.index', compact('atribut','products'));
        // $atribut = ProductAttribute::all();

        // return view('pages.admin.atribut.index', compact('atribut'));
    }

    public function create()
    {
        return view('atribut.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'product_id' => 'required|exists:products,id',
        'name' => 'required|string|max:255',
        'value' => 'required|string|max:255',
    ]);

    $this->productAttributeService->createAttribute($data);

    return redirect()->route('atribut.index')->with('success', 'Atribut berhasil ditambahkan!');
}

    public function edit($id)
    {
        $atribut = $this->productAttributeService->getAttributeById($id);
        return view('product_attributes.edit', compact('atribut'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $this->productAttributeService->updateAttribute($id, $data);

        return redirect()->route('atribut.index')->with('success', 'Atribut berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $this->productAttributeService->deleteAttribute($id);

        return redirect()->route('atribut.index')->with('success', 'Atribut berhasil dihapus!');
    }
}