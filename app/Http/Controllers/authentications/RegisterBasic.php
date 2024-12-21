<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLogin; // Modeli dahil ediyoruz
use Illuminate\Support\Facades\Hash; // Şifreleme için gerekli

class RegisterBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-register-basic');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    UserLogin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->back()->with('success', 'User registered successfully!');
}

}
