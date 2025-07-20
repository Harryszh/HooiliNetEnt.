<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::create(['name' => 'Hooliganz']);
        Team::create(['name' => 'Ultra Crew']);
        Team::create(['name' => 'Fanatics']);
    }
}
