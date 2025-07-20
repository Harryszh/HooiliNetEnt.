<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpielerController extends Controller
{
    public function getWerte()
    {
        // Beispielwerte (später aus DB laden)
        return response()->json([
            'müdigkeit' => 30,
            'hunger' => 50,
            'durst' => 70,
            'bedürfnis' => 10
        ]);
    }
}
