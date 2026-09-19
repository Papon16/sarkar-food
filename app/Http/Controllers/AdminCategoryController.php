<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    // =========================
    // CATEGORY LIST
    // =========================

    public function index()
    {
        $categories = Category::orderBy('name')->get();

        // প্রতিটি category-এর জন্য একটি food image এবং item count
        foreach ($categories as $category) {

            $category->items_count = Food::where(
                'category_id',
                $category->id
            )->count();

            $category->category_image = Food::where(
                'category_id',
                $category->id
            )->value('image');
        }

        $totalCategories = $categories->count();

        $activeCategories = $totalCategories;

        $visibleCategories = $totalCategories;

        $hiddenCategories = 0;

        return view('admin.categories', compact(
            'categories',
            'totalCategories',
            'activeCategories',
            'visibleCategories',
            'hiddenCategories'
        ));
    }


    // =========================
    // CREATE CATEGORY
    // =========================

    public function create()
    {
        return view('admin.categories.create');
    }


    // =========================
    // STORE CATEGORY
    // =========================

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category added successfully!');
    }


    // =========================
    // EDIT CATEGORY
    // =========================

    public function edit(Category $category)
    {
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }


    // =========================
    // UPDATE CATEGORY
    // =========================

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }


    // =========================
    // DELETE CATEGORY
    // =========================

    public function destroy(Category $category)
    {
        // Category-এর food আছে কিনা check
        $foodCount = Food::where(
            'category_id',
            $category->id
        )->count();

        if ($foodCount > 0) {

            return redirect()
                ->route('admin.categories.index')
                ->with(
                    'error',
                    'This category cannot be deleted because it contains food items.'
                );
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category deleted successfully!'
            );
    }
}