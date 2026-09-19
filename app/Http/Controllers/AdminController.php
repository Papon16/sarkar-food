<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */

        $settings = Setting::first();


        /*
        |--------------------------------------------------------------------------
        | ALL ORDERS
        |--------------------------------------------------------------------------
        */

        $orders = Order::latest()->get();


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        $search = trim($request->input('search', ''));


        /*
        |--------------------------------------------------------------------------
        | ORDER SEARCH
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $orders = $orders->filter(function ($order) use ($search) {

                $search = strtolower($search);

                return
                    str_contains(
                        strtolower((string) $order->id),
                        $search
                    )

                    ||

                    str_contains(
                        strtolower((string) $order->customer_name),
                        $search
                    )

                    ||

                    str_contains(
                        strtolower((string) $order->phone),
                        $search
                    )

                    ||

                    str_contains(
                        strtolower((string) $order->payment_method),
                        $search
                    )

                    ||

                    str_contains(
                        strtolower((string) $order->status),
                        $search
                    );

            })->values();

        }


        /*
        |--------------------------------------------------------------------------
        | ORDER COUNTS
        |--------------------------------------------------------------------------
        */

        $totalOrders = $orders->count();


        $pendingOrders = $orders->filter(function ($order) {

            return strtolower($order->status) === 'pending';

        })->count();


        $confirmedOrders = $orders->filter(function ($order) {

            return strtolower($order->status) === 'confirmed';

        })->count();


        $preparingOrders = $orders->filter(function ($order) {

            return strtolower($order->status) === 'preparing';

        })->count();


        $deliveredOrders = $orders->filter(function ($order) {

            return strtolower($order->status) === 'delivered';

        })->count();


        $cancelledOrders = $orders->filter(function ($order) {

            return strtolower($order->status) === 'cancelled';

        })->count();


        /*
        |--------------------------------------------------------------------------
        | REVENUE
        |--------------------------------------------------------------------------
        */

        $totalRevenue = $orders
            ->filter(function ($order) {

                return strtolower($order->status) !== 'cancelled';

            })
            ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | CUSTOMERS
        |--------------------------------------------------------------------------
        */

        $totalCustomers = User::where(
            'role',
            'user'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | FOODS
        |--------------------------------------------------------------------------
        */

        $totalFoods = \App\Models\Food::count();


        /*
        |--------------------------------------------------------------------------
        | PERIOD FILTER
        |--------------------------------------------------------------------------
        */

        $period = $request->input('period', 'all');


        /*
        |--------------------------------------------------------------------------
        | CHART DATA
        |--------------------------------------------------------------------------
        */

        if ($period === '7') {

            $days = collect(range(6, 0))
                ->map(function ($day) {

                    return now()->subDays($day);

                });

        } elseif ($period === '30') {

            /*
            | Last 30 days
            */

            $days = collect(range(29, 0))
                ->map(function ($day) {

                    return now()->subDays($day);

                });

        } else {

            /*
            | Default: Last 7 days
            */

            $days = collect(range(6, 0))
                ->map(function ($day) {

                    return now()->subDays($day);

                });

        }


        /*
        |--------------------------------------------------------------------------
        | DAILY ORDER COUNTS
        |--------------------------------------------------------------------------
        */

        $dailyCounts = [];

        $maxOrders = 1;


        foreach ($days as $day) {

            $count = Order::whereDate(
                'created_at',
                $day->format('Y-m-d')
            )->count();


            $dailyCounts[] = [
                'label' => $day->format('D'),
                'date' => $day->format('Y-m-d'),
                'count' => $count,
            ];


            if ($count > $maxOrders) {

                $maxOrders = $count;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | CHART HEIGHT
        |--------------------------------------------------------------------------
        */

        $chartData = collect($dailyCounts)
            ->map(function ($item) use ($maxOrders) {

                $height = $item['count'] > 0

                    ? max(
                        15,
                        ($item['count'] / $maxOrders) * 180
                    )

                    : 8;


                return [
                    'label' => $item['label'],
                    'date' => $item['date'],
                    'count' => $item['count'],
                    'height' => $height,
                ];

            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | RECENT ORDERS
        |--------------------------------------------------------------------------
        */

        $recentOrders = $orders->take(7);


        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'settings',
                'orders',
                'totalOrders',
                'pendingOrders',
                'confirmedOrders',
                'preparingOrders',
                'deliveredOrders',
                'cancelledOrders',
                'totalRevenue',
                'totalCustomers',
                'totalFoods',
                'recentOrders',
                'chartData',
                'period',
                'search'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN LIST
    |--------------------------------------------------------------------------
    */

    public function admins()
    {
        $admins = User::where(
            'role',
            'admin'
        )
        ->latest()
        ->get();


        return view(
            'admin.admins',
            compact('admins')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE ADMIN PAGE
    |--------------------------------------------------------------------------
    */

    public function createAdmin()
    {
        return view(
            'admin.create-admin'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE ADMIN
    |--------------------------------------------------------------------------
        */

    public function storeAdmin(Request $request)
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],

            'password' => [
                'required',
                'min:8',
                'confirmed'
            ],

        ]);


        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'admin',

        ]);


        return redirect()
            ->route('admin.admins')
            ->with(
                'success',
                'New admin created successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ADMIN
    |--------------------------------------------------------------------------
    */

    public function deleteAdmin($id)
    {
        $admin = User::where(
            'role',
            'admin'
        )->findOrFail($id);


        /*
        | Prevent deleting yourself
        */

        if ($admin->id == auth()->id()) {

            return back()->with(
                'error',
                'You cannot delete your own account.'
            );

        }


        $admin->delete();


        return back()->with(
            'success',
            'Admin removed successfully!'
        );
    }
}