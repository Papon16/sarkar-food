<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SETTINGS PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $settings = Setting::first();

        if (!$settings) {
            $settings = Setting::create([
                'restaurant_name' => 'Foodie',
                'restaurant_phone' => '+880 1331-574222',
                'restaurant_email' => 'support@foodie.com',
                'restaurant_address' => 'Dhaka, Bangladesh',
                'opening_hours' => 'Every Day: 10:00 AM - 10:00 PM',
                'restaurant_open' => true,
                'maintenance_mode' => false,
            ]);
        }

        return view('admin.settings', compact('settings'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE SETTINGS
    |--------------------------------------------------------------------------
    */

public function update(Request $request)
{
    $request->validate([

        'restaurant_name' => 'required|string|max:100',

        'restaurant_phone' => 'nullable|string|max:30',

        'restaurant_email' => 'nullable|email|max:150',

        'restaurant_address' => 'nullable|string',

        'opening_hours' => 'nullable|string|max:255',

        'delivery_charge' => 'required|numeric|min:0',

        'minimum_order' => 'required|numeric|min:0',

        'currency' => 'required|string|max:5',

    ]);

    $settings = Setting::first();

    if (!$settings) {

        $settings = Setting::create([
            'restaurant_name' => $request->restaurant_name,
            'restaurant_phone' => $request->restaurant_phone,
            'restaurant_email' => $request->restaurant_email,
            'restaurant_address' => $request->restaurant_address,
            'opening_hours' => $request->opening_hours,

            'delivery_charge' => $request->delivery_charge,
            'minimum_order' => $request->minimum_order,
            'currency' => $request->currency,

            'restaurant_open' => $request->boolean('restaurant_open'),
            'maintenance_mode' => $request->boolean('maintenance_mode'),
        ]);

    } else {

        $settings->update([

            'restaurant_name' =>
                $request->restaurant_name,

            'restaurant_phone' =>
                $request->restaurant_phone,

            'restaurant_email' =>
                $request->restaurant_email,

            'restaurant_address' =>
                $request->restaurant_address,

            'opening_hours' =>
                $request->opening_hours,

            'delivery_charge' =>
                $request->delivery_charge,

            'minimum_order' =>
                $request->minimum_order,

            'currency' =>
                $request->currency,

            'restaurant_open' =>
                $request->boolean('restaurant_open'),

            'maintenance_mode' =>
                $request->boolean('maintenance_mode'),

        ]);
    }

    return back()->with(
        'success',
        'Settings updated successfully!'
    );
}
}