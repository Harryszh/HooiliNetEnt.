<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return response()->json([
            'message' => 'Registrierung erfolgreich',
            'user' => $user,
        ]);
    }
}
