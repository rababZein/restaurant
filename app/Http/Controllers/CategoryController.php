<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Category $category)
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json(['categories' => $categories]);
    }

    public function show(Category $category)
    {
        $category = $this->categoryService->getCategoryById($category->id);
        return response()->json(['category' => $category]);
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->storeCategory($request->validated());
        return response()->json(['message' => 'Category created'], 201);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->updateCategory($category, $request->validated());
        return response()->json(['message' => 'Category updated']);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->deleteCategory($category->id);
        return response()->json(['message' => 'Category deleted']);
    }

   
    public function indexFullHierarchy(Category $category)
    {
        $categories = $this->categoryService->getAllCategoriesWithHierarchy();
        return response()->json(['categories' => $categories]);
    }


}

