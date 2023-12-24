<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function storeCategory($data)
    {
        return $this->categoryRepository->storeCategory($data);
    }

    public function updateCategory(Category $category, $data)
    {
        return $this->categoryRepository->updateCategory($category, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->deleteCategory($id);
    }

    
    public function getAllCategoriesWithHierarchy()
    {
        return $this->categoryRepository->getAllCategoriesWithHierarchy();
    }


}




