<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =========================================
    // LOGIN PAGE
    // =========================================

    public function showLogin()
    {
        return view('login');
    }


    // =========================================
    // LOGIN
    // =========================================

    public function login(Request $request)
    {
        // Validate login form
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|in:user,admin',
        ]);


        // Email + Password
        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];


        // =========================================
        // CHECK EMAIL + PASSWORD
        // =========================================

        if (!Auth::attempt($credentials)) {

            return back()
                ->withErrors([
                    'email' => 'Email or password is incorrect.',
                ])
                ->withInput(
                    $request->only('email', 'role')
                );
        }


        // =========================================
        // REGENERATE SESSION
        // =========================================

        $request->session()->regenerate();


        // Get logged-in user
        $user = Auth::user();


        // =========================================
        // CHECK SELECTED ROLE
        // =========================================

        if ($user->role !== $validated['role']) {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return back()
                ->withErrors([
                    'role' =>
                        'The selected role does not match this account.',
                ])
                ->withInput(
                    $request->only('email', 'role')
                );
        }


        // =========================================
        // ADMIN LOGIN
        // =========================================

        if ($user->role === 'admin') {

            return redirect()
                ->route('admin.dashboard')
                ->with(
                    'success',
                    'Welcome to Admin Dashboard! 👨‍💼'
                );
        }


        // =========================================
        // CUSTOMER LOGIN
        // =========================================

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Welcome back to Foodie! 🎉'
            );
    }


    // =========================================
    // REGISTER PAGE
    // =========================================

    public function showRegister()
    {
        return view('register');
    }


    // =========================================
    // REGISTER CUSTOMER
    // =========================================

    public function register(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
            ],

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


        // Create customer account
        User::create([

            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            // Customer role
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
    // LOGOUT
    // =========================================

    public function logout(Request $request)
    {
        Auth::logout();


        // Destroy current session
        $request->session()->invalidate();


        // Regenerate CSRF token
        $request->session()->regenerateToken();


        return redirect()
            ->route('home')
            ->with(
                'success',
                'You have been logged out successfully.'
            );
    }
}