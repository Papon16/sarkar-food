<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ==================== HOME ====================

    public function index(Request $request)
    {
        // Website settings
        $settings = Setting::first();

        // All categories
        $categories = Category::orderBy('name')->get();

        // Search keyword
        $search = $request->get('search');

        // Selected category
        $selectedCategory = $request->get('category');

        // Food query
        $query = Food::query()
            ->where('is_available', true);

        // ==================== SEARCH ====================

        if ($search) {
            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');

            });
        }

        // ==================== CATEGORY FILTER ====================

        if ($selectedCategory) {

            $category = Category::where(
                'name',
                $selectedCategory
            )->first();

            if ($category) {

                $query->where(
                    'category_id',
                    $category->id
                );

            } else {

                $selectedCategory = null;
            }
        }

        // Get foods
        $foods = $query
            ->latest()
            ->get();

        // Return Home page
        return view('welcome', compact(
            'settings',
            'categories',
            'foods',
            'selectedCategory',
            'search'
        ));
    }


    // ==================== CART ====================

    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }


    // ==================== ADD TO CART ====================

    public function addToCart($id)
    {
        $food = Food::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'name' => $food->name,
                'price' => $food->price,
                'image' => $food->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart');
    }


    // ==================== UPDATE CART ====================

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart');
    }


    // ==================== REMOVE CART ====================

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart')
            ->with(
                'success',
                'Item removed from cart successfully!'
            );
    }


    // ==================== CHECKOUT ====================

    public function checkout()
    {
        $cart = session()->get('cart', []);

        return view(
            'checkout',
            compact('cart')
        );
    }


    // ==================== PLACE ORDER ====================

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {

            return redirect()
                ->route('cart')
                ->with(
                    'error',
                    'Your cart is empty!'
                );
        }

        // Food total
        $total = 0;

        foreach ($cart as $item) {

            $total +=
                $item['price'] *
                $item['quantity'];
        }

        // Settings
        $settings = Setting::first();

        // Delivery charge
        $deliveryCharge =
            $settings->delivery_charge ?? 50;

        // Grand total
        $grandTotal =
            $total +
            $deliveryCharge;

        // Create order
        $order = Order::create([
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total' => $grandTotal,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cart as $foodId => $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $foodId,
                'food_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' =>
                    $item['price'] *
                    $item['quantity'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()
            ->route('checkout')
            ->with(
                'success',
                'Your Order Successfully Placed! Order #' .
                $order->id .
                ' 🎉'
            );
    }
}