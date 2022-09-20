<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => $attrs['password'],
        ]);

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials'
            ], 403);
        }


        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ]);
    }

    public function updateProfile(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
        ]);

        $user = User::where('id', $request->id);
        $user->update([
            'name' => $attrs['name'],
        ]);

        return response([
            'user' => $user->first(),
        ]);
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'logout success'
        ], 200);
    }

    public function user($id)
    {
        return response([
            'user' => User::where('id', $id)->get()
        ], 200);
    }
}
