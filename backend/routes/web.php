<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use \resources\views\Cmp\CmpLogin;



Route::get('/cmp/login', function () {
    return view('Cmp.CmpLogin');
})->name('cmp.login.form');


 


Route::get('/test-session', function () {
    session(['foo' => 'bar']);
    return 'Session wurde gesetzt: ' . session('foo');
});

// Registrierungsformular anzeigen (falls du das per Blade nutzen willst)
//Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Registrierung absenden (optional, falls du nicht per API arbeitest)
/* Route::post('/register', [RegisteredUserController::class, 'store']); */

// SPA-Fallback: Fängt alle anderen GET-Routen ab und gibt deine Vue-Startseite zurück
Route::get('/{any}', function () {
    return view('welcome'); // oder 'app', je nachdem wie deine SPA heißt
})->where('any', '.*');
 