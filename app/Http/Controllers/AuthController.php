<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =========================================
    // REGISTER PAGE
    // =========================================

    public function showRegister()
    {
        return view('register');
    }


    // =========================================
    // REGISTER USER
    // =========================================

   public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',

        'email' => [
            'required',
            'string',
            'email',
            'max:150',
            'unique:users,email',
        ],

        'password' => [
            'required',
            'string',
            'min:6',
            'confirmed',
        ],
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
    ]);

    return redirect()
        ->route('login')
        ->with(
            'success',
            'Registration successful! Please login.'
        );
}


    // =========================================
    // LOGIN PAGE
    // =========================================

    public function showLogin()
    {
        return view('login');
    }


    // =========================================
    // LOGIN USER - ROLE BASED
    // =========================================

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',

            'password' => 'required',

            'role' => 'required|in:customer,admin',
        ]);


        $credentials = [
            'email' => $request->email,

            'password' => $request->password,
        ];


        /*
        |--------------------------------------------------------------------------
        | Check email + password
        |--------------------------------------------------------------------------
        */

        if (!Auth::attempt($credentials)) {

            return back()
                ->withErrors([
                    'email' => 'Email or password is incorrect.',
                ])
                ->withInput($request->only('email', 'role'));
        }


        /*
        |--------------------------------------------------------------------------
        | Regenerate session
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | Check selected role with database role
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();


        if ($user->role !== $request->role) {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();


            return back()
                ->withErrors([
                    'role' => 'The selected role does not match this account.',
                ])
                ->withInput($request->only('email', 'role'));
        }


        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {

            return redirect()
                ->route('admin.dashboard')
                ->with(
                    'success',
                    'Welcome to Admin Dashboard! 👨‍💼'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Welcome back to Foodie! 🎉'
            );
    }


    // =========================================
    // LOGOUT
    // =========================================

    public function logout(Request $request)
    {
        Auth::logout();


        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()
            ->route('home')
            ->with(
                'success',
                'You have been logged out successfully.'
            );
    }
}