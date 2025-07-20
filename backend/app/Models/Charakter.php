<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charakter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hunger',
    ];
}
