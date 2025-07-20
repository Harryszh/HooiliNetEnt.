<?php
// app/Http/Controllers/CharakterController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charakter;

class CharakterController extends Controller
{
    public function updateHunger(Request $request, $id)
    {
        $charakter = Charakter::findOrFail($id);
        $charakter->hunger = $request->input('hunger');
        $charakter->save();

        return response()->json(['success' => true, 'hunger' => $charakter->hunger]);
    }

    // Aktion "Essen"
    public function essen($id)
    {
        $charakter = Charakter::findOrFail($id);
        $charakter->hunger = min($charakter->hunger + 10, 100);
        $charakter->save();
        return response()->json(['hunger' => $charakter->hunger]);
    }

    // Aktion "Laufen"
    public function laufen($id)
    {
        $charakter = Charakter::findOrFail($id);
        $charakter->hunger = max($charakter->hunger - 7, 0);
        $charakter->save();
        return response()->json(['hunger' => $charakter->hunger]);
    }

    // OPTIONAL: Charakter-Daten abrufen
    public function show($id)
    {
        $charakter = Charakter::findOrFail($id);
        return response()->json($charakter);
    }
}
