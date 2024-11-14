<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories(); 
        return view('pages.admin.categories.index', compact('categories'));
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

        // Jika ada error pada validasi, kembalikan error
        if (isset($result['errors'])) {
            return redirect()->route('categories.index')->withErrors($result['errors']);
        }

        // Kembalikan dengan pesan sukses
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

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
