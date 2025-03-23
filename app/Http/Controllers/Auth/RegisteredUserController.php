<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'phone' => ['required', 'regex:/^(09\d{9}|\+63\d{10})$/', 'unique:users,phone'],
        'address' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
        'name' => trim($request->name),
        'email' => strtolower(trim($request->email)),
        'phone' => trim($request->phone),
        'address' => trim($request->address),
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect()->route('dashboard')->with('success', 'Registration successful.');
}
}
