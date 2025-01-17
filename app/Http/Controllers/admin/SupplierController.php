<?php

namespace App\Http\Controllers\admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\admin\SupplierService;
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
        $suppliers = Supplier::paginate(10);
        return view('pages.admin.suppliers', compact('suppliers'));
    }

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
        ActivityLogHelper::log('Menambahkan supplier baru');

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $this->supplierService->updateSupplier($id, $request->all());
         ActivityLogHelper::log('Mengubah data supplier');
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil di edit');
    }

    public function destroy($id)
    {
        $this->supplierService->deleteSupplier($id);
        ActivityLogHelper::log('Menghapus data supplier');
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
