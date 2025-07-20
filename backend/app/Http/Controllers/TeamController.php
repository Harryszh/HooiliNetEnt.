<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Alle Teams zurückgeben, sortiert nach Name
    public function index()
    {
        return response()->json(Team::orderBy('name', 'asc')->get());
    }

    // Ein einzelnes Team anhand der ID zurückgeben
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return response()->json($team);
    }
}
