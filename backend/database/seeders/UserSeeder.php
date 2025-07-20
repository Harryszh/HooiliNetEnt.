<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['name' => 'harry'],
            [
                'password' => Hash::make('123'),
            ]
        );

        echo "✅ User '{$user->name}' wurde erstellt (ID: {$user->id})\n";
    }
}