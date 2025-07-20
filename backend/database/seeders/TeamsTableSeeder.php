<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            ['name' => 'FC Zürich',       'stadt' => 'Zürich'],
            ['name' => 'FC Basel',        'stadt' => 'Basel'],
            ['name' => 'Union Berlin',    'stadt' => 'Berlin'],
            ['name' => 'Sturm Graz',      'stadt' => 'Graz'],
            ['name' => 'Roter Block',     'stadt' => 'Frankfurt'],
            ['name' => 'BlauWeiß 07',     'stadt' => 'Leipzig'],
            ['name' => 'SV Chaos',        'stadt' => 'Dortmund'],
            ['name' => 'FC Legende',      'stadt' => 'München'],
            ['name' => 'Wacker Kickers',  'stadt' => 'Dresden'],
            ['name' => 'SG Vorwärts',     'stadt' => 'Bremen'],
        ];

        foreach ($teams as $team) {
            Team::updateOrCreate(
                ['name' => $team['name']], // prüft, ob das Team schon existiert
                ['stadt' => $team['stadt']]
            );
        }
    }
}
