<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Massenzuweisbare Felder
     */
    protected $fillable = [
        'name',
        'password',
    ];

    /**
     * Versteckte Felder bei API-Ausgabe
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Feld-Typen
     */
    protected $casts = [
        'password' => 'hashed', // Passwort wird automatisch verschlüsselt
    ];
}
