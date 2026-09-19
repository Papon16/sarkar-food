<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFoodController extends Controller
{
    // =========================
    // FOOD LIST
    // =========================
    public function index(Request $request)
    {
        $query = Food::with('category');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $foods = $query->latest()->get();

        $categories = Category::orderBy('name')->get();

        return view('admin.foods.index', compact(
            'foods',
            'categories'
        ));
    }


    // =========================
    // CREATE FOOD PAGE
    // =========================
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.foods.create', compact('categories'));
    }


    // =========================
    // STORE FOOD
    // =========================
    public function store(Request $request)
    {
      $request->validate([
    'name' => 'required|string|max:255',
    'category_id' => 'required|exists:categories,id',
    'description' => 'nullable|string',
    'price' => 'required|numeric|min:0',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('foods', 'public');
        }

        Food::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food added successfully!');
    }


    // =========================
    // EDIT FOOD
    // =========================
    public function edit(Food $food)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.foods.edit', compact(
            'food',
            'categories'
        ));
    }


    // =========================
    // UPDATE FOOD
    // =========================
    public function update(Request $request, Food $food)
    {
      $request->validate([
    'name' => 'required|string|max:255',
    'category_id' => 'required|exists:categories,id',
    'description' => 'nullable|string',
    'price' => 'required|numeric|min:0',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
]);
        $imagePath = $food->image;

        if ($request->hasFile('image')) {

            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }

            $imagePath = $request->file('image')
                ->store('foods', 'public');
        }

        $food->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food updated successfully!');
    }


    // =========================
    // DELETE FOOD
    // =========================
    public function destroy(Food $food)
    {
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food deleted successfully!');
    }


    // =========================
    // TOGGLE AVAILABLE
    // =========================
    public function toggle(Food $food)
    {
        $food->update([
            'is_available' => !$food->is_available
        ]);

        return back()->with(
            'success',
            $food->is_available
                ? 'Food is now available!'
                : 'Food is now unavailable!'
        );
    }
}