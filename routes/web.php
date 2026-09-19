<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\ContactMessage;
use App\Models\Setting;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminFoodController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminSettingController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [HomeController::class, 'cart'])
    ->name('cart');

Route::post('/cart/add/{id}', [HomeController::class, 'addToCart'])
    ->name('cart.add');

Route::post('/cart/update/{id}', [HomeController::class, 'updateCart'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [HomeController::class, 'removeFromCart'])
    ->name('cart.remove');


/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [HomeController::class, 'checkout'])
    ->name('checkout');

Route::post('/checkout/place', [HomeController::class, 'placeOrder'])
    ->name('checkout.place');


/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('about');
})->name('about');


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {

    $settings = Setting::first();

    return view('contact', compact('settings'));

})->name('contact');


Route::post('/contact/send', function (Request $request) {

    $request->validate([
        'name' => 'required|string|max:100',
        'phone' => 'required|string|max:30',
        'email' => 'required|email|max:150',
        'message' => 'required|string',
    ]);

    ContactMessage::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    return redirect()
        ->route('contact')
        ->with(
            'success',
            'Your message has been sent successfully! 🎉'
        );

})->name('contact.send');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
|
| Only logged-in admin users can access
| these routes.
|
*/

Route::middleware(['auth', 'admin'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/dashboard',
        [AdminController::class, 'dashboard']
    )->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | ADMIN ORDERS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/orders',
        [OrderController::class, 'index']
    )->name('admin.orders');


    Route::post(
        '/admin/orders/{id}/status',
        [OrderController::class, 'updateStatus']
    )->name('admin.orders.status');


    /*
    |--------------------------------------------------------------------------
    | ADMIN FOODS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/foods',
        [AdminFoodController::class, 'index']
    )->name('admin.foods.index');


    Route::get(
        '/admin/foods/create',
        [AdminFoodController::class, 'create']
    )->name('admin.foods.create');


    Route::post(
        '/admin/foods',
        [AdminFoodController::class, 'store']
    )->name('admin.foods.store');


    Route::get(
        '/admin/foods/{food}/edit',
        [AdminFoodController::class, 'edit']
    )->name('admin.foods.edit');


    Route::put(
        '/admin/foods/{food}',
        [AdminFoodController::class, 'update']
    )->name('admin.foods.update');


    Route::delete(
        '/admin/foods/{food}',
        [AdminFoodController::class, 'destroy']
    )->name('admin.foods.destroy');


    Route::patch(
        '/admin/foods/{food}/toggle',
        [AdminFoodController::class, 'toggle']
    )->name('admin.foods.toggle');


    /*
    |--------------------------------------------------------------------------
    | ADMIN CATEGORIES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/categories',
        [AdminCategoryController::class, 'index']
    )->name('admin.categories.index');


    Route::get(
        '/admin/categories/create',
        [AdminCategoryController::class, 'create']
    )->name('admin.categories.create');


    Route::post(
        '/admin/categories',
        [AdminCategoryController::class, 'store']
    )->name('admin.categories.store');


    Route::get(
        '/admin/categories/{category}/edit',
        [AdminCategoryController::class, 'edit']
    )->name('admin.categories.edit');


    Route::put(
        '/admin/categories/{category}',
        [AdminCategoryController::class, 'update']
    )->name('admin.categories.update');


    Route::delete(
        '/admin/categories/{category}',
        [AdminCategoryController::class, 'destroy']
    )->name('admin.categories.destroy');


    /*
    |--------------------------------------------------------------------------
    | ADMIN SETTINGS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/settings',
        [AdminSettingController::class, 'index']
    )->name('admin.settings');


    Route::put(
        '/admin/settings',
        [AdminSettingController::class, 'update']
    )->name('admin.settings.update');


    /*
    |--------------------------------------------------------------------------
    | ADMIN CUSTOMER MESSAGES
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/messages', function () {

        $messages = ContactMessage::latest()->get();

        return view(
            'admin.messages',
            compact('messages')
        );

    })->name('admin.messages');


    /*
    |--------------------------------------------------------------------------
    | ADMIN ACCOUNT MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/admins',
        [AdminController::class, 'admins']
    )->name('admin.admins');


    Route::get(
        '/admin/admins/create',
        [AdminController::class, 'createAdmin']
    )->name('admin.admins.create');


    Route::post(
        '/admin/admins',
        [AdminController::class, 'storeAdmin']
    )->name('admin.admins.store');


    Route::delete(
        '/admin/admins/{id}',
        [AdminController::class, 'deleteAdmin']
    )->name('admin.admins.delete');

});