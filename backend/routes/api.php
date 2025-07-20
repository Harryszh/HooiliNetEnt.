<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'name' => 'sometimes|required|string',
        'username' => 'sometimes|required|string',
        'password' => 'required|string',
    ]);

    $name = $credentials['name'] ?? $credentials['username'] ?? null;
    $user = User::where('name', $name)->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return response()->json(['message' => 'Ungültige Zugangsdaten'], 401);
    }

    return response()->json([
        'token' => 'demo-token',
        'user' => $user,
    ]);
});

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:1',
    ]);

    $user = User::create($data);

    return response()->json([
        'message' => 'Registrierung erfolgreich',
        'user' => $user,
    ], 201);
});
