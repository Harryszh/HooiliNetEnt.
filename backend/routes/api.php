<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {
    // Simulierter Login-Handler
    $email = $request->input('email');
    $password = $request->input('password');

    // Hier könntest du echte Authentifizierung machen
    if ($email === 'test@example.com' && $password === 'secret') {
        return response()->json(['token' => 'demo-token'], 200);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});

