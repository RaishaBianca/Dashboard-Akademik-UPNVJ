<?php
// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller {
    public function showLogin() {
        return Inertia::render('Login');
    }

    public function login(Request $request) {
        dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin);
            $token = $admin->createToken('auth_token')->plainTextToken;
            return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function test(){
        return response()->json(['message' => 'Hello World']);
    }
}