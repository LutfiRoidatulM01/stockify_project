<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Services\SupplierService;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{

    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return view('pages.admin.suppliers.index', compact('suppliers'));
    }

    // public function index()
    // {
    //     $suppliers = Supplier::all(); // Mengambil semua data supplier
    //     return view('pages.admin.suppliers.index', compact('suppliers'));
    // }

    public function show($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        if (!$supplier) {
            return redirect()->route('suppliers.index')->with('error', 'Supplier not found.');
        }
        return view('suppliers.show', compact('supplier'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255'
        ]);

        $result = $this->supplierService->createSupplier($validateData);

        if (isset($result['errors'])) {
            return redirect()->route('suppliers.index')->withErrors($result['errors']);
        }

        return redirect()->route('suppliers.index')->with('success', 'Category successfully created!');
    }

    public function edit($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->supplierService->updateSupplier($id, $request->all());

        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        $this->supplierService->deleteSupplier($id);
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
