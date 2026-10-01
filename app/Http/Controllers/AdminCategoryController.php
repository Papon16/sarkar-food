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

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Category Query
        |--------------------------------------------------------------------------
        */

        $query = Category::withCount('foods')
            ->orderBy('name');


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = $query->get();


        /*
        |--------------------------------------------------------------------------
        | Category Image
        |--------------------------------------------------------------------------
        |
        | যদি category-এর নিজের image থাকে → সেটি দেখাবে।
        |
        | যদি category image না থাকে → ওই category-এর
        | প্রথম food-এর image ব্যবহার করবে।
        |
        */

        foreach ($categories as $category) {

            $category->items_count = $category->foods_count;

            // প্রথমে category-এর নিজের image
            if (!empty($category->image)) {

                $category->category_image = $category->image;

            } else {

                // Category image না থাকলে প্রথম food-এর image
                $category->category_image = Food::where(
                    'category_id',
                    $category->id
                )->value('image');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalCategories = Category::count();

        /*
        |--------------------------------------------------------------------------
        | বর্তমানে categories table-এ is_active column নেই।
        | তাই এখন সব category active/visible হিসেবে ধরা হচ্ছে।
        |--------------------------------------------------------------------------
        */

        $activeCategories = $totalCategories;

        $visibleCategories = $totalCategories;

        $hiddenCategories = 0;


        /*
        |--------------------------------------------------------------------------
        | Search & Status Value
        |--------------------------------------------------------------------------
        */

        $search = $request->search;

        $status = $request->get('status', 'all');


        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('admin.categories', compact(
            'categories',
            'totalCategories',
            'activeCategories',
            'visibleCategories',
            'hiddenCategories',
            'search',
            'status'
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

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:categories,name',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:20',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Create Category
        |--------------------------------------------------------------------------
        */

        Category::create([

            'name' => $request->name,

            'description' => $request->description,

            'icon' => $request->icon ?: '🍽️',

        ]);


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category added successfully!'
            );
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

    public function update(
        Request $request,
        Category $category
    ) {

        $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:categories,name,' . $category->id,
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:20',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Category
        |--------------------------------------------------------------------------
        */

        $category->update([

            'name' => $request->name,

            'description' => $request->description,

            'icon' => $request->icon ?: '🍽️',

        ]);


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category updated successfully!'
            );
    }


    // =========================
    // DELETE CATEGORY
    // =========================

    public function destroy(Category $category)
    {
        /*
        |--------------------------------------------------------------------------
        | Check Food Items
        |--------------------------------------------------------------------------
        */

        $foodCount = Food::where(
            'category_id',
            $category->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Prevent Delete If Food Exists
        |--------------------------------------------------------------------------
        */

        if ($foodCount > 0) {

            return redirect()
                ->route('admin.categories.index')
                ->with(
                    'error',
                    'This category cannot be deleted because it contains food items.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Category
        |--------------------------------------------------------------------------
        */

        $category->delete();


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category deleted successfully!'
            );
    }
}