<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller{
    // Register new user (admin or user)
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> $request->role,
        ]);

        $token = JWTAuth::fromUser($user);
        // Auto login after registration
        if (!$token = auth('api')->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unable to login after registration'], 401);
        }

        return $this->createNewToken($token);
    }

    // Login user
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        return $this->createNewToken($token);
    }

    // Logout user
    public function logout(){
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // Get authenticated user profile
    public function profile(){
        return response()->json(auth('api')->user());
    }

    // Helper to format JWT token response
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 1,
            'user' => auth('api')->user()
        ]);
    }
}
