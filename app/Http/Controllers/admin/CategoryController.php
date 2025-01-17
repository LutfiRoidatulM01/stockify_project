<?php

namespace App\Http\Controllers\admin;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\admin\CategoryService;
use App\Helpers\ActivityLogHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories(); 
        $categories = Category::paginate(10);
        return view('pages.admin.products.categories', compact('categories'));
    }

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function show($id)
    {
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);


        $result = $this->categoryService->createCategory($validatedData);

      
        if (isset($result['errors'])) {
            return redirect()->route('categories.index')->withErrors($result['errors']);
        }
        ActivityLogHelper::log('Berhasil Menambahkan Kategori Baru');

    
        return redirect()->route('categories.index')->with('success', 'Category successfully created!');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->categoryService->updateCategory($id, $request->all());

        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }

        ActivityLogHelper::log('Memperbarui Kategori Baru');
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        ActivityLogHelper::log('Menghapus Kategori');
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
