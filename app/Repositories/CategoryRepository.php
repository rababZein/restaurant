<?php 

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllCategories()
    {
        return $this->category->with('subcategories.items')->get();
    }

    public function getCategoryById($id)
    {
        return $this->category->with('subcategories.items')->findOrFail($id);
    }

    public function storeCategory($data)
    {
        return $this->category->create($data);
    }

    public function updateCategory(Category $category, $data)
    {
        $category->update($data);
        return $category;
    }

    public function deleteCategory($id)
    {
        return $this->getCategoryById($id)->delete();
    }

    public function getAllCategoriesWithHierarchy()
    {
        return $this->category->with('subcategories.items')->get();
    }
}


