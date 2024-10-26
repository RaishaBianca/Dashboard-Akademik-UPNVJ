<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();

        // Create a response
        $response = response()->json($users, 200);

        // Log the headers
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        Log::info('Response Headers', $response->headers->all());
        Log::info('CORS Configuration', config('cors'));
        // Return the response
        return $response;
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['message' => 'Login failed'], 401);
    }

    public function sign_up(Request $request)
    {
        $user = new User();
        $user->id_user = $request->nim;
        $user->nama = $request->nama;
        $user->no_tlp = '0000000';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_peran = 1;
        $user->prodi = 'informatika';
        $user->dibuat_pada = now();
        $user->dimodif_pada = now();
        $user->save();

        return response()->json(['message' => 'User created', 'user_id'=>$user->id_user], 200);
    }

    public function getUser(Request $request)
    {
        //get nim from param
        $nim = $request->nim;
        $user = User::where('id_user', $nim)->first();

        if ($user) {
            return response()->json($user, 200);
        }
    
        return response()->json(['message' => 'User not found'], 404);
    }
}
