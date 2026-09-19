<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with('items')
            ->latest()
            ->get();

        // Website settings
        $settings = Setting::first();

        return view('admin.orders', compact(
            'orders',
            'settings'
        ));
    }


    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Preparing,Delivered,Cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return redirect()
            ->route('admin.orders')
            ->with('success', 'Order status updated successfully!');
    }
}